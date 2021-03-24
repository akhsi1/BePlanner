
/*
* Copyright 2018
* Author : RAYHAN KABIR
* Company ReCorp
*/

var $ = jQuery;
$(document).ready(function(e){
  $('#keycode').tagsInput({ 'defaultText':''});


  $('#keycode_tag').keyup(function(e){
e.preventDefault()
    $('#keycode').addTag( wpks_key_code_to_name(e.which) );
    $(this).val("");  
    $(this).focus(); 
    });
});



/*Edit Shortcut Section*/

$(document).ready(function(){
  $(document).on('click', '.edit_submit', function(e){
    e.preventDefault();
    var name = $('.wpks_edit #name').val();
    var mode = $('.wpks_edit #shortcut_mode').val();
    var keycode = $('[name="keycode"]').val();
    var url = $('.wpks_edit #url').val();
    var target = $('#url_target').val();
    var toggle = $('.wpks_edit #toggle').val();
    var remove = $('.wpks_edit #remove').val();
    var comment = $('.wpks_edit #comment').val();
    var id = $('.wpks_edit').attr('id');

      var datas = {
      'action': 'wpks_edit_submit_id',
      'name': name,
      'mode': mode,
      'keycode': keycode,
      'url': url,
      'target': target,
      'toggle': toggle,
      'remove': remove,
      'comment': comment,
      'id': id,
    };

        $.ajax({
            url: wpks.ajax_url + "/admin-ajax.php",
            data: datas,
            type: 'post',
            success: function(r){
                var patt = new RegExp("Please fill out");
                var res = patt.test(r);

            if ( res !== true ) {
              var id2 = "tr#"+id;
              var keycode2 = "<div class='keycode_button'><span>" + keycode.replace(/,/g, "</span> </div> + <div class='keycode_button'><span>") + "</span></div></div>";
              $('[data-dismiss="modal"]').click();
              $(id2).find($("td#name")).text( name );
              $(id2).find($("td#mode")).text( mode );
              $(id2).find($("td#keycode2")).html( keycode2 );
              $(id2).find($("td#comment")).text( comment );
              $(id2).addClass('green_timeout');


             setTimeout(function(){ 
                $(id2).removeClass('green_timeout');
             }, 900);


            } else {
              alert("Please fill out required fields.");
            }
        }
        });
    });

});


$(document).ready(function(e){
  delete_wpks()
});


function delete_wpks(){

$(document).on("click", ".btn-danger", function(e){
    e.preventDefault();
    var id = $(this).attr('wpks_id');
    $('.btn.btn-success.btn-md.col-3-xs').attr('id', id);
  });

  $('.btn.btn-success.btn-md.col-3-xs').click(function(e){
      var id = $(this).attr('id');
       var datas = {
      'action': 'wpks_delete_id',
      'id': id,
    };
        $.ajax({
            url: wpks.ajax_url + "/admin-ajax.php",
            data: datas,
            type: 'post',

            success: function(details){
             $('[data-dismiss="modal"]').click();

             setTimeout(function(){ 
                var tr = "tr#"+id;
                $(tr).css({'background-color': '#D9534F', 'color' : '#fff'});
             }, 900);

             setTimeout(function(){ 
                var tr = "tr#"+id;
                $(tr).slideUp('500');
             }, 1000);

             setTimeout(function(){ 
                var tr = "tr#"+id;
                $(tr).remove();
             }, 1500);
        }
        });

  });
}


