<?php get_header(); ?>
<br>
<br>
<br><br>
<br>
<br>
<br>
  <?php if( have_posts()) : ?>
    <?php while( have_posts()) : ?>
      <?php the_post(); ?>
      <?php the_archive_title(); ?>
      <?php the_content(); ?>
    <?php endwhile; ?>
  <?php endif; ?>
<?php get_footer(); ?>