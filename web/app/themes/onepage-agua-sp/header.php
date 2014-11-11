<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php bloginfo('title'); ?></title>
  <meta name="description" content="<?php bloginfo('description'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Twitter Card data -->
  <meta name="twitter:card" content="summary">
  <!--meta name="twitter:site" content="@"-->
  <meta name="twitter:title" content="<?php bloginfo('title'); ?>">
  <meta name="twitter:description" content="Estou assistindo ao vivo o lançamento do Água@SP. Assista comigo nesse link: http://aguasp.socioambiental.org/">
  <!--meta name="twitter:creator" content="@"-->
  <meta name="twitter:image" content="<?php echo get_template_directory_uri();?>/images/social.png">

  <!-- Open Graph data -->
  <meta property="og:title" content="Aliança pela Água">
  <meta property="og:type" content="site">
  <meta property="og:url" content="<?php bloginfo('url'); ?>">
  <meta property="og:image" content="<?php echo get_template_directory_uri();?>/images/social.png">
  <meta property="og:description" content="<?php bloginfo('description'); ?>">
  <meta property="og:site_name" content="<?php bloginfo('title'); ?>">
  <meta property="fb:admins" content="">

  <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/style.css">

  <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri();?>/js/vendor/html5-3.6-respond-1.1.0.min.js"></script>
  <![endif]-->
  <script src="<?php echo get_template_directory_uri();?>/js/vendor/modernizr.js"></script>
</head>
<body>
  <header class="navigation">
    <div class="navigation-wrapper">
      <a href="<?php bloginfo('url'); ?>" class="logo">
        <img src="<?php echo get_template_directory_uri();?>/images/logo-small.svg" alt="Aliança pela Água">
      </a>
      <a href="" class="navigation-menu-button" id="js-mobile-menu">MENU</a>
      <div class="nav">
        <ul id="navigation-menu">
          <li class="nav-link"><a href="#cadastre-se">assine</a></li>
          <li class="nav-link"><a href="#a-crise">crise</a></li>
          <li class="nav-link"><a href="#agenda">agenda mínima</a></li>
          <li class="nav-link"><a href="#solucoes">soluções</a></li>
          <li class="nav-link"><a href="#quem-somos">quem somos</a></li>
          <li class="nav-link"><a href="#compartilhe">compartilhe</a></li>
          <li class="nav-link"><a href="#contato">contato</a></li>
        </ul>
      </div>
      <div class="navigation-tools">
        <a class="icon facebook" href="https://www.facebook.com/aguaemsp"><img src="<?php echo get_template_directory_uri();?>/images/icon-facebook.svg" alt="Facebook"></a>
        <a class="icon twitter" href="https://www.twitter.com/aguaemsp"><img src="<?php echo get_template_directory_uri();?>/images/icon-twitter.svg" alt="Twitter"></a>
        <a class="icon gplus" href="https://plus.google.com/117674143282441096563/about"><img src="<?php echo get_template_directory_uri();?>/images/icon-gplus.svg" alt="Google Plus"></a>
        <a class="icon youtube" href="https://www.youtube.com/user/aguaemsp"><img src="<?php echo get_template_directory_uri();?>/images/icon-youtube.svg" alt="Youtube"></a>
      </div>
    </div>
  </header>
