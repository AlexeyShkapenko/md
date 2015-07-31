<?php

if(isset($_POST['title'])){

$allowed = array('mp3');

if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error"}';
		exit;
	}
	$name = md5($_FILES['upl']['name']);
	if(move_uploaded_file($_FILES['upl']['tmp_name'], 'music/'.$name.'.mp3')){
		
		$path = 'music/'.$name.'mp3';
		$user_id = $_SESSION['id'];
		$title = $_POST['title'];
		$artist = $_POST['artist'];
		$qry="insert into music (id_user, path, title, artist) values ('$user_id','$path','$title','$artist')";
        $result=mysql_query($qry);	
		
		echo '{"status":"success"}';
		exit;
		
	}
}

echo '{"status":"error"}';
exit;}