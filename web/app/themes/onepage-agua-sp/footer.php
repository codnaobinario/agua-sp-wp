    <footer class="footer" id="contato">
      <div class="container">
        <div class="col">
          <div class="footer-links">
            <ul>
              <li><a href="#cadastre-se">assine</a></li>
              <li><a href="#a-crise">crise</a></li>
              <li><a href="#agenda">agenda mínima</a></li>
              <li><a href="#solucoes">soluções</a></li>
              <li><a href="#quem-somos">quem somos</a></li>
              <li><a href="#compartilhe">compartilhe</a></li>
            </ul>
            <ul>
              <li><a href="mailto:cadastro_online@socioambiental.org">contato</a></li>
            </ul>
            <ul class="social-icons">
              <li><a class="icon facebook" href="https://www.facebook.com/aguaemsp"><img src="<?php echo get_template_directory_uri();?>/images/icon-facebook.svg" alt="Facebook"></a></li>
              <li><a class="icon twitter" href="https://www.twitter.com/aguaemsp"><img src="<?php echo get_template_directory_uri();?>/images/icon-twitter.svg" alt="Twitter"></a></li>
              <li><a class="icon gplus" href="https://plus.google.com/117674143282441096563/about"><img src="<?php echo get_template_directory_uri();?>/images/icon-gplus.svg" alt="Google Plus"></a></li>
              <li><a class="icon youtube" href="https://www.youtube.com/user/aguaemsp"><img src="<?php echo get_template_directory_uri();?>/images/icon-youtube.svg" alt="Youtube"></a></li>
            </ul>
          </div>
        </div>
        <div class="col">
          <div class="footer-logo">
            <img src="<?php echo get_template_directory_uri();?>/images/logo-large.svg" alt="Aliança pela Água">
          </div>
          <div class="footer-disclaimer">
            <p>O conteúdo deste site está sob a licença <a href="http://creativecommons.org/licenses/by-sa/3.0/deed.pt_BR">CC BY-SA 3.0</a>. Desenvolvido por <a href="http://nucleodigital.cc/">Núcleo Digital</a> e <a href="http://www.mapascoletivos.com.br/">Mapas Coletivos</a> e o código está no <a href="https://github.com/nucleo-digital/agua-sp">github</a>.</p>
          </div>
        </div>
      </div>
    </footer>
    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo get_template_directory_uri();?>/js/vendor/jquery-1.11.1.min.js"><\/script>')</script>
    <script src="<?php echo get_template_directory_uri();?>/js/vendor/jquery-modal/jquery.modal.min.js" type="text/javascript"></script>
    <script src='<?php echo get_template_directory_uri();?>/js/vendor/slick/slick.min.js'></script>
    -->

    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '303397239864996',
          xfbml      : true,
          version    : 'v2.1'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));

      (function() {
        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
        po.src = 'https://apis.google.com/js/client:plusone.js?onload=render';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
      })();

      (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='//www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));

      ga('create','UA-720697-34');ga('send','pageview');
    </script>
    <script src='https://cdn.firebase.com/js/client/1.1.1/firebase.js'></script>
    <script src="<?php echo get_template_directory_uri();?>/bundle.js"></script>
  </body>
</html>
