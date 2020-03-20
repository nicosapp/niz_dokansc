<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( ! defined( 'ABSPATH' ) ) exit;
?>
<h1>Niz Stores Carousel for Dokan</h1>
<h2><?php _e('Shortcode Generator','niz-dokansc'); ?></h2>

<div class="niz-panel-wrapper" style="display:flex;">
	<div class="niz-panel left" style="margin-right:2em;">
		<h3><?php _e('Shortcode Parameters','niz-dokansc'); ?></h3>
		<table class="form-table" role="niz-shortcode">
			<tr>
				<th scope="row">
					<label><?php _e('Limit','niz-dokansc'); ?></label>
				</th>
				<td>
					<input class="niz-atts" type="number" name="limit" value="4"/>
					<p class="description" id="tagline-description"><?php _e('Number of products to display.','niz-dokansc'); ?></p>
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label><?php _e('Featured Store','niz-dokansc'); ?></label>
				</th>
				<td>
					<input  class="niz-atts" type="checkbox" name="featured"/>
				</td>
			</tr>
		</table>
	</div>
	<div class="niz-panel right">
		<h3><?php _e('Carousel Parameters','niz-dokansc'); ?></h3>
		<table class="form-table" role="niz-shortcode">
			<tr>
				<th scope="row">
					<label><?php _e('Show Products','niz-dokansc'); ?></label>
					<p class="description" id="tagline-description"><?php _e('Number of products visible in Carousel.','niz-dokansc'); ?></p>
				</th>
				<td>
					<div>
						<input  class="niz-atts" type="number" value="3" name="show_item"/>
						<p class="description" id="tagline-description"><?php _e('On computer.','niz-dokansc'); ?></p>
					</div>
					<div>
						<input  class="niz-atts" type="number" value="2" name="show_item_tablet"/>
						<p class="description" id="tagline-description"><?php _e('On tablet.','niz-dokansc'); ?></p>
					</div>
					<div>
						<input  class="niz-atts" type="number" value="1" name="show_item_mobile"/>
						<p class="description" id="tagline-description"><?php _e('On mobile.','niz-dokansc'); ?></p>
					</div>
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label><?php _e('Autoplay','niz-dokansc'); ?></label>
				</th>
				<td>
					<input  class="niz-atts" type="checkbox" name="autoplay" checked/>
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label><?php _e('Pause','niz-dokansc'); ?></label>
				</th>
				<td>
					<input  class="niz-atts" type="checkbox" name="pause" checked/>
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label><?php _e('Navigation buttons','niz-dokansc'); ?></label>
				</th>
				<td>
					<input class="niz-atts" type="checkbox" name="nav"/>
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label><?php _e('Dots buttons','niz-dokansc'); ?></label>
				</th>
				<td>
					<input class="niz-atts" type="checkbox" name="dots"/>
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label><?php _e('Loop','niz-dokansc'); ?></label>
				</th>
				<td>
					<input  class="niz-atts" type="checkbox" name="loop" checked/>
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label><?php _e('Carousel speed','niz-dokansc'); ?></label>
				</th>
				<td>
					<input  class="niz-atts" type="number" name="speed" value="300"/>
					<p class="description" id="tagline-description"><?php _e('Time in millisecond.','niz-dokansc'); ?></p>
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label><?php _e('Carousel delay time','niz-dokansc'); ?></label>
				</th>
				<td>
					<input  class="niz-atts" type="number" name="delay" value="1000"/>
					<p class="description" id="tagline-description"><?php _e('Time in millisecond.','niz-dokansc'); ?></p>
				</td>
			</tr>
		</table>
	</div>
</div>
<p class="shortcode-generated">
	<h2><?php _e('Generated Shortcode','niz-dokansc'); ?></h2>
	<p><?php _e('Click on the button below to generate your shortcode. Then copy page the generated shortcode wherever you want!','niz-dokansc'); ?></p>
	<p id="shortcode-generated-value"></p>
</p>
<p class="submit">
	<input type="button" id="niz-button-shortcode-generator" name="generate" class="button button-primary" value="<?php _e('Generate','niz-dokansc');?>">
</p>