<?php 
/**** WooCommerce ****/
if (class_exists('Woocommerce')) {
    add_theme_support( 'woocommerce' );    

    // Display 12 products per page. Goes in functions.php
    add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 );

    // breadcrumb woocommerce
    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
    add_action('breadcrumb_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

/**
  * Wrap add to cart text
  * Open a div
  *
  * @since 1.0
  */
 function add_to_cart_text( $text, $product ) {

  if(  $product->product_type == 'simple' ) {

   
    if( $product->is_purchasable() && $product->is_in_stock() ) {
     $text = esc_html__('take this course', 'universo');
    }

  }

  return $text;
 }

add_filter( 'woocommerce_product_add_to_cart_text', 'add_to_cart_text' , 10, 2 );
add_filter( 'woocommerce_product_single_add_to_cart_text', 'add_to_cart_text' , 10, 2 );

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

add_action( 'woocommerce_after_shop_loop_item', 'view_detail_button' );

/**
 * Display view detail button
 *
 * @since 1.0
 */
function view_detail_button() {
    global $product;
    printf( '<a href="%s" class="view-detail-button">%s</a>',
        esc_url( $product->get_permalink() ),
        __( 'View More', 'claudio' )
    );
}

add_action( 'woocommerce_after_shop_loop_item_title', 'view_detail_buttons', 1 );

/**
 * Display view detail button
 *
 * @since 1.0
 */
function view_detail_buttons() {
    global $product;
    echo '<span class="instructor">' . $product->get_attribute('instructor') . '</span>';
}

add_filter('woocommerce_product_get_rating_html', 'get_rating_all', 10, 2);

function get_rating_all($rating_html, $rating) {
  if ( $rating > 0 ) {
    $title = sprintf( __( 'Rated %s out of 5', 'woocommerce' ), $rating );
  } else {
    $title = 'Not yet rated';
    $rating = 0;
  }

  $rating_html  = '<div class="star-rating" title="' . $title . '">';
  $rating_html .= '<span style="width:' . ( ( $rating / 5 ) * 100 ) . '%"><strong class="rating">' . $rating . '</strong> ' . __( 'out of 5', 'woocommerce' ) . '</span>';
  $rating_html .= '</div>';

  return $rating_html;
}

?>