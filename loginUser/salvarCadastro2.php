<!-- Programador Gustavo Rodrigues
Data:08/09/2023
inserir os dados do usuario na tabela perfil

-->

<?php
    include('../dao/conexao.php');
    include('protect.php');


    $idUser=$_SESSION['id'];

    $apelido=$_POST['apelido'];//foi
    $idade=$_POST['idade'];//foi
    $sexo=$_POST['sexo'];//foi
    $bio=$_POST['bio'];//foi

    $cpf=trim($_POST['cpf']);//vai na tabela do usuario e nao da do perfil,
    // pois nao vais ser uma informação visível
    $cep=trim($_POST['cep']);
    $cidade=trim($_POST['cidade']);
    $bairro=$_POST['bairro'];
    $tel=$_POST['tel'];
    $generoFavorito=$_POST['generoLivro'];
    
    if(isset($_FILES['arquivoUser'])){
        $arquivo=$_FILES['arquivoUser'];

        if($arquivo['error']){
            die("Falha ao enviar o arquivo, tente novamente.");
        }

        if($arquivo['size']>2097152){
            die("Arquivo muito grande! Max 2MB" );
        }

        $pasta="../LoginUser/arquivos/userImage/";

        $nomeDoArquivo=$arquivo['name'];
        $novoNomeDoarquivo=uniqid();
        $extensao=strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

        if($extensao !="jpg" && $extensao !='png'){
            die("Tipo de arquivo deve ser somente PNG ou JPG");
        }
        $path=$pasta.$novoNomeDoarquivo.".".$extensao;
        $deu_certo=move_uploaded_file($arquivo['tmp_name'],$path);
        if($deu_certo){
            //INSERE DOS DADOS DO TELEFONE NA TABELA TELEFONE
            $sqlInserTel="INSERT INTO tbTelUser
            (numTelUser,idUser)VALUES('$tel',$idUser)
            ";
         

            //INSERE OS DADOS DO PERFIL
            $sqlInsertPerfil="INSERT INTO tbPerfil
            (apelidoPerfil,idadePerfil,sexoPerfil,biografiaPerfil,favGeneroPerfil,cepPerfil,cidadePerfil,bairroPerfil,fotoPerfil, path,idUser, cpfPerfil)
            VALUES('$apelido','$idade','$sexo','$bio','$generoFavorito','$cep','$cidade','$bairro','$nomeDoArquivo','$path','$idUser','$cpf')";

            //atualiza o cadastro do usuario para cadastrado

            $sqlUpdate="UPDATE tbUser SET statusCadastro='cadastrado' WHERE idUser='$idUser'";
         


            $query1=$mysqli->prepare($sqlInserTel);
            $query2=$mysqli->prepare($sqlUpdate);
            $query3=$mysqli->prepare($sqlInsertPerfil);
            
            $query1->execute();
            $query2->execute();
            $query3->execute();

            header('Location: perfil.php');
        }else{
             echo "<p>Falha ao enviar arquivo</p>";
         }
    }

?>