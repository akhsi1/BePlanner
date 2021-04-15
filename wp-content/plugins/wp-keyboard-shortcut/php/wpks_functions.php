<?php 

/*
* Copyright 2018
* Author : RAYHAN KABIR
* Company ReCorp
*/

if ( ! defined( 'ABSPATH' ) ) exit;

function wpks_edit_submit_id(){
  if ( preg_match("/\{\{home_url\}\}|\{\{admin_url\}\}|\{\{logout_url\}\}|\{\{user_name\}\}|\{\{user_id\}\}/", $_POST['url']) ) {
  $url = $_POST['url'];
} else {
  $url = esc_url($_POST['url']);
}
	$name = sanitize_text_field($_POST['name']);
	$mode = sanitize_text_field($_POST['mode']);
	$keycode = sanitize_text_field($_POST['keycode']);
	$comment = sanitize_text_field($_POST['comment']);
	$url = $url;
	$target = sanitize_text_field($_POST['target']);
	$toggle = sanitize_text_field($_POST['toggle']);
	$remove = sanitize_text_field($_POST['remove']);
	$id = intval($_POST['id']);

  
if ( !empty($name) &&  !empty($mode) &&  !empty($keycode)  ) {
  
  if ( ($mode == "url" && !empty($url)) || ($mode == "toggle" && !empty($toggle)) || ($mode == "remove" && !empty($remove)) ) {
	     update_wpks($name, $mode, $keycode, $comment, $url, $target, $toggle, $remove, $id) ;
    } else {
        echo  __("Please fill out required fields.", "wpks");
    }
}
	
wp_die();
}

add_action('wp_ajax_wpks_edit_submit_id', 'wpks_edit_submit_id');
add_action('wp_ajax_nopriv_wpks_edit_submit_id', 'wpks_edit_submit_id');



function wpks_delete_id(){
	$id = intval($_POST['id']);
	remove_wpks($id) ;

	echo "deleted";
wp_die();
}

add_action('wp_ajax_wpks_delete_id', 'wpks_delete_id');
add_action('wp_ajax_nopriv_wpks_delete_id', 'wpks_delete_id');


