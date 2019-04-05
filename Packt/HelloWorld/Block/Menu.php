<?php
namespace Packt\HelloWorld\Block;
use Magento\Framework\View\Element\Template;
class Menu extends Template
{
    public function getHome()
    {
        return $this->getUrl('helloworld/index/index');
    }

    public function getMovie()
    {
        return $this->getUrl('helloworld/index/Movie');
    }
    public function getDirector()
    {
        return $this->getUrl('helloworld/index/Director');
    }
    public function getActor()
    {
        return $this->getUrl('helloworld/index/Actor');
    }

}