<?php

/*---------------------------------------------------
Social Icons generator for front-end
----------------------------------------------------*/
function fuse_social_update_analytics()
{
    // The $_REQUEST contains all the data sent via ajax
    
    if ( isset( $_POST['connect'] ) && isset( $_POST['nonce'] ) ) {
        $connect = sanitize_text_field( $_POST['connect'] );
        $nonce = sanitize_text_field( $_POST['nonce'] );
        
        if ( wp_verify_nonce( $nonce, 'fuse_social_floating' ) ) {
            $fuse_click_data = unserialize( get_option( 'fuse_click_data' ) );
            $connect_click = $fuse_click_data[$connect];
            $connect_click = $connect_click + 1;
            // Increasing one more click here
            $fuse_click_data[$connect] = $connect_click;
            $fuse_click_data = serialize( $fuse_click_data );
            update_option( 'fuse_click_data', $fuse_click_data );
        }
    
    }
    
    // Always die in functions echoing ajax content
    die;
}

add_action( 'wp_ajax_fuse_social_update_analytics', 'fuse_social_update_analytics' );
add_action( 'wp_ajax_nopriv_fuse_social_update_analytics', 'fuse_social_update_analytics' );
//Checking is style is square or round.
$fuse_social_opt_front = array(
    'square' => array(
    'value' => 'square',
    'label' => __( '', 'awesome-social' ),
),
    'round'  => array(
    'value' => 'round',
    'label' => __( '', 'awesome-social' ),
),
);
global  $fuse_social_style ;
if ( !isset( $checked ) ) {
    $checked = '';
}
foreach ( $fuse_social_opt_front as $option ) {
    $radio_setting = "";
    if ( !empty($options['style_input']) ) {
        $radio_setting = $options['style_input'];
    }
    if ( '' != $radio_setting ) {
        
        if ( $options['style_input'] == $option['value'] ) {
            $fuse_social_style = $options['style_input'];
            $checked = "checked=\"checked\"";
        } else {
            $checked = '';
        }
    
    }
}
class Making_Fuse_Icons
{
    // Generating Icons with respective links
    function Create_Awesome_Icons()
    {
        $options = get_option( 'fuse' );
        
        if ( $this->fuse_check_if_key_val( $options ) ) {
            $this->fuse_redux_generate_HTML( $options );
        } else {
            $options = get_option( 'fuse_social_options' );
            $this->fuse_generate_HTML( $options );
        }
        
        $countiner = 20;
    }
    
    function fuse_check_if_key_val( $options )
    {
        foreach ( $options as $key => $value ) {
            if ( $value ) {
                return 1;
            }
        }
        return 0;
    }
    
