<?php
namespace Ksolves\HelloWorld\Model;

use Magento\Framework\Model\AbstractModel;

class Post extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('Ksolves\HelloWorld\Model\ResourceModel\Post');
    }
}
