<?php

if ( ! defined( 'ABSPATH' ) ) exit;

function wpks_create_table() {
	global $wpdb;
	global $jal_db_version;

	$table_name = $wpdb->prefix . 'wpks';
	
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $table_name (
		ID mediumint(9) NOT NULL AUTO_INCREMENT,
		time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		name tinytext NOT NULL,
		mode text NOT NULL,
		keycode text NOT NULL,
		comment text NOT NULL,
		url varchar(55) DEFAULT '' NOT NULL,
		target varchar(10) DEFAULT '' NOT NULL,
		toggle text NOT NULL,
		remove text NOT NULL,
		PRIMARY KEY  (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );

	add_option( 'jal_db_version', $jal_db_version );
}

function wpks_remove_table() {
     global $wpdb;
     $table_name = $wpdb->prefix . 'wpks';
     $sql = "DROP TABLE IF EXISTS $table_name";
     $wpdb->query($sql);
}

function insert_wpks($name, $mode, $keycode, $comment, $url, $target, $toggle, $remove) {
  global $wpdb;

  $table_name = $wpdb->prefix . 'wpks';
  
  $wpdb->insert( 
    $table_name, 
    array( 
      'time' => current_time( 'mysql' ), 
      'name' => $name, 
      'mode' => $mode, 
      'keycode' => $keycode, 
      'comment' => $comment, 
      'url' => $url, 
      'target' => $target, 
      'toggle' => $toggle, 
      'remove' => $remove, 
    ) 
  );
}

function update_wpks($name, $mode, $keycode, $comment, $url, $target, $toggle, $remove, $id) {
  global $wpdb;

  $table_name = $wpdb->prefix . 'wpks';
  
$wpdb->update( 
	$table_name, 
	array( 
		'name' => $name,
		'mode' => $mode,	
		'keycode' => $keycode,	
		'comment' => $comment,	
		'url' => $url,	
		'target' => $target,	
		'toggle' => $toggle,	
		'remove' => $remove	
	), 
	array( 'ID' => $id ), 
	array( 
		'%s',
		'%s',
		'%s',
		'%s',
		'%s',
		'%s',
		'%s',
		'%s',
	), 
	array( '%d' ) 
);


}

function get_wpks_count(){
  global $wpdb;
$user_count = $wpdb->get_var( "SELECT ID FROM ".$wpdb->prefix."wpks ORDER BY ID DESC LIMIT 1");
return $user_count;
}

function get_wpks_total_count(){
  global $wpdb;
$user_count = $wpdb->get_var( "SELECT COUNT(*) FROM ".$wpdb->prefix."wpks");
return $user_count;
}



function get_wpks($key, $id){
	global $wpdb;
	$results = $wpdb->get_results( "SELECT $key FROM ".$wpdb->prefix."wpks WHERE ID = ".$id."" );

	return $results[0]->$key;
}


function get_all_wpks(){
	global $wpdb;
	$results = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."wpks" );

	return $results;
}

function get_wpks_search_result($search){
	global $wpdb;
	$results = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."wpks WHERE name LIKE '".$search."%' OR  keycode LIKE '".$search."%'  OR  url LIKE '%".$search."%'   OR  comment LIKE '%".$search."%'  " );

	return $results;
}


function wpks_id_to_details($id){
	global $wpdb;
	$results = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."wpks WHERE ID = $id" );


	return $results[0];
}

function wpks_shortkey_exists($shortkey){
	global $wpdb;
	$results = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."wpks WHERE keycode = '".$shortkey."'" );
	return $results[0];
}


function remove_wpks($id){
	global $wpdb;
	$results = $wpdb->delete( $wpdb->prefix."wpks", array( 'ID' => $id ) );

	return $results;
}

$GLOBALS['wpks_all'] = get_all_wpks();
$GLOBALS['wpks_limited'] = count(get_all_wpks());