<?php
include('../../dao/conexao.php');
include('../protect.php');
$idUserMain=$_SESSION['id'];
if($_SERVER['REQUEST_METHOD']=='POST'){
    if($_POST['seguir']){
        $idUser=$_POST['id'];
        $sqlInsert="INSERT INTO tbSeguir(idSeguindo,idPerfil)VALUES('$idUser','$idUserMain')";
        $mysqli->query($sqlInsert);
        header('Location: ../perfil.php');
    }else if($_POST['excluir']){
        $idUser=$_POST['id'];
        $sqlDel = "DELETE FROM tbSeguir WHERE idPerfil = '$idUserMain' AND idSeguindo='$idUser';";
        $mysqli->query($sqlDel);
        header('Location: ../perfil.php');
    }
}

?>