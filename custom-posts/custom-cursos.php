<?php

function criar_custom_post_cursos() {

  register_post_type('cursos', array(
    'labels' => array(
      'name' => _x('Cursos', 'post type general name'),
      'singular_name' => _x('Curso', 'post type singular name'),
      'add_new' => _x('Adicionar Novo', 'Cursos'),
      'add_new_item' => __('Adicionar Curso'),
      'edit_item' => __('Editar Curso'),
      'new_item' => __('Novo Curso'),
      'all_items' => __('Todos os Cursos'),
      'view_item' => __('Ver Curso'),
      'search_items' => __('Buscar Cursos'),
      'not_found' =>  __('Nenhum Encontrado'),
      'not_found_in_trash' => __('Nenhum Encontrado no Lixo'),
      'parent_item_colon' => '',
      'menu_name' => 'Cursos'
    ),
    'public' => true,
    'publicly_queryable' => true, // por padrao ele herda do public
    'register_meta_box_cb' => 'cursos_meta_box',
    'menu_icon' => 'dashicons-editor-ul',
    'rewrite' => array('slug' => 'cursos'),
    'supports' => array('title', 'editor', 'thumbnail', 'page-attributes', 'excerpt'),
    'has_archive' => true,
    'hierarchical' => true
  )
);
}

add_action('init','criar_custom_post_cursos');

function cursos_meta_box(){
  add_meta_box('campos_gineton' , __('Informaçoes cursos de gineton'), 'campos_cursos', 'cursos' , 'side', 'high');
}

function campos_cursos(){
  global $post;
  $cursos_horario = get_post_meta($post->ID, 'curso_horario' , true)
  ?>
  <label>
    Horario:
    <input type="text" name="curso_horario" id="curso_horario" value="<?php echo $cursos_horario ?>">
  </label>
  <?php
}

function salvar_campos_curso(){
  global $post;
  update_post_meta($post->ID, 'curso_horario', $_POST['curso_horario']);
}

add_action( 'save_post', 'salvar_campos_curso' );

?>