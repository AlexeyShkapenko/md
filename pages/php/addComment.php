<?php 

if (isset($_POST['addComment'])){
	$id_user = $_POST['id'];
	$text = $_POST['new_comment'];
	$id_post = $_POST['id_number'];
	
	if(mysql_query("Insert into comment_text_post (id_user, text, id_post) values('$id_user','$text','$id_post')")){

	}
}