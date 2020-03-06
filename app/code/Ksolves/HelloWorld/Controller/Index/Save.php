<?php

namespace Ksolves\HelloWorld\Controller\Index;

use Magento\Framework\App\Action\Context;
use Ksolves\HelloWorld\Model\PostFactory;

class Save extends \Magento\Framework\App\Action\Action
{
    protected $_Post;

    public function __construct(	Context $context,  PostFactory $Post) {

        $this->_Post = $Post;
        parent::__construct($context);
    }

	public function execute()
    {


        $data = $this->getRequest()->getPost();
          // print_r($data); die;

         $Post = $this->_Post->create();


        $Post->setData('name', $data['name']);
        $Post->setData('email', $data['email']);
        $Post->setData('phone_number', $data['phone_number']);
        $Post->setData('password', md5($data['password']));
        $Post->setData('description',$data['description']);
    //  $Post->setData('confmpass', $data['confmpass']);
        // $Post->setData($data);
        // print_r($d);die;
        // $d = $Post->save();
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
