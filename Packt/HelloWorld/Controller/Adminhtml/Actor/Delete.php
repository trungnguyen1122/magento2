<?php
namespace Packt\HelloWorld\Controller\Adminhtml\Actor;

use Magento\Backend\App\Action;
use Magento\TestFramework\ErrorLog\Logger;

class Delete extends \Magento\Backend\App\Action
{

    /**
     * {@inheritdoc}
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Packt_HelloWorld::delete');
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('actor_id');
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            try {
                $model = $this->_objectManager->create('Packt\HelloWorld\Model\Actor');
                $model->load($id);
                $model->delete();
                $this->messageManager->addSuccess(__('The actor has been deleted.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['actor_id' => $id]);
            }
        }
        $this->messageManager->addError(__('We can\'t find a actor to delete.'));
        return $resultRedirect->setPath('*/*/');
    }
}
