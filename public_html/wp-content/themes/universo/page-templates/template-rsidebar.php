<?php

/**
 * Template Name: Right Sidebar
 */

 global $universo_option;

 $page_title = get_post_meta(get_the_ID(),'_cmb_page_sub', true);

get_header(); ?>

<div class="container">
  <?php universo_breadcrumbs(); ?>
</div>
<div class="container">
<?php if (have_posts()){ ?>
    
    <div class="row">
        
        <div class="col-md-8 has-sidebar">
        <?php while (have_posts()) : the_post()?>
            <header><h1><?php if($page_title) { echo htmlspecialchars_decode($page_title); }else{ the_title(); } ?></h1></header>
            
            <?php the_content(); ?>

        <?php endwhile; ?>
        </div>
        <div class="col-md-4">

            <?php get_sidebar();?>

        </div>
    </div>

    <?php }else {

        echo 'Page Canvas For Page Builder'; 

}?>
</div>

<?php get_footer(); ?>