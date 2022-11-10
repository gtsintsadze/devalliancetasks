<?php

namespace Tsintsadze\WeatherApp\Api\Data;

interface WeatherInterface
{
    public const ID = 'id';
    public const CITY = 'city';
    public const COUNTRY = 'country';
    public const DESCRIPTION = 'description';
    public const TEMPERATURE = 'temperature';
    public const FEELS_LIKE = 'feels_like';
    public const PRESSURE = 'pressure';
    public const HUMIDITY = 'humidity';
    public const WIND_SPEED = 'wind_speed';
    public const SUNRISE = 'sun_rise';
    public const SUNSET = 'sun_set';
    public const CREATED_AT = 'created_at';

    /**
     * @return int
     */
    public function getWeatherId(): int;

    /**
     * @return string
     */
    public function getCreatedAt(): string;

    /**
     * @param string $city
     * @return WeatherInterface
     */
    public function setCity(string $city): WeatherInterface;

    /**
     * @return string
     */
    public function getCity(): string;

    /**
     * @param string $country
     * @return WeatherInterface
     */
    public function setCountry(string $country): WeatherInterface;

    /**
     * @return string
     */
    public function getCountry(): string;

    /**
     * @param string $description
     * @return WeatherInterface
     */
    public function setDescription(string $description): WeatherInterface;

    /**
     * @return string
     */
    public function getDescription(): string;

    /**
     * @param float $temperature
     * @return WeatherInterface
     */
    public function setTemperature(float $temperature): WeatherInterface;

    /**
     * @return float
     */
    public function getTemperature():float;

    /**
     * @param float $feelsLike
     * @return WeatherInterface
     */
    public function setFeelsLike(float $feelsLike): WeatherInterface;

    /**
     * @return float
     */
    public function getFeelsLike(): float;

    /**
     * @param int $pressure
     * @return WeatherInterface
     */
    public function setPressure(int $pressure): WeatherInterface;

    /**
     * @return int
     */
    public function getPressure(): int;

    /**
     * @param int $humidity
     * @return WeatherInterface
     */
    public function setHumidity(int $humidity): WeatherInterface;

    /**
     * @return int
     */
    public function getHumidity(): int;

    /**
     * @param float $windSpeed
     * @return WeatherInterface
     */
    public function setWindSpeed(float $windSpeed): WeatherInterface;

    /**
     * @return float
     */
    public function getWindSpeed(): float;


    public function setSunRise(string $sunRise): WeatherInterface;

    /**
     * @return string
     */
    public function getSunRise(): string;

    /**
     * @param string $sunSet
     * @return WeatherInterface
     */
    public function setSunSet(string $sunSet): WeatherInterface;

    /**
     * @return string
     */
    public function getSunSet(): string;
}
