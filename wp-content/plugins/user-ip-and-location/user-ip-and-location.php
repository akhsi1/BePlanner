<?php
/**
* Plugin Name: User IP and Location
* Plugin URI: https://theguidex.com/
* Version: 1.5
* Author: TheGuideX
* Author URI: https://theguidex.com/author/sunny/
* Description: Allows you to insert user's IP address, Location, ISP, City in your WordPress blog post and page using shortcode.
* License: GPL2
* Text Domain: user-ip-and-location
*/

defined( 'ABSPATH') or die( 'No Access Allowed...' );

function user_ip_and_location($atts)
    {
        extract(shortcode_atts(array(
          'type' => [' '],
		  'height' => 'auto',
		  'width' => '50px',
       ), $atts));
	
    
    $client  = @$_SERVER["HTTP_CF_CONNECTING_IP"];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $a = @$_SERVER['HTTP_X_FORWARDED'];
    $b = @$_SERVER['HTTP_FORWARDED_FOR'];
    $c = @$_SERVER['HTTP_FORWARDED'];
	$d = @$_SERVER['HTTP_CLIENT_IP'];
    $remote  = @$_SERVER['REMOTE_ADDR'];
			  
    if(filter_var($client, FILTER_VALIDATE_IP)){		
       $ip = $client;
    }
	elseif(filter_var($forward, FILTER_VALIDATE_IP)){
       $ip = $forward;
    } 
	elseif(filter_var($a, FILTER_VALIDATE_IP)){
       $ip = $a;
    } 
	elseif(filter_var($b, FILTER_VALIDATE_IP)){
       $ip = $b;
    } 
	elseif(filter_var($c, FILTER_VALIDATE_IP)){
       $ip = $c;
    } 
	elseif(filter_var($remote, FILTER_VALIDATE_IP)){
       $ip = $remote;
    } 
	else {
        $ip = '';
    }
	
if($ip != null)
    {
        $ip_data = @json_decode(wp_remote_retrieve_body(wp_remote_get( "http://ip-api.com/json/".$ip)));
    
        if($type == 'countryCode')
            {
               $userip_data = $ip_data->countryCode;
            } 
	
	   elseif($type == 'country')
            {
               $userip_data = $ip_data->country;
            } 
	
        elseif($type == 'region')
            {
               $userip_data = $ip_data->region;
            }  
	
        elseif($type == 'city')
            {
               $userip_data = $ip_data->city;
            }
	
        elseif($type == 'lat')
            {
               $userip_data = $ip_data->lat;
            } 
	
        elseif($type == 'lon')
            {
               $userip_data = $ip_data->lon;
            } 
	
        elseif($type == 'timezone')
            {
               $userip_data = $ip_data->timezone;
            } 
	
        elseif($type == 'isp')
            {
               $userip_data = $ip_data->isp;
            } 

        elseif($type == 'ip')
            {
               $userip_data = $ip_data->query;
            } 
    
        elseif($type == 'flag')
            {
               	$flag_country = $ip_data->countryCode;
				$flag = plugins_url().'/'.explode('/', plugin_basename( __file__ ))[0].'/flags/'.strtolower($flag_country).'.png';
				$userip_data = '<img src="'.$flag.'" style="height:'.$height.'!important; width:'.$width.'!important;" >';
            } 
	
        else 
        {
            $userip_data = "Unknown Error Occured.";
        }
    }
    
return $userip_data;

    } 

add_shortcode('userip_location', 'user_ip_and_location');    

?>