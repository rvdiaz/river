<?php
acf_register_block_type(array(
    'name'              => 'bloque-entrar',
    'title'             => __('Bloque entrar'),
    'description'       => __('bg-cta-section'),
    'render_template'   => 'template-parts/blocks/bg-cta-section/index.php',
    'icon'              => 'admin-comments',
    'keywords'          => array('panel', 'cta', 'card', 'article'),
    'category' => 'widgets'

));