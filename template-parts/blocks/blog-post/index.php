<?php
    $arrayCategoriesBlog=array();
    $args=array(
        'post_type'=>'blog_post',
        'order'=>'ASC'
    );
    $the_query=new WP_Query($args);
    $categories = get_categories( array(
        'orderby' => 'name',
        'order'   => 'DESC'
        ) );
    foreach( $categories as $category ) {
    $argsPost = array(
		'post_type'=> 'blog_post',
		'order'    => 'ASC',
		'category_name'=> $category->name
		);
    $the_query_post = new WP_Query( $argsPost );
	if($the_query_post->have_posts()){ 
        array_push($arrayCategoriesBlog,$category);
    }
    }
?>
<div class="wrapper-menu">
    <div class="topnav">
        <div class="container-icon">
  		    <a class="openNavButton" onclick="toggleNav()">
    	        <svg width="35" height="23" id="icoOpen">
        		    <path d="M0,3 55,3" stroke="#666666" stroke-width="3"/>
        		    <path d="M0,12 55,12" stroke="#666666" stroke-width="3"/>
        		    <path d="M0,21 55,21" stroke="#666666" stroke-width="3"/>
			    </svg>
		    </a>
            <p class="tittle-categories">
            CATEGORIES
            </p>
        </div>
        <div class="container-search">
            <div class="form-search">
                <div class="input-group">
                    <input class="searchBlog" oninput="filterByCharacter()" maxlength="128" placeholder="SEARCH" type="text" />
                    <span class="input-group-btn"><button onclick="toggleSearch()" class="buttonSearchBlog"></button></span>
                </div>
            </div>
        </div>
    </div>
</div>   
<div class="container-filter-blog">
    <div id="sideNavigation" class="sidenav">
	    <div class="sidenavContainer">
            <?php for($i=0;$i<count($arrayCategoriesBlog);$i++){ ?>
		    <button class="buttonCategoriesMenu" onclick="filterByCategory(event)"><?php echo $arrayCategoriesBlog[$i]->name ?>
            </button>
            <?php } ?>
	    </div>	
    </div>
    <div id="gridBlogs">
        <?php 
            if($the_query->have_posts())
            while($the_query->have_posts()){
            $the_query->the_post();
        ?>
            <div class="gridBlogItem">
                <div class="image-blog-wrap">
                    <?php echo the_post_thumbnail();?>
                </div>
                <div class="title-blog-wrap">
                    <div class="title-background">
                        <a href="<?php echo the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                    </div>
                </div>       
            </div>
        <?php } ?>
    </div>
</div>
