<?php

class Controller
{
	protected function model($model)
	{
		require_once dirname(__DIR__).'/models/' . $model . '.php';
		
		$model_name = 'Model_' . $model;
		
		return new $model_name;
	}
	
	protected function view($view, $data = [])
	{
		extract($data);
		
		require_once dirname(__DIR__).'/views/' . $view . '.php';
	}
}