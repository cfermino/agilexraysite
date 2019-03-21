<?php

    require_once("class/conexao.php");
  
    $nome = utf8_decode($_POST['nome']);
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $empresa = utf8_decode($_POST['empresa']);
    $cargo = utf8_decode($_POST['cargo']);
    $id_ramo_atividade = $_POST['id_ramo_atividade'];
    $id_diagnostico = $_POST['id_diagnostico'];
    $id_plano = $_POST['id_plano'];
    $razao_social = utf8_decode($_POST['razao_social']);
    $cnpj = $_POST['cnpj'];
    $endereco = utf8_decode($_POST['endereco']);
    $numero = $_POST['numero'];
    $bairro = utf8_decode($_POST['bairro']);
    $cep = $_POST['cep'];
    $cidade = utf8_decode($_POST['cidade']);
    $estado = utf8_decode($_POST['estado']);
    $complemento = utf8_decode($_POST['complemento']);
    try {
        $stmt = $conn->query(
            'INSERT INTO agile_perfil (tx_nome,tx_email,tx_password,tx_empresa,id_ramo_atividade,id_diagnostico,id_plano,tx_razao_social,tx_cnpj,tx_endereco,tx_numero,tx_bairro,tx_cep,tx_cidade,tx_estado,tx_complemento,tx_cargo)
             VALUES ("'.$nome.'","'.$email.'","'.$senha.'","'.$empresa.'","'.$id_ramo_atividade.'","'.$id_diagnostico.'","'.$id_plano.'"
             ,"'.$razao_social.'","'.$cnpj.'","'.$endereco.'","'.$numero.'","'.$bairro.'","'.$cep.'","'.$cidade.'","'.$estado.'","'.$complemento.'","'.$cargo.'")'
        );
        echo "Usuário Cadastrado com sucesso<br/><br/>";
        echo "<a href='admin'>Admin</a>";
    }catch(Exception $e){
        echo $e;
    }

    

?>