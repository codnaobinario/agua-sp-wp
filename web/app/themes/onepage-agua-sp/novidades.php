<section id="novidades">
	<div class="container">
		<h2>Novidades:</h2>

		<?php
		$novidades = get_posts('post_type=novidade&posts_per_page=100');

		foreach($novidades as $novidade) {
			setup_postdata( $novidade );
			$category = get_the_category($novidade->ID);
		?>
		<div class="novidade">
        	<div class="content">
	            <h6><?php echo $novidade->post_title;?></h6>
	            <div class="excerpt"><?php the_excerpt(); ?></div>
			</div>
		</div>
		<?php
		} wp_reset_postdata(); 
		?>

	</div>
</section>