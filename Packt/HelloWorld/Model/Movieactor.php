<?php
namespace Packt\HelloWorld\Model;
class Movieactor extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'magenest_movie_actor';

    protected $_cacheTag = 'magenest_movie_actor';

    protected $_eventPrefix = 'magenest_movie_actor';

    protected function _construct()
    {
        $this->_init('Packt\HelloWorld\Model\ResourceModel\Movieactor');
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