<?php
namespace Packt\HelloWorld\Controller\Adminhtml\Index;

class rating extends \Magento\Framework\App\Action\Action
{

    public function execute()
    {
        $this->_eventManager->dispatch($this->_eventPrefix . 'change_rating_save_before', $this->_getEventData('movie_rating_change'));

    }
}