<?php

namespace Tsintsadze\SignUp\Model;

use Magento\Framework\Model\AbstractModel;
use Tsintsadze\SignUp\Api\Data\SignupInterface;

class SignUp extends AbstractModel implements SignupInterface
{

    protected function _construct()
    {
        $this->_init("Tsintsadze\SignUp\Model\ResourceModel\SignUp");
    }

    /**
     * @param string $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->setData("name", $name);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->getData(self::NAME);
    }

    /**
     * @param string $date
     * @return void
     */
    public function setDate(string $date): void
    {
        $this->setData("date", $date);
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->getData(self::DATE);
    }

    /**
     * @return int
     */
    public function getSignupId(): int
    {
        return $this->getData(self::SIGNUP_ID);
    }

}
