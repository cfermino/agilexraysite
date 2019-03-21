<?php
session_start();
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
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script></head>
<body>
  <div class="container-fluid" style="padding:20px 0px 20px 0px;text-align:center;box-shadow:0px 2px #ccc">
  <div class="row">
      <div class="col s3">&nbsp;</div>
      <div class="col s6">
        <a id="logo-container" href="#" class="brand-logo">
            <img style="width:350px" class="responsive-img" src="http://agilexray.agenciajudito.com/assets/_imagens/logo_agilexray.jpeg"/>
        </a>
      </div>
      <div class="col s3">&nbsp;</div>
     </div>
</div>
<?php
require_once("class/conexao.php");
$id_diagnostico = $_GET['id_diagnostico'];


$stmt2 = $conn->query("select * from agile_diagnostico_respondentes  where id = '".$_GET['id_respondente']."'");
$nomeRespondente = $stmt2->fetch();



$stmtDiagnostico = $conn->query("select * from agile_diagnostico  where id = '".$_GET['id_diagnostico']."'");
$nomeDiagnostico = $stmtDiagnostico->fetch();

$stmt2 = $conn->query("select * from agile_perfil  where id = '".$nomeDiagnostico['id']."'");
$dadosEmpresa = $stmt2->fetch();





$stmtTipoDiagnostico = $conn->query("select * from agile_diagnosticos  where id_pai = '".$nomeDiagnostico['id_diagnostico']."'");
$tipoDiagnostico = $stmtTipoDiagnostico->fetch();



$url = 'http://aglexray.agenciajudito.com/'.$_GET['url_empresa'].'/'.$_GET['url_diagnostico'].'/'.$_GET['id_diagnostico'].'/'.$_GET['url_respondente'].'.html,'.$_GET['id_respondente'];


?>
   <div class="container">
   <div class="section">
   <?php 
   if((!isset($_SESSION['login']) or $_SESSION['login'] == '0') or ($_SESSION['login'] <> $_GET['id_respondente']) or ($_SESSION['id_diagnostico'] <> $_GET['id_diagnostico']) ) { ?>
 <form id="registerForm" name="registerForm" action="http://agilexray.agenciajudito.com/login_respondente.php" method="post">
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
            <input type="hidden" name="url_diagnostico" value="<?php echo $_GET['url_diagnostico'];?>"/>
            <input type="hidden" name="url_empresa" value="<?php echo $_GET['url_empresa'];?>"/>
            <input type="hidden" name="url_respondente" value="<?php echo $_GET['url_respondente'];?>"/>
            <input type="hidden" name="id_diagnostico" value="<?php echo $_GET['id_diagnostico'];?>"/>
            <input type="hidden" name="id_respondente" value="<?php echo $_GET['id_respondente'];?>"/>
            </form>  
   <?php }else{ ?>
<form id="diagnosticoForm" action="<?php echo $base_url;?>resposta_diagnostico.php" method="post">
<div class="row">
        
        <div class="input-field col s12">
        <h6><?php echo utf8_encode($nomeDiagnostico['tx_nome']);?></h6>
      </div>
</div>

<div class="row">
    <div class="col s12">
    <p><strong>Olá <?php echo utf8_encode($nomeRespondente['tx_nome']);?></strong><br/>
     <?php echo utf8_encode(nl2br($tipoDiagnostico['tx_texto_pt']));?></p>
       </div>
       
      </div>
    
<?php
        $stmtPerguntas = $conn->query("SELECT a.id,a.tx_pergunta_pt,a.id_eixo,b.tx_eixo_pt  FROM `agile_perguntas` a inner join agile_eixos b on a.id_eixo = b.id WHERE b.id_diagnostico = '".$tipoDiagnostico['id']."'  order by rand()");
        $perguntas = $stmtPerguntas->fetchAll();
       
        $i = 0;
        foreach ($perguntas as $row) {

?>

        <div class="row" id="perg_<?php echo $i;?>" <?php if($i > 0){?> style='display:none'<?php } ?>>
            <div class="col s2 center"><p>&nbsp;</p></div>
                <div class="col s8 center">
                    <div style="width:90%;margin-bottom:20px;text-align:center">
                        <?php echo utf8_encode($row['tx_pergunta_pt']);?>
                    </div>

                    <div style="width:400px;margin:auto">
                        <div style="float:left;width:70px;height:70px;line-height:70px;text-align:center;border:1px solid #000" class="perg_<?php echo $row['id'];?> perg_1_<?php echo $row['id'];?>"><a href="javascript:setaNota('<?php echo $_GET['id_diagnostico'];?>','<?php echo $_GET['id_respondente'];?>','<?php echo $row['id'];?>','1',<?php echo $i;?>);" style="display:block;width:100%;height:100%;text-align:center" class="nota1_<?php echo $row['id'];?>">1</a></div>
                        <div style="float:left;width:70px;height:70px;line-height:70px;text-align:center;border:1px solid #000" class="perg_<?php echo $row['id'];?> perg_2_<?php echo $row['id'];?>"><a href="javascript:setaNota('<?php echo $_GET['id_diagnostico'];?>','<?php echo $_GET['id_respondente'];?>','<?php echo $row['id'];?>','2',<?php echo $i;?>);" style="display:block;width:100%;height:100%;text-align:center" class="nota2_<?php echo $row['id'];?>">2</a></div>
                        <div style="float:left;width:70px;height:70px;line-height:70px;text-align:center;border:1px solid #000" class="perg_<?php echo $row['id'];?> perg_3_<?php echo $row['id'];?>"><a href="javascript:setaNota('<?php echo $_GET['id_diagnostico'];?>','<?php echo $_GET['id_respondente'];?>','<?php echo $row['id'];?>','3',<?php echo $i;?>);" style="display:block;width:100%;height:100%;text-align:center" class="nota3_<?php echo $row['id'];?>">3</a></div>
                        <div style="float:left;width:70px;height:70px;line-height:70px;text-align:center;border:1px solid #000" class="perg_<?php echo $row['id'];?> perg_4_<?php echo $row['id'];?>"><a href="javascript:setaNota('<?php echo $_GET['id_diagnostico'];?>','<?php echo $_GET['id_respondente'];?>','<?php echo $row['id'];?>','4',<?php echo $i;?>);" style="display:block;width:100%;height:100%;text-align:center" class="nota4_<?php echo $row['id'];?>">4</a></div>
                        <div style="float:left;width:70px;height:70px;line-height:70px;text-align:center;border:1px solid #000" class="perg_<?php echo $row['id'];?> perg_5_<?php echo $row['id'];?>"><a href="javascript:setaNota('<?php echo $_GET['id_diagnostico'];?>','<?php echo $_GET['id_respondente'];?>','<?php echo $row['id'];?>','5',<?php echo $i;?>);" style="display:block;width:100%;height:100%;text-align:center" class="nota5_<?php echo $row['id'];?>">5</a></div>
                    </div>

                </div>
            <div class="col s2 center"><p>&nbsp;</p></div>
        </div>
        <div class="row" id="pergindice_<?php echo $i;?>" <?php if($i > 0){?> style='display:none'<?php } ?>>
            <div class="col s2 center"><p>&nbsp;</p></div>
                <div class="col s8 center">
                <div style="width:400px;margin:auto">
                   <div style="width:200px;float:left;text-align:left;color:#000">Nunca acontece</div>
                   <div style="width:150px;float:left;text-align:right;color:#000">Acontece sempre</div>
                   </div>
                </div>
            <div class="col s2 center"><p>&nbsp;</p></div>
        </div>        
        <?php
            $i++;
        }
        ?>
       
    
      <div class="row" id="comentario" style="display:none">
        <div class="input-field col s12">
          <textarea id="textarea1" name="comentario" class="materialize-textarea"></textarea>
          <label for="textarea1">Por fim, ha algum comentário ou sugestão que você gostaria de fazer?</label>
        </div>
      </div>
    
  

 <div class="row" id="botao" style="display:none">
        <div class="col s12">
                <button class="btn waves-effect waves-light btn_dispara" type="button"  name="action">Salvar
                    <i class="material-icons right">send</i>
                </button>
        </div> 
    </div>

        <input type="hidden" name="id_diagnostico" id="id_diagnostico" value="<?php echo $_GET['id_diagnostico'];?>"/>
        <input type="hidden" name="id_respondente" id="id_respondente" value="<?php echo $_GET['id_respondente'];?>"/>
        <input type="hidden" name="empresa" id="empresa" value="<?php echo utf8_encode($empresa);?>"/>
        <input type="hidden" name="" id="total_perguntas" value="<?php echo $i;?>"/>
        <input type="hidden" name="" id="total_respostas" value="0"/>

    </form> 
</div>    
    </div>

   <?php } ?>
    
  </div>


