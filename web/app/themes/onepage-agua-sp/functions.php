<?php

function themeslug_enqueue_script() {
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