function wpks_edit_id(){
	$id = intval($_POST['wpks_id']);
	$wpks = wpks_id_to_details($id);
	?>
		<form id="<?php echo $id; ?>" class="wpks_edit">
        <div class="container" >
          <div class="row">
            <div class="col-md-5" >
              <div class="panel">
                
                <div class="panel-body">
                  <label style="margin-top:15px;" for="name"><?php echo __("Name", "wpks"); ?> <span class="required">*</span></label>
                    <input id="name" type='text' name="name" class='form-control'  value='<?php echo $wpks->name; ?>' > 
                  

  <label class="control-label mt-15" for="add_shortcut_mode"><?php echo __("Select shortcut mode", "wpks"); ?> <i class="fa fa-info-circle wpks_i" data-toggle="tooltip" title="<?php echo __("Shortcut modes: 1. Url : This mode will redirect user to specific url. 2. Show/Hide: Specific HTML dom element selectors will toggle by pressing shortcut. 3. Remove: This mode will help to remove some HTML dom element selector.", "wpks"); ?>">
    </i>
  </label>
  
    <select id="shortcut_mode" name="shortcut_mode" class="form-control"  style="margin-bottom: 15px;">
      <option value="url" <?php if ( $wpks->mode == "url") {
        echo "selected";
      } ?>>URL Shortcut</option>
      <option value="toggle" <?php if ($wpks->mode == "toggle") {
        echo "selected";
      } ?>>Show/Hide Shortcut</option>
      <option value="remove" <?php if ($wpks->mode == "remove") {
        echo "selected";
      } ?>>Remove Shortcut</option>
    </select>

    <div class="match_shortcut_e" style="display: none; color: red;">
  
    </div>
 
        <label style="" for="add_keycode_tag"><?php echo __("Windows KeyCode", "wpks"); ?> <span class="required">*</span> <i class="fa fa-info-circle wpks_i" data-toggle="tooltip" title="<?php echo __("Type your desired keyboard shortcut here. But this will only work on windows. Mac-OS keyboard shortcut will appear on pro version.", "wpks"); ?>"></i>
        </label>

        <input id="keycode" name="keycode" value="<?php echo $wpks->keycode; ?>" placeholder="<?php echo __("Enter shortcut key", "wpks"); ?>" class="form-control input-md" type="text">

        <div id="clear" class="button mt-15"><?php echo __("Clear", "wpks"); ?></div>


        <div class="url_toggle">
          
          <label style="margin-top:15px;" for="add_url"><?php echo __("URL", "wpks"); ?> <span class="required">*</span> <i class="fa fa-info-circle wpks_i" data-toggle="tooltip" title=" <?php echo __("Link Tags: {{home_url}} {{admin_url}} {{logout_url}} {{user_name}} {{user_id}} or you may paste your desired link to this url box.", "wpks"); ?> "></i>
          </label>
            
          <input type='text' id="url" name="url" class='form-control'  value='<?php echo $wpks->url; ?>' >

	         <div class="clear"></div>

    	  <label class="control-label mt-15" for="url_target"><?php echo __("Select url target", "wpks"); ?> <i  class="fa fa-info-circle wpks_i" data-toggle="tooltip" title="<?php echo __("Select your url target, 1. self: URL will open on same tab. 2. blank: URL will open on new tab.", "wpks"); ?>"></i>
        </label>
  
        <select id="url_target" name="url_target" class="form-control mb-15">
          <option value="false" <?php if ($wpks->target == "false"){ echo "selected";} ;?>><?php echo __("Self (Link will open in same tab)", "wpks"); ?></option>
          <option value="true" <?php if ($wpks->target == "true"){ echo "selected";} ;?>><?php echo __("Blank (Link will open in new tab)", "wpks"); ?></option>
        </select>

	     <div class="clear"></div>
  </div>

<div class="toggle_toggle" style="display: none">
        <label style="margin-top:15px;" for="add_toggle"><?php echo __("Toggle Dom Element", "wpks"); ?><span class="required">*</span> <i  class="fa fa-info-circle wpks_i" data-toggle="tooltip" title="<?php echo __("Type or paste HTML dom element here to toggle(show or hide) HTML dom selector.", "wpks"); ?>"></i></label>

          <input type='text' id="toggle" name="toggle" class='form-control'  value='<?php echo $wpks->toggle; ?>' >
</div>

<div class="toggle_remove" style="display: none">
         <label style="margin-top:15px;" for="add_remove"><?php echo __("Remove Dom Element", "wpks"); ?><span class="required">*</span> <i  class="fa fa-info-circle wpks_i" data-toggle="tooltip" title="<?php echo __("Type or paste HTML dom element here to remove your desired HTML dom element.", "wpks"); ?>"></i></label>

          <input type='text' id="remove" name="remove" class='form-control'  value='<?php echo $wpks->remove; ?>' >
</div>
         <label style="margin-top:15px;" for="add_comment">Comment <i class="fa fa-info-circle wpks_i" data-toggle="tooltip" title="<?php echo __("Write any comment to describe this shortcut.", "wpks"); ?>"></i></label>
         
          <input type='text' id="comment" name="comment" class='form-control'  value='<?php echo $wpks->comment; ?>' >

        <div class="text-center" style="margin-top:15px;"><button class="btn btn-primary btn-sx edit_submit" type="button"><i class="fa fa-floppy-o" aria-hidden="true"></i> <?php echo __("Save", "wpks"); ?></button></div>
      </div>


              </div>
            </div>
          </div>
      </div>                        
  </form> 
	<?php
wp_die();
}

add_action('wp_ajax_wpks_edit_id', 'wpks_edit_id');
add_action('wp_ajax_nopriv_wpks_edit_id', 'wpks_edit_id');


function f_wpks(){
  global $wpks_limited;

  if ($wpks_limited <= 4) {
    return true;
  } else {
    return false;
  }
}

