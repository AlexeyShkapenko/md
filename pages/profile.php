<?php
	session_start();
	if ((!isset($_SESSION['email'])) || (!isset($_SESSION['email'])) || (!isset($_SESSION['email']))){
		  header("Location: ../index.php");
	}
	include('php/func.php');

	connect_db();
	$user_id = $_SESSION['id'];
	if(isset($_GET['id'])){ $user_id = $_GET['id']; }
	$user_inf = mysql_fetch_array(mysql_query("select * from users where id='$user_id'"));
	include('php/sendMessage.php');
?>
<!DOCTYPE html>
  <html>
    <head>
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	  <link type="text/css" rel="stylesheet" href="css/user.css"  media="screen,projection"/>
	  <link type="text/css" rel="stylesheet" href="css/audio.css"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	  
    </head>

    <body>
<header>
	<div class="navbar">
	  <ul id="operations" class="dropdown-content">
	  <li><a href="settings.php?page=main">Settings</a></li>
	  <li class="divider"></li>
	  <?php if($user_inf['admin'] == 1){ ?>
	  	  <li class="divider"></li>
		  <li><a href="admin.php?page=user_list">Admin</a></li>
	  <?php } ?>
	  <li><a href="php/logout.php">LogOut<span class="Medium mdi-maps-directions-walk"></span></a></li>
	</ul>
	
	  <nav class="indigo accent-2">
		<div class="nav-wrapper">
		  <a href="#" class="brand-logo right">M and D</a>
		  <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
		  <ul id="nav-mobile" class="left hide-on-med-and-down">
			<li class="active"><a href="profile.php">My profile</a></li>
			<li><a href="user_list.php">Users</a></li>
			<li><a href="messages.php">Messages</a></li>
			<li><a href="gallery.php">Photos</a></li>
			<li><a href="music.php">Music</a></li>
			<li><a href="movies.php">Movies</a></li>
			<li><a href="#">Events</a></li>
			<li><a href="#">Developers Blog</a></li>
			<li><a class="dropdown-button" href="#!" data-activates="operations">Operations<i class="mdi-navigation-arrow-drop-down right"></i></a></li>
		  </ul>
		  <ul class="side-nav" id="mobile-demo">
			<li class="active"><a href="profile.php">My profile</a></li>
			<li><a href="user_list.php">Users</a></li>
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
<div class="col s2" style="height:1000px">
			<div class="content-section"> 
				<ul class="section table-of-contents right-column">
					<span class="flow-text">Section of page</span>
					<li><a href="#gallery">Gallery</a></li>
					<li><a href="#music">Music</a></li>
					<li><a href="#video">Video</a></li>
					<li><a href="#posts">Posts</a></li>
				</ul>
				</div>
</div>
<div class="col m8 s7 deep-purple accent-1 z-depth-2">
			
				<div class="container">
				
					<div class="row">
						
						<div id="gallery" class="section section-page page-divided z-depth-2 blue lighten-4">
						 <div class="card-panel teal lighten-2">Gallery </div>
							<div class="container-fluid">
							<div class="row" Style="margin:10px;">
							<?php 
							$photo_list = mysql_query("Select * from images where user_id='$user_id' ORDER BY id LIMIT 10");
							if(mysql_fetch_array($photo_list)<>''){
							?>
							
							
								<div class="col m4 s12 light-blue lighten-5" style="height: 300px; overflow-x:auto; overflow-y:auto;">
								<?php
									while($g_arr = mysql_fetch_array($photo_list)){
								?>
								<div class="row">
								<a><img class="z-depth-1 responsive-img gallery-preview-first gallery-preview" src="<?php echo $g_arr['path'] ?>" style="width: 100%; height: auto;" onClick="$('#first_g').attr('src', '<?php echo $g_arr['path'] ?>');"></a>
								</div>
								
									<?php } ?>
									
								</div>
								<?php
									$photo_list_first = mysql_fetch_array(mysql_query("Select * from images where user_id='$user_id' ORDER BY id LIMIT 1"));
									?>
								<div class="col m8 s12 light-blue lighten-5 valign-wrapper center-align" style="height: 300px; padding: 20px">
								
									<a class="modal-trigger" href="#photo-modal"><img id="first_g" class="z-depth-1 responsive-img" src="<?php echo $photo_list_first['path'] ?>" alt="Choose photo" style="width: 100%; height: auto; max-height: 250px; "></a>

								</div>
							<?php } else{ ?>
							<div class="center col m12"><span class="flow-text">Sorry, there is no photos yet.</span></div>
							<?php } ?>
						    </div>	
						    </div>
							<div class="row">
								<div class="col s4 offset-s4"><a href="gallery.php" class="waves-effect waves-light btn"><i class="mdi-file-cloud left"></i>Gallery</a></div>
							</div>
						</div>
						
						  <div id="music" class="section section-page page-divided z-depth-2 blue lighten-4">
						   <div class="card-panel teal lighten-2">Music </div>
							<ul class="collection">
								<li class="collection-item">
									<audio preload="auto" controls>
										<source src="assets/audio.mp3" />
										<source src="assets/audio.ogg" />
										<source src="assets/audio.wav" />
									</audio>
								</li>
							</ul>
							<div class="center-align"> <a class="waves-effect waves-light btn"  href="music.php?id=<?php echo $user_id ?>"><i class="mdi-file-cloud left"></i>Music</a></div>
						  </div>

						  <div id="video" class="section section-page page-divided z-depth-2 blue lighten-4">
						   <div class="card-panel teal lighten-2">Videos </div>
						   <ul class="collection">
						   <?php 
								$video_first = mysql_fetch_array(mysql_query("Select * from movie where id_user='$user_id' ORDER BY id DESC LIMIT 1"));
								if($video_first == ""){
								?>
								
									<div class="center"><span class="flow-text">Sorry, there is no movies yet.</span></div>
									
								<?php
								} else{
								?>
								<li class="collection-item">
								<video class="responsive-video" controls>
									<source src="<?php echo $video_first['path']; ?>" type="video/mp4">
								</video>
								</li>
								<?php } ?>
								</ul>
								<div class="center-align"> <a class="waves-effect waves-light btn" href="movies.php?id=<?php echo $user_id ?>"><i class="mdi-file-cloud left"></i>Videos</a> </div>
						  </div>
						  
						  <div id="posts" class="section section-page page-divided z-depth-2 blue lighten-4">
						   <div class="card-panel teal lighten-2">Posts</div>
							<ul class="collapsible" data-collapsible="accordion">
							
							<?php 
								$user_post = mysql_query("select * from text_post where user_id='$user_id' ORDER BY id DESC LIMIT 4");
								if(mysql_fetch_array($user_post) == ""){
								?>
								
									<div class="center"><span class="flow-text">Sorry, there is no posts yet.</span></div>
									
								<?php
								}
								$user_post = mysql_query("select * from text_post where user_id='$user_id' ORDER BY id DESC LIMIT 3");
								while($arr_post = mysql_fetch_array($user_post)){
							?>							
								<li>
								<div class="collapsible-header"><i class="mdi-image-filter-drama"></i><?php echo $arr_post['name'] ?></div>
								<div class="collapsible-body"><p><?php echo $arr_post['content'] ?></p></div>
								</li>
								<?php }?>
							</ul>
							
							<div class="center-align"> <a href="posts.php?id=<?php echo $user_id?>" target="_blank" class="waves-effect waves-light btn"><i class="mdi-file-cloud left"></i>Posts</a> </div>
							
						  </div>
										
					</div>
								
				</div>
				
							
