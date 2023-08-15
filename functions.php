<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array(  ) );
		
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

// END ENQUEUE PARENT ACTION


add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
// Disables the block editor from managing widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );


function chld_thm_font() {
	wp_enqueue_style( 'twentytwenty-block-fonts', 'https://use.typekit.net/cuu3aow.css' );
	wp_enqueue_style( 'twentytwenty-block-fonts2', get_template_directory_uri() . '/assets/fonts/budge/stylesheet.css' );
	wp_enqueue_style( 'twentytwenty-block-flexslider-css', 'https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/flexslider.css' );
	wp_enqueue_script('twentytwenty-block-flexslider-js', 'https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/jquery.flexslider.js', array('jquery'),'1.1', true);
}
add_action( 'wp_enqueue_scripts', 'chld_thm_font' );



if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'Footer Settings',
        'menu_title'    => 'Footer',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));   
    
}




# Remove query strings from static resources
function remove_cssjs_ver( $src ) {
 if( strpos( $src, '?ver=' ) )
 $src = remove_query_arg( 'ver', $src );
 return $src;
}
add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );

# https://wordpress.stackexchange.com/questions/130325/how-to-remove-wordpress-version-from-the-admin-footer
function my_footer_shh() {
  if ( ! current_user_can('manage_options') ) { // 'update_core' may be more appropriate
      remove_filter( 'update_footer', 'core_update_footer' );
  }
}
add_action( 'admin_menu', 'my_footer_shh' );


# https://premium.wpmudev.org/blog/hide-the-wordpress-update-notification/
	function hide_update_notice_to_all_but_admin_users()
	{
	    if (!current_user_can('update_core')) {
	        remove_action( 'admin_notices', 'update_nag', 3 );
	    }
	}
	add_action( 'admin_head', 'hide_update_notice_to_all_but_admin_users', 1 );

///////////////////////////////////////
function remove_editor() {
  remove_post_type_support('page', 'editor');
}
add_action('admin_init', 'remove_editor');

////////////////////////////////////
function add_slug_body_class( $classes ) {
global $post;
if ( isset( $post ) ) {
$classes[] = $post->post_type . '-' . $post->post_name;
}
return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );


