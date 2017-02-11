<?php 



class recentcourse_widget extends WP_Widget {



function __construct() {



parent::__construct(



// Base ID of your widget



'recentcourse_widget', 







// Widget name will appear in UI



__('Latest Courses', 'universo'), 







// Widget description



array( 'description' => __( 'Latest Courses Universo', 'universo' ), ) 



);



}







// Creating widget front-end



// This is where the action happens



public function widget( $args, $instance ) {



    // these are the widget options



    //$title = apply_filters( 'widget_title', $instance['title'] );



    $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Related Courses', 'universo' ) : $instance['title'], $instance, $this->id_base );






// before and after widget arguments are defined by themes



echo htmlspecialchars_decode($args['before_widget']);



if ( ! empty( $title ) ){

    echo htmlspecialchars_decode($args['before_title']) . $title . htmlspecialchars_decode($args['after_title']); 

}?>

    <div class="section-content news-small">

            <?php 

            $recent = new WP_Query( array(

            'post_type' => 'courses', 

            'posts_per_page' => $instance['posts_per_page'],
            'meta_query' => array(
                  array(
                          'key' => '_cmb_course_date',
                          'value' => time(),
                          'compare' => '>=',
                  ),
            ),
            'orderby' => '_cmb_course_date',
            'order' => 'DESC',
            ) );

            while ($recent->have_posts()) :$recent-> the_post();
            $datemonth = get_post_meta(get_the_ID(),'_cmb_course_date', true);
            $length = get_post_meta(get_the_ID(),'_cmb_course_length', true);
            $date = date('d-m-Y', strtotime($datemonth));
            ?>

            <article class="course-thumbnail small">
                <figure class="image">
                    <div class="image-wrapper"><a href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>"></a></div>
                </figure>
                <div class="description">
                    <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                    <hr>
                    <div class="course-meta">
                        <span class="course-date"><i class="fa fa-calendar-o"></i><?php echo htmlspecialchars_decode($date); ?></span>
                        <span class="course-length"><i class="fa fa-clock-o"></i><?php echo htmlspecialchars_decode($length); ?></span>
                    </div>
                    <div class=""><a href="<?php the_permalink(); ?>" class="btn btn-framed btn-color-grey btn-small"><?php _e('View Details','universo'); ?></a></div>
                </div>
            </article>
            <?php endwhile; ?>

    </div>
    </div>


<?php 



echo htmlspecialchars_decode($after_widget);

}



public function update( $new_instance, $old_instance ) {

    $instance = $old_instance;

    $instance['title'] = strip_tags($new_instance['title']);

    $instance['posts_per_page'] = ( ! empty( $new_instance['posts_per_page'] ) ) ? strip_tags( $new_instance['posts_per_page'] ) : '';



    return $instance;

}   



// Widget Backend 



public function form( $instance ) {



// Check values



     //$title = esc_attr($instance['title']);



     $title = esc_attr( $instance['title'] );

     $posts_per_page = esc_attr($instance['posts_per_page']);



// Widget admin form



?>









<p><label><?php _e( 'Title:', 'universo' ); ?></label>

    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>


<label><?php _e( 'Number of posts to show:', 'universo' ); ?></label> 



<input size="3" class="widefat" id="<?php echo esc_attr($this->get_field_id('posts_per_page')); ?>" name="<?php echo esc_attr($this->get_field_name('posts_per_page')); ?>" type="text" value="<?php echo esc_attr($posts_per_page); ?>" />



</p>

<?php 



}

    



} // Class wpb_widget ends here







// Register and load the widget



function wpb_recentcourse_widget() {



    register_widget( 'recentcourse_widget' );



}



add_action( 'widgets_init', 'wpb_recentcourse_widget' );