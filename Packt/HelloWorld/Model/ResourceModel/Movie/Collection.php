<?php
namespace Packt\HelloWorld\Model\ResourceModel\Movie;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'movie_id';
    protected $_eventPrefix = 'magenest_movie_collection';
    protected $_eventObject = 'movie_collection';


    protected function _construct()
    {
        $this->_init('Packt\HelloWorld\Model\Movie', 'Packt\HelloWorld\Model\ResourceModel\Movie');
    }

}
