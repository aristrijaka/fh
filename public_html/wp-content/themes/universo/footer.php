<?php
/**
 * The template for displaying the footer
 */
 global $universo_option; 
?>


        <!-- Footer -->
        <footer id="page-footer">
            <?php if($universo_option['top_footer']) { ?>
            <section id="footer-top">
                <div class="container">
                    <div class="footer-inner">
                        <div class="footer-social">
                            <figure><?php _e('Follow us:', 'universo'); ?></figure>
                            <div class="icons">
                                <?php if($universo_option['facebook']) { ?>
                                <a target="_blank" href="<?php echo esc_url($universo_option['facebook']); ?>" class="social-icon sb-icon-facebook"><i class="fa fa-facebook fa-lg"></i></a>
                                <?php } ?>
                                <?php if($universo_option['twitter']) { ?>
                                <a target="_blank" href="<?php echo esc_url($universo_option['twitter']); ?>" class="social-icon sb-icon-twitter"><i class="fa fa-twitter fa-lg"></i></a>
                                <?php } ?>
                                <?php if($universo_option['github']) { ?>
                                <a target="_blank" href="<?php echo esc_url($universo_option['github']); ?>" class="social-icon sb-icon-github"><i class="fa fa-github fa-lg"></i></a>
                                <?php } ?>
                                <?php if($universo_option['dribbble']) { ?>
                                <a target="_blank" href="<?php echo esc_url($universo_option['dribbble']); ?>" class="social-icon sb-icon-dribbble"><i class="fa fa-dribbble fa-lg"></i></a>
                                <?php } ?>
                                <?php if($universo_option['linkedin']) { ?>
                                <a target="_blank" href="<?php echo esc_url($universo_option['linkedin']); ?>" class="social-icon sb-icon-linkedin"><i class="fa fa-linkedin fa-lg"></i></a>
                                <?php } ?>
                                <?php if($universo_option['vimeo']) { ?>
                                <a target="_blank" href="<?php echo esc_url($universo_option['vimeo']); ?>" class="social-icon sb-icon-vimeo"><i class="fa fa-vimeo-square fa-lg"></i></a>
                                <?php } ?>
                                
                                <?php if($universo_option['instagram']) { ?>
                                <a target="_blank" href="<?php echo esc_url($universo_option['instagram']); ?>" class="social-icon sb-icon-instagram"><i class="fa fa-instagram fa-lg"></i></a>
                                <?php } ?>
                                <?php if($universo_option['youtube']) { ?>
                                <a target="_blank" href="<?php echo esc_url($universo_option['youtube']); ?>" class="social-icon sb-icon-youtube"><i class="fa fa-youtube fa-lg"></i></a>
                                <?php } ?>
                                <?php if($universo_option['skype']) { ?>
                                <a target="_blank" href="<?php echo esc_url($universo_option['skype']); ?>" class="social-icon sb-icon-skype"><i class="fa fa-skype fa-lg"></i></a>
                                <?php } ?>
                                <?php if($universo_option['google']) { ?>
                                <a target="_blank" href="<?php echo esc_url($universo_option['google']); ?>" class="social-icon sb-icon-google"><i class="fa fa-google-plus fa-lg"></i></a>
                                <?php } ?>
                                <?php if($universo_option['behance']) { ?>
                                <a target="_blank" href="<?php echo esc_url($universo_option['behance']); ?>" class="social-icon sb-icon-behance"><i class="fa fa-behance fa-lg"></i></a>
                                <?php } ?>
                                <?php if($universo_option['rss']) { ?>
                                <a target="_blank" href="<?php echo esc_url($universo_option['rss']); ?>" class="social-icon sb-icon-rss"><i class="fa fa-rss fa-lg"></i></a>
                                <?php } ?>   
                            </div><!-- /.icons -->
                        </div><!-- /.social -->
                        <div class="search pull-right">
                            <form action="<?php echo home_url('/'); ?>">
                                <div class="input-group">
                                    <input class="form-control" name="s" type="search" placeholder=" <?php _e('Search...', 'universo'); ?> ">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                                </span>
                                </div><!-- /input-group -->
                            </form>
                        </div><!-- /.pull-right -->
                    </div><!-- /.footer-inner -->
                </div><!-- /.container -->
            </section><!-- /#footer-top -->
            <?php } ?>
            <section id="footer-content">
                <div class="container">
                    <div class="row">
                        <?php get_sidebar('footer');?>
                    </div><!-- /.row -->
                </div><!-- /.container -->
                <div class="background">
                    <img src="<?php echo esc_url($universo_option['bgimg_footer']['url']); ?>" alt="">
                </div>
            </section><!-- /#footer-content -->

            <section id="footer-bottom">
                <div class="container">
                    <div class="footer-inner">
                        <div class="copyright"><?php echo esc_html($universo_option['footer_text']); ?></div><!-- /.copyright -->
                        <?php
                            $botmenu = array(
                            'theme_location'  => 'bottom',
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
                        if ( has_nav_menu( 'bottom' ) ) {
                            wp_nav_menu( $botmenu );
                        }
                        ?>
                    </div><!-- /.footer-inner -->
                </div><!-- /.container -->
            </section><!-- /#footer-bottom -->

        </footer>
	
</div><!-- #wrapper -->
<?php wp_footer(); ?>
    
</body>
</html>