$(document).ready(function(){
  $('.btn-primary.btn-sx.add').click(function(){
    var add_name = $('#add_name').val();
    var add_shortcut_mode = $('#add_shortcut_mode').val();
    var add_keycode = $('#add_keycode').val();
    var add_url = $('#add_url').val();
    var url_target = $('#url_target').val();
    var add_toggle = $('#add_toggle').val();
    var add_remove = $('#add_remove').val();
    var add_comment = $('#add_comment').val();

       var datas = {
      'action': 'wpks_add_shortcut',
      'add_name': add_name,
      'add_shortcut_mode': add_shortcut_mode,
      'add_keycode': add_keycode,
      'add_url': add_url,
      'url_target': url_target,
      'add_toggle': add_toggle,
      'add_remove': add_remove,
      'add_comment': add_comment,
    };

        $.ajax({
            url: wpks.ajax_url + "/admin-ajax.php",
            data: datas,
            type: 'post',

            success: function(r){

              var p = new RegExp("Ohhooo !!!");
                var re = p.test(r);
            
            if ( re !== true ) {

                var patt = new RegExp("Please fill out");
                var res = patt.test(r);
              if ( res !== true ) {

              $('[data-dismiss="modal"]').click();

            setTimeout(function(){ 
              $('tbody').append(r);
              $('tbody tr:last-child').css({'background-color': '#2d7a2d', 'color': '#ffffff'});
            }, 1000);

              setTimeout(function(){ 
                  $('tbody tr:last-child').css({'background-color': '#ffffff', 'color': '#333333'});
              }, 1300);


              $('#item_add input').val("");
              $('#match_shortcut').hide();
              $('#add_keycode_tagsinput span').remove();
            } else {
              alert("Please fill out requered fieled !")
            }
          } else {
            $('[data-dismiss="modal"]').click();
            alert(r);
          }

        }
        });

  });
});


/*Rotation Option menu*/

var rotation = 0;

jQuery.fn.option_rotate = function(degrees, s) {
    $(this).css({'-webkit-transform' : 'rotate('+ degrees +'deg)',
                 '-moz-transform' : 'rotate('+ degrees +'deg)',
                 '-ms-transform' : 'rotate('+ degrees +'deg)',
                 'transform' : 'rotate('+ degrees +'deg)',
                 'transition' : s
             });
    return $(this);
};

  $(document).on("click", ".more.wpks_option.button", function(){
    if ( !$(".list-group.more_option").is(":visible") ) {
      rotation += 180;
      $('.more.wpks_option.button').option_rotate(rotation, "all 400ms linear");
        setTimeout(function(){
          $(".list-group.more_option").slideDown("200");
        }, 400);
    } else {
      rotation += 180;
      $('.more.wpks_option.button').option_rotate(rotation, "all 400ms linear");
        setTimeout(function(){
          $(".list-group.more_option").slideUp("300");
        }, 400);
    }
  });


$(document).ajaxSuccess(function(){
    $('#keycode').tagsInput({ 'defaultText':''});
});


/*Get key from add shortcut keycode box*/
$(document).on('keyup', '#keycode_tag',function(e){
  var ctoname = wpks_key_code_to_name(e.which);
    var val = $('#keycode').val();

var val2 = val.split(",");

if ( val2.indexOf(ctoname) == -1 ) {
    $('#keycode').addTag( wpks_key_code_to_name(e.which) );
    $(this).val("");  
    $(this).focus();
    } else {
     $(this).val("");
}

is_wpks_browser_shortcut_e();

});




/*Get Key from edit shortcut keycode box*/

function sys_and_browsers_add_keycode(selector){
  $(document).ready(function(){
    $(selector).tagsInput({ 'defaultText':''});

    var y = selector+'_tag';
  $(y).keyup(function(e){
      e.preventDefault();
    var val = $(selector).val();
       var ctoname = wpks_key_code_to_name(e.which);
var val2 = val.split(",");

if ( val2.indexOf(ctoname) == -1 ) {
    $(selector).addTag( wpks_key_code_to_name(e.which) );
    $(this).val("");  
    $(this).focus();
    } else {
     $(this).val("");
}

    is_wpks_browser_shortcut(selector);
});

  is_wpks_browser_shortcut_when_remove();
});

}

sys_and_browsers_add_keycode("#add_keycode");


function is_wpks_browser_shortcut(selector){
  var get_keys = $(selector).val();

    var datas = {
      'action': 'is_wpks_shortcut_match',
      'get_keys': get_keys,
    };

        $.ajax({
            url: wpks.ajax_url + "/admin-ajax.php",
            data: datas,
            type: 'post',

            success: function(details){
              var re = new RegExp("none");
             
              if (!re.test(details)) {
                $('.match_shortcut').html(details);
                $('.match_shortcut').slideDown('first');
              } else {
                $('.match_shortcut').slideUp('first');
              }

          }, error: function(){
            $('.match_shortcut').slideUp('first');
          }
        });
}



