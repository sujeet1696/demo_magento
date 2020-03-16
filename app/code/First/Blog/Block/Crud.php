<?php
namespace First\Blog\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Vendor\Extension\Model\Extension;
// use Magento\Framework\Pricing\Helper\Data as priceHelper;
use First\Blog\Model\BlogConnectionFactory;

class Crud extends \Magento\Framework\View\Element\Template
{
  protected $_Conn;
  protected $customCollection;
	protected $_productCollectionFactory;

  public function __construct(\Magento\Framework\View\Element\Template\Context $context,
                              \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
                              BlogConnectionFactory $blogConn)
	{
    $this->_Conn = $blogConn;
		$this->_productCollectionFactory = $productCollectionFactory;
		parent::__construct($context);
	}

  public function _prepareLayout()
  {
      // $this->pageConfig->getTitle()->set(__('Simple Custom Module List Page'));

      if ($this->getTestCollection()) {
        $pager = $this->getLayout()->createBlock(
            'Magento\Theme\Block\Html\Pager',
            'custom.history.pager'
        )->setAvailableLimit(array(5=>5,10=>10,15=>15))->setShowPerPage(true)->setCollection(
            $this->getTestCollection()
        );
        $this->setChild('pager', $pager);
        $this->getTestCollection()->load();
    }
      return parent::_prepareLayout();
  }

  public function getTestCollection()
  {
      $page = ($this->getRequest()->getParam('p'))? $this->getRequest()->getParam('p') : 1;
      $pageSize = ($this->getRequest()->getParam('limit'))? $this->getRequest()->getParam('limit') : 5;
      $searchText = ($this->getRequest()->getParam('search_text'))? $this->getRequest()->getParam('search_text') : '';
      $test = $this->_Conn->create();
      $collection = $test->getCollection();
      $collection = $collection->addFieldToFilter('user_name', array("like" => '%'.$searchText.'%'));
      //$collection->addFieldToFilter('title','Test Title 01'); // if you want to use filter
      //$collection->setOrder('test_id','ASC'); // if you want to set collection order
      $collection->setPageSize($pageSize);
      $collection->setCurPage($page);

      return $collection;
  }

  public function getPagerHtml()
  {
      return $this->getChildHtml('pager');
  }

  public function getProductCollection()
	{
			$collection = $this->_productCollectionFactory->create();
			$collection->addAttributeToSelect('*');
			$collection->setOrder('price','DESC');
			$collection->setPageSize(5); // fetching only 3 products
			return $collection;
	}
}
