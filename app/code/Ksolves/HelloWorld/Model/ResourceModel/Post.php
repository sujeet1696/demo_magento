<?php
namespace Ksolves\HelloWorld\Model\ResourceModel;

class Post extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('ksolves_registration', 'id');
    }
}
