<?php
session_start();
require_once("_incs/header.php");?>
<script type="text/javascript">
      var verifyCallback = function(response) {
        alert(response);
      };
      var widgetId1;
      var widgetId2;
      var onloadCallback = function() {
        // Renders the HTML element with id 'example1' as a reCAPTCHA widget.
        // The id of the reCAPTCHA widget is assigned to 'widgetId1'.
        widgetId1 = grecaptcha.render('example1', {
          'sitekey' : '6LeTF3YUAAAAAJj5kYNOKd3Db96_cv8w0gBDym80',
          'theme' : 'light'
        });
        widgetId2 = grecaptcha.render(document.getElementById('example2'), {
          'sitekey' : '6LeTF3YUAAAAAJj5kYNOKd3Db96_cv8w0gBDym80'
        });
        grecaptcha.render('example3', {
          'sitekey' : '6LeTF3YUAAAAAJj5kYNOKd3Db96_cv8w0gBDym80',
          'callback' : verifyCallback,
          'theme' : 'dark'
        });
      };

      function validaRecaptcha(){
        validacaoEmail(registerForm.email);
        if($('#msgemail').html() != 'E-mail válido'){
          alert('Preencha o campo E-mail corretamente')
        }else{
          if(grecaptcha.getResponse(widgetId1) != ''){
              $('#registerForm').submit();
          }else{
            alert('Selecione o captcha');
          }

        }
      }
    </script>
   <div class="container">

    <div class="section">
<form id="registerForm" name="registerForm" action="login.php" method="post">
   <?php if(isset($_SESSION['login']) and $_SESSION['login'] == 0){ ?>
<div class="row">
    <div class="col s12">
      <h4>  
            E-mail ou senha inválidos.
      </h4>
    </div>
</div>
<?php } ?>
      <div class="row">
      <div class="col s3">&nbsp;</div>
        <div class="input-field col s6">
            <input  type="email"  type="text"  name="email" id="email" placeholder="E-mail"  style="border-bottom:2px solid #5e89b1 !important">
            <div id="msgemail"></div>
        </div>
        <div class="col s3">&nbsp;</div>
      </div>  
      <div class="row">
      <div class="col s3">&nbsp;</div>
          <div class="input-field col s6"><input type="password" class="validate" name="senha" id="senha" placeholder="Senha" style="border-bottom:2px solid #5e89b1 !important"></div>
          <div class="col s3">&nbsp;</div>
        </div>

     <div class="row">
     <div class="col s3">&nbsp;</div>
        <div class="col s6">
                <button class="btn waves-effect waves-light btn_dispara" type="submit"  name="action" style="background-color:#5e89b1">Logar
                    <i class="material-icons right">send</i>
                </button>
        </div> 
        <div class="col s3">&nbsp;</div>
    </div>
    </form>  
    </div>
    
  </div>
<?php require_once("_incs/footer.php");?>