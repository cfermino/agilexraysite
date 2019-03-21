<?php

    require_once("class/conexao.php");
    require_once("_lib/functions.php");
  

    $id_diagnostico = $_POST['id_diagnostico'];
    $id_respondente = $_POST['id_respondente'];
    $id_pergunta = $_POST['id_pergunta'];
    $in_nota = $_POST['in_nota'];

    
    try {
      
        $stmt = $conn->query(
            'delete from agile_notas_respondentes where id_pergunta = "'.$id_pergunta.'" and id_respondente = "'.$id_respondente.'" and id_diagnostico = "'.$id_diagnostico.'"'
        );

            $stmt = $conn->query(
                'INSERT INTO agile_notas_respondentes (id_diagnostico,id_pergunta,id_respondente,in_nota)
                 VALUES ("'.$id_diagnostico.'","'.$id_pergunta.'","'.$id_respondente.'","'.$in_nota.'")'
            );
    
       
    }catch(Exception $e){
        echo $e;
    }

    

?>