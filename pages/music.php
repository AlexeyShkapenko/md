<?php
	session_start();
	if ((!isset($_SESSION['email'])) || (!isset($_SESSION['email'])) || (!isset($_SESSION['email']))){
		  header("Location: ../index.php");
	}
	include('php/func.php');
	$user_id = $_SESSION['id'];
	if(isset($_GET['id'])){ $user_id = $_GET['id']; }
	connect_db();
	$user_inf = mysql_fetch_array(mysql_query("select * from users where id='$user_id'"));
	include('php/upload_music.php');
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
	  <link href="jPlayer/dist/skin/pink.flag/css/jplayer.pink.flag.min.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="jPlayer/lib/jquery.min.js"></script>
	<script type="text/javascript" src="jPlayer/dist/jplayer/jquery.jplayer.min.js"></script>
	<script type="text/javascript" src="jPlayer/dist/add-on/jplayer.playlist.min.js"></script>
	  <script type="text/javascript">
	//<![CDATA[
	$(document).ready(function(){

		var myPlaylist = new jPlayerPlaylist({
			jPlayer: "#jquery_jplayer_N",
			cssSelectorAncestor: "#jp_container_N"
		}, [
			{
				title:"Cro Magnon Man",
				artist:"The Stark Palace",
				mp3:"http://www.jplayer.org/audio/mp3/TSP-01-Cro_magnon_man.mp3",
				oga:"http://www.jplayer.org/audio/ogg/TSP-01-Cro_magnon_man.ogg",
				poster: "http://www.jplayer.org/audio/poster/The_Stark_Palace_640x360.png"
			}
		], {
			playlistOptions: {
				enableRemoveControls: true
			},
			swfPath: "jPlayer/dist/jplayer",
			supplied: "webmv, ogv, m4v, oga, mp3",
			useStateClassSkin: true,
			autoBlur: false,
			smoothPlayBar: true,
			keyEnabled: true,
			audioFullScreen: true
		});

		// Click handlers for jPlayerPlaylist method demo

		// Audio mix playlist

		$("#playlist-setPlaylist-audio-mix").click(function() {
			myPlaylist.setPlaylist([
				{
					title:"Cro Magnon Man",
					artist:"The Stark Palace",
					mp3:"http://www.jplayer.org/audio/mp3/TSP-01-Cro_magnon_man.mp3",
					oga:"http://www.jplayer.org/audio/ogg/TSP-01-Cro_magnon_man.ogg",
					poster: "http://www.jplayer.org/audio/poster/The_Stark_Palace_640x360.png"
				},
				{
					title:"Your Face",
					artist:"The Stark Palace",
					mp3:"http://www.jplayer.org/audio/mp3/TSP-05-Your_face.mp3",
					oga:"http://www.jplayer.org/audio/ogg/TSP-05-Your_face.ogg",
					poster: "http://www.jplayer.org/audio/poster/The_Stark_Palace_640x360.png"
				},
				{
					title:"Hidden",
					artist:"Miaow",
					free: true,
					mp3:"http://www.jplayer.org/audio/mp3/Miaow-02-Hidden.mp3",
					oga:"http://www.jplayer.org/audio/ogg/Miaow-02-Hidden.ogg",
					poster: "http://www.jplayer.org/audio/poster/Miaow_640x360.png"
				},
				{
					title:"Cyber Sonnet",
					artist:"The Stark Palace",
					mp3:"http://www.jplayer.org/audio/mp3/TSP-07-Cybersonnet.mp3",
					oga:"http://www.jplayer.org/audio/ogg/TSP-07-Cybersonnet.ogg",
					poster: "http://www.jplayer.org/audio/poster/The_Stark_Palace_640x360.png"
				},
				{
					title:"Tempered Song",
					artist:"Miaow",
					mp3:"http://www.jplayer.org/audio/mp3/Miaow-01-Tempered-song.mp3",
					oga:"http://www.jplayer.org/audio/ogg/Miaow-01-Tempered-song.ogg",
					poster: "http://www.jplayer.org/audio/poster/Miaow_640x360.png"
				},
				{
					title:"Lentement",
					artist:"Miaow",
					mp3:"http://www.jplayer.org/audio/mp3/Miaow-03-Lentement.mp3",
					oga:"http://www.jplayer.org/audio/ogg/Miaow-03-Lentement.ogg",
					poster: "http://www.jplayer.org/audio/poster/Miaow_640x360.png"
				}
			]);
		});

		// Video mix playlist

		$("#playlist-setPlaylist-video-mix").click(function() {
			myPlaylist.setPlaylist([
				{
					title:"Big Buck Bunny Trailer",
					artist:"Blender Foundation",
					m4v:"http://www.jplayer.org/video/m4v/Big_Buck_Bunny_Trailer.m4v",
					ogv:"http://www.jplayer.org/video/ogv/Big_Buck_Bunny_Trailer.ogv",
					webmv: "http://www.jplayer.org/video/webm/Big_Buck_Bunny_Trailer.webm",
					poster:"http://www.jplayer.org/video/poster/Big_Buck_Bunny_Trailer_480x270.png"
				},
				{
					title:"Finding Nemo Teaser",
					artist:"Pixar",
					m4v: "http://www.jplayer.org/video/m4v/Finding_Nemo_Teaser.m4v",
					ogv: "http://www.jplayer.org/video/ogv/Finding_Nemo_Teaser.ogv",
					webmv: "http://www.jplayer.org/video/webm/Finding_Nemo_Teaser.webm",
					poster: "http://www.jplayer.org/video/poster/Finding_Nemo_Teaser_640x352.png"
				},
				{
					title:"Incredibles Teaser",
					artist:"Pixar",
					m4v: "http://www.jplayer.org/video/m4v/Incredibles_Teaser.m4v",
					ogv: "http://www.jplayer.org/video/ogv/Incredibles_Teaser.ogv",
					webmv: "http://www.jplayer.org/video/webm/Incredibles_Teaser.webm",
					poster: "http://www.jplayer.org/video/poster/Incredibles_Teaser_640x272.png"
				}
			]);
		});

		// Media mix playlist

		$("#playlist-setPlaylist-media-mix").click(function() {
			myPlaylist.setPlaylist([
				{
					title:"Cro Magnon Man",
					artist:"The Stark Palace",
					mp3:"http://www.jplayer.org/audio/mp3/TSP-01-Cro_magnon_man.mp3",
					oga:"http://www.jplayer.org/audio/ogg/TSP-01-Cro_magnon_man.ogg",
					poster: "http://www.jplayer.org/audio/poster/The_Stark_Palace_640x360.png"
				},
				{
					title:"Your Face",
					artist:"The Stark Palace",
					mp3:"http://www.jplayer.org/audio/mp3/TSP-05-Your_face.mp3",
					oga:"http://www.jplayer.org/audio/ogg/TSP-05-Your_face.ogg",
					poster: "http://www.jplayer.org/audio/poster/The_Stark_Palace_640x360.png"
				},
				{
					title:"Hidden",
					artist:"Miaow",
					free: true,
					mp3:"http://www.jplayer.org/audio/mp3/Miaow-02-Hidden.mp3",
					oga:"http://www.jplayer.org/audio/ogg/Miaow-02-Hidden.ogg",
					poster: "http://www.jplayer.org/audio/poster/Miaow_640x360.png"
				},
				{
					title:"Big Buck Bunny Trailer",
					artist:"Blender Foundation",
					m4v:"http://www.jplayer.org/video/m4v/Big_Buck_Bunny_Trailer.m4v",
					ogv:"http://www.jplayer.org/video/ogv/Big_Buck_Bunny_Trailer.ogv",
					webmv: "http://www.jplayer.org/video/webm/Big_Buck_Bunny_Trailer.webm",
					poster:"http://www.jplayer.org/video/poster/Big_Buck_Bunny_Trailer_480x270.png"
				},
				{
					title:"Finding Nemo Teaser",
					artist:"Pixar",
					m4v: "http://www.jplayer.org/video/m4v/Finding_Nemo_Teaser.m4v",
					ogv: "http://www.jplayer.org/video/ogv/Finding_Nemo_Teaser.ogv",
					webmv: "http://www.jplayer.org/video/webm/Finding_Nemo_Teaser.webm",
					poster: "http://www.jplayer.org/video/poster/Finding_Nemo_Teaser_640x352.png"
				},
				{
					title:"Cyber Sonnet",
					artist:"The Stark Palace",
					mp3:"http://www.jplayer.org/audio/mp3/TSP-07-Cybersonnet.mp3",
					oga:"http://www.jplayer.org/audio/ogg/TSP-07-Cybersonnet.ogg",
					poster: "http://www.jplayer.org/audio/poster/The_Stark_Palace_640x360.png"
				},
				{
					title:"Incredibles Teaser",
					artist:"Pixar",
					m4v: "http://www.jplayer.org/video/m4v/Incredibles_Teaser.m4v",
					ogv: "http://www.jplayer.org/video/ogv/Incredibles_Teaser.ogv",
					webmv: "http://www.jplayer.org/video/webm/Incredibles_Teaser.webm",
					poster: "http://www.jplayer.org/video/poster/Incredibles_Teaser_640x272.png"
				},
				{
					title:"Tempered Song",
					artist:"Miaow",
					mp3:"http://www.jplayer.org/audio/mp3/Miaow-01-Tempered-song.mp3",
					oga:"http://www.jplayer.org/audio/ogg/Miaow-01-Tempered-song.ogg",
					poster: "http://www.jplayer.org/audio/poster/Miaow_640x360.png"
				},
				{
					title:"Lentement",
					artist:"Miaow",
					mp3:"http://www.jplayer.org/audio/mp3/Miaow-03-Lentement.mp3",
					oga:"http://www.jplayer.org/audio/ogg/Miaow-03-Lentement.ogg",
					poster: "http://www.jplayer.org/audio/poster/Miaow_640x360.png"
				}
			]);
		});

		// Miaow tracks

		$("#playlist-add-bubble").click(function() {
			myPlaylist.add({
				title:"Bubble",
				artist:"Miaow",
				free:true,
				mp3:"http://www.jplayer.org/audio/mp3/Miaow-07-Bubble.mp3",
				oga:"http://www.jplayer.org/audio/ogg/Miaow-07-Bubble.ogg",
				poster: "http://www.jplayer.org/audio/poster/Miaow_640x360.png"
			});
		});

		$("#playlist-add-hidden").click(function() {
			myPlaylist.add({
				title:"Hidden",
				artist:"Miaow",
				free: true,
				mp3:"http://www.jplayer.org/audio/mp3/Miaow-02-Hidden.mp3",
				oga:"http://www.jplayer.org/audio/ogg/Miaow-02-Hidden.ogg",
				poster: "http://www.jplayer.org/audio/poster/Miaow_640x360.png"
			});
		});

		$("#playlist-add-tempered-song").click(function() {
			myPlaylist.add({
				title:"Tempered Song",
				artist:"Miaow",
				mp3:"http://www.jplayer.org/audio/mp3/Miaow-01-Tempered-song.mp3",
				oga:"http://www.jplayer.org/audio/ogg/Miaow-01-Tempered-song.ogg",
				poster: "http://www.jplayer.org/audio/poster/Miaow_640x360.png"
			});
		});

		$("#playlist-add-lentement").click(function() {
			myPlaylist.add({
				title:"Lentement",
				artist:"Miaow",
				mp3:"http://www.jplayer.org/audio/mp3/Miaow-03-Lentement.mp3",
				oga:"http://www.jplayer.org/audio/ogg/Miaow-03-Lentement.ogg",
				poster: "http://www.jplayer.org/audio/poster/Miaow_640x360.png"
			});
		});

		// The Stark Palace tracks

		$("#playlist-add-cro-magnon-man").click(function() {
			myPlaylist.add({
				title:"Cro Magnon Man",
				artist:"The Stark Palace",
				mp3:"http://www.jplayer.org/audio/mp3/TSP-01-Cro_magnon_man.mp3"
			});
		});

		$("#playlist-add-your-face").click(function() {
			myPlaylist.add({
				title:"Your Face",
				artist:"The Stark Palace",
				mp3:"http://www.jplayer.org/audio/mp3/TSP-05-Your_face.mp3",
				oga:"http://www.jplayer.org/audio/ogg/TSP-05-Your_face.ogg",
				poster: "http://www.jplayer.org/audio/poster/The_Stark_Palace_640x360.png"
			});
		});
	<?php	 
		$music_list = mysql_query("select * from music where id_user='$user_id'");
		while($l_arr = mysql_fetch_array($music_list)){
		?>
		$("#<?php echo $l_arr['id'] ?>").click(function() {
			myPlaylist.add({
				title:"<?php echo $l_arr['title'] ?>",
				artist:"<?php echo $l_arr['artist'] ?>",
				mp3:"<?php	echo $l_arr['path']	?>"
			});
		});
		<?php
		}
		?>

		$("#playlist-add-cyber-sonnet").click(function() {
			myPlaylist.add({
				title:"Cyber Sonnet",
				artist:"The Stark Palace",
				mp3:"http://www.jplayer.org/audio/mp3/TSP-07-Cybersonnet.mp3",
				oga:"http://www.jplayer.org/audio/ogg/TSP-07-Cybersonnet.ogg",
				poster: "http://www.jplayer.org/audio/poster/The_Stark_Palace_640x360.png"
			});
		});

		// Videos

		$("#playlist-add-big-buck-bunny").click(function() {
			myPlaylist.add({
				title:"Big Buck Bunny Trailer",
				artist:"Blender Foundation",
				m4v:"http://www.jplayer.org/video/m4v/Big_Buck_Bunny_Trailer.m4v",
				ogv:"http://www.jplayer.org/video/ogv/Big_Buck_Bunny_Trailer.ogv",
				webmv: "http://www.jplayer.org/video/webm/Big_Buck_Bunny_Trailer.webm",
				poster:"http://www.jplayer.org/video/poster/Big_Buck_Bunny_Trailer_480x270.png"
			});
		});

		$("#playlist-add-finding-nemo").click(function() {
			myPlaylist.add({
				title:"Finding Nemo Teaser",
				artist:"Pixar",
				m4v: "http://www.jplayer.org/video/m4v/Finding_Nemo_Teaser.m4v",
				ogv: "http://www.jplayer.org/video/ogv/Finding_Nemo_Teaser.ogv",
				webmv: "http://www.jplayer.org/video/webm/Finding_Nemo_Teaser.webm",
				poster: "http://www.jplayer.org/video/poster/Finding_Nemo_Teaser_640x352.png"
			});
		});

		$("#playlist-add-incredibles").click(function() {
			myPlaylist.add({
				title:"Incredibles Teaser",
				artist:"Pixar",
				m4v: "http://www.jplayer.org/video/m4v/Incredibles_Teaser.m4v",
				ogv: "http://www.jplayer.org/video/ogv/Incredibles_Teaser.ogv",
				webmv: "http://www.jplayer.org/video/webm/Incredibles_Teaser.webm",
				poster: "http://www.jplayer.org/video/poster/Incredibles_Teaser_640x272.png"
			});
		});

		// The remove commands

		$("#playlist-remove").click(function() {
			myPlaylist.remove();
		});

		$("#playlist-remove--2").click(function() {
			myPlaylist.remove(-2);
		});
		$("#playlist-remove--1").click(function() {
			myPlaylist.remove(-1);
		});
		$("#playlist-remove-0").click(function() {
			myPlaylist.remove(0);
		});
		$("#playlist-remove-1").click(function() {
			myPlaylist.remove(1);
		});
		$("#playlist-remove-2").click(function() {
			myPlaylist.remove(2);
		});

		// The shuffle commands

		$("#playlist-shuffle").click(function() {
			myPlaylist.shuffle();
		});

		$("#playlist-shuffle-false").click(function() {
			myPlaylist.shuffle(false);
		});
		$("#playlist-shuffle-true").click(function() {
			myPlaylist.shuffle(true);
		});

		// The select commands

		$("#playlist-select--2").click(function() {
			myPlaylist.select(-2);
		});
		$("#playlist-select--1").click(function() {
			myPlaylist.select(-1);
		});
		$("#playlist-select-0").click(function() {
			myPlaylist.select(0);
		});
		$("#playlist-select-1").click(function() {
			myPlaylist.select(1);
		});
		$("#playlist-select-2").click(function() {
			myPlaylist.select(2);
		});

		// The next/previous commands

		$("#playlist-next").click(function() {
			myPlaylist.next();
		});
		$("#playlist-previous").click(function() {
			myPlaylist.previous();
		});

		// The play commands

		$("#playlist-play").click(function() {
			myPlaylist.play();
		});

		$("#playlist-play--2").click(function() {
			myPlaylist.play(-2);
		});
		$("#playlist-play--1").click(function() {
			myPlaylist.play(-1);
		});
		$("#playlist-play-0").click(function() {
			myPlaylist.play(0);
		});
		$("#playlist-play-1").click(function() {
			myPlaylist.play(1);
		});
		$("#playlist-play-2").click(function() {
			myPlaylist.play(2);
		});

		// The pause command

		$("#playlist-pause").click(function() {
			myPlaylist.pause();
		});

		// Changing the playlist options

		// Option: autoPlay

		$("#playlist-option-autoPlay-true").click(function() {
			myPlaylist.option("autoPlay", true);
		});
		$("#playlist-option-autoPlay-false").click(function() {
			myPlaylist.option("autoPlay", false);
		});

		// Option: enableRemoveControls

		$("#playlist-option-enableRemoveControls-true").click(function() {
			myPlaylist.option("enableRemoveControls", true);
		});
		$("#playlist-option-enableRemoveControls-false").click(function() {
			myPlaylist.option("enableRemoveControls", false);
		});

		// Option: displayTime

		$("#playlist-option-displayTime-0").click(function() {
			myPlaylist.option("displayTime", 0);
		});
		$("#playlist-option-displayTime-fast").click(function() {
			myPlaylist.option("displayTime", "fast");
		});
		$("#playlist-option-displayTime-slow").click(function() {
			myPlaylist.option("displayTime", "slow");
		});
		$("#playlist-option-displayTime-2000").click(function() {
			myPlaylist.option("displayTime", 2000);
		});

		// Option: addTime

		$("#playlist-option-addTime-0").click(function() {
			myPlaylist.option("addTime", 0);
		});
		$("#playlist-option-addTime-fast").click(function() {
			myPlaylist.option("addTime", "fast");
		});
		$("#playlist-option-addTime-slow").click(function() {
			myPlaylist.option("addTime", "slow");
		});
		$("#playlist-option-addTime-2000").click(function() {
			myPlaylist.option("addTime", 2000);
		});

		// Option: removeTime

		$("#playlist-option-removeTime-0").click(function() {
			myPlaylist.option("removeTime", 0);
		});
		$("#playlist-option-removeTime-fast").click(function() {
			myPlaylist.option("removeTime", "fast");
		});
		$("#playlist-option-removeTime-slow").click(function() {
			myPlaylist.option("removeTime", "slow");
		});
		$("#playlist-option-removeTime-2000").click(function() {
			myPlaylist.option("removeTime", 2000);
		});

		// Option: shuffleTime

		$("#playlist-option-shuffleTime-0").click(function() {
			myPlaylist.option("shuffleTime", 0);
		});
		$("#playlist-option-shuffleTime-fast").click(function() {
			myPlaylist.option("shuffleTime", "fast");
		});
		$("#playlist-option-shuffleTime-slow").click(function() {
			myPlaylist.option("shuffleTime", "slow");
		});
		$("#playlist-option-shuffleTime-2000").click(function() {
			myPlaylist.option("shuffleTime", 2000);
		});

		// Equivalent commands

		$("#playlist-equivalent-1-a").click(function() {
			myPlaylist.add({
				title:"Your Face",
				artist:"The Stark Palace",
				mp3:"http://www.jplayer.org/audio/mp3/TSP-05-Your_face.mp3",
				oga:"http://www.jplayer.org/audio/ogg/TSP-05-Your_face.ogg",
				poster: "http://www.jplayer.org/audio/poster/The_Stark_Palace_640x360.png"
			}, true);
		});

		$("#playlist-equivalent-1-b").click(function() {
			myPlaylist.add({
				title:"Your Face",
				artist:"The Stark Palace",
				mp3:"http://www.jplayer.org/audio/mp3/TSP-05-Your_face.mp3",
				oga:"http://www.jplayer.org/audio/ogg/TSP-05-Your_face.ogg",
				poster: "http://www.jplayer.org/audio/poster/The_Stark_Palace_640x360.png"
			});
			myPlaylist.play(-1);
		});

		// AVOID COMMANDS

		$("#playlist-avoid-1").click(function() {
			myPlaylist.remove(2); // Removes the 3rd item
			myPlaylist.remove(3); // Ignored unless removeTime=0: Where it removes the 4th item, which was originally the 5th item.
		});


	}
	);
	//]]>
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
			<li><a href="gallery.php">Photos</a></li>
			<li class="active"><a href="music.php">Music</a></li>
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

