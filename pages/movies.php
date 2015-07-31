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
	include('php/upload_movies.php');
	if(isset($_POST['deleteId'])){
		$deleteId = $_POST['deleteId'];
		mysql_query("DELETE FROM movie WHERE id='$deleteId'");
	}
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
	<link href="jPlayer/dist/skin/blue.monday/css/jplayer.blue.monday.min.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="jPlayer/lib/jquery.min.js"></script>
	      <script type="text/javascript" src="js/materialize.min.js"></script>
	<script type="text/javascript" src="jPlayer/dist/jplayer/jquery.jplayer.min.js"></script>
	<script type="text/javascript" src="jPlayer/dist/add-on/jplayer.playlist.min.js"></script>
	<script type="text/javascript">
	//<![CDATA[
	$(document).ready(function(){

		new jPlayerPlaylist({
			jPlayer: "#jquery_jplayer_1",
			cssSelectorAncestor: "#jp_container_1"
		}, [
			{
				title:"Big Buck Bunny Trailer",
				artist:"Blender Foundation",
				free:true,
				m4v: "http://www.jplayer.org/video/m4v/Big_Buck_Bunny_Trailer.m4v",
				ogv: "http://www.jplayer.org/video/ogv/Big_Buck_Bunny_Trailer.ogv",
				webmv: "http://www.jplayer.org/video/webm/Big_Buck_Bunny_Trailer.webm",
			},
			{
				title:"Finding Nemo Teaser",
				artist:"Pixar",
				m4v: "http://www.jplayer.org/video/m4v/Finding_Nemo_Teaser.m4v",
				ogv: "http://www.jplayer.org/video/ogv/Finding_Nemo_Teaser.ogv",
				webmv: "http://www.jplayer.org/video/webm/Finding_Nemo_Teaser.webm",
			},
			
			<?php 
			$movies_list = mysql_query("select * from movie where id_user='$user_id'");
			while($mov_arr = mysql_fetch_array($movies_list)){
				?>
				
			{
				title:"<?php echo $mov_arr['title']; ?>",
				m4v: "<?php echo $mov_arr['path']; ?>"
			},
				
				<?php
			}
			?>
			
			{
				title:"Incredibles Teaser",
				artist:"Pixar",
				m4v: "http://www.jplayer.org/video/m4v/Incredibles_Teaser.m4v",
				ogv: "http://www.jplayer.org/video/ogv/Incredibles_Teaser.ogv",
				webmv: "http://www.jplayer.org/video/webm/Incredibles_Teaser.webm",
			}

		], {
			swfPath: "jPlayer/dist/jplayer",
			supplied: "webmv, ogv, m4v",
			useStateClassSkin: true,
			autoBlur: false,
			smoothPlayBar: true,
			keyEnabled: true
		});

	});
	//]]>
	</script>
	<script>
	</script>
	<script>
	   function sendMov(id) {
			$.ajax({
						type: "POST",
						url: "/materialize/pages/php/movies_load.php",
						data:({ id: id }),
						success: function (html) {
							$('#movModal').openModal();
							$("#result").empty();
							$("#result").append(html);
							$("#movId").attr("value", id);
						},
						error: function (html)
						{

						}
					});
		}
	</script>
	<script>
    function sendCom(id) {
		$.ajax({
					type: "POST",
					url: "/materialize/pages/php/addCommentMovie.php",
					data:({ id: id,
							comment: $('#new_comment').val(),
							movId: $('#movId').val()
							}),
					success: function (html) {
						$("#comments").empty();
						$("#comments").append(html);
					},
					error: function (html)
					{

					}
				});
    }
	</script>
	<style>
	#jquery_jplayer_1{
		width: 100% !important;
	}
	#jp_video_0{
		width: 100% !important;
		height: 100% !important;
	}
	</style>
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
			<li><a href="gallery.php">Photos</a></li>
			<li><a href="music.php">Music</a></li>
			<li class="active"><a href="movies.php">Movies</a></li>
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
  <h5>User's movies</h5>
  <hr>


<div class="container">
<?php
	$movies_list = mysql_query("select * from movie where id_user='$user_id'");
	while($mov_arr_list = mysql_fetch_array($movies_list)){

?>
<div class="row blue lighten-5 valign-wrapper card-panel">

<div class="col m2">


<video class="responsive-video" onClick="sendMov(<?php echo $mov_arr_list['id'] ?>); sendCom(<?php echo $mov_arr_list['id'] ?>);" nocontrols>
	<source src="<?php echo $mov_arr_list['path'] ?>" type="video/mp4">
</video>

</div>

<div class="col m8">
<span class="flow-text"><?php echo $mov_arr_list['title']; ?></span>
<p>
Author:<?php
$id_uploader = $mov_arr_list['id_user'];
$author = mysql_fetch_array(mysql_query("Select * from users where id='$id_uploader'")); 
?> 

<a href="profile.php?id=<?php echo $author['id'] ?>"><?php echo $author['first_name']." ".$author['last_name']; ?> </a>

</br>
Date of uploading: <?php echo $mov_arr_list['time'] ?>
</p>
</div>

<div class="col m2">
<form method="POST">
<input type="hidden" name="deleteId" value="<?php echo $mov_arr_list['id'] ?>">
<button type="submit" class="secondary-content"><i class="mdi-navigation-cancel medium"></i></button>
</form>
</div>
</div>

			<?php } ?>
