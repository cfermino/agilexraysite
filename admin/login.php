<?php
session_start();
require_once("_incs/conexao.php");
$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $conn->query("SELECT tx_email,tx_nome from agile_admin where tx_email='".$email."' and tx_password = '".$password."'");
$login = $stmt->fetch(PDO::FETCH_OBJ);
if($login->tx_email){
    $_SESSION['nome'] = $login->tx_nome;
    header("Location: home.php");
}else{
    header("Location: index.php");
}
?>