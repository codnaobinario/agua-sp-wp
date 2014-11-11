<section id="cadastre-se" class="tinted">
  <div class="container">
    <h2>Faça parte da campanha assinando a carta da aliança:</h2>
    <div class="registry">
      <form class="register" name="register" id="register" action="" method="get">
        <div id="messagesDiv"></div>
        <input type='text' id='nameInput' required name="name" placeholder='Nome'>
        <input type='email' id='emailInput' required name="name" placeholder='email'>
        <input type="submit" value="enviar">
      </form>
      <div class="social-register">
        <h2>Assinar usando redes socias:</h2>
        <div class="buttons">
          <div id="status"></div>
          <button id="fb-button">Facebook</button>
          <button id="google-button" class="customGPlusSignIn">Google</button>
        </div>
      </div>
    </div>
    <div class="report-download">
      <div class="report-box">
        <?php 
        $apoiar = get_page_by_title('Apoiar');
        $attachments = get_posts(array('post_type' => 'attachment', 'post_parent' => $apoiar->ID));
        $report = reset($attachments);
        ?>
        <img class="box" src="<?php echo get_template_directory_uri();?>/images/report-box.svg">
        <div class="report-link">
          <a href="<?php echo $report->guid;?>">
            <img src="<?php echo get_template_directory_uri();?>/images/report-icon.svg">
            <h5>carta da aliança</h5>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
