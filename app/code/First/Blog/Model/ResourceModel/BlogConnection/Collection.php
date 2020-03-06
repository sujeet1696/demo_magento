<?php
namespace First\Blog\Model\ResourceModel\BlogConnection;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';
    /**
     * Define model & resource model
     */
    protected function _construct()
    {
        $this->_init(
            'First\Blog\Model\BlogConnection',
            'First\Blog\Model\ResourceModel\BlogConnection'
        );
    }
}
