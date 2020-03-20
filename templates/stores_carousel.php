<?php
if ( ! defined( 'ABSPATH' ) ) exit;

$data['featured']=$data['featured'] ? 'yes' : 'no';

$shortcode=sprintf('[dokan-stores per_row=1 per_page=%s search=no featured=%s]',$data['limit'],$data['featured']); //setup the shortcode
$sellers=dokan_get_sellers(array('featured'=>$data['featured'])); //get dokan stores

if ( $sellers['users'] ) :	?>
    <div id="dokan-seller-listing-wrap" class="niz-stores-carousel-wrapper">

    	<?php printf('<div style="display:none;" class="niz-stores-dokan-html">%s</div>', do_shortcode($shortcode) ); //get dokan store template. li will be extracted in script.js
    	?>

		<div class="seller-listing-content owl-theme">
			<ul class="dokan-seller-wrap niz-stores-carousel owl-carousel"
				data-item-lg="<?php echo esc_attr( $data['show_item'] ); ?>"
				data-item-md="<?php echo esc_attr( $data['show_item_tablet'] ); ?>"
				data-item-sm="<?php echo esc_attr( $data['show_item_mobile'] ); ?>"
				data-autoplay="<?php echo esc_attr( $data['autoplay'] ); ?>"
				data-pause="<?php echo esc_attr( $data['pause'] ); ?>"
				data-nav="<?php echo esc_attr( $data['nav'] ); ?>"
				data-dots="<?php echo esc_attr( $data['dots'] ); ?>"
				data-mouse-drag="<?php echo esc_attr( $data['mouse_drag'] ); ?>"
				data-touch-drag="<?php echo esc_attr( $data['touch_drag'] ); ?>"
				data-loop="<?php echo esc_attr( $data['loop'] ); ?>"
				data-speed="<?php echo esc_attr( $data['speed'] ); ?>"
				data-delay="<?php echo esc_attr( $data['delay'] ); ?>"
				>
			</ul>
		</div>
    </div><!-- niz-dokan-stores-carousel -->
	<?php
else:
	?>
		<h3><?php _e('No Store found', 'niz-dokansc'); ?></h3>
	<?php
endif;
