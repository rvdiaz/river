<?php
    $singleBlogId=get_the_ID();
?>
<div class="single-blog-header">
    <div class="single-blog-featureImage">
        <?php echo the_post_thumbnail(); ?>
    </div>
    <div class="single-blog-info">
        <p class="single-blog-category"><?php echo get_the_category()[0]->name; ?></p>
        <p class="single-blog-title-description"><?php echo get_the_title(); ?> / <?php echo get_the_excerpt(); ?></p>
    </div>
</div>
<div class="single-blog-body">
    <div class="single-blog-menu">
        <div class="single-blog-menu-button">
            <div class="container-icon">
  		        <a class="openNavButton" onclick="">
    	            <svg width="40" height="23" id="icoOpen">
        		        <path d="M0,3 55,3" stroke="#666666" stroke-width="3"/>
        		        <path d="M0,12 55,12" stroke="#666666" stroke-width="3"/>
        		        <path d="M0,21 55,21" stroke="#666666" stroke-width="3"/>
			        </svg>
		        </a>
            </div>
        </div>
        <div class="single-blog-menu">
            <ul class="single-blog-accordion">
                <?php
                $categories = get_categories( array(
                    'orderby' => 'name',
                    'order'   => 'DESC'
                    ) );
                foreach( $categories as $category ){ 
                $argsPost = array(
		            'post_type'=> 'blog_post',
		            'order'    => 'ASC',
		            'category_name'=> $category->name
		        );
                $the_query_post = new WP_Query( $argsPost );
	            if($the_query_post->have_posts()){ ?> 
                <li><span onclick="openAccord(event)"><?php echo $category->name; ?></span>
                    <ul>
                        <?php 
                            while($the_query_post->have_posts()){ 
                            $the_query_post->the_post();
                        ?>
                        <li><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title();?></a></li>
                        <?php } ?>
                    </ul>
                <?php } ?>
                </li>  
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="single-blog-body-info">
        <div class="single-blog-paragraph-container">
            <p class="single-blog-paragraph"><?php echo get_post_meta($singleBlogId,'first_paragraph',true);  ?></p>
        </div>
        <div class="single-blog-body-image">
            <?php $imageBodyBlog=get_post_meta($singleBlogId,'imagen_blog',true);?>
            <img src="<?php echo wp_get_attachment_image_src($imageBodyBlog,'medium')[0];?>"/>
        </div>
        <div class="single-blog-paragraph-container">
            <p class="single-blog-paragraph"><?php echo get_post_meta($singleBlogId,'second_paragraph',true);  ?></p>
        </div>
    </div>
</div>