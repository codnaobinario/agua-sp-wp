<div id="crise" class="hero">
  <div class="hero-inner">
    <a href="/" class="hero-logo">
      <img src="<?php echo get_template_directory_uri();?>/images/logo-large.svg" alt="<?php bloginfo('name');?>">
    </a>
    <div class="hero-copy">
      <?php
      $hero = get_page_by_title('Apresentação');
      echo $hero->post_content;
      ?>
    </div>
  </div>
  <section id="live">
    <div class="container stream-share">
      <h5>Compartilhe</h5>
      <a class="fb-share" href="#">
        <img src="<?php echo get_template_directory_uri();?>/images/icon-facebook.svg" alt="Share on Facebook">
      </a>
      <a class="twitter-share" href="https://twitter.com/share?text=Campanha Água@SP mapeia atores e propostas para o enfrentamento da crise em São Paulo: #AguaSP" target="_blank">
        <img src="<?php echo get_template_directory_uri();?>/images/icon-twitter.svg" alt="Share on Twitter">
      </a>
    </div>
  </section>
</div>
