<?php

namespace Tsintsadze\SignUp\Block;

use Magento\Framework\View\Element\Template;
use Tsintsadze\SignUp\Model\Config\Config as SignupConfig;

class SignUp extends Template
{
    protected SignupConfig $signupConfig;

    /**
     * @param SignupConfig $signupConfig
     */

    public function __construct(Template\Context $context, SignupConfig $signupConfig, array $data = [])
    {
        parent::__construct($context, $data);
        $this->signupConfig = $signupConfig;
    }

    public function formIsVisible() : bool
    {
        return $this->signupConfig->getFormIsVisible();
    }
}