</div>
<div class="col m2 s3">
				<div class="card">
				<div class="card-image waves-effect waves-block waves-light">
				  <img class="activator" src="<?php echo $user_inf['ava'] ?>">
				</div>
				<div class="card-content">
				<div class="center-align">
				<span class="flow-text" style="font-size: 1.2em"><?php echo $user_inf['first_name']." ".$user_inf['last_name']; ?></span>
				</div>
				  <div class="center-align"><span class="card-title activator grey-text text-darken-4"> About me <i class="mdi-navigation-more-vert right"></i></span></div>
				  <p><a class="modal-trigger waves-effect waves-light btn" href="#user-information-modal">Show more</a></p>
				</div>
				<div class="card-reveal">
				  <span class="card-title grey-text text-darken-4">About me<i class="mdi-navigation-close right"></i></span>
				  <p class="flow-text" style="font-size: 1.3em"><?php echo $user_inf['biography']; ?></p>
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

<?php include('php/footer.php'); ?>

<div id="user-information-modal" class="modal">
<div class="container-fluid">
<div class="row">
<div class="col m8">
	<div class="modal-content center container">
		<table>
        <thead>
          <tr>
              <th colspan="2"><h4 class="center-align">User Information</h4></th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td class="right-align">Full name :</td>
            <td><?php echo $user_inf['first_name'].' '.$user_inf['last_name']; ?></td>
          </tr>
          <tr>
            <td class="right-align">Country :</td>
            <td><?php echo "Ukraine" ?></td>
          </tr>
          <tr>
            <td class="right-align">Born date :</td>
            <td><?php echo $user_inf['born_date'] ?></td>
          </tr>
		  <tr>
            <td class="right-align">Biography :</td>
            <td><?php echo $user_inf['biography'] ?></td>
          </tr>
		  <tr>
            <td class="right-align">Registration date :</td>
            <td><?php echo $user_inf['reg_date'] ?></td>
          </tr>
        </tbody>
      </table>
	</div>
</div>
<div class="col m4">
<img class="z-depth-1 responsive-img gallery-preview-first gallery-preview" src="<?php echo $user_inf['ava'] ?>" style="width: 100%; height: auto; margin-top: 50px;">
</div>
</div>
</div>
	<div class="container">
	<div class="modal-footer row">
	<?php if($user_id == $_SESSION['id']) {?>
	<div class="col s6">
		<a href="settings.php?page=main" class="left modal-action modal-close waves-effect waves-green btn"><i class="mdi-editor-mode-edit"></i>Edit</a>
	</div>
	<?php } ?>
	<div class="col s6">
		<a href="" class="right modal-action modal-close waves-effect waves-green btn">Okay<i class="mdi-action-done"></i></a>
	</div>
	</div>
	</div>
</div>

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
	  
      <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
	 	  <script>
		$(document).ready(function(){
			$('.modal-trigger').leanModal();
		  });
		  $(document).ready(function(){
			$('.section-page').scrollSpy();
		  });
		   $(document).ready(function(){
			$('.right-column').pushpin({ top: $('.right-column').offset().top });
		  }); 
	  </script>
	  	<script src="assets/audioplayer.js"></script>
	<script>
		$( function()
		{
			$( 'audio' ).audioPlayer();
		});
		$(".button-collapse").sideNav();
		  $(document).ready(function() {
			$('select').material_select();
		  });
	</script>
    </body>
  </html>        