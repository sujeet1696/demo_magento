<?php
namespace First\Blog\Model;

use Magento\Framework\Model\AbstractModel;

class BlogConnection extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('First\Blog\Model\ResourceModel\BlogConnection');
    }
}
