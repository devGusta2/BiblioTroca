<?php


    if($_POST){
        $idUser=$_POST['idUser'];
        $sql="SELECT * FROM tblivro WHERE idLivro= $idlivro";

        $resultado = $conexao->query($querySelect);
        $livro = $resultado->fetch();


    }


?>