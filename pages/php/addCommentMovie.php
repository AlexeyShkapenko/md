<?php
session_start();
include('func.php');
connect_db();
$id_movie = $_POST['id'];
$user_comment = mysql_query("select * from comment_movie where id_movie='$id_movie' ORDER BY id");
while($arr1 = mysql_fetch_array($user_comment)){
	?>
	<div class="container-fluid">
		<div class="card-panel teal lighten-3">
			<div class="row valign-wrapper" style="margin-bottom:3px">
				<div class="col m4 valign-wrapper">												
					<?php $lefter = $arr1['id_user']; 
						$lefter_inf = mysql_fetch_array(mysql_query("select * from users where id='$lefter'"));
					?>													
			<div class="card">
				<div class="card-image waves-effect waves-block waves-light">
					<img class="activator" src="<?php echo $lefter_inf['ava'] ?>">
				</div>
			<div>
			<div class="center-align">
				<a href="profile.php?id<?php echo $lefter_inf['id'] ?>"><span style="font-size: 1.2em"><?php echo $lefter_inf['first_name']." ".$lefter_inf['last_name']; ?></span></a>
			</div>
			</div>
			</div>
			</div>
				<div class="col m8" style="height:100%">
													
					<div class="card-panel teal lighten-4">
						<span>
							<?php echo $arr1['text']; ?>
						</span>
					</div>
					<div class="teal lighten-3 right">
						<span>
							<?php echo "Time: ".$arr1['time']; ?>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
}
?> 

<div class="row">
			<div class="input-field col s12">
				<textarea name="new_comment" id="new_comment" class="materialize-textarea"></textarea>
					<label for="textarea1">Write your comment</label>
			</div>
			<div style="padding-left: 1.5em">
			<a class="waves-effect waves-light btn" name="addComment" onClick="sendCom(<?php	echo $id_movie; ?>)">Send</a>
			</div>
</div>

<?php

if ((isset($_POST['comment']))&&(isset($_POST['id']))){
	if(!empty($_POST['comment'])){
	$id_user = $_SESSION['id'];
	$text = $_POST['comment'];
	$id_movie = $_POST['id'];
	
	if(mysql_query("Insert into comment_movie (id_user, text, id_movie) values('$id_user','$text','$id_movie')")){

}}}
?>