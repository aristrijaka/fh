<?php global $universo_option; ?>

<div class="col-md-6 col-sm-6">
  <article class="blog-listing-post">
      <?php
        if ( function_exists('rwmb_meta') ) { 
      ?>
      <?php $images = rwmb_meta( '_cmb_images', "type=image" ); ?>

      <?php if($images){ ?>
      <figure class="blog-thumbnail">
          <figure class="blog-meta"><span class="fa fa-file-text-o"></span><?php the_time('d-m-y') ?></figure>
          <div class="image-wrapper owl-blog">
            <?php foreach ( $images as $image ) { ?>
            <?php $img = $image['full_url']; ?>
              <div><img src="<?php echo esc_url($img); ?>"></div>
            <?php } ?>
          </div>
      </figure>
      <?php } } ?>  
    <aside>
        <header>
            <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
        </header>
        <div class="description">
            <p><?php echo universo_excerpt(); ?></p>
        </div>
        <a href="<?php the_permalink(); ?>" class="read-more"><?php echo esc_html( $universo_option['read_more'] ); ?></a>
    </aside>
  </article>
</div>