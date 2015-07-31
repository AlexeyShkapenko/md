<?php

if(isset($_POST['title'])){

$allowed = array('mp4');

if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error"}';
		exit;
	}
	$name = md5($_FILES['upl']['name']);
	if(move_uploaded_file($_FILES['upl']['tmp_name'], 'movies/'.$name.'.mp4')){
		
		$path = 'movies/'.$name.'.mp4';
		$user_id = $_SESSION['id'];
		$title = $_POST['title'];
		$qry="insert into movie (id_user, path, title) values ('$user_id','$path','$title')";
        $result=mysql_query($qry);	

		
	}
}
}

?>