<?php

namespace First\Grid\Block;

Class LinkNews extends \Magento\Framework\View\Element\Template
{
	protected $dataHelper;
	protected $_productCollectionFactory;

	public function __construct(
		\Magento\Framework\View\Element\Template\Context $context,
		\Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
		\Rsgitech\News\Helper\Data $dataHelper
	){
		parent::__construct($context);
		$this->dataHelper = $dataHelper;
		$this->_productCollectionFactory = $productCollectionFactory;
	}

	public function getProductCollection()
  {
      $collection = $this->_productCollectionFactory->create();
      $collection->addAttributeToSelect('*');
      $collection->setPageSize(3); // fetching only 3 products
      return $collection;
  }

	public function getNewsLink()
	{
		$newsLink = $this->dataHelper->getStorefrontConfig('news_link');

		return $newsLink;
	}

	public function getBaseUrl()
	{
		return $this->_storeManager->getStore()->getBaseUrl();
	}
}
