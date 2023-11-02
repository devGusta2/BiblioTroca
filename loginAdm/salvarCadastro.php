<?php

include ('../dao/conexao.php');

$emailCadadastro=trim($_POST['emailCadastro']);
$senhaCadastro=trim($_POST['senhaCadastro']);
$nomeCadastro=trim($_POST['nomeCadastro']);
echo$nomeCadastro;
$sql= "INSERT INTO tbUserAdm(emailUserAdm,senhaUserAdm,nomeUserAdm)VALUES('$emailCadadastro','$senhaCadastro','$nomeCadastro')";

$query=$mysqli->prepare($sql);
$query->execute();

header('Location: loginAdm.php');

?>