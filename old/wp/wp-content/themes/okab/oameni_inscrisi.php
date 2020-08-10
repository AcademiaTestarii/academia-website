<?php
/**
 * Zile nastere administration panel.
 *
 * @package WordPress
 * @subpackage cursanti
 */
global $wpdb;
 if(isset($_POST['selectValue'])){ //check if form was submitted
   $input = $_POST['id']; //get input text
   $message = "Success! You entered: ".$input;

   $updateQuery = "UPDATE `db_module` SET status = ".$_POST['selectValue']." WHERE id =".$_POST['id'];
   $wpdb->get_results($updateQuery);
 }


$query = "SELECT * from db_module";
$records = $wpdb->get_results($query);

$args = array(
	'post_type' => 'module',
	'nopaging' => true,
	'posts_per_page' => -1,
	'orderby'=>'menu_order',
	'order'=>'ASC');
$exec= new WP_Query($args);
if ($exec->have_posts()) : while ($exec->have_posts()) : $exec->the_post(); ?>
<?php

$id = get_the_ID();
$perioade = explode(', ', get_post_meta(get_the_ID(), 'perioada', true));

?><h1>Modulul: <?php the_title(); ?> </h1>

<?php
foreach ($perioade as $perioada) {
	$rowcount = $wpdb->get_var("SELECT COUNT(*) FROM db_module WHERE modul = $id AND perioada = '$perioada'");

	?><h2>Perioada: <?php echo $perioada;  ?> </h2>


	<table class="wp-list-table widefat fixed striped wp_list_test_links">
		<tr>
			<th>Nume</th>
			<th>Email</th>
			<th>Telefon</th>
			<th>Mod de plata</th>
			<th>Status</th>
			<th>Actiune</th>
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

					switch ($rec->status) {
						case 2:
							$status = 'Platit integral';
							break;
						case 1:
							$status = 'Platit in rate';
							break;
						default:
							$status = 'Plata in asteptare';
							break;
					}
					echo '<tr><td>'.$rec->nume.'</td><td>'.$rec->email.'</td><td>'.$rec->telefon.'</td><td>'.$mod_plata.'</td><td>'.$status.'</td>';
					echo '<td>'; ?>
						<form action="" method="post">
							<input type="hidden" name="id" value="<?php echo $rec->id; ?>" />
							<select name="selectValue" onchange='this.form.submit()'>
								<option>Alege actiunea</option>
								<option value="1">A platit in rate</option>
								<option value="2">A platit integral</option>
								<option value="0">Nu a platit</option>
							</select>
							<noscript><input style="display:none" type="submit" value="Submit"></noscript>
						</form>


					<?php echo '</td></tr>';
				}
			}
		}
		?>
		<tr></tr>

	</table>


	<?php };  endwhile;
	else : ?>
	<h2>Not Found</h2>
<?php endif; wp_reset_query(); ?>
