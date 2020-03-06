<?php

namespace Ksolves\HelloWorld\Controller\Index;

use Magento\Framework\App\Action\Context;
use Ksolves\HelloWorld\Model\PostFactory;

class Showall extends \Magento\Framework\App\Action\Action
{
    protected $_Post;

    public function __construct(	Context $context,  PostFactory $Post) {

        $this->_Post = $Post;
        parent::__construct($context);
    }

	public function execute()
    {

      $Post = $this->_Post->create();
      $Post = $Post->getCollection();
      // $post = $objectManager->create('Ksolves\HelloWorld\Model\Post')->getCollection();
      // echo "<pre>===";
      // print_r($post->getData());

      $response['msg'] = 'Process successfully.';
      $response['data'] = $Post->getData();
      $response['status'] = true;
      echo json_encode($response, true); exit;

        // if($Post->getData()){
        //     // $this->messageManager->addSuccessMessage(__('You saved the data.'));
        // }else{
        //     $this->messageManager->addErrorMessage(__('Data was not saved.'));
        // }

        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('Post');
        return $resultRedirect;
    }
}
