<?php
/**
 * GeneratePress child theme functions and definitions.
 *
 * Add your custom PHP in this file.
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */
require_once( get_stylesheet_directory(). '/inc/register-blocks.php' ); ?> 

add_filter('generate_typography_default_fonts',function($fonts){
    $fonts[]='Avenir';
    $fonts[]='Avenir-Book';
    $fonts[]='Avenir-Black';
    $fonts[]='Avenir-Heavy';
    $fonts[]='Avenir-Light';
    return $fonts;
});