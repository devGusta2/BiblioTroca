<?php
        include('../dao/conexao.php');
        include('protect.php');



        $idDenunciado = $_POST['idDenunciado'];
        $nomeDenunciado = $_POST['nomeDenunciado'];
        $idUser=$_SESSION['id'];
        $opcao = $_POST['opção'];
        $ocorrencia = $_POST['ocorrencia'];
        $sql="SELECT * FROM tbUser WHERE idUser='$idUser'";
        $res=$mysqli->query($sql);
        while($dado=mysqli_fetch_assoc($res)){
                $nomeDenunciador=$dado['nomeUser'];
        }



        $result2_opcao = "INSERT INTO tbDenuncia (tipoDenuncia,descDenuncia,idUser,nomeDenuncia,idDenunciado) VALUES ('$opcao','$ocorrencia','$idUser','$nomeDenunciador','$idDenunciado') ";
        
        $resultado2_opcao = mysqli_query($mysqli, $result2_opcao);

        header('Location: galeria.php');

?>