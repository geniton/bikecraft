<?php
// Template Name: Home
get_header();

$hero = get_field('banner');
//comentando
//comentando five

///removir
?>

<?php
	$image_id = get_field('background_home');
	$background_medium = wp_get_attachment_image_src($image_id, 'medium');
	$background_large = wp_get_attachment_image_src($image_id, 'large');
	
?>


<?php
$args = array (
'post_type' => 'produtos',
'posts_per_page' => '3'
);
$the_query = new WP_Query ( $args );
?>

<?php
$args_post = array (
'post_type' => 'post',
'posts_per_page' => '-1'
);
$the_post = new WP_Query ( $args_post );
?>

<style type="text/css">

	.produtao{
		background:url(<?php echo $background_medium[0] ?>) no-repeat center;
		background-size: cover;
		width:100%;
		height:400px;
	}

	@media(min-width: 1028px){
		.produtao{
		background:url(<?php echo $background_large[0] ?>) no-repeat center;
	}

	}
</style>
		<?php if(!empty($hero) && isset($hero)) { ?>
			<div class="banner">
				<div class="banner-container">
					<div class="banner-slides" data-flickity='{ "cellAlign": "left", "contain": true, "dots": true }'>
						<?php foreach ($hero as $item) { ?>
							<div class="banner-slide<?php echo $item['mascara'] ? ' mask' : ''?>" style="background-image: url(<?php echo $item['imagem']; ?>)">
								<?php if( $item['texto']) :?>	
									<div style="position: relative; top:140px; z-index: 10000;">
										<?php echo $item['texto']; ?>
									</div>
								<?php endif; ?>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		<?php } ?>
		<section class="produtos container animar">
			<h2 class="subtitulo">Produtos</h2>
			<ul class="produtos_lista">
				<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<li class="grid-1-3">
						<div class="produtos_icone">
							<img src="<?php the_field('imagem_passeio2') ?>" alt="Bikcraft Passeio">
						</div>
						<h3><?php the_title(); ?></h3>
						<p><?php the_field('descricao');?></p>
					</li>
				<?php endwhile; else: endif; ?>
				<?php wp_reset_query(); wp_reset_postdata(); ?>
			</ul>

			<div class="call">
				<p><?php the_field('chamada_produtos'); ?></p>
				<a href="/bikecraft/produtos/" class="btn btn-preto">Produtoooos</a>
			</div>

		</section>
		<!-- Fecha Produtos -->
		<section class="portfolio">
			<div class="container">
				<h2 class="subtitulo">Portfólio</h2>
				<?php include(TEMPLATEPATH . "/inc/clientes-portfolio.php"); ?>
			</div>
		</section>

	<?php 
	// Pegando todas as cidades
			$terms = get_terms(array(
				'taxonomy' => 'cidades',
				'hide_empty' => true
			));

			foreach( $terms as $term ){
				// echo '<pre>';
				// print_r($term);
				// echo '</pre>';
				echo '<li><a href=' . get_term_link($term->term_id, "cidades") . '>' . $term->name . '</a></li>';
			}
	?>

<?php if( $the_post->have_posts() ): ?>
  <?php while( $the_post->have_posts() ): ?>
    <?php $the_post->the_post(); ?>

    <article>
      <?php if(has_post_thumbnail()) : ?>
        <a href="<?php the_permalink(); ?>">
          <?php the_post_thumbnail('thumbnail',array('class' => 'miniatura')); ?>
        </a>
      <?php endif; ?>
      <p>
        <?php echo get_the_date(); ?> -
        <a href="<?php get_author_posts_url (get_the_author_meta('ID')); ?>" >
          <?php the_author(); ?> |	
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
        <?php the_excerpt(); ?>
      </p>
      <p>
        <?php comments_number( '0 comentario', '1 comentário', '% comentarios') ?>
      </p>
      <a href="<?php the_permalink(); ?>">Ler mais</a>
    </article>
<?php endwhile; ?>
<?php endif; ?>
	<div class="paginacao">
			<div><?php previous_posts_link('Página Anteriores');?></div>
			<div><?php next_posts_link('Próxima Página'); ?></div>
		</div>

<?php get_footer(); ?>