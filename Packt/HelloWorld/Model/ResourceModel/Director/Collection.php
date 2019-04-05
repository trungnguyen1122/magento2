<?php
namespace Packt\HelloWorld\Model\ResourceModel\Director;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'director_id';
    protected $_eventPrefix = 'magenest_director_collection';
    protected $_eventObject = 'director_collection';


    protected function _construct()
    {
        $this->_init('Packt\HelloWorld\Model\Director', 'Packt\HelloWorld\Model\ResourceModel\Director');
    }

}
