<section id="solucoes">
<div class="container">
    <h2>Soluções</h2>
    <h5>QUER SOLUCIONAR ESSES PROBLEMAS? ESCOLHA AS MELHORES INICIATIVAS OU PROPONHA A SUA.</h5>

    <div class="minha-solucao">
      <div class="thumb-image">
        <img src="<?php echo get_template_directory_uri();?>/images/icon-cadastrar.svg" alt="">
      </div>
      <div class="content">
        <p>~ ~ ~</p>
        <p>Se você já tem uma iniciativa ou mesmo uma proposta, envie-nos e faça também parte da Aliança da Água!</p>
        <p>~ ~ ~</p>
        <a href="javascript:void(0);" class="button carregar-formulario">Quero contribuir</a>
      </div>
      <div id="form-cadastro" class="hide">
        <a href="#" class="close slide">X</a>
        <form class="thumbnail_upload" method="post" action="#" enctype="multipart/form-data" >
        <fieldset>
          <h4>Participe da aliança</h4>
          <br>

          <div class="input radio">
            <label for="">Qual o tipo de solução é a sua?</label>
            <input type="radio" name="type" value="2" checked="checked"> Iniciativa
            <input type="radio" name="type" value="1"> Proposta
          </div>

          <div class="input text">
            <label for="title">Nome</label>
            <input type="text" name="title" required>
          </div>

          <div class="input text">
            <label for="content">Descrição</label>
            <textarea name="content" required></textarea>
          </div>

          <div class="input select mostrar-solucao">
            <label for="categoria_solucao">Categoria</label>
            <select name="categoria_solucao" id="categoria_solucao">
              <option value="">Escolha...</option>
              <?php
                $terms = get_terms(array('categorias_solucao'), array('hide_empty'=>false));
                foreach ( $terms as $term ) {
                echo '<option value="' . $term->slug . '">' . $term->name . '</option>';
                }
              ?>
            </select>
          </div>

          <div class="input text mostrar-solucao">
            <label for="instituicao">Instituição</label>
            <input type="text" name="instituicao">
          </div>

          <div class="input text mostrar-solucao">
            <label for="url">URL</label>
            <input type="text" name="url">
          </div>

          <div class="input file mostrar-solucao">
            <label for="thumbnail">Imagem representativa</label>
            <input type="file" name="thumbnail" id="thumbnail">
          </div>

          <input type='hidden' value='<?php echo wp_create_nonce( 'upload_thumb' ); ?>' name='nonce' />
          <input type="hidden" name="action" id="action" value="solucao_upload_action">

          <input id="submit-ajax" name="submit-ajax" type="submit" value="Enviar Solução">
          <button class="close">Cancelar</button>
        </fieldset>
        </form>
        <div class="output1"></div>
      </div>
    </div>

    <?php


      // meta_key=votes_count&orderby=meta_value_num&order=DESC&
      $solucoes = get_posts('post_type=solucao&posts_per_page=0');
      $i = 1;

      foreach($solucoes as $solucao): setup_postdata( $post );
    ?>
      <div class="solucao">
        <div class="info" id="solucao-<?php echo $solucao->ID; ?>">
          <div class="thumb-image">
            <?php echo simple_thumb($solucao->ID);?>
          </div>
          <div class="content">
            <h6><?php echo $solucao->post_title;?></h6>
            <div class="excerpt"><?php the_excerpt(); ?></div>
            <a href="#" class="saiba-mais-solucoes button" data-post_id="<?php echo $solucao->ID; ?>">Saiba mais</a>
            <?php echo getPostLikeLink($solucao->ID);?>
            <div class="extra">
              <a href="#" class="close slide">X</a>
              <div class="thumb-image"><?php echo simple_thumb($solucao->ID);?></div>
              <div class="inner-content">
                <h6><?php echo $solucao->post_title;?></h6>
                <p><?php echo $solucao->post_content;?></p>
                <p><strong>Categoria: </strong><span><?php the_terms($solucao->ID, 'categorias_solucao', '', ', ' ); ?></span></p>
                <p><strong>Instiuição: </strong><span><?php echo get_post_meta( $solucao->ID, 'instituicao', true ); ?></span></p>
                <?php $url = get_post_meta( $solucao->ID, 'url', true ); ?>
                <p><strong>URL: </strong><a href="<?php echo $url; ?>"><?php echo $url; ?></a></p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php if ($i % 2): ?>
        </div>
        <div class="content-saiba-mais hide"></div>
        <div class="container">
      <?php endif; $i++; ?>
    <?php endforeach; wp_reset_postdata(); ?>
    </div>
    <?php if ($i % 2): ?>
    <div class="content-saiba-mais hide"></div>
    <?php endif; ?>
</section>
