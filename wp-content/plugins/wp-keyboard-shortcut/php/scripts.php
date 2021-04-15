<?php 

/*
* Copyright 2018
* Author : RAYHAN KABIR
* Company ReCorp
*/

if ( ! defined( 'ABSPATH' ) ) exit;

function wpks_scriptss(){
?>
	<script>

jQuery(document).keyup(function(e){

<?php 
    $all_wpks = get_all_wpks();

    $x = 0;
        foreach ($all_wpks as $key => $wpks) {
          $x++;
          $keys = $wpks->keycode;
          $keys = explode(",", $keys);

          $mode = $wpks->mode;
          $url = $wpks->url;
          $target = $wpks->target;
          $toggle = $wpks->toggle;
          $remove = $wpks->remove;



$hit = "";
          if($mode == "url"){
            if ($target == "false") {
              $hit = "window.location.href = (\"". wpks_url_replace($url) ."\")";
            } else {
              $hit = "window.open(\"". wpks_url_replace($url) ."\", \"_blank\")";
            }
          } elseif($mode == "toggle") {

            $hit = "jQuery('".$wpks->toggle."').slideToggle()";

          } elseif($mode == "remove") {
            $hit = "jQuery('".$wpks->remove."').remove()";
          }

$key = "";
      if ( $x == 1) {
        echo "if (";
            for ($i=0; $i < count($keys) ; $i++) { 
              $key .= wpks_hotKeys(" e.which == ". wpks_key_name_to_code($keys[$i])  . " && ");
            }
            echo rtrim($key, " && ");
            echo "){".$hit."}";
      } else {
        echo " else if (";
            for ($i=0; $i < count($keys) ; $i++) { 
              $key .= wpks_hotKeys(" e.which == ". wpks_key_name_to_code($keys[$i])  . " && ");
            }
            echo rtrim($key, " && ");
            echo "){".$hit."}";
      }
      
          
  }?>
});

	</script>


<?php }

add_action('wp_footer', 'wpks_scriptss');
add_action('admin_footer', 'wpks_scriptss');


function wpks_settings_bg_color_white(){
  echo '
    <style>
      html, #wpwrap, #wp-content-editor-tools {
        background: #ffffff !important;
      }
    </style>
  ';
}

if ( preg_match('/wp_keyboard_shortcut/', $_SERVER['REQUEST_URI'])  ) {
  add_action("admin_footer", "wpks_settings_bg_color_white");
}