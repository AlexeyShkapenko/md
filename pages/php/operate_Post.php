<?php

/*

// ѕолучаем 10 статей, начина€ с последней отображенной
$res = mysql_query("SELECT * FROM text_post ORDER BY id DESC LIMIT {$startFrom}, 4");

// ‘ормируем массив со стать€ми
$articles = array();
while ($row = mysql_fetch_array($res))
{
    $articles[] = $row;
}

// ѕревращаем массив статей в json-строку дл€ передачи через Ajax-запрос
echo json_encode($articles); */
session_start();
include('func.php');
connect_db();
$startFrom = $_POST['startFrom'];
$user_id = $_POST['id'];
$user_inf = mysql_fetch_array(mysql_query("select * from users where id='$user_id'"));

		$user_post = mysql_query("select * from text_post where user_id='$user_id' ORDER BY id DESC LIMIT {$startFrom}, 4");
		
			while($arr = mysql_fetch_array($user_post)){
			?>
				<div class="row card-panel blue lighten-4">
				<div class="col m2 ">
				
			<div class="card">
				<div class="card-image waves-effect waves-block waves-light">
				  <img class="activator" src="<?php echo $user_inf['ava'] ?>">
				</div>
				<div>
				<div class="center-align">
				<a href="profile.php?id<?php echo $user_id ?>"><span style="font-size: 1.2em"><?php echo $user_inf['first_name']." ".$user_inf['last_name']; ?></span></a>
				</div>
				</div>

			  </div>
				
				</div>
				<div class="col m10">
				<div class="posts section section-page page-divided z-depth-2 blue lighten-4">
						    <div class="card-panel teal lighten-2"><?php echo $arr['name']; ?></div>
							<div class="card-panel teal lighten-3">
							<p>
								<?php echo $arr['content']; ?>
							</p>
							</div>						   
								<ul class="collapsible" data-collapsible="expandable">
									<li>
									 	<div class="collapsible-header lighten-5"><i class="mdi-maps-place"></i>Comments</div>
										<div class="collapsible-body">
										<?php
												$post_id = $arr['id'];
												$user_comment = mysql_query("select * from comment_text_post where id_post='$post_id' ORDER BY id");
												while($arr1 = mysql_fetch_array($user_comment)){
													?>
										  <div class="container-fluid">
										  <div class="card-panel teal lighten-3">
												<div class="row valign-wrapper" style="margin-bottom:3px">
													<div class="col m4 valign-wrapper">
													
													<?php $lefter = $arr1['id_user']; 
														  $lefter_inf = mysql_fetch_array(mysql_query("select * from users where id='$lefter'"));
													?>
													
															<div class="card">
																<div class="card-image waves-effect waves-block waves-light">
																  <img class="activator" src="<?php echo $lefter_inf['ava'] ?>">
																</div>
																<div>
																<div class="center-align">
																<a href="profile.php?id<?php echo $lefter_inf['id'] ?>"><span style="font-size: 1.2em"><?php echo $lefter_inf['first_name']." ".$lefter_inf['last_name']; ?></span></a>
																</div>
																</div>

													</div>
													</div>
													<div class="col m8" style="height:100%">
													
													<div class="card-panel teal lighten-4">
														<span>
														
															<?php echo $arr1['text']; ?>

														</span>
													</div>
													<div class="teal lighten-3 right">
														<span>
														
															<?php echo "Time: ".$arr1['time']; ?>

														</span>
													</div>
													</div>
											</div>
											</div>
										  </div>
												<?php }
										  ?>
										  <div class="container-fluid">
												<div class="row lime lighten-5">
													<form action="" method="POST" class="col s12">
													  <div class="row">
														<input type="hidden" value="<?php echo $arr['id']; ?>" name="id_number">
														<div class="input-field col s12">
														  <textarea name="new_comment" id="new_comment" class="materialize-textarea"></textarea>
														  <label for="textarea1">Write your comment</label>
														</div>
														<input type="hidden" value="<?php	echo $_SESSION['id']; ?>" name="id">
														<div style="padding-left: 1.5em">
														<button type="submit" class="waves-effect waves-light btn" name="addComment">Send</button>
														</div>
													  </div>
													</form>
												  </div>
											</div>
										</div>
									</li>
								</ul>
				</div>
				</div>
				</div>
			<?php 	}	?>

	  <script>
			$(document).ready(function(){
			$('.collapsible').collapsible({
			  accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
			});
		  });
	  </script>
