
<?php require_once("_incs/header.php");


require_once("class/conexao.php");
require_once("_lib/functions.php");
  
$data_limite = utf8_decode($_POST['data_limite']);
$empresa = utf8_decode($_POST['empresa']);
$id_diagnostico = $_POST['id_diagnostico'];
$nome_diagnostico = $_POST['nome_diagnostico'];
$url_empresa = $_POST['url_empresa'];
//$id_plano = $_POST['id_plano'];
//$razao_social = utf8_decode($_POST['razao_social']);
//$cnpj = $_POST['cnpj'];
//$endereco = utf8_decode($_POST['endereco']);
//$numero = $_POST['numero'];
//$bairro = utf8_decode($_POST['bairro']);
//$cep = $_POST['cep'];
//$cidade = utf8_decode($_POST['cidade']);
//$estado = utf8_decode($_POST['estado']);
//$complemento = utf8_decode($_POST['complemento']);


$data = explode("/",$data_limite);
$dt_limite = $data[2]."-".$data[1]."-".$data[0];
try {
    $stmt2 = $conn->query('UPDATE agile_diagnostico set dt_limite = "'.$dt_limite.'", tx_nome = "'.utf8_decode($nome_diagnostico).'" , tx_url = "'.title2url(utf8_decode($nome_diagnostico)).'" where id = "'.$id_diagnostico.'"');
}catch(Exception $e){
    echo $e;
}
$stmt = $conn->query("select * from agile_configuracoes where id_diagnostico = '1'");
$res = $stmt->fetch();
$stmt2 = $conn->query("select *,date_format(dt_limite,'%d/%m/%Y') as data_limite,date_format(dt_cadastro,'%d/%m/%Y') as data_cadastro from agile_diagnostico where id = '".$id_diagnostico."'");
$resDiagnostico = $stmt2->fetch();


if($resDiagnostico['data_limite'] == '1'){
    $tipo_diagnostico = 'Diagnóstico Product Owner';
}else{
    $tipo_diagnostico = 'Diagnóstico de Maturidade do Scrum';
}

$stmt3 = $conn->query("select tx_nome,tx_email from agile_perfil where id = '".$resDiagnostico['id_perfil']."'");
$resCriadorDiagnostico = $stmt3->fetch();



$sql = "SELECT tx_nome,tx_email,tx_url,id,tx_senha FROM agile_diagnostico_respondentes where id_diagnostico = '".$id_diagnostico."' order by id desc";
foreach ($conn->query($sql) as $row) {

    $url = 'http://agilexray.agenciajudito.com/'.$url_empresa.'/'.$resDiagnostico['tx_url'].'/'.$id_diagnostico.'/'.$row['tx_url'].'.html,'.$row['id'];

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
                <td width='320'><b>Ol&aacute; ".utf8_encode($row["tx_nome"])."</b></td>
   </tr>
   <tr>
   <td width='320'>Você foi convidado a participar de um ".($tipo_diagnostico)." por ".utf8_encode($resCriadorDiagnostico['tx_nome']).". Esta ferramenta permitirá detectar fortalezas e oportunidades de crescimento em suas práticas diárias, para que você evolua como profissional e contribua ainda mais com seu time.<br/><br/>
   Para participar, você deverá responder até <b>".$resDiagnostico['data_limite']."</b> através do link:<br/><b><a href='".$url."'>".$url."</a></b><Br/>Sua senha de acesso é: <b>".$row["tx_senha"]."</b> <br/><br/>
   Considere este diagnóstico como ferramenta de indicação de pontos de melhoria. Nós não auditamos sua empresa, nem há certificados ou normas para o uso de práticas ágeis.<br/>Em caso de dúvidas, entre em contato com ".utf8_encode($resCriadorDiagnostico['tx_nome'])." <a href='mailto:".$resCriadorDiagnostico['tx_email']."'>".$resCriadorDiagnostico['tx_email']."</a> .<br/><br/>Obrigado,<br/><br/>Equipe Agile XRay
   </td>
</tr>
      </table>
  </html>
";
        $emailenviar = $row['tx_email'];
        $destino = $emailenviar;
        $assunto = "Agile XRay ".$nome_diagnostico;
        

        // É necessário indicar que o formato do e-mail é html
        $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html;' . "\r\n";
            $headers .= 'From: AgileXRay <agilexray@123agil.com>';
        //$headers .= "Bcc: $EmailPadrao\r\n";
        
        $enviaremail = mail($destino, $assunto, $arquivo, $headers);
}



?>


   <div class="container">

    <div class="section">
<form id="registerForm" action=".php" method="post">
<div class="row">
        
        <div class=" col s12">
                <h4><?php echo utf8_encode($resDiagnostico['tx_nome']);?> </h4>
        </div>
        </div>

        <div class="row">
        
        <div class="col s12">
               Diagnóstico cadastrado com sucesso!
        </div>
        </div>
 
      <div class="row">
            <div class="col s12">
               Participantes Cadastrados:
                </div>
        </div>  
       
      <div class="row">
      
        <div class="col s6">
         <table class='striped responsive-table' style='border:1px solid #ccc'><thead><tr style='background-color:#a5a5a5'><th>Nome</th><th>E-mail</th></tr></thead><tbody>
                <?php
                $sql = "SELECT tx_nome,tx_email FROM agile_diagnostico_respondentes where id_diagnostico = '".$id_diagnostico."' order by id desc";
                foreach ($conn->query($sql) as $row) {
                    echo "<tr><td>".utf8_encode($row['tx_nome'])."</td><td>".$row['tx_email']."</td></tr>";
                }
                echo "</tbody></table>";
                ?>
        </div>

      </div>  

      <div class="row">
<div class=" col s12">
    Data de Criação: <?php echo $resDiagnostico['data_cadastro'];?>
</div>
</div>

      <div class="row">
<div class=" col s12">
    Data Limite: <?php echo $data_limite;?>
</div>
</div>

      <div class="row">
            <div class=" col s6" >
                    Cada participante receberá um e-mail com um link individual para as respostas.<br/>Caso haja algum problema na recepção da mensagem, você poderá reenvir o e-mail a partir da Central de Diagnósticos.
            </div>
        </div>
        <div class="row">
            <div class=" col s6" >
                   <a href="http://agilexray.agenciajudito.com/central_diagnosticos.php">Central de Diagnósticos</a>
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