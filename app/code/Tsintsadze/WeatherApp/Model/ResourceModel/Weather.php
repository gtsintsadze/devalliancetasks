<?php

namespace Tsintsadze\WeatherApp\Model\ResourceModel;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;
use Psr\Log\LoggerInterface;

class Weather extends AbstractDb
{
    protected LoggerInterface $logger;

    public function __construct(
        Context $context,
        LoggerInterface $logger,
        $connectionName = null
    )
    {
        parent::__construct($context, $connectionName);
        $this->logger = $logger;
    }

    protected function _construct()
    {
        $this->_init('weather_data', 'id');
    }

    public function getFields(): ?array
    {
        try {
            return array_keys($this->getConnection()->describeTable($this->getMainTable()));
        } catch (LocalizedException $e) {
            $this->logger->error($e->getMessage());
        }

        return null;
    }
}
