<?php

namespace Tsintsadze\WeatherApp\Model;

use Magento\Framework\UrlInterface;

class Url
{
    protected UrlInterface $urlBuilder;

    /**
     * @param UrlInterface $urlBuilder
     */
    public function __construct(
        UrlInterface $urlBuilder
    ) {
        $this->urlBuilder = $urlBuilder;
    }

    /**
     * @return string
     */
    public function getWeatherUrl(): string
    {
        return $this->urlBuilder->getUrl('weather/posted/posted');
    }
}
