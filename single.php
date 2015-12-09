<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<?php
if (function_exists('has_post_thumbnail') && has_post_thumbnail()) :
the_post_thumbnail('news-thumb', array('class' => 'img-responsive'));
?>
<?php else : ?>
<img src="<?php echo get_template_directory_uri();?>/assets/img/screenshot.png" alt="">
<?php endif; ?>

<h1><?php the_title(); ?></h1>
<?php the_content(); ?>

<?php
//for use in the loop, list 5 post titles related to first tag on current post
$tags = wp_get_post_tags($post->ID);
if ($tags) {
  echo 'Related Posts';
  $first_tag = $tags[0]->term_id;
  $args=array(
    'tag__in' => array($first_tag),
    'post__not_in' => array($post->ID),
    'posts_per_page'=>5,
    'caller_get_posts'=>1
  );
  $my_query = new WP_Query($args);
  if( $my_query->have_posts() ) {
    while ($my_query->have_posts()) : $my_query->the_post(); ?>
<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>

<?php
    endwhile;
  }
  wp_reset_query();
}
?>
<?php endwhile; ?>
<?php else : ?>
<article id="post-not-found">
  <header>
    <h1><?php _e("Not Found", "bonestheme"); ?></h1>
  </header>
  <section class="post_content">
    <p><?php _e("Sorry, but the requested resource was not found on this site.", "bonestheme"); ?></p>
  </section>
  <footer>
  </footer>
</article>
<?php endif; ?>
