<?php
get_header();
?>
<?php if( have_posts()) : ?>
  <?php while( have_posts() ): ?>
    <?php the_post(); ?>

    <article>
      <?php if(has_post_thumbnail()) : ?>
        <?php the_post_thumbnail( 'thumbnail'  ,array('class' => 'miniatura') ); ?>
      <?php endif; ?>
      <p>
        <?php echo get_the_date(); ?> -
        <a href="<?php get_author_posts_url (get_the_author_meta('ID')); ?>" >
          <?php the_category(', ') ?>
          <?php
          // $categoria = get_the_category();
          // if ($categoria) {
          //   foreach ($categoria as $category) {
          //       $output .= '<a class="haha" href="' . get_category_link($category->term_id) . '" title="' . esc_attr(sprintf(__("View all posts in %s"), $category->name)) . '">' . $category->cat_name . '</a>' . $separator;
          //   }

          //   echo trim($output, $separator);
          // }
          ?>
        </a>
      </p>
      <p>
        <?php the_content(); ?>
      </p>
    </article>
    <hr>
    <?php if( comments_open()){
      ?>
      <p>
        <?php comments_number( 'Comentarios', '1 comentário', '% comentarios') ?>
      </p>
      <?php
        comments_template();
    } ?>
    <hr>

    <?php 
      $categorias = get_the_category();

      $id = $post->ID;
      $the_query = new WP_Query(array(
        'posts_per_page' => -1,
        'post__not_in' => array($id),
        'cat' => $categorias[0]->term_id
      ));

      if( $the_query->have_posts()) :  
        while( $the_query->have_posts()) : 
          $the_query->the_post();
          get_template_part('template_parts/related_post');
        endwhile; 
        wp_reset_postdata();
      endif;
      ?>

  <?php endwhile; ?>
<?php endif; ?>
<div class="paginacao">
  <div><?php previous_post_link('%link','previous');?></div>
  <div><?php next_post_link('%link','next'); ?></div>
</div>

<?php
get_footer();
?>