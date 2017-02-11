<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js lt-ie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<?php global $universo_option; ?>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />

	<!-- Page Title 
	================================================== -->
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<?php if($universo_option['show_pre']) { ?>
<div class="images-preloader">
    <div class="rectangle-bounce">
      <div class="rect1"></div>
      <div class="rect2"></div>
      <div class="rect3"></div>
      <div class="rect4"></div>
      <div class="rect5"></div>
    </div>
</div>
<?php } ?>
<div id="wrapper">

    <div class="navigation-wrapper">
        <div class="secondary-navigation-wrapper">
            <div class="container">
                <?php if($universo_option['contact']) { ?>
                <div class="navigation-contact pull-left"><?php _e('Call Us:','universo') ?>                  
                <span class="opacity-70"><?php echo esc_html($universo_option['contact']); ?></span></div>
                <?php } ?>                
                <div class="search">
                    <form class="input-group" action="<?php echo esc_url(home_url('/')); ?>">
                        <input type="text" class="form-control" name="s" placeholder="<?php _e('Search','universo') ?>">
                        <span class="input-group-btn"><button type="submit" id="search-submit" class="btn"><i class="fa fa-search"></i></button></span>
                    </form><!-- /.input-group -->
                </div>
                
                <?php
                    $topmenu = array(
                    'theme_location'  => 'top',
                    'menu'            => '',
                    'container'       => '',
                    'container_class' => '',
                    'container_id'    => '',
                    'menu_class'      => 'secondary-navigation list-unstyled pull-right',
                    'menu_id'         => '',
                    'echo'            => true,
                    'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                    'walker'          => new wp_bootstrap_navwalker(),
                    'before'          => '',
                    'after'           => '',
                    'link_before'     => '',
                    'link_after'      => '',
                    'items_wrap'      => '<ul data-breakpoint="800" id="%1$s" class="%2$s">%3$s</ul>',
                    'depth'           => 0,
                );
                if ( has_nav_menu( 'top' ) ) {
                    wp_nav_menu( $topmenu );
                }
                ?>
            </div>
        </div><!-- /.secondary-navigation -->
        <div class="primary-navigation-wrapper">
            <header class="navbar" id="top" role="banner">
                <div class="container">
                    <div class="navbar-header">
                        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="navbar-brand nav" id="brand">
                            <a class="logo" href="<?php echo esc_url( home_url('/') ); ?>">
                                <img src="<?php echo esc_url($universo_option['logo']['url']); ?>" alt="">
                            </a>
                        </div>
                    </div>
                    <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                        <?php
                            $primarymenu = array(
                            'theme_location'  => 'primary',
                            'menu'            => '',
                            'container'       => '',
                            'container_class' => '',
                            'container_id'    => '',
                            'menu_class'      => 'nav navbar-nav',
                            'menu_id'         => '',
                            'echo'            => true,
                            'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                            'walker'          => new wp_bootstrap_navwalker(),
                            'before'          => '',
                            'after'           => '',
                            'link_before'     => '',
                            'link_after'      => '',
                            'items_wrap'      => '<ul data-breakpoint="800" id="%1$s" class="%2$s">%3$s</ul>',
                            'depth'           => 0,
                        );
                        if ( has_nav_menu( 'primary' ) ) {
                            wp_nav_menu( $primarymenu );
                        }
                        ?>
                    </nav><!-- /.navbar collapse-->
                </div><!-- /.container -->
            </header><!-- /.navbar -->
        </div><!-- /.primary-navigation -->
        <div class="background">
            <img src="<?php echo esc_url($universo_option['bg_menu']['url']); ?>" alt="">
        </div>
    </div>
    <!-- end Header -->