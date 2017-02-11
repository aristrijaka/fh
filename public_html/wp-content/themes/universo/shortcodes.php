<?php

// Custom Heading
add_shortcode('heading','heading_func');

function heading_func($atts, $content = null){

	extract(shortcode_atts(array(
		'text'		=>	'',
		'tag'		  => 	'',
		'size'		=>	'',
		'color'		=>	'',
		'align'		=>	'',
		'bot'		  =>	'',
		'class'		=>	'',
	), $atts));
	
	$size1 = (!empty($size) ? 'font-size: '.$size.'px;' : '');
	$color1 = (!empty($color) ? 'color: '.$color.';' : '');
	$align1 = (!empty($align) ? 'text-align: '.$align.';' : '');
	$bot = (!empty($bot) ? 'margin-bottom: '.$bot.';' : '');
	$cl = (!empty($class) ? ' class= "'.$class.'"' : '');
	
	$html .= '<'.$tag.$cl.' style="' . $size1 . $align1 . $color1 . $bot .'">'. $text .'</'.$tag.'>';
	
	return $html;
}

// Carousel Image

add_shortcode('carouselimg', 'carouselimg_func');
function carouselimg_func($atts, $content = null){
	extract(shortcode_atts(array(
		'gallery'	=>	'',
	), $atts));

	ob_start(); ?>

	<div class="image-carousel">
		<?php 
		$img_ids = explode(",",$gallery);
		foreach( $img_ids AS $img_id ){
		$image_src = wp_get_attachment_image_src($img_id,''); 
		$attachment = get_post( $img_id );?>
        <div class="image-carousel-slide">
   	    	<img src="<?php echo esc_url( $image_src[0] ); ?>" alt="">
        </div>
        <?php } ?>
    </div>        

	<?php

    return ob_get_clean();
}


// Social

add_shortcode('socials', 'icons_func');
function icons_func($atts, $content = null){
	extract(shortcode_atts(array(
		'link'		=>	'',
		'icon1'		=>	'',
	), $atts));

	$icon11 = (!empty($icon1) ? '<a href="'.esc_url($link).'" target="_blank"><i class="fa fa-'.esc_attr($icon1).'"></i></a>' : '');
	
	ob_start(); ?>

	<div class="icons">
        <?php echo htmlspecialchars_decode($icon11); ?>
    </div>

	<?php

    return ob_get_clean();
}

// Professors

add_shortcode('professors', 'professor_func');
function professor_func($atts, $content = null){
	extract(shortcode_atts(array(
		'number'	=>	'',
	), $atts));
	if(!$number){
		$number = 2;
	}
	ob_start(); ?>

	<div class="professors">
		<?php 
			$recent = new WP_Query( array(

            'post_type' => 'team', 

            'posts_per_page' => $number,

              ) );

            while ($recent->have_posts()) :$recent-> the_post();
            $des = get_post_meta(get_the_ID(),'_cmb_professor_desc', true);
		?>
        <article class="professor-thumbnail">
            <figure class="professor-image"><a href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());; ?>" alt=""></a></figure>
            <aside>
                <header>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    <div class="divider"></div>
                    <figure class="professor-description"><?php echo htmlspecialchars_decode($des); ?></figure>
                    
                </header>
                <a href="<?php the_permalink(); ?>" class="show-profile"><?php _e('Show Profile','universo'); ?></a>
            </aside>
        </article>
    	<?php endwhile; ?>
    </div>    

	<?php

    return ob_get_clean();
}


