/* globals jQuery, Modernizr */
var $ = require('jquery');
window.jQuery = $;

var form = require('./vendor/form/jquery.form');
var slick = require('./vendor/slick/slick.min');

  'use strict';

  $(function () {
    var menu = $('#navigation-menu');
    var menuToggle = $('#js-mobile-menu');

    $(menuToggle).on('click', function(e) {
      e.preventDefault();
      menu.slideToggle(function(){
        if(menu.is(':hidden')) {
          menu.removeAttr('style');
        }
      });
    });

    // underline under the active nav item
    $('.nav .nav-link').click(function() {
      $('.nav .nav-link').each(function() {
        $(this).removeClass('active-nav-item');
      });
      $(this).addClass('active-nav-item');
      $('.nav .more').removeClass('active-nav-item');
    });

    if (!Modernizr.svg) {
      $('.navigation .logo img, .hero-logo img').attr('src', function (idx, svgLocation) {
        return svgLocation.replace(/\.svg$/, '.png');
      });
    }

    /**
     * SHARE FACEBOOK
     */
    $('.fb-share').click(function (ev) {
      ev.preventDefault();
      FB.ui({
        method: 'share',
        href: window.location.href
      }, function(response){});
    });
  });

  $('form#register').on('submit', function (e) {
    e.preventDefault();

    var name = $('#nameInput').val();
    var email = $('#emailInput').val();

    salvarUsuario({name: name, email: email});
  });

  var myDataRef = new Firebase('https://popping-heat-3998.firebaseio.com/');

  function salvarUsuario (obj) {
    myDataRef.push(obj);

    $('.registry').html(
      '<h2>obrigado por se cadastrar!</h2>'+
      '<p class="centraliza"><img src="/images/icon-sucesso.svg"/></p>'+
      '<p class="centraliza">Guardamos seus dados com sucesso, assim que tivermos uma novidade entraremos em contato!</p>'
    );
  }

  $('#fb-button').on('click', function(e) {
    e.preventDefault();

    FB.login(function(response) {
      if (response.status === 'connected') {
        // Logged into your app and Facebook.
        testAPI();
      } else if (response.status === 'not_authorized') {
        // The person is logged into Facebook, but not your app.
      } else {
        // The person is not logged into Facebook, so we're not sure if
        // they are logged into this app or not.
      }
    }, {scope: 'public_profile,email'});
  });

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    FB.api('/me', function(response) {
      salvarUsuario({name: response.name, email: response.email, facebook:response});
    });
  }

function signinCallback(authResult) {
  if (authResult['access_token']) {
    // Autorizado com sucesso
    // Ocultar o botão de login agora que o usuário está autorizado, por exemplo:
    // console.log(authResult);
    $.getJSON('https://www.googleapis.com/oauth2/v1/userinfo?alt=json&access_token='+authResult['access_token'])
      .done(function(data){
        // console.log(data);
        salvarUsuario({name: data.name, email: data.email, google: data});
      });
  } else if (authResult['error']) {
    // Ocorreu um erro.
    // Possíveis códigos de erro:
    //  "access_denied" - o usuário negou o acesso a seu aplicativo
    //   "immediate_failed" - não foi possível fazer o login do usuário automaticamente
    // console.log('There was an error: ' + authResult['error']);
  }
}



function render() {
  gapi.signin.render('google-button', {
    'callback': 'signinCallback',
    'clientid': "624317565694-vb4f0uers8hktak2a05t5j2slb0bod1u.apps.googleusercontent.com",
    'cookiepolicy': 'single_host_origin',
    'scope': 'https://www.googleapis.com/auth/userinfo.email'
  });
}

$('.single-item').slick();


jQuery(".post-like.couldvote").on('click', function(evt) {
  evt.preventDefault();
  var heart = jQuery(this);

  // Retrieve post ID from data attribute
  var post_id = heart.data("post_id");

  // Ajax call
  jQuery.ajax({
      type: "post",
      url: ajax_var.url,
      data: "action=post-like&nonce="+ajax_var.nonce+"&post_like=&post_id="+post_id,
      success: function(count){
          // If vote successful
          if(count != "already")
          {
              heart.addClass("alreadyvoted voted");
              heart.removeClass("couldvote");
              heart.find(".count").text(count);
          }
      }
  });
});

jQuery(".saiba-mais-solucoes").on('click', function (evt) {
  evt.preventDefault();

  var el = jQuery(this);
  var post_id = el.data('post_id');
  var box_saiba_mais = el.parent().parent().parent().parent().nextAll('.content-saiba-mais:first');

  box_saiba_mais.html('<div class="container">'+jQuery('#solucao-'+post_id+' .extra').html()+'</div>');
  box_saiba_mais.find('.close.slide').on('click', function(evt) {
    evt.preventDefault();
    // var el = jQuery(this);
    // var box_saiba_mais = el.parent().parent().parent().nextAll('.content-saiba-mais:first');
    box_saiba_mais.slideToggle();
  });
  box_saiba_mais.slideToggle();
});

jQuery(".carregar-formulario").on('click', function (evt) {
  evt.preventDefault();

  var el = jQuery(this);
  var box_saiba_mais = el.parent().parent().parent().nextAll('.content-saiba-mais:first');

  box_saiba_mais.addClass('formulario'); // para sempre ter altura definida e a animação ficar melhor

  box_saiba_mais.html('<div class="container">'+jQuery('#form-cadastro').html()+'</div>');

  box_saiba_mais.slideToggle();

  var options = {
      target:        '.content-saiba-mais .output1',      // target element(s) to be updated with server response
      beforeSubmit:  showRequest,     // pre-submit callback
      success:       showResponse,    // post-submit callback
      url:    ajax_var.url                 // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
  };

  // bind form using 'ajaxForm'
  jQuery('.content-saiba-mais .thumbnail_upload').ajaxForm(options);

  jQuery('.content-saiba-mais input[name="type"]').on('change', function (evt) {
    if (evt.currentTarget.value == '1') {
      jQuery('.mostrar-solucao').hide();
    } else if (evt.currentTarget.value == '2') {
      jQuery('.mostrar-solucao').show();
    }
  });
  box_saiba_mais.find('.close').on('click', function(evt) {
    evt.preventDefault();
    // var el = jQuery(this);
    // var box_saiba_mais = el.parent().parent().parent().nextAll('.content-saiba-mais:first');
    box_saiba_mais.removeClass('formulario');
    box_saiba_mais.slideToggle();
  });
});

function showRequest(formData, jqForm, options) {
//do extra stuff before submit like disable the submit button
jQuery('.content-saiba-mais .thumbnail_upload').slideToggle();
jQuery('.content-saiba-mais .output1').html('Sending...');
jQuery('.content-saiba-mais .submit-ajax').attr("disabled", "disabled");
}
function showResponse(responseText, statusText, xhr, $form)  {
//do extra stuff after submit
}