<div class="container">
  <h5>User's music</h5>
  <hr>

  <div id="jp_container_N" class="jp-video jp-video-270p" role="application" aria-label="media player"  style="margin-left:30px">
		<div class="jp-type-playlist">
			<div id="jquery_jplayer_N" class="jp-jplayer"></div>
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
					<div class="jp-details">
						<div class="jp-title" aria-label="title">&nbsp;</div>
					</div>
					<div class="jp-controls-holder">
						<div class="jp-volume-controls">
							<button class="jp-mute" role="button" tabindex="0">mute</button>
							<button class="jp-volume-max" role="button" tabindex="0">max volume</button>
							<div class="jp-volume-bar">
								<div class="jp-volume-bar-value"></div>
							</div>
						</div>
						<div class="jp-controls">
							<button class="jp-previous" role="button" tabindex="0">previous</button>
							<button class="jp-play" role="button" tabindex="0">play</button>
							<button class="jp-stop" role="button" tabindex="0">stop</button>
							<button class="jp-next" role="button" tabindex="0">next</button>
						</div>
						<div class="jp-toggles">
							<button class="jp-repeat" role="button" tabindex="0">repeat</button>
							<button class="jp-shuffle" role="button" tabindex="0">shuffle</button>
							<button class="jp-full-screen" role="button" tabindex="0">full screen</button>
						</div>
					</div>
				</div>
			</div>
			<div class="jp-playlist">
				<ul>
					<!-- The method Playlist.displayPlaylist() uses this unordered list -->
					<li></li>
				</ul>
			</div>
			<div class="jp-no-solution">
				<span>Update Required</span>
				To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
			</div>
		</div>
	</div>
 
