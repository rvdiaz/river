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
                '.get_the_post_thumbnail(get_the_ID(),'thumbnail',$attr='').'
            </div>
            <div class="title-blog-wrap">
                <div class="title-background">
                    <a href="'.get_the_permalink().'">'.get_the_title().'</a>
                </div>
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
                '.get_the_post_thumbnail($blog->ID,'thumbnail',$attr='').'
            </div>
            <div class="title-blog-wrap">
                <div class="title-background">
                    <a href="'.get_the_permalink($blog->ID).'">'.get_the_title($blog->ID).'</a>
                </div>
            </div>
        </div>';
    }}else
    echo '<h1>No results found for your search</h1>';
    wp_die();
}