    function fuse_redux_generate_HTML( $options )
    {
        global  $post ;
        $pageid = $post->ID;
        echo  "<div id='icon_wrapper'>" ;
        $fuse_settings = $options;
        $display_flag = 1;
        $pages_hide_from = "";
        $hide_blog_posts = "";
        $custom_icons = "";
        if ( !empty($fuse_settings['not_display_on']) ) {
            $pages_hide_from = $fuse_settings['not_display_on'];
        }
        if ( !empty($fuse_settings['hide_blog_posts']) ) {
            $hide_blog_posts = $fuse_settings['hide_blog_posts'];
        }
        if ( !empty($fuse_settings['fuse-custom-icons']) ) {
            $custom_icons = $fuse_settings['fuse-custom-icons'];
        }
        $options = $options['opt-sortable'];
        // Checking if target is _self or _blank
        
        if ( $fuse_settings['linksnewtab'] ) {
            $target = 'target="_blank"';
        } else {
            $target = 'target="_self"';
        }
        
        $alllinks = array();
        // Checking if social icon value is set from admin settings then display that icon, other wise not.
        foreach ( $options as $socialnet => $socialinks ) {
            
            if ( $socialinks ) {
                $alllinks[$socialnet] = $socialinks;
                
                if ( !empty($alllinks['Facebook']) ) {
                    $alllinks['facebook'] = $socialinks;
                    unset( $alllinks['Facebook'] );
                }
                
                
                if ( !empty($alllinks['Twitter']) ) {
                    $alllinks['twitter'] = $socialinks;
                    unset( $alllinks['Twitter'] );
                }
                
                
                if ( !empty($alllinks['RSS']) ) {
                    $alllinks['rss'] = $socialinks;
                    unset( $alllinks['RSS'] );
                }
                
                
                if ( !empty($alllinks['Linkedin']) ) {
                    $alllinks['linkedin'] = $socialinks;
                    unset( $alllinks['Linkedin'] );
                }
                
                
                if ( !empty($alllinks['Youtube']) ) {
                    $alllinks['youtube'] = $socialinks;
                    unset( $alllinks['Youtube'] );
                }
                
                
                if ( !empty($alllinks['Flickr']) ) {
                    $alllinks['flickr'] = $socialinks;
                    unset( $alllinks['Flickr'] );
                }
                
                
                if ( !empty($alllinks['Stumbleupon']) ) {
                    $alllinks['stumbleupon'] = $socialinks;
                    unset( $alllinks['Stumbleupon'] );
                }
                
                
                if ( !empty($alllinks['Instagram']) ) {
                    $alllinks['instagram'] = $socialinks;
                    unset( $alllinks['Instagram'] );
                }
                
                
                if ( !empty($alllinks['Tumblr']) ) {
                    $alllinks['tumblr'] = $socialinks;
                    unset( $alllinks['Tumblr'] );
                }
                
                
                if ( !empty($alllinks['Vine']) ) {
                    $alllinks['vine'] = $socialinks;
                    unset( $alllinks['Vine'] );
                }
                
                
                if ( !empty($alllinks['VK']) ) {
                    $alllinks['vk'] = $socialinks;
                    unset( $alllinks['VK'] );
                }
                
                
                if ( !empty($alllinks['SoundCloud']) ) {
                    $alllinks['soundcloud'] = $socialinks;
                    unset( $alllinks['SoundCloud'] );
                }
                
                
                if ( !empty($alllinks['Pinterest']) ) {
                    $alllinks['pinterest'] = $socialinks;
                    unset( $alllinks['Pinterest'] );
                }
                
                
                if ( !empty($alllinks['Reddit']) ) {
                    $alllinks['reddit'] = $socialinks;
                    unset( $alllinks['Reddit'] );
                }
                
                
                if ( !empty($alllinks['StackOverFlow']) ) {
                    $alllinks['stack-overflow'] = $socialinks;
                    unset( $alllinks['StackOverFlow'] );
                }
                
                
                if ( !empty($alllinks['Behance']) ) {
                    $alllinks['behance'] = $socialinks;
                    unset( $alllinks['Behance'] );
                }
                
                
                if ( !empty($alllinks['Github']) ) {
                    $alllinks['github'] = $socialinks;
                    unset( $alllinks['Github'] );
                }
                
                
                if ( !empty($alllinks['Email']) ) {
                    $alllinks['envelope'] = $socialinks;
                    unset( $alllinks['Email'] );
                }
            
            }
        
        }
        if ( !empty($pages_hide_from) ) {
            
            if ( in_array( $pageid, $pages_hide_from ) ) {
                $display_flag = 0;
            } else {
                $display_flag = 1;
            }
        
        }
        if ( $hide_blog_posts ) {
            $display_flag = 0;
        }
        
        if ( $display_flag ) {
            if ( !empty($fuse_settings['custom_icon_on_top']) ) {
                $this->fuse_get_custom_icons( $fuse_settings );
            }
            foreach ( $alllinks as $key => $value ) {
                if ( !empty($value) ) {
                    echo  "<a {$target} class='fuse_social_icons_links' data-nonce='" . wp_create_nonce( 'fuse_social_floating' ) . "' data-title='{$key}' href='{$value}'>\t<i class='fa fa-{$key} {$key}-awesome-social awesome-social'></i></a>" ;
                }
            }
            if ( empty($fuse_settings['custom_icon_on_top']) ) {
                $this->fuse_get_custom_icons( $fuse_settings );
            }
        }
    
    }
    
