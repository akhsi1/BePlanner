<?php

/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */
if ( !class_exists( 'Redux' ) ) {
    return;
}
// This is your option name where all the Redux data is stored.
$opt_name = "fuse";
// This line is only for altering the demo. Can be easily removed.
$opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );
$upgrade_txt = '<div class="upgrade_now_cn"><a href="' . fs_fs()->get_upgrade_url() . '"><strong>Upgrade now!</strong> to unlock more designs.</a></div>';
$unlock_up_custom = '<div class="upgrade_now_cn"><a href="' . fs_fs()->get_upgrade_url() . '"><strong>Upgrade now!</strong> to add custom icons, track click analytics, apply color changes, unlock other designs and top of that apply conditional settings.</a></div>';
$upgrade_position = '<div class="upgrade_now_cn max_500"><a href="' . fs_fs()->get_upgrade_url() . '">Would you like to change the position of icons? <strong>Upgrade Now!</strong></a></div>
    <style>
    span.compact.drag.ui-sortable-handle {
        display: none !important;
    }
    </style>
    ';
$support_main = '<div class="support-center">
                <h2>We are always available to help!</h2>
                <div class="contactus">
                <a href="https://www.fusefloat.com/" target="_blank">Contact with support</a>
                </div>
                <div class="col20off">
                <a href="https://www.facebook.com/groups/362299454971427" target="_blank">Join facebook group to get 20% OFF</a>
                </div>
                <div class="upgrade_20">
                <a href="' . fs_fs()->get_upgrade_url() . '" target="_blank">Upgrade to pro version now!</a>
                </div>
                </div>';
$upgrade_vert = array();
/*
 *
 * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
 *
 */
$sampleHTML = '';

if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
    Redux_Functions::initWpFilesystem();
    global  $wp_filesystem ;
    $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
}

// Background Patterns Reader
$sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
$sample_patterns_url = ReduxFramework::$_url . '../sample/patterns/';
$sample_patterns = array();
if ( is_dir( $sample_patterns_path ) ) {
    
    if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
        $sample_patterns = array();
        while ( ($sample_patterns_file = readdir( $sample_patterns_dir )) !== false ) {
            
            if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                $name = explode( '.', $sample_patterns_file );
                $name = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                $sample_patterns[] = array(
                    'alt' => $name,
                    'img' => $sample_patterns_url . $sample_patterns_file,
                );
            }
        
        }
    }

}
/**
 * ---> SET ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 * */
$theme = wp_get_theme();
// For use with some settings. Not necessary.
$args = array(
    'opt_name'             => $opt_name,
    'display_name'         => "FUSE Soical Floating Sidebar",
    'display_version'      => "1.0",
    'menu_type'            => 'menu',
    'allow_sub_menu'       => true,
    'menu_title'           => __( 'Fuse Social', 'fuse-social-floating' ),
    'page_title'           => __( 'Fuse Social', 'fuse-social-floating' ),
    'google_api_key'       => '',
    'google_update_weekly' => false,
    'show_options_object'  => false,
    'async_typography'     => false,
    'admin_bar'            => false,
    'admin_bar_icon'       => 'dashicons-portfolio',
    'admin_bar_priority'   => 50,
    'global_variable'      => '',
    'dev_mode'             => false,
    'update_notice'        => false,
    'customizer'           => false,
    'page_priority'        => null,
    'page_parent'          => 'themes.php',
    'page_permissions'     => 'manage_options',
    'menu_icon'            => '',
    'last_tab'             => '',
    'page_icon'            => 'icon-themes',
    'page_slug'            => '',
    'save_defaults'        => true,
    'default_show'         => false,
    'default_mark'         => '',
    'show_import_export'   => false,
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    'output_tag'           => true,
    'database'             => '',
    'use_cdn'              => true,
    'hints'                => array(
    'icon'          => 'el el-question-sign',
    'icon_position' => 'right',
    'icon_color'    => 'lightgray',
    'icon_size'     => 'normal',
    'tip_style'     => array(
    'color'   => 'red',
    'shadow'  => true,
    'rounded' => false,
    'style'   => '',

),
    'tip_position'  => array(
    'my' => 'top left',
    'at' => 'bottom right',
),
    'tip_effect'    => array(
    'show' => array(
    'effect'   => 'slide',
    'duration' => '500',
    'event'    => 'mouseover',
),
    'hide' => array(
    'effect'   => 'slide',
    'duration' => '500',
    'event'    => 'click mouseleave',
),
),
),
);
// ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
$args['admin_bar_links'][] = array(
    'id'    => 'redux-docs',
    'href'  => 'http://docs.reduxframework.com/',
    'title' => __( 'Documentation', 'fuse-social-floating' ),
);
$args['admin_bar_links'][] = array(
    'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
    'title' => __( 'Support', 'fuse-social-floating' ),
);
$args['admin_bar_links'][] = array(
    'id'    => 'redux-extensions',
    'href'  => 'reduxframework.com/extensions',
    'title' => __( 'Extensions', 'fuse-social-floating' ),
);

