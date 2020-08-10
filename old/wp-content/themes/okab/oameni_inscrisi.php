<?php
/**
 * Oameni inscrisi administration panel.
 *
 * @package WordPress
 * @subpackage cursanti
 */
global $wpdb;

 if(isset($_POST['selectValue']) || isset($_POST['rata2']) || isset($_POST['rata3'])){ //check if form was submitted
 	if ($_POST['selectValue'] != 5) {
 		$input = $_POST['id'];
 		 $status = 1; //get input text
 		 if($_POST['rata2']) {
 		 	$status = $_POST['rata2'];
 		 }
 		 if($_POST['rata3']) {
 		 	$status = $_POST['rata3'];
 		 }
 		 if($_POST['selectValue'] == '2' || $_POST['selectValue'] == '1' || $_POST['selectValue'] == '0') {
 		 	$status = $_POST['selectValue'];
 		 }
 		 $message = "Success! You entered: ".$input;
 		 $updateQuery = "UPDATE `useri_inscrisi` SET status = ".$status." WHERE id =".$_POST['id'];
 		 $wpdb->get_results($updateQuery);
 		} else { 
 			$wpdb->delete( 'useri_inscrisi', array( 'ID' => $_POST['id'] ) );
 		}

 	}

 	if (isset($_POST['feedback_type'])) {

 		$id =  $_POST['feedback_id'];
 		if($_POST['method'] === 'post' ) {
 			$wpdb->insert( 
				'feedback_table', 
				array( 
					'email' => $_POST['email'], 
					'scor' => $_POST['scor'], 
					'organizare_good' => $_POST['organizare_good'],
					'organizare_improve' => $_POST['organizare_improve'],
					'test_cases_good' => $_POST['test_cases_good'],
					'test_cases_improve' => $_POST['test_cases_improve'],
					'defects_good' => $_POST['defects_good'],
					'defects_improve' => $_POST['defects_improve'],
					'traceability_good' => $_POST['traceability_good'],
					'traceability_improve' => $_POST['traceability_improve'],
					'type' => $_POST['feedback_type'],
					'modul' => $_POST['modul']
				), 
				array( 
					'%s', 
					'%d',
					'%s',
					'%s',
					'%s',
					'%s',
					'%s',
					'%s',
					'%s',
					'%s',
					'%s',
					'%s'
				) 
			);
 		}

 		if($_POST['method'] === 'put' ) {

 			$wpdb->update( 
				'feedback_table', 
				array( 
					'scor' => $_POST['scor'], 
					'organizare_good' => $_POST['organizare_good'],
					'organizare_improve' => $_POST['organizare_improve'],
					'test_cases_good' => $_POST['test_cases_good'],
					'test_cases_improve' => $_POST['test_cases_improve'],
					'defects_good' => $_POST['defects_good'],
					'defects_improve' => $_POST['defects_improve'],
					'traceability_good' => $_POST['traceability_good'],
					'traceability_improve' => $_POST['traceability_improve'],
				), 
				array( 'id' => $id ), 
				array( 
					'%d',
					'%s',
					'%s',
					'%s',
					'%s',
					'%s',
					'%s',
					'%s'
				),
				array( 
					'%d',
					'%s',
					'%s',
					'%s',
					'%s',
					'%s',
					'%s',
					'%s'
				) 
			);
 		}
 		
 	}


 	$query = "SELECT * from useri_inscrisi";
 	$records = $wpdb->get_results($query);

 	$args = array(
 		'post_type' => 'module',
 		'nopaging' => true,
 		'posts_per_page' => -1,
 		'orderby'=>'menu_order',
 		'order'=>'ASC');
 		$exec= new WP_Query($args); ?>
 		<div id="accordion">
 			<?php 
 			if ($exec->have_posts()) : while ($exec->have_posts()) : $exec->the_post(); ?>
 			<?php

 			$id = get_the_ID();
 			$perioade = explode(', ', get_post_meta(get_the_ID(), 'perioada', true));

 			?>

 			<div class="card" style="padding: 0px;max-width: 100%;">
 				<div class="card-header" id="headingOne">
 					<h5 class="mb-0">
 						<button class="btn btn-link" data-toggle="collapse" data-target="#collapse-<?php echo $id; ?>" aria-expanded="true" aria-controls="collapse-<?php echo $id; ?>">
 							Modulul: <?php the_title(); ?>
 						</button>
 					</h5>
 				</div>

 				<div id="collapse-<?php echo $id; ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
 					<div class="card-body">
 						<?php
 						foreach ($perioade as $perioada) {
 							if($perioada !== 'în curând') {
 							$rowcount = $wpdb->get_var("SELECT COUNT(*) FROM useri_inscrisi WHERE modul = $id AND perioada = '$perioada'");
 							if($rowcount > 0) { 
 							?>
 							<h4 style="margin:30px;">Perioada: <?php echo $perioada;  ?> <span class="pull-right"><a href="http://academiatestarii.ro/index.php/generate-pdf?modul=<?php echo $id; ?>&perioada=<?php echo $perioada;?>" class="btn btn-primary btn-sm" target="_blank">
 															Download PDF 
 														</a></h4>
 							<?php } ?>


 							<table class="wp-list-table widefat fixed striped wp_list_test_links">
 								<tr>
 									<th>Nume</th>
 									<th>Email</th>
                                    <th>Adresa</th>
 									<th>Telefon</th>
 									<th>Mod de plata</th>
 									<th>Status</th>
 									<th>Actiune</th>
 									<th>Actiune Rate</th>
 									<th>Feedback</th>
 								</tr>
 								<?php
 								if(!empty($records)){
 									foreach($records as $rec){
 										if ($rec->modul == $id && $rec->perioada ==  $perioada ) {
 											$status = '';
 											$mod_plata = '';
 											switch ($rec->mod_plata) {
 												case 1:
 												$mod_plata = 'Online';
 												break;
 												default:
 												$mod_plata = 'Transfer Bancar';
 												break;
 											}
 											$user =  $wpdb->get_row("SELECT * from db_module WHERE modul = $id AND perioada = '$perioada' AND email = '$rec->email'");
 											switch ($rec->status) {
 												case 2:
 												$status = 'Platit integral';
 												break;
 												case 1:
 												$status = 'Rata 1 platita';
 												break;
 												case 3:
 												$status = 'Rata 2 platita';
 												break;
 												default:
 												$status = 'Plata in asteptare';
 												break;
 											}
 											echo '<tr><td>'.$user->nume.' '.$user->prenume.'</td><td>'.$rec->email.'</td><td>'.$rec->adresa.'</td><td>'.$user->telefon.'</td><td>'.$mod_plata.'</td><td>'.$status.'</td>';
 											?>
 											<form action="" method="post">
 												<?php echo '<td>'; ?>

 													<input type="hidden" name="id" value="<?php echo $rec->id; ?>" />
 													<select name="selectValue" onchange='this.form.submit()'>
 														<option>Alege actiunea</option>
 														<option value="2">A platit integral</option>
 														<option value="1">A platit prima rata</option>
 														<option value="0">Nu a platit</option>
 														<option value="5" style="color:red;">Sterge </option>
 													</select>


 													<?php echo '</td>'; 
 													echo '<td>'; ?>
 														<input type="checkbox" name="rata2" <?php if($rec->status == 3 || $rec->status == 2) echo 'checked'; ?> value="3" onchange='this.form.submit()'> Rata 2 platita <br>
 														<input type="checkbox" name="rata3" <?php if($rec->status == 2) echo 'checked'; ?> value="2" onchange='this.form.submit()'> Rata 3 platita
 														<noscript><input style="display:none" type="submit" value="Submit"></noscript>
 													</form>
 													<?php echo '</td><td>'; ?>
 														<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#student-<?php echo $rec->email;?>">
 															 Feedback Student
 														</button>
 														<br>	<br>	
 														<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#companie-<?php echo $rec->email;?>">
 															 Feedback Companie
 														</button>
 														<!-- Modal -->
 														<div class="modal fade" id="student-<?php echo $rec->email;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 															<div class="modal-dialog" style="max-width: 600px;" role="document">
 																<div class="modal-content">
 																	<?php $feedback =  $wpdb->get_row("SELECT * from feedback_table WHERE modul = $id AND type = 'student' AND email = '$rec->email'"); ?>
 																	<form action="" method="post">
 																		<input type="hidden" name="feedback_type" value="student">
 																		<?php 
 																			if($feedback->id) {
 																				echo '<input type="hidden" name="method" value="put">';
 																				echo '<input type="hidden" name="feedback_id" value="'.$feedback->id.'">';
 																			} else {
 																				echo '<input type="hidden" name="method" value="post">';
 																			}
 																		?>
 																		<input type="hidden" name="email" value="<?php echo $rec->email;?>">
 																		<input type="hidden" name="modul" value="<?php echo $id; ?>">
 																		<div class="modal-header">
 																			<h5 class="modal-title" id="exampleModalLabel">Adauga Feedback Student pentru <?php echo $user->nume. ' '.$user->prenume ; ?> </h5>
 																			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 																				<span aria-hidden="true">&times;</span>
 																			</button>
 																		</div>
 																		<div class="modal-body">
 																			<div class="form-div">
 																				Alegeti un scor: <br><br>
 																				<?php 
 																					for($i = 1; $i < 11; $i++) { ?>
																				<div class="form-check form-check-inline">
 																					<input class="form-check-input" <?php if($feedback->scor == $i) echo 'checked'; ?> type="radio" name="scor" id="inlineCheckbox<?php echo $rec->email.'-'.$i ?>" value="<?php echo $i ?>">
 																					<label class="form-check-label" for="inlineCheckbox<?php echo $rec->email.'-'.$i ?>"><?php echo $i ?></label>
 																				</div>
																				<?php }
 																				?>
 																			</div> <br>
 																			<div class="form-div" style="margin-top:15px;">
 																				<h3 style="font-size:18px;">Organizare JIRA & Zephyr</h3>
 																				<div class="row">
 																					<div class="col-md-6">
 																					<label>Good Points</label>
 																					<textarea name="organizare_good" class="form-control"><?php echo $feedback->organizare_good; ?></textarea>
 																				</div>
 																				<div class="col-md-6">
 																					<label>To Improve</label>
 																					<textarea name="organizare_improve" class="form-control"><?php echo $feedback->organizare_improve; ?></textarea>
 																				</div>
 																				</div>
 																				
 																			</div>
 																			<div class="form-div" style="margin-top:15px;">
 																				<h3 style="font-size:18px;">Test Cases</h3>
 																				<div class="row">
	 																				<div class="col-md-6">
	 																					<label>Good Points</label>
	 																					<textarea name="test_cases_good" class="form-control"><?php echo $feedback->test_cases_good; ?></textarea>
	 																				</div>
	 																				<div class="col-md-6">
	 																					<label>To Improve</label>
	 																					<textarea name="test_cases_improve" class="form-control"><?php echo $feedback->test_cases_improve; ?></textarea>
	 																				</div>
	 																			</div>
 																			</div>
 																			<div class="form-div" style="margin-top:15px;">
 																				<h3 style="font-size:18px;">Defects</h3>
 																				<div class="row">
	 																				<div class="col-md-6">
	 																					<label>Good Points</label>
	 																					<textarea name="defects_good" class="form-control"><?php echo $feedback->defects_good; ?></textarea>
	 																				</div>
	 																				<div class="col-md-6">
	 																					<label>To Improve</label>
	 																					<textarea name="defects_improve" class="form-control"><?php echo $feedback->defects_improve; ?></textarea>
	 																				</div>
	 																			</div>
 																			</div>
 																			<div class="form-div" style="margin-top:15px;">
 																				<h3 style="font-size:18px;">Traceability</h3>
 																				<div class="row">
	 																				<div class="col-md-6">
	 																					<label>Good Points</label>
	 																					<textarea name="traceability_good" class="form-control"><?php echo $feedback->traceability_good; ?></textarea>
	 																				</div>
	 																				<div class="col-md-6">
	 																					<label>To Improve</label>
	 																					<textarea name="traceability_improve" class="form-control"><?php echo $feedback->traceability_improve; ?></textarea>
	 																				</div>
	 																			</div>
 																			</div>
 																		</div>
 																		<div class="modal-footer">
 																			<a href="http://academiatestarii.ro/index.php/generate-feedback?modul=<?php echo $id; ?>&type=student&email=<?php echo $rec->email;?>" class="btn btn-primary btn-sm" target="_blank">
 																				Download Feedback
 																			</a>
 																			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
 																			<button type="submit" class="btn btn-primary" >Save changes</button>
 																		</div>
 																	</form>
 																</div>
 															</div>
 														</div>
 														<!-- Modal -->
 														<div class="modal fade" id="companie-<?php echo $rec->email;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 															<div class="modal-dialog" style="max-width: 600px;" role="document">
 																<div class="modal-content">
 																	<?php $feedback =  $wpdb->get_row("SELECT * from feedback_table WHERE modul = $id AND type = 'companie' AND email = '$rec->email'"); ?>
 																	<form action="" method="post">
 																		<input type="hidden" name="feedback_type" value="companie">
 																		<?php 
 																			if($feedback->id) {
 																				echo '<input type="hidden" name="method" value="put">';
 																				echo '<input type="hidden" name="feedback_id" value="'.$feedback->id.'">';
 																			} else {
 																				echo '<input type="hidden" name="method" value="post">';
 																			}
 																		?>
 																		<input type="hidden" name="email" value="<?php echo $rec->email;?>">
 																		<input type="hidden" name="modul" value="<?php echo $id; ?>">
 																		<div class="modal-header">
 																			<h5 class="modal-title" id="exampleModalLabel">Adauga Feedback Companie pentru <?php echo $user->nume. ' '.$user->prenume ; ?> </h5>
 																			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 																				<span aria-hidden="true">&times;</span>
 																			</button>
 																		</div>
 																		<div class="modal-body">
 																			<div class="form-div">
 																				Alegeti un scor: <br><br>
 																				<?php 
 																					for($i = 1; $i < 11; $i++) { ?>
																				<div class="form-check form-check-inline">
 																					<input class="form-check-input" <?php if($feedback->scor == $i) echo 'checked'; ?> type="radio" name="scor" id="inlineCheckbox<?php echo $rec->email.'-'.$i ?>" value="<?php echo $i ?>">
 																					<label class="form-check-label" for="inlineCheckbox<?php echo $rec->email.'-'.$i ?>"><?php echo $i ?></label>
 																				</div>
																				<?php }
 																				?>
 																			</div> <br>
 																			<div class="form-div" style="margin-top:15px;">
 																				<h3 style="font-size:18px;">Organizare JIRA & Zephyr</h3>
 																				<div class="row">
 																					<div class="col-md-6">
 																					<label>Good Points</label>
 																					<textarea name="organizare_good" class="form-control"><?php echo $feedback->organizare_good; ?></textarea>
 																				</div>
 																				<div class="col-md-6">
 																					<label>To Improve</label>
 																					<textarea name="organizare_improve" class="form-control"><?php echo $feedback->organizare_improve; ?></textarea>
 																				</div>
 																				</div>
 																				
 																			</div>
 																			<div class="form-div" style="margin-top:15px;">
 																				<h3 style="font-size:18px;">Test Cases</h3>
 																				<div class="row">
	 																				<div class="col-md-6">
	 																					<label>Good Points</label>
	 																					<textarea name="test_cases_good" class="form-control"><?php echo $feedback->test_cases_good; ?></textarea>
	 																				</div>
	 																				<div class="col-md-6">
	 																					<label>To Improve</label>
	 																					<textarea name="test_cases_improve" class="form-control"><?php echo $feedback->test_cases_improve; ?></textarea>
	 																				</div>
	 																			</div>
 																			</div>
 																			<div class="form-div" style="margin-top:15px;">
 																				<h3 style="font-size:18px;">Defects</h3>
 																				<div class="row">
	 																				<div class="col-md-6">
	 																					<label>Good Points</label>
	 																					<textarea name="defects_good" class="form-control"><?php echo $feedback->defects_good; ?></textarea>
	 																				</div>
	 																				<div class="col-md-6">
	 																					<label>To Improve</label>
	 																					<textarea name="defects_improve" class="form-control"><?php echo $feedback->defects_improve; ?></textarea>
	 																				</div>
	 																			</div>
 																			</div>
 																			<div class="form-div" style="margin-top:15px;">
 																				<h3 style="font-size:18px;">Traceability</h3>
 																				<div class="row">
	 																				<div class="col-md-6">
	 																					<label>Good Points</label>
	 																					<textarea name="traceability_good" class="form-control"><?php echo $feedback->traceability_good; ?></textarea>
	 																				</div>
	 																				<div class="col-md-6">
	 																					<label>To Improve</label>
	 																					<textarea name="traceability_improve" class="form-control"><?php echo $feedback->traceability_improve; ?></textarea>
	 																				</div>
	 																			</div>
 																			</div>
 																		</div>
 																		<div class="modal-footer">
 																			<a href="http://academiatestarii.ro/index.php/generate-feedback?modul=<?php echo $id; ?>&type=companie&email=<?php echo $rec->email;?>" class="btn btn-primary btn-sm" target="_blank">
 																				Download Feedback
 																			</a>
 																			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
 																			<button type="submit" class="btn btn-primary" >Save changes</button>
 																		</div>
 																	</form>
 																</div>
 															</div>
 														</div>
 														<?php echo '</td></tr>';
 													}
 												}
 											} 
 										}
 											?>
 											<tr></tr>

 										</table>


 										<?php };  ?>
 									</div>
 								</div>
 							</div>
 							<h1> </h1>


 						<?php endwhile;
 						else : ?>
 						<h2>Not Found</h2>
 					<?php endif; wp_reset_query(); ?>
 				</div>
 				



 				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 				<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
 				<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 				<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>