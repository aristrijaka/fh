<?php

 global $universo_option;

get_header();


?>

<div class="container">
    <div class="breadcrumb bot-20">
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
                        <section id="course-list">
                            <div class="table-responsive">
                                <table class="table table-hover course-list-table tablesorter">
                                    <thead>
                                    <tr>
                                        <th>Course Name</th>
                                        <th>Course Type</th>
                                        <th class="starts">Starts</th>
                                        <th class="length">Length</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                            <?php 

                            while (have_posts()) : the_post();

                            $datemonth = get_post_meta(get_the_ID(),'_cmb_course_date', true);
                            $length = get_post_meta(get_the_ID(),'_cmb_course_length', true);
                            $date = date('m-d-Y', strtotime($datemonth));
                            $terms = get_the_terms( $post->ID, 'courses_type' );
                            ?> 
                            <tr>
                                <th class="course-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></th>
                                <th class="course-category">
                                <?php foreach ( $terms as $term ) { ?>
                                    <a href="<?php echo esc_url( get_term_link( $term->slug, 'courses_type' ) ); ?>"><?php echo esc_html($term->name); ?></a><span>, </span>
                                <?php } ?>
                                </th>
                                <th><?php echo htmlspecialchars_decode($date); ?></th>
                                <th><?php echo htmlspecialchars_decode($length); ?></th>
                            </tr>

                            <?php endwhile;?>
                                    </tbody>
                                </table>
                            </div>
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
                <?php if(is_active_sidebar('sidebar-event')) { dynamic_sidebar('sidebar-event'); } ?>
            </div>
        </div>
    </div>
</div>
<!-- content close -->
<?php get_footer(); ?>