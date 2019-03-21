<?php

    require_once("class/conexao.php");
  
    $nome = utf8_decode($_POST['nome']);
    $email = $_POST['email'];
    $acao = $_POST['acao'];
    $id_diagnostico = $_POST['id_diagnostico'];
    $id_respondente = $_POST['id_respondente'];
    try {

     
            $stmt = $conn->query(
                'DELETE FROM agile_diagnostico_respondentes where id = "'.$id_respondente.'"'
            );
    
     
            echo "  <table class='striped responsive-table' style='border:1px solid #ccc'><thead><tr style='background-color:#a5a5a5'><th>Nome</th><th>E-mail</th><th>Excluir</th></tr></thead><tbody>";
            $sql = "SELECT id,tx_nome,tx_email FROM agile_diagnostico_respondentes where id_diagnostico = '".$id_diagnostico."' order by id desc";
            foreach ($conn->query($sql) as $row) {
               echo "<tr><td>".$row['tx_nome']."</td><td>".$row['tx_email']."</td><td><a href='javascript:excluirRespondente(".$row['id'].",0,".$id_diagnostico.");'><i class='small material-icons'>delete</i></a></td></tr>";
            }
            echo "</tbody></table>";
    
    }catch(Exception $e){
        echo $e;
    }

    

?>