// Connect
add_shortcode('connects', 'connects_func');
function connects_func($atts, $content = null){
	extract(shortcode_atts(array(
		'fb'  => 	'',
		'tw'  => 	'',
	), $atts));
	ob_start(); ?>
	
	<div class="connect-block">
        <div class="row">
            <div class="col-md-3">
                <ul class="nav nav-pills nav-stacked">
                    <?php if($tw) { ?><li class="active"><a href="#tab-twitter" data-toggle="pill"><i class="fa fa-twitter"></i>Twitter</a></li><?php } ?>
                    <?php if($fb) { ?><li<?php if(!$tw) { ?> class="active"<?php } ?>><a href="#tab-facebook" data-toggle="pill"><i class="fa fa-facebook"></i>Facebook</a></li><?php } ?>
                </ul>
            </div>
            <div class="col-md-9">
	            <div class="tab-content">
	            	<?php if($tw) { ?>
	                <div class="tab-pane fade in active" id="tab-twitter">
	                    <?php if(is_active_sidebar('twitter-feed')) { dynamic_sidebar( 'twitter-feed' ); } ?>
	                </div><!-- /.tab-twitter -->
	                <?php } ?>
	                <?php if($fb) { ?>
	                <div class="tab-pane fade<?php if(!$tw) echo ' in active'; ?>" id="tab-facebook">
	                    <?php echo do_shortcode('[facebook-feed]'); ?>
	                </div><!-- /.tab-twitter -->
	                <?php } ?>
	            </div><!-- /.tab-content -->
            </div>
        </div><!-- /.row -->
    </div>

	<?php
    return ob_get_clean();
}


// Buttons

add_shortcode('button', 'button_func');
function button_func($atts, $content = null){

	extract(shortcode_atts(array(
		'btntext' 	=> '',
		'btnlink' 	=> '',
		'color'		=> '',
		'type'		=> '',
		'size'		=> '',
	), $atts));
	ob_start(); ?>
	<?php 

		if($size == 'small'){
			$size2 = ' btn-small';
		}elseif($size == 'large'){
			$size2 = ' btn-large';
		}

		if($type == 'bor'){
			$type2 = ' btn-framed';
		}
		if($color == 'primary'){
			$color2 = ' btn-color-primary';
		}elseif($color == 'dark'){
			$color2 = ' btn-color-grey-dark';
		}
	?>
	<a href="<?php echo esc_url($btnlink); ?>" class="btn<?php echo esc_attr($size2.$type2.$color2); ?>"><?php echo esc_attr($btntext); ?></a>
	
	<?php return ob_get_clean();
}


// Latest News
add_shortcode('latestnew', 'latestnew_func');
function latestnew_func($atts, $content = null){
	extract(shortcode_atts(array(
		'number'    => 	'',
	), $atts));
	if(!$number){
		$number = 3;
	}
	ob_start(); ?>
	
	<div class="section-content news-small">

            <?php 

            $recent = new WP_Query( array(

            'post_type' => 'post', 

            'posts_per_page' => $number,

              ) );

            while ($recent->have_posts()) :$recent-> the_post();?>

            
            <article>
                <figure class="date"><i class="fa fa-file-o"></i><?php the_time('d-m-Y'); ?></figure>
                <header><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></header>
            </article>
            <?php endwhile; ?>

    </div>

    <?php

    return ob_get_clean();
}

// Slider Events
add_shortcode('sliderevent', 'sliderevent_func');
function sliderevent_func($atts, $content = null){
  extract(shortcode_atts(array(
    'number'    =>  '',
    'btn'       =>  '',
  ), $atts));
  if(!$number){
    $number = -1;
  }
  if(!$btn){
    $btn = 'View Event';
  }
  ob_start(); ?>
  
  <div class="flexslider event-slider">
        <ul class="slides">
        <?php 
        global $post;
        $args = array(    
          'paged' => $paged,
          'post_type' => 'tribe_events',
          'posts_per_page' => $number,
          );

        $wp_query = new WP_Query($args);

        while ($wp_query -> have_posts()): $wp_query -> the_post();

        if ( function_exists('rwmb_meta') ) {
      
        $images = rwmb_meta( '_cmb_event_img', "type=image" );

        $terms = get_the_terms( $post->ID, 'tribe_events_cat' );

        ?>
        <?php if($images){ ?>
            <li class="slide">
                <figure>
                    <div class="slide-wrapper">
                        <div class="inner">
                            <div class="container">
                              <?php foreach ( $terms as $term ) { ?>
                                <h2><?php echo htmlspecialchars_decode($term->name); ?></h2>
                                <?php } ?>
                                <h1><?php the_title(); ?></h1>
                                <div><a href="<?php the_permalink(); ?>" class="btn"><?php echo htmlspecialchars_decode($btn); ?></a></div>
                            </div>
                        </div><!-- /.inner -->
                    </div><!-- /.wrapper -->
                </figure>
                <?php foreach ( $images as $image ) { ?>
              <?php $img = $image['full_url']; ?>
                <img src="<?php echo esc_url($img); ?>">
                <?php } ?>
            </li>
        <?php } } ?>    
        <?php endwhile;?>    
        </ul>
    </div>        

    <?php

    return ob_get_clean();
}

