
  <footer class="page-footer orange" style="background-color:#749abf !important">
    <!--div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text text-lighten-4"></p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      &nbsp;
      </div>
    </div-->
  </footer>


    </body>


  <script>
    
        // Or with jQuery

        $(document).ready(function(){
          $('select').formSelect();
          $('.modal').modal();
        });
              
    </script>
     <script>
      function valida(){
         
          if(grecaptcha.getResponse(widgetId1) == ''){
              $('#register').submit();
          }else{
              alert('Ei');
              return false;
          }
      }


function validacaoEmail(field) {
    usuario = field.value.substring(0, field.value.indexOf("@"));
    dominio = field.value.substring(field.value.indexOf("@")+ 1, field.value.length);
    
    if ((usuario.length >=1) &&
        (dominio.length >=3) && 
        (usuario.search("@")==-1) && 
        (dominio.search("@")==-1) &&
        (usuario.search(" ")==-1) && 
        (dominio.search(" ")==-1) &&
        (dominio.search(".")!=-1) &&      
        (dominio.indexOf(".") >=1)&& 
        (dominio.lastIndexOf(".") < dominio.length - 1)) {
    document.getElementById("msgemail").innerHTML="E-mail válido";
    
    }
    else{
    document.getElementById("msgemail").innerHTML="<font color='red'>E-mail inválido </font>";
    
    }
}

function logar(){
  email = $('#login_email').val();
  senha = $('#login_senha').val();
  if(email == '' || senha == ''){
    alert('Preencha os campos E-mail e Senha');
  }else{
    $('#login').load('login_header.php',{email:email,password:senha},function(e){   

      if(e == 'erro'){
        $('#erro_login').html('<h5>E-mail ou Senha inválidos</h5>');
      }else{
        window.location= '<?php echo $base_url;?>meus_diagnosticos.php';
      }
    })
  }

}

  </script>
   <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
        </script>
          <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
 <div id="login"></div>
  </html>