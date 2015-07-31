<?php
	session_start();
	if ((!isset($_SESSION['email'])) || (!isset($_SESSION['email'])) || (!isset($_SESSION['email']))){
		  header("Location: ../index.php");
	}
	include('php/func.php');

	connect_db();
	$user_id = $_SESSION['id'];
	include('php/upload_ava.php');
	$user_inf = mysql_fetch_array(mysql_query("select * from users where id='$user_id'"));
?>

<!DOCTYPE html>
  <html>
    <head>
    <!--Import materialize.css-->	  
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="css/user.css"  media="screen,projection"/>
	<link href="load/css/style.css" rel="stylesheet" />        
    <!-- Google Fonts -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Dancing+Script" />
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<script>
	    $(document).ready(function() {
		$('select').material_select();
	  });
	</script>
	<script>
		function clearAll(){

			$("input").val('');
			$("textarea").val('');
			$("select").val('Choose your country.');
		}
		function sendInf() {
				$.ajax({
					type: "POST",
					url: "/materialize/sign_up.php",
					data:({ first_name: $("#first_name").val(), 
							last_name: $("#last_name").val(),
							password: $("#password").val(),
							email: $("#email").val(),
							date: $("#date").val(),
							biography: $("#biography").val(),
							country: $("#country").val(),
							question: $("#question").val(),
							answer: $("#answer").val()}),
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
	  <li class="active"><a href="settings.php?page=main">Settings</a></li>
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
<div class="col s2 m2">
      <div class="collection">
	  <?php if(isset($_GET['page'])){
		if($_GET['page'] == 'main'){
			?>
			<a href="settings.php?page=main" class="collection-item active">Main</a>
			<a href="settings.php?page=private" class="collection-item">Private</a>
			<a href="settings.php?page=photo" class="collection-item">Photo</a>
			<?php
		} 
		if($_GET['page'] == 'private'){
			?>
			<a href="settings.php?page=main" class="collection-item">Main</a>
			<a href="settings.php?page=private" class="collection-item active">Private</a>
			<a href="settings.php?page=photo" class="collection-item">Photo</a>
			<?php
		}
		if($_GET['page'] == 'photo'){
			?>
			<a href="settings.php?page=main" class="collection-item">Main</a>
			<a href="settings.php?page=private" class="collection-item">Private</a>
			<a href="settings.php?page=photo" class="collection-item active">Photo</a>
			<?php
		}
	  } ?>
      </div>
</div>

<div class="col s8 m8 deep-purple accent-1 z-depth-2 user-container light-blue lighten-5">

<div class="container portfolio">
  <h6>Settings</h6>
  <hr>

<?php
	if(isset($_GET['page'])){
		if($_GET['page']=="main"){
?>  
  
<div class="row">
		<div id="introduction" class="section scrollspy">
			<h5>Main information <span style="font-size:0.7em">(necessary)</span></h5>
			<div class="divider"></div>
			<div>
				<div class="row">
					<div class="col s12">
					  <div class="row">
						<div class="input-field col s6 ">
						  <input id="first_name" name="first_name" type="text" class="validate" autocomplete="off">
						  <label for="first_name">First Name</label>
						</div>
						<div class="input-field col s6">
						  <input id="last_name" name="last_name" type="text" class="validate" autocomplete="off">
						  <label for="last_name">Last Name</label>
						</div>
					  </div>
					  <div class="row">
						<div class="input-field col s12">
						  <input id="password" name="password" type="password" class="validate" autocomplete="off">
						  <label for="password">Password</label>
						</div>
					  </div>
					<div class="row">
						<div class="input-field col s12">
						  <input id="email" name="email" type="email" class="validate" autocomplete="off">
						  <label for="email">Email</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="date" name="date" type="date" class="datepicker" autocomplete="off">
							<label for="date">Birthday</label>
						</div>
					</div>
					</div>
				</div>					
			</div>
		</div>

		<div id="structure" class="section scrollspy">
			<h5>Personal information</h5>
			<div class="divider"></div>
			<div>
				<div class="row">
				  <div class="input-field col s12">
					<textarea id="biography" name="biography" class="materialize-textarea" length="120" autocomplete="off"></textarea>
					<label for="biography">Tell about yourself in the shortest form</label>
				  </div>
				    <div class="input-field col s12">
					<select id="country" name="country">
					  <option value="" disabled selected >Choose your country</option>
					  <option value="1">Ukraine</option>
					  <option value="2">UK</option>
					  <option value="3">Germany</option>
					</select>
					<label>Select country</label>
				  </div>
				</div>
			</div>
		</div>
		
		<div id="initialization" class="section scrollspy">
			<h5>Control question</h5>
			<div class="divider"></div>
			<div>
				<div class="row">
				  <div class="col s12">
					<div class="row">
					  <div class="input-field col s12">
						<input id="question" name="question" type="text" length="35" autocomplete="off">
						<label for="question">Enter the question</label>
					  </div>
					</div>
					<div class="row">
					  <div class="input-field col s12">
						<textarea id="answer" name="answer" class="materialize-textarea" length="120" autocomplete="off"></textarea>
						<label for="answer">Enter the answer</label>
					  </div>
					</div>
				  </div>
				</div>
			</div>
		</div>
<div class="row center">
	<div class="col s6">
		<button class="btn waves-effect waves-light left" onClick="clearAll();">Refresh
			<i class="mdi-toggle-radio-button-off left"></i>
		</button>
	</div>
	<div class="col s6">
		<button class="btn waves-effect waves-light right" name="action" onClick="sendInf();">Submit
			<i class="mdi-content-send right"></i>
		</button>
	</div>
</div>

</div>
	<?php } 
	elseif ($_GET['page']=="private"){
	?>
	
<div class="row">

	<span>Private</span>
</div>
<div class="row">
	<div class="container">
		<div class="row">
			<div class="card-panel grey lighten-3">
		<?php 
			$private_set = mysql_fetch_array(mysql_query("select * from private where id_user='$user_id'"));
		if(isset($_POST['action'])){
			if(isset($_POST['page'])){	
				if(empty($private_set)){
					mysql_query("insert into private (id_user, profile) values ('$user_id','1')");
				}else {
					mysql_query("UPDATE private SET profile='1' where id='$user_id'");
				}
			} else {
				if(empty($private_set)){
					mysql_query("insert into private (id_user, profile) values ('$user_id','0')");
				}else {
					mysql_query("UPDATE private SET profile='0' where id='$user_id'");
				}
			}
			
			if(isset($_POST['photo'])){				
				if(empty($private_set)){
					mysql_query("insert into private (id_user, photo) values ('$user_id','1')");
				}else {
					mysql_query("UPDATE private SET photo='1' where id='$user_id'");
				}
			} else {
				if(empty($private_set)){
					mysql_query("insert into private (id_user, photo) values ('$user_id','0')");
				}else {
					mysql_query("UPDATE private SET photo='0' where id='$user_id'");
				}
			}
				
			if(isset($_POST['music'])){				
				if(empty($private_set)){
					mysql_query("insert into private (id_user, music) values ('$user_id','1')");
				}else {
					mysql_query("UPDATE private SET music='1' where id='$user_id'");
				}
			} else {
				if(empty($private_set)){
					mysql_query("insert into music (id_user, profile) values ('$user_id','0')");
				}else {
					mysql_query("UPDATE private SET music='0' where id='$user_id'");
				}
			}
			
			if(isset($_POST['movie'])){				
				if(empty($private_set)){
					mysql_query("insert into private (id_user, video) values ('$user_id','1')");
				}else {
					mysql_query("UPDATE private SET video='1' where id='$user_id'");
				}
			} else {
				if(empty($private_set)){
					mysql_query("insert into private (id_user, video) values ('$user_id','0')");
				}else {
					mysql_query("UPDATE private SET video='0' where id='$user_id'");
				}
			}
			
			if(isset($_POST['post'])){				
				if(empty($private_set)){
					mysql_query("insert into private (id_user, post) values ('$user_id','1')");
				}else {
					mysql_query("UPDATE private SET post='1' where id='$user_id'");
				}
			} else {
				if(empty($private_set)){
					mysql_query("insert into private (id_user, post) values ('$user_id','0')");
				}else {
					mysql_query("UPDATE private SET post='0' where id='$user_id'");
				}
			}
			}
			$private_set = mysql_fetch_array(mysql_query("select * from private where id_user='$user_id'"));
			if(empty($private_set)){
		?>
		<form action="" method="POST">
			<div class="row center">
			<span class="flow-text">Who can see page?</span>
			  <div class="switch">
				<label>
				  Everyone
				  <input type="checkbox" name="page">
				  <span class="lever"></span>
				  Followers
				</label>
			  </div>
			</div>
			
			<div class="row center">
			<span class="flow-text">Who can see photos?</span>
			  <div class="switch">
				<label>
				  Everyone
				  <input type="checkbox" name="photo">
				  <span class="lever"></span>
				  Followers
				</label>
			  </div>
			</div>
			
			<div class="row center">
			<span class="flow-text">Who can see music?</span>
			  <div class="switch">
				<label>
				  Everyone
				  <input type="checkbox" name="music">
				  <span class="lever"></span>
				  Followers
				</label>
			  </div>
			</div>
			
			<div class="row center">
			<span class="flow-text">Who can see posts?</span>
			  <div class="switch">
				<label>
				  Everyone
				  <input type="checkbox" name="post">
				  <span class="lever"></span>
				  Followers
				</label>
			  </div>
			</div>
			
			<div class="row center">
			<span class="flow-text">Who can see movies?</span>
			  <div class="switch">
				<label>
				  Everyone
				  <input type="checkbox" name="movie">
				  <span class="lever"></span>
				  Followers
				</label>
			  </div>
			</div>
			<div class="row">
			<button class="btn waves-effect waves-light right" type="submit" name="action">Submit
				<i class="mdi-content-send right"></i>
			</button>
			</div>
		</form>	
			<?php } else { ?>
			
			
			<form action="" method="POST">
			<div class="row center">
			<span class="flow-text">Who can see page?</span>
			  <div class="switch">
				<label>
				  Everyone
				  <?php	if($private_set['profile'] == 0){ ?>
				  
				  <input type="checkbox" name="page">
				  
				  <?php } else {?>
				  
				  <input type="checkbox" name="page" checked>
				  
				  <?php } ?>
				  
				  <span class="lever"></span>
				  Followers
				</label>
			  </div>
			</div>
			
			<div class="row center">
			<span class="flow-text">Who can see photos?</span>
			  <div class="switch">
				<label>
				  Everyone
				   <?php	if($private_set['photo'] == 0){ ?>
				  
				  <input type="checkbox" name="photo">
				  
				  <?php } else {?>
				  
				  <input type="checkbox" name="photo" checked>
				  
				  <?php } ?>
				  <span class="lever"></span>
				  Followers
				</label>
			  </div>
			</div>
			
			<div class="row center">
			<span class="flow-text">Who can see music?</span>
			  <div class="switch">
				<label>
				  Everyone
				  <?php	if($private_set['music'] == 0){ ?>
				  
				  <input type="checkbox" name="music">
				  
				  <?php } else {?>
				  
				  <input type="checkbox" name="music" checked>
				  
				  <?php } ?>
				  <span class="lever"></span>
				  Followers
				</label>
			  </div>
			</div>
			
			<div class="row center">
			<span class="flow-text">Who can see posts?</span>
			  <div class="switch">
				<label>
				  Everyone
				  <?php	if($private_set['post'] == 0){ ?>
				  
				  <input type="checkbox" name="post">
				  
				  <?php } else {?>
				  
				  <input type="checkbox" name="post" checked>
				  
				  <?php } ?>
				  <span class="lever"></span>
				  Followers
				</label>
			  </div>
			</div>
			
			<div class="row center">
			<span class="flow-text">Who can see movies?</span>
			  <div class="switch">
				<label>
				  Everyone
				  <?php	if($private_set['video'] == 0){ ?>
				  
				  <input type="checkbox" name="movie">
				  
				  <?php } else {?>
				  
				  <input type="checkbox" name="movie" checked>
				  
				  <?php } ?>
				  <span class="lever"></span>
				  Followers
				</label>
			  </div>
			</div>
			<div class="row">
			<button class="btn waves-effect waves-light right" type="submit" name="action">Submit
				<i class="mdi-content-send right"></i>
			</button>
			</div>
		</form>	
				
				
				
			<?php } ?>
			</div>
		</div>
	</div>
</div>

	<?php }
elseif ($_GET['page']=="photo"){	
?>

  <form action="" method="POST" enctype="multipart/form-data">
    <div class="file-field input-field">
      <input class="file-path validate" type="text"/>
      <div class="btn">
        <span>File</span>
        <input type="file" name="ava"/>
      </div>
    </div>
	<button class="waves-effect waves-light btn" onClick="$(this).submit();"><i class="mdi-file-cloud left"></i>Submit</button>
  </form>
		<img src="<?php	echo $user_inf['ava'];?>">
	<?php
}

	} else {
?>
	
	<div class="row">
	
	<span> Choose what do you to set</span>
	</div>
	<div class="row">
			<div class="input-field col s4">
				<a href="settings.php?page=main" class="btn modal-action modal-close modal-close waves-effect waves-green left">Main</a>
			</div>
			<div class="input-field col s4">
				<a href="settings.php?page=private" class="btn modal-action waves-effect waves-green center">Private</a>
			</div>
			<div class="input-field col s4">
				<a href="settings.php?page=photo" class="btn modal-action waves-effect waves-green right">Profile photo</a>
			</div>
	
	<?php }?>
</div>
</div>	

<div class="col s2 m2">

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
	<script>
		$(document).ready(function(){
			$('.table-of-contents').pushpin({ top: $('.pin-reg').offset().top });
		  });
		  
		$("#mobile-demo").sideNav();
	</script>
		<script>
		$(document).ready(function(){
			$('.scrollspy').scrollSpy();
		});
	</script>
	<script>
	  $('.datepicker').pickadate({
		selectMonths: true, // Creates a dropdown to control month
		selectYears: 125 // Creates a dropdown of 15 years to control year
	  });
	</script>
    </body>
</html>