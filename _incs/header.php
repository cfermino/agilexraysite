<?php
$base_url = 'http://agilexray.agenciajudito.com/';
require_once("_lib/functions.php");
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Agile Xray</title>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Nunito|Poppins" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="<?php echo $base_url;?>css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<link href="<?php echo $base_url;?>css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<script src="https://code.jquery.com/jquery-3.3.1.js"  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="  crossorigin="anonymous"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
  <body>
  <div class="container-fluid" style="padding:20px 0px 20px 0px;text-align:center;box-shadow:0px 2px #ccc">
  <div class="row">
      <div class="col s3">&nbsp;</div>
      <div class="col s6">
        <a id="logo-container" href="#" class="brand-logo">
            <img style="width:350px" class="responsive-img" src="http://agilexray.agenciajudito.com/assets/_imagens/logo_agilexray.jpeg"/>
        </a>
      </div>
      <div class="col s3"><a class="modal-trigger" href="#modal1"><img  style="width:100px" src="<?php echo $base_url;?>assets/_imagens/login_button.png"/></a></div>
     </div>
</div>

<div id="modal1" class="modal">
    <div class="modal-content">
    <div class="row">
      <div class="col s3">&nbsp;</div>
        <div class="input-field col s6">
            
            <div id="erro_login"></div>
        </div>
        <div class="col s3">&nbsp;</div>
      </div>  
    <div class="row">
      <div class="col s3">&nbsp;</div>
        <div class="input-field col s6">
            <input  type="email"  type="text"  name="email" id="login_email" placeholder="E-mail"  style="border-bottom:2px solid #5e89b1 !important">
            <div id="msgemail"></div>
        </div>
        <div class="col s3">&nbsp;</div>
      </div>  
      <div class="row">
      <div class="col s3">&nbsp;</div>
          <div class="input-field col s6"><input type="password" class="validate" name="senha" id="login_senha" placeholder="Senha" style="border-bottom:2px solid #5e89b1 !important"></div>
          <div class="col s3">&nbsp;</div>
        </div>

     <div class="row">
     <div class="col s3">&nbsp;</div>
        <div class="col s6">
                <button class="btn waves-effect waves-light btn_dispara" type="button" onclick="javascript:logar();"  name="action" style="background-color:#5e89b1">Logar
                    <i class="material-icons right">send</i>
                </button>
        </div> 
        <div class="col s3">&nbsp;</div>
    </div>
    </form>  
    </div>

    </div>
    <div class="modal-footer">
     
    </div>
  </div>

  <!--nav class="white" role="navigation" style="height:145px;line-height:145px;color:#212024 !important;background-color:#fff !important">
    <div class="nav-wrapper container" style="text-align:center">
      <ul class="right hide-on-med-and-down">
        <li><a href="#" style="color:#212024;font-size:15px">HOME</a></li>
        <li><a href="#" style="color:#212024;font-size:15px">SOBRE NÓS</a></li>
        <li><a href="#" style="color:#212024;font-size:15px">FAQ</a></li>
        <li><a href="#" style="color:#212024;font-size:15px">CONTATO</a></li>
        <li><a href="#" style="color:#212024;font-size:15px">CADASTRE-SE</a></li>
        <li><a href="#" style="color:#212024"><img  style="width:40px" src="< ?php echo $base_url;?>assets/_imagens/eua_flag.png"/></a></li>
        <li><a href="#" style="color:#212024"><img  style="width:40px" src="< ?php echo $base_url;?>assets/_imagens/brasil_flag.png"/></a></li>
        <li><a href="#" style="color:#212024"><img  style="width:100px" src="< ?php echo $base_url;?>assets/_imagens/login_button.png"/></a></li>
      </ul>
      <ul id="nav-mobile" class="sidenav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav-->