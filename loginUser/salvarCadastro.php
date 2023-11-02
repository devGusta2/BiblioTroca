<?php

include ('../dao/conexao.php');

$emailCadadastro=trim($_POST['emailCadastro']);
$senhaCadastro=password_hash(trim($_POST['senhaCadastro']),PASSWORD_DEFAULT);
$nomeCadastro=trim($_POST['nomeCadastro']);
$statusCadastro="pendente";
$status="ativo";
$sql= "INSERT INTO tbUser(emailUser,senhaUser,nomeUser,statusUser,statusCadastro)VALUES('$emailCadadastro','$senhaCadastro','$nomeCadastro','$status','$statusCadastro')";

$query=$mysqli->prepare($sql);
$query->execute();
header('Location: loginUser.php');

?>

