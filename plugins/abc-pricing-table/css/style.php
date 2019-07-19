	<style>
		.pricingTable_<?php echo $apt_id; ?> > .pricingTable-header_<?php echo $apt_id; ?> {
			color: <?php echo $heading_text_color; ?>;
		}
		.heading-background_<?php echo $apt_id; ?> {
			background: <?php echo $heading_background_color; ?>;
		}
		.pricingTable_<?php echo $apt_id; ?>:hover .heading {
			background-color: <?php echo $background_hover_color; ?>;
		}
		
		.btn-block_<?php echo $apt_id; ?> {
			background: <?php echo $button_color; ?> !important;
		}
		.pricingTable_<?php echo $apt_id; ?> .btn-block_<?php echo $apt_id; ?>:hover {
			background-color: <?php echo $button_hover_color; ?> !important;
		}
		.btn-block_<?php echo $apt_id; ?> {
			color: <?php echo $button_heading_color; ?> !important;
		}
		.pricingContent > ul > li:before{
			color: <?php echo $heading_background_color; ?>;
		}
		.active .pricingContent > ul > li:before{
			color: <?php echo $feature_heading_background_color; ?>;
		}	
		.pricingTable_<?php echo $apt_id; ?> {
			margin-top: 10px;
			margin-bottom: 10px;
		}
		
		
		
	</style>