<?php   error_reporting(0);
ini_set('display_errors', 0);
	session_start();
	include('func.php');
	connect_db();
	$user_id = $_SESSION['id'];
	
	if ((isset($_POST['search']))||(isset($_POST['gender']))||(isset($_POST['avatar']))){
		
		$search = $_POST['search'];
		$word = $_POST['search'];


	
		$aa = mysql_query("SELECT * FROM users WHERE first_name LIKE '%" . $word . "%' or last_name LIKE '%" . $word . "%'");
		
		$word_arr = explode(" ", $word);
		
		$word_arr_size = count($word_arr);
		$gender = "";
	    $ava = "";
		if(isset($_POST['gender']) && (($_POST['gender'] == 'female') || ($_POST['gender'] == 'male'))||(isset($_POST['avatar']))){
			$gender = $_POST['gender'];
			
		if($_POST['gender']<>''){
			$ava = "";
			//image/profile.png
		}
		if($word_arr_size == 1){
			$aa_querry = "SELECT * FROM users WHERE (first_name LIKE '%" . $word . "%' and gender = '$gender' and ava='$ava') or (last_name LIKE '%" . $word . "%' and gender = '$gender' and ava LIKE '%" . $ava . "%')";
			$aa = mysql_query($aa_querry);
		} elseif($word_arr_size == 2){
			$aa_querry = "SELECT * FROM users WHERE (first_name LIKE '%" . $word_arr[0] . "%' and last_name LIKE '%" . $word_arr[1] . "%' and gender = '$gender' and ava LIKE '%" . $ava . "%') or (first_name LIKE '%" . $word_arr[1] . "%' and last_name LIKE '%" . $word_arr[0] . "%' and gender = '$gender' and ava LIKE '%" . $ava . "%')";
			$aa = mysql_query($aa_querry);
		}else 
		echo "Простите, составьте запрос правильно."; } else{
			
			if($word_arr_size == 1){
			$aa_querry = "SELECT * FROM users WHERE first_name LIKE '%" . $word . "%' or last_name LIKE '%" . $word . "%'";
			$aa = mysql_query($aa_querry);
			} elseif($word_arr_size == 2){
				$aa_querry = "SELECT * FROM users WHERE (first_name LIKE '%" . $word_arr[0] . "%' and last_name LIKE '%" . $word_arr[1] . "%') or (first_name LIKE '%" . $word_arr[1] . "%' and last_name LIKE '%" . $word_arr[0] . "%')";
				$aa = mysql_query($aa_querry);
			}else 
			echo "Простите, составьте запрос правильно.";
			
		}
		
		
		while ($row = mysql_fetch_array($aa)){
			$user_ava = $row['id'];
			$user_p = mysql_fetch_array(mysql_query("select * from users where id='$user_ava'"));		
			$follow= $row['id'];
			$follows_list = mysql_fetch_array(mysql_query("Select * from follows where from_id='$user_id' and to_id='$follow'"));
			$user_p = mysql_fetch_array(mysql_query("select * from users where id='$user_ava'"));
		?>

		<li class="collection-item avatar">
		  <a href="profile.php?id=<?php echo $row['id']; ?>" target="_blank"><img src="<?php echo $user_p['ava'] ?>" alt="avatar" class="circle"></a>
		  <span class="title"><?php echo $row['first_name'].' '.$row['last_name']; ?></span>
		  <p> Born date: <?php echo ' ' .$row['born_date']; ?> </p>
		  <div id="<?php echo $row['id'] ?>">
		  <?php 
			if($user_id == $row['id']){
		  ?>
		  
		  <a class="secondary-content btn-floating btn-large waves-effect waves-light teal lighten-3" onClick=" Materialize.toast('Its you!', 4000)"><i class="mdi-image-tag-faces"></i></a>		  
		  
			 <?php } 
			 elseif(!empty($follows_list)){ ?>
			 
			<a class="secondary-content btn-floating btn-large waves-effect waves-light lime lighten-2" onClick="delete_friend(<?php	echo $follows_list['id'] ?>);"><i class="mdi-action-done-all"></i></a>
			 
			 <?php
			 } else { ?>
		  <a class="secondary-content btn-floating btn-large waves-effect waves-light lime lighten-2" onClick="add_friend(<?php	echo $row['id'] ?>);"><i class="mdi-content-add"></i></a>
		  
		  </div>
		</li>

		<?php }}} ?>
