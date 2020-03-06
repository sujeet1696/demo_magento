<?php
namespace First\Blog\Block;
use First\Blog\Model\BlogConnectionFactory;

class Dashboard extends \Magento\Framework\View\Element\Template
{
  protected $_Conn;
	public function __construct(\Magento\Framework\View\Element\Template\Context $context,
															BlogConnectionFactory $blogConn)
	{
		$this->_Conn = $blogConn;
		parent::__construct($context);
	}

	protected function _afterToHtml($html)
  {
      return $html.'<div style="text-align: center; color: chocolate;">After html runnig.</div>';
  }

	public function sayHello()
	{
		return __('Hello Ksolves');
	}

	public function getSingleRecord()
	{
		$response['data'] = array();
		$postData = $this->getRequest()->getParams();
		if(isset($postData['method_type']) && !empty($postData['method_type']) && $postData['method_type'] == 'GET_DATA') {
			$blogConnection = $this->_Conn->create()->load($postData['id']);
			$response['data'] = $blogConnection->getData();
		}

		return $response;
	}
}
