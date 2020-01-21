<article>
  <?php if(has_post_thumbnail()) : ?>
    <a href="<?php the_permalink(); ?>">
      <?php the_post_thumbnail('thumbnail',array('class' => 'miniatura')); ?>
    </a>
  <?php endif; ?>
  <p>
    <?php echo get_the_date(); ?> -
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
    <?php comments_number( '0 comentario', '1 comentário', '% comentarios') ?>
  </p>
  <a href="<?php the_permalink(); ?>">Ler mais</a>
</article>