<?php

class Model_User extends Model
{
	public function login_user($username = '', $password = '')
	{
		$result = $this->db->query("SELECT * FROM user WHERE username = '$username' AND password = '$password'");
		
		if($result):
	
			if($result->num_rows === 0):
		
				$results = NULL;
			
			else:		
		
				while($row = $result->fetch_object()):
			
					$results[] = $row;
				
				endwhile;
			
			endif;
		
			return $results;
			
		else:
		
			echo mysqli_error($this->db);
		
		endif;
	}	
	
	public function get_user($username = '')
	{
		$result = $this->db->query("SELECT * FROM user WHERE username = '$username'");
		
		if($result):
	
			if($result->num_rows === 0):
		
				$results = NULL;
			
			else:		
		
				while($row = $result->fetch_object()):
			
					$results[] = $row;
				
				endwhile;
			
			endif;
		
			return $results;
			
		else:
		
			echo mysqli_error($this->db);
		
		endif;
	}
}