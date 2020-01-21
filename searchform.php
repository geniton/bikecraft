<form role="form" method="GET" class="search__widget" action="<?php echo esc_html(home_url('/')); ?>">
  <input type="search" name="s" value="<?php the_search_query(); ?>">
  <input type="submit" value="Enviar">
</form>