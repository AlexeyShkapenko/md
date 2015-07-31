<?php

include('php/func.php');
connect_db();
session_start();
// A list of permitted file extensions
$allowed = array('png', 'jpg', 'gif','zip');

if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error"}';
		exit;
	}
	$name = md5($_FILES['upl']['name']);
	if(move_uploaded_file($_FILES['upl']['tmp_name'], 'images/'.$name)){
		
		$path = 'images/'.$name;
		$user_id = $_SESSION['id'];
		$qry="insert into images (name,user_name, user_id, path) values ('$name','$name','$user_id','$path')";
        $result=mysql_query($qry);	
		
		echo '{"status":"success"}';
		exit;
		
	}
}

echo '{"status":"error"}';
exit;