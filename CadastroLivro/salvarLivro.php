

<?php

include('../dao/conexao.php');
include('../loginUser/protect.php');
$idUser=$_SESSION['id'];

$nomeLivro=trim($_POST['nomeLivro']);
$descLivro=trim($_POST['descLivro']);
$edicaoLivro=trim($_POST['edicaoLivro']);
$autorLivro=trim($_POST['autorLivro']);
$editoraLivro=trim($_POST['editoraLivro']);
$idiomaLivro=trim($_POST['idiomaLivro']);
$paginasLivro=trim($_POST['paginasLivro']);
$acabamentoLivro=$_POST['acabamentoLivro'];
$generoLivro=trim($_POST['genero']);

if(isset($_FILES['arquivo'])){
    $arquivo = $_FILES['arquivo'];

     if($arquivo['error'])
         die("falha ao enviar arquivo");

 if($arquivo['size'] > 2097152)
     die("Arquivo muito grande! Max: 2MB");

 $pasta = "../LoginUser/arquivos/";
 $nomeDoArquivo = $arquivo['name'];
 $novoNomeDoArquivo = uniqid();
 $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

      if($extensao != "jpg" && $extensao != 'png'){
          die("Tipo de arquivo não aceito");
      }

      $path = $pasta . $novoNomeDoArquivo . "." . $extensao;

        $deu_certo =  move_uploaded_file($arquivo['tmp_name'], $path);
         if($deu_certo){
            $sqlInsert="INSERT INTO tbLivro(nomeLivro,descLivro,edicaoLivro,autorLivro,editoraLivro,idiomaLivro,paginasLivro,acabamentoLivro,idUser, nomeArquivo, path)
            VALUES ('$nomeLivro','$descLivro','$edicaoLivro','$autorLivro','$editoraLivro','$idiomaLivro','$paginasLivro','$acabamentoLivro','$idUser','$nomeDoArquivo', '$path')";
            $query=$mysqli->prepare($sqlInsert);
            $query->execute();
              
              echo "<p>Arquivo enviado com sucesso!.</p>";
         }else{
                     echo "<p>Falha ao enviar arquivo</p>";
         }
     
 }




header('Location: ../loginUser/galeria.php');
// header('Location: ../loginuser/galeria.php');

           
?>