</div>
</div>
<div class="col s2 m2">

<?php if($user_id == $_SESSION['id']) {?>

	<div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Upload</span>
              <p>Here you can upload new photo )</p>
            </div>
            <div class="center" style="padding-bottom: 10px">
			<a class="waves-effect waves-light btn modal-trigger" href="#loading">Upload</a>
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

<div class="card blue-grey darken-1 center">
	<a class="waves-effect waves-light btn modal-trigger" href="#watch_all">Watch all</a>
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

  <div id="loading" class="modal grey darken-3" style="height:400px">
      <div class="modal-content">
	  <div class="container">
	  <form id="form_loading" action="" method="POST" enctype="multipart/form-data">
        <div class="row">
			<div class="input-field col m12">
			  <input id="first_name" type="text" class="validate" name="title">
			  <label for="first_name">Title</label>
			</div>
		</div>
		<div class="row">
			<div class="col m12">
					<div class="file-field input-field">
					  <input class="file-path validate" type="text"/>
					  <div class="btn">
						<span>File</span>
						<input type="file" name="upl"/>
					  </div>
					</div>
			</div>
		</div>
	</form>
	</div>
	</div>
    <div class="modal-footer grey darken-3">
	<div class="container">
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
  
    <div id="watch_all" class="modal grey darken-3" >
	<div class="row">
	<div class="col m2">
	<p></p>
	</div>
	<div class="col m8">
	
	<div id="jp_container_1" class="jp-video jp-video-270p" style="width:100%" role="application" aria-label="media player">
	<div class="jp-type-playlist" style="width:100%">
		<div id="jquery_jplayer_1" style="width:100%" class="jp-jplayer"></div>
		<div class="jp-gui">
			<div class="jp-video-play">
				<button class="jp-video-play-icon" role="button" tabindex="0">play</button>
			</div>
			<div class="jp-interface">
				<div class="jp-progress">
					<div class="jp-seek-bar">
						<div class="jp-play-bar"></div>
					</div>
				</div>
				<div class="jp-current-time" role="timer" aria-label="time">&nbsp;</div>
				<div class="jp-duration" role="timer" aria-label="duration">&nbsp;</div>
				<div class="jp-controls-holder">
					<div class="jp-controls">
						<button class="jp-previous" role="button" tabindex="0">previous</button>
						<button class="jp-play" role="button" tabindex="0">play</button>
						<button class="jp-next" role="button" tabindex="0">next</button>
						<button class="jp-stop" role="button" tabindex="0">stop</button>
					</div>
					<div class="jp-volume-controls">
						<button class="jp-mute" role="button" tabindex="0">mute</button>
						<button class="jp-volume-max" role="button" tabindex="0">max volume</button>
						<div class="jp-volume-bar">
							<div class="jp-volume-bar-value"></div>
						</div>
					</div>
					<div class="jp-toggles">
						<button class="jp-repeat" role="button" tabindex="0">repeat</button>
						<button class="jp-shuffle" role="button" tabindex="0">shuffle</button>
						<button class="jp-full-screen" role="button" tabindex="0">full screen</button>
					</div>
				</div>
				<div class="jp-details">
					<div class="jp-title" aria-label="title">&nbsp;</div>
				</div>
			</div>
		</div>
		<div style="height: 200px; overthrow-x:auto">
		<div class="jp-playlist">
			<ul>
				<!-- The method Playlist.displayPlaylist() uses this unordered list -->
				<li>&nbsp;</li>
			</ul>
		</div>
		</div>
		<div class="jp-no-solution">
			<span>Update Required</span>
			To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
		</div>
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

 <div id="movModal" class="modal grey lighten-3" >
    <div class="modal-content container-fluid">
	<div class="row">
	<div id="result">
	
	</div>
	<input id="movId" type="hidden" value="">
	</div>
	<div id="comments" class="row">
	
	</div>
    </div>
    <div class="modal-footer grey lighten-4">
	<div class="row">
	<div class="col m6">
      <a href="" class="left modal-action modal-close waves-effect waves-green btn-flat">Add</a>
	</div> 	
	<div class="col m6 right-align">
      <a href="" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
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