<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <h2 class="title"><?php single_cat_title(); ?></h2>
  <p class="<?php echo get_the_ID(); ?>"><?php the_title(); ?></p>
  <?php
    the_content();
  ?>
<?php endwhile; else: endif; ?>

<?php get_footer(); ?>