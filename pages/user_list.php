<?php
	session_start();
	if ((!isset($_SESSION['email'])) || (!isset($_SESSION['email'])) || (!isset($_SESSION['email']))){
		  header("Location: ../index.php");
	}
	include('php/func.php');
	connect_db();
	$user_id = $_SESSION['id'];
	$user_inf = mysql_fetch_array(mysql_query("select * from users where id='$user_id'"));
?>
<!DOCTYPE html>
  <html>
    <head>
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	  <link type="text/css" rel="stylesheet" href="css/user.css"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	  <script>
		function search_user(some, ava){
			$.ajax({
					type: "POST",
					url: "/materialize/pages/php/search.php",
					data:({ search: $("#search").val(),
					gender: some,
					avatar: ava
				
					}),
					success: function (html) {
						$("#result").empty();
						$("#result").append(html);
					},
					error: function (html)
					{

					}
				});
		}
		function add_friend(id){
			$.ajax({
					type: "POST",
					url: "/materialize/pages/php/add_friend.php",
					data:({ friend: id
					
					}),
					success: function (html) {
						location.reload();
					},
					error: function (html)
					{

					}
				});
		}
		function delete_friend(id){
			$.ajax({
					type: "POST",
					url: "/materialize/pages/php/delete_friend.php",
					data:({ d_friend: id
					
					}),
					success: function (html) {
						location.reload();
					},
					error: function (html)
					{

					}
				});
		}
	  </script>
	  
    </head>

    <body>
<header>
	<div class="navbar">
	  <ul id="operations" class="dropdown-content">
	  <li><a href="settings.php?page=main">Settings</a></li>
	  <?php if($user_inf['admin'] == 1){ ?>
	  	  <li class="divider"></li>
		  <li><a href="admin.php?page=user_list">Admin</a></li>
	  <?php } ?>
	  <li class="divider"></li>
	  <li><a href="php/logout.php">LogOut<span class="Medium mdi-maps-directions-walk"></span></a></li>
	</ul>
	
	  <nav class="indigo accent-2">
		<div class="nav-wrapper">
		  <a href="#" class="brand-logo right">M and D</a>
		  <ul id="nav-mobile" class="left hide-on-med-and-down">
			<li><a href="profile.php">My profile</a></li>
			<li class="active"><a href="user_list.php">Users</a></li>
			<li><a href="messages.php">Messages</a></li>
			<li><a href="gallery.php">Photos</a></li>
			<li><a href="music.php">Music</a></li>
			<li><a href="movies.php">Movies</a></li>
			<li><a href="#">Events</a></li>
			<li><a href="#">Developers Blog</a></li>
			<li><a class="dropdown-button" href="#!" data-activates="operations">Operations<i class="mdi-navigation-arrow-drop-down right"></i></a></li>
		  </ul>
		  <ul class="side-nav" id="mobile-demo">
			<li><a href="profile.php">My profile</a></li>
			<li class="active"><a href="user_list.php">Users</a></li>
			<li><a href="messages.php">Messages</a></li>
			<li><a href="gallery.php">Photos</a></li>
			<li><a href="music.php">Music</a></li>
			<li><a href="movies.php">Movies</a></li>
			<li><a href="#">Events</a></li>
			<li><a href="#">Developers Blog</a></li>
		  </ul>
		</div>
	  </nav>
  </div>
</header>
<main>
<div class="container-fluid">
<div class="row">
<div class="col s2">


<ul>	
	<li><a class="active" href="http://localhost/jdi/materialize/pages/user_list.php">People list</a></li>
	<li><a href="http://localhost/jdi/materialize/pages/user_list.php?page=friends">Friends</a></li>
	<li><a href="#!">Followers</a></li>
	<li><a href="#!">Your follows</a></li>
</ul>



</div>

<div class="col s8 deep-purple accent-1 z-depth-2 user-container">
	<nav autocomplete="off">
		<div class="nav-wrapper">

			<div class="input-field">
			  <input id="search" type="search" onkeydown="var gender = 1; search_user(gender);" required>
			  <label for="search"><i class="mdi-action-search"></i></label>
			  <i class="mdi-navigation-close"></i>
			</div>

		</div>
	  </nav>	
	<ul id="result" class="collection">
		<?php 
		if (isset($_GET['page'])){
		if ($_GET['page'] == 'people'){
			$id = $_SESSION['userid'];
			$user_list = mysql_query("select * from follows where to_id='$id' and friends='1' or from_id='$id' and friends='1' ");
			while($arr = mysql_fetch_array($user_list)){
				$user_ava = $arr['id'];
				$user_p = mysql_fetch_array(mysql_query("select * from users where id='$user_ava'"));
				$friend_id = $arr['to_id'];
				$friend = mysql_fetch_array(mysql_query("select * from follows where to_id='$id' and friends='1' or from_id='$id' and friends='1' "));
		?>

		<li class="collection-item avatar">
		  <a href=""><img src="<?php echo $user_p['ava'] ?>" alt="avatar" class="circle"></a>
		  <span class="title"><?php echo $arr['first_name'].' '.$arr['last_name']; ?></span>
		  <p> Born date: <?php echo ' ' .$arr['born_date']; ?> </p>
		  <a href="#!" class="secondary-content"><i class="mdi-action-grade"></i></a>
		  <a class="waves-effect waves-light btn">Stuff</a>
		</li>

		<?php
			
		}}} else {
			$user_list = mysql_query("select * from users");
			while($arr = mysql_fetch_array($user_list)){	
			
			$follow= $arr['id'];
			$follows_list = mysql_fetch_array(mysql_query("Select * from follows where from_id='$user_id' and to_id='$follow'"));
			$user_ava = $arr['id'];
			$user_p = mysql_fetch_array(mysql_query("select * from users where id='$user_ava'"));
		?>

		<li class="collection-item avatar">
		  <a href="profile.php?id=<?php echo $arr['id']; ?>" target="_blank"><img src="<?php echo $user_p['ava'] ?>" alt="avatar" class="circle"></a>
		  <span class="title"><?php echo $arr['first_name'].' '.$arr['last_name']; ?></span>
		  <p> Born date: <?php echo ' ' .$arr['born_date']; ?> </p>
		  <div id="<?php echo $arr['id'] ?>">
		  <?php 
			if($user_id == $arr['id']){
		  ?>
		  
		  <a class="secondary-content btn-floating btn-large waves-effect waves-light teal lighten-3" onClick=" Materialize.toast('Its you!', 4000)"><i class="mdi-image-tag-faces"></i></a>		  
		  
			 <?php } 
			 elseif(!empty($follows_list)){ ?>
			 
			<a class="secondary-content btn-floating btn-large waves-effect waves-light lime lighten-2" onClick="delete_friend(<?php	echo $follows_list['id'] ?>);"><i class="mdi-action-done-all"></i></a>
			 
			 <?php
			 } else { ?>
		  <a class="secondary-content btn-floating btn-large waves-effect waves-light lime lighten-2" onClick="add_friend(<?php	echo $arr['id'] ?>);"><i class="mdi-content-add"></i></a>
		  
		  </div>
		</li>

		<?php }}} ?>
	</ul>
