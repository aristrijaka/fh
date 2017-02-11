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
                        <header><h1>
                          <?php
                            if ( is_day() ) :
                              printf( __( 'Daily Archives: %s', 'universo' ), get_the_date() );

                            elseif ( is_month() ) :
                              printf( __( 'Monthly Archives: %s', 'universo' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'universo' ) ) );

                            elseif ( is_year() ) :
                              printf( __( 'Yearly Archives: %s', 'universo' ), get_the_date( _x( 'Y', 'yearly archives date format', 'universo' ) ) );

                            else :
                              _e( 'Archives', 'universo' );

                            endif;
                          ?>
                        </h1></header>
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