<?php
include("../../dao/conexao.php");
include("../protect.php");
$idUser=$_SESSION['id'];
$resultado=$mysqli->query("SELECT * FROM tbTroca WHERE idReceiverTroca='$idUser'");
$cont=$resultado->num_rows;

if($cont>0){
    while($dados=mysqli_fetch_assoc($resultado)){
        $idSender=$dados['idSenderTroca'];
        $idReceiver=$dados['idReceiverTroca'];
        $valorProposta=$dados['valorPropostaTroca'];
        $proposta=$dados['prospostaTroca'];
        $idLivroReceiver=$dados['idLivroReceptor'];
        $idLivroSender=$dados['idLivroMainUser'];
        $statusTroca=$dados['statusTroca'];   
         //SELECTIONA O NOME DA PESSOA QUE QUERO TROCAR
         
        $sqlSender=$mysqli->query("SELECT * FROM tbUser WHERE idUser='$idSender'");
        while($dadosSender=mysqli_fetch_assoc($sqlSender)){
            $nomeSender=$dadosSender['nomeUser'];
        }
            //SELECIONA AS INFORMAÇÕES DO LIVRO DA PESSOA QUE QUER TROCAR

        $book1=$mysqli->query("SELECT * FROM tbLivro WHERE idLivro='$idLivroSender'");
        while($resBook1=mysqli_fetch_assoc($book1)){
            $nomeLivroSender=$resBook1['nomeLivro'];
        }

        
        $book2=$mysqli->query("SELECT * FROM tbLivro WHERE idLivro='$idLivroReceiver'");
        
        while($resBook=mysqli_fetch_assoc($book2)){
            $nomeLivroReceiver=$resBook['nomeLivro'];
        }
        $mensagem="Você Recebeu uma proposta!\n"."$nomeSender"."Gostaria de trocar o livro:".
        "$nomeLivroSender"."\n"."Pelo livro:"."$nomeLivroReceiver";
        
        
    }
}
  

    

    //SELECIONA AS INFOMAÇÕES DO LIVRO QUE A PESSOA QUER RECBEER



?>