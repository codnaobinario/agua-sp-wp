<section id="solucoes">
<div class="container">
    <h2>Soluções</h2>
    <h5>QUER SOLUCIONAR ESSES PROBLEMAS? ESCOLHA AS MELHORES INICIATIVAS OU PROPONHA A SUA.</h5>

    <div class="minha-solucao">
      <div class="thumb-image">
        <img src="<?php echo get_template_directory_uri();?>/images/icon-cadastrar.svg" alt="">
      </div>
      <div class="content">
        <p>
        ~ ~ ~<br>
        Se você já tem uma iniciativa ou mesmo uma proposta, envie-nos e faça também parte da Aliança da Água!
        <br>~ ~ ~
        </p>
        <a href="javascript:void(0);" class="button carregar-formulario">Quero contribuir</a>
      </div>
      <div id="form-cadastro" class="hide">
        <form class="thumbnail_upload" method="post" action="#" enctype="multipart/form-data" >
          <input type="file" name="thumbnail" id="thumbnail">
          <input type='hidden' value='<?php echo wp_create_nonce( 'upload_thumb' ); ?>' name='nonce' />
          <input type="hidden" name="post_id" id="post_id" value="POSTID">
          <input type="hidden" name="action" id="action" value="solucao_upload_action">
          <input id="submit-ajax" name="submit-ajax" type="submit" value="upload">
        <form>
        <div class="output1"></div>
      </div>
    </div>

    <?php
      // meta_key=votes_count&orderby=meta_value_num&order=DESC&
      $solucoes = query_posts('category=Soluções');
      $i = 1;

      foreach($solucoes as $solucao):
    ?>
      <div class="solucao">
        <div class="info" id="solucao-<?php echo $solucao->ID; ?>">
          <div class="thumb-image">
            <?php echo simple_thumb($solucao->ID);?>
          </div>
          <div class="content">
            <h6><?php echo $solucao->post_title;?></h6>
            <a href="#" class="saiba-mais-solucoes" data-post_id="<?php echo $solucao->ID; ?>">Saiba mais</a>
            <?php echo getPostLikeLink($solucao->ID);?>
            <div class="extra">
              <?php echo $solucao->post_content;?>
            </div>
          </div>
        </div>
      </div>

      <?php if ($i % 2): ?>
        </div>
        <div class="content-saiba-mais hide"></div>
        <div class="container">
      <?php endif; $i++; ?>
    <?php endforeach; ?>
    </div>
    <?php if ($i % 2): ?>
    <div class="content-saiba-mais hide"></div>
    <?php endif; ?>
</section>
