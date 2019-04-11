<?php
namespace Packt\HelloWorld\Block\Adminhtml;
class Movie extends \Magento\Backend\Block\Widget\Grid\Container
{
    protected function _construct()
    {
        $this->_blockGroup = 'Packt_HelloWorld';
        $this->_controller = 'adminhtml_movie';
        $this->_headerText = __('Movies');

        parent::_construct();
        if ($this->_isAllowedAction('Packt_HelloWorld::save')) {
            $this->buttonList->update('add', 'label', __('Add New Movie'));
        } else {
            $this->buttonList->remove('add');
        }
    }

    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }

}