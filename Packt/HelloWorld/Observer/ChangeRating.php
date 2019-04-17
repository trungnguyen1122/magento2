<?php

namespace Packt\HelloWorld\Observer;

class ChangeRating implements \Magento\Framework\Event\ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $change = $observer->getData('mp_text');
        $change ->setText('0');

        return $this;


    }
}