// Latest Events
add_shortcode('latestevent', 'latestevent_func');
function latestevent_func($atts, $content = null){
	extract(shortcode_atts(array(
    'number'    =>  '',
    'btn'       =>  '',
		'type'      => 	'',
	), $atts));
	if(!$number){
		$number = 3;
	}
  if(!$btn){
    $btn = 'View Details';
  }
	ob_start(); ?>
	
	<div class="events <?php if($type != 'style2') echo 'small'; else echo 'images'; ?>">

            <?php 

            $recent = new WP_Query( array(

            'post_type' => 'tribe_events', 

            'posts_per_page' => $number
            ) );

            while ($recent->have_posts()) :$recent-> the_post();

            $datemonth = tribe_get_start_date( null, false );
            $locate = tribe_get_venue();
            $bg = get_post_meta(get_the_ID(),'_cmb_event_bgnote', true);
            $date = date('d', strtotime($datemonth));
            $month = date('M', strtotime($datemonth));
            $exc = get_post_meta(get_the_ID(),'_cmb_event_ex', true);

            if($type != 'style2') {
            ?>
            
            <article class="event">
                <figure class="date" style="<?php if($bg) echo 'background:'.esc_attr($bg).';'; ?>">
                    <div class="month"><?php echo htmlspecialchars_decode($month); ?></div>
                    <div class="day"><?php echo htmlspecialchars_decode($date); ?></div>
                </figure>
                <aside>
                    <header>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </header>
                    <div class="additional-info"><span class="fa fa-map-marker"></span> <?php echo htmlspecialchars_decode($locate); ?></div>
                </aside>
            </article>
            <?php }else{ ?>
            <article class="event">
                <div class="event-thumbnail">
                    <figure class="event-image">
                        <div class="image-wrapper"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>"></div>
                    </figure>
                    <figure class="date" style="<?php if($bg) echo 'background:'.esc_attr($bg).';'; ?>">
                        <div class="month"><?php echo htmlspecialchars_decode($month); ?></div>
                        <div class="day"><?php echo htmlspecialchars_decode($date); ?></div>
                    </figure>
                </div>
                <aside>
                    <header>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </header>
                    <div class="additional-info"><span class="fa fa-map-marker"></span> <?php echo htmlspecialchars_decode($locate); ?></div>
                    <div class="description">
                        <p><?php echo htmlspecialchars_decode($exc); ?></p>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="btn btn-framed btn-color-grey btn-small"><?php echo htmlspecialchars_decode($btn); ?></a>
                </aside>
            </article>

            <?php } endwhile; ?>

    </div>

    <?php

    return ob_get_clean();
}

// Featured Events
add_shortcode('featuredevent', 'featuredevent_func');
function featuredevent_func($atts, $content = null){
  extract(shortcode_atts(array(
    'number'    =>  '',
    'btn'       =>  '',
  ), $atts));
  if(!$number){
    $number = 4;
    $col = 3;
  }elseif($number == 3){
    $col = 4;
  }elseif ($number == 2) {
    $col = 6;
  }else{
    $col = 12;
  }
  if(!$btn){
    $btn = 'View Details';
  }
  ob_start(); ?>
  
  <div class="events images featured row">

            <?php 

            $recent = new WP_Query( array(

            'post_type' => 'tribe_events', 

            'posts_per_page' => $number,

            'featured'  => 'yes',
            ) );

            while ($recent->have_posts()) :$recent-> the_post();

            $datemonth = tribe_get_start_date( null, false );
            $bg = get_post_meta(get_the_ID(),'_cmb_event_bgnote', true);
            $locate = tribe_get_venue();
            $date = date('d', strtotime($datemonth));
            $month = date('M', strtotime($datemonth));

            ?>
            <div class="col-md-<?php echo esc_attr($col); ?>">
            <article class="event">
                <div class="event-thumbnail">
                    <figure class="event-image">
                        <div class="image-wrapper"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>"></div>
                    </figure>
                    <figure class="date">
                        <div class="month"><?php echo htmlspecialchars_decode($month); ?></div>
                        <div class="day"><?php echo htmlspecialchars_decode($date); ?></div>
                    </figure>
                </div>
                <aside>
                    <header>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </header>
                    <div class="additional-info"><span class="fa fa-map-marker"></span> <?php echo htmlspecialchars_decode($locate); ?></div>
                    <a href="<?php the_permalink(); ?>" class="btn btn-framed btn-color-grey btn-small"><?php echo htmlspecialchars_decode($btn); ?></a>
                </aside>
            </article>
            </div>
            <?php endwhile; ?>

    </div>

    <?php

    return ob_get_clean();
}

