<?php
namespace Ksolves\HelloWorld\Model\ResourceModel\Post;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';
    /**
     * Define model & resource model
     */
    protected function _construct()
    {
        $this->_init(
            'Ksolves\HelloWorld\Model\Post',
            'Ksolves\HelloWorld\Model\ResourceModel\Post'
        );
    }
}