    public function fuse_get_custom_icons( $fuse_settings )
    {
        
        if ( $fuse_settings['linksnewtab'] ) {
            $target = 'target="_blank"';
        } else {
            $target = 'target="_self"';
        }
        
        if ( !empty($fuse_settings['fuse-custom-icons']) ) {
            for ( $i = 0 ;  $i < count( $fuse_settings['fuse-custom-icons'] ) ;  $i++ ) {
                
                if ( !empty($fuse_settings['fuse-custom-icons']['social_icon_url'][$i]) ) {
                    $icondata = "";
                    $icon_settings = $fuse_settings['fuse-custom-icons']['icon_url'][$i];
                    $iconbackground = "";
                    $iconsocialimgclass = "";
                    
                    if ( $icon_settings['url'] ) {
                        $icondata = '<img src="' . $icon_settings['url'] . '" alt="' . $icon_settings['title'] . '" style="width:' . $fuse_settings['fuse-custom-icons']['icon-size'][$i] . 'px;" />';
                        $iconbackground = "style='background-color:" . $fuse_settings['fuse-custom-icons']['bg_color'][$i] . ";'";
                        $iconsocialimgclass = "awesome-social awesome-social-img";
                    } else {
                        $icondata = "<i class='" . $fuse_settings['fuse-custom-icons']['select_font_icon'][$i] . " custom-fuse-social awesome-social' style='background-color:" . $fuse_settings['fuse-custom-icons']['bg_color'][$i] . ";color:" . $fuse_settings['fuse-custom-icons']['icon_m_color'][$i] . " !important;'></i>";
                    }
                    
                    echo  "<a {$target}  {$iconbackground} class='{$iconsocialimgclass} fuse_social_icons_links fuse_custom_icons' data-nonce='" . wp_create_nonce( 'fuse_social_floating' ) . "' data-title='" . $fuse_settings['fuse-custom-icons']['title_field'][$i] . "' href='" . $fuse_settings['fuse-custom-icons']['social_icon_url'][$i] . "'>" . $icondata . "</a>" ;
                }
            
            }
        }
    }
    
