<?php
namespace Packt\HelloWorld\Model\ResourceModel\Actor;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'actor_id';
    protected $_eventPrefix = 'magenest_actor_collection';
    protected $_eventObject = 'actor_collection';


    protected function _construct()
    {
        $this->_init('Packt\HelloWorld\Model\Actor', 'Packt\HelloWorld\Model\ResourceModel\Actor');
    }

}
