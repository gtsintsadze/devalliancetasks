<?php

namespace Tsintsadze\WeatherApp\Model\ResourceModel\Weather;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;


class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init("Tsintsadze\WeatherApp\Model\Weather", "Tsintsadze\WeatherApp\Model\ResourceModel\Weather");
    }
}
