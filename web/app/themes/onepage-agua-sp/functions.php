<?php
add_theme_support('post-thumbnails');

function simple_thumb($id) {
  $img = get_the_post_thumbnail($id, 'full');
  return preg_replace('/(height|width)="\d*"/', '', $img);
}
?>