function wpks_id_t(){
	$id = intval($_POST['wpks_id']);
	$wpks = wpks_id_to_details($id);
	
  if ($wpks->target == "true") {
  	$target = __("blank (Opens the linked document in a new tab)", "wpks");
  } elseif ($wpks->target == "false") {
  	$target = __("self (Opens the linked document in the same Tab)", "wpks");
  }

  ?>
  		<h4> Name: <span><?php echo $wpks->name; ?></span> </h4>
  		<h4> Mode: <span><?php echo $wpks->mode; ?></span> </h4>
  		<h4> Keycode: <div class="keycode_button"> <span> <?php echo str_replace(",", "</span> </div> + <div class=\"keycode_button\"><span>",  $wpks->keycode ); ?> </span></div></h4>
  	
  	<?php if ($wpks->mode == "url" ) : ?>
  		<h4> <?php echo __("URL:", "wpks"); ?> <?php echo $wpks->url; ?> </h4>
  		<h4> <?php echo __("Target:", "wpks"); ?> <span><?php echo $target; ?></span> </h4>
  	<?php endif; ?>

  	<?php if ($wpks->mode == "toggle" ) : ?>
  		<h4> <?php echo __("Toggle Dom Element:", "wpks"); ?> <?php echo $wpks->toggle; ?> </h4>
  	<?php endif; ?>

  	<?php if ($wpks->mode == "remove" ) : ?>
  		<h4> <?php echo __("Remove Dom Element:", "wpks"); ?> <?php echo $wpks->remove; ?> </h4>
  	<?php endif; ?>

  		<h4> <?php echo __("Comment:", "wpks"); ?> <span><?php echo $wpks->comment; ?></span> </h4>


  <?php
wp_die();
}
add_action('wp_ajax_wpks_id', 'wpks_id_t');
add_action('wp_ajax_nopriv_wpks_id', 'wpks_id_t');



add_action('wp_ajax_wpks_add_shortcut', 'wpks_add_shortcut');
add_action('wp_ajax_nopriv_wpks_add_shortcut', 'wpks_add_shortcut');

function wpks_add_shortcut(){

	$add_name = $add_shortcut_mode = $add_keycode = $add_url = $url_target = $add_toggle = $add_remove = $add_comment =  ""; 

if ( preg_match("/\{\{home_url\}\}|\{\{admin_url\}\}|\{\{bp_user_profile_url\}\}|\{\{logout_url\}\}|\{\{user_name\}\}|\{\{user_id\}\}/", $_POST['add_url']) ) {
  $url = $_POST['add_url'];
} else {
  $url = esc_url($_POST['add_url']);
}

      $add_name = sanitize_text_field($_POST['add_name']);
      $add_shortcut_mode = sanitize_text_field($_POST['add_shortcut_mode']);
      $add_keycode = sanitize_text_field($_POST['add_keycode']);
      $add_url = $url;
      $url_target = sanitize_text_field($_POST['url_target']);
      $add_toggle = sanitize_text_field($_POST['add_toggle']);
      $add_remove = sanitize_text_field($_POST['add_remove']);
      $add_comment = sanitize_text_field($_POST['add_comment']);

if (f_wpks()) {
if ( !empty($add_name) &&  !empty($add_shortcut_mode) &&  !empty($add_keycode)  ) {
  
  if ( ($add_shortcut_mode == "url" && !empty($add_url)) || ($add_shortcut_mode == "toggle" && !empty($add_toggle)) || ($add_shortcut_mode == "remove" && !empty($add_remove)) ) {
    
$add_keycode_plus = str_replace(",", "</span></div> + <div class=\"keycode_button\"><span>", $add_keycode);

$wpks_count = (get_wpks_count()+1);
$wpks_total_count = (get_wpks_total_count()+1);

$append = '<tr class="wpks_" id="'.$wpks_count.'">
        <td id="id" onclick="myFunction(this)" class="view-message  dont-show"><h5> '.$wpks_total_count.' </h5></td>
        <td id="name" onclick="myFunction(this)" colspan="1" class="view-message"><h5>'.$add_name.'</h5></td> 
        <td id="mode" onclick="myFunction(this)"><h5>'.$add_shortcut_mode.'</h5></td> 
        <td id="keycode2" onclick="myFunction(this)" class="view-message  text-left"><div class="keycode_button"><span>'.$add_keycode_plus.'</span></div></div></td> 
        <td id="comment" onclick="myFunction(this)" class="view-message  text-left"><h5>'.$add_comment.'</h5></td> 
        <td>
          <span class="btn-group pull-left">
            <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#item_edit" wpks_id="'.$wpks_count.'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
              </button>
            <button class="btn btn-danger btn-xs"; data-toggle="modal" wpks_id="'.$wpks_count.'" data-target="#item_remove"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
          </span>
        </td>
    </tr>';


      if ($add_shortcut_mode == "url") {
       if ( !empty($add_url) && !empty($url_target) ) {
      		insert_wpks($add_name, $add_shortcut_mode, $add_keycode, $add_comment, $add_url, $url_target, $add_toggle, $add_remove);

      		echo $append;
      	}
      } elseif ($add_shortcut_mode == "toggle" && !empty($add_toggle) ) {
      	insert_wpks($add_name, $add_shortcut_mode, $add_keycode, $add_comment, $add_url, $url_target, $add_toggle, $add_remove);

      	echo $append;
      } elseif ($add_shortcut_mode == "remove" && !empty($add_remove) ) {
      	insert_wpks($add_name, $add_shortcut_mode, $add_keycode, $add_comment, $add_url, $url_target, $add_toggle, $add_remove);

      	echo $append;
      }
    } else {
        echo "Please fill out required fields.";
      }

  } else {
        echo "Please fill out required fields.";
  }
} else {
  echo "Ohhooo !!!" . __("You have reached the max limit of free WP Keyboard Shortcut. Please go to pro !", "wpks");
}
      wp_die();
}



