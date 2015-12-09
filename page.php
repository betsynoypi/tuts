<?php get_header(); ?>
<h1>Page Template</h1>
<?php if(is_page(array('about'))) : ?>
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
      <a href="<?php the_permalink(); ?>">Read More</a>
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
<?php elseif(is_page('sample-page')) : ?>
  <h1>sample page</h1>
<?php else : ?>
  <h2>wrong</h2>
<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
