<?php

namespace Packt\HelloWorld\Observer;

class ChangeRating implements \Magento\Framework\Event\ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $observer->getEvent()->getObject('magenest_movie');
        $observer ->setData('0');

        return $this;


    }
}