add_action('wp_ajax_is_wpks_shortcut_match', 'is_wpks_shortcut_match');
add_action('wp_ajax_nopriv_is_wpks_shortcut_match', 'is_wpks_shortcut_match');


add_action('wp_ajax_wpks_check_keycode_exists', 'wpks_check_keycode_exists');
add_action('wp_ajax_nopriv_wpks_check_keycode_exists', 'wpks_check_keycode_exists');


function wpks_array_match( $arrayA , $arrayB ) {

    sort( $arrayA );
    sort( $arrayB );

    if ($arrayA == $arrayB) {
        return 0;
     } else {
      return 1;
     }
} 

function wpks_check_keycode_exists(){
  $val = sanitize_text_field($_POST['keycode']);
  $val = explode(",", $val);
global $wpks_all;

$pre_keycode = array();
    foreach ($wpks_all as $wpks_key => $wpks) {
      $pre_keycode[] = explode(",", $wpks->keycode);
    }

$match_detect = 1;
for ($i=0; $i < count($pre_keycode); $i++) { 
  $match_detect *= wpks_array_match($pre_keycode[$i], $val);
}

  wp_die();
}


function is_wpks_shortcut_match(){
  global $wpks_all;

  $get_keys = sanitize_text_field($_POST['get_keys']);

  $if_wpks_exists =  $get_keys;


  $get_keys = explode(",", $get_keys);


$pre_keycode = array();
    foreach ($wpks_all as $wpks_key => $wpks) {
      $pre_keycode[] = explode(",", $wpks->keycode);
    }

$match_detect = 1;
for ($i=0; $i < count($pre_keycode); $i++) { 
  $match_detect *= wpks_array_match($pre_keycode[$i], $get_keys);
}

  /*$get_keys = implode( "+", $get_keys);*/

  $get_key = "";

  for ($i=0; $i < count($get_keys); $i++) { 
    $get_key .= ucfirst($get_keys[$i]) . "+";
  }

  $get_key = rtrim($get_key, "+");


if ( is_wpks_firefox_shortcut($get_key) !=="none" || is_wpks_chrome_shortcut($get_key) !=="none" || $match_detect == 0 ) {

  if (is_wpks_firefox_shortcut($get_key) !=="none" || is_wpks_chrome_shortcut($get_key) !=="none") {
    echo  __('<h4 class="modal-title"> You can\'t use this KeyCode !</h4>
      <h5>Shortcut Matched with: ', "wpks");

    if (is_wpks_firefox_shortcut($get_key) !=="none") {
      echo '<span id="firefox_i">
            <img src="'.get_wpks_images("firefox").'" data-toggle="tooltip" data-original-title="'.is_wpks_firefox_shortcut($get_key).'"> 
        </span>';
}
    if (is_wpks_ie_shortcut($get_key) !=="none") {
      echo '<span id="ie_i"  >
            <img src="'. get_wpks_images('IE').'" data-toggle="tooltip" data-original-title="'.is_wpks_ie_shortcut($get_key).'"> 
        </span>';
} 

   if (is_wpks_chrome_shortcut($get_key) !=="none") {
      echo '<span id="chrome_i"  >
            <img src="'. get_wpks_images('chrome').'" data-toggle="tooltip" data-original-title="'.is_wpks_chrome_shortcut($get_key).'"> 
        </span></h5>';
}    


  }
	
  if ($match_detect == 0) {
  echo  __('<h5>This keycode already exists</h5>', "wpks");
    
  }

} else {
	echo "none";
}
  wp_die();
}


function is_wpks_browser_shortcut($key, $browser){
  $key = strtolower($key);
  $browser = strtolower($browser);
  $key = explode("+", $key);
  $browser = explode("+", $browser);


  return wpks_array_match($browser, $key);
}


function get_wpks_images($name){
    return plugins_url( 'assets/img/'.$name.'.png', dirname(__FILE__) );
}

      
function wpks_search(){
  $search = "";
  $search = sanitize_text_field($_POST['search_value']);

  if (empty($search)) {
    $shortcuts = get_all_wpks();
  } else {
    $shortcuts = get_wpks_search_result($search);
  }

$x = 0;
  foreach ($shortcuts as $key => $wpks) {
    $x++;
    ob_start();
    ?>
    <tr class="wpks_" id="<?php echo $wpks->ID; ?>" >
        <td id="id" onclick="myFunction(this)" class="view-message  dont-show"><h5> <?php echo $x; ?> </h5></td>
        <td id="name" onclick="myFunction(this)" colspan="1" class="view-message"><h5><?php echo $wpks->name; ?></h5></td> 
        <td id="mode" onclick="myFunction(this)"><h5><?php echo $wpks->mode; ?></h5></td> 
        <td id="keycode2" onclick="myFunction(this)" class="view-message  text-left"><div class="keycode_button"><span><?php echo str_replace(",", "</span></div> + <div class=\"keycode_button\"><span>", $wpks->keycode) ; ?></span></div></div></td> 
        <td id="comment" onclick="myFunction(this)" class="view-message  text-left"><h5><?php echo $wpks->comment; ?></h5></td> 
        <td>
          <span class="btn-group pull-left">
            <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#item_edit" wpks_id="<?php echo $wpks->ID; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
              </button>
            <button class="btn btn-danger btn-xs"; data-toggle="modal" wpks_id="<?php echo $wpks->ID; ?>"   data-target="#item_remove"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
          </span>
        </td>
    </tr>
  <?php
  echo ob_get_clean();
}
  if (empty($shortcuts)) {
    echo "<tr><td style=\"text-align: center;\">Not Found ! </td></tr>";
  }
wp_die();
}

add_action('wp_ajax_wpks_search', 'wpks_search');
add_action('wp_ajax_nopriv_wpks_search', 'wpks_search');


function wpks_url_replace($url){
      $current_user = wp_get_current_user();
      $url = str_replace("{{home_url}}", home_url(), $url);
      $url = str_replace("{{admin_url}}", admin_url(), $url);
      $url = str_replace("{{logout_url}}", wp_logout_url(), $url);
      $url = str_replace("{{user_name}}", $current_user->user_login, $url);
      $url = str_replace("{{user_id}}", $current_user->ID, $url);
      $url = preg_replace('/&(.*);/', '', $url);

      return $url;
} 


function wpks_adding_menu() {
  add_options_page(
           'WP Keyboard Shortcut', 
            __('Keyboard Shortcut', "wpksp"), 
           'manage_options', 
           'wp_keyboard_shortcut', 
           'wpks_settings_panel'
       ); 
}