//$reqbody = wp_remote_get('https://www.fusefloat.com/wp-admin/admin-ajax.php?action=fuse_load_demo_ajax_request&url='.base64_encode(fs_fs()->get_upgrade_url()), array( '' ) );

// Add content after the form.
$args['footer_text'] = __('<div class="flash_sale_sm"><span class="flashit">Sale</span> Get 20% OFF Right Now! Use coupon code <strong class="sale_off">SALE20OFF</strong> <a href="'.fs_fs()->get_upgrade_url().'">Upgrade Now!</a> </div>', 'redux-framework-demo' );


// SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
$args['share_icons'][] = array(
    'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
    'title' => 'Visit us on GitHub',
    'icon'  => 'el el-github',
);
$args['share_icons'][] = array(
    'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
    'title' => 'Like us on Facebook',
    'icon'  => 'el el-facebook',
);
$args['share_icons'][] = array(
    'url'   => 'http://twitter.com/reduxframework',
    'title' => 'Follow us on Twitter',
    'icon'  => 'el el-twitter',
);
$args['share_icons'][] = array(
    'url'   => 'http://www.linkedin.com/company/redux-framework',
    'title' => 'Find us on LinkedIn',
    'icon'  => 'el el-linkedin',
);
// Panel Intro text -> before the form

if ( !isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
    
    if ( !empty($args['global_variable']) ) {
        $v = $args['global_variable'];
    } else {
        $v = str_replace( '-', '_', $args['opt_name'] );
    }
    
    $args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'fuse-social-floating' ), $v );
} else {
    $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'fuse-social-floating' );
}

Redux::setArgs( $opt_name, $args );
/*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for
*/
// -> START Basic Fields
Redux::setSection( $opt_name, array(
    'title'            => __( 'Social Icons', 'fuse-social-floating' ),
    'id'               => 'basic',
    'customizer_width' => '400px',
    'icon'             => 'el el-network',
) );
Redux::setSection( $opt_name, array(
    'title'      => __( 'Social Icons', 'fuse-social-floating' ),
    'id'         => 'basic-Sortable',
    'subsection' => true,
    'fields'     => array( array(
    'id'      => 'upgrade_position',
    'type'    => 'raw',
    'content' => $upgrade_position,
), array(
    'id'       => 'opt-sortable',
    'type'     => 'sortable',
    'title'    => __( 'Add Links', 'fuse-social-floating' ),
    'subtitle' => __( 'Social links and reorder these however you want.', 'fuse-social-floating' ),
    'label'    => true,
    'options'  => array(
    'Facebook'      => 'Facebook URL',
    'Twitter'       => 'Twitter URL',
    'RSS'           => 'RSS URL',
    'Linkedin'      => 'Linkedin URL',
    'Youtube'       => 'Youtube URL',
    'Flickr'        => 'Flickr URL',
    'Stumbleupon'   => 'Stumbleupon URL',
    'Instagram'     => 'Instagram Profile URL',
    'Tumblr'        => 'Tumblr URL',
    'Vine'          => 'Vine URL',
    'VK'            => 'VK URL',
    'SoundCloud'    => 'Sound Cloud URL',
    'Pinterest'     => 'Pinterest URL',
    'Reddit'        => 'Reddit URL',
    'StackOverFlow' => 'Stack OverFlow URL',
    'Behance'       => 'Behance URL',
    'Github'        => 'Github URL',
    'Email'         => 'mailto:someone@example.com',
),
    'default'  => array(
    'Facebook' => '',
    'Twitter'  => '',
    'RSS'      => '',
),
) ),
) );
Redux::setSection( $opt_name, array(
    'title'      => __( 'Custom Icons', 'fuse-social-floating' ),
    'id'         => 'customicons-Sortable',
    'subsection' => true,
    'fields'     => array( array(
    'id'      => 'custom_icon_upgrade',
    'type'    => 'raw',
    'content' => $unlock_up_custom . '<a href="' . fs_fs()->get_upgrade_url() . '"><img class="upgrade_by_img" src="' . ReduxFramework::$_url . '../presets/custom_icons.jpg" /></a>',
) ),
) );
// -> START Basic Fields
Redux::setSection( $opt_name, array(
    'title'            => __( 'Design', 'fuse-social-floating' ),
    'id'               => 'design',
    'customizer_width' => '400px',
    'icon'             => 'el el-adjust',
) );


