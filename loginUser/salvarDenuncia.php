<?php
        include('../dao/conexao.php');
        include('protect.php');



        $idDenunciado = $_POST['idDenunciado'];
        $nomeDenunciado = $_POST['nomeDenunciado'];

        $result1_opcao = "INSERT INTO tbDenunciado (nomeDenunciado, idUser) VALUES ('$nomeDenunciado','$idDenunciado') ";

        $resultado1_opcao = mysqli_query($mysqli, $result1_opcao);

        $idUser=$_SESSION['id'];
        $opcao = $_POST['opção'];
        $ocorrencia = $_POST['ocorrencia'];
        

        $nomeUser = "SELECT * FROM tbUser WHERE idUser = $idUser";
        $result=$mysqli->query($nomeUser);

        while($nome=mysqli_fetch_assoc($result)){
                $nomeUsuario=$nome['nomeUser'];
        }

        $result2_opcao = "INSERT INTO tbDenuncia (tipoDenuncia,descDenuncia,idUser,nomeDenuncia,idDenunciado) VALUES ('$opcao','$ocorrencia','$idUser','$nomeUsuario','$idDenunciado') ";
        
        $resultado2_opcao = mysqli_query($mysqli, $result2_opcao);

        header('Location: galeria.php');

?>