<?php
namespace Packt\HelloWorld\Controller\Adminhtml\Movie;

use Magento\Backend\App\Action;
use Magento\TestFramework\ErrorLog\Logger;

class Delete extends \Magento\Backend\App\Action
{

    /**
     * {@inheritdoc}
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Packt_HelloWold::delete');
    }

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('movie_id');

        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            try {
                $model = $this->_objectManager->create('Packt\HelloWorld\Model\Movie');
                $model->load($id);
                $model->delete();
                $this->messageManager->addSuccess(__('The M has been deleted.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['movie_id' => $id]);
            }
        }
        $this->messageManager->addError(__('We can\'t find a movie to delete.'));
        return $resultRedirect->setPath('*/*/');
    }
}
