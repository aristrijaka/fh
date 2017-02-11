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
                        <header><h1><?php printf( __( 'Search results for: %s', 'universo' ), get_search_query() ); ?></h1></header>
                        <?php if(have_posts()) { ?>
                         <?php 
                          while (have_posts()) : the_post(); ?>

                            <article class="blog-listing-post">
                              <aside>
                                  <header class="no-top">
                                      <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                                  </header>
                                  <a href="<?php the_permalink(); ?>" class="read-more"><?php echo esc_html( $universo_option['read_more'] ); ?></a>
                              </aside>
                            </article>
                          <?php endwhile; ?>

                        <div class="center">
                            <ul class="pagination">
                                <?php echo universo_pagination(); ?>
                            </ul>
                        </div>
                        <?php }else{ ?>
                            <h2><?php _e('Nothing Found!', 'universo'); ?></h2>
                        <?php } ?>
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