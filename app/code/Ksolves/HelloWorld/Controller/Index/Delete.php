<?php

namespace Ksolves\HelloWorld\Controller\Index;

use Magento\Framework\App\Action\Context;
use Ksolves\HelloWorld\Model\PostFactory;

class Delete extends \Magento\Framework\App\Action\Action
{
    protected $_Post;

    public function __construct(	Context $context,  PostFactory $Post) {

        $this->_Post = $Post;
        parent::__construct($context);
    }

	public function execute()
    {
      $data = $this->getRequest()->getPost();

      $Post = $this->_Post->create();

      if(isset($data['email']) && !empty($data['email'])) {
        $Post = $Post->getCollection()->addFieldToFilter('email',trim($data['email']));


        $dbData = $Post->getData();
        if(isset($dbData[0]['id']) && !empty($dbData[0]['id'])) {

          $Post = $this->_Post->create();

          $Post = $Post->load($dbData[0]['id']);

          if($Post->delete()){
            $this->messageManager->addSuccessMessage(__('Your data is Deleted successfully.'));
          }else{
            $this->messageManager->addErrorMessage(__('Data was not Deleted.'));
          }
        }else {
          $this->messageManager->addErrorMessage(__('Record not Found.'));
        }

      } else {
        $Post = $Post->load($data['id']);

        if($Post->delete()){

          $response['msg'] = 'Your data is Deleted successfully.';
          $response['data'] = array();
          $response['status'] = true;


        }else{
          $response['msg'] = 'Data was not Deleted.';
          $response['data'] = array();
          $response['status'] = false;

        }

        echo json_encode($response, true); exit;
      }


        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('Post');
        return $resultRedirect;
    }
}
