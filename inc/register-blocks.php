<?php
acf_register_block_type(array(
    'name'              => 'blog-filters',
    'title'             => __('blog filters'),
    'description'       => __('blog'),
    'render_template'   => 'template-parts/blocks/blog-post/index.php',
    'icon'              => 'admin-page',
    'keywords'          => array('blog'),
    'category' => 'widgets'
));

