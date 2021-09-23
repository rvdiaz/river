<?php
/**
 * GeneratePress child theme functions and definitions.
 *
 * Add your custom PHP in this file.
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */
require_once( get_stylesheet_directory(). '/inc/register-blocks.php' );

add_filter('generate_typography_default_fonts',function($fonts){
    $fonts[]='Avenir';
    $fonts[]='Avenir-Book';
    $fonts[]='Avenir-Black';
    $fonts[]='Avenir-Heavy';
    $fonts[]='Avenir-Light';
    $fonts[]='AvenirNextW06Bold';
    return $fonts;
});

function my_load_scripts() {
    wp_enqueue_script( 'my_js', get_theme_file_uri( 'js/main.js'), array('jquery') );

    wp_localize_script( 'my_js', 'ajax_var', array(
        'url'    => admin_url( 'admin-ajax.php' ),
        'nonce'  => wp_create_nonce( 'my-ajax-nonce' ),
        'action' => 'blog-list'
    ) );
}
add_action( 'wp_enqueue_scripts', 'my_load_scripts' );

add_action('wp_ajax_nopriv_blog-list-byCategory', 'getBlogByCategory');
add_action('wp_ajax_blog-list-byCategory', 'getBlogByCategory');

function getBlogByCategory(){
	$category_name=$_POST['category_name'];
    $argsPost = array(
		'post_type'=> 'blog',
		'order'    => 'ASC',
		'category_name'=> $category_name
		);
    $the_query_post = new WP_Query( $argsPost );
        while($the_query_post->have_posts()){
        $the_query_post->the_post();
        echo 
        '<div class="gridBlogItem">
            <div class="image-blog-wrap">
                '.get_the_post_thumbnail(get_the_ID(),'full',$attr='').'
            </div>
            <div class="title-blog-wrap">
                <div class="title-background">
                    <a href="'.get_the_permalink() .'">'. get_the_title() .'</a>
                </div>
            </div>
            <div class="infoBlogMobile">
                <p class="blog-category">'. get_the_category()[0]->name .'</p>
                <a href="'. get_the_permalink() .'" class="title-description-blog">'. get_the_title() .'/'. get_the_excerpt() .'</a>
            </div>  
        </div>';
    }
    wp_die();
}

add_action('wp_ajax_nopriv_blog-list-bySearch', 'getBlogBySearch');
add_action('wp_ajax_blog-list-bySearch', 'getBlogBySearch');

function getBlogBySearch(){
	$search_name=$_POST['search_name'];
    global $wpdb;
    $query="SELECT ID FROM wp_posts WHERE post_type = 'blog' AND wp_posts.post_title LIKE '$search_name%'";
    $blogResults=$wpdb-> get_results($query);
    if($blogResults){
    foreach($blogResults as $blog){
        echo 
        '<div class="gridBlogItem">
            <div class="image-blog-wrap">
                '. get_the_post_thumbnail($blog->ID,'full',$attr='') .'
            </div>
            <div class="title-blog-wrap">
                <div class="title-background">
                    <a href="'. get_the_permalink($blog->ID) .'">'. get_the_title($blog->ID) .'</a>
                </div>
            </div>
            <div class="infoBlogMobile">
                <p class="blog-category">'. get_the_category($blog->ID)[0]->name .'</p>
                <a href="'. get_the_permalink($blog->ID) .'" class="title-description-blog">'. get_the_title($blog->ID) .'/'. get_the_excerpt($blog->ID) .'</a>
            </div>   
        </div>';
    }}else
    echo '<h1 class="notFoundText">No results found for your search</h1>';
    wp_die();
}

add_action('wp_ajax_nopriv_show_portfolio_popup', 'show_portfolio_popup');
add_action('wp_ajax_show_portfolio_popup', 'show_portfolio_popup');

function show_portfolio_popup(){
	$portfolio_id=$_POST['portfolio_id'];
    $list_images=get_post_meta($portfolio_id,'list_images',true);
    $first=0;
    $firstImage=get_post_meta($portfolio_id,'list_images_'.$first.'_image',true);
    $items='';
    for($i=0;$i<$list_images;$i++){
        $image_id=get_post_meta($portfolio_id,'list_images_'.$i.'_image',true);
        $items.='<div class="item image_portfolio_item" onclick="update_portfolio_image(event)"><img src="'.wp_get_attachment_image_src($image_id,'full')[0].'"/></div>';
    }
    $result=array(
        '<img id="principal_portfolio_img" src="'.wp_get_attachment_image_src($firstImage,'full')[0].'"/>',
        $items,
    );
    echo json_encode( $result);
    wp_die();
}