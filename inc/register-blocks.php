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
acf_register_block_type(array(
    'name'              => 'portfolio-block',
    'title'             => __('portfolio'),
    'description'       => __('portfolio block page'),
    'render_template'   => 'template-parts/blocks/portfolio/index.php',
    'icon'              => 'admin-comments',
    'keywords'          => array('portfolio'),
    'category' => 'widgets'
));

acf_register_block_type(array(
    'name'              => 'modal-suscribe',
    'title'             => __('modal suscribe'),
    'description'       => __('modal'),
    'render_template'   => 'template-parts/blocks/modal-suscribe/index.php',
    'icon'              => 'admin-page',
    'keywords'          => array('suscribe'),
    'category' => 'widgets'
));
acf_register_block_type(array(
    'name'              => 'form-blog-suscribe',
    'title'             => __('form blog suscribe'),
    'description'       => __('form blog suscribe'),
    'render_template'   => 'template-parts/blocks/blog-form/index.php',
    'icon'              => 'admin-page',
    'keywords'          => array('suscribe'),
    'category' => 'widgets'
));
acf_register_block_type(array(
    'name'              => 'menu-single-post',
    'title'             => __('menu category single post'),
    'description'       => __('menu category single post'),
    'render_template'   => 'template-parts/blocks/menu-single-post/index.php',
    'icon'              => 'admin-page',
    'keywords'          => array('menu','single post'),
    'category' => 'widgets'
));