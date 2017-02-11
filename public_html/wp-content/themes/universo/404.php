<?php
/**
 * The template for displaying 404 pages (Not Found)
 */
global $universo_option; 
wp_head(); ?>

<section class="page404">
	<div class="container">
    	<div class="sixteen columns">
			<div class="text-center">
				<h1><?php echo esc_html($universo_option['404_title']); ?></h1>
				<div class="content_404">
				<?php echo esc_html($universo_option['404_content']); ?>
				</div>
				<div class="blog-link dark"><a class="btn btn-primary" href="<?php echo esc_url(home_url('/')); ?>"><i class="fa fa-arrow-circle-left"></i> <?php echo esc_html( $universo_option['back_404'] ); ?></a></div>
			</div>
       </div> 	
    </div><!-- end container -->
</section><!-- end postwrapper -->

<?php get_footer(); ?>
