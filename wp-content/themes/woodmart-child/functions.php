<?php
/**
 * Enqueue script and styles for child theme
 */
function woodmart_child_enqueue_styles() {
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'woodmart-style' ), woodmart_get_theme_info( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'woodmart_child_enqueue_styles', 10010 );



/**
 * Add the shipping class to the bottom of each item in the cart
 * from: https://wordpress.stackexchange.com/questions/291637/woocommerce-add-shipping-class-below-each-product-in-shopping-cart-page
 */
add_filter( 'woocommerce_cart_item_name', 'shipping_class_in_item_name', 20, 3);
function shipping_class_in_item_name( $item_name, $cart_item, $cart_item_key ) {
// Only in cart page (remove the line below to allow the display in checkout too)
if( ! ( is_cart() || is_checkout() ) ) return $item_name;

$product = $cart_item['data']; // Get the WC_Product object instance
$shipping_class_id = $product->get_shipping_class_id(); // Shipping class ID
$shipping_class_term = get_term( $shipping_class_id, 'product_shipping_class' );

if( empty( $shipping_class_id ) )
    return $item_name; // Return default product title (in case of)
  
if ( ( $shipping_class_term->slug == 'flat-1995-per' ) || ( $shipping_class_term->slug == 'flat-4999-per' ) ) {
  	$prefix = '$';
	$suffix = 'each';
}

$label = __( 'Shipping', 'woocommerce' );

return $item_name . '<br>
    <p class="item-shipping_class" style="margin:0.25em 0 0; font-size: 0.875em;">
        <em>' .$label . ': </em>' . $prefix . $shipping_class_term->name . ' ' . $suffix . '</p>';
}





add_action( 'woocommerce_cart_calculate_fees', function() {
	$cod_fee = 45;
    $chosen_gateway = WC()->session->get( 'chosen_payment_method' );

    if ( $chosen_gateway == 'cod' ) 
    {
    	$chosen_shipping_methods = wc_get_chosen_shipping_method_ids();

    	if ( !in_array('local_pickup', $chosen_shipping_methods) )
    	{    		
    		WC()->cart->add_fee( __('Cash on Delivery', 'woocommerce'), $cod_fee );
    	}
   }
} );



// // Change add to cart text on single product page
// add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_add_to_cart_button_text_single' ); 
// function woocommerce_add_to_cart_button_text_single() {
//     return __( 'Read More', 'woocommerce' ); 
// }

// // Change add to cart text on product archives page
// add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_add_to_cart_button_text_archives' );  
// function woocommerce_add_to_cart_button_text_archives() {
//     return __( 'Read More', 'woocommerce' );
// }
	
// changes the "select options" text. Forget who to give credit to for this.
add_filter( 'woocommerce_product_add_to_cart_text', function( $text ) {
global $product;
if ( $product->is_type( 'variable' ) ) {
    $text = $product->is_purchasable() ? __( 'More Options', 'woocommerce' ) : __( 'Read more', 'woocommerce' );
}
return $text;
}, 10 );

/**
 * remove add to cart buttons on shop archive page
 */

add_filter( 'woocommerce_loop_add_to_cart_link', 'replacing_add_to_cart_button', 10, 2 );
function replacing_add_to_cart_button( $button, $product  ) {
if ( $product->is_type( 'simple' ) ) {
$button_text = __("View product", "woocommerce");
$button = '<a class="button" href="' . $product->get_permalink() . '">' . 
$button_text . '</a>';
}
return $button;
}


