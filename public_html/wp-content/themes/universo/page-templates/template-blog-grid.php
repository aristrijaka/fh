<?php

/**
 * Template Name: Blog Grid
 */

 global $universo_option;
 $page_title = get_post_meta(get_the_ID(),'_cmb_page_sub', true);
get_header();


?>

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
                        <header><h1><?php if($page_title) { echo htmlspecialchars_decode($page_title); }else{ the_title(); } ?></h1></header>
                        
                        <div class="row">
                        <?php if(have_posts()) : ?>  

                            <?php 

                            $args = array(    

                              'paged' => $paged,

                              'post_type' => 'post',

                              );

                            $wp_query = new WP_Query($args);

                            while ($wp_query -> have_posts()): $wp_query -> the_post();                         

                                get_template_part( 'content', get_post_format() ) ; ?> 

                            <?php endwhile;?> 

                        

                            <?php else: ?>

                            <h1><?php _e('Nothing Found Here!', 'universo'); ?></h1>

                        <?php endif; ?>      
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