<section id="solucoes">
  <div class="container">
    <h2>Soluções</h2>
    <h5>QUER SOLUCIONAR ESSES PROBLEMAS? ESCOLHA AS MELHORES INICIATIVAS OU PROPONHA A SUA.</h5>

    <ul>
      <?php
      $solucoes = get_posts(array('category' => 'Soluções'));
      foreach($solucoes as $solucao):
      ?>
        <li>
          <?php echo simple_thumb($solucao->ID);?>
          <div class="content">
            <h6><?php echo $solucao->post_title;?></h6>
            <?php echo $solucao->post_content;?>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>
