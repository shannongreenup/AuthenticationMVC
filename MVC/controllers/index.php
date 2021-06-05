<?php

class Controller_Index extends Controller
{
	public function index()
	{
		session_start();
		
		$page = "welcome";

		$username_error = "";

		$password_error = "";

		$changed = "";
		
		$this->view('index', ['page' => $page]);
	}
	
	public function login()
	{
		session_start();
		
		$page = "login";
		
		$username_error = "";

		$password_error = "";
		
		$login_user = "";
		
		if($_SERVER["REQUEST_METHOD"] == "POST"):
			if(!isset($_POST["username"]) || empty($_POST["username"])):
				$username_error = "Username is blank."; 
			endif;
			
			if(!isset($_POST["password"]) || empty($_POST["password"])):
				$password_error = "Password is blank.";
			endif;
			
			if((!empty($_POST["username"]) && !empty($_POST["password"]))):
				$login_user = $this->model('user')->login_user($_POST["username"], $_POST["password"]);
				
				if($login_user):
				
					$_SESSION["username"] = $_POST["username"];
			
					header('Location: '.URL.'index/dashboard');
				
					die;
				
				endif;
			endif;
		endif;
			
		$this->view('index', ['page' => $page, 'username_error' => $username_error, 'password_error' => $password_error, 'login_user' => $login_user]);
	}	
	
	public function dashboard()
	{
		session_start();
		
		$page = "loggedin";
		
		$get_user = $this->model('user')->get_user($_SESSION["username"]);
			
		$this->view('index', ['page' => $page, 'get_user' => $get_user]);
	}	
	
	public function logout()
	{
		session_unset();
		
		session_destroy();
		
		header('Location: '.URL.'index/');
				
		die;
	}
}