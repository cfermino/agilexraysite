<?php 
session_start();
require_once("class/conexao.php");
require_once("_lib/functions.php");
$email = utf8_decode($_POST['email']);
$senha = utf8_encode($_POST['senha']);

$stmt = $conn->query("select * from agile_diagnostico_respondentes where tx_email = '".$email."' and tx_senha = '".$senha."' and id_diagnostico = '".$_POST['id_diagnostico']."'");
$res = $stmt->fetch();

$stmt2 = $conn->query("select * from agile_diagnostico_respondentes  where id = '".$_POST['id_respondente']."'");
$nomeRespondente = $stmt2->fetch();

$stmtDiagnostico = $conn->query("select * from agile_diagnostico  where id = '".$_POST['id_diagnostico']."'");
$nomeDiagnostico = $stmtDiagnostico->fetch();

$stmt2 = $conn->query("select * from agile_perfil  where id = '".$nomeDiagnostico['id']."'");
$dadosEmpresa = $stmt2->fetch();


if(($nomeDiagnostico['id'] <> $_POST['id_diagnostico']) or ($nomeDiagnostico['tx_url'] <> $_POST['url_diagnostico'])){

    $_SESSION['login'] = 0;
    $url = 'http://aglexray.agenciajudito.com/'.$_SESSION['url_empresa'].'/'.$_SESSION['url_diagnostico'].'/'.$_SESSION['id_diagnostico'].'/'.$_SESSION['url_respondente'].'.html,350'.$_SESSION['id_respondente'];
    header("Location: $url");
}else{
    $_SESSION['id_diagnostico'] = $_POST['id_diagnostico'];
    $_SESSION['url_diagnostico'] = $_POST['url_diagnostico'];
    $_SESSION['url_empresa'] = $_POST['url_empresa'];
    $_SESSION['url_respondente'] = $_POST['url_respondente'];
    $_SESSION['id_respondente'] = $_POST['id_respondente'];
}





if(sizeof($res) > 1){
    $_SESSION['login'] = $res['id'];
    $_SESSION['id_diagnostico'] = $_POST['id_diagnostico'];
    $_SESSION['url_diagnostico'] = $_POST['url_diagnostico'];
    $_SESSION['url_empresa'] = $_POST['url_empresa'];
    $_SESSION['url_respondente'] = $_POST['url_respondente'];
    $_SESSION['id_respondente'] = $_POST['id_respondente'];
    
    $url = 'http://agilexray.agenciajudito.com/'.$_POST['url_empresa'].'/'.$_POST['url_diagnostico'].'/'.$_POST['id_diagnostico'].'/'.$_POST['url_respondente'].'.html,'.$_POST['id_respondente'];


    header("Location: $url");
}else{
    $_SESSION['login'] = 0;
    $url = 'http://agilexray.agenciajudito.com/'.$_POST['url_empresa'].'/'.$_POST['url_diagnostico'].'/'.$_POST['id_diagnostico'].'/'.$_POST['url_respondente'].'.html,'.$_POST['id_respondente'];
    header("Location: $url");
}


