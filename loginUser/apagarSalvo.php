<!-- Programador:Gustavo Rodrigues 
Data 27/10/2023


Código para excluir algum livro salvo da lista de salvos do usuario logado
-->

<?php

    //salva a publicação para cada usuario
    include("../dao/conexao.php");
    include("protect.php");
    $idUser=$_SESSION['id'];
    $idLivro=$_POST['idLivroDelete'];
    $sqlSave="DELETE FROM tbSalvos WHERE (idLivro='$idLivro')";
    $querySave=$mysqli->prepare($sqlSave);
    $querySave->execute();

    header('Location: salvos.php');

?>