<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

//js
wp_enqueue_script('jquery','jquery-ui-core');
wp_enqueue_script('apt-bootstrap-min-js', APT_PLUGIN_URL . 'js/bootstrap.min.js', array('jquery'), '' , false);
wp_enqueue_script('apt-bootstrap-iconset-min-js', APT_PLUGIN_URL . 'js/bootstrap-iconpicker-iconset-all.min.js', array('jquery'), '' , false);
wp_enqueue_script('apt-bootstrap-iconpicker-min-js', APT_PLUGIN_URL . 'js/bootstrap-iconpicker.min.js', array('jquery'), '' , false);

wp_enqueue_script( 'apt-color-picker-js', plugins_url('js/apt-color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
wp_enqueue_style( 'wp-color-picker' );


//css
wp_enqueue_style('apt-bootstrap-min-css', APT_PLUGIN_URL .'css/bootstrap.min.css');
wp_enqueue_style('apt-font-awesome-min-css', APT_PLUGIN_URL .'css/font-awesome.min.css');
wp_enqueue_style('apt-bootstrap-iconpicker-css', APT_PLUGIN_URL .'css/bootstrap-iconpicker.min.css');

 
wp_enqueue_style('apt-toogle-button-css', APT_PLUGIN_URL .'css/toogle-button.css');
wp_enqueue_style('apt-styles-css', APT_PLUGIN_URL .'css/styles.css');



// code

$pricing_post_settings = get_post_meta( $post->ID, 'apt_pricing_table_data_'.$post->ID, true);		


?>


	<ul class="nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#home"><?php _e('Pricing Table', APT_TXTDM); ?></a></li>
		<li><a data-toggle="tab" href="#menu1"><?php _e('Settings', APT_TXTDM); ?></a></li>
	</ul>

	<div class="tab-content">
		<div id="home" class="tab-pane fade in active">
			<div class="aad-btn text-center">
				<h3><?php _e('CLICK ON', APT_TXTDM); ?><strong><?php _e('ADD NEW BUTTON', APT_TXTDM); ?></strong> <?php _e('TO ADD NEW TABLE', APT_TXTDM); ?></h3>
				<button type="button" id="pricing_appending" class="btn-default" onclick="return add_new_column()" aria-hidden="true"><span class="dashicons dashicons-plus icon_new"></span> <?php _e('ADD COLUMN', APT_TXTDM); ?></button>
				<button type="button" id="pricing_shortcode" class="btn-default" data-toggle="modal" data-target="#myModal"><span class="dashicons dashicons-arrow-right-alt icon_new_short"></span> <?php _e('GET SHORTCODE', APT_TXTDM); ?></button>
			</div>
			<div style="font-size: 20px"> Note:[Features] Type "cross" for cross icon '<i class="fa fa-times"></i>'  and type "right" for right icon! '<i class="fa fa-check"></i>' </div> <p></p>
			<div id="pricing-container">
				<?php
				if(is_array($pricing_post_settings)) {
					$total_columns = count($pricing_post_settings['pricing_name']);
				} else { 
					$total_columns = 1;
				}
				//echo $total_columns;
				?>
				
			<input type="hidden" id="total_cols" name="total_cols" class="total_cols" value="<?php echo $total_columns; ?>">
				<?php
				if(is_array($pricing_post_settings)) {
					for($i = 0; $i < $total_columns; $i++) {
				?>	
				
				<div class="pri_main_div col-md-3 column_<?php echo $i; ?>">
					<div class="pri_head panel-heading">
						<div class="switch-field em_size_field col-md-6" data-toggle="tooltip" data-placement="top" title="This table Will be Featured" aria-hidden="true">
							<?php if(isset($pricing_post_settings['featured_button'][$i])) $featured_button = $pricing_post_settings['featured_button'][$i]; else $featured_button = "false"; ?>
							<input type="radio" name="featured_button[<?php echo $i; ?>]" id="featured_button1[<?php echo $i; ?>]" value="true" <?php if($featured_button == "true") echo "checked=checked"; ?>Featured>
								<label for="featured_button1[<?php echo $i; ?>]"><?php _e('Yes', APT_TXTDM); ?></label>
							<input type="radio" name="featured_button[<?php echo $i; ?>]" id="featured_button2[<?php echo $i; ?>]" value="false" <?php if($featured_button == "false") echo "checked=checked"; ?>>
								<label for="featured_button2[<?php echo $i; ?>]"><?php _e('No', APT_TXTDM); ?></label>
						</div>
						<i class="fa fa-times time" data-toggle="tooltip" data-placement="top" title="Delete table" aria-hidden="true" id="pri_delete"  onclick="return delete_column('column_<?php echo $i; ?>')"></i>
						<input type="text" id="pricing_name[]" class="text" name="pricing_name[]" placeholder="<?php _e('Name', APT_TXTDM); ?>"  value="<?php echo $pricing_post_settings['pricing_name'][$i]; ?>">
					</div>
					<hr class="pri_head_hr">
					<ul>
						<li>
							<input type="text" id="pricing_price" name="pricing_price[]" class="text" placeholder="<?php _e('Pricing', APT_TXTDM); ?>" value="<?php echo $pricing_post_settings['pricing_price'][$i]; ?>">
						</li>
						<li>
							<input type="text" id="pricing_plan" name="pricing_plan[]" class="text" placeholder="<?php _e('Pricing Plan', APT_TXTDM); ?>" value="<?php echo $pricing_post_settings['pricing_plan'][$i]; ?>">
						</li>
						<li class="features">
							<textarea type="text" id="pricing_features" name="pricing_features[]" class="text" placeholder="<?php _e('Pricing Features', APT_TXTDM); ?>" rows="7"><?php echo $pricing_post_settings['pricing_features'][$i]; ?></textarea>							</li>
						<li>
							<input type="text" id="pricing_btn_text" name="pricing_btn_text[]" class="text" placeholder="<?php _e('Button Text', APT_TXTDM); ?>" value="<?php echo $pricing_post_settings['pricing_btn_text'][$i]; ?>">	
						</li>
						<li>
							<input type="text" id="pricing_btn_url" name="pricing_btn_url[]" class="text" placeholder="<?php _e('Button Url', APT_TXTDM); ?>" value="<?php echo $pricing_post_settings['pricing_btn_url'][$i]; ?>">	
						</li>
					</ul>
				</div>
				<?php
					} // end of foreach
				} // end data check
				?>
		</div>	
	</div>	
	
	<!-- Setting-page-->

	<div id="menu1" class="tab-pane fade">
		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			<div class="panel panel-default">
				<div class="panel-heading icon-right" role="tab" id="heading1" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-controls="collapse1">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1"><i class="fa fa-chevron-down"></i>
						  <?php _e('Template & Icon Settings', APT_TXTDM); ?>
						</a>
					</h4>
				</div>
				<div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
					<div class="panel-body">
						<div id="pricing_table_template" class="row">
							<div class="bg-lower-title col-md-4"><?php _e('1. Select Pricing Template Design', APT_TXTDM); ?></div>
							<p></p>
							<?php if(isset($pricing_post_settings['pricing_table_design'])) $pricing_table_design = $pricing_post_settings['pricing_table_design']; else $pricing_table_design = 1; ?>
							<div class="col-md-4">
								<select id="pricing_table_design" name="pricing_table_design" class="form-control" style="margin-left: 15px; width: 300px;">
									<option value="1" <?php if($pricing_table_design == "1") echo "selected=selected"; ?>><?php _e('Templet 1', APT_TXTDM); ?></option>
									<option value="2" <?php if($pricing_table_design == "2") echo "selected=selected"; ?>><?php _e('Templet 2', APT_TXTDM); ?></option>
									<option value="3" <?php if($pricing_table_design == "3") echo "selected=selected"; ?>><?php _e('Templet 3', APT_TXTDM); ?></option>
									<option value="4" <?php if($pricing_table_design == "4") echo "selected=selected"; ?>><?php _e('Templet 4', APT_TXTDM); ?></option>
								</select>
							</div>
							<div class="img_preview">
								<img style="display:none;" src="<?php echo APT_PLUGIN_URL .'img/templet-1.png'; ?>" class="temp_1"/>
								<img style="display:none;" src="<?php echo APT_PLUGIN_URL .'img/templet-2.png'; ?>" class="temp_2"/>
								<img style="display:none;" src="<?php echo APT_PLUGIN_URL .'img/templet-3.png'; ?>" class="temp_3"/>
								<img style="display:none;" src="<?php echo APT_PLUGIN_URL .'img/templet-4.png'; ?>" class="temp_4"/>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 bg-lower-title"><?php _e('2. Select Currency Icon', APT_TXTDM); ?></div>
							<p></p>
							<?php if(isset($pricing_post_settings['currency_icon'])) $currency_icon = $pricing_post_settings['currency_icon']; else $currency_icon = "&#36"; ?>
							<div class="col-md-4">
								<select id="currency_icon" name="currency_icon" class="form-control" style="margin-left: 15px; width: 300px;">
									<option value="&#36" <?php if($currency_icon == "&#36") echo "selected"; ?>><?php _e('United States dollar ( &#36 )', APT_TXTDM); ?></option>
									<option value="€" <?php if($currency_icon == "€") echo "selected"; ?>><?php _e('Euro ( € )', APT_TXTDM); ?></option>
									<option value="¥" <?php if($currency_icon == "¥") echo "selected=selected"; ?>><?php _e('Japanese yen ( ¥ )', APT_TXTDM); ?></option>
									<option value="Fr" <?php if($currency_icon == "Fr") echo "selected=selected"; ?>><?php _e('Swiss franc ( Fr )', APT_TXTDM); ?></option>
									<option value="INR" <?php if($currency_icon == "INR") echo "selected=selected"; ?>><?php _e('Indian rupee ( INR )', APT_TXTDM); ?></option>
									<option value="R$" <?php if($currency_icon == "R$") echo "selected=selected"; ?>><?php _e('Brazilian real ( R$ )', APT_TXTDM); ?></option>
									<option value="NIS" <?php if($currency_icon == "NIS") echo "selected=selected"; ?>><?php _e('Israeli new shekel ( NIS )', APT_TXTDM); ?></option>
									<option value="Kc" <?php if($currency_icon == "Kc") echo "selected=selected"; ?>><?php _e('Czech koruna ( Kc )', APT_TXTDM); ?></option>
									<option value="RM" <?php if($currency_icon == "RM") echo "selected=selected"; ?>><?php _e('Malaysian ringgit ( RM )', APT_TXTDM); ?></option>
									<option value="PHP" <?php if($currency_icon == "PHP") echo "selected=selected"; ?>><?php _e('Philippine peso ( PHP )', APT_TXTDM); ?></option>
									<option value="NT$" <?php if($currency_icon == "NT$") echo "selected=selected"; ?>><?php _e('New Taiwan dollar ( NT$ )', APT_TXTDM); ?></option>
									<option value="THB" <?php if($currency_icon == "THB") echo "selected=selected"; ?>><?php _e('Thai baht ( THB )', APT_TXTDM); ?></option>
									<option value="t" <?php if($currency_icon == "t") echo "selected=selected"; ?>><?php _e('Turkish lira ( t )', APT_TXTDM); ?></option>
									<option value="nocurrency" <?php if($currency_icon == "nocurrency") echo "selected=selected"; ?>><?php _e('No Currency', APT_TXTDM); ?></option>
								</select>
							</div>
							<div class="col-md-4"></div>
						</div>
						<div class="row pricing_iconpicker">
							<div class="col-md-4 bg-lower-title"><?php _e('3. Select Icon', APT_TXTDM); ?></div>
							<p></p>
							<div class="col-md-4 iconpicker_tab">
								<div id="iconpicker-container">
								<?php
								//$pricing_icon_pick = $pricing_post_settings['pricing_icon_pick'];
								if(is_array($pricing_post_settings)) {
									for($i = 0; $i < $total_columns; $i++) {
										?>	
										<button type="button" value="" id="pricing_icon_pick[]" name="pricing_icon_pick[]" class="iconpick_<?php echo $i; ?> target_picker btn btn-default" data-iconset="fontawesome" data-icon="<?php echo $pricing_post_settings['pricing_icon_pick'][$i]; ?>" role="iconpicker"></button>
										<?php
									}
								}
								?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
				<div class="panel panel-default">
					<div class="panel-heading panel-heading-theme-1 icon-right" role="tab" id="heading6" data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-controls="collapse6">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-expanded="true" aria-controls="collapse6"><i class="fa fa-chevron-down"></i>
							<?php _e('Columns Settings', APT_TXTDM); ?>
							</a>
						</h4>
					</div>
					<div id="collapse6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading6">
						<div class="panel-body">	
							<div class="col-md-4 bg-lower-title"><?php _e('Pricing Columns Per Row', APT_TXTDM); ?></div>
							<p></p>
							<?php if(isset($pricing_post_settings['total_cols'])) $total_cols = $pricing_post_settings['total_cols']; else $total_cols = "col-md-3"; ?>
							<div class="col-md-4">
								<select id="total_cols" name="total_cols" class="form-control" style="margin-left: 15px; width: 300px;">
									<option value="col-md-3" <?php if($total_cols == "col-md-3") echo "selected=selected"; ?>><?php _e('Columns 4', APT_TXTDM); ?></option>
									<option value="col-md-4" <?php if($total_cols == "col-md-4") echo "selected=selected"; ?>><?php _e('Columns 3', APT_TXTDM); ?></option>
									<option value="col-md-6" <?php if($total_cols == "col-md-6") echo "selected=selected"; ?>><?php _e('Columns 2', APT_TXTDM); ?></option>
									<option value="col-md-12" <?php if($total_cols == "col-md-12") echo "selected=selected"; ?>><?php _e('Columns 1', APT_TXTDM); ?></option>
								</select>
							</div>		
						</div>		
					</div>			
				</div>		
			
			<div class="panel panel-default">
				<div class="panel-heading panel-heading-theme-1 icon-right" role="tab" id="heading2" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-controls="collapse2">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="true" aria-controls="collapse2"><i class="fa fa-chevron-down"></i>
							<?php _e('Color Settings', APT_TXTDM); ?>
						</a>
					</h4>
				</div>
				<div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
					<div class="panel-body">	
						<div class="row">
							<div class="bg-lower-title col-md-4"><?php _e('Heading Text Color', APT_TXTDM); ?></div>
							<?php if(isset($pricing_post_settings['heading_text_color'])) $heading_text_color = $pricing_post_settings['heading_text_color']; else $heading_text_color = "#ffffff"; ?>
							<input type="text" id="heading_text_color" name="heading_text_color" value="<?php echo $heading_text_color; ?>" default-color="<?php echo $heading_text_color; ?>">
						</div>
						<div class="row">
							<div class="bg-lower-title col-md-4"><?php _e('Background Color', APT_TXTDM); ?></div>
							<?php if(isset($pricing_post_settings['heading_background_color'])) $heading_background_color = $pricing_post_settings['heading_background_color']; else $heading_background_color = "#962744"; ?>
							<input type="text" id="heading_background_color" name="heading_background_color" value="<?php echo $heading_background_color; ?>" default-color="<?php echo $heading_background_color; ?>">
						</div>
						<div class="row">
							<div class="bg-lower-title col-md-4"><?php _e('Background Hover Color', APT_TXTDM); ?></div>
							<?php if(isset($pricing_post_settings['background_hover_color'])) $background_hover_color = $pricing_post_settings['background_hover_color']; else $background_hover_color = "#ff4266"; ?>
							<input type="text" id="background_hover_color" name="background_hover_color" value="<?php echo $background_hover_color; ?>" default-color="<?php echo $background_hover_color; ?>">
						</div>
						
						<div class="row">	
							<div class="bg-lower-title col-md-4"><?php _e('Button Color', APT_TXTDM); ?></div>
							<?php if(isset($pricing_post_settings['button_color'])) $button_color = $pricing_post_settings['button_color']; else $button_color = "#962744"; ?>
							<input type="text" id="button_color" name="button_color" value="<?php echo $button_color; ?>" default-color="<?php echo $button_color; ?>">
						</div>	
						<div class="row">
							<div class="bg-lower-title col-md-4"><?php _e('Button Text Color', APT_TXTDM); ?></div>
							<?php if(isset($pricing_post_settings['button_heading_color'])) $button_heading_color = $pricing_post_settings['button_heading_color']; else $button_heading_color = "#ffffff"; ?>
							<input type="text" id="button_heading_color" name="button_heading_color" value="<?php echo $button_heading_color; ?>" default-color="<?php echo $button_heading_color; ?>">
						</div>	
						<div class="row">
							<div class="bg-lower-title col-md-4"><?php _e('Button Hover Color', APT_TXTDM); ?></div>
							<?php if(isset($pricing_post_settings['button_hover_color'])) $button_hover_color = $pricing_post_settings['button_hover_color']; else $button_hover_color = "#ff4266"; ?>
							<input type="text" id="button_hover_color" name="button_hover_color" value="<?php echo $button_hover_color; ?>" default-color="<?php echo $button_hover_color; ?>">
						</div>		
					</div>		
				</div>			
			</div>		
			<div class="panel panel-default theme2_hover">
				<div class="panel-heading panel-heading-theme-1 icon-right" role="tab" id="heading4" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-controls="collapse4">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="true" aria-controls="collapse4"><i class="fa fa-chevron-down"></i>
							<?php _e('Featured Settings', APT_TXTDM); ?>
						</a>
					</h4>
				</div>
				
				<div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
					<div class="panel-body">
						<div class="row">
							<div class="bg-lower-title col-md-4"><?php _e('Heading Text Color', APT_TXTDM); ?></div>
							<?php if(isset($pricing_post_settings['feature_heading_text_color'])) $feature_heading_text_color = $pricing_post_settings['feature_heading_text_color']; else $feature_heading_text_color = "#ffffff"; ?>
							<input type="text" id="feature_heading_text_color" name="feature_heading_text_color" value="<?php echo $feature_heading_text_color; ?>" default-color="<?php echo $feature_heading_text_color; ?>">
						</div>
						<div class="row">
							<div class="bg-lower-title col-md-4"><?php _e('Background Color', APT_TXTDM); ?></div>
							<?php if(isset($pricing_post_settings['feature_heading_background_color'])) $feature_heading_background_color = $pricing_post_settings['feature_heading_background_color']; else $feature_heading_background_color = "#b21a1a"; ?>
							<input type="text" id="feature_heading_background_color" name="feature_heading_background_color" value="<?php echo $feature_heading_background_color; ?>" default-color="<?php echo $heading_background_color; ?>">
						</div>
						<div class="row">
							<div class="bg-lower-title col-md-4"><?php _e('Background Hover Color', APT_TXTDM); ?></div>
							<?php if(isset($pricing_post_settings['feature_background_hover_color'])) $feature_background_hover_color = $pricing_post_settings['feature_background_hover_color']; else $feature_background_hover_color = "#720202"; ?>
							<input type="text" id="feature_background_hover_color" name="feature_background_hover_color" value="<?php echo $feature_background_hover_color; ?>" default-color="<?php echo $feature_background_hover_color; ?>">
						</div>
						<div class="row">
							<div class="bg-lower-title col-md-4"><?php _e('Button Color', APT_TXTDM); ?></div>
							<?php if(isset($pricing_post_settings['feature_button_color'])) $feature_button_color = $pricing_post_settings['feature_button_color']; else $feature_button_color = "#b21a1a"; ?>
							<input type="text" id="feature_button_color" name="feature_button_color" value="<?php echo $feature_button_color; ?>" default-color="<?php echo $feature_button_color; ?>">
						</div>
						<div class="row">
							<div class="bg-lower-title col-md-4"><?php _e('Button Text Color', APT_TXTDM); ?></div>
							<?php if(isset($pricing_post_settings['feature_button_heading_color'])) $feature_button_heading_color = $pricing_post_settings['feature_button_heading_color']; else $feature_button_heading_color = "#ffffff"; ?>
							<input type="text" id="feature_button_heading_color" name="feature_button_heading_color" value="<?php echo $feature_button_heading_color; ?>" default-color="<?php echo $feature_button_heading_color; ?>">			
						</div>
						<div class="row">
							<div class="bg-lower-title col-md-4"><?php _e('Button Hover Color', APT_TXTDM); ?></div>
							<?php if(isset($pricing_post_settings['feature_button_hover_color'])) $feature_button_hover_color = $pricing_post_settings['feature_button_hover_color']; else $feature_button_hover_color = "#720202"; ?>
							<input type="text" id="feature_button_hover_color" name="feature_button_hover_color" value="<?php echo $feature_button_hover_color; ?>" default-color="<?php echo $feature_button_hover_color; ?>">
						</div>
					</div>
				</div>
			</div>
			
			<div class="panel panel-default theme2_hover">
				<div class="panel-heading panel-heading-theme-1 icon-right" role="tab" id="heading5" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-controls="collapse5">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="true" aria-controls="collapse5"><i class="fa fa-chevron-down"></i>
							<?php _e('Custome Css', APT_TXTDM); ?>
						</a>
					</h4>
				</div>
				
				<div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading5">
					<div class="panel-body">
						<?php if(isset($pricing_post_settings['apt_custom_css'])) $apt_custom_css = $pricing_post_settings['apt_custom_css']; else $apt_custom_css = ""; ?>
						<textarea name="apt_custom_css" id="apt_custom_css" style="width: 50% !important; height: 150px;"><?php  echo $apt_custom_css; ?></textarea>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>

		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					  <h4 class="modal-title"><?php _e('Copy the shortcode below and paste it wherever you want your pricing table to appear', APT_TXTDM); ?></h4>
					</div>
					<div class="modal-body center">
						<input type="text" name="abc-pricing-shortcode" id="abc-pricing-shortcode" value="<?php echo "[APT id=".$post->ID."]"; ?>" readonly style="height: 60px; text-align: center; font-size: 24px; width: 50%; border: 2px dashed;">
						<p></p>
						<input type="button" class="button button-primary" onclick="return ABCCopyShortcode();" readonly value="Copy Shortcode" />
						<span id="copy-msg" class="button button-primary" style="display:none; background-color:#32CD32; color:#FFFFFF; margin-left:4px; border-radius: 4px;">copied</span>
					</div>
					<div class="modal-footer">
					  <button type="button" class="btn btn-default" data-dismiss="modal"><?php _e('Close', APT_TXTDM); ?></button>
					</div>
				</div>
			</div>
		</div>
		<script>
			function ABCCopyShortcode() {
				var copyText = document.getElementById('abc-pricing-shortcode');
				copyText.select();
				document.execCommand('copy');
				
				//fade in and out copied message
				jQuery('#copy-msg').fadeIn('1000', 'linear');
				jQuery('#copy-msg').fadeOut(2500,'swing');
			}
		</script>
<!--js code-->
<script>
		var pricing_table_design = jQuery("#pricing_table_design option:selected").val();
		//alert(pricing_table_design);
		if(pricing_table_design == 1) {
			jQuery(".temp_1").show();
			jQuery(".pricing_iconpicker").show();
		}
		if(pricing_table_design == 2) {
			jQuery(".temp_2").show();
			jQuery(".pricing_iconpicker").hide();
		}
		if(pricing_table_design == 3) {
			jQuery(".temp_3").show();
			jQuery(".pricing_iconpicker").hide();
		}
		if(pricing_table_design == 4) {
			jQuery(".temp_4").show();
			jQuery(".pricing_iconpicker").hide();
		}
		
	jQuery(document).ready(function(){
		jQuery('[data-toggle="tooltip"]').tooltip();  
		
		//toggle button on/off
		jQuery('#pricing_table_design').change(function() {
			var pricing_table_design = jQuery('#pricing_table_design').val();
			//alert(pricing_table_design);
			if(pricing_table_design == 1) {
				jQuery(".temp_1").show();
				jQuery(".temp_2").hide();
				jQuery(".temp_3").hide();
				jQuery(".temp_4").hide();
				jQuery(".pricing_iconpicker").show();
			}
			
			if(pricing_table_design == 2) {
				jQuery(".temp_2").show();
				jQuery(".temp_1").hide();
				jQuery(".temp_3").hide();
				jQuery(".temp_4").hide();
				jQuery(".pricing_iconpicker").hide();
			}
			
			if(pricing_table_design == 3) {
				jQuery(".temp_3").show();
				jQuery(".temp_2").hide();
				jQuery(".temp_1").hide();
				jQuery(".temp_4").hide();
				jQuery(".pricing_iconpicker").hide();
			}
			
			if(pricing_table_design == 4) {
				jQuery(".temp_4").show();
				jQuery(".temp_3").hide();
				jQuery(".temp_2").hide();
				jQuery(".temp_1").hide();
				jQuery(".pricing_iconpicker").hide();
			}

		});
		
	});
	
	
	
	//color-picker
	(function( jQuery ) {
		jQuery(function() {
			// Add Color Picker 
			jQuery('#heading_text_color').wpColorPicker();
			jQuery('#heading_background_color').wpColorPicker();
			jQuery('#background_hover_color').wpColorPicker();
			jQuery('#button_color').wpColorPicker();
			jQuery('#button_heading_color').wpColorPicker();
			jQuery('#button_hover_color').wpColorPicker();
				//featured color
			jQuery('#feature_heading_text_color').wpColorPicker();
			jQuery('#feature_heading_background_color').wpColorPicker();
			jQuery('#feature_background_hover_color').wpColorPicker();
			jQuery('#feature_button_color').wpColorPicker();
			jQuery('#feature_button_heading_color').wpColorPicker();
			jQuery('#feature_button_hover_color').wpColorPicker();
			
		});
	})( jQuery );
	
	jQuery(document).ajaxComplete(function() {
		jQuery('#heading_text_color, heading_background_color, button_color, button_heading_color, background_hover_color, button_hover_color, feature_heading_text_color, feature_heading_background_color, feature_background_hover_color, feature_button_color, feature_button_heading_color, feature_button_hover_color').wpColorPicker();
	});
	// function generate new cloumn
	function add_new_column() {
		
		var total_cols = jQuery('#total_cols').val();

		if(total_cols == 1) {
			// when you creating pricing first time
			var total_cols = jQuery('#total_cols').val()-1;
		} else {
			// when you updateing pricing table
			var total_cols = jQuery('#total_cols').val();
		}
		
		
		
		var columns_class_name = "column_" + total_cols;
		var iconpick_class_name = "iconpick_" + total_cols;
		//alert(total_cols);
		//alert(columns_class_name);
		var new_col_html = ''+
		'<div id="columns[]" class="pri_main_div col-md-3 '+columns_class_name+'">' +
			'<div class="pri_head panel-heading">' +
				'<div class="switch-field em_size_field col-md-6" data-toggle="tooltip" data-placement="top" title="This table Will be Featured" aria-hidden="true">' +
					'<input type="radio" name="featured_button['+total_cols+']" id="featured_button1['+total_cols+']" value="true" >' +
						'<label for="featured_button1['+total_cols+']"><?php _e('Yes',APT_TXTDM ); ?></label>' +
					'<input type="radio" name="featured_button['+total_cols+']" id="featured_button2['+total_cols+']" value="false" checked >' +
						'<label for="featured_button2['+total_cols+']"><?php _e('No',APT_TXTDM ); ?></label>' +
				'</div>' +	
				'<i class="fa fa-times time" data-toggle="tooltip" data-placement="top" title="Delete table" aria-hidden="true" id="pri_delete" onclick=delete_column("'+columns_class_name+'");></i>' +
				'<input type="text" id="pricing_name" class="text" name="pricing_name[]" placeholder="<?php _e('Name', APT_TXTDM ); ?>" value="">' +
			'</div>' +
			'<hr class="pri_head_hr">' +
			'<ul>' +
				'<li>' +
					'<input type="text" id="pricing_price[]" name="pricing_price[]"" class="text"   placeholder="<?php _e('Pricing', APT_TXTDM ); ?>" value="">' +
				'</li>' +
				'<li>' +
					'<input type="text" id="pricing_plan[]" name="pricing_plan[]" class="text"   placeholder="<?php _e('Pricing Plan', APT_TXTDM ); ?>" value="">' +
				'</li>' +
				'<li class="features">' +
					'<textarea type="text" id="pricing_features[]" name="pricing_features[]" class="text"  placeholder="<?php _e('Pricing Features', APT_TXTDM ); ?>" rows="7"></textarea>' +
				'</li>' +
				'<li>' +
					'<input type="text" id="pricing_btn_text[]" name="pricing_btn_text[]" class="text" placeholder="<?php _e('Button Text', APT_TXTDM ); ?>" value="">' +
				'</li>' +
				'<li>' +
					'<input type="text" id="pricing_btn_url[]" name="pricing_btn_url[]" class="text" placeholder="<?php _e('Button Url', APT_TXTDM ); ?>" value="">' +
				'</li>' +
			'</ul>' +
		'</div>';
		
		var new_icon_picker = '<button type="button" value="" id="pricing_icon_pick[]" name="pricing_icon_pick[]" class="'+iconpick_class_name+' target_picker btn btn-default" data-iconset="fontawesome" data-icon="fa-wifi" role="iconpicker"></button>';
		
		jQuery('#iconpicker-container').append(new_icon_picker);
		
		jQuery('#pricing-container').append(new_col_html);
		
		var total_cols = parseInt(jQuery('#total_cols').val());
		jQuery('#total_cols').val(total_cols + 1);
		jQuery('[data-toggle="tooltip"]').tooltip();
		jQuery('.target_picker').iconpicker();
		//alert(total_cols);
	}
	
	// delete button
	function delete_column(col_id){
		if (confirm('Are sure to delete this columns from table?')) {
			jQuery( "."+ col_id ).fadeOut( 1000, function() {
				jQuery( "."+ col_id ).remove();
				var total_cols = parseInt(jQuery('#total_cols').val());
				//jQuery('#total_cols').val(total_cols - 1);
			});
		}
	}
	
</script>

<style>
.text {
    margin-bottom: 3px;
    width: 99%;
}
.inside {
	overflow:hidden;
}
.pri_main_div {
	background-color: #F6F6F6;
    margin-bottom: 12px;
    margin-left: 12px;
    padding-bottom: 20px;
    padding-top: 20px;
    width: 300px !important;
	margin-top: 12px;
}
.pri_head_hr {
	height: 2px;
}
.fa-stack {
	left: -20px;
    margin-top: -3px;
	cursor: pointer;
}
.time {
	color: red;
    float: right;
    margin-right: -12px;
    margin-top: -3px;
}

.fa-times {
	font-size: 18px !important;
}
.pri_head {
	margin-top: -15px;
}

.aad-btn {
	margin-top: 30px;
	text-align: right;
	margin-bottom: 30px;
}
.center {
	text-align: center;
}

#pri_delete{
  cursor: pointer;
}
.wp-color-result {
	margin-left: 40px !important;
	margin-top: 10px !important;
	margin-bottom: 10px !important;
}
.wp-picker-container .iris-picker {
    margin-left: 40px;
}
.wp-picker-container input.wp-color-picker[type="text"] {
	width: 68px;
	margin-top: 9px !important; 
}
.wp-picker-container .button {
	margin-left: 6px;
	margin-top: 9px !important;
	}

</style>