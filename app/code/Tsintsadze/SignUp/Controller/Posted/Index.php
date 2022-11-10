<?php

namespace Tsintsadze\SignUp\Controller\Posted;

use Exception;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Message\ManagerInterface;
use Tsintsadze\SignUp\Model\SignUpFactory;

class Index implements HttpPostActionInterface
{
    protected RequestInterface $request;

    protected Redirect $redirect;

    protected SignUpFactory $signUpFactory;

    protected ManagerInterface $messageManager;

    public function __construct(
        RequestInterface $request,
        Redirect $redirect,
        SignUpFactory $signUpFactory,
        ManagerInterface $messageManager
    )
    {
        $this->request = $request;
        $this->redirect = $redirect;
        $this->signUpFactory = $signUpFactory;
        $this->messageManager = $messageManager;
    }

    /**
     * @throws Exception
     */
    public function execute()
    {
        $name = $this->request->getParam("name");
        $date = $this->request->getParam("date");

        if (!empty($name) && !empty($date)) {
            $signupObject = $this->signUpFactory->create();

            $signupObject->setName($name);
            $signupObject->setDate($date);
            $signupObject->save();
            $this->messageManager->addSuccessMessage("Data Successfully Saved !");
        } else {
            $this->messageManager->addErrorMessage("Oops data is not filled !");
        }
        return $this->redirect->setRefererUrl();
    }
}
