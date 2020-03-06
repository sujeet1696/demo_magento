<?php
namespace First\Blog\Controller\Index;

use First\Blog\Model\BlogConnectionFactory;

class Crud extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
  protected $_Conn;

	public function __construct(\Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        BlogConnectionFactory $blogConn)
  	{
  		$this->_pageFactory = $pageFactory;
  		$this->_Conn = $blogConn;
  		return parent::__construct($context);
  	}

	public function execute()
	{
		$postData = array();
					// $postData = $this->getRequest()->getParams();
					// print_r($postData);exit;
		if(empty($postData)) {
			$postData = $this->getRequest()->getParams();
		}

		if(empty($postData)) {
			$postData = $this->getRequest()->getPost();
		}

		// print_r($postData);die;
		$postData = $this->getRequest()->getPost();
		if(isset($postData['method_type']) && !empty($postData['method_type']) && $postData['method_type'] == 'SAVE') {
			$response = $this->saveData($postData);
		} elseif (isset($postData['method_type']) && !empty($postData['method_type']) && $postData['method_type'] == 'GET_ALL_DATA') {
			$response = $this->getAllData($postData);
		} elseif (isset($postData['method_type']) && !empty($postData['method_type']) && $postData['method_type'] == 'DELETE_RECORD') {
			$response = $this->deleteRecord($postData);
		} elseif (isset($postData['method_type']) && !empty($postData['method_type']) && $postData['method_type'] == 'UPDATE_RECORD') {
			$response = $this->updateData($postData);
		}elseif (isset($postData['method_type']) && !empty($postData['method_type']) && $postData['method_type'] == 'SEARCH_DATA') {
			$response = $this->searchData($postData);
		}else{
 			// code...
		}

		return $this->_pageFactory->create();
	}

	public function updateData($postData)
	{
			 $response['status'] = false;

       $blogConnection = $this->_Conn->create();
			 $blogConnection->setData('user_name', $postData['name']);
			 $blogConnection->setData('email_id', $postData['email']);
			 $blogConnection->setData('phone_number', $postData['phone_number']);
			 $blogConnection->setData('title', $postData['title']);
			 $blogConnection->setData('blog_type', $postData['blog_type']);
			 $blogConnection->setData('description', $postData['description']);
			 $blogConnection->setData('status', 1);
			 $blogConnection->setData('created_at', date("Y-m-d H:i:s"));
			 $blogConnection->setData('updated_at', date("Y-m-d H:i:s"));
			 if($blogConnection->save()){
				 	 $response['status'] = true;
					 $response['is_inserted'] = true;
					 $this->messageManager->addSuccessMessage(__('You saved the data.'));
			 }else{
  				 $response['is_inserted'] = false;
					 $this->messageManager->addErrorMessage(__('Record not found.'));
			 }

			 return $response;
	}

	public function saveData($postData)
	{
			 $response['status'] = false;

       $blogConnection = $this->_Conn->create()->load($postData['id']);
			 $blogConnection->setData('user_name', $postData['name']);
			 $blogConnection->setData('email_id', $postData['email']);
			 $blogConnection->setData('phone_number', $postData['phone_number']);
			 $blogConnection->setData('title', $postData['title']);
			 $blogConnection->setData('blog_type', $postData['blog_type']);
			 $blogConnection->setData('description', $postData['description']);
			 $blogConnection->setData('status', 1);
			 $blogConnection->setData('created_at', date("Y-m-d H:i:s"));
			 $blogConnection->setData('updated_at', date("Y-m-d H:i:s"));
			 if($blogConnection->save()){
				 	 $response['status'] = true;
					 $response['is_inserted'] = true;
					 $this->messageManager->addSuccessMessage(__('Record updated.'));
			 }else{
  				 $response['is_inserted'] = false;
					 $this->messageManager->addErrorMessage(__('Record not found.'));
			 }

			 return $response;
	}

	public function deleteRecord($postData)
	{
		$response['status'] = false;
		$blogConnection = $this->_Conn->create();
		$blogConnection->load($postData['id']);
		if($blogConnection->delete()){
				$response['status'] = true;
				$response['is_deleted'] = true;
				$this->messageManager->addSuccessMessage(__('Record deleted successfully.'));
		}else{
				$response['is_deleted'] = false;
				$this->messageManager->addErrorMessage(__("Record can't be deleted."));
		}

		echo json_encode($response, true);exit;
		// return $response;
	}
		public function searchData($postData)
		{
			$response['status'] = false;
			$searchText = (isset($postData['search_text']) && !empty($postData['search_text'])) ? $postData['search_text'] : '';
			$data = $this->_Conn->create()->getCollection()->addFieldToFilter('user_name', array("like" => '%'.$searchText.'%'));
			$response['Data'] = $data;

			echo json_encode($response, true); exit;
 	}
}
