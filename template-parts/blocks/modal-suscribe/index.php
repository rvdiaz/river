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
            <?php Echo do_shortcode ("[ctct form=1446 show_title=false]");?>
        </div>
    </div>
</div>
<?php } ?>