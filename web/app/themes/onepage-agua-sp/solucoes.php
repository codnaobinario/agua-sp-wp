<section id="solucoes">
    <h2>Soluções</h2>
    <h5>QUER SOLUCIONAR ESSES PROBLEMAS? ESCOLHA AS MELHORES INICIATIVAS OU PROPONHA A SUA.</h5>

    <?php
      // meta_key=votes_count&orderby=meta_value_num&order=DESC&
      $solucoes = query_posts('category=Soluções');
// var_dump($solucoes);
      foreach($solucoes as $solucao):
    ?>
      <div class="solucao">
      <div class="info">
        <div class="thumb-image">
          <?php echo simple_thumb($solucao->ID);?>
        </div>
        <div class="content">
          <h6><?php echo $solucao->post_title;?></h6>
          <!-- <?php echo $solucao->post_content;?> -->
          <?php echo getPostLikeLink($solucao->ID);?>
        </div>
      </div>
      </div>
    <?php endforeach; ?>
</section>
