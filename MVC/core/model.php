<?php

class Model 
{
	function __construct() {
		
		$this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		
	}
}