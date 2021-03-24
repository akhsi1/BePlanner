<?php

  if ( ! defined( 'ABSPATH' ) ) exit;

function wpks_key_name_to_code($key){

if ($key == 'backspace' ){ $KeyCode = '8';}
  elseif ($key == 'tab'){ $KeyCode =  '9';}
  elseif ($key == 'enter'){ $KeyCode =  '13';}
  elseif ($key == 'shift'){ $KeyCode =  '16';}
  elseif ($key == 'ctrl'){ $KeyCode =  '17';}
  elseif ($key == 'alt'){ $KeyCode =  '18';}
  elseif ($key == 'pause_break'){ $KeyCode =  '19';}
  elseif ($key == 'caps_lock'){ $KeyCode =  '20';}
  elseif ($key == 'escape'){ $KeyCode =  '27';}
  elseif ($key == 'spacebar'){ $KeyCode =  '32';}
  elseif ($key == 'page_up'){ $KeyCode =  '33';}
  elseif ($key == 'page_down'){ $KeyCode =  '34';}
  elseif ($key == 'end'){ $KeyCode =  '35';}
  elseif ($key == 'home'){ $KeyCode =  '36';}
  elseif ($key == 'arrow_left'){ $KeyCode =  '37';}
  elseif ($key == 'arrow_up'){ $KeyCode =  '38';}
  elseif ($key == 'arrow_right'){ $KeyCode =  '39';}
  elseif ($key == 'arrow_down'){ $KeyCode =  '40';}
  elseif ($key == 'insert'){ $KeyCode =  '45';}
  elseif ($key == 'delete'){ $KeyCode =  '46';}
  elseif ($key == '0'){ $KeyCode =  '48';}
  elseif ($key == '1'){ $KeyCode =  '49';}
  elseif ($key == '2'){ $KeyCode =  '50';}
  elseif ($key == '3'){ $KeyCode =  '51';}
  elseif ($key == '4'){ $KeyCode =  '52';}
  elseif ($key == '5'){ $KeyCode =  '53';}
  elseif ($key == '6'){ $KeyCode =  '54';}
  elseif ($key == '7'){ $KeyCode =  '55';}
  elseif ($key == '8'){ $KeyCode =  '56';}
  elseif ($key == '9'){ $KeyCode =  '57';}
  elseif ($key == 'semicolon'){ $KeyCode =  '59';}
  elseif ($key == 'a'){ $KeyCode =  '65';}
  elseif ($key == 'b'){ $KeyCode =  '66';}
  elseif ($key == 'c'){ $KeyCode =  '67';}
  elseif ($key == 'd'){ $KeyCode =  '68';}
  elseif ($key == 'e'){ $KeyCode =  '69';}
  elseif ($key == 'f'){ $KeyCode =  '70';}
  elseif ($key == 'g'){ $KeyCode =  '71';}
  elseif ($key == 'h'){ $KeyCode =  '72';}
  elseif ($key == 'i'){ $KeyCode =  '73';}
  elseif ($key == 'j'){ $KeyCode =  '74';}
  elseif ($key == 'k'){ $KeyCode =  '75';}
  elseif ($key == 'l'){ $KeyCode =  '76';}
  elseif ($key == 'm'){ $KeyCode =  '77';}
  elseif ($key == 'n'){ $KeyCode =  '78';}
  elseif ($key == 'o'){ $KeyCode =  '79';}
  elseif ($key == 'p'){ $KeyCode =  '80';}
  elseif ($key == 'q'){ $KeyCode =  '81';}
  elseif ($key == 'r'){ $KeyCode =  '82';}
  elseif ($key == 's'){ $KeyCode =  '83';}
  elseif ($key == 't'){ $KeyCode =  '84';}
  elseif ($key == 'u'){ $KeyCode =  '85';}
  elseif ($key == 'v'){ $KeyCode =  '86';}
  elseif ($key == 'w'){ $KeyCode =  '87';}
  elseif ($key == 'x'){ $KeyCode =  '88';}
  elseif ($key == 'y'){ $KeyCode =  '89';}
  elseif ($key == 'z'){ $KeyCode =  '90';}
  elseif ($key == 'left_window_key'){ $KeyCode =  '91';}
  elseif ($key == 'right_window_key'){ $KeyCode =  '92';}
  elseif ($key == 'select_key'){ $KeyCode =  '93';}
  elseif ($key == 'numpad_0'){ $KeyCode =  '96';}
  elseif ($key == 'numpad_1'){ $KeyCode =  '97';}
  elseif ($key == 'numpad_2'){ $KeyCode =  '98';}
  elseif ($key == 'numpad_3'){ $KeyCode =  '99';}
  elseif ($key == 'numpad_4' ){ $KeyCode = '100';}
  elseif ($key == 'numpad_5' ){ $KeyCode = '101';}
  elseif ($key == 'numpad_6' ){ $KeyCode = '102';}
  elseif ($key == 'numpad_7' ){ $KeyCode = '103';}
  elseif ($key == 'numpad_8' ){ $KeyCode = '104';}
  elseif ($key == 'numpad_9' ){ $KeyCode ='105 ';}
  elseif ($key == 'multiply' ){ $KeyCode = '106';}
  elseif ($key == 'add'){ $KeyCode = '107';}
  elseif ($key == 'subtract' ){ $KeyCode = '109';}
  elseif ($key == 'decimal_point'){ $KeyCode = '110';}
  elseif ($key == 'divide' ){ $KeyCode = '111';}
  elseif ($key == 'f1 '){ $KeyCode = '112';}
  elseif ($key == 'f2' ){ $KeyCode = '113';}
  elseif ($key == 'f3' ){ $KeyCode = '114';}
  elseif ($key == 'f4' ){ $KeyCode = '115';}
  elseif ($key == 'f5' ){ $KeyCode = '116';}
  elseif ($key == 'f6' ){ $KeyCode = '117';}
  elseif ($key == 'f7' ){ $KeyCode = '118';}
  elseif ($key == 'f8' ){ $KeyCode = '119';}
  elseif ($key == 'f9' ){ $KeyCode = '120';}
  elseif ($key == 'f10'){ $KeyCode = '121';}
  elseif ($key == 'f11'){ $KeyCode = '122';}
  elseif ($key == 'f12'){ $KeyCode = '123';}
  elseif ($key == 'num_lock' ){ $KeyCode = '144';}
  elseif ($key == 'scroll_lock'){ $KeyCode = '145';}
  elseif ($key == 'semi_colon' ){ $KeyCode = '186';}
  elseif ($key == 'equal_sign' ){ $KeyCode = '187';}
  elseif ($key == 'comma'){ $KeyCode = '188';}
  elseif ($key == 'dash' ){ $KeyCode = '189';}
  elseif ($key == 'period' ){ $KeyCode = '190';}
  elseif ($key == 'forward_slash'){ $KeyCode = '191';}
  elseif ($key == 'grave_accent' ){ $KeyCode = '192';}
  elseif ($key == 'open_bracket' ){ $KeyCode = '219';}
  elseif ($key == 'back_slash '){ $KeyCode = '220';}
  elseif ($key == 'close_braket' ){ $KeyCode = '221';}
  elseif ($key == 'single_quote'){ $KeyCode = '222';}
  else { $KeyCode = "none";}

    return $KeyCode;
  }



