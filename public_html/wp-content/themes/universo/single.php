<?php
 global $universo_option;

 $link_audio = get_post_meta(get_the_ID(),'_cmb_link_audio', true);
 $link_video = get_post_meta(get_the_ID(),'_cmb_link_video', true);
get_header();
?>

<div class="container">
  <?php universo_breadcrumbs(); ?>
</div>

<!-- CONTENT BLOG -->
<?php while (have_posts()) : the_post(); ?>
<!-- content begin -->
<div id="page-content">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div id="page-main">
          <article class="blog-detail no-top">
            <header class="blog-detail-header">
              <div class="media-post">
              <?php $format = get_post_format(); ?>
              <?php if($format=='audio'){ ?>

                <iframe style="width:100%" src="<?php echo esc_url($link_audio); ?>"></iframe>
  
                <?php } elseif($format=='video'){ ?>

                  <iframe height="170" src="<?php echo esc_url($link_video); ?>"></iframe>
 
                <?php } elseif($format=='gallery'){ ?>
                  <?php
                    if ( function_exists('rwmb_meta') ) { 
                  ?> 
                    <?php $images = rwmb_meta( '_cmb_images', "type=image" ); ?>
                    <?php if($images){ ?>
                      <div class="image-wrapper owl-blog">
                        <?php                                                        
                          foreach ( $images as $image ) {                              
                        ?>
                        <?php $img = $image['full_url']; ?>
                          <div><img src="<?php echo esc_url($img); ?>" alt=""></div> 
                        <?php } ?>                   
                      </div>
                    <?php } ?>
                  <?php } ?>
    
                <?php } else { $format=='image' ?>
                <?php
                  if ( function_exists('rwmb_meta') ) { 
                ?>
                  <?php $images = rwmb_meta( '_cmb_image', "type=image" ); ?>
                  <?php if($images){ ?>
                  <?php                                                        
                    foreach ( $images as $image ) {                              
                    ?>
                    <?php $img = $image['full_url']; ?>
                    <img src="<?php echo esc_url($img); ?>" alt="">
                    <?php } ?>
                  <?php } ?>
                <?php } ?>

                <?php } ?>
                </div>
                <h2><?php the_title(); ?></h2>
                <div class="blog-detail-meta">
                    <span class="date"><span class="fa fa-file-o"></span><?php the_time('d-m-y'); ?></span>
                    <span class="author"><span class="fa fa-user"></span><?php the_author(); ?></span>
                    <span class="comments"><span class="fa fa-comment-o"></span><?php comments_number( __('0 comment', 'universo'), __('1 comment', 'universo'), __('% comments', 'universo') ); ?></span>
                </div>
            </header>
            <hr>
            <?php the_content(); ?>
            <?php if(has_tag()) { ?>
            <section id="tags" class="tag">
                <?php the_tags('','' ); ?>
            </section>
            <?php } ?>
          </article>
            
          <hr>
          <section id="related-articles">
            <header><h2><?php _e('Related Articles', 'universo'); ?></h2></header>
            <div class="row">
              <?php $orig_post = $post;
                global $post;
                $categories = get_the_category($post->ID);
                if ($categories) {
                $category_ids = array();
                foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

                $args=array(
                'category__in' => $category_ids,
                'post__not_in' => array($post->ID),
                'posts_per_page'=> 2,
                'caller_get_posts'=>1
                );

                $my_query = new wp_query( $args );
                if( $my_query->have_posts() ) {             
                while( $my_query->have_posts() ) {
                $my_query->the_post();
              ?>
                <div class="col-md-6 col-sm-6">
                    <article class="blog-listing-post related">
                      <?php if ( has_post_thumbnail() ) { ?>
                      <figure class="blog-thumbnail">
                          <figure class="blog-meta"><span class="fa fa-file-text-o"></span><?php the_time('d-m-y'); ?></figure>
                          <div class="image-wrapper"><a href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>"></a></div>
                      </figure>
                      <?php }else{ ?>
                      <div class="blog-thumbnail thumb2">
                        <figure class="blog-meta"><span class="fa fa-file-text-o"></span><?php the_time('d-m-y'); ?></figure>
                      </div>
                      <?php } ?>
                      <aside>
                          <header>
                              <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                          </header>
                      </aside>
                    </article>
                </div>
              <?php 
                } } } wp_reset_postdata();              
              ?>  
            </div>
          </section>    
          <hr>
          <?php if ( comments_open() || get_comments_number() ) : ?>
          <?php if(get_comments_number() != 0) { ?> 
          <header>
            <h2><?php _e('Discussion', 'universo'); ?></h2>
          </header>
            <?php } comments_template(); endif; ?> 
        </div>
      </div>  
      <div class="col-md-4">
          <?php get_sidebar();?>
      </div>
    </div>
  </div>
 </div>

<?php endwhile;?>
  <!-- END CONTENT BLOG -->
<?php get_footer(); ?>	





  