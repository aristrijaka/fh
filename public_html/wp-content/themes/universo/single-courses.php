<?php
 global $universo_option;
 get_header(); 

 ?>

<div class="container">
  <?php universo_breadcrumbs(); ?>
</div>
<!-- subheader close -->
<div class="content-event">
	<?php while (have_posts()) : the_post()?>
		<?php the_content(); ?>
	<?php endwhile; ?>
</div>
	
<?php get_footer(); ?>