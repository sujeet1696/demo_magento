<?php

namespace Ksolves\HelloWorld\Controller\Index;

use Magento\Framework\App\Action\Context;
use Ksolves\HelloWorld\Model\PostFactory;

class Search extends \Magento\Framework\App\Action\Action
{
    protected $_Post;

    public function __construct(	Context $context,  PostFactory $Post) {

        $this->_Post = $Post;
        parent::__construct($context);
    }

	public function execute()
    {

      $data = $this->getRequest()->getPost();
      // print_r($data);die;
      $Post = $this->_Post->create();

      // $post = $Post->loa('id',trim($data['id']));
      $post = $Post->load($data['id']);

         // echo "<pre>===";
         // print_r($post->getData()); exit;


         $arrayName=$post->getData();

         $response['msg'] = 'Process successfully.';
         $response['data'] = $arrayName;
         $response['status'] = true;
         echo json_encode($response, true);exit;


        if($Post->save()){
            $this->messageManager->addSuccessMessage(__('You saved the data.'));
        }else{
            $this->messageManager->addErrorMessage(__('Data was not saved.'));
        }

        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('Post');
        return $resultRedirect;
    }
}
