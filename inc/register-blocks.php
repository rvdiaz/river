<?php
acf_register_block_type(array(
    'name'              => 'services-post',
    'title'             => __('services post),
    'description'       => __('services'),
    'render_template'   => 'template-parts/blocks/services-post/index.php',
    'icon'              => 'admin-comments',
    'keywords'          => array('noticias', 'seccion'),
    'category' => 'widgets'

));

