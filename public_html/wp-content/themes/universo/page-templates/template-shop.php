<?php
/**
 * Template Name: Template Shop
 */
get_header(); ?>

<!-- Breadcrumps -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <?php universo_breadcrumbs(); ?>
            </div>
            <div class="col-sm-12">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
</div>
<!-- End of Breadcrumps -->

<div class="blog-page page-default">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                           
                <?php while (have_posts()) : the_post()?>
                
                    <article> 
                    <?php the_content(); ?>
                    </article>
                    
                    
                <?php endwhile; ?>

            </div>
        </div>
    </div>
</div>
<!-- content close -->
<?php get_footer(); ?>