<?php
/**
 * The template for displaying the header.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
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
            src:url('<?php echo get_site_url();?>/wp-content/uploads/fonts/AvenirLTStd-Book.otf') format('truetype');
        }
        @font-face{
            font-family:'Avenir-Black';
            src:url('<?php echo get_site_url();?>/wp-content/uploads/fonts/AvenirLTStd-Book.otf') format('truetype');
        }
        @font-face{
            font-family:'Avenir-Heavy';
            src:url('<?php echo get_site_url();?>/wp-content/uploads/fonts/AvenirLTStd-Heavy.otf') format('truetype');
        }
        @font-face{
            font-family:'Avenir-Light';
            src:url('<?php echo get_site_url();?>/wp-content/uploads/fonts/AvenirLTStd-Light.otf') format('truetype');
        }
        .slider-home .kt-blocks-post-grid-item-inner{
            background-image:url('<?php echo get_site_url(); ?>/wp-content/themes/generatepress_child/img/popup-slider-home.png');
        }
		.carousel-services .kt-post-slider-item {
			background-image:url('<?php echo get_site_url(); ?>/wp-content/themes/generatepress_child/img/popup-slider-home.png');
		}
    </style>
	<?php wp_head(); ?>
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
