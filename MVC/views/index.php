<!DOCTYPE html>
<html>
<body>
<?php if($page == "welcome"): ?>
	Welcome! <br>
	<a href="login">Login</a>
<?php elseif($page == "login"): ?>
Login <br>
<form method ="POST" action="">
  <label for="fname">Username:</label>
  <input type="text" id="username" name="username">
  <?php echo $username_error; ?><br><br>
  <label for="lname">Password:</label>
  <input type="password" id="password" name="password">
  <?php echo $password_error; ?><br><br>
  <input type="submit" value="Login"><br><br>
  To access Admin dashboard: <br> 
  Username: Admin <br>
  Password: admin <br><br>
  To access Staff dashboard: <br>
  Username: Staff <br>
  Password: staff <br><br>
  To access Customer dashboard: <br>
  Username: Customer <br>
  Password: customer
</form>
<?php elseif($page == "loggedin" && $get_user): ?>
You are logged in <?php echo $_SESSION["username"]; ?>! <br>
Welcome to the 
<?php foreach($get_user as $user):
		if($user->user_type == '1'):
			echo "Admin";		
		elseif($user->user_type == '2'):
			echo "Staff";		
		elseif($user->user_type == '3'):
			echo "Customer";
		endif;
	  endforeach;	
?>
 dashboard. <br>
<a href="logout">Logout</a>
<?php endif; ?>
</body>
</html>