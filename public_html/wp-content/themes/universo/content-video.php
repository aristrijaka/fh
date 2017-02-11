<?php 
global $universo_option;
$link_video = get_post_meta(get_the_ID(),'_cmb_link_video', true);
?>

<div class="col-md-6 col-sm-6">
  <article class="blog-listing-post">
      <figure class="blog-thumbnail">
          <figure class="blog-meta"><span class="fa fa-file-text-o"></span><?php the_time('d-m-y') ?></figure>
          <div class="image-wrapper">
            <iframe height="210px" src="<?php echo esc_url( $link_video ); ?>"></iframe>
          </div>
      </figure>
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