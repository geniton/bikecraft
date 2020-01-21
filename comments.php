<?php
  if(post_password_required()) {
    return;
  }

  if(have_comments()){
    foreach($comments as $comment) {
      ?>
      <div class="comentario">
        <div class="comentario_foto">
          <?php echo get_avatar($coment, 60); ?>
          <!-- get avatar precisa passar o comment e o tamanho da foto -->
        </div>
        <div class="comentario_area">
          <strong><?php comment_author(); ?></strong> - <?php comment_date(); ?><br/><br/>
          <?php comment_text(); ?>
        </div>
      </div>
      <?php
    }
  }

  comment_form(array(
    'comment_field' => '<textarea name="comment"></textarea><br/>',
    'fields' => array(
      'author' => 'Nome: <br/> <input type="text" name="author" placeholder="Digite seu nome" /><br/>',
      'email' => 'Email: <br/> <input type="text" name="email" placeholder="Digite seu email" /><br/>',
      'url' => 'Url: <br/> <input type="text" name="url" placeholder="Digite seu site" /><br/>'
    ),
    'class_submit' => 'botao',
    'label_submit' => 'Envie seu comentario',
    'title_reply' => 'Deixe um comentario',
    'title_reply_before' => '<h8 class="title__">',
    'title_reply_after' => '</h8>',
    
  ));
?>