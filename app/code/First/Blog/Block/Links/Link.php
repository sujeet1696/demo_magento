<?php
/**
 * @author Ksolves Team
 * @copyright Copyright (c) 2020 Ksolves (https://www.ksolves.com)
 * @package Ksolves_Trackingorder
 */
namespace First\Blog\Block\Links;

class Link extends \Magento\Framework\View\Element\Html\Link
{
	/**
	 * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Ksolves\Trackingorder\Helper\ConfigData $helperData
     */
	public function __construct(
		\Magento\Store\Model\StoreManagerInterface $storeManager,
	    \Magento\Framework\View\Element\Template\Context $context,
	    array $data = []
	) {
		$this->_storeManager = $storeManager;

	    parent::__construct($context, $data);
	}

	/**
     *  return url of link
     * @param \Ksolves\Trackingorder\Helper\ConfigData $helperData
     * @return String
     */
	public function getHref(){
	 		 	$baseurl = $this->_storeManager->getStore()->getBaseUrl();
		    $page_url =''.$baseurl.'blog/index/crud';
		    return $this->getUrl($page_url);

	}

	/**
     *  return label of link
     * @param \Ksolves\Trackingorder\Helper\ConfigData $helperData
     * @return  String
     */
	public function getLabel(){

	        return 'All deatail';
}
}
