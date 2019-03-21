
<?php require_once("_incs/header.php");


require_once("class/conexao.php");
require_once("_lib/functions.php");
  

$id_diagnostico = $_POST['id_diagnostico'];
$id_respondente = $_POST['id_respondente'];
$comentario = utf8_decode($_POST['comentario']);

try {

    $stmt = $conn->query(
        'INSERT INTO agile_comentarios_respondentes (tx_comentario,id_diagnostico,id_respondente)
         VALUES ("'.$comentario.'","'.$id_diagnostico.'","'.$id_respondente.'")'
    );
    $id_perfil = $conn->lastInsertId();

    $stmt2 = $conn->query("select a.tx_nome,a.tx_email,date_format(b.dt_limite,'%d/%m/%Y') as datalimite from agile_perfil a inner join agile_diagnostico b on a.id = b.id_perfil  where b.id ='".$id_diagnostico."'");
    $dadosAgile = $stmt2->fetch();


    $sqlTotalParticipantes = "select id,tx_nome,tx_email from agile_diagnostico_respondentes where id_diagnostico = '".$id_diagnostico."' ";
    $stmt = $conn->query($sqlTotalParticipantes);
    $participantes = $stmt->rowCount();

    $sqlTotalRespondidas = "select id_respondente from agile_notas_respondentes where id_diagnostico = '".$id_diagnostico."' group by id_respondente ";
    $stmt1 = $conn->query($sqlTotalRespondidas);
    $respondidas = $stmt1->rowCount();


    if($respondidas == $participantes){

        
        
        $stmtDiagnostico = $conn->query("select * from agile_diagnostico  where id = '".$id_diagnostico."'");
        $nomeDiagnostico = $stmtDiagnostico->fetch();
        
        $stmtTipoDiagnostico = $conn->query("select * from agile_diagnosticos  where id_pai = '".$nomeDiagnostico['id_diagnostico']."'");
        
        $tipoDiagnostico = $stmtTipoDiagnostico->fetch();


        $sql = "SELECT tx_nome,tx_email FROM agile_perfil where id = '".$nomeDiagnostico['id']."' order by id desc";
        
        foreach ($conn->query($sql) as $row) {
       
        
        // Compo E-mail
        $arquivo = "
        <style type='text/css'>
        body {
        margin:0px;
        font-family:Verdana;
        font-size:14px;
        color: #666666;
        }
        a{
        color: #666666;
        text-decoration: none;
        }
        a:hover {
        color: #FF0000;
        text-decoration: none;
        }
        </style>
          <html>
              <table width='510' border='0' cellpadding='1' cellspacing='1''>
                  <tr>
                    <td>
        <tr>
                       <td width='500'><img width='320' src='http://agilexray.agenciajudito.com/assets/_imagens/logo_agilexray.jpeg'></td>
                      </tr>
                      <tr>
                        <td width='320'><b>Ol&aacute; ".$row["tx_nome"]."</b></td>
           </tr>
           <tr>
           <td width='320'>".utf8_encode($tipoDiagnostico['corpo_email_pt'])."<br/>
           Através do link: <a href='http://agilexray.agenciajudito.com/central_diagnosticos.php'>http://agilexray.agenciajudito.com/central_diagnosticos.php</a>  <br/><br/>
           Obrigado,<br/><br/>Equipe Agile XRay
           </td>
        </tr>
              </table>
          </html>
        ";
                $emailenviar = $row['tx_email'];
                $destino = $emailenviar;
                $assunto = "Agile XRay ".utf8_encode($nomeDiagnostico['tx_nome']);
                
        
                // É necessário indicar que o formato do e-mail é html
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                    $headers .= 'From: AgileXRay <cleiton@agenciajudito.com>';
                //$headers .= "Bcc: $EmailPadrao\r\n";
                
                $enviaremail = mail($destino, $assunto, $arquivo, $headers);
                if($enviaremail){
                $mgm = "E-MAIL ENVIADO COM SUCESSO! <br> O link será enviado para o e-mail fornecido no formulário";
                
                } else {
                $mgm = "ERRO AO ENVIAR E-MAIL!";
                echo "";
                }

            }

    }


}catch(Exception $e){
    echo $e;
}




?>


   <div class="container">

    <div class="section">
<form id="registerForm" action=".php" method="post">


<div class="row">


        <div class="input-field col s12">
            <p> Obrigado por sua participação.</p>
       </div>
      </div>
 
        <div class="row">
            <div class="input-field col s12">
                Responsável pelo diagnóstico<br/>
                Nome: <?php echo $dadosAgile['tx_nome'];?><br/>
                E-mail: <?php echo $dadosAgile['tx_email'];?><br/>
                *Data Limite para resposta:  <?php echo $dadosAgile['datalimite'];?><br/>
          </div>
        </div>  
        
     
   
    </form> 
</div>    
    </div>
    
  </div>

   <script>
  $( function() {
    $( "#data_limite" ).datepicker({minDate: +1,  monthNames:[ "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro" ],dayNamesMin: [ "Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab" ],dayNamesShort: [ "Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab" ],dayNames: [ "Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sab" ],dateFormat: "dd/mm/yy"});
  } );
    $('#btn_cadastrar').click(function(){
        var nome = $('#nome').val();
        var email = $('#email').val();
        var id_diagnostico = $('#id_diagnostico').val();

        if(nome != '' && email !=''){
            $('#respondentes').load("register_respondentes.php",{nome:nome,email:email,id_diagnostico:id_diagnostico},function(){
                $('#nome').val('');
                $('#email').val('');
            });
        }else{
            alert('Por favor preencher os campos Nome e E-mail do Respondente');
        }
        
    });

</script>
<?php require_once("_incs/footer.php");?>