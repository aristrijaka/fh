<?php

 global $universo_option;
 $page_title = get_post_meta(get_the_ID(),'_cmb_page_sub', true);
get_header(); ?>

<div class="container">
  <?php universo_breadcrumbs(); ?>
</div>

<!-- content begin -->
<div id="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8 has-sidebar">
                <div id="page-main">
                    <section class="blog-listing" id="blog-listing">
                        <header><h1><?php if($page_title) { echo htmlspecialchars_decode($page_title); }else{ the_title(); } ?></h1></header>
                        
                        <?php while (have_posts()) : the_post()?>
                        
                            <?php the_post_thumbnail() ?>
                            
                            <?php the_content(); ?>

                            <?php wp_link_pages(); ?>
                            
                            <?php

                             if ( comments_open() || get_comments_number() ) :
                              comments_template();
                             endif;
                            ?>
                            
                        <?php endwhile; ?>

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