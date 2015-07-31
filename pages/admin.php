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
	  
	<?php
	if(isset($_POST['block_id'])){
		if($_POST['block_id']==1){
			?>
			<script>
			 $(document).ready(function() {
				Materialize.toast('Cannot block main admin!', 8000);
				  });
			</script>
			<?php
		} else {	
		$block_id = $_POST['block_id'];
		mysql_query("UPDATE users SET blocked='1' WHERE id='$block_id'");		
	}}
	
	if(isset($_POST['free_id'])){
		
		$free_id = $_POST['free_id'];
		mysql_query("UPDATE users SET blocked='0' WHERE id='$free_id'");
	}
	
	
	if(isset($_POST['user_id'])){
		$user_id = $_POST['user_id'];
		mysql_query("UPDATE users SET admin='1' WHERE id='$user_id'");
	}
	if(isset($_POST['admin_id'])){
		if($_POST['admin_id']==1){
			?>
			<script>
			 $(document).ready(function() {
				Materialize.toast('Cannot delete main admin!', 8000);
				  });
			</script>
			<?php
		} else {		
		$admin_id = $_POST['admin_id'];
		mysql_query("UPDATE users SET admin='0' WHERE id='$admin_id'");
	}}
	?>
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
		if($_GET['page'] == 'user_list'){
			?>
			<a href="admin.php?page=user_list" class="collection-item active">User list</a>
			<a href="admin.php?page=user_admin" class="collection-item">Set admins</a>
			<?php
		} 
		if($_GET['page'] == 'user_admin'){
			?>
			<a href="admin.php?page=user_list" class="collection-item">User list</a>
			<a href="admin.php?page=user_admin" class="collection-item active">Set admins</a>
			<?php
		}
	  }else{ ?>
	  		<a href="admin.php?page=user_list" class="collection-item">User list</a>
			<a href="admin.php?page=user_admin" class="collection-item">Set admins</a>
	  <?php } ?>
      </div>
</div>

<div class="col s8 m8 deep-purple accent-1 z-depth-2 user-container light-blue lighten-5">

<div class="container-fluid">
  <h6>Admin panel</h6>
  <hr>

<?php if(isset($_GET['page'])){ if ($_GET['page']=="user_list"){ ?>
	

<div class="container-fluid">
<div class="row center">
<span class="flow-text">Edit user_list</span>
</div>
<div class="row center">
<div class="col m6" style="height: 500px; overflow-y:auto">
<span class="flow-text">Free users</span>

<ul class="collection">
<?php 
$user_list = mysql_query("select * from users where blocked='0'");

while($arr1 = mysql_fetch_array($user_list)){
?>
		<li class="collection-item avatar">
		  <a href=""><img src="<?php echo $arr1['ava'] ?>" alt="avatar" class="circle"></a>
		  <span class="title"><?php echo $arr1['first_name'].' '.$arr1['last_name']; ?></span>
		  <p> Born date: <?php echo ' ' .$arr1['born_date']; ?> </p>
		  <form method="POST">
		  <input type="hidden" name="block_id" value="<?php echo $arr1['id'] ?>">
		  <button type="submit" class="secondary-content"><i class="mdi-content-add"></i></button>
		  </form>
		</li>

		<?php
			
	}?>
</ul>

</div>
<div class="col m6">
<span class="flow-text">Blocked users</span>
<ul class="collection">
<?php 
$user_list = mysql_query("select * from users where blocked='1'");

while($arr2 = mysql_fetch_array($user_list)){
?>
		<li class="collection-item avatar">
		  <a href=""><img src="<?php echo $arr2['ava'] ?>" alt="avatar" class="circle"></a>
		  <span class="title"><?php echo $arr2['first_name'].' '.$arr2['last_name']; ?></span>
		  <p> Born date: <?php echo ' ' .$arr2['born_date']; ?> </p>
		  <form method="POST">
		  <input type="hidden" name="free_id" value="<?php echo $arr2['id'] ?>">
		  <button type="submit" class="secondary-content"><i class="mdi-content-clear"></i></button>
		  </form>
		</li>

		<?php
			
	} ?>
</ul>

</div>
</div>
</div>


<?php
 } 

if ($_GET['page']=="user_admin"){	?>

<div class="container-fluid">
<div class="row center">
<span class="flow-text">Set/delete admins</span>
</div>
<div class="row center">
<div class="col m6" style="height: 500px; overflow-y:auto">
<span class="flow-text">Users</span>

<ul class="collection">
<?php 
$user_list = mysql_query("select * from users where admin='0'");

while($arr1 = mysql_fetch_array($user_list)){
?>
		<li class="collection-item avatar">
		  <a href=""><img src="<?php echo $arr1['ava'] ?>" alt="avatar" class="circle"></a>
		  <span class="title"><?php echo $arr1['first_name'].' '.$arr1['last_name']; ?></span>
		  <p> Born date: <?php echo ' ' .$arr1['born_date']; ?> </p>
		  <form method="POST">
		  <input type="hidden" name="user_id" value="<?php echo $arr1['id'] ?>">
		  <button type="submit" class="secondary-content"><i class="mdi-content-add"></i></button>
		  </form>
		</li>

		<?php
			
	}?>
</ul>

</div>
<div class="col m6">
<span class="flow-text">Admins</span>
<ul class="collection">
<?php 
$user_list = mysql_query("select * from users where admin='1'");

while($arr2 = mysql_fetch_array($user_list)){
?>
		<li class="collection-item avatar">
		  <a href=""><img src="<?php echo $arr2['ava'] ?>" alt="avatar" class="circle"></a>
		  <span class="title"><?php echo $arr2['first_name'].' '.$arr2['last_name']; ?></span>
		  <p> Born date: <?php echo ' ' .$arr2['born_date']; ?> </p>
		  <form method="POST">
		  <input type="hidden" name="admin_id" value="<?php echo $arr2['id'] ?>">
		  <button type="submit" class="secondary-content"><i class="mdi-content-clear"></i></button>
		  </form>
		</li>

		<?php
			
	} ?>
</ul>

</div>
</div>
</div>



<?php }}else{ ?>
			<span class="flow-text center"> Choose what you want. </span>
<?php } ?>

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

</main>

<?php include('php/footer.php'); ?>	
  
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