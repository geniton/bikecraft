<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="<?php bloginfo('description') ?>">
		<meta property="og:type" content="website"/>
		<meta property="og:title" content="<?php bloginfo('name'); ?>"/>
		<meta property="og:description" content="Compre a sua bicicleta personalizada na Bikcraft. Possuímos modelos Passeio, Retrô e Esporte."/>
		<meta property="og:url" content="http://bikcraft.com"/>
		<meta property="og:image" content="http://bikcraft.com/img/og-image.png"/>

		<meta name="viewport" content="width=device-width, initial-scale=1">
 
		<script src="js/libs/modernizr.custom.45655.js"></script>

		<!-- Inicio Wordpress Header -->
		<?php wp_head(); ?>
		<!-- Final Wordpress Header -->
	</head>
	<body <?php body_class(); ?>>

		<header class="header">
			<div class="container">
				<?php if( has_custom_logo()) : ?>
					<?php the_custom_logo(); ?>
				<?php endif; ?>
				<nav class="grid-12 header_menu">
					<?php
					if( has_nav_menu('header-menu')) :
						$args = array(
						'theme_location' => 'header-menu',
						'fallback_cb' => false,
						'container_class' => 'header__container',
						'container' => false,
						'menu_class' => 'header__menu2'
						);
						wp_nav_menu( $args );
					endif;
					?>
				</nav>
			</div>
		</header>