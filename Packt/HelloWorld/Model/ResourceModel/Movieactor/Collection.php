<?php
namespace Packt\HelloWorld\Model\ResourceModel\Movieactor;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'movie_id';
    protected $_eventPrefix = 'magenest_movie_actor_collection';
    protected $_eventObject = 'movie_actor_collection';


    protected function _construct()
    {
        $this->_init('Packt\HelloWorld\Model\Movieactor', 'Packt\HelloWorld\Model\ResourceModel\Movieactor');
    }

}
