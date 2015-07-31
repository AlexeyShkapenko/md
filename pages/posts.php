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
	include('php/addPost.php');
	include('php/addComment.php');
	
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
      <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
	  <script type="text/javascript" src="js/materialize.min.js"></script>
	  <script>
			$(document).ready(function(){
			$('.collapsible').collapsible({
			  accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
			});
		  });
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
		  <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
		  <ul id="nav-mobile" class="left hide-on-med-and-down">
			<li><a href="profile.php">My profile</a></li>
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
			<li><a href="sass.html">Sass</a></li>
			<li><a href="components.html">Components</a></li>
			<li><a href="javascript.html">Javascript</a></li>
			<li><a href="mobile.html">Mobile</a></li>
		  </ul>
		</div>
	  </nav>
  </div>
</header>
<main>
<div class="container-fluid">
<div class="row">
<div class="col s2">

	<div class="row">
      <div class="col s12 m12">
        <div class="card-panel teal">
		<?php
			if($user_id == $_SESSION['id']){
		?>
          <span class="white-text">
			Here you can add new post.</br>
			Just click a button.
          </span>
		  <div class="center">
			<a class="waves-effect waves-light btn modal-trigger" href="#new_post">Post</a>
		  </div>
			<?php } ?>
        </div>
      </div>
	<input type="hidden" id="get_id" value="<?php echo $_GET['id'] ?>">
    </div>
	
</div>
<div class="col s8 deep-purple accent-1 z-depth-2" style="min-height:1000px">
<div class="container-fluid">				
<div id="articles" class="row">
	<?php include('php/showPost.php'); ?>
</div>
</div>
</div>

<div class="col s2">
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
  
  <div id="new_post" class="modal" style="min-height:32em">
    <form method="POST" action="" class="col s12">
    <div class="modal-content">
      <h4 class="center">Write your post</h4>
        <div class="row">
		  <div class="row">
			<div class="input-field col s12">
			  <input id="subject" type="text" class="validate" name="post_name" required>
			  <label class="active" for="subject">Post name</label>
			</div>
		  </div>
		  <div class="row">
			<div class="input-field col s12">
			  <textarea id="messagearea" class="materialize-textarea" name="post_content" required></textarea>
			  <label for="messagearea">Enter post content</label>
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
				<button type="submit" class="btn modal-action waves-effect waves-green right" name="addPost">Add</button>
			</div>
		</div>
	</div>
    </div>
	</form>
  </div>	 
	 <script>
	    $(document).ready(function() {
		$('select').material_select();
	  });
	</script>  
	  <script>	  
		  $('.modal-trigger').leanModal({
			  dismissible: true, // Modal can be dismissed by clicking outside of the modal
			  opacity: .5, // Opacity of modal background
			  in_duration: 300, // Transition in duration
			  out_duration: 200, // Transition out duration
			  ready: function() {  }, // Callback for Modal open
			  complete: function() {  } // Callback for Modal close
			}
		  );
		   $(document).ready(function(){
			$('.collapsible').collapsible({
			  accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
			});
		  });
	  </script>
	  <script type="text/javascript" src="js/load_Post.js"></script>
    </body>
  </html>        