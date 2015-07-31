<?php
header('Content-Type: text/html; charset=UTF-8');
	session_start();
	if ((!isset($_SESSION['email'])) || (!isset($_SESSION['email'])) || (!isset($_SESSION['email']))){
		  header("Location: ../index.php");
	}
	include('php/func.php');

	connect_db();
	$user_id = $_SESSION['id'];
	if(isset($_GET['id'])){ $user_id = $_GET['id']; }
	$user_inf = mysql_fetch_array(mysql_query("select * from users where id='$user_id'"));
?>

<!DOCTYPE html>
  <html>
    <head>
      <!--Import materialize.css-->
	  
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	  <link type="text/css" rel="stylesheet" href="css/user.css"  media="screen,projection"/>
      <link rel="stylesheet" href="gallery/touchTouch/touchTouch.css" />
		<link href="load/css/style.css" rel="stylesheet" />
        
        <!-- Google Fonts -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Dancing+Script" />
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	  <script>
		function getImages(){
			$.ajax({
					type: "POST",
					url: "/materialize/pages/php/uploader.php",
					data:({ search: $("#file").val() }),
					success: function (html) {
						alert("Ok");
						$("#result").empty();
						$("#result").append(html);
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
			<li><a href="user_list.php">Users</a></li>
			<li><a href="messages.php">Messages</a></li>
			<li class="active"><a href="gallery.php">Photos</a></li>
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
<div class="col s2 m2">
<p></p>
</div>

<div class="col s8 m8 deep-purple accent-1 z-depth-2 user-container">

<div class="container portfolio">
  <h5>Portfolio</h5>
  <h6>User's photos</h6>
  <hr>
<div class="row center">

<?php 
	$usr_image = mysql_query("Select * from images where user_id='$user_id'");
	while($arr = mysql_fetch_array($usr_image)){
?>

<div class="col m4">
	<a class="thumbs" data-gallery="one" href="<?php echo $arr['path'] ?>"><img class="img-gallery" src="<?php echo $arr['path'] ?>"></a>
</div>

	<?php } ?>

</div>
</div>
</div>
	

<div class="col s2 m2">
<?php if($user_id == $_SESSION['id']) {?>
	<div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Upload</span>
              <p>Загрузите новые фото )</p>
            </div>
            <div class="center card-action">
			<a class="waves-effect waves-light btn modal-trigger" href="#loading">Modal</a>
			</div>
    </div>
<?php } else{ ?>

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

<?php } ?>
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

  <div id="loading" class="modal grey darken-3" style="height:400px">
      <div class="modal-content">
  
  		<form id="upload" method="post" action="upload.php" enctype="multipart/form-data">
			<div id="drop">
				Drop Here

				<a>Browse</a>
				<input type="file" name="upl" multiple />
			</div>

			<ul>
				<!-- The file uploads will be shown here -->
			</ul>

		</form>

	</div>
    <div class="modal-footer grey darken-3">
	<div class="container-fluid">
		<div class="row">
			<div class="col m6">
			<button class="btn waves-effect waves-light modal-close red lighten-1 left" onClick="$('#form_loading').reset();">
				<i class="mdi-content-clear"></i> Cancel
			</button>
			</div>
			<div class="col m6">
			<button class="btn waves-effect waves-light right" onClick="$('#form_loading').submit();">Submit
				<i class="mdi-content-send"></i>
			</button>
			</div>
		<div>
	</div>
    </div>
  </div>
  </div>
  </div>

</main>


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

<?php include('php/footer.php'); ?>	
  
      <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
	  <script src="gallery/touchTouch/touchTouch.jquery.js"></script>
	  <script src="gallery/js/script.js"></script>
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
		<script src="load/js/jquery.knob.js"></script>

		<!-- jQuery File Upload Dependencies -->
		<script src="load/js/jquery.ui.widget.js"></script>
		<script src="load/js/jquery.iframe-transport.js"></script>
		<script src="load/js/jquery.fileupload.js"></script>
		
		<!-- Our main JS file -->
		<script src="load/js/script.js"></script>
    </body>
</html>