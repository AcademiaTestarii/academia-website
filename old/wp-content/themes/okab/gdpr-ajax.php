<?php
/**
 * Template Name: Ajax GDPR
 * Description: First page of the site
 *
 * @package WordPress
 * @subpackage Winmarkt
 */
	global $wpdb;
	$p = ($_POST);

    $updateQuery = $wpdb->prepare("UPDATE `db_module` SET gdpr = 1, nume = %s , prenume = %s, telefon = %s, newsletter = %d WHERE id = %d", $p['nume'], $p['prenume'], $p['telefon'], $p['newsletter'], $p['user']);
    $wpdb->get_results($updateQuery);
    echo '{"response":"yes"}';
?>
