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
		function search_user(){
			$.ajax({
					type: "POST",
					url: "/jdi/materialize/pages/php/search.php",
					data:({ search: $("#search").val() }),
					success: function (html) {
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
	  <li><a href="#!">Settings</a></li>
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
			<li><a href="#">Music</a></li>
			<li><a href="#">Movies</a></li>
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
	<div class="col s12 m12 l12 portfolio-border">
      <img class="materialboxed" src="image/people3.jpg">
	</div>
	<div class="col s12 m12 l12 portfolio-border">
      <img class="materialboxed" src="image/people2.jpg">
	</div>  
	<div class="col s12 m12 l12 portfolio-border">
      <img class="materialboxed" src="image/people1.jpg">
	</div>
    </div>
  </div>
</div>
	

<div class="col s2 m2">
	<div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Upload</span>
              <p>Here you can upload new photo )</p>
            </div>
            <div class="card-action">
				<form enctype="multipart/form-data" action="gallery.php" method="POST">
					<div class="file-field input-field">
					  <input class="file-path validate" type="text"/>
					  <div class="btn">
						<span>File</span>
							<input type="file" id="file" name="files[]" multiple="multiple" accept="image/*" />
					  </div>
					</div>
					  <button class="btn waves-effect waves-light" type="submit" name="submit">Submit
						<i class="mdi-content-send right"></i>
					  </button>
				</form>
            </div>
    </div>
</div>
<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large red" >
      <i class="large mdi-editor-mode-edit"></i>
    </a>
    <ul>
      <li><a class="btn-floating red"><i class="large mdi-editor-insert-chart"></i></a></li>
      <li><a class="btn-floating yellow darken-1"><i class="large mdi-editor-format-quote"></i></a></li>
      <li><a class="btn-floating green"><i class="large mdi-editor-publish"></i></a></li>
      <li><a class="btn-floating blue"><i class="large mdi-editor-attach-file"></i></a></li>
    </ul>
</div>		  
</div>
</div>

</main>

<?php include('php/footer.php'); ?>	
  
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
	  <script>
		$(document).ready(function(){
		  $('.materialboxed').materialbox();
		});
	  </script>
	  <?php 
			include('php/uploader.php');
	  ?>
    </body>
</html>