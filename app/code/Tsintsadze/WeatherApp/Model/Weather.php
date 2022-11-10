<?php

namespace Tsintsadze\WeatherApp\Model;

use Magento\Framework\Model\AbstractModel;
use Tsintsadze\WeatherApp\Api\Data\WeatherInterface;

class Weather extends AbstractModel implements WeatherInterface
{
    protected function _construct()
    {
        $this->_init('Tsintsadze\WeatherApp\Model\ResourceModel\Weather');
    }

    /**
     * @return int
     */
    public function getWeatherId(): int
    {
        return $this->getData(self::ID);
    }

    /**
     * @return string
     */

    public function getCreatedAt(): string
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * @param string $city
     * @return WeatherInterface
     */
    public function setCity(string $city): WeatherInterface
    {
        return $this->setData("city", $city);
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->getData(self::CITY);
    }

    /**
     * @param string $country
     * @return WeatherInterface
     */
    public function setCountry(string $country): WeatherInterface
    {
        return $this->setData("country", $country);
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->getData(self::COUNTRY);
    }

    /**
     * @param string $description
     * @return WeatherInterface
     */
    public function setDescription(string $description): WeatherInterface
    {
        return $this->setData("description", $description);
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->getData(self::DESCRIPTION);
    }

    /**
     * @param float $temperature
     * @return WeatherInterface
     */
    public function setTemperature(float $temperature): WeatherInterface
    {
        return $this->setData('temperature', $temperature);
    }

    /**
     * @return float
     */
    public function getTemperature(): float
    {
        return $this->getData(self::TEMPERATURE);
    }

    /**
     * @param float $feelsLike
     * @return WeatherInterface
     */
    public function setFeelsLike(float $feelsLike): WeatherInterface
    {
        return $this->setData("feels_like", $feelsLike);
    }

    /**
     * @return float
     */
    public function getFeelsLike(): float
    {
        return $this->getData(self::FEELS_LIKE);
    }

    /**
     * @param int $pressure
     * @return WeatherInterface
     */
    public function setPressure(int $pressure): WeatherInterface
    {
        return $this->setData("pressure", $pressure);
    }

    /**
     * @return int
     */
    public function getPressure(): int
    {
        return $this->getData(self::PRESSURE);
    }

    /**
     * @param int $humidity
     * @return WeatherInterface
     */
    public function setHumidity(int $humidity): WeatherInterface
    {
        return $this->setData('humidity', $humidity);
    }

    /**
     * @return int
     */
    public function getHumidity(): int
    {
        return $this->getData(self::HUMIDITY);
    }

    /**
     * @param float $windSpeed
     * @return WeatherInterface
     */
    public function setWindSpeed(float $windSpeed): WeatherInterface
    {
        return $this->setData('wind_speed', $windSpeed);
    }

    /**
     * @return float
     */
    public function getWindSpeed(): float
    {
        return $this->getData(self::WIND_SPEED);
    }

    /**
     * @param string $sunRise
     * @return WeatherInterface
     */
    public function setSunRise(string $sunRise): WeatherInterface
    {
        return $this->setData('sun_rise', $sunRise);
    }

    /**
     * @return string
     */
    public function getSunRise(): string
    {
        return $this->getData(self::SUNRISE);
    }

    /**
     * @param string $sunSet
     * @return WeatherInterface
     */
    public function setSunSet(string $sunSet): WeatherInterface
    {
        return $this->setData('sun_set', $sunSet);
    }

    /**
     * @return string
     */
    public function getSunSet(): string
    {
        return $this->getData(self::SUNSET);
    }
}
