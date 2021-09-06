<?php
/**
 * The template for displaying the footer.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

	</div>
</div>

<?php
/**
 * generate_before_footer hook.
 *
 * @since 0.1
 */
do_action( 'generate_before_footer' );
?>

<div <?php generate_do_element_classes( 'footer' ); ?>>
	<?php
	/**
	 * generate_before_footer_content hook.
	 *
	 * @since 0.1
	 */
	do_action( 'generate_before_footer_content' );

	/**
	 * generate_footer hook.
	 *
	 * @since 1.3.42
	 *
	 * @hooked generate_construct_footer_widgets - 5
	 * @hooked generate_construct_footer - 10
	 */
	do_action( 'generate_footer' );

	/**
	 * generate_after_footer_content hook.
	 *
	 * @since 0.1
	 */
	do_action( 'generate_after_footer_content' );
	?>
</div>

<?php
/**
 * generate_after_footer hook.
 *
 * @since 2.1
 */
do_action( 'generate_after_footer' );

wp_footer();
?>
<script src="<?php echo get_site_url(); ?>/wp-content/themes/generatepress_child/js/main.js"></script>
<script>
if(document.getElementsByClassName("slider-shop-product")[0]){
	let currentItem="";
	let productTitle="";
	let currentItemUrl="";
	const itemSliderShop=document.getElementsByClassName("slider-shop-product")[0].children[0].children;
	<?php 
	$args=array(
		'post_type'=>'product_post_type',
		'order'    =>'ASC'
	);
	$the_query=new WP_Query($args); 
	if($the_query->have_posts()){
	while($the_query->have_posts()){
		$the_query->the_post();
		?>
		productTitle="<?php echo get_the_title(); ?>"
		currentItem=findItemByTitle(productTitle,itemSliderShop);
		currentItemUrl="<?php echo get_post_meta(get_the_ID(),'link',true) ?>";
		if(currentItem){
			if(currentItemUrl){
				currentItem.setAttribute("href",currentItemUrl);
				currentItem.setAttribute("target","_blank");
			}
			else
				currentItem.setAttribute("href","#");
		} 
	 <?php }}
	 ?>}
</script>
</body>
</html>
