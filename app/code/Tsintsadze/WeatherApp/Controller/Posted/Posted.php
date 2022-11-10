<?php

namespace Tsintsadze\WeatherApp\Controller\Posted;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\App\Request\Http;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\HTTP\Client\Curl;
use Magento\Framework\Message\ManagerInterface;
use Tsintsadze\WeatherApp\Model\WeatherFactory;

class Posted implements HttpPostActionInterface
{
    protected Curl $curl;

    protected Http $request;

    protected RedirectFactory $redirectFactory;

    protected ManagerInterface $messageManager;

    protected WeatherFactory $weatherFactory;

    protected DataPersistorInterface $dataPersistor;

    /**
     * @param Curl $curl
     * @param Http $request
     * @param RedirectFactory $redirectFactory
     * @param ManagerInterface $messageManager
     * @param WeatherFactory $weatherFactory
     * @param DataPersistorInterface $dataPersistor
     */
    public function __construct(
        Curl $curl,
        Http $request,
        RedirectFactory $redirectFactory,
        ManagerInterface $messageManager,
        WeatherFactory $weatherFactory,
        DataPersistorInterface $dataPersistor
    ) {
        $this->curl = $curl;
        $this->request = $request;
        $this->redirectFactory = $redirectFactory;
        $this->messageManager = $messageManager;
        $this->weatherFactory = $weatherFactory;
        $this->dataPersistor = $dataPersistor;
    }

    /**
     * @throws \JsonException
     */
    public function sendRequest(string $city)
    {
        $url = "https://api.openweathermap.org/data/2.5/weather?q=$city&appid=ba91491f399d1207ae88ff71f6d2e0b8&units=metric";
        $this->curl->get($url);
        return json_decode($this->curl->getBody(), true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws \JsonException
     */
    public function execute()
    {
        $redirect = $this->redirectFactory->create();
        if (!empty($this->request->getParam("city"))) {
            $result = $this->sendRequest($this->request->getParam('city'));
            $weatherObject = $this->weatherFactory->create();
            $weatherObject->setCity($this->request->getParam('city'));
            $weatherObject->setDescription($result['weather'][0]['description']);
            $weatherObject->setCountry($result['sys']['country']);
            $weatherObject->setTemperature($result['main']['temp']);
            $weatherObject->setFeelsLike($result['main']['feels_like']);
            $weatherObject->setPressure($result['main']['pressure']);
            $weatherObject->setHumidity($result['main']['humidity']);
            $weatherObject->setWindSpeed($result['wind']['speed']);
            $weatherObject->setSunRise($result['sys']['sunrise']);
            $weatherObject->setSunSet($result['sys']['sunset']);
            $weatherObject->save();

            $this->dataPersistor->set("city", $this->request->getParam('city'));
            $this->dataPersistor->set("description", $result['weather'][0]['description']);
            $this->dataPersistor->set("country", $result['sys']['country']);
            $this->dataPersistor->set("temperature", $result['main']['temp']);
            $this->dataPersistor->set("feels_like", $result['main']['feels_like']);
            $this->dataPersistor->set("pressure", $result['main']['pressure']);
            $this->dataPersistor->set("humidity", $result['main']['humidity']);
            $this->dataPersistor->set("wind_speed", $result['wind']['speed']);
            $this->dataPersistor->set("sunrise", $result['sys']['sunrise']);
            $this->dataPersistor->set("sunset", $result['sys']['sunset']);

            $this->messageManager->addSuccessMessage("Data Saved IN database!");
            return $redirect->setRefererUrl();
        }

        $this->messageManager->addErrorMessage("City field is empty !");

        return $redirect->setRefererUrl();
    }
}
