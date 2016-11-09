<?php
/**
 * Loop Add to Cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/add-to-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product,$qode_pitch_options;

$animate_button_class='';
if(isset($qode_pitch_options['add_to_cart_button_hover_animation']) && ($qode_pitch_options['add_to_cart_button_hover_animation'] !== '')){
	$animate_button_class = $qode_pitch_options['button_hover_animation'];
}

$type = "type1";

$add_to_cart_text= $product->add_to_cart_text();

if ( ! $product->is_in_stock() ) : ?>
   <div class="product_image_overlay"></div><span class="onsale out-of-stock-button"><span><?php echo apply_filters( 'out_of_stock_add_to_cart_text', esc_html__( 'Out of stock', 'pitchwp' ) ); ?></span></span>
<?php else :
	if($type == 'type1') {
		echo
			'<div class="woocommerce_single_product_add_to_cart_holder">' .
			apply_filters( 'woocommerce_loop_add_to_cart_link',
			sprintf( '<div class="product_image_overlay"></div><a href="%s" rel="nofollow" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="qbutton '.$animate_button_class.' add-to-cart-button %s"><span class="text_wrap">%s</span><span class="a_overlay"></a>',
				esc_url( $product->add_to_cart_url() ),
				esc_attr( isset( $quantity ) ? $quantity : 1 ),
				esc_attr( $product->id ),
				esc_attr( $product->get_sku() ),
				esc_attr( isset( $class ) ? $class : 'button' ),
				esc_html( $add_to_cart_text )
			),
			$product ) .
			apply_filters( 'woocommerce_loop_add_to_cart_link',
				sprintf( '<a href="%s" rel="nofollow" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="qbutton double'.$animate_button_class.' add-to-cart-button %s"><span class="text_wrap">%s</span><span class="a_overlay"></span></a>',
					esc_url( $product->add_to_cart_url() ),
					esc_attr( isset( $quantity ) ? $quantity : 1 ),
					esc_attr( $product->id ),
					esc_attr( $product->get_sku() ),
					esc_attr( isset( $class ) ? $class : 'button' ),
					esc_html( $add_to_cart_text )
				),
				$product ) .
			'<a href="' . esc_url( home_url( '/' ) ) . '/cart/" class="button added_to_cart_double wc-forward" title="' . esc_html__("View Cart","pitchwp") . '">View Cart</a>'
			. '</div>';
	}
	else {
		echo apply_filters( 'woocommerce_loop_add_to_cart_link',
			sprintf( '<div class="product_image_overlay"></div><div class="add-to-cart-button-outer"><div class="add-to-cart-button-inner"><div class="add-to-cart-button-inner2"><a class="product_link_over" href="'.get_permalink($product->id).'"></a><a href="%s" rel="nofollow" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="qbutton '.$animate_button_class.' add-to-cart-button %s"><span class="text_wrap">%s</span><span class="a_overlay"></span></a></div></div></div>',
				esc_url( $product->add_to_cart_url() ),
				esc_attr( isset( $quantity ) ? $quantity : 1 ),
				esc_attr( $product->id ),
				esc_attr( $product->get_sku() ),
				esc_attr( isset( $class ) ? $class : 'button' ),
				esc_html( $add_to_cart_text )
			),
			$product );
	}

endif;
?>