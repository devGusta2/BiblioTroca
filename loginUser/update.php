<?php

require('../../dao/conexao.php');
$idUser=trim($_POST['id']);
$emailUser=trim($_POST['email']);
$senhaUser=trim($_POST['senha']);
$nomeUser=trim($_POST['nome']);

$sqlUpdate="UPDATE tbUser SET idUser='$idUser',emailUser='$emailUser',senhaUser='$senhaUser',nomeUser='$nomeUser' WHERE idUser='$idUser'";


$result=$mysqli->query($sqlUpdate);


header('Location: perfilUser.php');

?>