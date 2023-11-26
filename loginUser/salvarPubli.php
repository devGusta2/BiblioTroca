<?php
    //salva a publicação para cada usuario
    include("../dao/conexao.php");
    include("protect.php");
    $idUser=$_SESSION['id'];
    $idLivro=$_GET['idLivroSalvar'];
    $sqlSave="INSERT INTO tbSalvos(idLivro, idPerfil)VALUES($idLivro,$idUser)";
    $querySave=$mysqli->prepare($sqlSave);
    $querySave->execute();

    header('Location: galeria.php');
?>