Redux::setSection( $opt_name, array(
    'title'      => __( 'Color Settings', 'fuse-social-floating' ),
    'id'         => 'color_settings',
    'subsection' => true,
    'fields'     => array(
    
        array(
            'id'       => 'up_txt_ls',
            'type'     => 'raw',
            'content' => '<a href="'.fs_fs()->get_upgrade_url().'"><img src="'.ReduxFramework::$_url.'../presets/applies.png" /></a><div class="upgrade_now_cn"><a href="'.fs_fs()->get_upgrade_url().'"><strong>Upgrade now!</strong> to unlock this feature.</a></div>'
        )


    )
) );

Redux::setSection( $opt_name, array(
    'title'      => __( 'Icon Designs', 'fuse-social-floating' ),
    'id'         => 'icons_designs',
    'subsection' => true,
    'fields'     => array( array(
    'id'       => 'design-section',
    'type'     => 'image_select',
    'title'    => __( 'Select Design', 'fuse-social-floating' ),
    'subtitle' => __( 'You can select any one design for your icons set.', 'fuse-social-floating' ),
    'label'    => true,
    'options'  => array(
    '1' => array(
    'alt'     => 'Design 1',
    'img'     => ReduxFramework::$_url . '../presets/preset-1.png',
    'presets' => array(
    'switch-on'     => 1,
    'switch-off'    => 1,
    'switch-custom' => 1,
),
),
    '2' => array(
    'alt'     => 'Design 2',
    'img'     => ReduxFramework::$_url . '../presets/preset-2.png',
    'presets' => array(
    'switch-on'     => 1,
    'switch-off'    => 1,
    'switch-custom' => 1,
),
),
),
), array(
    'id'      => 'upgrdade_txt',
    'type'    => 'raw',
    'content' => $upgrade_txt,
) ),
) );
// -> START Basic Fields
Redux::setSection( $opt_name, array(
    'title'            => __( 'Settings', 'fuse-social-floating' ),
    'id'               => 'geneal_st',
    'customizer_width' => '400px',
    'icon'             => 'el el-cogs',
) );
Redux::setSection( $opt_name, array(
    'title'      => __( 'General Settings', 'fuse-social-floating' ),
    'id'         => 'geneal_st-Sortable',
    'subsection' => true,
    'fields'     => array(
    array(
    'id'      => 'linksnewtab',
    'type'    => 'switch',
    'title'   => __( 'Open links new tab', 'fuse-social-floating' ),
    'default' => '1',
),
    array(
    'id'      => 'chnage_vertical_pos',
    'type'    => 'raw',
    'content' => '<a href="' . fs_fs()->get_upgrade_url() . '"><img src="' . ReduxFramework::$_url . '../presets/upgrade_vertical.png" /></a><div class="upgrade_now_cn"><a href="' . fs_fs()->get_upgrade_url() . '"><strong>Upgrade now!</strong> to unlock this feature.</a></div>',
),
    array(
    'id'    => 'animation_on_hover',
    'type'  => 'switch',
    'title' => __( 'Animation on hover', 'fuse-social-floating' ),
),
    array(
    'id'      => 'animate_sec',
    'type'    => 'text',
    'title'   => __( 'Animation Speed', 'fuse-social-floating' ),
    'default' => 0.5,
),
    array(
    'id'      => 'shadow',
    'type'    => 'switch',
    'title'   => __( "Don't use shadow in icons", 'fuse-social-floating' ),
    'default' => 1,
),
    array(
    'id'    => 'change_color',
    'type'  => 'switch',
    'title' => __( "Change icon color on hover - For Custom Background", 'fuse-social-floating' ),
),
    array(
    'id'          => 'change_color',
    'type'        => 'color',
    'title'       => __( "Use custom background color", 'fuse-social-floating' ),
    'transparent' => false,
),
    array(
    'id'      => 'position',
    'type'    => 'select',
    'title'   => __( "Position", 'fuse-social-floating' ),
    'options' => array(
    'left'  => 'Left Side',
    'right' => 'Right Side',
),
    'default' => 'left',
),
    array(
    'id'      => 'size',
    'type'    => 'select',
    'title'   => __( "Icon Size", 'fuse-social-floating' ),
    'options' => array(
    '48' => 'Large',
    '32' => 'Medium',
    '24' => 'Small',
),
    'default' => '48',
)
),
) );
Redux::setSection( $opt_name, array(
    'title'      => __( 'Conditional Settings', 'fuse-social-floating' ),
    'id'         => 'conditional_st-Sortable',
    'subsection' => true,
    'fields'     => array( array(
    'id'    => 'mobile',
    'type'  => 'switch',
    'title' => __( "Disable for mobile", 'fuse-social-floating' ),
), array(
    'id'      => 'conditional_st',
    'type'    => 'raw',
    'content' => '<a href="' . fs_fs()->get_upgrade_url() . '"><img class="upgrade_by_img" src="' . ReduxFramework::$_url . '../presets/cond.png" /></a>',
) ),
) );
// -> START Basic Fields
Redux::setSection( $opt_name, array(
    'title'            => __( 'Analytics', 'fuse-social-floating' ),
    'id'               => 'anyltics_st',
    'customizer_width' => '400px',
    'icon'             => 'el el-graph',
) );

