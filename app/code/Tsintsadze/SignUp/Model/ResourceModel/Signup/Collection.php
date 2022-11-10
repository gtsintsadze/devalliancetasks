<?php

namespace Tsintsadze\SignUp\Model\ResourceModel\Signup;

use \Magento\Eav\Model\Entity\Collection\VersionControl\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init("Tsintsadze\SignUp\Model\SignUp", "Tsintsadze\SignUp\Model\ResourceModel\SignUp");
    }
}
