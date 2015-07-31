<?php
session_start();
include('func.php');
connect_db();

if(isset($_POST['d_friend'])){
	$id = $_POST['d_friend'];
	mysql_query("DELETE from FOLLOWS WHERE id='$id'");
}


?>