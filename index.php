<?php
	session_start();
	if ((isset($_SESSION['email'])) || (isset($_SESSION['email'])) || (isset($_SESSION['email']))){
		  header("Location: /pages/profile.php");
	}
?>
<!DOCTYPE html>
  <html>
    <head>
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="pages/css/materialize.min.css"  media="screen,projection"/>
	  <link type="text/css" rel="stylesheet" href="pages/css/user.css"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	  	<script>	
		function clearAll(){
			$("input").val('');
			}
			
		function sendLog() {
				$.ajax({
					type: "POST",
					url: "/materialize/login.php",
					data:({ email: $("#email").val(), 
							password: $("#password").val()}),
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
	<div class="navbar-fixed">
	
	  <nav class="indigo accent-2">
		<div class="nav-wrapper">
		  <a href="#" class="brand-logo left">M and D</a>
		  <ul id="nav-mobile" class="right hide-on-med-and-down">
		  
			<li><a class="modal-trigger" href="#sign-up-modal">Login</a></li>
			<li><a href="registration.php">Join us</a></li>
			
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
			
		<div class="parallax-container">			
			<div class="parallax">
				<img id="parallax1" src="pages/image/parallax1.jpg">
			</div>
		</div>	
		
		<div class="section">
		
			<div class="row container">				

				  <div class="col s12 m4 center">
					
					<i class="large mdi-hardware-keyboard"></i>
					
					<div class="section">
						<h4>Communicate</h4>
						<p>
							Cowfish, bandfish yellowtail clownfish, skipjack tuna whitetip reef shark spotted dogfish spiny dogfish Asiatic glassfish. Porcupinefish golden loach conger eel loweye catfish; vendace sailback scorpionfish filefish zebra shark bluefin tuna mouthbrooder yellowtail amberjack. Sand lance. Long-whiskered catfish largemouth bass flagfin creek chub glowlight danio Molly Miller zander Kafue pike gar sailback scorpionfish whalefish.
						</p>
					</div>
					
				  </div>
				  
				  <div class="col s12 m4 center">
					
					<i class="large mdi-editor-insert-emoticon"></i>
					
					<div class="section">
						<h4>Laught</h4>
						<p>
							Cowfish, bandfish yellowtail clownfish, skipjack tuna whitetip reef shark spotted dogfish spiny dogfish Asiatic glassfish. Porcupinefish golden loach conger eel loweye catfish; vendace sailback scorpionfish filefish zebra shark bluefin tuna mouthbrooder yellowtail amberjack. Sand lance. Long-whiskered catfish largemouth bass flagfin creek chub glowlight danio Molly Miller zander Kafue pike gar sailback scorpionfish whalefish.
						</p>
					</div>
					
				  </div>
				  
				  <div class="col s12 m4 center">

					<i class="large mdi-action-favorite"></i>
					
					<div class="section">
						<h4>Love</h4>
						<p>
							Cowfish, bandfish yellowtail clownfish, skipjack tuna whitetip reef shark spotted dogfish spiny dogfish Asiatic glassfish. Porcupinefish golden loach conger eel loweye catfish; vendace sailback scorpionfish filefish zebra shark bluefin tuna mouthbrooder yellowtail amberjack. Sand lance. Long-whiskered catfish largemouth bass flagfin creek chub glowlight danio Molly Miller zander Kafue pike gar sailback scorpionfish whalefish.
						</p>
					</div>
					
				  </div>				
				
			</div>
		</div>
		
		<div class="parallax-container">			
			<div class="parallax">
				<img id="parallax2" src="pages/image/parallax2.jpg">
			</div>
		</div>

		<div class="section">
		
			<div class="row container">
			
				<h2 class="header">Why are we?</h2>

						<ul id="staggered-test">
							<li class="flow-text">Is this the real life?</li>
							<li class="flow-text">Is this just fantasy?</li>
							<li class="flow-text">Caught in a landslide.</li>
							<li class="flow-text">No escape from reality.</li>
							<li class="flow-text">Open your eyes, Look up to the skies and see.</li>
						<ul/>

				</div>
			</div>
		</div>	
			<div class="parallax-container">			
				<div class="parallax">
					<img id="parallax4" src="pages/image/parallax4.jpg">
				</div>
			</div>	
			<div class="row valign-wrapper">
				<div class="col s12 m8">
					<p class="flow-text">
						I ask the indulgence of the children who may read this book for dedicating it to a grown-up. I have a serious reason: he is the best friend I have in the world. I have another reason: this grown-up understands everything, even books about children. I have a third reason: he lives in France where he is hungry and cold. He needs cheering up. If all these reasons are not enough, I will dedicate the book to the child from whom this grown-up grew. All grown-ups were once children-- although few of them remember it.
					</p>
				</div>
				<div id="photo1" class="col s12 m4">
					<img class="circle responsive-img" src="pages/image/people2.jpg"/>
				</div>
			</div>
			<div class="parallax-container">			
				<div class="parallax">
					<img id="parallax5" src="pages/image/parallax5.jpg">
				</div>
			</div>	
			<div class="row valign-wrapper">
				<div class="col s12 m4">
					<img class="responsive-img" src="pages/image/people1.jpg"/>	
				</div>
				<div class="col s12 m8">
					<p class="flow-text">
						Once when I was six years old I saw a magnificent picture in a book, called True Stories from Nature, about the primeval forest. It was a picture of a boa constrictor in the act of swallowing an animal. Here is a copy of the drawing.
					</p>
					<p class="flow-text">	
						In the book it said: "Boa constrictors swallow their prey whole, without chewing it. After that they are not able to move, and they sleep through the six months that they need for digestion."
					</p>
				</div>
			</div>
			<div class="parallax-container">			
				<div class="parallax">
					<img id="parallax6" src="pages/image/parallax6.jpg">
				</div>
			</div>	
			<div class="row valign-wrapper">
				<div class="col s12 m6">
					<p class="flow-text">
						 My friend broke into another peal of laughter:
					</p>
					<p class="flow-text">
						"But where do you think he would go?"
					</p>
					<p class="flow-text">
						"Anywhere. Straight ahead of him."
					</p>
					<p class="flow-text">
						Then the little prince said, earnestly:
					</p>
					<p class="flow-text">
						"That doesn't matter. Where I live, everything is so small!"
					</p>
					<p class="flow-text">
						And, with perhaps a hint of sadness, he added:
					</p>
					<p class="flow-text">
						"Straight ahead of him, nobody can go very far..."
					</p>
				</div>
				<div class="col s12 m6">
					<img class="circle responsive-img" src="pages/image/people3.jpg"/>
				</div>
			</div>
		<div class="parallax-container">			
			<div class="parallax">
				<img id="parallax7" src="pages/image/parallax7.jpg">
			</div>
		</div>	
		<div class="row">
			<div class="col s12 m12">
				<p class="flow-text">
					"Just that," said the fox. "To me, you are still nothing more than a little boy who is just like a hundred thousand other little boys. And I have no need of you. And you, on your part, have no need of me. To you, I am nothing more than a fox like a hu ndred thousand other foxes. But if you tame me, then we shall need each other. To me, you will be unique in all the world. To you, I shall be unique in all the world..."
				</p>
				<p class="flow-text">				
					"I am beginning to understand," said the little prince. "There is a flower... I think that she has tamed me..."
				</p>
			</div>
		</div>
		<div class="parallax-container">			
			<div class="parallax">
				<img id="parallax3" src="pages/image/parallax3.jpg">
			</div>
		</div>	
	</div>
</main>

<?php
	include('pages/php/footer.php');
?>

<div id="sign-up-modal" class="modal bottom-sheet">
		<div class="modal-content center">
			<h5>Please, enter your login and password</h5>
			<div class="row">
				<div class="col s12">
				  <div class="row">
					<div class="input-field col s6">
					  <i class="mdi-action-account-circle prefix"></i>
					  <input id="email" type="text" class="validate" autocomplete="off">
					  <label for="email">Email</label>
					</div>
					<div class="input-field col s6">
					  <i class="mdi-action-verified-user prefix"></i>
					  <input id="password" type="password" class="validate" autocomplete="off">
					  <label for="password">Password</label>
					</div>
				  </div>
				</div>
			  </div>
			  <div id="result"></div>
		</div>
		<div class="modal-footer">
			<a onClick="sendLog()" class=" modal-action modal-close waves-effect waves-green btn-flat">Let's go</a>
		</div>
</div>
	  
      <script type="text/javascript" src="pages/js/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="pages/js/materialize.min.js"></script>
	    <script>
			$(document).ready(function(){
			  $('.parallax').parallax();
			});				
		</script>
		<script>
		var options = [
			{selector: '#staggered-test', offset: 100, callback: 'Materialize.showStaggeredList("#staggered-test")' },
			{selector: '#parallax2', offset: 100, callback: 'Materialize.fadeInImage("#parallax2")' },
			{selector: '#parallax3', offset: 100, callback: 'Materialize.fadeInImage("#parallax3")' },
			{selector: '#parallax4', offset: 100, callback: 'Materialize.fadeInImage("#parallax4")' },
			{selector: '#parallax5', offset: 100, callback: 'Materialize.fadeInImage("#parallax5")' },
			{selector: '#parallax6', offset: 100, callback: 'Materialize.fadeInImage("#parallax6")' },
			{selector: '#parallax7', offset: 100, callback: 'Materialize.fadeInImage("#parallax7")' }
		  ];
		  Materialize.scrollFire(options);
		</script>
		<script>
			$(document).ready(function(){				
				$('.modal-trigger').leanModal();				
			});
		</script>
    </body>
  </html>       