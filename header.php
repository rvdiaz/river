<?php
/**
 * The template for displaying the header.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
if(!get_option('visited')){
    add_option('visited','');
} 
if(!isset($_COOKIE["visited"])){
    update_option('visited','0');
    setcookie('visited',true);
} else {
    update_option('visited','1');
} 

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <style>
        @font-face{
            font-family:'Avenir';
            src:url('<?php echo get_site_url();?>/wp-content/uploads/fonts/Avenir.ttc') format('truetype');
        }
        @font-face{
            font-family:'Avenir-Book';
            src:url('<?php echo get_site_url();?>/wp-content/uploads/fonts/Avenir-Book.woff') format('truetype');
        }
        @font-face{
            font-family:'Avenir-Black';
            src:url('<?php echo get_site_url();?>/wp-content/uploads/fonts/Avenir-Black.woff') format('truetype');
        }
        @font-face{
            font-family:'Avenir-Heavy';
            src:url('<?php echo get_site_url();?>/wp-content/uploads/fonts/Avenir-Heavy.woff') format('truetype');
        }
        @font-face{
            font-family:'Avenir-Light';
            src:url('<?php echo get_site_url();?>/wp-content/uploads/fonts/Avenir-Light.woff') format('truetype');
        }
        @font-face{
            font-family:'Avenir-Medium';
            src:url('<?php echo get_site_url();?>/wp-content/uploads/fonts/Avenir-Medium.woff') format('truetype');
        }
        @font-face{
            font-family:'Bickham-Script-Pro';
            src:url('<?php echo get_site_url();?>/wp-content/uploads/fonts/BickhamScriptPro-Regular.woff') format('truetype');
        }
        @font-face{
            font-family:'Gotham-Book';
            src:url('<?php echo get_site_url();?>/wp-content/uploads/fonts/Gotham-Book.woff2') format('truetype');
        }
        @font-face{
            font-family:'Gotham-Medium';
            src:url('<?php echo get_site_url();?>/wp-content/uploads/fonts/Gotham-Medium.woff') format('truetype');
        }
        .slider-home .kt-blocks-post-grid-item-inner{
            background-image:url('<?php echo get_site_url(); ?>/wp-content/themes/generatepress_child/img/popup-slider-home.png');
        }
        .grid-blog-desktop .kt-blocks-post-grid-item-inner {
            background-image:url('<?php echo get_site_url(); ?>/wp-content/themes/generatepress_child/img/poupup-grid-home.png');
        }
        .carousel-services .kt-post-slider-item {
            background-image:url('<?php echo get_site_url(); ?>/wp-content/themes/generatepress_child/img/popup-slider-home.png');
        }
        .slider-shop-product .slick-prev{
            background-image:url('<?php echo get_site_url(); ?>/wp-content/themes/generatepress_child/img/arrow-left.png') !important;
        }
        .slider-shop-product .slick-next{
            background-image:url('<?php echo get_site_url(); ?>/wp-content/themes/generatepress_child/img/arrow-right.png') !important;
        }
        .service-post-separator .kt-blocks-post-grid-item-inner {
            background-image:url('<?php echo get_site_url(); ?>/wp-content/themes/generatepress_child/img/popup-slider-home.png');
        }
        .service-post-separator .separator .logo {
            background-image:url('<?php echo get_site_url(); ?>/wp-content/themes/generatepress_child/img/logo_mark.png');
        }
        .single-service .text-single-service {
            background-image:url('<?php echo get_site_url(); ?>/wp-content/themes/generatepress_child/img/background-single-services.png');
        }    
        .grid-portfolio .title-portfolio {
            background-image:url('<?php echo get_site_url(); ?>/wp-content/themes/generatepress_child/img/background-blog-title.png');
        }
        .main-navigation .menu-toggle {
            background-image:url('<?php echo get_site_url(); ?>/wp-content/themes/generatepress_child/img/menu-toggle.png');
        } 
        @media (max-width:768px){
            .slider-shop-product .slick-prev{
                background-image:url('<?php echo get_site_url(); ?>/wp-content/themes/generatepress_child/img/arrow-left-mobile.png') !important;
            }
            .slider-shop-product .slick-next{
                background-image:url('<?php echo get_site_url(); ?>/wp-content/themes/generatepress_child/img/arrow-right-mobile.png') !important;
            }
        }
        @media (max-width:992px) {
            .carousel-magazine-home .slick-prev {
                background-image: url('<?php echo get_site_url(); ?>/wp-content/themes/generatepress_child/img/arrow-left-mobile.png') !important;
            }

            .carousel-magazine-home .slick-next {
                background-image: url('<?php echo get_site_url(); ?>/wp-content/themes/generatepress_child/img/arrow-right-mobile.png') !important;
            }
        }
        @media (max-width:900px){
            .carousel-services .slick-prev {
                background-image:url('<?php echo get_site_url(); ?>/wp-content/themes/generatepress_child/img/arrow-left-mobile.png') !important;
            }
            .carousel-services .slick-next {
                background-image:url('<?php echo get_site_url(); ?>/wp-content/themes/generatepress_child/img/arrow-right-mobile.png') !important;
            }
        }
        @media (max-width: 762px){
            .carousel-follow-rivers .slick-prev {
                background-image:url('<?php echo get_site_url(); ?>/wp-content/themes/generatepress_child/img/arrow-left-mobile.png') !important;
            }
            .carousel-follow-rivers .slick-next {
                background-image:url('<?php echo get_site_url(); ?>/wp-content/themes/generatepress_child/img/arrow-right-mobile.png') !important;
            }
        }
        .first-blog-grid
        .kt-blocks-post-readmore,
        .second-blog-grid
        .kt-blocks-post-readmore
        {
            background-image:url('<?php echo get_site_url(); ?>/wp-content/themes/generatepress_child/img/background-readMore.png');
        }
        .buttonSearchBlog{
            background-image:url('<?php echo get_site_url(); ?>/wp-content/themes/generatepress_child/img/searchIcon.png');
        }
        .title-background{
            background-image:url('<?php echo get_site_url(); ?>/wp-content/themes/generatepress_child/img/background-blog-title.png');
        }
        .loadingGift{
            background-image:url('<?php echo get_site_url(); ?>/wp-content/themes/generatepress_child/img/loading-blogs.gif');
        }
    </style>
    <?php 
    wp_head(); 
    ?>
</head>

<body <?php body_class(); ?> <?php generate_do_microdata( 'body' ); ?>>
<?php

/**
 * wp_body_open hook.
 *
 * @since 2.3
 */
do_action( 'wp_body_open' ); // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound -- core WP hook.

/**
 * generate_before_header hook.
 *
 * @since 0.1
 *
 * @hooked generate_do_skip_to_content_link - 2
 * @hooked generate_top_bar - 5
 * @hooked generate_add_navigation_before_header - 5
 */
do_action( 'generate_before_header' );

/**
 * generate_header hook.
 *
 * @since 1.3.42
 *
 * @hooked generate_construct_header - 10
 */
do_action( 'generate_header' );

/**
 * generate_after_header hook.
 *
 * @since 0.1
 *
 * @hooked generate_featured_page_header - 10
 */
do_action( 'generate_after_header' );
?>

<div id="page" <?php generate_do_element_classes( 'page' ); ?>>
    <?php
    /**
     * generate_inside_site_container hook.
     *
     * @since 2.4
     */
    do_action( 'generate_inside_site_container' );
    ?>
    <div id="content" class="site-content">
<?php
/**
 * generate_inside_container hook.
 *
 * @since 0.1
 */
do_action( 'generate_inside_container' );
