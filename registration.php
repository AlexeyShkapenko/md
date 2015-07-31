<!DOCTYPE html>
  <html>
    <head>
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="pages/css/materialize.min.css"  media="screen,projection"/>
	  <link type="text/css" rel="stylesheet" href="pages/css/user.css"  media="screen,projection"/>
      <script type="text/javascript" src="pages/js/jquery-2.1.1.min.js"></script>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	      <script>
		function clearAll(){

			$("input").val('');
			$("textarea").val('');
			$("select").val('Choose your country.');
		}
		function sendInf() {
				$.ajax({
					type: "POST",
					url: "/jdi/materialize/sign_up.php",
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
	
	  <nav class="indigo accent-2">
		<div class="nav-wrapper">
		  <a href="#" class="brand-logo left">M and D</a>
		  <ul id="nav-mobile" class="right hide-on-med-and-down">
		  
			<li><a class="mdi-content-undo prefix" href="index.php">Back to the main page</a></li>
			
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
<div class="container">
	<div>
	<div class="row pin-reg">
	<div class="col s10">
	<div class="col s12 m9 l10">
		<h4>Please fill the registration form</h4>
		<div class="divider"></div>
		<div id="introduction" class="section scrollspy">
			<h5>Main information <span style="font-size:0.7em">(necessary)</span></h5>
			<div class="divider"></div>
			<div>
				<div class="row">
					<div class="col s12">
					  <div class="row">
						<div class="input-field col s6">
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
	</div>
	
	<div class="col s12 m9 l10">
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
	</div>
		
		<div class="col s12 m9 l10">
		<div id="initialization" class="section scrollspy">
			<h5>Control question</h5>
			<div class="divider"></div>
			<div>
				<div class="row">
				  <div class="col s12">
					<div class="row">
					  <div class="input-field col s6">
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
	</div>
		<div class="col s12 m9 l10">
			<div id="result">

			</div>
		</div>
	</div>
	<div class="col s2">
    <div class="col hide-on-small-only m3 l2">
      <ul class="section table-of-contents">
        <li><a href="#introduction">Main</a></li>
        <li><a href="#structure">Personal</a></li>
        <li><a href="#initialization">Control</a></li>
      </ul>
    </div>
	</div>
</div>
<div class="row center">
	<div class="col s5">
		<button class="btn waves-effect waves-light left" onClick="clearAll();">Clear
			<i class="mdi-toggle-radio-button-off left"></i>
		</button>
	</div>
	<div class="offset-s1 col s4">
		<button class="btn waves-effect waves-light" name="action" onClick="sendInf();">Submit
			<i class="mdi-content-send right"></i>
		</button>
	</div>
</div>
	</div>

</div>
</main>

<footer class="page-footer indigo accent-1">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2014 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
          </div>
</footer>	
	  

    <script type="text/javascript" src="pages/js/materialize.min.js"></script>
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
	<script>
	    $(document).ready(function() {
		$('select').material_select();
	  });
	  </script>
	<script>
		$(document).ready(function(){
			$('.table-of-contents').pushpin({ top: $('.pin-reg').offset().top });
		  });
		  
		$("#mobile-demo").sideNav();
	</script>
    </body>
  </html>       