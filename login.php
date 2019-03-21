<?php 
session_start();
require_once("class/conexao.php");
require_once("_lib/functions.php");
$email = utf8_decode($_POST['email']);
$senha = utf8_encode($_POST['senha']);
$stmt = $conn->query("select * from agile_perfil where tx_email = '".$email."' and tx_password = '".$senha."'");
$res = $stmt->fetch();
if(sizeof($res) > 1){
    $_SESSION['id_perfil'] = $res['id'];
    $_SESSION['nome'] = $res['tx_nome'];
    header("Location: meus_diagnosticos.php");
}else{
    $_SESSION['login'] = 0;
    header("Location: central_diagnosticos.php");
}
