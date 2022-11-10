<?php

namespace Tsintsadze\WeatherApp\Model\ResourceModel;

use Exception;
use Magento\Framework\Exception\AlreadyExistsException;
use Psr\Log\LoggerInterface;
use Tsintsadze\WeatherApp\Api\Data\WeatherInterface;
use Tsintsadze\WeatherApp\Api\WeatherRepositoryInterface;
use Tsintsadze\WeatherApp\Model\ResourceModel\Weather as WeatherResource;
use Tsintsadze\WeatherApp\Model\Weather;
use Tsintsadze\WeatherApp\Model\WeatherFactory;

class WeatherRepository implements WeatherRepositoryInterface
{
    protected WeatherResource $weatherResource;

    protected WeatherFactory $weatherFactory;

    protected LoggerInterface $logger;

    public function __construct(
        WeatherResource $weatherResource,
        WeatherFactory $weatherFactory,
        LoggerInterface $logger
    ) {
        $this->weatherResource = $weatherResource;
        $this->weatherFactory = $weatherFactory;
        $this->logger = $logger;
    }

    public function save(WeatherInterface $weather): void
    {
        try {
            $this->weatherResource->save($weather);
        } catch (AlreadyExistsException|Exception $e) {
            $this->logger->error($e->getMessage());
        }
    }

    public function get(int $id): Weather
    {
        $weather = $this->weatherFactory->create();
        return $this->weatherResource->load($weather, $id, 'id');
    }

    public function delete(WeatherInterface $weather): void
    {
        try {
            $this->weatherResource->delete($weather);
        } catch (Exception $e) {
            $this->logger->error($e->getMessage());
        }
    }

    public function deleteById(int $id): void
    {
        $weather = $this->get($id);
        $this->delete($weather);
    }
}