function is_wpks_browser_shortcut_e(){
  var get_keys = $('#keycode').val();
    var datas = {
      'action': 'is_wpks_shortcut_match',
      'get_keys': get_keys,
    };

        $.ajax({
            url: wpks.ajax_url + "/admin-ajax.php",
            data: datas,
            type: 'post',

            success: function(details){
              var re = new RegExp("none");
             
              if (!re.test(details)) {
                $('.match_shortcut_e').html(details);
                $('.match_shortcut_e').slideDown('first');
              } else {
                $('.match_shortcut_e').slideUp('first');
              }

          }, error: function(){
            $('.match_shortcut_e').slideUp('first');
          }
        });
}



/*If a shortcut keycode remove, then if found a browser keycode*/
function is_wpks_browser_shortcut_when_remove(){
  $(document).on("click", ".tag a", function(){
    is_wpks_browser_shortcut();
  });
}


/*Show model*/
function myFunction(x) {
    $("#item_view").modal();
}


/*Toggle Shortcut mode section when add*/
$(document).ready(function() {
  $("#shortcut_mode, #add_shortcut_mode").change(function(){
      if ( $(this).val() == "url" ) {
        $('.url_toggle').slideDown();
        $('.toggle_toggle').slideUp();
        $('.toggle_remove').slideUp();
      } else if ( $(this).val() == "toggle" ) {
        $('.toggle_toggle').slideDown();
        $('.toggle_remove').slideUp();
        $('.url_toggle').slideUp();
      } else if ( $(this).val() == "remove" ) {
        $('.toggle_toggle').slideUp();
        $('.url_toggle').slideUp();
        $('.toggle_remove').slideDown();
      }
  });
});


/*Toggle Shortcut mode section when edit*/
$(document).on("change", "#shortcut_mode", function(){
       if ( $(this).val() == "url" ) {
        $('.url_toggle').slideDown();
        $('.toggle_toggle').slideUp();
        $('.toggle_remove').slideUp();
      } else if ( $(this).val() == "toggle" ) {
        $('.toggle_toggle').slideDown();
        $('.toggle_remove').slideUp();
        $('.url_toggle').slideUp();
      } else if ( $(this).val() == "remove" ) {
        $('.toggle_toggle').slideUp();
        $('.url_toggle').slideUp();
        $('.toggle_remove').slideDown();
      }
});


/*Is url target _blank or not*/
function wpks_window_location(url,boolian){
  var location;
  if (boolian == true) {
    location = window.open(url, '_blank');
  } else {
    location = window.location.href = url;
  }
  return location;
}


/*tr ID to shortcut details */

$(document).ready(function(){
  $(document).on("click", ".wpks_", function(e){
    e.preventDefault();
      $('.col-md-12.item_content').hide();
      var t = $(this);
      var wpks_id = t.attr('id');

      var datas = {
      'action': 'wpks_id',
      'wpks_id': wpks_id,
    };

        $.ajax({
            url: wpks.ajax_url + "/admin-ajax.php",
            data: datas,
            type: 'post',

            success: function(details){
                $('.col-md-12.item_content').html(details);
                $('.col-md-12.item_content').show();

        }
        });

  });

  edit_and_delete()
});

function edit_and_delete(){

  $(document).on("click", '.btn-warning',function(e){
    e.preventDefault();
      $('.col-md-8.item_content.edit').hide();
      var t = $(this);
      var wpks_id = t.attr('wpks_id');

      var datas = {
      'action': 'wpks_edit_id',
      'wpks_id': wpks_id,
    };

        $.ajax({
            url: wpks.ajax_url + "/admin-ajax.php",
            data: datas,
            type: 'post',

            success: function(details){
                $('.col-md-8.item_content.edit').html(details);
                $('.col-md-8.item_content.edit').show();
        }
        });

  });
}


