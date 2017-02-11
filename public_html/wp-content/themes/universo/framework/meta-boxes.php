<?php

/**
 * Register meta boxes
 *
 * @since 1.0
 *
 * @param array $meta_boxes
 *
 * @return array
 */

function universo_register_meta_boxes( $meta_boxes ) {



	$prefix = '_cmb_';

	// Post format

	$meta_boxes[] = array(

		'id'       => 'format_detail',

		'title'    => __( 'Format Details', 'universo' ),

		'pages'    => array( 'post' ),

		'context'  => 'normal',

		'priority' => 'high',

		'autosave' => true,

		'fields'   => array(

			array(

				'name'             => __( 'Image', 'universo' ),

				'id'               => $prefix . 'image',

				'type'             => 'image_advanced',

				'class'            => 'image',

				'max_file_uploads' => 1,

			),

			array(

				'name'  => __( 'Gallery', 'universo' ),

				'id'    => $prefix . 'images',

				'type'  => 'image_advanced',

				'class' => 'gallery',

			),

			array(

				'name'  => __( 'Quote', 'universo' ),

				'id'    => $prefix . 'quote',

				'type'  => 'textarea',

				'cols'  => 20,

				'rows'  => 2,

				'class' => 'quote',

			),

			array(

				'name'  => __( 'Author', 'universo' ),

				'id'    => $prefix . 'quote_author',

				'type'  => 'text',

				'class' => 'quote',

			),

			array(

				'name'  => __( 'Audio', 'universo' ),

				'id'    => $prefix . 'link_audio',

				'type'  => 'textarea',

				'cols'  => 20,

				'rows'  => 2,

				'class' => 'audio',

				'desc' => 'Ex: https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/139083759',

			),

			array(

				'name'  => __( 'Video', 'universo' ),

				'id'    => $prefix . 'link_video',

				'type'  => 'textarea',

				'cols'  => 20,

				'rows'  => 2,

				'class' => 'video',

				'desc' => 'Example: <b>http://www.youtube.com/embed/0ecv0bT9DEo</b> or <b>http://player.vimeo.com/video/47355798</b>',

			),			

		),

	);

	$meta_boxes[] = array(

		'id'       => 'event_dt',

		'title'    => __( 'Event Details', 'universo' ),

		'pages'    => array( 'tribe_events' ),

		'context'  => 'normal',

		'priority' => 'high',

		'autosave' => true,

		'fields'   => array(				
			array(

				'name'  => __( 'Event Excerpt', 'universo' ),

				'id'    => $prefix . 'event_ex',

				'type'  => 'textarea',

				'class' => '',

			),
			array(

				'name'  => __( 'Background Date', 'universo' ),

				'id'    => $prefix . 'event_bgnote',

				'type'  => 'color',

				'class' => '',

			),
			array(

				'name'             => __( 'Event Image Slider', 'universo' ),

				'id'               => $prefix . 'event_img',

				'type'             => 'image_advanced',

				'max_file_uploads' => 1,

			),
		),

	);

	$meta_boxes[] = array(

		'id'       => 'courses_dt',

		'title'    => __( 'Course Details', 'universo' ),

		'pages'    => array( 'courses' ),

		'context'  => 'normal',

		'priority' => 'high',

		'autosave' => true,

		'fields'   => array(
			array(

				'name'  => __( 'Course Excerpt', 'universo' ),

				'id'    => $prefix . 'course_ex',

				'type'  => 'textarea',

				'class' => '',

			),				
			array(

				'name'  => __( 'Course Length', 'universo' ),

				'id'    => $prefix . 'course_length',

				'type'  => 'text',

				'class' => '',

			),			
			array(

				'name'  => __( 'Course Date Start', 'universo' ),

				'id'    => $prefix . 'course_date',

				'type'  => 'date',

				'class' => '',

			),
			array(

				'name'             => __( 'Course Image Slider', 'universo' ),

				'id'               => $prefix . 'course_img',

				'type'             => 'image_advanced',

				'max_file_uploads' => 1,

			),
		),

	);

	$meta_boxes[] = array(

		'id'       => 'professor_dt',

		'title'    => __( 'Professor Details', 'universo' ),

		'pages'    => array( 'team' ),

		'context'  => 'normal',

		'priority' => 'high',

		'autosave' => true,

		'fields'   => array(				

			array(

				'name'  => __( 'Professor Description', 'universo' ),

				'id'    => $prefix . 'professor_desc',

				'type'  => 'text',

				'class' => '',

			),			

		),

	);

	$meta_boxes[] = array(

		'id'       => 'page_dt',

		'title'    => __( 'Page Details', 'universo' ),

		'pages'    => array( 'page' ),

		'context'  => 'normal',

		'priority' => 'high',

		'autosave' => true,

		'fields'   => array(				

			array(

				'name'  => __( 'Page Title', 'universo' ),

				'id'    => $prefix . 'page_sub',

				'type'  => 'text',

				'class' => '',

			),			

		),

	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'universo_register_meta_boxes' );

/**
 * Enqueue scripts for admin
 *
 * @since  1.0
 */
function universo_admin_enqueue_scripts( $hook ) {
	// Detect to load un-minify scripts when WP_DEBUG is enable
	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	if ( in_array( $hook, array( 'post.php', 'post-new.php' ) ) ) {
		wp_enqueue_script( 'universo-backend-js', get_template_directory_uri()."/js/admin.js", array( 'jquery' ), '1.0.0', true );
	}
}
add_action( 'admin_enqueue_scripts', 'universo_admin_enqueue_scripts' );

