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
                        <section id="event-search">
                            <div class="search-box">
                                <header><span class="fa fa-search"></span><h2><?php _e('Find Events','universo'); ?></h2></header>
                                <form id="event-search-form" role="form" class="form-inline" action="<?php echo esc_url( home_url('/') ); ?>">
                                    <div class="from-row">
                                        <div class="form-group">
                                            <label for="course-type"><?php _e('Event Category','universo'); ?></label>
                                            <?php
                                            function get_terms_dropdown($taxonomies, $args){
                                                $myterms = get_terms($taxonomies, $args);
                                                $optionname = "taxonomy";
                                                $emptyvalue = "";
                                                $output ="<select name='".$optionname."'><option selected='".$selected."' value='".$emptyvalue."'>".__('Select a Category','universo')."</option>'";

                                                foreach($myterms as $term){
                                                    $term_taxonomy=$term->categories; //CHANGE ME
                                                    $term_slug=$term->slug;
                                                    $term_name =$term->name;
                                                    $link = $term_slug;
                                                    $output .="<option name='".$link."' value='".$link."'>".$term_name."</option>";
                                                }
                                                $output .="</select>";
                                            return $output;
                                            }

                                            $taxonomies = array('categories'); // CHANGE ME
                                            $args = array('order'=>'ASC','hide_empty'=>true);
                                            echo get_terms_dropdown($taxonomies, $args);

                                            ?>
                                        </div><!-- /.form-group -->
                                        <div class="form-group">
                                            <label for="full-text"><?php _e('Full Text','universo'); ?></label>
                                            <input name="s" id="s" placeholder="<?php _e('Enter Keyword','universo'); ?>" type="text">
                                        </div><!-- /.form-group -->
                                    </div>
                                    <input type="hidden" name="post_type" value="event" />
                                    <button type="submit" class="btn pull-right"><?php _e('Search','universo'); ?></button>
                                </form>
                            </div>
                        </section>
                        <?php if(have_posts()) : ?>  

                            <?php 

                            $args = array(    
                              'paged' => $paged,
                              'posts_per_page' => 4,
                              'meta_query' => array(
                                      array(
                                              'key' => '_cmb_event_date',
                                              'value' => time(),
                                              'compare' => '>=',
                                      ),
                              ),
                              'orderby' => '_cmb_event_date',
                              'order' => 'DESC',
                              );

                            $wp_query = new WP_Query($args);

                            while ($wp_query -> have_posts()): $wp_query -> the_post(); 

                            $datemonth = get_post_meta(get_the_ID(),'_cmb_event_date', true);
                            $exc = get_post_meta(get_the_ID(),'_cmb_event_ex', true);
                            $note = get_post_meta(get_the_ID(),'_cmb_event_note', true);
                            $bg = get_post_meta(get_the_ID(),'_cmb_event_bgnote', true);
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
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="note" style="background: <?php echo esc_attr($bg); ?>;"><?php echo htmlspecialchars_decode($note); ?></span></a>
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