<?php

/**
* COPYRIGHT 2018 RAYHAN KABIR
*/
if ( ! defined( 'ABSPATH' ) ) exit;


function wpks_settings_panel() {
	?>
<div class="mail-box">
  <aside class="lg-side">
    <div class="inbox-head">
      <h3><?php echo __("WP Keyboard Shortcut List", "wpks"); ?></h3>
      <div action="#" class="pull-right position">
        <div class="input-append">
          <input type="text" class="sr-input" placeholder="<?php echo __("Search", "wpks"); ?>">
          <button class="btn sr-btn" type="button"><i class="fa fa-search"></i></button>
        </div>
      </div>
      <div class="clear"></div>
    </div>
    
    <button class="btn btn-default pull-right add_shortcut" style="margin-top:20px;" data-toggle="modal" data-target= "#item_add"><i class="glyphicon glyphicon-plus"></i> <?php echo __("Add Shortcut", "wpks"); ?></button>
    <div class="inbox-body wpks_body">
      <div class="mail-option">
        <table class="table table-inbox table-hover">       
          <thead>
            <tr class="unread">
              <th class="col-sm-1 view-message  dont-show"><?php echo __("ID", "wpks"); ?></th>
              <th class="view-message col-sm-2"><?php echo __("Name", "wpks"); ?></th>
              <th class="col-sm-1 mode_section"> 
                <span><?php echo __("Mode", "wpks"); ?></span>
              </th>
              <th class="col-sm-2"> 
                <span><?php echo __("KeyCode", "wpks"); ?></span>
              </th>
              <th class="view-message  text-left col-sm-2 comment_section"><?php echo __("Comment", "wpks"); ?></th>
              <th class="view-message  text-left col-sm-1"><?php echo __("Action", "wpks"); ?></th>
            </tr>
          </thead>
          <tbody>


            
<?php 
$x = 0;
$shortcuts = get_all_wpks();
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


 ?>
            
              </td>
          </tbody>
        </table>
      </div>
    </div>
  </aside>
</div>

<div class="modal fade item_edit" id="item_edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" class="class pull-right"><i class="fa fa-times" aria-hidden="true"></i></a>
                <h3 class="modal-title"><?php echo __("Edit Shortcut", "wpks"); ?></h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8 item_content edit">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade item_add in" id="item_add">
  <form class="wpks_add">
    <div class="modal-dialog">
        <div class="modal-content" style="width:500px; margin:0 auto;">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" class="class pull-right"><i class="fa fa-times" aria-hidden="true"></i></a>
                <h3 class="modal-title"><?php echo __("Add a new Shortcut", "wpks"); ?> </h3>
            </div>


<div class="modal-body">
  <div class="row">
    <div class="col-md-12">
      <div class="panel">
                      
<div class="panel-body">
      <label style="margin-top:15px;" for="add_name"><?php echo __("Name", "wpks"); ?> <span class="required">*</span></label>
      <input id="add_name" placeholder="<?php echo __("Type Shortcut name", "wpks"); ?>" required="" name="add_name" class="form-control" value="" type="text"> 
                        

  <label class="control-label mt-15" for="add_shortcut_mode"><?php echo __("Select shortcut mode", "wpks"); ?> <i class="fa fa-info-circle wpks_i" data-toggle="tooltip" title="<?php echo __("Shortcut modes: 1. Url : This mode will redirect user to specific url. 2. Show/Hide: Specific HTML dom element selectors will toggle by pressing shortcut. 3. Remove: This mode will help to remove some HTML dom element selector.", "wpks"); ?>"></i></label>
  
    <select id="add_shortcut_mode" name="add_shortcut_mode" class="form-control mb-15">
      <option value="url" selected="">URL Shortcut</option>
      <option value="toggle">Show/Hide Shortcut</option>
      <option value="remove">Remove Shortcut</option>
    </select>
 

      <div class="match_shortcut" style="display: none"></div>

    <label style="" for="add_keycode_tag">Windows KeyCode <span class="required">*</span> <i class="fa fa-info-circle wpks_i" data-toggle="tooltip" title="<?php echo __("Type your desired keyboard shortcut here. But this will only work on windows. Mac-OS keyboard shortcut will appear on pro version.", "wpks"); ?>"></i></label>
      <input id="add_keycode" name="add_keycode" value="" placeholder="<?php echo __("Enter shortcut key", "wpks"); ?>" class="form-control input-md" type="text">


      <div id="clear" class="button mt-15"><?php echo __("Clear", "wpks"); ?></div>
      

  <div class="url_toggle">
      <label style="margin-top:15px;" for="add_url"><?php echo __("URL", "wpks"); ?> <span class="required">*</span> <i class="fa fa-info-circle wpks_i" data-toggle="tooltip" title=" <?php echo __("Link Tags: {{home_url}} {{admin_url}} {{logout_url}} {{user_name}} {{user_id}} or you may paste your desired link to this url box.", "wpks"); ?> "></i></label>
      <input id="add_url"  placeholder="<?php echo __("Type or paste URL/URL_tag here", "wpks"); ?>" name="add_url" class="form-control" value="" type="text">
    <div class="clear"></div>


    <label class="control-label mt-15" for="url_target">Select url target <i class="fa fa-info-circle wpks_i" data-toggle="tooltip" title="<?php echo __("Select your url target, 1. self: URL will open on same tab. 2. blank: URL will open on new tab.", "wpks"); ?>"></i></label>
      <select id="url_target" name="url_target" class="form-control mb-15">
        <option value="false" selected=""><?php echo __("Self (Link will open in same tab)", "wpks"); ?></option>
        <option value="true"><?php echo __("Blank (Link will open in new tab)", "wpks"); ?></option>
      </select>
    <div class="clear"></div>
  </div>


    <div class="toggle_toggle" style="display: none">
        <label style="margin-top:15px;" for="add_toggle"><?php echo __("Toggle Dom Element", "wpks"); ?><span class="required">*</span> <i  class="fa fa-info-circle wpks_i" data-toggle="tooltip" title="Type or paste HTML dom element here to toggle(show or hide) HTML dom selector."></i></label>
        <input id="add_toggle" name="add_toggle" placeholder="Type or paste HTML dom element." class="form-control wpks_dom_" value="" type="text">
    </div>


    <div class="toggle_remove" style="display: none">
        <label style="margin-top:15px;" for="add_remove"><?php echo __("Remove Dom Element", "wpks"); ?><span class="required">*</span> <i  class="fa fa-info-circle wpks_i" data-toggle="tooltip" title="Type or paste HTML dom element here to remove your desired HTML dom element."></i></label>
        <input id="add_remove" name="add_remove" class="form-control wpks_dom_" placeholder="Type or paste HTML dom element." value="" type="text">
    </div>


        <label style="margin-top:15px;" for="add_comment"><?php echo __("Comment", "wpks"); ?> <i class="fa fa-info-circle wpks_i" data-toggle="tooltip" title="Write any comment to describe this shortcut."></i></label>
        <input id="add_comment" name="add_comment" placeholder="Type comment here."  class="form-control" value="" type="text">
</div>

    </div>
  </div>
</div>
            <div class="text-center" style=""><button class="btn btn-primary btn-sx add" type="button"><i class="glyphicon glyphicon-plus"></i> <?php echo __("Add Shortcut", "wpks"); ?></button></div>
                </div>
            </div>
        </div>
    </form>
</div>


<div class="modal fade item_view" id="item_view">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" class="class pull-right"><i class="fa fa-times" aria-hidden="true"></i></a>
                <h3 class="modal-title"> <?php echo __("Shortcut Details", "wpks"); ?> </h3>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 item_content"></div>
                </div>
            </div>
            
        </div>
    </div>
</div>



<div class="modal fade item_remove" id="item_remove">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" class="class pull-right"><i class="fa fa-times" aria-hidden="true"></i></a>
                <h3 class="modal-title"><?php echo __("Remove Title", "wpks"); ?></h3>
            </div>
            <div class="modal-body">
                <p><?php echo __("Are you sure, you want to delete it ?", "wpks"); ?></p>
                <div class="row">
                    <div class="col-12-xs text-center">
                        <button class="btn btn-success btn-md col-3-xs"><?php echo __("Yes", "wpks"); ?></button>
                        <button class="btn btn-danger btn-md col-3-xs" data-dismiss="modal"><?php echo __("Cancel", "wpks"); ?></button>
                    </div>
                </div>
            </div>                 
        </div>
    </div>
</div>
  <a href="http://recorp.cf" target="_Blank" class="btn go-pro"><?php echo __("Go to Pro", "wpks"); ?></a>

  <?php echo __("Powered By", "wpks"); ?> <a href="http://recorp.cf/?redirect_from_wpksp=true" target="_Blank" class=""><img src="<?php echo get_wpks_images('ReCorp') ?>" width="120"></a>
	<?php
}

