<?php

namespace Tsintsadze\WeatherApp\Controller\Posted;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Filesystem\DirectoryList;
use Magento\Framework\View\LayoutFactory;
use Psr\Log\LoggerInterface;
use Spipu\Html2Pdf\Html2Pdf;
use Tsintsadze\WeatherApp\Model\ResourceModel\Weather\CollectionFactory;

class Topdf implements HttpGetActionInterface
{
    protected CollectionFactory $weatherCollectionFactory;

    protected ResultFactory $resultFactory;

    protected LoggerInterface $logger;

    protected LayoutFactory $layoutFactory;

    protected DirectoryList $directoryList;

    /**
     * @param CollectionFactory $weatherCollectionFactory
     * @param ResultFactory $resultFactory
     * @param LoggerInterface $logger
     * @param LayoutFactory $layoutFactory
     */
    public function __construct(
        CollectionFactory $weatherCollectionFactory,
        ResultFactory     $resultFactory,
        LoggerInterface   $logger,
        LayoutFactory     $layoutFactory,
        DirectoryList     $directoryList
    ) {
        $this->weatherCollectionFactory = $weatherCollectionFactory;
        $this->resultFactory = $resultFactory;
        $this->logger = $logger;
        $this->layoutFactory = $layoutFactory;
        $this->directoryList = $directoryList;
    }

    public function execute()
    {
        $weatherData = $this->weatherCollectionFactory->create();
        ob_start();
        include $this->directoryList->getPath("app") . "/code/Tsintsadze/WeatherApp/view/frontend/templates/topdf.phtml";
        $template = ob_get_clean();
        $html2pdf = new Html2Pdf('P', 'A4', 'fr');
        $html2pdf->writeHTML($template);
        $html2pdf->output('weatherData.pdf', 'D');
        return $this->resultFactory->create(ResultFactory::TYPE_RAW);
    }
}
