<?php $agenda = get_page_by_title('Agenda mínima');?>
<?php $urgentes = get_page_by_title('Ações urgentes');?>
<?php $medio_prazo = get_page_by_title('Ações de médio prazo');?>
<section id="agenda" class="tinted">
  <div class="container">
    <h2><?php echo $agenda->post_title;?></h2>
    <?php echo $agenda->post_content;?>
    <div class="actions">
      <div class="type">
        <?php echo $urgentes->post_content;?>
      </div>
      <div class="type">
        <?php echo $medio_prazo->post_content;?>
      </div>
    </div>
  </div>
</section>
