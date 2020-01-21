<?php
/*
settings -> vai armezar o conteudo no banco de dados
section -> a seção de cada widget
controllers -> cada uma das propriedades
*/
function registrando_sidebar(){
  register_sidebar(array(
    'name' => 'area antes do rodapé',
    'id' => 'antes-rodape',
    'descricption' => 'Insira widgets para aparecer antes do rodapé',
    'before_widget' => '<div class="widget %2$s">',
    'after_widget' => '</div>'
  ));
  
}
add_action('widgets_init', 'registrando_sidebar');


function registrando_widget(){
  register_widget('Widget_Ultimos_Posts');
}

add_action('widgets_init', 'registrando_widget');

class Widget_Ultimos_Posts extends WP_Widget{

  function __construct(){
    parent:: __construct(
      'Widget_Ultimos_Posts',
      'UUUltimos posts',
      array('description' => 'Widget para exibir os Últimos posts')
    );
  }

  public function widget ( $args, $instance ){
    $titulo = $instance["titulo"];
    echo '<p>'. $titulo . '</p>';
  }

  public function form ( $instance ){
    $titulo = $instance["titulo"];
    echo "<input type='text' id='".$this->get_field_id('titulo')."' name='".$this->get_field_name('titulo')."'/>";
  }

  public function update( $new_instance, $old_instance ){
    $instance = array();
    $instance["titulo"] = $new_instance["titulo"];
    return $instance;
  }

}

?>