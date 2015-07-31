<?php
$allowed = array('png', 'jpg', 'gif','zip');

if(isset($_FILES['ava'])){

	$extension = pathinfo($_FILES['ava']['name'], PATHINFO_EXTENSION);

	if(!in_array(strtolower($extension), $allowed)){

	}
	$name = md5($_FILES['ava']['name']);
	if(move_uploaded_file($_FILES['ava']['tmp_name'], 'avatar/'.$name.".jpg")){
		
		$path = 'avatar/'.$name.".jpg";
		$user_id = $_SESSION['id'];
		$qry="UPDATE users SET ava='$path' where id='$user_id'";
        $result=mysql_query($qry) or die(mysql_error());
		
	}
}

		?>