$fuse_click_data = unserialize( get_option( 'fuse_click_data' ) );
$alldt = "";
if(!empty($fuse_click_data)){
foreach ( $fuse_click_data as $fuse_single_dt => $fuse_si_val ) {
    $alldt .= '{
            name: "' . $fuse_single_dt . '",
            data: [' . $fuse_si_val . ']
        },';
}
}
$html_charts = '
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>

    <div id="container"></div>
    <script>
    Highcharts.chart("container", {
        chart: {
            type: "column",
            zoomType:"x"
        },
        title: {
            text: "Social Link Clicks Analytics"
        },

        subtitle: {
            text: ""
        },
        yAxis: {
            title: {
                text: "Number of Clicks"
            }
        },
        legend: {
            layout: "vertical",
            align: "right",
            verticalAlign: "middle"
        },

        series: [
            ' . $alldt . '
        ],

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 900
                },
                chartOptions: {
                    legend: {
                        layout: "horizontal",
                        align: "center",
                        verticalAlign: "bottom"
                    }
                }
            }]
        }

    });
    </script>
    ';
Redux::setSection( $opt_name, array(
    'title'      => __( 'Analytics', 'fuse-social-floating' ),
    'id'         => 'anyltics-Sortable',
    'subsection' => true,
    'fields'     => array( array(
    'id'      => 'anyltics',
    'type'    => 'raw',
    'content' => '<a href="' . fs_fs()->get_upgrade_url() . '"><img class="upgrade_by_img" src="' . ReduxFramework::$_url . '../presets/an_social.png" /></a>',
) ),
) );
// -> START Basic Fields
Redux::setSection( $opt_name, array(
    'title'            => __( 'Support', 'fuse-social-floating' ),
    'id'               => 'support_st',
    'customizer_width' => '400px',
    'icon'             => 'el el-heart',
) );
Redux::setSection( $opt_name, array(
    'title'      => __( 'Support', 'fuse-social-floating' ),
    'id'         => 'support-Sortable',
    'subsection' => true,
    'fields'     => array( array(
    'id'      => 'support_main',
    'type'    => 'raw',
    'content' => $support_main,
) ),
) );

