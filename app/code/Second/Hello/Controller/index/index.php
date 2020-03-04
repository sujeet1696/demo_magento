<?php
namespace Second\Hello\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;

  protected $names = array('Sujeet', 'Vivek', 'Rahul', 'Mohan');

	public function __construct(\Magento\Framework\App\Action\Context $context,\Magento\Framework\View\Result\PageFactory $pageFactory)
	{
		$this->_pageFactory = $pageFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
		echo '<script type="text/javascript"> alert("hello word");</script>';
		// return $this->_pageFactory->create();
		echo '<h1>Second vendor listing(names)</h1><br><br>';
    foreach ($this->names as $name) {
      echo $name.'&nbsp; &nbsp; '.'<button type="button" style="color:green;" onclick="myfun()" name="button"> Save</button><br>';
    }
		exit;
	}

}
