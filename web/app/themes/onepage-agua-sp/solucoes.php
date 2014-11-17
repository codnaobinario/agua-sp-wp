<section id="solucoes">
<div class="container">
    <h2>Soluções</h2>
    <h5>QUER SOLUCIONAR ESSES PROBLEMAS? ESCOLHA AS MELHORES INICIATIVAS OU PROPONHA A SUA.</h5>

    <?php
      // meta_key=votes_count&orderby=meta_value_num&order=DESC&
      $solucoes = query_posts('category=Soluções');

      $i=0;

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
</section>
