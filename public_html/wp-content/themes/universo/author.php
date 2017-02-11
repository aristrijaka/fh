<?php
 global $universo_option;
get_header(); ?>
    

<div class="container">
    <div class="breadcrumb">
        <?php universo_breadcrumbs(); ?>
    </div>
</div>

<!-- content begin -->
<div id="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div id="page-main">
                    <section class="blog-listing" id="blog-listing">
                        <header><h1><?php printf( __( 'All posts by: %s', 'universo' ), get_the_author() ); ?></h1></header>
                        <div class="row">
                         <?php 
                          while (have_posts()) : the_post();
                          get_template_part( 'content', get_post_format() ) ;   // End the loop.
                          endwhile;
                           ?>      
                        </div>

                        <div class="center">
                            <ul class="pagination">
                                <?php echo universo_pagination(); ?>
                            </ul>
                        </div>
                    </section>
                </div>        
            </div>

            <div class="col-md-4">
                <?php get_sidebar();?>
            </div>
        </div>
    </div>
</div>
<!-- content close -->
<?php get_footer(); ?>