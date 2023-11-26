<?php
include("../../dao/conexao.php");
include("../protect.php");
$idUserMain=$_SESSION['id'];

if(isset($_POST['trocaDireta']) && isset($_POST['idReceptor'])){




    $selectMain="SELECT * FROM tbUser WHERE idUser='$idUserMain'";
    $resultado=$mysqli->query($selectMain);

    while($res=mysqli_fetch_assoc($resultado)){
        $nomeUserTroca=$res['nomeUser'];
    }
    //fazer um sistema onde a proposta de troca seja feita pelo acervo de livros do usuario
    // e ja venha na proposta para o outro usuaio

   echo $_POST['idReceptor'];





}else if(isset($_POST['proposta']) && isset($_POST['idReceptor'])){
   

    $idLivroReceptor=$_POST['idLivroReceptor'];

    $selectMain="SELECT * FROM tbUser WHERE idUser='$idUserMain'";
    $resultado=$mysqli->query($selectMain);

    while($res=mysqli_fetch_assoc($resultado)){
        $nomeUserTroca=$res['nomeUser'];
    }
    $idParaTroca=$_POST['idParaTroca'];


    $resLivro=$mysqli->query("SELECT * FROM tbLivro WHERE idUser='$idParaTroca'");
    while($infoLivro=mysqli_fetch_assoc($resLivro)){
        $nomeLivroParaTroca=$res['nomeLivro'];
    }
    $valorTroca=$_POST['cash'];
    $idReceptor=$_POST['idReceptor'];


    $sqlInsert="INSERT INTO tbTroca (idSenderTroca,idReceiverTroca,valorPropostaTroca,
    prospostaTroca,idLivroReceptor,idLivroMainUser) VALUES('$idUserMain','$idReceptor',
    '$valorTroca','teste','$idLivroReceptor','$idParaTroca')";
     $query=$mysqli->prepare($sqlInsert);
     $query->execute();



    
     $checkConversation = ("SELECT * FROM tbConversation WHERE
     (mainUserConversation = '$idUserMain' AND otherUserConversation='$idReceptor')");
    $resCheck=$mysqli->query($checkConversation);  
    $count=$resCheck->num_rows;

    if($count<1){

        $createChat=("INSERT INTO tbConversation (mainUserConversation, otherUserConversation,
        UnreadConversation, CreationConversation) VALUES ('$idUserMain', '$idReceptor', 'n', now())");

        $query=$mysqli->prepare($createChat);
        $query->execute();




        $createChat2=("INSERT INTO tbConversation (mainUserConversation, otherUserConversation,
        UnreadConversation, CreationConversation) VALUES ('$idReceptor', '$idUserMain', 'y', now())");
        $query2=$mysqli->prepare($createChat2);
        $query2->execute();


        if(!$createChat || !$createChat2){
            die(header("HTTP/1.0 401 Ocorreu um erro ao criar a conversa!"));
        }
        header('Location: ../chat.php');
    }
}   
header('Location: ../galeria.php');
?>


<script>
    // $(document).ready(function (){
    //     $.ajax({       
    //             url:'process/chat.php?id='+id,
    //                success: function(data){
    //                 $('#chat').html(data);

    //             },
    //             error: function(error){
    //                 Swal.fire(
    //                     {
    //                         title:'Erro!',
    //                         text: error.statusText,
    //                         icon:'error',
    //                         confirmButtonText:'OK'
    //                     }
    //                 )
    //             }
    //         })
    // });
</script>
