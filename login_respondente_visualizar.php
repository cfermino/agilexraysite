<?php 
session_start();
require_once("class/conexao.php");
require_once("_lib/functions.php");
$email = utf8_decode($_POST['email']);
$senha = utf8_encode($_POST['senha']);

$stmt = $conn->query("select * from agile_diagnostico_respondentes where tx_email = '".$email."' and tx_senha = '".$senha."' and id_diagnostico = '".$_POST['id_diagnostico']."'");
$res = $stmt->fetch();
$url = 'http://agilexray.agenciajudito.com/relatorio_individual.php?id_perfil='.$_POST['id_perfil'].'&id_diagnostico='.$_POST['id_diagnostico'];
if(sizeof($res) > 1){
    $_SESSION['login'] = 1;
     header("Location: $url");
}else{
    $_SESSION['login'] = 0;
    header("Location: $url");
}


