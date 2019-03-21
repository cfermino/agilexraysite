<?php
session_start();
require_once("_incs/header.php");
require_once("class/conexao.php");

$id_perfil = $_SESSION['id_perfil'];



?>

         

 <div class="container">
    <div class="section">
        <div class="row">
            <div class="col s12">
            <nav>
    <div class="nav-wrapper">
      <div class="col s12">
        <a href="#!" class="breadcrumb">Central de Diagnósticos</a>
      </div>
    </div>
  </nav>

            </div>
        </div>
      <div class="row">
      <div class="col s12">   
        <h4>
            Olá <?php echo utf8_encode($_SESSION['nome']);?>
        </h4>
    </div>


      </div>

      
        <div class="row">
            <div class="col s12">
                <div class="row">
                        <div class="col s6">
                            Diagnóstico  
                        </div>
                        <div class="col s2 center">
                            Data Criação / Limite  
                        </div>
                        <div class="col s2 center">
                             Participantes  
                        </div>
                        <div class="col s2 center">
                             Respostas  
                        </div>
                </div>
            <?php
                $sql = "select id,tx_nome,date_format(dt_limite,'%d/%m/%Y') as data_limite ,date_format(dt_cadastro,'%d/%m/%Y') as data_cadastro from agile_diagnostico where id_perfil = '".$id_perfil."'";
                foreach ($conn->query($sql) as $row) {
                    $sqlTotalParticipantes = "select id,tx_nome,tx_email from agile_diagnostico_respondentes where id_diagnostico = '".$row['id']."' ";
                    $stmt = $conn->query($sqlTotalParticipantes);
                    $participantes = $stmt->rowCount();

                    $sqlTotalRespondidas = "select id_respondente from agile_notas_respondentes where id_diagnostico = '".$row['id']."' group by id_respondente ";
                    $stmt1 = $conn->query($sqlTotalRespondidas);
                    $respondidas = $stmt1->rowCount();
                  
                    
            ?>
            <div class="row">
                    <div class="col s6">
                        <a  style="color:#5e89b1" href="relatorio_geral.php?id_diagnostico=<?php echo $row['id'];?>"><?php echo utf8_encode($row['tx_nome']); ?></a>
                    </div>
                    <div class="col s2 center">
                        
                        <?php echo $row['data_cadastro']." / ". $row['data_limite']; ?>
                    </div>
                    <div class="col s2 center">
                        <?php echo $participantes;?>
                    </div>
                    <div class="col s2 center">
                    <?php echo $respondidas;?>
                    </div>
                </div>
            </div>
                <?php } ?>            
            

            </div>
        </div>
    </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
          var elems = document.querySelectorAll('select');
          var instances = M.FormSelect.init(elems, options);
        });

        // Or with jQuery

        $(document).ready(function(){
            $('.collapsible').collapsible();
        });
              
    </script>
  </body>
</html>