</div>
</div>

<div class="col s2 m2">
<?php if($user_id == $_SESSION['id']) {?>
	<div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Upload</span>
              <p>Here you can upload new music )</p>
            </div>
            <div class="center card-action">
			<a class="waves-effect waves-light btn modal-trigger" href="#loading">Modal</a>
			</div>
    </div>
<?php } else { ?>

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
	<div class="card blue-grey darken-2 center">
	<a class="waves-effect waves-light btn modal-trigger" href="#track_list">TrackList</a>
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
			<div class="input-field col m12">
			  <input id="last_name" type="text" class="validate" name="artist">
			  <label for="last_name">Artist</label>
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
   <div id="track_list" class="modal">
    <div class="modal-content">

	<ul class="collection with-header">
	<?php
	$music_l = mysql_query("select * from music where id_user='$user_id'");
	while($m_arr = mysql_fetch_array($music_l)){
		
		?>
		 <li class="collection-item"><div><?php	echo $m_arr['artist']." ".$m_arr['title']?> <code><a href="javascript:;" id="<?php echo $m_arr['id'] ?>" class="secondary-content" onClick=" Materialize.toast('<?php	echo $m_arr['artist']." ".$m_arr['title']?> was added.', 4000)"><i class="mdi-content-send"></i></a> </code> </div></li>
		<?php
		
	}
	
	?>
	</ul>
	  
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
		<script src="load/js/jquery.knob.js"></script>

		<!-- jQuery File Upload Dependencies -->
		<script src="load/js/jquery.ui.widget.js"></script>
		<script src="load/js/jquery.iframe-transport.js"></script>
		<script src="load/js/jquery.fileupload.js"></script>
		
		<!-- Our main JS file -->
		<script src="load/js/script.js"></script>
    </body>
</html>