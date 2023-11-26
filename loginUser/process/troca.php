<?php
require("../../dao/conexao.php");
include("../protect.php");

if(isset($_POST['acceptTROCA'])){
    $idTroca=$_POST['idTroca'];
    $idLivroSender=$_POST['idLivroS'];
    $idLivroReceiver=$_POST['idLivroR'];
    //ATUALIZA OS LIVROS DA TROCA PARA INDISPONIVEIS, ASSIM NÃO APARECERÁ NA HOME DO SITE
    $updateBookS=$mysqli->query("UPDATE tbLivro SET statusLivro='indisponivel' WHERE idLivro='$idLivroSender'");
    $updateBookR=$mysqli->query("UPDATE tbLivro SET statusLivro='indisponivel' WHERE idLivro='$idLivroReceiver'");
    $update=$mysqli->query("UPDATE tbTroca SET statusTroca='finalizada' WHERE idTroca='$idTroca'");
}else if(isset($_POST['denyTroca'])){
    $idTroca=$_POST['idTroca'];
    $update=$mysqli->query("UPDATE tbTroca SET statusTroca='negada' WHERE idTroca='$idTroca'");
}
 header('Location: ../chat.php');
?>