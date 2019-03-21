
<?php require_once("_incs/header.php");


require_once("class/conexao.php");
require_once("_lib/functions.php");
$id_diagnostico = $_GET['id_diagnostico'];
$id_respondente = $_GET['id_perfil'];

$stmt = $conn->query("select * from agile_configuracoes where id_diagnostico = '1'");
$res = $stmt->fetch();
$stmt2 = $conn->query("select *,date_format(dt_limite,'%d/%m/%Y') as data_limite from agile_diagnostico where id = '".$id_diagnostico."'");
$resDiagnostico = $stmt2->fetch();

$stmtRespondente = $conn->query("select * from agile_diagnostico_respondentes where id = '".$id_respondente."' and id_diagnostico = '".$id_diagnostico."'");
$resRespondente = $stmtRespondente->fetch();


$sqlMedia = 'select c.tx_eixo_pt,b.in_nota,a.in_peso from agile_notas_respondentes b inner join agile_perguntas a  on b.id_pergunta = a.id inner join agile_eixos c on a.id_eixo = c.id where  b.id_diagnostico = "'.$id_diagnostico.'"';
$notaFinal = 0;
$perguntas = 0;
foreach ($conn->query($sqlMedia) as $row) { 
    $notaFinal += $row['in_nota'] * $row['in_peso'];
    $pesoPerguntas += $row['in_peso'];
    $perguntas++;
} 
$mediaFinal = $notaFinal / $perguntas;

//select c.tx_eixo_pt,sum(b.in_nota) as nota_eixo,a.in_peso,count(b.id_pergunta) as perguntas from agile_notas_respondentes b inner join agile_perguntas a  on b.id_pergunta = a.id inner join agile_eixos c on a.id_eixo = c.id where b.id_respondente = 1 and  b.id_diagnostico = 1 group by c.id

$sqlMediaEixos = 'select c.tx_eixo_pt,sum(b.in_nota) as nota_eixo,a.in_peso,count(b.id_pergunta) as perguntas from agile_notas_respondentes b inner join agile_perguntas a  on b.id_pergunta = a.id inner join agile_eixos c on a.id_eixo = c.id where b.id_respondente = "'.$id_respondente.'" and  b.id_diagnostico = "'.$id_diagnostico.'" group by c.id';
$notaFinal = 0;
$perguntas = 0;
$mediasEixos = array();
$i = 0;
foreach ($conn->query($sqlMediaEixos) as $row) { 
    $mediasEixos[$row['tx_eixo_pt']] =  $row['nota_eixo'] / $row['perguntas'];
   $i++;
    
} 

$eixosGrafico = '';
foreach($mediasEixos as $key => $value){
    $nomeeixosGrafico .= '"'.utf8_encode($key).'",';
    $valoreixosGrafico .= round($value,2).",";
}

