
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

function theme_scripts(){

	wp_enqueue_style('chart_css', get_template_directory_uri() . '/node_modules/flickity/dist/flickity.min.css');
	wp_enqueue_script('flickity_js', get_template_directory_uri() . '/node_modules/flickity/dist/flickity.pkgd.min.js', NULL, NULL, true);
	wp_enqueue_script('carousel_js', get_template_directory_uri() . '/js/carousel.js', NULL, NULL, true);

}

add_action('wp_enqueue_scripts','theme_scripts');


require_once (get_template_directory() . '/custom-posts/custom-produtos.php');
require_once (get_template_directory() . '/custom-posts/custom-cursos.php');
require_once (get_template_directory() . '/custom-posts/taxonomias.php');
require_once (get_template_directory() . '/acf_groups/acf.php');
require_once (get_template_directory() . '/inc/quote.php');
require_once (get_template_directory() . '/widgets/ultimos-posts.php');

define( 'ACF_LITE', false );


// Custom images
function my_custom_sizes(){
  add_image_size('large', 1400, 100, true);
  add_image_size('medium', 768, 100, true);
}

add_action('after_setup_theme', 'my_custom_sizes');


function novo_tamanho_do_resumo($length) {
	return 20;
}
add_filter('excerpt_length', 'novo_tamanho_do_resumo');



add_filter( 'get_custom_logo', 'add_custom_logo_url' );
function add_custom_logo_url() {
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $html = sprintf( '<a href="%1$s" class="grid-4" rel="home" itemprop="url">%2$s</a>',
            esc_url( home_url('/') ),
            wp_get_attachment_image( $custom_logo_id, 'full', false, array(
                'class'    => 'grid-4__img',
            ) )
				);
    return $html;   
} 

// Habilitar Menu

function gb_setup(){

	add_theme_support('menus');
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('custom-logo');

}

add_action('after_setup_theme','gb_setup');


function setups() {
  register_nav_menus(array(
		'header-menu' => __( 'Header Menu' ),
		'menu-footer' => __( 'Footer Menu' )
	));
}

add_action( 'after_setup_theme', 'setups' );


// add scripts footer
function bikcraft_scripts() {
	wp_deregister_script('jquery');
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/libs/jquery-1.11.2.min.js', array(), "1.11.2", true );
	wp_enqueue_script( 'plugins-script', get_template_directory_uri() . '/js/plugins.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'main-script', get_template_directory_uri() . '/js/main.js', array( 'jquery', 'plugins-script' ), false, true );
	wp_enqueue_script( 'app', get_template_directory_uri() . '/js/app.js', array( ), false, true );
	wp_enqueue_script( 'modernize', get_template_directory_uri() . '/js/libs/modernizr.custom.45655.js', array(), "45655", false );
}

add_action( 'wp_enqueue_scripts', 'bikcraft_scripts' );


// add link head
function origamid_css(){
	wp_register_style('origamid-style', get_template_directory_uri() . '/style.css', array(), false, false);
	wp_enqueue_style( 'origamid-style' );
}

add_action('wp_enqueue_scripts', 'origamid_css')
?>

<?php 

//walker

class IBenic_Walker extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
		$object = $item->object;
		$type = $item->type;
		$title = $item->title;
		$description = $item->description;
		$permalink = $item->url;
		$output .= "<li class='" .  implode(" ", $item->classes) . "'>";
			
		//Add SPAN if no Permalink
		if( $permalink && $permalink != '#' ) {
			$output .= '<a href="' . $permalink . '">';
		} else {
			$output .= '<span>';
		}
		 
		$output .= $title;
		if( $description != '' && $depth == 0 ) {
			$output .= '<small class="description">' . $description . '</small>';
		}
		if( $permalink && $permalink != '#' ) {
			$output .= '</a>';
		} else {
			$output .= '</span>';
		}
	}
}

?>