<style>
.pricingTable_<?php echo $apt_id; ?>{
    text-align: center;
    margin-top: 10px;
	margin-bottom: 10px;
    border: 1px solid #dce2ed;
}
.active .pricingTable-header_<?php echo $apt_id; ?> > .heading_<?php echo $apt_id; ?>{
	background: <?php echo $feature_heading_background_color; ?> !important;
	color: <?php echo $feature_heading_text_color; ?>;
}
.active .heading_<?php echo $apt_id; ?> > h3{
	color: <?php echo $feature_heading_text_color; ?>;
}
.active:hover .pricingTable-header_<?php echo $apt_id; ?> .heading_<?php echo $apt_id; ?>{
	background-color: <?php echo $feature_background_hover_color; ?>!important;
}
.active .btn-block_<?php echo $apt_id; ?> {
	background: <?php echo $feature_button_color; ?> !important;
}
.active .btn-block_<?php echo $apt_id; ?> {
	color: <?php echo $feature_button_heading_color; ?> !important;
}
.active .btn-block_<?php echo $apt_id; ?>:hover {
	background-color: <?php echo $feature_button_hover_color; ?> !important;
}
.pricingTable-header_<?php echo $apt_id; ?> > .heading_<?php echo $apt_id; ?>{ 
    display: block;
    padding: 12px 0;
    background: <?php echo $heading_background_color; ?>;
    border-radius: 0 0 10px 10px;
    width:60%;
    margin: 0 auto;
    position: relative;
    bottom: 10px;
}
.heading_<?php echo $apt_id; ?> > h3{
	color: <?php echo $heading_text_color; ?>;
}
.pricingTable-header_<?php echo $apt_id; ?> .heading_<?php echo $apt_id; ?>:hover{
	background-color: <?php echo $background_hover_color; ?>!important;
}
.heading_<?php echo $apt_id; ?> > h3{
    margin: 0;
	font-size: 15px;
	font-weight: bold;
}
.pricingTable-header_<?php echo $apt_id; ?> > .price-value_<?php echo $apt_id; ?>{
    display: block;
    padding: 25px 0;
    font-size: 50px;
	color: #333;
}
.price-value_<?php echo $apt_id; ?> > .mo_<?php echo $apt_id; ?>{
    font-size: 15px;
}
.price-value_<?php echo $apt_id; ?> > .currency_<?php echo $apt_id; ?>{
    position: relative;
    bottom: 20px;
    font-size: 25px;
    margin-right: 4px;
}

.pricingTable_<?php echo $apt_id; ?> > .pricingContent_<?php echo $apt_id; ?> > ul{
    list-style: none;
    padding: 0;
    margin-bottom: 0;
}
.pricingTable_<?php echo $apt_id; ?> > .pricingContent_<?php echo $apt_id; ?> > ul > li{
    padding: 15px 0;
    border-top: 1px solid #dce2ed;
    color:#818d9a;
}
.pricingTable_<?php echo $apt_id; ?> > .pricingContent_<?php echo $apt_id; ?> > ul > li:nth-child(odd){
    background: #F8F8F8;
}
.pricingTable-sign-up_<?php echo $apt_id; ?>{
    padding: 40px 0;
    border-top: 1px solid #dce2ed;
}
.pricingTable-sign-up_<?php echo $apt_id; ?> > .btn-block_<?php echo $apt_id; ?>{
    width: 50%;
    margin: 0 auto;
    text-decoration:none !important;
	background: <?php echo $button_color; ?>;
	color: <?php echo $button_heading_color; ?>;
    padding: 10px 0;
    transition: all 0.2s ease-in-out 0s;
}
.pricingTable-sign-up_<?php echo $apt_id; ?> > .btn-block_<?php echo $apt_id; ?>:hover{
    background-color: <?php echo $button_hover_color; ?>;
}

.active .heading_<?php echo $apt_id; ?>:after{
    content: "Sale";
    width: 50px;
    height:50px;
    background: <?php echo $feature_heading_background_color; ?>;
    display: block;
    position: absolute;
    top:53%;
    right: -25px;
    border-radius: 50%;
    border:4px solid #fff;
    line-height: 45px;
}
@media only screen and (max-width: 990px){
    .pricingTable{
        margin-bottom: 40px;
    }
}
</style>