<?php
/*
 * Template Name: Home Page
 * */
?>
<?php get_header(); ?>
<?php get_search_form(); ?>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
  <div class="container">
    <?php
$args = array(
  'post_type' => 'post',
  'post_status' => 'publish',
  'category_name' => 'extra'
);
query_posts($args);
    ?>
    <?php if (have_posts()) : ?>
    <!--<ul>-->
    <?php while (have_posts()) : the_post(); ?>

    <?php
      if (function_exists('has_post_thumbnail') && has_post_thumbnail()) :
      the_post_thumbnail('news-thumb', array('class' => 'img-responsive'));
    ?>
    <?php else : ?>
        <img src="<?php echo get_template_directory_uri();?>/assets/img/screenshot.png" alt="">
    <?php endif; ?>

    <h1><?php the_title(); ?></h1>
    <?php the_category('+'); ?>
    <?php the_excerpt(); ?>
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
    <?php wp_reset_query(); ?>
  </div>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
