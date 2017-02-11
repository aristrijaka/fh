<?php
$root =dirname(dirname(dirname(dirname(dirname(__FILE__)))));
if ( file_exists( $root.'/wp-load.php' ) ) {
    require_once( $root.'/wp-load.php' );
} elseif ( file_exists( $root.'/wp-config.php' ) ) {
    require_once( $root.'/wp-config.php' );
}
header("Content-type: text/css; charset=utf-8");
global $universo_option; 
?>
/* Color Theme - Amethyst /Violet/

main-color - <?php echo esc_attr( $universo_option['main-color'] ); ?>

second-color - <?php echo esc_attr( $universo_option['second-color'] ); ?>

bg-footer - <?php echo esc_attr( $universo_option['bg-footer'] ); ?>

bot-footer - <?php echo esc_attr( $universo_option['bg-sfooter'] ); ?>

/* 01 MAIN STYLES
****************************************************************************************************/

/**** Custom Background boxes ****/
.universo-boxed-wrapper{background-image: url("<?php echo esc_url($universo_option['boxed_bg']['url']); ?>");}

/**** Custom color ****/
a, blockquote article header,
.author-block article header,
.blog-detail .blog-detail-header h2,
.course-detail .course-date, .course-detail .event-date, 
.event-detail .course-date, .event-detail .event-date,
.course-schedule-block h4, .search-box header h2,
.details-accordion, .price-box figure, .price-box .price,
.universal-button.framed, .font-color-primary,
.link-icon:hover, .btn.btn-framed.btn-color-primary,
.sidebar .author-block article header, .product .view-detail-button,
.page-landing-page .course-info h2, #tribe-events-content .tribe-events-tooltip h4
{
	color: <?php echo esc_attr( $universo_option['main-color'] ); ?>;
}

.author.has-dark-background,
.events .event .date,
.pagination li span,
.pagination li span:hover,
.pagination li.active a,
.pagination li.active a:hover, 
.pagination li.active a:focus, 
.pagination li.active a:active,
.universal-button, .background-color-primary,
.btn.btn-color-primary, .newsletter-submit:hover,
.block-dark-background, .navigation-wrapper .background,
.btn.btn-framed.btn-color-primary:hover,
#page-footer #footer-content .background,
.page-landing-page .navigation-wrapper,
.page-landing-page .navigation-fixed,
.form-submit input, .btn:hover,
.wpcf7-form .wpcf7-submit,
.rectangle-bounce div, .tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-],
.image-carousel .owl-buttons .owl-prev:hover, 
.image-carousel .owl-buttons .owl-next:hover{
	background-color: <?php echo esc_attr( $universo_option['main-color'] ); ?>;
}
.woocommerce div.product form.cart .button:hover,
.woocommerce #review_form #respond .form-submit input:hover,
.woocommerce .cart .button:hover, .woocommerce .cart input.button:hover,
.product .view-detail-button:hover,
.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, 
.woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover{
  background: <?php echo esc_attr( $universo_option['main-color'] ); ?>;
}

.pagination li span,
.pagination li span:hover,
.pagination li.active a,
.pagination li.active a:hover, 
.pagination li.active a:focus, 
.pagination li.active a:active,
.price-box.recommended,
.btn.btn-framed.btn-color-primary,
.product .view-detail-button,
.woocommerce a > img.attachment-shop_catalog{
  border-color: <?php echo esc_attr( $universo_option['main-color'] ); ?>;
}
.product .product-inner{
  border-left-color: <?php echo esc_attr( $universo_option['main-color'] ); ?>;
  border-right-color: <?php echo esc_attr( $universo_option['main-color'] ); ?>;
}
.link-calendar:after,
.course-count-down .count-down-wrapper .count-divider,
.course-joined i, .course-list-table tbody tr.status-in-progress .status,
.course-schedule-block .course-completed-tag,
.course-schedule-block h4:before,
.search-box header .fa,
.course-thumbnail.small .description .btn:hover,
.panel-group .panel .panel-heading:before,
.vc_tta-panel-title:before,
.details-accordion:hover,
.details-accordion .fa,
.price-box .features li .fa.available,
.read-more:after, 
.font-color-secondary,
.has-dark-background a:hover,
.link-icon .fa, .navigation-wrapper a:hover,
.navigation-wrapper .secondary-navigation-wrapper ul li i,
.navigation-wrapper .primary-navigation-wrapper header nav .navbar-nav li.active a,
.btn.btn-framed, #page-footer a:hover,
.page-microsite #slider a:hover,
.navigation-wrapper .primary-navigation-wrapper header .navbar-nav li.active a,
.wpcf7-form #slider-form .wpcf7-submit
{
  color: <?php echo esc_attr( $universo_option['second-color'] ); ?>;
}
.connect-block .nav-pills li.active a,
.connect-block .nav-pills li.active a:hover,
.image-carousel .owl-buttons .owl-prev, .image-carousel .owl-buttons .owl-next,
.progress .progress-bar,
.universal-button figure,
.background-color-secondary,
.navigation-wrapper .primary-navigation-wrapper header nav .navbar-nav li .dropdown-menu li a:hover,
.btn, .btn.btn-framed:hover,
.navigation-wrapper .primary-navigation-wrapper header .navbar-nav li a:hover,
.tagcloud li a:hover,
.form-submit input:hover,
.wpcf7-form .wpcf7-submit:hover,
.newsletter-submit, .btn.btn-color-primary:hover,
.wpcf7-form #slider-form .wpcf7-submit:hover,
.tribe-events-day .tribe-events-day-time-slot h5,
#tribe-bar-form .tribe-bar-submit input[type=submit]:hover,
table.tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-]{
  background-color: <?php echo esc_attr( $universo_option['second-color'] ); ?>;
}
.woocommerce input.button.alt, .woocommerce input.button, .woocommerce a.button.alt,
.woocommerce div.product form.cart .button,
.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
.woocommerce #review_form #respond .form-submit input,
.woocommerce .woocommerce-error .button, .woocommerce .woocommerce-info .button, .woocommerce .woocommerce-message .button{
  background: <?php echo esc_attr( $universo_option['second-color'] ); ?>;
}
.course-list-table thead tr th,
.featured-course .image, .btn.btn-framed,
.content-team em, .wpcf7-form #slider-form .wpcf7-submit:hover, 
.wpcf7-form #slider-form .wpcf7-submit,
#tribe-events-content .tribe-events-calendar td.tribe-events-present{
  border-color: <?php echo esc_attr( $universo_option['second-color'] ); ?>;
}
.navigation-wrapper .primary-navigation-wrapper header nav .navbar-nav li .dropdown-menu li:first-child a:hover:after{
  border-color: transparent transparent <?php echo esc_attr( $universo_option['second-color'] ); ?> transparent;
}
.connect-block .nav-pills li a:after{
  border-color: transparent transparent transparent <?php echo esc_attr( $universo_option['second-color'] ); ?>;
}

#page-footer #footer-content .background{
  background-color: <?php echo esc_attr( $universo_option['bg-footer'] ); ?>;
}

#page-footer #footer-bottom{
	background: <?php echo esc_url( $universo_option['bg-sfooter'] ); ?>;
}