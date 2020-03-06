<?php

namespace First\HelloWorld\Plugin;

class ExamplePlugin
{

	public function beforeSetTitle(\First\HelloWorld\Controller\Index\Index $subject, $title)
	{
		$title = $title . " to ";
		echo __METHOD__ . "</br>";

		return [$title];
	}


	public function afterGetTitle(\First\HelloWorld\Controller\Index\Index $subject, $result)
	{

		echo __METHOD__ . "</br>";

		return '<h1>'. $result . 'First.com' .'</h1>';

	}


	public function aroundGetTitle(\First\HelloWorld\Controller\Index\Index $subject, callable $proceed)
	{

		echo __METHOD__ . " - Before proceed() </br>";
		 $result = $proceed();
		echo __METHOD__ . " - After proceed() </br>";


		return $result;
	}

}
