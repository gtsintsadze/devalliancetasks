<?php

namespace Tsintsadze\SignUp\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;


class SignUp extends AbstractDb
{

    protected function _construct()
    {
        $this->_init("signup", "signup_id");
    }

}
