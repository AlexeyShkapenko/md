<?php 
if (isset($_POST['sendMes'])) {	

	$from_id = $_SESSION['id'];
	$to_id = $_POST['deliver'];
	$message = $_POST['message'];

$dialog_list = mysql_query("select * from pm where (id_dialog=0 and to_id='$to_id' and from_id='$from_id') or (id_dialog=0 and to_id='$from_id' and from_id='$to_id')");

$dialog_list_d = mysql_fetch_array($dialog_list);
$id_dialog = $dialog_list_d['id'];

	if (mysql_fetch_array($dialog_list) == "")
	{
		mysql_query("Insert into pm (to_id, from_id, message, opened, recipientDelete, senderDelete, id_dialog) values('$to_id','$from_id','$message','0','0','0','$id_dialog')");
			?>
				<script>
					$('#message').closeModal();
					Materialize.toast('Message was sent!', 4000);
				</script>
			<?php
	} else 
		{
			mysql_query("Insert into pm (to_id, from_id, subject, message, opened, recipientDelete, senderDelete, id_dialog) values('$to_id','$from_id','$subject','$message','0','0','0','$id_dialog')");
		}

	

}