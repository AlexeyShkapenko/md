<?php
header('Content-Type: text/html; charset=UTF-8');
function hiding($password){
    $password = md5($password);
    return $password;
}

function connect_db(){
	$db = mysql_connect('localhost', 'root', '');
	mysql_select_db('mater', $db);
}

