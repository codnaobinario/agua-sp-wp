<?php

function themeslug_enqueue_script() {
    // wp_enqueue_script( 'jquery' );
    // wp_enqueue_script( 'jquery-form',array('jquery'),false,true );
    wp_register_script( 'bundlejs', get_template_directory_uri().'/bundle.js' );
    wp_localize_script('bundlejs', 'ajax_var', array(
        'url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('ajax-nonce')
    ));

    wp_enqueue_script('bundlejs', get_template_directory_uri().'/bundle.js', array(), '0.1', true );
}

add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_script' );

add_theme_support('post-thumbnails');

function simple_thumb($id) {

  $img = get_the_post_thumbnail($id, 'full');
  return preg_replace('/(height|width)="\d*"/', '', $img);
}

add_action('wp_ajax_nopriv_post-like', 'post_like');
add_action('wp_ajax_post-like', 'post_like');


function post_like()
{
    // Check for nonce security
    $nonce = $_POST['nonce'];

    if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) )
        die ( 'Busted!');

    if(isset($_POST['post_like']))
    {
        // Retrieve user IP address
        $ip = $_SERVER['REMOTE_ADDR'];
        $post_id = $_POST['post_id'];

        // Get voters'IPs for the current post
        $meta_IP = get_post_meta($post_id, "voted_IP");

        if (count($meta_IP)>0) {
            $voted_IP = $meta_IP[0];
        } else {
            $voted_IP = '';
        }

        if(!is_array($voted_IP))
            $voted_IP = array();

        // Get votes count for the current post
        $meta_count = get_post_meta($post_id, "votes_count", true);

        // Use has already voted ?
        if(!hasAlreadyVoted($post_id))
        {
            $voted_IP[$ip] = time();

            // Save IP and increase votes count
            update_post_meta($post_id, "voted_IP", $voted_IP);
            update_post_meta($post_id, "votes_count", ++$meta_count);

            // Display count (ie jQuery return value)
            echo $meta_count;
        }
        else
            echo "already";
    }
    exit;
}

function hasAlreadyVoted($post_id)
{
    global $timebeforerevote;

    // Retrieve post votes IPs
    $meta_IP = get_post_meta($post_id, "voted_IP");

    if (count($meta_IP)>0) {
        $voted_IP = $meta_IP[0];
    } else {
        $voted_IP = '';
    }

    if(!is_array($voted_IP))
        $voted_IP = array();

    // Retrieve current user IP
    $ip = $_SERVER['REMOTE_ADDR'];

    // If user has already voted
    if(in_array($ip, array_keys($voted_IP)))
    {
        $time = $voted_IP[$ip];
        $now = time();

        // Compare between current time and vote time
        if(round(($now - $time) / 60) > $timebeforerevote)
            return false;

        return true;
    }

    return false;
}

function getPostLikeLink($post_id)
{
    $themename = "onepage-agua-sp";

    $vote_count = get_post_meta($post_id, "votes_count", true);

    $output = '<p class="post-like">';
    if(hasAlreadyVoted($post_id))
        $output .= ' <span title="'.__('Eu apoio essa solução.', $themename).'" class="like alreadyvoted"><3</span>';
    else
        $output .= '<a href="#" data-post_id="'.$post_id.'">
                    <span  title="'.__('Eu apoio essa solução.', $themename).'"class="qtip like"><3</span>
                </a>';
    $output .= '<span class="count">'.$vote_count.'</span></p>';

    return $output;
}




//hook the Ajax call
//for logged-in users
add_action('wp_ajax_solucao_upload_action', 'solucao_ajax_upload');
//for none logged-in users
add_action('wp_ajax_nopriv_solucao_upload_action', 'solucao_ajax_upload');

function solucao_ajax_upload(){
//simple Security check
    $nonce = $_POST['nonce'];
    if ( ! wp_verify_nonce( $nonce, 'upload_thumb' ) )
        die ( 'Busted!');

    //insert POST data
    $my_post = array(
      'post_title'    => 'My post',
      'post_content'  => 'This is my post.',
      'post_status'   => 'pending',
      'post_type'     => 'solucao',
      'post_author'   => 1,
      'post_category' => array(8,39)
    );

    $post_id = wp_insert_post( $post, $wp_error );

    add_post_meta($post_id, $meta_key, $meta_value, $unique);

//require the needed files
    require_once(ABSPATH . "wp-admin" . '/includes/image.php');
    require_once(ABSPATH . "wp-admin" . '/includes/file.php');
    require_once(ABSPATH . "wp-admin" . '/includes/media.php');
//then loop over the files that were sent and store them using  media_handle_upload();
    if ($_FILES) {
        foreach ($_FILES as $file => $array) {
            if ($_FILES[$file]['error'] !== UPLOAD_ERR_OK) {
                echo "upload error : " . $_FILES[$file]['error'];
                die();
            }
            $attach_id = media_handle_upload( $file, $post_id );
        }
    }
//and if you want to set that image as Post  then use:
  update_post_meta($post_id,'_thumbnail_id',$attach_id);
  echo "uploaded the new Thumbnail";
  die();
}











// Register Custom Post Type
function solucoes_post_type() {

    $labels = array(
        'name'                => _x( 'Soluções', 'Post Type General Name', 'solucoes' ),
        'singular_name'       => _x( 'Solução', 'Post Type Singular Name', 'solucoes' ),
        'menu_name'           => __( 'Soluções', 'solucoes' ),
        'parent_item_colon'   => __( 'Parent Item:', 'solucoes' ),
        'all_items'           => __( 'Todas soluções', 'solucoes' ),
        'view_item'           => __( 'Ver solução', 'solucoes' ),
        'add_new_item'        => __( 'Adicionar solução', 'solucoes' ),
        'add_new'             => __( 'Adicionar nova', 'solucoes' ),
        'edit_item'           => __( 'Editar solução', 'solucoes' ),
        'update_item'         => __( 'Atualizar solução', 'solucoes' ),
        'search_items'        => __( 'Procurar solução', 'solucoes' ),
        'not_found'           => __( 'Não encontrada', 'solucoes' ),
        'not_found_in_trash'  => __( 'Não encontrada na lixeira', 'solucoes' ),
    );
    $args = array(
        'label'               => __( 'solucao', 'solucoes' ),
        'description'         => __( 'Soluções engloba iniciativas, propostas e ideias para ajudar a enfrentar a crise atual', 'solucoes' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'thumbnail', 'comments', 'custom-fields', ),
        'taxonomies'          => array( 'category', 'post_tag' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-lightbulb',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'solucao', $args );

}

// Hook into the 'init' action
add_action( 'init', 'solucoes_post_type', 0 );