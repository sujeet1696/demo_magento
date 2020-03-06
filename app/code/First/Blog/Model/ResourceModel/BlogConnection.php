<?php
namespace First\Blog\Model\ResourceModel;

class BlogConnection extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('first_blogs', 'id');
    }
}