// Slider Courses
add_shortcode('slidercourse', 'slidercourse_func');
function slidercourse_func($atts, $content = null){
	extract(shortcode_atts(array(
		'number'    => 	'',
    'btn'       =>  '',
	), $atts));
	if(!$number){
		$number = -1;
	}
  if(!$btn){
    $btn = 'View Course';
  }
	ob_start(); ?>
	
	<div class="flexslider">
        <ul class="slides">
        <?php 
        global $post;
        $args = array(    
          'paged' => $paged,
          'post_type' => 'courses',
          'posts_per_page' => $number,
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

        if ( function_exists('rwmb_meta') ) {
      
      	$images = rwmb_meta( '_cmb_course_img', "type=image" );

        $terms = get_the_terms( $post->ID, 'courses_type' );

        ?>
        <?php if($images){ ?>
            <li class="slide">
                <figure>
                    <div class="slide-wrapper">
                        <div class="inner">
                            <div class="container">
                            	<?php foreach ( $terms as $term ) { ?>
                                <h2><?php echo htmlspecialchars_decode($term->name); ?></h2>
                                <?php } ?>
                                <h1><?php the_title(); ?></h1>
                                <div><a href="<?php the_permalink(); ?>" class="btn"><?php echo htmlspecialchars_decode($btn); ?></a></div>
                            </div>
                        </div><!-- /.inner -->
                    </div><!-- /.wrapper -->
                </figure>
                <?php foreach ( $images as $image ) { ?>
            	<?php $img = $image['full_url']; ?>
                <img src="<?php echo esc_url($img); ?>">
                <?php } ?>
            </li>
        <?php } } ?>    
        <?php endwhile;?>    
        </ul>
    </div>        

    <?php

    return ob_get_clean();
}

// Featured Courses
add_shortcode('featuredcourse', 'featuredcourse_func');
function featuredcourse_func($atts, $content = null){
	extract(shortcode_atts(array(
    'number'    =>  '',
		'btn'       => 	'',
	), $atts));
	if(!$number){
		$number = 4;
		$col = 3;
	}elseif($number == 3){
		$col = 4;
	}elseif ($number == 2) {
		$col = 6;
	}else{
		$col = 12;
	}
  if(!$btn){
    $btn = 'View Details';
  }
	ob_start(); ?>
	
		<div class="row">

            <?php 
            global $post;
            $recent = new WP_Query( array(

            'post_type' => 'courses', 

            'posts_per_page' => $number,
            'meta_query' => array(
                      array(
                              'key' => '_cmb_course_date',
                              'value' => time(),
                              'compare' => '>=',
                      ),
              ),
              'orderby' => '_cmb_course_date',
              'order' => 'DESC',
              'featured' => 'yes',
              ) );

            while ($recent->have_posts()) :$recent-> the_post();

            $datemonth = get_post_meta(get_the_ID(),'_cmb_course_date', true);
            $length = get_post_meta(get_the_ID(),'_cmb_course_length', true);
            $date = date('d-m-Y', strtotime($datemonth));
            $terms = get_the_terms( $post->ID, 'courses_type' );
            ?>
            <div class="col-sm-<?php echo esc_attr($col); ?>">
            <article class="featured-course">
                <figure class="image">
                    <div class="image-wrapper"><a href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>"></a></div>
                </figure>
                <div class="description">
                    <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                    <?php foreach ( $terms as $term ) { ?>
                        <a href="<?php echo esc_url( get_term_link( $term->slug, 'courses_type' ) ); ?>"><?php echo htmlspecialchars_decode($term->name); ?></a>
                    <?php } ?>
                    <hr>
                    <div class="course-meta">
                        <span class="course-date"><i class="fa fa-calendar-o"></i><?php echo htmlspecialchars_decode($date); ?></span>
                        <span class="course-length"><i class="fa fa-clock-o"></i><?php echo htmlspecialchars_decode($length); ?></span>
                    </div>
                    <div class="stick-to-bottom"><a href="<?php the_permalink(); ?>" class="btn btn-framed btn-color-grey btn-small"><?php echo htmlspecialchars_decode($btn); ?></a></div>
                </div>
            </article>
            </div>
            <?php endwhile; ?>

   		</div>

    <?php

    return ob_get_clean();
}

// Latest Courses
add_shortcode('latestcourse', 'latestcourse_func');
function latestcourse_func($atts, $content = null){
	extract(shortcode_atts(array(
		'number'    => 	'',
		'col'    	=> 	'',
	), $atts));
	if(!$number){
		$number = 6;
	}
	if($col == 1){
		$col1 = 12;
	}elseif($col == 4){
		$col1 = 3;
	}elseif ($col == 2) {
		$col1 = 6;
	}else{
		$col1 = 4;
	}
	ob_start(); ?>
	
		<div class="row">

            <?php 

            $recent = new WP_Query( array(

            'post_type' => 'courses', 

            'posts_per_page' => $number,
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
            $exc = get_post_meta(get_the_ID(),'_cmb_course_ex', true);
            $length = get_post_meta(get_the_ID(),'_cmb_course_length', true);
            $date = date('d-m-Y', strtotime($datemonth));
            ?>

            <div class="col-sm-<?php echo esc_attr($col1); ?>">
                <div class="latest-course">
                    <figure class="image">
                        <div class="image-wrapper"><a href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>"></a></div>
                    </figure>
                    <aside class="description">
                        <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                        <?php $ex = explode(' ', $exc, 12); array_pop($ex); $ex = implode(" ",$ex).'...';?>
                        <p><?php echo ($ex); ?></p>
                        <div class="course-meta">
                            <span class="course-date"><i class="fa fa-calendar-o"></i><?php echo htmlspecialchars_decode($date); ?></span>
                            <span class="course-length"><i class="fa fa-clock-o"></i><?php echo htmlspecialchars_decode($length); ?></span>
                        </div>
                    </aside>
                    <hr>
                </div><!-- /.latest-course -->
            </div>

            <?php endwhile; ?>

   		</div>

    <?php

    return ob_get_clean();
}

// List Courses
add_shortcode('listcourse', 'listcourse_func');
function listcourse_func($atts, $content = null){
	extract(shortcode_atts(array(
		'number'    => 	'',
		'btn'    	  => 	'',
		'link'    	=> 	'',
	), $atts));
	if(!$number){
		$number = 6;
	}
	ob_start(); ?>
	
		<div class="table-responsive">
            <table class="table table-hover course-list-table tablesorter">
                <thead>
                <tr>
                    <th><?php _e('Course Name','universo') ?></th>
                    <th><?php _e('Course Type','universo') ?></th>
                    <th class="starts"><?php _e('Starts','universo') ?></th>
                    <th class="length"><?php _e('Length','universo') ?></th>
                </tr>
                </thead>
                <tbody> 

                    <?php 
                    global $post;
                    $args = array(    
                      'paged' => $paged,
                      'post_type' => 'courses',
                      'posts_per_page' => $number,
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
                    $length = get_post_meta(get_the_ID(),'_cmb_course_length', true);
                    $date = date('m-d-Y', strtotime($datemonth));
                    $terms = get_the_terms( $post->ID, 'courses_type' );
                    ?>
                    <tr>
                        <th class="course-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></th>
                        <th class="course-category">
                            <?php foreach ( $terms as $term ) { ?>
                            <a href="<?php echo esc_url( get_term_link( $term->slug, 'courses_type' ) ); ?>"><?php echo htmlspecialchars_decode($term->name); ?></a><span>, </span>
                            <?php } ?>
                        </th>
                        <th class="course-date"><?php echo htmlspecialchars_decode($date); ?></th>
                        <th class="course-length"><?php echo htmlspecialchars_decode($length); ?></th>
                    </tr>

                    <?php endwhile;?>
                </tbody>
            </table>
        </div>
        <?php if($btn) { ?><a href="<?php echo esc_url($link); ?>" class="btn btn-framed btn-color-grey pull-right"><?php echo htmlspecialchars_decode($btn); ?></a><?php } ?>
    <?php

    return ob_get_clean();
}

// Make Donation

add_shortcode('donation', 'donation_func');
function donation_func($atts, $content = null){
	extract(shortcode_atts(array(
		'link'	=>	'',
		'text'	=>	'',
	), $atts));

	ob_start(); ?>

	<div class="section-content">
        <a target="_blank" href="<?php echo esc_url($link); ?>" class="universal-button">
            <h3><?php echo htmlspecialchars_decode($text) ?></h3>
            <figure class="date"><i class="fa fa-arrow-right"></i></figure>
        </a>
    </div>

    <?php

    return ob_get_clean();
}


// Testimonial Silder

add_shortcode('testslide','testslide_func');

function testslide_func($atts, $content = null){

	extract(shortcode_atts(array(

		'number'	=>		'',
		'bg'		=>		'',
		'color'		=>		'',

	), $atts));
	if(!$number){
		$number = -1;
	}

	ob_start(); ?>

	<div class="author-carousel" style="<?php if($bg) echo 'background:'.$bg.';'; ?>">

        <?php

			$args = array(

				'post_type' => 'testimonial',

				'posts_per_page' => $number,

			);

			$testimonial = new WP_Query($args);

			if($testimonial->have_posts()) : while($testimonial->have_posts()) : $testimonial->the_post();

		?>        
		
        <div class="author">
            <blockquote>
                <figure class="author-picture"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" alt=""></figure>
                <article class="paragraph-wrapper">
                    <div class="inner">
                        <header style="<?php if($color) echo 'color:'.$color.';'; ?>"><?php the_content(); ?></header>
                        <footer style="<?php if($color) echo 'color:'.$color.';'; ?>"><?php the_title(); ?></footer>
                    </div>
                </article>
            </blockquote>
        </div>

	    <?php endwhile; endif; ?>

	</div>



	<?php

    return ob_get_clean();

}


// Person
add_shortcode('persons', 'persons_func');
function persons_func($atts, $content = null){
	extract(shortcode_atts(array(
		'name'		=> 	'',
		'photo'		=> 	'',
		'job'		=> 	'',
		'bg'		=> 	'',
	), $atts));
	$img = wp_get_attachment_image_src($photo,'full');
	$img = $img[0];
	ob_start(); ?>

	<div class="author-block" style="<?php if($bg) echo 'background: '.esc_attr($bg).';';?>">
        <figure class="author-picture"><img src="<?php echo esc_url($img); ?>" alt=""></figure>
        <article class="paragraph-wrapper">
            <div class="inner">
                <header><?php echo htmlspecialchars_decode($name); ?></header>
                <figure><?php echo htmlspecialchars_decode($job); ?></figure>
                <p><?php echo htmlspecialchars_decode($content); ?></p>
            </div>
        </article>
    </div>        

	<?php

    return ob_get_clean();
}

// Learning Material
add_shortcode('material', 'material_func');
function material_func($atts, $content = null){
	extract(shortcode_atts(array(
		'name'		=> 	'',
		'photo'		=> 	'',
		'author'	=> 	'',
	), $atts));
	$img = wp_get_attachment_image_src($photo,'full');
	$img = $img[0];
	ob_start(); ?>

    <article class="learning-material">
        <figure class="learning-material-picture"><img src="<?php echo esc_url($img); ?>" alt=""></figure>
        <div class="learning-material-description">
            <h4><?php echo htmlspecialchars_decode($name); ?></h4>
            <figure><?php echo htmlspecialchars_decode($author); ?></figure>
            <p><?php echo htmlspecialchars_decode($content); ?></p>
        </div>
    </article>        

	<?php

    return ob_get_clean();
}


// Gallery
add_shortcode('galleries', 'galleries_func');
function galleries_func($atts, $content = null){
	extract(shortcode_atts(array(
		'gallery'	=> 	'',
		'width'		=> 	'',
	), $atts));

	ob_start(); ?>

	<ul class="gallery-list">
    	<?php 
		$img_ids = explode(",",$gallery);
		foreach( $img_ids AS $img_id ){ 
		$image_src = wp_get_attachment_image_src($img_id,''); ?>

            <li style="<?php if($width) echo 'width: '.$width.'; height: '.$width.';'; ?>"><a href="<?php echo esc_url( $image_src[0] ); ?>" class="image-popup"><img src="<?php echo esc_url( $image_src[0] ); ?>" alt=""></a></li>
     	     
        <?php } ?>
    </ul>        

	<?php

    return ob_get_clean();
}

// Logos Client
add_shortcode('logos', 'logos_func');
function logos_func($atts, $content = null){
	extract(shortcode_atts(array(
		'gallery'		=> 	'',
	), $atts));

	ob_start(); ?>

	<div class="logos">
    	<?php 
		$img_ids = explode(",",$gallery);
		foreach( $img_ids AS $img_id ){
		$meta = wp_prepare_attachment_for_js($img_id);
		$caption = $meta['caption'];
		$title = $meta['title'];	
		$description = $meta['description'];	
		$image_src = wp_get_attachment_image_src($img_id,''); ?>
        <?php if(!empty($caption)){ ?> 
        	<div class="logo"><a target="_blank" href="<?php echo esc_attr($caption); ?>">
	            <img src="<?php echo esc_url( $image_src[0] ); ?>" alt="<?php echo esc_attr($title); ?>">
	        </a></div>
        <?php }else{ ?>         	
	        <div class="logo"><img src="<?php echo esc_url( $image_src[0] ); ?>" alt="<?php echo esc_attr($title); ?>"></div>
        <?php } ?>
        <?php } ?>
    </div>        

	<?php

    return ob_get_clean();
}

// Google Map

add_shortcode('ggmap','ggmap_func');
function ggmap_func($atts, $content = null){
    extract( shortcode_atts( array(
	  'idmap'		=> 'map-canvas',
	  'height'		=> '',	
      'lat'   		=> '',
      'long'	  	=> '',
      'zoom'		=> '',
      'address'		=> '',
	  'mapcolor'	=> '',
	  'icon'		=> '',
   ), $atts ) );
   
   $img = wp_get_attachment_image_src($image,'full');
   $img = $img[0];
   
   $icon1 = wp_get_attachment_image_src($icon,'full');
   $icon1 = $icon1[0];
   if(!$zoom){
   	$zoom = 13;
   }
   		
    ob_start(); ?>
    	 
    <div id="<?php echo esc_attr( $idmap ); ?>" class="contacts-map" style="<?php if($height) echo 'height: '.$height.'px;'; ?>"></div>

    <script type="text/javascript">
	
	(function($) {
    "use strict"
    $(document).ready(function(){
        
        var locations = [
			['', <?php echo esc_js( $lat );?>, <?php echo esc_js( $long );?>, 2]
        ];
	
		var map = new google.maps.Map(document.getElementById('<?php echo esc_js( $idmap ); ?>'), {
		  zoom: <?php echo esc_js( $zoom );?>,
			scrollwheel: false,
			navigationControl: true,
			mapTypeControl: false,
			scaleControl: false,
			draggable: true,
			styles: [ { "stylers": [ { "hue": "<?php echo esc_js( $mapcolor );?>" }, { "gamma": 1 } ] } ],
			center: new google.maps.LatLng(<?php echo esc_js( $lat );?>, <?php echo esc_js( $long );?>),
		  mapTypeId: google.maps.MapTypeId.ROADMAP
		});
	
		var infowindow = new google.maps.InfoWindow();
	
		var marker, i;
	
		for (i = 0; i < locations.length; i++) {  
	  
			marker = new google.maps.Marker({ 
			position: new google.maps.LatLng(locations[i][1], locations[i][2]), 
			map: map ,
			icon: '<?php echo esc_js( $icon1 );?>'
			});
		
		  google.maps.event.addListener(marker, 'click', (function(marker, i) {
			return function() {
			  //infowindow.setContent(locations[i][0]);
			  //infowindow.open(map, marker);
			}
		  })(marker, i));
		}
        
        });
    })(jQuery);   	
   	</script>
<?php

    return ob_get_clean();

}