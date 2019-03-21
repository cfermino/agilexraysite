<?php
require_once("_incs/conexao.php");
if($_POST['table'] == 'cargos'){
    $cargo_pt = utf8_decode($_POST['cargo-pt']);
    $cargo_en = utf8_decode($_POST['cargo-en']);
    try {

        if($_POST['id'] > 0){
            $stmt = $conn->query(
                'UPDATE agile_cargos set tx_cargo_en = "'.$cargo_en.'", tx_cargo_pt = "'.$cargo_pt.'"
                where id = "'.$_POST['id'].'"'
            );          
        }else{
           
            $stmt = $conn->query(
                'INSERT INTO agile_cargos (tx_cargo_pt,tx_cargo_en)
                 VALUES ("'.$cargo_pt.'","'.$cargo_en.'")'
            );
            
        }
        header("Location:lista_cargos.php");
        
       
    }catch(Exception $e){
        echo $e;
    }
}


if($_POST['table'] == 'diagnosticos'){
    $diagnostico_pt = utf8_decode($_POST['diagnostico-pt']);
    $diagnostico_en = utf8_decode($_POST['diagnostico-en']);
    $texto_en = utf8_decode($_POST['tx_texto_en']);
    $texto_pt = utf8_decode($_POST['tx_texto_pt']);
    $corpo_email_en = utf8_decode($_POST['corpo_email_en']);
    $corpo_email_pt = utf8_decode($_POST['corpo_email_pt']);    
    $id_pai          = $_POST['id_pai_diagnostico'];
    try {

        if($_POST['id'] > 0){
            $stmt = $conn->query(
                'UPDATE agile_diagnosticos set tx_diagnostico_en = "'.$diagnostico_en.'", tx_diagnostico_pt = "'.$diagnostico_pt.'", id_pai = "'.$id_pai.'" , tx_texto_pt = "'.$texto_pt.'" , tx_texto_en = "'.$texto_en.'"
                ,corpo_email_pt = "'.$corpo_email_pt.'" , corpo_email_en = "'.$corpo_email_en.'" 
                where id = "'.$_POST['id'].'"'
            );          
        }else{
           
            $stmt = $conn->query(
                'INSERT INTO agile_diagnosticos (tx_diagnostico_pt,tx_diagnostico_en,id_pai,tx_texto_en,tx_texto_pt,corpo_email_en,corpo_email_pt)
                 VALUES ("'.$diagnostico_pt.'","'.$diagnostico_en.'","'.$id_pai.'","'.$texto_en.'","'.$texto_pt.'","'.$corpo_email_en.'","'.$corpo_email_pt.'")'
            );
            
        }
        header("Location:lista_diagnosticos.php");
        
       
    }catch(Exception $e){
        echo $e;
    }
}


