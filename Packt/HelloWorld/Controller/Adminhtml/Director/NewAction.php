<?php
namespace Packt\HelloWorld\Controller\Adminhtml\Director;

class NewAction extends \Magento\Backend\App\Action
{

    protected $resultForwardFactory;


    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory
    ) {
        $this->resultForwardFactory = $resultForwardFactory;
        parent::__construct($context);
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Packt_HelloWorld::save');
    }

    public function execute()
    {

        $resultForward = $this->resultForwardFactory->create();
        return $resultForward->forward('edit');
    }
}
