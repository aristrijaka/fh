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
                    <section class="events" id="events">
                        <header><h1><?php _e('Events','universo'); ?></h1></header>
                        <?php if(have_posts()) : ?>  

                            <?php 

                            $args = array(    

                              'post_type' => 'event',
                              'meta_query' => array(
                                      array(
                                              'key' => '_cmb_event_date',
                                              'value' => time(),
                                              'compare' => '>=',
                                      ),
                              ),
                              'orderby' => '_cmb_event_date',
                              'order' => 'ASC',


                              );

                            $wp_query = new WP_Query($args);

                            while ($wp_query -> have_posts()): $wp_query -> the_post(); 

                            $datemonth = get_post_meta(get_the_ID(),'_cmb_event_date', true);
                            $exc = get_post_meta(get_the_ID(),'_cmb_event_ex', true);
                            $locate = get_post_meta(get_the_ID(),'_cmb_event_location', true);
                            $date = date('d', strtotime($datemonth));
                            $month = date('M', strtotime($datemonth));

                            ?> 

                            <article class="event">
                                <figure class="date">
                                    <div class="month"><?php echo htmlspecialchars_decode($month); ?></div>
                                    <div class="day"><?php echo htmlspecialchars_decode($date); ?></div>
                                </figure>
                                <aside>
                                    <header>
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </header>
                                    <div class="additional-info"><span class="fa fa-map-marker"></span> <?php echo htmlspecialchars_decode($locate); ?></div>
                                    <div class="description">
                                        <p><?php echo htmlspecialchars_decode($exc); ?></p>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-framed btn-color-grey btn-small"><?php _e('View Details', 'universo'); ?></a>
                                </aside>
                            </article><!-- /.event -->

                            <?php endwhile;?> 

                            <?php else: ?>

                            <h1><?php _e('Nothing Found Here!', 'universo'); ?></h1>

                        <?php endif; ?>

                        <div class="center">
                            <ul class="pagination">
                                <?php echo universo_pagination(); ?>
                            </ul>
                        </div>
                    </section>
                </div>        
            </div>

            <div class="col-md-4">
                <?php if(is_active_sidebar('sidebar-event')) { dynamic_sidebar('sidebar-event'); } ?>
            </div>
        </div>
    </div>
</div>
<!-- content close -->
<?php get_footer(); ?>