if($_POST['table'] == 'eixos'){
    $eixo_pt     = utf8_decode($_POST['eixo-pt']);
    $eixo_en     = utf8_decode($_POST['eixo-en']);
    $in_plotavel = $_POST['in_plotavel'];
    $in_peso     = $_POST['in_peso'];
    $id_diagnostico     = $_POST['id_diagnostico'];
    if($in_peso == ''){
        $in_peso = 1;
    }
    try {

        if($_POST['id'] > 0){
            $stmt = $conn->query(
                'UPDATE agile_eixos set in_peso = "'.$in_peso.'",tx_eixo_en = "'.$eixo_en.'", tx_eixo_pt = "'.$eixo_pt.'", in_plotavel = "'.$in_plotavel.'" 
                where id = "'.$_POST['id'].'"');    
        }else{
            $stmt = $conn->query(
                'INSERT INTO agile_eixos (tx_eixo_pt,tx_eixo_en,in_plotavel,in_peso,id_diagnostico)
                 VALUES ("'.$eixo_pt.'","'.$eixo_en.'","'.$in_plotavel.'","'.$in_peso.'","'.$id_diagnostico.'")'
            );
        }
        header("Location:lista_eixos.php");
        
       
    }catch(Exception $e){
        echo $e;
    }
}

if($_POST['table'] == 'planos'){
    $plano_pt     = utf8_decode($_POST['plano-pt']);
    $plano_en     = utf8_decode($_POST['plano-en']);
    $in_plotavel = $_POST['in_plotavel'];
    try {

        if($_POST['id'] > 0){
            $stmt = $conn->query(
                'UPDATE agile_planos set tx_plano_en = "'.$plano_en.'", tx_plano_pt = "'.$plano_pt.'" 
                where id = "'.$_POST['id'].'"'
            );          
        }else{
           
            $stmt = $conn->query(
                'INSERT INTO agile_planos (tx_plano_pt,tx_plano_en)
                 VALUES ("'.$plano_pt.'","'.$plano_en.'")'
            );
            
        }
        header("Location:lista_planos.php");
        
       
    }catch(Exception $e){
        echo $e;
    }
}


if($_POST['table'] == 'ramos'){
    $ramo_pt     = utf8_decode($_POST['ramo-pt']);
    $ramo_en     = utf8_decode($_POST['ramo-en']);
    $in_plotavel = $_POST['in_plotavel'];
    try {

        if($_POST['id'] > 0){
            $stmt = $conn->query(
                'UPDATE agile_ramos set tx_ramo_en = "'.$ramo_en.'", tx_ramo_pt = "'.$ramo_pt.'" 
                where id = "'.$_POST['id'].'"'
            );          
        }else{
           
            $stmt = $conn->query(
                'INSERT INTO agile_ramos (tx_ramo_pt,tx_ramo_en)
                 VALUES ("'.$ramo_pt.'","'.$ramo_en.'")'
            );
            
        }
        header("Location:lista_ramos.php");
        
       
    }catch(Exception $e){
        echo $e;
    }
}


if($_POST['table'] == 'perguntas'){
    $pergunta_pt     = utf8_decode($_POST['pergunta-pt']);
    $pergunta_en     = utf8_decode($_POST['pergunta-en']);
    $id_eixo = $_POST['id_eixo'];
    $in_peso = $_POST['in_peso'];
    if($in_peso == ''){
        $in_peso = 1;
    }
    try {

        if($_POST['id'] > 0){
            $stmt = $conn->query(
                'UPDATE agile_perguntas set tx_pergunta_en = "'.$pergunta_en.'", tx_pergunta_pt = "'.$pergunta_pt.'" , id_eixo = "'.$id_eixo.'" 
                , in_peso = "'.$in_peso.'" 
                where id = "'.$_POST['id'].'"'
            );          
        }else{
           
            $stmt = $conn->query(
                'INSERT INTO agile_perguntas (tx_pergunta_pt,tx_pergunta_en,id_eixo,in_peso)
                 VALUES ("'.$pergunta_pt.'","'.$pergunta_en.'","'.$id_eixo.'","'.$in_peso.'")'
            );
            
        }
        header("Location:lista_perguntas.php");
        
       
    }catch(Exception $e){
        echo $e;
    }
}


if($_POST['table'] == 'textos'){
    $texto_pt     = utf8_decode($_POST['texto-pt']);
    $texto_en     = utf8_decode($_POST['texto-en']);
    $tipo     = utf8_decode($_POST['tipo']);


    try {

        if($_POST['id'] > 0){
            $stmt = $conn->query(
                'UPDATE agile_configuracoes set tx_texto_en = "'.$texto_en.'", tx_texto = "'.$texto_pt.'", tx_tipo = "'.$tipo.'" 
                where id = "'.$_POST['id'].'"'
                
            );          
        }else{
           
            $stmt = $conn->query(
                'INSERT INTO agile_configuracoes (tx_texto,tx_texto_en,tx_tipo)
                 VALUES ("'.$texto_pt.'","'.$texto_en.'","'.$tipo.'")'
            );
            
        }
        header("Location:lista_textos.php");
        
       
    }catch(Exception $e){
        echo $e;
    }
}



?>