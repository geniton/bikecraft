<?php
// Template Name: Produtos
get_header();
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<section class="container produto_item animar-interno">
			<div class="grid-11">
				<img src="<?php the_field('imagem_passeio1');?>" alt="Bikcraft Passeio">
				<h2><?php the_title() ?></h2>
			</div>
			<div class="grid-5 produto_icone"><img src="<?php the_field('imagem_passeio2');?>" alt="Icone Passeio"></div>
			<div class="grid-8"><img src="<?php the_field('imagem_passeio3');?>" alt="Bikcraft Passeio"></div>
			<div class="grid-8 produto_info">
        <?php the_field('descricao'); ?>
				<div>
        <?php if(have_rows('caracteristicas')): while(have_rows('caracteristicas')) : the_row(); ?>
          <?php the_sub_field('caracteristicas_text'); ?>
        <?php endwhile; else : endif; ?>
				<?php wp_reset_query(); ?>
      </div>
			</div>
		</section>
		<?php the_content(); ?>

		<section class="orcamento">
			<div class="container">
				<h2 class="subtitulo">Orçamento</h2>
				<form action="enviar.php" method="post" name="form" class="formphp form grid-8">
					<label for="nome">Nome</label>
					<input id="nome" name="nome" type="text">
					<label for="email">E-mail</label>
					<input id="email" name="email" type="text">
					<label for="telefone">Telefone</label>
					<input id="telefone" name="telefone" type="text">

					<label class="nao-aparece">Se você não é um robô, deixe em branco.</label>
					<input type="text" class="nao-aparece" name="leaveblank">
					<label class="nao-aparece">Se você não é um robô, não mude este campo.</label>
					<input type="text" class="nao-aparece" name="dontchange" value="http://" >

					<label for="mensagem">Especificações</label>
					<textarea name="mensagem" id="mensagem"></textarea>

					<button id="enviar" name="enviar" type="submit" class="btn">Enviar</button>
				</form>
				<div class="orcamento_dados grid-8">
					<h3>Dados</h3>
					<span>+55 21 9999-9999</span>
					<span>orcamento@bikcraft.com</span>
					<h3>Monte a sua Bikcraft</h3>
					<p>Escolha as especificações:</p>
					<ul>
						<li>- Cores</li>
    				<li>- Estilo</li>
    				<li>- Medidas</li>
   					<li>- Acessórios</li>
    				<li>- E Outros</li>
					</ul>
				</div>
			</div>
		</section>
<?php endwhile; else: endif; ?>

<?php get_footer(); ?>