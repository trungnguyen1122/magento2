<?php
namespace Packt\HelloWorld\Block\Adminhtml;
class Actor extends \Magento\Backend\Block\Widget\Grid\Container
{
    protected function _construct()
    {
        $this->_blockGroup = 'Packt_HelloWorld';
        $this->_controller = 'adminhtml_actor';
        parent::_construct();
    }
}