if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
    $section = array(
        'icon'   => 'el el-list-alt',
        'title'  => __( 'Documentation', 'fuse-social-floating' ),
        'fields' => array( array(
        'id'           => '17',
        'type'         => 'raw',
        'markdown'     => true,
        'content_path' => dirname( __FILE__ ) . '/../README.md',
    ) ),
    );
    Redux::setSection( $opt_name, $section );
}

/*
 * <--- END SECTIONS
 */
/*
 *
 * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
 *
 */
/*
 *
 * --> Action hook examples
 *
 */
// If Redux is running as a plugin, this will remove the demo notice and links
//add_action( 'redux/loaded', 'remove_demo' );
// Function to test the compiler hook and demo CSS output.
// Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
//add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);
// Change the arguments after they've been declared, but before the panel is created
//add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );
// Change the default value of a field after it's been set, but before it's been useds
//add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );
// Dynamically add a section. Can be also used to modify sections/fields
//add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');
/**
 * This is a test function that will let you see when the compiler hook occurs.
 * It only runs if a field    set with compiler=>true is changed.
 * */
if ( !function_exists( 'compiler_action' ) ) {
    function compiler_action( $options, $css, $changed_values )
    {
        echo  '<h1>The compiler hook has run!</h1>' ;
        echo  "<pre>" ;
        print_r( $changed_values );
        // Values that have changed since the last save
        echo  "</pre>" ;
        //print_r($options); //Option values
        //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
    }

}
/**
 * Custom function for the callback validation referenced above
 * */
if ( !function_exists( 'redux_validate_callback_function' ) ) {
    function redux_validate_callback_function( $field, $value, $existing_value )
    {
        $error = false;
        $warning = false;
        //do your validation
        
        if ( $value == 1 ) {
            $error = true;
            $value = $existing_value;
        } elseif ( $value == 2 ) {
            $warning = true;
            $value = $existing_value;
        }
        
        $return['value'] = $value;
        
        if ( $error == true ) {
            $field['msg'] = 'your custom error message';
            $return['error'] = $field;
        }
        
        
        if ( $warning == true ) {
            $field['msg'] = 'your custom warning message';
            $return['warning'] = $field;
        }
        
        return $return;
    }

}
/**
 * Custom function for the callback referenced above
 */
if ( !function_exists( 'redux_my_custom_field' ) ) {
    function redux_my_custom_field( $field, $value )
    {
        print_r( $field );
        echo  '<br/>' ;
        print_r( $value );
    }

}
/**
 * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
 * Simply include this function in the child themes functions.php file.
 * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
 * so you must use get_template_directory_uri() if you want to use any of the built in icons
 * */
if ( !function_exists( 'dynamic_section' ) ) {
    function dynamic_section( $sections )
    {
        //$sections = array();
        $sections[] = array(
            'title'  => __( 'Section via hook', 'fuse-social-floating' ),
            'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'fuse-social-floating' ),
            'icon'   => 'el el-paper-clip',
            'fields' => array(),
        );
        return $sections;
    }

}
/**
 * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
 * */
if ( !function_exists( 'change_arguments' ) ) {
    function change_arguments( $args )
    {
        //$args['dev_mode'] = true;
        return $args;
    }

}
/**
 * Filter hook for filtering the default value of any given field. Very useful in development mode.
 * */
if ( !function_exists( 'change_defaults' ) ) {
    function change_defaults( $defaults )
    {
        $defaults['str_replace'] = 'Testing filter hook!';
        return $defaults;
    }

}
/**
 * Removes the demo link and the notice of integrated demo from the redux-framework plugin
 */
if ( !function_exists( 'remove_demo' ) ) {
    function remove_demo()
    {
        // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
        
        if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
            remove_filter(
                'plugin_row_meta',
                array( ReduxFrameworkPlugin::instance(), 'plugin_metalinks' ),
                null,
                2
            );
            // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
            remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
        }
    
    }

}