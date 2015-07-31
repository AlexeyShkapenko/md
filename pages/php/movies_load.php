<?php
include('func.php');
connect_db();
if(isset($_POST['id'])){
	$id = $_POST['id'];
	$movies_list = mysql_fetch_array(mysql_query("select * from movie where id='$id'"));
?>
<div class="row">
<video style="width:100%" class="responsive-video" controls>
    <source src="<?php echo  $movies_list['path']?>" type="video/mp4">
 </video>
</div>
<div class="row" style="margin-bottom:0">
<?php if($movies_list['Description']<>''){ ?>
	<div class="card-panel grey lighten-2">
		<p> <?php echo $movies_list['Description'] ?> </p>
	</div>
</div>
<?php
}
$id_uploader = $movies_list['id_user'];
$author = mysql_fetch_array(mysql_query("Select * from users where id='$id_uploader'")); 
?>
	<div class="card grey lighten-3 container-fluid" style="padding-top: 10px">
	<div class="row">
		<div class="col m6 left">
			<a href="profile.php?id=<?php echo $author['id'] ?>"><?php echo $author['first_name']." ".$author['last_name']; ?> </a>
		</div>		
		<div class="col m6 right-align">
			<?php echo $movies_list['time'] ?>
		</div>
	</div>
	</div>
<?php
}
?>