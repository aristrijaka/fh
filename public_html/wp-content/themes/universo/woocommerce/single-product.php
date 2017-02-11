<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>
	
	<!-- Breadcrumps -->
	<div class="breadcrumbs">
	    <div class="container">
		    <div class="row">
		        <div class="col-sm-12">
		            <?php do_action('breadcrumb_before_main_content'); ?>
		        </div>
		        <div class="col-sm-12">
		           <h1><?php the_title(); ?></h1>
		        </div>
		    </div>
	    </div>
	</div>
	<!-- End of Breadcrumps -->

	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>
	<div class="blog-page production">
    	<div class="container">
	    	<div class="row">
				<div class="col-md-12">
					<?php while ( have_posts() ) : the_post(); ?>

						<?php wc_get_template_part( 'content', 'single-product' ); ?>

					<?php endwhile; // end of the loop. ?>
					
				</div>	

			</div>
		</div>
	</div>		

	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

<?php get_footer( 'shop' ); ?>
