<?php

class Application
{
	protected $controller = 'index';
	
	protected $method = 'index';
	
	protected $params = [];
	
	public function __construct()
	{
		$url = $this->parseUrl();
		
		if(file_exists(dirname(__DIR__).'/controllers/' . $url[0] . '.php')):
		
			$this->controller = 'Controller_' . $url[0];
			
			$current_controller = $url[0];
			
			unset($url[0]);
			
		endif;
		
		require_once dirname(__DIR__).'/controllers/' . $current_controller . '.php';
		
		$this->controller = new $this->controller;
		
		if(isset($url[1])):
		
			if(method_exists($this->controller, $url[1])):
			
				$this->method = $url[1];
				
				unset($url[1]);
				
			endif;
			
		endif;
		
		$this->params = $url ? array_values($url) : [];
		
		call_user_func_array([$this->controller, $this->method], $this->params);
	}
	public function parseUrl()
	{
		if(isset($_GET['url'])): 
		
			return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
			
		endif;
	}
}