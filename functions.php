
<?php 
// Funções para Limpar o Header
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'start_post_rel_link', 10, 0 );
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

require_once( get_template_directory() . '/acf_groups/acf.php');
require_once( get_template_directory() . '/inc/quote.php');

define( 'ACF_LITE', false );

function my_custom_sizes(){
  add_image_size('large', 1400, 100, true);
  add_image_size('medium', 768, 100, true);
}

add_action('after_setup_theme', 'my_custom_sizes');


function custom_post_type_produtos() {
	register_post_type('produtos', array(
		'label' => 'Produtos',
		'description' => 'Produtos',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'produtos', 'with_front' => true),
		'query_var' => true,
		'supports' => array('title', 'editor', 'page-attributes','post-formats'),

		'labels' => array (
			'name' => 'Produtos',
			'singular_name' => 'Produto',
			'menu_name' => 'Produtos',
			'add_new' => 'Adicionar Novo',
			'add_new_item' => 'Adicionar Novo Produto',
			'edit' => 'Editar',
			'edit_item' => 'Editar Produto',
			'new_item' => 'Novo Produto',
			'view' => 'Ver Produto',
			'view_item' => 'Ver Produto',
			'search_items' => 'Procurar Produtos',
			'not_found' => 'Nenhum Produto Encontrado',
			'not_found_in_trash' => 'Nenhum Produto Encontrado no Lixo',
		)
	));
}
add_action('init', 'custom_post_type_produtos');

// Habilitar Menu
add_theme_support('menus');

//Function registar menu
function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );


function bikcraft_scripts() {
	// Desregistra o jQuery do Wordpress
	wp_deregister_script('jquery');
	// Registra o jQuery Novo
	wp_register_script( 'jquery', get_template_directory_uri() . '/js/libs/jquery-1.11.2.min.js', array(), "1.11.2", true );
	// Registra o Script de Plugins, com dependência do jquery, sem especificar versão e no footer do site
	wp_register_script( 'plugins-script', get_template_directory_uri() . '/js/plugins.js', array( 'jquery' ), false, true );
	// Registra o Script Principal, com dependência do jquery e plugins, sem especificar versão e no footer do site
	wp_register_script( 'main-script', get_template_directory_uri() . '/js/main.js', array( 'jquery', 'plugins-script' ), false, true );
	// Registrando app.js
	wp_register_script( 'app', get_template_directory_uri() . '/js/app.js', array( ), false, true );
	// Registrando modernaize
	wp_register_script( 'modernize', get_template_directory_uri() . '/js/libs/modernizr.custom.45655.js', array(), "45655", false );
	// Coloca script no site
	wp_enqueue_script( 'main-script' );
	wp_enqueue_script( 'modernize' );
	wp_enqueue_script( 'app' );
}

add_action( 'wp_enqueue_scripts', 'bikcraft_scripts' );

function origamid_css(){
	wp_register_style('origamid-style', get_template_directory_uri() . '/style.css', array(), false, false);
	wp_enqueue_style( 'origamid-style' );
}

add_action('wp_enqueue_scripts', 'origamid_css')
?>