?>


   <div class="container">

    <div class="section">
            <div class="row">
                <div class=" col s12">
                    <h5><?php echo utf8_encode($resDiagnostico['tx_nome']); ?> - <?php echo utf8_encode($resRespondente['tx_nome']); ?>  </h5>
                    <p><b>Limite: </b><?php echo utf8_encode($resDiagnostico['data_limite']); ?>  </p>
                </div>
            </div>
            <div class="row">
                <div class=" col s12">
                   &nbsp;
                </div>
            </div>

            <div class="row">
                <div class="col s6">
                    <div class="row">
                        <div class="col s6" style="background-color:#000;color:#fff;padding:10px;text-align:center;text-transform:uppercase;font-weight:bold;font-size:14px">
                            Índice de Maturidade
                        </div>
                        <div class=" col s3" style="background-color:#f79646;color:#fff;padding:10px;text-align:center;text-transform:uppercase;font-weight:bold;font-size:14px">
                            Regular
                        </div>
                        <div class=" col s3" style="background-color:#000;color:#fff;padding:10px;text-align:center;text-transform:uppercase;font-weight:bold;font-size:14px">
                            <?php echo $mediaFinal; ?>
                        </div>              
                    </div>
                </div>
                 
            </div>



            <div class="row">
                <div class=" col s6">
                    <div class="row">
                        <div class="col s12">
                            <h5>Top Ofensores  </h5>
                        </div>
                    </div>
                    <?php 
                        $sqlTopOfensores = 'select c.tx_eixo_pt,sum(b.in_nota) as total_notas,a.in_peso from agile_notas_respondentes b inner join agile_perguntas a  on b.id_pergunta = a.id inner join agile_eixos c on a.id_eixo = c.id where b.id_respondente = "'.$id_respondente.'" and  b.id_diagnostico = "'.$id_diagnostico.'" group by c.id  order by total_notas asc  limit 3';
                        foreach ($conn->query($sqlTopOfensores) as $rowOfensores) { 
                    ?>
                            <div class="row">
                                <div class=" col s12">
                                    <?php echo utf8_encode($rowOfensores['tx_eixo_pt']); ?>
                                </div>
                            </div>
                    <?php } ?>
                </div>
                <div class=" col s6">
                    <div class="row">
                        <div class="col s12">
                            <div class="x_content">
                            <div id="echart_pie2" style="height:350px;"></div>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>

      

</div>    
    </div>
    
  </div>
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <script src="../vendors/echarts/dist/echarts.min.js"></script>
    <script src="../vendors/echarts/map/js/world.js"></script>


    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

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


	if ($('#canvasRadar1').length ){ 
			  
			  var ctx = document.getElementById("canvasRadar1");
			  var data = {
				labels: [<?php echo $nomeeixosGrafico;?>],
				datasets: [{
                  
				  label: "",
				  backgroundColor: "rgba(3, 88, 106, 0.2)",
				  borderColor: "rgba(3, 88, 106, 0.80)",
				  pointBorderColor: "rgba(3, 88, 106, 0.80)",
				  pointBackgroundColor: "rgba(3, 88, 106, 0.80)",
				  pointHoverBackgroundColor: "#fff",
                  pointHoverBorderColor: "rgba(220,220,220,1)",
                  lineTension:[1,2,3,4,5],
				  data: [<?php echo $valoreixosGrafico;?>]
				}]
			  };

			  var canvasRadar = new Chart(ctx, {
				type: 'radar',
				data: data,
			  });
			
			}
        
        
			if ($('#echart_pie2').length ){ 
			  
			  var echartPieCollapse = echarts.init(document.getElementById('echart_pie2'), theme);
			  
			  echartPieCollapse.setOption({
				tooltip: {
				  trigger: 'item',
				  formatter: "{a} <br/>{b} : {c} ({d}%)"
				},
				legend: {
				  x: 'center',
				  y: 'bottom',
				  data: [<?php echo $nomeeixosGrafico;?>]
				},
				toolbox: {
				  show: true,
				  feature: {
					magicType: {
					  show: true,
					  type: ['pie', 'funnel']
					},
					restore: {
					  show: true,
					  title: "Restore"
					},
					saveAsImage: {
					  show: true,
					  title: "Save Image"
					}
				  }
				},
				calculable: true,
				series: [{
				  name: 'Area Mode',
				  type: 'pie',
				  radius: [25, 90],
				  center: ['50%', 170],
				  roseType: 'area',
				  x: '50%',
				  max: 40,
				  sort: 'ascending',
				  data: [
                      <?php
foreach($mediasEixos as $key => $value){

    $nomeeixosGrafico .= '"'.utf8_encode($key);
    $valoreixosGrafico = round($value,2);
                      ?>
                    {
					value: <?php echo $valoreixosGrafico;?>,
					name: '<?php echo utf8_encode($key);?>'
                  },
                <?php } ?>
                ]
				}]
			  });

			} 



</script>
<?php require_once("_incs/footer.php");?>