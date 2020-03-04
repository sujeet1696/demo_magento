<?php

  function insertdata($name,$email,$phno,$pass,$confmpass) {

  $post = $objectManager->create('Ksolves\HelloWorld\Model\Post');
  $post->setName($name);
  $post->setEmail($email);
  $post->setPhno($phno);
  $post->setPass($pass);
  $post->setConfmpass($confmpass);
  $post->save();
}

function deletedata($id){
  $post = $objectManager->create('Ksolves\HelloWorld\Model\Post')->load($id);
  $post->delete();
}

function updatedata($id){
  $post = $objectManager->create('Ksolves\HelloWorld\Model\Post')->load($id);
    insertdata();
}

function alldata(){
    $post = $objectManager->create('Ksolves\HelloWorld\Model\Post')->getCollection();
    echo "<pre>===";
    print_r($post->getData());
}

function finddata($id){
$post = $objectManager->create('Ksolves\HelloWorld\Model\Post')->getCollection()->addFieldToFilter('id',$id);
echo "<pre>===";
print_r($post->getData());
}

 ?>
