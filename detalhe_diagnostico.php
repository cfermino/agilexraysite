
<?php require_once("_incs/header.php");


require_once("class/conexao.php");
require_once("_lib/functions.php");
$id_diagnostico = $_GET['id'];


$stmt = $conn->query("select * from agile_configuracoes where id_diagnostico = '1'");
$res = $stmt->fetch();
$stmt2 = $conn->query("select *,date_format(dt_limite,'%d/%m/%Y') as data_limite from agile_diagnostico where id = '".$id_diagnostico."'");
$resDiagnostico = $stmt2->fetch();


?>

 
   <div class="container">

    <div class="section">


 <div class="row">
            <div class="col s12" style='padding-left:0px !important'>
            <nav>
    <div class="nav-wrapper">
      <div class="col s12">
        <a href="meus_diagnosticos.php" class="breadcrumb">Central de Diagnósticos</a>
        <a href="#!" class="breadcrumb"><?php echo utf8_encode($resDiagnostico['tx_nome']); ?></a>
      </div>
    </div>
  </nav>

            </div>
        </div>

<form id="registerForm" action=".php" method="post">
<div class="row">
        
        <div class=" col s12">
                <h5><?php echo utf8_encode($resDiagnostico['tx_nome']); ?>  </h5>
        </div>
        </div>

      

<div class="row">


        <div class="col s12">
           <b style="color:#5e89b1">Data Limite:</b> <?php echo $resDiagnostico['data_limite'];?>
       </div>
      </div>
 
      <div class="row">
            <div class="col s12">
                <b  style="color:#5e89b1">Relatórios Individuais</b>
            </div>
        </div>  
        <div class='row'><div class='col s4'><b>Nome</b></div><div class='col s4'><b>E-mail</b></div><div class='col s4'><b>Respondeu</b></div></div>    
      <div class="row">
      
        <div class="col s12">
                <?php
                $sql = "SELECT id,tx_nome,tx_email FROM agile_diagnostico_respondentes where id_diagnostico = '".$id_diagnostico."' order by id desc";
                foreach ($conn->query($sql) as $row) {
                    $sqlRespondentes = "select id_respondente from agile_notas_respondentes where id_respondente = '".$row['id']."' and id_diagnostico = '".$id_diagnostico."'";
                    $stmt2 = $conn->query($sqlRespondentes);
                    if($stmt2->rowCount() > 0){
                        echo "<div class='row'><div class='col s4'>".utf8_encode($row['tx_nome'])."</div><div class='col s4'>".$row['tx_email']."</div><div class='col s4'><a style='color:#5e89b1' href='relatorio_individual_agile.php?id_perfil=".$row['id']."&id_diagnostico=".$id_diagnostico."'>Sim</a></div></div>";
                    }else{
                        echo "<div class='row'><div class='col s4'>".utf8_encode($row['tx_nome'])."</div><div class='col s4'>".$row['tx_email']."</div><div class='col s4'>Não</a></div></div>";
                    }
                    
                }
                ?>
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