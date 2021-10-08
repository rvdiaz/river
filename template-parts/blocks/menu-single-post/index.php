<div class="single-blog-menu">
    <div class="single-blog-menu-button">
        <div class="container-icon">
  		    <a class="openCategoriesButton" onclick="openCategories()">
    	        <svg width="40" height="23" id="icoOpen">
        		    <path d="M0,3 55,3" stroke="#666666" stroke-width="3"/>
        		    <path d="M0,12 55,12" stroke="#666666" stroke-width="3"/>
        		    <path d="M0,21 55,21" stroke="#666666" stroke-width="3"/>
			    </svg>
		    </a>
        </div>
        <a class="single-blog-title-menu-cat" href="<?php get_site_url();?>/our-blog">View more</a>
    </div>
    <div id="single-blog-cat-menu" class="single-cat-menu-container">
        <ul class="single-cat-menu">
            <?php
            $categories = get_categories( array(
                'orderby' => 'name',
                'order'   => 'DESC'
                ) );
            foreach( $categories as $category ){ 
            $argsPost = array(
		        'post_type'=> 'post',
		        'order'    => 'ASC',
		        'category_name'=> $category->name
		    );
            $the_query_post = new WP_Query( $argsPost );
	        if($the_query_post->have_posts()){ ?>  
            <p>
                <a href="<?php get_site_url();?>/our-blog/?category=<?php echo $category->cat_ID; ?>"><?php echo $category->name; ?></a>
            </p>
            <?php }} ?>
        </ul>
    </div>
</div>