<div id="setaNota" style="display:none"></div>
<div id="setaNota" style="display:none"></div>
   <script>

       $(document).ready(function(){
                    $( "#data_limite" ).datepicker({minDate: +1,  monthNames:[ "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro" ],dayNamesMin: [ "Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab" ],dayNamesShort: [ "Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab" ],dayNames: [ "Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sab" ],dateFormat: "dd/mm/yy"});
       });
    $('.btn_dispara').click(function(){
      var total_perguntas = $('#total_perguntas').val();
      var total_respostas = $('#total_respostas').val();
    if(parseInt(total_perguntas) >   parseInt(total_respostas)){
        alert('Por favor responda todas as questões');

    }else{
        $('#diagnosticoForm').submit();
    }

    });

function setaNota(id_diagnostico,id_respondente,id_pergunta,in_nota,indice){
    $('.perg_'+id_pergunta).css('background-color','#fff');
    $('.nota'+id_pergunta).css('color','#000');
    $('#setaNota').load("<?php echo $base_url;?>insert_nota.php",{id_diagnostico:id_diagnostico,id_respondente:id_respondente,id_pergunta:id_pergunta,in_nota:in_nota},function(){
        var total_respostas = $('#total_respostas').val();
        $('#total_respostas').val(parseInt(total_respostas)+1);
        prox = indice + 1;
        $('#perg_'+prox).css('display','block');
        $('#pergindice_'+prox).css('display','block');
        var total_perguntas = $('#total_perguntas').val();
        if(prox == total_perguntas){
            $('#comentario').css('display','block');
            $('#botao').css('display','block');
        }
        $("body, html").animate({
            scrollTop: $(document).height()
        }, 400);
        $('.nota'+in_nota+'_'+id_pergunta).css('color','#fff');
        $('.perg_'+in_nota+'_'+id_pergunta).css('background-color','#5e89b1');
        
    });
}

</script>
<?php require_once("_incs/footer.php");?>