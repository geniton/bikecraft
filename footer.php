		<?php 
			dynamic_sidebar('antes-rodape');
		?>
		<footer>
			<div class="footer">
				<div class="container">

					<div class="grid-8 footer_historia">
						<h3>Nossa História</h3>
						<p>Quando iniciamos a Bikcraft queriamos apenas um produto que adoraríamos utilizar. Eramos apaixonados por pedalar e também por fazer as coisas com as nossas próprias mãos. Assim surgiu um sonho na garagem da nossa casa.</p>
					</div>

					<div class="grid-4 footer_contato">
						<h3>Contato</h3>
						<ul>
							<li>- 21 9999-9999</li>
							<li>- contato@bikcraft.com</li>
							<li>- Botafago - RJ</li>
						</ul>
					</div>

					<div class="grid-4 footer_redes">
						<h3>Contato</h3>
						<ul>
							<li><a href="http://facebook.com" target="_blank"><img src="<?php bloginfo('template_directory');?>/img/redes-sociais/facebook.png" alt="Facebook Bikcraft"></a></li>
							<li><a href="http://instagram.com" target="_blank"><img src="<?php bloginfo('template_directory');?>/img/redes-sociais/instagram.png" alt="Instagram Bikcraft"></a></li>
							<li><a href="http://twitter.com" target="_blank"><img src="<?php bloginfo('template_directory');?>/img/redes-sociais/twitter.png" alt="Twitter Bikcraft"></a></li>
						</ul>
					</div>

				</div>
			</div>

			<div class="copy">
				<div class="container">
					<p class="grid-16">Bikcraft 2015 - Alguns direitos reservados.</p>
					<?php if ( has_nav_menu( 'menu-footer' ) ): 
                wp_nav_menu( array( 
                    'menu'  => 'menu-footer',
                    'theme_location' => 'menu-footer',
                    'container' => 'ul',
                    'depth'  => 0,
										'menu_class' => "footer__links",
										'walker' => new IBenic_Walker()
                ) );
            endif; ?>
				</div>
			</div>
		</footer>

	<!-- JavaScript -->

	<!-- JavaScript -->

	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-60088262-1', 'auto');
	  ga('send', 'pageview');

	</script>

	<!-- Inicio Wordpress Footer -->
	<?php wp_footer(); ?>
	<!-- Final Wordpress Footer -->

	</body>
</html>