<?php
/**
 * Created by PhpStorm.
 * User: PAPO
 * Date: 9/17/2021
 * Time: 6:23 PM
 */
?>
<?php
$args = array(
    'post_type'=> 'portfolio',
    'order'    => 'ASC'
);
$the_query = new WP_Query( $args );
?>
<section class="container portfolio-page">
<?php if($the_query->have_posts() ) :
    while ( $the_query->have_posts() ) :
        $the_query->the_post();?>
        <div class="grid-portfolio">
            <div class="img-portfolio">
                <?php if( has_post_thumbnail() ) {
                    the_post_thumbnail( 'post-thumbnails', array('class' => 'image-section__image' ) );
                } ?>
                <input type="hidden" id="portfolioId">
            </div>
            <div class="portfolio-inner">
                <header class="title-portfolio">
                    <a class="title-port"><?php echo the_title(); ?></a>
                    <input type="hidden" id="portfolioId">
                </header>
            </div>
        </div>
        <?php
    endwhile;
    wp_reset_postdata();
else:
endif;
?>
    <input type="hidden" id="portfolioId">
</section>