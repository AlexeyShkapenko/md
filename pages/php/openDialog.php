<?php

	if(isset($_GET['id_one']) && isset($_GET['id_two']) && isset($_GET['dialog'])){
		$dialog_id = $_GET['dialog'];
		$id_one = $_GET['id_one'];
		$id_two = $_GET['id_two'];

if(isset($_POST['text'])){
	
	$message = $_POST['text'];
	if($id_one == $user_id){
		mysql_query("insert into pm (from_id, to_id, message, id_dialog) values ('$user_id', '$id_two', '$message', '$dialog_id')");
	} elseif($id_two == $user_id){
		mysql_query("insert into pm (from_id, to_id, message, id_dialog) values ('$user_id', '$id_one', '$message', '$dialog_id')");
	}

}

		?>
	<div class="container-fluid grey lighten-5">
	<div id="openDialog" class="row grey lighten-3" style="height:500px; overflow-y: auto;">
	<?php
	
	$pm_arr = mysql_fetch_array(mysql_query("select * from pm where id='$dialog_id'"));
	
	if ($pm_arr['from_id'] == $user_id){
			?>
			<div class="row">
				<div class="col m10">
					<div class="card-panel blue accent-1">
					<?php
					$sender_one_id = $pm_arr['from_id'];
					$sender_one = mysql_fetch_array(mysql_query("select * from users where id='$sender_one_id'"));					
					?>
					<a href="profile.php?id=<?php echo $pm_arr['from_id']?>"><span><?php echo $sender_one['first_name'].' '.$sender_one['last_name'] ?></span></a><br>
					<span class="flow-text"> <?php echo $pm_arr['message'] ?> </span>
					</div>
				</div>
			</div>
			<?php
			} if($pm_arr['from_id'] <> $user_id){
			?>
			<div class="row">
				<div class="offset-m2 col m10">
					<div class="card-panel green accent-1">
					<?php
					$sender_one_id = $pm_arr['from_id'];
					$sender_one = mysql_fetch_array(mysql_query("select * from users where id='$sender_one_id'"));					
					?>
					<a href="profile.php?id=<?php echo $pm_arr['from_id']?>"><span><?php echo $sender_one['first_name'].' '.$sender_one['last_name'] ?></span></a><br>
					<span class="flow-text"> <?php echo $pm_arr['message'] ?> </span>
					</div>
				</div>
			</div>
			<?php
		}
		
		$dialog_pm = mysql_query("select * from pm where id_dialog='$dialog_id'");
		while ($pm_arr = mysql_fetch_array($dialog_pm)){
			if ($pm_arr['from_id'] == $user_id){
			?>
			<div class="row">
				<div class="col m10">
					<div class="card-panel blue accent-1">
					<?php
					$sender_one_id = $pm_arr['from_id'];
					$sender_one = mysql_fetch_array(mysql_query("select * from users where id='$sender_one_id'"));					
					?>
					<a href="profile.php?id=<?php echo $pm_arr['from_id']?>"><span><?php echo $sender_one['first_name'].' '.$sender_one['last_name'] ?></span></a><br>
					<span class="flow-text"> <?php echo $pm_arr['message'] ?> </span>
					</div>
				</div>
			</div>
			<?php
			} if($pm_arr['from_id'] <> $user_id){
			?>
			<div class="row">
				<div class="offset-m2 col m10">
					<div class="card-panel green accent-1">
					<?php
					$sender_one_id = $pm_arr['from_id'];
					$sender_one = mysql_fetch_array(mysql_query("select * from users where id='$sender_one_id'"));					
					?>
					<a href="profile.php?id=<?php echo $pm_arr['from_id']?>"><span><?php echo $sender_one['first_name'].' '.$sender_one['last_name'] ?></span></a><br>
					<span class="flow-text"> <?php echo $pm_arr['message'] ?> </span>
					</div>
				</div>
			</div>
			<?php
		}}
		?>
	</div>
	<form id="message_send" name="message" method="POST">
		<div class="row white">
			<div class="input-field col s12">
			  <textarea id="textarea1" class="materialize-textarea" name="text"></textarea>
			  <label for="textarea1">Write your message</label>
			</div>			
		</div>
		<div class="row">
			<button class="btn waves-effect waves-light right" onClick="$('#message_send').submit();">Submit
				<i class="mdi-content-send"></i>
			</button>
		</div>
	</form>
		</div>		
		<?php
	} else {
		?>
		<div class="center">
		<span class="flow-text">Choose dialogue.</span>
		</div>
		<?php
	}

?>