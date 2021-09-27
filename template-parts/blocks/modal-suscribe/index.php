<?php
$visited=get_option('visited');
if($visited=='0') {
?>
<div id="openModal" class="modalDialog">
	<div class="modalContainer" style="background-image:url('<?php echo get_site_url(); ?>/wp-content/themes/generatepress_child/img/background-popup.png');">
		<a onClick="hideModal()" class="close">X</a>
        <div>
		    <h1><?php echo get_field("modal_title"); ?></h1>
            <h2><?php echo get_field("modal_description"); ?></h2>
            <?php Echo do_shortcode ("[mc4wp_form id=526]");?>
            <?php Echo do_shortcode ("[mc4wp_form id=526]");?>
        </div>
    </div>
</div>
<?php } ?>