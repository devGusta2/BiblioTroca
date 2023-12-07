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
    $bio=$_POST['bio'];//foi

    $cpf=trim($_POST['cpf']);//vai na tabela do usuario e nao da do perfil,
    // pois nao vais ser uma informação visível
    $cep=trim($_POST['cep']);
    $cidade=trim($_POST['city']);
    $bairro=$_POST['bairro'];
    $tel=$_POST['tel'];

    $res="";
    if(isset($_POST['terror'])){
        $res=$res.','.$_POST['terror'];
    }if(isset($_POST['romance'])){
        $res=$res.','.$_POST['romance'];
    }if(isset($_POST['acao'])){
        $res=$res.','.$_POST['acao'];
    }if(isset($_POST['misterio'])){
        $res=$res.','.$_POST['misterio'];
    }if(isset($_POST['poesia'])){
        $res=$res.','.$_POST['poesia'];
    }if(isset($_POST['historia'])){
        $res=$res.','.$_POST['historia'];
    } if(isset($_POST['conto'])){
        $res=$res.','.$_POST['conto'];
    } if(isset($_POST['ciencia'])){
        $res=$res.','.$_POST['ciencia'];
    } if(isset($_POST['humor'])){
        $res=$res.','.$_POST['humor'];
    } if(isset($_POST['biografia'])){
        $res=$res.','.$_POST['biografia'];
    } if(isset($_POST['fantasia'])){
        $res=$res.','.$_POST['fantasia'];
    } if(isset($_POST['arte'])){
        $res=$res.','.$_POST['arte'];
    } if(isset($_POST['tecnologia'])){
        $res=$res.','.$_POST['tecnologia'];
    } if(isset($_POST['ficcao'])){
        $res=$res.','.$_POST['ficcao'];
    } if(isset($_POST['espiritualidade'])){
        $res=$res.','.$_POST['espiritualidade'];
    } if(isset($_POST['guias'])){
        $res=$res.','.$_POST['guias'];
    }
    
    
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
            $sqlInsertPerfil="UPDATE tbPerfil SET apelidoPerfil='$apelido', idadePerfil='$idade',biografiaPerfil='$bio',
            favGeneroPerfil='$res',cepPerfil='$cep',cidadePerfil='$cidade',bairroPerfil='$bairro',path='$path',idUser='$idUser',cpfPerfil='$cpf'
            WHERE idPerfil='$idUser'";
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