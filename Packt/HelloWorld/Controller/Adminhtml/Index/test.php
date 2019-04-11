<?php

namespace Packt\HelloWorld\Controller\Adminhtml\Index;

class Test extends \Magento\Framework\App\Action\Action
{

    public function execute()
    {
        $textDisplay = new \Magento\Framework\DataObject(array('text' => 'Event Demo'));
        $this->_eventManager->dispatch('packt_helloworld_display_text', ['mp_text' => $textDisplay]);
        echo $textDisplay->getText();
        exit;
    }
}
