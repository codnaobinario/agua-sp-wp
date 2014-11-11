<?php $quem = get_page_by_title('Quem somos');?>
<section id="quem-somos">
  <div class="container">
    <h2><?php echo $quem->post_title;?></h2>
    <div class="slogan">
      <?php echo $quem->post_content;?>
    </div>
  </div>
</div>
