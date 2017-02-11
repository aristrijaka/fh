<?php

/**
 * Template Name: Full Width
 */

 global $universo_option;

get_header(); ?>



<div class="container">
  <?php universo_breadcrumbs(); ?>
</div>

<?php if (have_posts()){ ?>

		<?php while (have_posts()) : the_post()?>

			<?php the_content(); ?>

		<?php endwhile; ?>

	

	<?php }else {

		echo 'Page Canvas For Page Builder'; 

}?>





<?php get_footer(); ?>