<?php
session_start();
include('func.php');
connect_db();

if(isset($_POST['friend'])){
	$friend = $_POST['friend'];
	$user = $_SESSION['id'];
	mysql_query("insert into follows (to_id, from_id) values ('$friend','$user')");
}


?>