function wpks_key_code_to_name($KeyCode){

      if ( $KeyCode ==  '8')  {$key = 'backspace';}
  elseif ( $KeyCode ==  '9')  {$key = 'tab';}
  elseif ( $KeyCode ==  '13') {$key = 'enter';}
  elseif ( $KeyCode ==  '16') {$key = 'shift';}
  elseif ( $KeyCode ==  '17') {$key = 'ctrl';}
  elseif ( $KeyCode ==  '18') {$key = 'alt';}
  elseif ( $KeyCode ==  '19') {$key = 'pause_break';}
  elseif ( $KeyCode ==  '20') {$key = 'caps_lock';}
  elseif ( $KeyCode ==  '27') {$key = 'escape';}
  elseif ( $KeyCode ==  '32') {$key = 'spacebar';}
  elseif ( $KeyCode ==  '33') {$key = 'page_up';}
  elseif ( $KeyCode ==  '34') {$key = 'page_down';}
  elseif ( $KeyCode ==  '35') {$key = 'end';}
  elseif ( $KeyCode ==  '36') {$key = 'home';}
  elseif ( $KeyCode ==  '37') {$key = 'arrow_left';}
  elseif ( $KeyCode ==  '38') {$key = 'arrow_up';}
  elseif ( $KeyCode ==  '39') {$key = 'arrow_right';}
  elseif ( $KeyCode ==  '40') {$key = 'arrow_down';}
  elseif ( $KeyCode ==  '45') {$key = 'insert';}
  elseif ( $KeyCode ==  '46') {$key = 'delete';}
  elseif ( $KeyCode ==  '48') {$key = '0';}
  elseif ( $KeyCode ==  '49') {$key = '1';}
  elseif ( $KeyCode ==  '50') {$key = '2';}
  elseif ( $KeyCode ==  '51') {$key = '3';}
  elseif ( $KeyCode ==  '52') {$key = '4';}
  elseif ( $KeyCode ==  '53') {$key = '5';}
  elseif ( $KeyCode ==  '54') {$key = '6';}
  elseif ( $KeyCode ==  '55') {$key = '7';}
  elseif ( $KeyCode ==  '56') {$key = '8';}
  elseif ( $KeyCode ==  '57') {$key = '9';}
  elseif ( $KeyCode ==  '59') {$key = 'semicolon';}
  elseif ( $KeyCode ==  '65') {$key = 'a';}
  elseif ( $KeyCode ==  '66') {$key = 'b';}
  elseif ( $KeyCode ==  '67') {$key = 'c';}
  elseif ( $KeyCode ==  '68') {$key = 'd';}
  elseif ( $KeyCode ==  '69') {$key = 'e';}
  elseif ( $KeyCode ==  '70') {$key = 'f';}
  elseif ( $KeyCode ==  '71') {$key = 'g';}
  elseif ( $KeyCode ==  '72') {$key = 'h';}
  elseif ( $KeyCode ==  '73') {$key = 'i';}
  elseif ( $KeyCode ==  '74') {$key = 'j';}
  elseif ( $KeyCode ==  '75') {$key = 'k';}
  elseif ( $KeyCode ==  '76') {$key = 'l';}
  elseif ( $KeyCode ==  '77') {$key = 'm';}
  elseif ( $KeyCode ==  '78') {$key = 'n';}
  elseif ( $KeyCode ==  '79') {$key = 'o';}
  elseif ( $KeyCode ==  '80') {$key = 'p';}
  elseif ( $KeyCode ==  '81') {$key = 'q';}
  elseif ( $KeyCode ==  '82') {$key = 'r';}
  elseif ( $KeyCode ==  '83') {$key = 's';}
  elseif ( $KeyCode ==  '84') {$key = 't';}
  elseif ( $KeyCode ==  '85') {$key = 'u';}
  elseif ( $KeyCode ==  '86') {$key = 'v';}
  elseif ( $KeyCode ==  '87') {$key = 'w';}
  elseif ( $KeyCode ==  '88') {$key = 'x';}
  elseif ( $KeyCode ==  '89') {$key = 'y';}
  elseif ( $KeyCode ==  '90') {$key = 'z';}
  elseif ( $KeyCode ==  '91') {$key = 'left_window_key';}
  elseif ( $KeyCode ==  '92') {$key = 'right_window_key';}
  elseif ( $KeyCode ==  '93') {$key = 'select_key';}
  elseif ( $KeyCode ==  '96') {$key = 'numpad_0';}
  elseif ( $KeyCode ==  '97') {$key = 'numpad_1';}
  elseif ( $KeyCode ==  '98') {$key = 'numpad_2';}
  elseif ( $KeyCode ==  '99') {$key = 'numpad_3';}
  elseif ( $KeyCode == '100') {$key = 'numpad_4';}
  elseif ( $KeyCode == '101') {$key = 'numpad_5';}
  elseif ( $KeyCode == '102') {$key = 'numpad_6';}
  elseif ( $KeyCode == '103') {$key = 'numpad_7';}
  elseif ( $KeyCode == '104') {$key = 'numpad_8';}
  elseif ( $KeyCode == '105') {$key = 'numpad_9';}
  elseif ( $KeyCode == '106') {$key = 'multiply';}
  elseif ( $KeyCode == '107') {$key = 'add';}
  elseif ( $KeyCode == '109') {$key = 'subtract';}
  elseif ( $KeyCode == '110') {$key = 'decimal_point';}
  elseif ( $KeyCode == '111') {$key = 'divide';}
  elseif ( $KeyCode == '112') {$key = 'f1 ';}
  elseif ( $KeyCode == '113') {$key = 'f2';}
  elseif ( $KeyCode == '114') {$key = 'f3';}
  elseif ( $KeyCode == '115') {$key = 'f4';}
  elseif ( $KeyCode == '116') {$key = 'f5';}
  elseif ( $KeyCode == '117') {$key = 'f6';}
  elseif ( $KeyCode == '118') {$key = 'f7';}
  elseif ( $KeyCode == '119') {$key = 'f8';}
  elseif ( $KeyCode == '120') {$key = 'f9';}
  elseif ( $KeyCode == '121') {$key = 'f10';}
  elseif ( $KeyCode == '122') {$key = 'f11';}
  elseif ( $KeyCode == '123') {$key = 'f12';}
  elseif ( $KeyCode == '144') {$key = 'num_lock';}
  elseif ( $KeyCode == '145') {$key = 'scroll_lock';}
  elseif ( $KeyCode == '186') {$key = 'semi_colon';}
  elseif ( $KeyCode == '187') {$key = 'equal_sign';}
  elseif ( $KeyCode == '188') {$key = 'comma';}
  elseif ( $KeyCode == '189') {$key = 'dash';}
  elseif ( $KeyCode == '190') {$key = 'period';}
  elseif ( $KeyCode == '191') {$key = 'forward_slash';}
  elseif ( $KeyCode == '192') {$key = 'grave_accent';}
  elseif ( $KeyCode == '219') {$key = 'open_bracket';}
  elseif ( $KeyCode == '220') {$key = 'back_slash ';}
  elseif ( $KeyCode == '221') {$key = 'close_braket';}
  elseif ( $KeyCode == '222') {$key = 'single_quote';}
                        else {$key = "none"; }

return $Key;
}



function wpks_hotKeys($keyCode){
  $keyCode = str_replace("e.which == 16", "e.shiftKey", $keyCode);
  $keyCode = str_replace("e.which == 17", "e.ctrlKey", $keyCode);
  $keyCode = str_replace("e.which == 18", "e.altKey", $keyCode);

  return $keyCode;
}