    // This function will be removed soon.
    function fuse_generate_HTML( $options )
    {
        echo  "<div id='icon_wrapper'>" ;
        // Checking if target is _self or _blank
        
        if ( $options['linksnewtab'] == 1 ) {
            $target = 'target="_blank"';
        } else {
            $target = 'target="_self"';
        }
        
        // Checking if social icon value is set from admin settings then display that icon, other wise not.
        
        if ( $options['facebook'] ) {
            $facebook = $options['facebook'];
            echo  "<a  {$target}  class='fuse_social_icons_links' href='{$facebook}'>\t<i class='fa fa-facebook fb-awesome-social awesome-social'></i></a><br />" ;
        }
        
        
        if ( $options['twitter'] ) {
            $twitter = $options['twitter'];
            echo  "<a {$target} class='fuse_social_icons_links' href='{$twitter}'>\t<i class='fa fa-twitter tw-awesome-social awesome-social'></i></a><br />" ;
        }
        
        
        if ( $options['rss'] ) {
            $rss = $options['rss'];
            echo  "<a {$target} class='fuse_social_icons_links' href='{$rss}'>\t<i class='fa fa-rss rss-awesome-social awesome-social'></i></a><br />" ;
        }
        
        
        if ( $options['linkedin'] ) {
            $linkedin = $options['linkedin'];
            echo  "<a {$target} class='fuse_social_icons_links' href='{$linkedin}'>\t<i class='fa fa-linkedin linkedin-awesome-social awesome-social'></i></a><br />" ;
        }
        
        
        if ( $options['youtube'] ) {
            $youtube = $options['youtube'];
            echo  "<a {$target} class='fuse_social_icons_links' href='{$youtube}'>\t<i class='fa fa-youtube youtube-awesome-social awesome-social'></i></a><br />" ;
        }
        
        
        if ( $options['flickr'] ) {
            $flickr = $options['flickr'];
            echo  "<a {$target} class='fuse_social_icons_links' href='{$flickr}'>\t<i class='fa fa-flickr flickr-awesome-social awesome-social'></i></a><br />" ;
        }
        
        
        if ( $options['pinterest'] ) {
            $pinterest = $options['pinterest'];
            echo  "<a {$target} class='fuse_social_icons_links' href='{$pinterest}'>\t<i class='fa fa-pinterest pinterest-awesome-social awesome-social'></i></a><br />" ;
        }
        
        
        if ( $options['stumbleupon'] ) {
            $stumbleupon = $options['stumbleupon'];
            echo  "<a {$target} class='fuse_social_icons_links' href='{$stumbleupon}'>\t<i class='fa fa-stumbleupon stumbleupon-awesome-social awesome-social'></i></a><br />" ;
        }
        
        
        if ( $options['google-plus'] ) {
            $google = $options['google-plus'];
            echo  "<a {$target} class='fuse_social_icons_links' href='{$google}'>\t<i class='fa fa-google-plus google-plus-awesome-social awesome-social'></i></a><br />" ;
        }
        
        
        if ( $options['instagram'] ) {
            $instagram = $options['instagram'];
            echo  "<a {$target} class='fuse_social_icons_links' href='{$instagram}'>\t<i class='fa fa-instagram instagram-awesome-social awesome-social'></i></a><br />" ;
        }
        
        
        if ( $options['tumblr'] ) {
            $tumblr = $options['tumblr'];
            echo  "<a {$target} class='fuse_social_icons_links' href='{$tumblr}'>\t<i class='fa fa-tumblr tumblr-awesome-social awesome-social'></i></a><br />" ;
        }
        
        
        if ( $options['vine'] ) {
            $vine = $options['vine'];
            echo  "<a {$target} class='fuse_social_icons_links' href='{$vine}'>\t<i class='fa fa-vine vine-awesome-social awesome-social'></i></a><br />" ;
        }
        
        
        if ( $options['vk'] ) {
            $vk = $options['vk'];
            echo  "<a {$target} class='fuse_social_icons_links' href='{$vk}'>\t<i class='fa fa-vk vk-awesome-social awesome-social'></i></a><br />" ;
        }
        
        
        if ( $options['soundcloud'] ) {
            $soundcloud = $options['soundcloud'];
            echo  "<a {$target} class='fuse_social_icons_links' href='{$soundcloud}'>\t<i class='fa fa-soundcloud soundcloud-awesome-social awesome-social'></i></a><br />" ;
        }
        
        
        if ( $options['reddit'] ) {
            $reddit = $options['reddit'];
            echo  "<a {$target} class='fuse_social_icons_links' href='{$reddit}'>\t<i class='fa fa-reddit reddit-awesome-social awesome-social'></i></a><br />" ;
        }
        
        
        if ( $options['stack'] ) {
            $stack = $options['stack'];
            echo  "<a {$target} class='fuse_social_icons_links' href='{$stack}'>\t<i class='fa fa-stack-overflow stack-awesome-social awesome-social'></i></a><br />" ;
        }
        
        
        if ( $options['behance'] ) {
            $behance = $options['behance'];
            echo  "<a {$target} class='fuse_social_icons_links' href='{$behance}'>\t<i class='fa fa-behance behance-awesome-social awesome-social'></i></a><br />" ;
        }
        
        
        if ( $options['github'] ) {
            $github = $options['github'];
            echo  "<a {$target} class='fuse_social_icons_links' href='{$github}'>\t<i class='fa fa-github github-awesome-social awesome-social'></i></a><br />" ;
        }
        
        
        if ( $options['envelope'] ) {
            $envelope = $options['envelope'];
            echo  "<a {$target} class='fuse_social_icons_links' href='{$envelope}'>\t<i class='fa fa-envelope envelope-awesome-social awesome-social'></i></a><br />" ;
        }
    
    }

}