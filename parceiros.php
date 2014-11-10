<?php 
$page = get_page_by_title('Parceiros');
$parceiros = get_attached_media('image', $page->ID);
?>
<section id="parceiros">
  <div class="container">
    <h3>Parceiros</h3>
    <div class="logos">
      <?php foreach($parceiros as $parceiro):?>
        <div class="logo">
          <?php if($parceiro->post_content):?><a href="<?php echo $parceiro->post_content;?>"><?php endif;?>
            <img src="<?php echo wp_get_attachment_url($parceiro->ID);?>" alt="<?php echo $parceiro->post_title;?>" title="<?php echo $parceiro->post_title?>">
          <?php if($parceiro->post_content):?></a><?php endif;?>
        </div>
      <?php endforeach;?>
    </div>
  </div>
</section>
