<?php
namespace Packt\HelloWorld\Controller\Adminhtml\Actor;

use Magento\Backend\App\Action;
use Magento\TestFramework\ErrorLog\Logger;

class Save extends \Magento\Backend\App\Action
{


    public function __construct(Action\Context $context)
    {
        parent::__construct($context);
    }


    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Packt_HelloWorld::save');
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();

        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {

            $model = $this->_objectManager->create('Packt\HelloWorld\Model\Actor');

            $id = $this->getRequest()->getParam('actor_id');
            if ($id) {
                $model->load($id);
            }

            $model->setData($data);

            $this->_eventManager->dispatch(
                'helloworld_actor_prepare_save',
                ['post' => $model, 'request' => $this->getRequest()]
            );

            try {
                $model->save();
                $this->messageManager->addSuccess(__('You saved this Actor.'));
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['actor_id' => $model->getActorId(), '_current' => true]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the Actor.'));
            }

            $this->_getSession()->setFormData($data);
            return $resultRedirect->setPath('*/*/edit', ['actor_id' => $this->getRequest()->getParam('actor_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}
