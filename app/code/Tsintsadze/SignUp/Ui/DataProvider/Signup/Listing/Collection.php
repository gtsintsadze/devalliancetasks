<?php

namespace Tsintsadze\SignUp\Ui\DataProvider\Signup\Listing;

use Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult;
use Tsintsadze\SignUp\Api\Data\SignupInterface;


class Collection extends SearchResult
{
    /**
     * Override _initSelect to add custom columns
     *
     * @return void
     */
    protected function _initSelect(): void
    {
        $this->addFilterToMap(SignupInterface::SIGNUP_ID, 'main_table.' . SignupInterface::SIGNUP_ID);
        $this->addFilterToMap(SignupInterface::NAME, 'main_table.' . SignupInterface::NAME);
        $this->addFilterToMap(SignupInterface::DATE, 'main_table.' . SignupInterface::DATE);
        parent::_initSelect();
    }
}
