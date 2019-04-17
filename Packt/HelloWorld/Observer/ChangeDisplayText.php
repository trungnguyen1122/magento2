<?php

namespace Packt\HelloWorld\Observer;

class ChangeDisplayText implements \Magento\Framework\Event\ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $change = $observer->getData('ma_text');


        if($change->getText() == 'Ping' ){
        $change ->setText('Pong');
        }

        return $this;


    }
}