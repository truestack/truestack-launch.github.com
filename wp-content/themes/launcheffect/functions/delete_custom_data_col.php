<?php
/**
 * delete_custom_data.php 
 *
 * Deletes data in a particular column
 *
 * @package WordPress
 * @subpackage Launch Effect
 * 
 */

// INCLUDE WORDPRESS STUFF
error_reporting(E_ALL);
ini_set('display_errors','On');

include_once('../../../../wp-load.php');
include_once('../../../../wp-includes/wp-db.php');

$col_index = $_POST['column'];
clearColumn($stats_table, "custom_field$col_index");
?>