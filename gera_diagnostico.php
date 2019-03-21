
<?php require_once("_incs/header.php");


require_once("class/conexao.php");
  
$nome = utf8_decode($_POST['nome']);
$email = $_POST['email'];
$senha = $_POST['senha'];
$empresa = utf8_decode($_POST['empresa']);
$cargo = utf8_decode($_POST['cargo']);
$id_ramo_atividade = $_POST['id_ramo_atividade'];
$tipo = $_POST['tipo'];
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

$stmt = $conn->query("select * from agile_tipos_diagnosticos where in_tipo = '".$tipo."'");
$resDiagnostico = $stmt->fetch();

$nome_diagnostico = $resDiagnostico['tx_diagnostico']." - ".$empresa;

try {

    $stmt = $conn->query(
        'INSERT INTO agile_perfil (tx_nome,tx_email,tx_password,tx_empresa,id_ramo_atividade,tx_url_empresa)
         VALUES ("'.$nome.'","'.$email.'","'.$senha.'","'.$empresa.'","'.$id_ramo_atividade.'","'.title2url($empresa).'")'
    );
    $id_perfil = $conn->lastInsertId();

    $stmt2 = $conn->query(
        'INSERT INTO agile_diagnostico (tx_nome,id_perfil,id_diagnostico,tx_url)
         VALUES ("'.$nome_diagnostico.'","'.$id_perfil.'","'.$tipo.'","'.title2url($nome_diagnostico).'")'
    );
    $id_diagnostico_gerado = $conn->lastInsertId();
}catch(Exception $e){
    echo $e;
}



$stmt = $conn->query("select * from agile_configuracoes where id_diagnostico = '".$id_diagnostico."'");
$res = $stmt->fetch();



?>


   <div class="container">

    <div class="section">

<div class="row">
        
        <div class="input-field col s12">
        <input type="text" style='font-size:30px' name="nome" id="nome_diagnostico" placeholder="Nome"  class="validate" value="<?php echo utf8_encode($nome_diagnostico);?> - <?php echo date("d/m/Y"); ?>"/>
      </div>
<div class="row">


        <div class="input-field col s12">
            <p> <?php echo utf8_encode($res['tx_texto']);?></p>
       </div>
      </div>
 
      <div class="row">
          <p>Cadastrar Respondentes</p>
        </div>      
      <div class="row">
      <form id="addrespondente" name="addrespondente">
        <div class="input-field col s4">
            <label for="nome">Nome</label>
            <input type="text" class="validate" name="nome" id="nome" placeholder="Nome Completo">
        </div>
        <div class="input-field col s4">
            <label for="email">E-mail</label>

            <input  type="email" onblur="validacaoEmail(registerForm.email)"   name="email" id="email" placeholder="E-mail">
            <div id="msgemail"></div>

        </div>
        <div class="col s4">
                <a class="waves-effect waves-light btn" id="btn_cadastrar">Cadastrar</a>
        </div>

      </div>  

      <div class="row">
            <div class="input-field col s6" id="respondentes" >
           
            </div>
        </div>
    </form>
        <form id="registerForm" action="disparar.php" method="post">      
      <div class="row">
            <div class="input-field col s6" id="">
            <label for="nome">Data Limite</label>
            <input type="text" placeholder="dd/mm/aaaa" name="data_limite"  id="data_limite"  class="datepicker" >
            </div>
        </div>

    <div class="row">
        <div class="col s12">
                <button class="btn waves-effect waves-light btn_dispara" type="button"  name="action">Disparar
                    <i class="material-icons right">send</i>
                </button>
        </div> 
    </div>
         <input type="hidden" name="id_diagnostico" id="id_diagnostico" value="<?php echo $id_diagnostico_gerado;?>"/>
         <input type="hidden" name="empresa" id="empresa" value="<?php echo utf8_encode($empresa);?>"/>
         <input type="hidden" name="url_empresa" id="empresa" value="<?php echo title2url($empresa);?>"/>

         <input type="hidden" name="nome_diagnostico" id="tx_diagnostico" />
    </form> 
</div>    
    </div>
    
  </div>

   <script>
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.datepicker');
    var instances = M.Datepicker.init(elems, options);
  });


       $(document).ready(function(){


        $('.datepicker').datepicker({
i18n: {
months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
weekdays: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabádo'],
weekdaysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
weekdaysAbbrev: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
today: 'Hoje',
clear: 'Limpar',
cancel: 'Sair',
done: 'Confirmar',
labelMonthNext: 'Próximo mês',
labelMonthPrev: 'Mês anterior',
labelMonthSelect: 'Selecione um mês',
labelYearSelect: 'Selecione um ano',
selectMonths: true,
selectYears: 15,
},
format: 'dd/mm/yyyy',
container: 'body',
minDate: new Date(),
});

       });

       

       $('.btn_dispara').click(function(){
           $('#tx_diagnostico').val($('#nome_diagnostico').val());
           $('#registerForm').submit();
       });


    $('#btn_cadastrar').click(function(){
        var nome = $('#nome').val();
        var email = $('#email').val();
        var id_diagnostico = $('#id_diagnostico').val();
        validacaoEmail(addrespondente.email);
        if($('#msgemail').html() != 'E-mail válido'){
          alert('Preencha o campo E-mail corretamente');
        }else{
            if(nome != '' && email !=''){
                
                $('#respondentes').load("register_respondentes.php",{nome:nome,email:email,id_diagnostico:id_diagnostico},function(){
                    $('#nome').val('');
                    $('#email').val('');
                    $('#msgemail').html('');
                });
            }else{
                alert('Por favor preencher os campos Nome e E-mail do Respondente');
            }
        }        
    });
    

function excluirRespondente(id,acao,id_diagnostico){
    $('#respondentes').load("delete_respondentes.php",{id_respondente:id,acao:acao,id_diagnostico:id_diagnostico},function(){
    });
}


    function actionrespondentes(id,acao){

        var nome = $('#nome').val();
        var email = $('#email').val();
        var id_diagnostico = $('#id_diagnostico').val();
        validacaoEmail(addrespondente.email);
        if($('#msgemail').html() != 'E-mail válido'){
          alert('Preencha o campo E-mail corretamente');
        }else{
            if(nome != '' && email !=''){
                
              
            }else{
                alert('Por favor preencher os campos Nome e E-mail do Respondente');
            }
        }        
    }

</script>
<?php require_once("_incs/footer.php");?>