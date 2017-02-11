<?php

/**
 * Template Name: Events
 */

 global $universo_option;
 $page_title = get_post_meta(get_the_ID(),'_cmb_page_sub', true);
get_header();


?>

<div class="container">
    <div class="breadcrumb">
        <?php //universo_breadcrumbs(); ?>
    </div>
</div>

<!-- content begin -->
<div id="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div id="page-main">
                    <section class="events images" id="events">
                        <?php while (have_posts()) : the_post()?>
                            <?php the_content(); ?>
                        <?php endwhile; ?>
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