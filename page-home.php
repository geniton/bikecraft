<?php
// Template Name: Home
get_header();
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

<style type="text/css">

	.produtao{
		background:url('<?php echo $background_medium[0] ?>') no-repeat center;
		background-size: cover;
		width:100%;
		height:400px;
	}

	@media(min-width: 1028px){
		.produtao{
		background:url('<?php echo $background_large[0] ?>') no-repeat center;
	}

	}
</style>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<section class="introducao">
			<div class="container">
				<h1><?php the_field('titulo_introducao'); ?></h1>
				<blockquote class="quote-externo">
					<p><?php the_field('quote_introducao'); ?></p>
					<cite><?php the_field('citacao_introducao'); ?></cite>
				</blockquote>
				<a href="/bikcraft/produtos/" class="btn">Orçamento</a>
			</div>
		</section>
		
		<section class="produtos container animar">
			<div class="produtao"></div>
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
				<a href="/bikecraft/produtos/" class="btn btn-preto">Produtos</a>
			</div>

		</section>
		<!-- Fecha Produtos -->

		<section class="portfolio">
			<div class="container">
				<h2 class="subtitulo">Portfólio</h2>
				<?php include(TEMPLATEPATH . "/inc/clientes-portfolio.php"); ?>
			</div>
		</section>

		<?php include(TEMPLATEPATH . "/inc/qualidade.php"); ?>
<?php endwhile; else: endif; ?>

<?php get_footer(); ?>