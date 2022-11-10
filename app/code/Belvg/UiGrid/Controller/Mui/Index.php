<?php

namespace Belvg\UiGrid\Controller\Mui;

use Magento\Customer\Model\Session;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\View\Element\UiComponentInterface;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    protected Session $customerSession;

    protected PageFactory $pageFactory;

    protected UiComponentFactory $factory;

    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        UiComponentFactory $factory,
        Session $customerSession
    ) {
        $this->pageFactory = $pageFactory;
        $this->factory = $factory;
        $this->customerSession = $customerSession;
        return parent::__construct($context);
    }

    public function execute()
    {
        $isAjax = $this->getRequest()->isAjax();
        if ($isAjax) {
            $component = $this->factory->create($this->_request->getParam('namespace'));
            $this->prepareComponent($component);
            $this->_response->appendBody($component->render());
        }
        return $this->pageFactory->create();
    }

    protected function prepareComponent(UiComponentInterface $component)
    {
        foreach ($component->getChildComponents() as $child) {
            $this->prepareComponent($child);
        }
        $component->prepare();
    }
}