$(document).on("keyup", ".sr-input", function(){
  var value = $('.sr-input').val();
   var datas = {
    'action': 'wpks_search',
    'search_value': value,
  };
  
  $.ajax({
      url: wpks.ajax_url + "/admin-ajax.php",
      data: datas,
      type: 'post',
  
      success: function(r){
        $('.wpks_body tbody').html(r);
      }, error: function(){
        console.log("hi");
    }
  });
});


$(document).on("click", "#clear", function(){
  $('[id*="keycode"]').val("");
  $('[id*="keycode_tagsinput"] span').fadeOut(300, function(){ $(this).remove();});
  $('[id*="keycode_tag"]').focus();
});


var options = {
    url: wpks.plugin_dir + "/assets/js/url_tag.json",

    getValue: "name",

    list: {
        match: {
            enabled: true
        }
    },

    theme: "plate-dark"
};

$(document).ready(function(){
  $("#item_add #add_url").easyAutocomplete(options);
});

  $(document).ajaxComplete(function(){
    $("#item_edit #url").easyAutocomplete(options);
  });
  


function wpks_key_code_to_name(KeyCode){
var Key;
      if ( KeyCode ==  '8')  {Key = 'backspace';}
  else if ( KeyCode ==  '9')  {Key = 'tab';}
  else if ( KeyCode ==  '13') {Key = 'enter';}
  else if ( KeyCode ==  '16') {Key = 'shift';}
  else if ( KeyCode ==  '17') {Key = 'ctrl';}
  else if ( KeyCode ==  '18') {Key = 'alt';}
  else if ( KeyCode ==  '19') {Key = 'pause_break';}
  else if ( KeyCode ==  '20') {Key = 'caps_lock';}
  else if ( KeyCode ==  '27') {Key = 'escape';}
  else if ( KeyCode ==  '32') {Key = 'spacebar';}
  else if ( KeyCode ==  '33') {Key = 'page_up';}
  else if ( KeyCode ==  '34') {Key = 'page_down';}
  else if ( KeyCode ==  '35') {Key = 'end';}
  else if ( KeyCode ==  '36') {Key = 'home';}
  else if ( KeyCode ==  '37') {Key = 'left_arrow';}
  else if ( KeyCode ==  '38') {Key = 'up_arrow';}
  else if ( KeyCode ==  '39') {Key = 'Arrow_Right';}
  else if ( KeyCode ==  '40') {Key = 'down_arrow';}
  else if ( KeyCode ==  '45') {Key = 'insert';}
  else if ( KeyCode ==  '46') {Key = 'delete';}
  else if ( KeyCode ==  '48') {Key = '0';}
  else if ( KeyCode ==  '49') {Key = '1';}
  else if ( KeyCode ==  '50') {Key = '2';}
  else if ( KeyCode ==  '51') {Key = '3';}
  else if ( KeyCode ==  '52') {Key = '4';}
  else if ( KeyCode ==  '53') {Key = '5';}
  else if ( KeyCode ==  '54') {Key = '6';}
  else if ( KeyCode ==  '55') {Key = '7';}
  else if ( KeyCode ==  '56') {Key = '8';}
  else if ( KeyCode ==  '57') {Key = '9';}
  else if ( KeyCode ==  '59') {Key = 'semicolon';}
  else if ( KeyCode ==  '65') {Key = 'a';}
  else if ( KeyCode ==  '66') {Key = 'b';}
  else if ( KeyCode ==  '67') {Key = 'c';}
  else if ( KeyCode ==  '68') {Key = 'd';}
  else if ( KeyCode ==  '69') {Key = 'e';}
  else if ( KeyCode ==  '70') {Key = 'f';}
  else if ( KeyCode ==  '71') {Key = 'g';}
  else if ( KeyCode ==  '72') {Key = 'h';}
  else if ( KeyCode ==  '73') {Key = 'i';}
  else if ( KeyCode ==  '74') {Key = 'j';}
  else if ( KeyCode ==  '75') {Key = 'k';}
  else if ( KeyCode ==  '76') {Key = 'l';}
  else if ( KeyCode ==  '77') {Key = 'm';}
  else if ( KeyCode ==  '78') {Key = 'n';}
  else if ( KeyCode ==  '79') {Key = 'o';}
  else if ( KeyCode ==  '80') {Key = 'p';}
  else if ( KeyCode ==  '81') {Key = 'q';}
  else if ( KeyCode ==  '82') {Key = 'r';}
  else if ( KeyCode ==  '83') {Key = 's';}
  else if ( KeyCode ==  '84') {Key = 't';}
  else if ( KeyCode ==  '85') {Key = 'u';}
  else if ( KeyCode ==  '86') {Key = 'v';}
  else if ( KeyCode ==  '87') {Key = 'w';}
  else if ( KeyCode ==  '88') {Key = 'x';}
  else if ( KeyCode ==  '89') {Key = 'y';}
  else if ( KeyCode ==  '90') {Key = 'z';}
  else if ( KeyCode ==  '91') {Key = 'left_window_key';}
  else if ( KeyCode ==  '92') {Key = 'right_window_key';}
  else if ( KeyCode ==  '93') {Key = 'select_key';}
  else if ( KeyCode ==  '96') {Key = 'numpad_0';}
  else if ( KeyCode ==  '97') {Key = 'numpad_1';}
  else if ( KeyCode ==  '98') {Key = 'numpad_2';}
  else if ( KeyCode ==  '99') {Key = 'numpad_3';}
  else if ( KeyCode == '100') {Key = 'numpad_4';}
  else if ( KeyCode == '101') {Key = 'numpad_5';}
  else if ( KeyCode == '102') {Key = 'numpad_6';}
  else if ( KeyCode == '103') {Key = 'numpad_7';}
  else if ( KeyCode == '104') {Key = 'numpad_8';}
  else if ( KeyCode == '105') {Key = 'numpad_9';}
  else if ( KeyCode == '106') {Key = 'multiply';}
  else if ( KeyCode == '107') {Key = 'add';}
  else if ( KeyCode == '109') {Key = 'subtract';}
  else if ( KeyCode == '110') {Key = 'decimal_point';}
  else if ( KeyCode == '111') {Key = 'divide';}
  else if ( KeyCode == '112') {Key = 'f1 ';}
  else if ( KeyCode == '113') {Key = 'f2';}
  else if ( KeyCode == '114') {Key = 'f3';}
  else if ( KeyCode == '115') {Key = 'f4';}
  else if ( KeyCode == '116') {Key = 'f5';}
  else if ( KeyCode == '117') {Key = 'f6';}
  else if ( KeyCode == '118') {Key = 'f7';}
  else if ( KeyCode == '119') {Key = 'f8';}
  else if ( KeyCode == '120') {Key = 'f9';}
  else if ( KeyCode == '121') {Key = 'f10';}
  else if ( KeyCode == '122') {Key = 'f11';}
  else if ( KeyCode == '123') {Key = 'f12';}
  else if ( KeyCode == '144') {Key = 'num_lock';}
  else if ( KeyCode == '145') {Key = 'scroll_lock';}
  else if ( KeyCode == '186') {Key = 'semi_colon';}
  else if ( KeyCode == '187') {Key = 'equal_sign';}
  else if ( KeyCode == '188') {Key = 'comma';}
  else if ( KeyCode == '189') {Key = 'dash';}
  else if ( KeyCode == '190') {Key = 'period';}
  else if ( KeyCode == '191') {Key = 'forward_slash';}
  else if ( KeyCode == '192') {Key = 'grave_accent';}
  else if ( KeyCode == '219') {Key = 'open_bracket';}
  else if ( KeyCode == '220') {Key = 'back_slash ';}
  else if ( KeyCode == '221') {Key = 'close_braket';}
  else if ( KeyCode == '222') {Key = 'single_quote';}
                        else {Key = "none"; }
return Key;
}


/*Getting bootstrap tooltip*/
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});


$(document).ajaxComplete(function(){
    $('[data-toggle="tooltip"]').tooltip();
});


