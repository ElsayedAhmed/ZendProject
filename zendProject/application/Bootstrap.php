<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	protected function _initPlaceholders()
	{
		$this->bootstrap('View');
		$view = $this->getResource('View');
		
		$view->headTitle('LikeLynda');

		$view->headLink()->prependStylesheet('/zendProject/ZendProject/zendProject/public/assets/css/bootstrap-theme.css');
		$view->headLink()->prependStylesheet('/zendProject/ZendProject/zendProject/public/assets/css/bootstrap.min.css');
		$view->headLink()->prependStylesheet('/zendProject/ZendProject/zendProject/public/assets/css/font-awesome.min.css');
		$view->headLink()->appendStylesheet('/zendProject/ZendProject/zendProject/public/assets/css/style.css');

		$view->headScript()->prependFile('/zendProject/ZendProject/zendProject/public/assets/js/custom.js');

		$view->headMeta()->appendName('viewport', 'width=device-width, initial-scale=1.0');
		$view->headMeta()->appendName('description', 'eLearning is a modern and fully responsive Template by WebThemez.');
		$view->headMeta()->appendName('author', 'webThemez.com');

		$view->headMeta()->appendHttpEquiv('Content-Type', 'text/html;charset=utf8');

	}

}

