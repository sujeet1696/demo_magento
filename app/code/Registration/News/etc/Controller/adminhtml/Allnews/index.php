<?php
namespace Registration\News\Controller\Adminhtml\Allnews;
 // \Magento\Backend\App\Action
 //\Magento\Framework\App\Action\Action
class Index extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;

	public function __construct(
    \Magento\Framework\App\Action\Context $context,
    \Magento\Framework\View\Result\PageFactory $pageFactory)
	{
    return parent::__construct($context);
		$this->_pageFactory = $pageFactory;
	}

	public function execute()
	{
		return $this->_pageFactory->create();
		// echo "Hello World.";
		// echo 'Hello World Test file.';
		// exit;
	}
}
