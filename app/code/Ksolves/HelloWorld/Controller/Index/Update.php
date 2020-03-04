<?php

namespace Ksolves\HelloWorld\Controller\Index;

use Magento\Framework\App\Action\Context;
use Ksolves\HelloWorld\Model\PostFactory;

class Update extends \Magento\Framework\App\Action\Action
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
    $post = $this->_Post->create();

    $post = $post->load($data['id']);


    // $Post = $this->_Post->create();

    $post->setData('name', $data['name']);
    $post->setData('email', $data['email']);
    $post->setData('phone_number', $data['phone_number']);
    $post->setData('password', md5($data['password']));
    $post->setData('description',$data['description']);





        if($post->save()){
            $this->messageManager->addSuccessMessage(__('You data is updated successfully .'));
        }else{
            $this->messageManager->addErrorMessage(__('Data was not updated .'));
        }

        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('Post');
        return $resultRedirect;
    }
}
