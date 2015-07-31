<?php 

if (isset($_POST['addPost'])){
	$user_id = $_SESSION['id'];
	$post_name = $_POST['post_name'];
	$post_content = $_POST['post_content'];
	
	if(mysql_query("Insert into text_post (user_id, name, content) values('$user_id','$post_name','$post_content')")){
		?>
			<script>
				$('#new_post').closeModal();
				Materialize.toast('Post was added!', 4000);
			</script>
		<?php
	}
}