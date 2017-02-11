<?php

/**
 * Template Name: Course List With Image
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
                    <section class="events course" id="events">
                        <header><h1><?php if($page_title) { echo htmlspecialchars_decode($page_title); }else{ the_title(); } ?></h1></header>
                        <section id="event-search">
                            <div class="search-box course-box">
                                <header><span class="fa fa-search"></span><h2><?php _e('Find Course for You','universo'); ?></h2></header>
                                <form id="event-search-form" role="form" class="form-inline" action="<?php echo esc_url( home_url('/') ); ?>">
                                    <div class="from-row">
                                        <div class="form-group">
                                            <label for="course-type"><?php _e('Course Type','universo'); ?></label>
                                            <?php
                                            function get_terms_dropdown($taxonomies, $args){
                                                $myterms = get_terms($taxonomies, $args);
                                                $optionname = "type";
                                                $emptyvalue = "";
                                                $output ="<select name='".$optionname."'><option selected='".$selected."' value='".$emptyvalue."'>".__('Select Course Type','universo')."</option>'";

                                                foreach($myterms as $term){
                                                    $term_taxonomy=$term->courses_type;
                                                    $term_slug=$term->slug;
                                                    $term_name =$term->name;
                                                    $link = $term_slug;
                                                    $output .="<option name='".$link."' value='".$link."'>".$term_name."</option>";
                                                }
                                                $output .="</select>";
                                            return $output;
                                            }

                                            $taxonomies = array('courses_type'); // CHANGE ME
                                            $args = array('order'=>'ASC','hide_empty'=>true);
                                            echo get_terms_dropdown($taxonomies, $args);

                                            ?>
                                        </div><!-- /.form-group -->
                                        <div class="form-group">
                                            <label for="course-type"><?php _e('Study Level','universo'); ?></label>
                                            <?php
                                            function get_terms_dropdown2($taxonomies, $args){
                                                $myterms = get_terms($taxonomies, $args);
                                                $optionname2 = "level";
                                                $emptyvalue = "";
                                                $output ="<select name='".$optionname2."'><option selected='".$selected."' value='".$emptyvalue."'>".__('Select Study Level','universo')."</option>'";

                                                foreach($myterms as $term){
                                                    $term_taxonomy=$term->study_level;
                                                    $term_slug=$term->slug;
                                                    $term_name =$term->name;
                                                    $link = $term_slug;
                                                    $output .="<option name='".$link."' value='".$link."'>".$term_name."</option>";
                                                }
                                                $output .="</select>";
                                            return $output;
                                            }

                                            $taxonomies = array('study_level'); // CHANGE ME
                                            $args = array('order'=>'ASC','hide_empty'=>true);
                                            echo get_terms_dropdown2($taxonomies, $args);

                                            ?>
                                        </div><!-- /.form-group -->
                                        <div class="form-group">
                                            <label for="full-text"><?php _e('Full Text','universo'); ?></label>
                                            <input name="s" id="s" placeholder="<?php _e('Enter Keyword','universo'); ?>" type="text">
                                        </div><!-- /.form-group -->
                                    </div>
                                    <input type="hidden" name="post_type" value="courses" />
                                    <button type="submit" class="btn pull-right"><?php _e('Search','universo'); ?></button>
                                </form>
                            </div>
                        </section>
                        <section class="events images">
                            
                            <?php if(have_posts()) : ?>  

                                <?php 

                                $args = array(    
                                  'paged' => $paged,
                                  'post_type' => 'courses',
                                  'posts_per_page' => 4,
                                  'meta_query' => array(
                                          array(
                                                  'key' => '_cmb_course_date',
                                                  'value' => time(),
                                                  'compare' => '>=',
                                          ),
                                  ),
                                  'orderby' => '_cmb_course_date',
                                  'order' => 'DESC',
                                  );

                                $wp_query = new WP_Query($args);

                                while ($wp_query -> have_posts()): $wp_query -> the_post(); 

                                $datemonth = get_post_meta(get_the_ID(),'_cmb_course_date', true);
                                $exc = get_post_meta(get_the_ID(),'_cmb_course_ex', true);
                                $length = get_post_meta(get_the_ID(),'_cmb_course_length', true);
                                $date = date('d', strtotime($datemonth));
                                $month = date('M', strtotime($datemonth));
                                $terms = get_the_terms( $post->ID, 'study_level' );
                                ?>

                                <article class="event">
                                    <div class="event-thumbnail">
                                        <figure class="event-image">
                                            <div class="image-wrapper"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>"></div>
                                        </figure>
                                        <?php if($datemonth) { ?>
                                        <figure class="date">
                                            <div class="month"><?php echo htmlspecialchars_decode($month); ?></div>
                                            <div class="day"><?php echo htmlspecialchars_decode($date); ?></div>
                                        </figure>
                                        <?php } ?>
                                    </div>
                                    <aside>
                                        <header>
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </header>
                                        <div class="additional-info">
                                            <?php foreach ( $terms as $term ) { ?>
                                                <a href="<?php echo esc_url( get_term_link( $term->slug, 'study_level' ) ); ?>"><?php echo esc_html($term->name); ?></a>
                                            <?php } ?>
                                        </div>
                                        <div class="description">
                                            <p><?php echo htmlspecialchars_decode($exc); ?></p>
                                        </div>
                                        <a href="<?php the_permalink(); ?>" class="btn btn-framed btn-color-grey btn-small"><?php _e('View Details', 'universo'); ?></a>
                                    </aside>
                                </article>

                                <?php endwhile;?> 

                                <?php else: ?>

                                <h2><?php _e('Nothing Found!', 'universo'); ?></h2>

                            <?php endif; ?>
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
                <?php if(is_active_sidebar('sidebar-course')) { dynamic_sidebar('sidebar-course'); } ?>
            </div>
        </div>
    </div>
</div>
<!-- content close -->
<?php get_footer(); ?>