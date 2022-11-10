<?php

namespace Tsintsadze\WeatherApp\Api;

use Tsintsadze\WeatherApp\Api\Data\WeatherInterface;

interface WeatherRepositoryInterface
{

    /**
     * @param WeatherInterface $weather
     * @return void
     */
    public function save(WeatherInterface $weather): void;

    /**
     * @param int $id
     * @return WeatherInterface
     */
    public function get(int $id): WeatherInterface;

    /**
     * @param WeatherInterface $weather
     * @return void
     */
    public function delete(WeatherInterface $weather): void;

    /**
     * @param int $id
     * @return void
     */
    public function deleteById(int $id): void;
}
