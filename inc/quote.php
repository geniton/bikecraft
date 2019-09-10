<?php

function quote_shortcode($atts,$content){

  extract(
    shortcode_atts(array(
      'autor' => null
    ),$atts)
    );

$html = '<blockquote>';
$html .= $content;

if(!empty($autor)) :
  $html .= '<small>' . $autor . '</small>';
endif;

$html .= '</blockquote>';

return $html;

}

add_shortcode('quote', 'quote_shortcode');

?>