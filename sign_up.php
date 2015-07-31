<?php
include('pages/php/func.php');

connect_db();

if((empty($_POST['first_name']))|| (empty($_POST['last_name'])) || (empty($_POST['password'])) || (empty($_POST['email'])) || (empty($_POST['date']))){
	

			
				echo "
					<script> 
					$(document).ready(function() {
					Materialize.toast('Fill all necessary fields.', 15000);
					});
					</script>";
				

	} else 
	{
	
	
		$first_name = mysql_real_escape_string($_POST['first_name']);
		$last_name = mysql_real_escape_string($_POST['last_name']);
		$password = mysql_real_escape_string($_POST['password']);
		$email = mysql_real_escape_string($_POST['email']);
		$date = mysql_real_escape_string($_POST['date']);
		$question = mysql_real_escape_string($_POST['question']);
		$answer = mysql_real_escape_string($_POST['answer']);
		$country = mysql_real_escape_string($_POST['country']);
		$biography = mysql_real_escape_string($_POST['biography']);
		
		$password = hiding($password);
		
		$check_email = mysql_num_rows(mysql_query("select * from users where email='$email'"));

		if($check_email == 0)
		{
			
			if(mysql_query("insert into users(first_name, last_name, password, email, born_date, biography,country, question, answer, ava) values('$first_name','$last_name','$password','$email','$date','$biography','$country','$question','$answer','image/profile.png') "))
			{
				
				echo "
					<script> 
					$(document).ready(function() {
					Materialize.toast('<span>You have been registed</span><a class=&quot;btn-flat yellow-text&quot; href=index.php>Undo<a>', 15000);
					clearAll();
					});
					</script>";			
					
			} else 
			{
					
					?>
					
						<div class="card red accent-1 center">
							<h6> Простите, что-то пошло не так. </h6>
						</div>
					
					<?php 
			}

		} 		
		else 
			{
				
				echo "
					<script> 
					$(document).ready(function() {
					Materialize.toast('This email is already used.', 15000);
					});
					</script>";
				

			}
	}
?>