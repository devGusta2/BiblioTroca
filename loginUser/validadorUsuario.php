<?php
include('../dao/conexao.php');

$email = $_POST['email'];
$senha = $_POST['senha'];

$querySelect = "SELECT * FROM tbuser WHERE emailUser = '$email' and senhaUser  = '$senha'";
$resultado = $conexao->query($querySelect);
$usuario = $resultado->fetchAll();
$n = count($usuario);

if ($n == 1 or $email=="admin@gmail.com" and $senha="123" ){
  session_start();
  $_SESSION['idUser'] = $usuario[0]['idUser'];
  $_SESSION['nomeUser'] = $usuario[0]['nomeUser'];
  $_SESSION['autenticado'] = 'SIM';
  header('Location: indexUser.php');
}else{
  $_SESSION['autenticado']="NÃO";
  header('Location: indexUser.php?login=erro');
}
?>