</div>
<div class="col s2">
	<div class="card blue-grey darken-1">
            <div class="card-content white-text">
			<div class="container-fluid">
			<div class="row">
              <span class="card-title">Search card</span>
            <form id="gender" action="" method="POST">
			   <span>Choose gender</span>
				<p>
				  <input name="gender" type="radio" id="test1" value="1" onClick="search_user('male');"/>
				  <label for="test1">Male</label>
				</p>
				<p>
				  <input name="gender" type="radio" id="test2" value="2" onClick="search_user('female');"/>
				  <label for="test2">Female</label>
				</p>
				<p>
				  <input class="with-gap" name="gender" type="radio" id="test3"  value="3" onClick="search_user('');"/>
				  <label for="test3">Doesn't matter</label>
				</p>
			</form>
			</div>
			    <div class="divider"></div>
			<div class="row">
			<form action="#">
				<span>Enter age</span>
				
					<p class="range-field">
					  <input type="range" name="group2" id="test5" min="0" max="100" />
					</p>
					
			</form>
			</div>
			<div class="divider"></div>
			<div class="row">
            <form id="avatar" action="" method="POST">
				    <span>Avatar</span>
				    <div class="switch">
						<label>
							Yes
							<input name="avatar" type="checkbox" onClick="search_user('','yes');">
							<span class="lever"></span>
							No
						</label>
				    </div>
			</form>
			</div>
            </div>
			</div>
            <div class="card-action">
				<button class="btn waves-effect waves-light" type="submit" name="action">Go go go
					<i class="mdi-content-send right"></i>
				</button>
            </div>
    </div>
</div>
<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large red" >
      <i class="large mdi-editor-mode-edit"></i>
    </a>
    <ul>
      <li><a class="btn-floating red" href='profile.php?id=<?php echo $_SESSION['id'] ?>'><i class="large mdi-action-account-circle"></i></a></li>
      <li><a class="btn-floating yellow darken-1" href="settings.php?page=main"><i class="large mdi-image-edit"></i></a></li>
      <li><a class="btn-floating green modal-trigger" href="#message""><i class="large mdi-content-mail"></i></a></li>
      <li><a class="btn-floating blue" href="posts.php?id=<?php echo $_SESSION['id'] ?>"><i class="large mdi-content-inbox"></i></a></li>
    </ul>
</div>		  
</div>
</div>

</main>

  <div id="message" class="modal">
  <form method="POST" action="profile.php" class="col s12">
    <div class="modal-content">
      <h4 class="center">Отправьте сообщение</h4>
        <div class="row">
		<div class="row">		  
		    <div class="input-field col s12">
				<select name="deliver" required>
				  <option value="" disabled selected>Choose deliver</option>
				  <?php  
					$user_list = mysql_query("select * from users");
					while($arr = mysql_fetch_array($user_list)){
				  ?>
				  <option value="<?php echo $arr['id']; ?>"> <?php echo $arr['first_name'].' '.$arr['last_name']; ?> </option>
				  
					<?php } ?>
				</select>
				<label>Выберите получателя</label>
			</div>
		</div>
		  <div class="row">
			<div class="input-field col s12">
			  <textarea id="messagearea" class="materialize-textarea" name="message" required></textarea>
			  <label for="messagearea">Введите текст сообщения</label>
			</div>			
		  </div>
	  </div>
    </div>
    <div class="modal-footer">
	<div class="container">
	  	<div class="row">
			<div class="input-field col s6">
				<button type="reset" class="btn modal-action modal-close modal-close waves-effect waves-green left">Cancel</button>
			</div>
			<div class="input-field col s6">
				<button type="submit" class="btn waves-effect waves-green right" name="sendMes">Send</button>
			</div>
		</div>
	</div>
    </div>
	</form>
  </div>

<?php include('php/footer.php'); ?>	
  
      <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
	  	<script>
	    $(document).ready(function() {
		$('select').material_select();
	  });
	</script>
	<script>
		  $(document).ready(function(){
			// the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
			$('.modal-trigger').leanModal();
		  });
	</script>
    </body>
  </html>