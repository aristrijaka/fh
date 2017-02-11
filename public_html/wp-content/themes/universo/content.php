<?php 
global $universo_option;
?>

<div class="col-md-6 col-sm-6">
  <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <article class="blog-listing-post">
      <?php if(has_post_thumbnail()) { ?>
      <figure class="blog-thumbnail bot-20">
          <figure class="blog-meta"><span class="fa fa-file-text-o"></span><?php the_time('d-m-y') ?></figure>
          <div class="image-wrapper">
            <a href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>"></a>
          </div>
      </figure>
      <?php } ?>
      <aside>
          <header class="no-top">
              <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
          </header>
          <div class="description">
              <p><?php echo universo_excerpt(); ?></p>
          </div>
          <a href="<?php the_permalink(); ?>" class="read-more"><?php echo esc_html( $universo_option['read_more'] ); ?></a>
      </aside>
    </article>
  </div>
</div>