<?php
	
	$dialog_list = mysql_query("select * from pm where (id_dialog=0 and to_id='$user_id') or (id_dialog=0 and from_id='$user_id')");
	
	if( mysql_num_rows($dialog_list) < 1){
		?>
		<div class="center">
		<span class="flow-text">Sorry, you have no dialogues yet.</span>
		</div>
		<?php
	} else{
		while($arr = mysql_fetch_array($dialog_list)){
		?>
		
		<div class="card-panel avatar center">
			<form action="messages.php" method="GET" onClick="$(this).submit();">
			  <span>Dialog name</span>
			  <p>Date of creation:<br> <?php echo $arr['time_sent']; ?></p>
			  <input name="id_one" type="hidden" value="<?php echo $arr['from_id'] ?>">
			  <input name="id_two" type="hidden" value="<?php echo $arr['to_id'] ?>">
			  <input name="dialog" type="hidden" value="<?php echo $arr['id'] ?>">
			</form>
		</div>
		
	<?php } } ?>