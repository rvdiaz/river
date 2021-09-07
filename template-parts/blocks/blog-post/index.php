<?php
    $args=array(
        'post_type'=>'blog_post',
        'order'=>'ASC'
    );
    $the_query=new WP_Query($args);
?>
<div class="wrapper-menu">
    <nav class="topnav">
        <div class="container-icon">
  		    <a class="openNavButton" onclick="toggleNav()">
    	        <svg width="55" height="23" id="icoOpen">
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
            <input type="search" class="searchBlog" placeholder="SEARCH"/>
            <button class="buttonSearchBlog">
            </button >
		</div>
	</nav>
</div>    
<div class="container-filter-blog">
    <div id="sideNavigation" class="sidenav">
	    <div class="sidenavContainer">
		    <a>Categoria 1</a>
            <a>Categoria 1</a>
            <a>Categoria 1</a>
	    </div>	
    </div>
    <div class="gridBlogs">
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
                    <h1><?php echo get_the_title(); ?></h1>
                </div>       
            </div>
        <?php } ?>
    </div>
</div>
