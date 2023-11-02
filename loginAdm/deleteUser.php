<?php

include('../dao/conexao.php');
   if($_POST) {
    $id_usuario = $_POST['id_usuarioUp'];
    $querySelect = "DELETE FROM tbuser WHERE idUser = $id_usuario";
    $resultado = $mysqli-> query($querySelect);
  }
  header('Location: cadastro.php');
  exit;

?>