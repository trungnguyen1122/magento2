<?php
namespace Packt\HelloWorld\Model;
class Director extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'magenest_director';

    protected $_cacheTag = 'magenest_director';

    protected $_eventPrefix = 'magenest_director';

    protected function _construct()
    {
        $this->_init('Packt\HelloWorld\Model\ResourceModel\Director');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}