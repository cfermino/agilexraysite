<?php
session_start();
require_once("class/conexao.php");
require_once("_lib/functions.php");
$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $conn->query("select * from agile_perfil where tx_email = '".$email."' and tx_password = '".$password."'");
$res = $stmt->fetch();
if(sizeof($res) > 1){
    $_SESSION['id_perfil'] = $res['id'];
    $_SESSION['nome'] = $res['tx_nome'];
    echo 'ok';
}else{
    $_SESSION['login'] = 0;
    echo 'erro';
}
?>