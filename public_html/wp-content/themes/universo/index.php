<?php

 global $universo_option;
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
                    <section class="events images blog-page" id="events">
                        <header><h1><?php _e('Blog / News','universo'); ?></h1></header>
                        <?php if(have_posts()) : ?>  

                            <?php 

                            $args = array(    

                              'paged' => $paged,

                              'post_type' => 'post',

                              );

                            $wp_query = new WP_Query($args);

                            while ($wp_query -> have_posts()): $wp_query -> the_post(); ?>                        

                            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                               <article class="event">
                                    <?php if ( has_post_thumbnail() ) { ?>
                                    <div class="event-thumbnail">
                                        <figure class="event-image">
                                            <div class="image-wrapper"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>"></div>
                                        </figure>
                                    </div>

                                    <aside>
                                    <?php }else{ ?>
                                    <aside class="left-0">
                                    <?php } ?>
                                        <header>
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </header>
                                        <div class="additional-info"><span class="fa fa-calendar"></span> <?php echo the_time('d-m-Y'); ?></div>
                                        <div class="description">
                                            <p><?php echo universo_excerpt(); ?></p>
                                        </div>
                                        <a href="<?php the_permalink(); ?>" class="read-more"><?php echo esc_html( $universo_option['read_more'] ); ?></a>
                                    </aside>
                                </article>  
                            </div>
                            <?php endwhile;?>

                            <?php else: ?>

                            <h1><?php _e('Nothing Found Here!', 'universo'); ?></h1>

                            <?php endif ?>

                        </section>
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