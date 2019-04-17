<?php

namespace Packt\HelloWorld\Controller\Adminhtml\Index;

class rating extends \Magento\Framework\App\Action\Action
{

    public function execute()
    {
        $textDisplay = new \Magento\Framework\DataObject(array('text' => 'Ping'));
        $this->_eventManager->dispatch('packt_helloworld_rating', ['mp_text' => $textDisplay]);
        echo $textDisplay->getText();

    }
}
