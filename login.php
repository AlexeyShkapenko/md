<?php
	session_start();
	include('pages/php/func.php');

	connect_db();
	
	if((isset($_POST['email'])) && (isset($_POST['password']))){
		
		$email = $_POST['email'];
		$password = hiding($_POST['password']);
		
		$users = mysql_num_rows(mysql_query("select * from users where email='$email'"));
		if ($users <> 0 ){
			
			$pass_prove = mysql_fetch_array(mysql_query("select * from users where email='$email' and password='$password'"));
			
			if ($pass_prove <> 0 ) {
				if($pass_prove['blocked'] == 1){
					
					echo "
					<script> 
					$(document).ready(function() {
					Materialize.toast('You are blocked.', 10000);
					});
					</script>";		
					
				}
				else{
				echo "<script> 
				document.location.replace('pages/profile.php');
				clearAll(); </script>";
				$_SESSION['email'] = $email;
				$_SESSION['password'] = $password;
				$_SESSION['id'] = $pass_prove['id'];}
			} else
				echo "
					<script> 
					$(document).ready(function() {
					Materialize.toast('The password is incorrect.', 10000);
					});
					</script>";				
		} else
			echo "
					<script> 
					$(document).ready(function() {
					Materialize.toast('Unknown user, sorry.', 10000);
					});
					</script>";	
		
	}