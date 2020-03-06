<?php
namespace First\HelloWorld\Block;
class Display extends \Magento\Framework\View\Element\Template
{
	public function __construct(\Magento\Framework\View\Element\Template\Context $context)
	{
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
}
