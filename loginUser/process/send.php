<!-- 
Programador Gustavo Rodrigues
Código para enviar as mensagens 
data:22/10/2023

-->

<?php
    include("../../dao/conexao.php");
    include("../protect.php");
    $idUserMain=$_SESSION['id'];


/*
if(isset($_POST['trocaDireta']) && isset($_POST['idReceptor'])){
    $message=$_POST["message"];
    $idReceptor=$_POST['idReceptor'];


    
    $selectMain="SELECT * FROM tbUser WHERE idUser='$idUserMain'";
    $resultado=$mysqli->query($selectMain);

    while($res=mysqli_fetch_assoc($resultado)){
        $nomeUserTroca=$res['nomeUser'];
    }
    //fazer um sistema onde a proposta de troca seja feita pelo acervo de livros do usuario
    // e ja venha na proposta para o outro usuaio
    $mensagemTrocaDireta=$nomeUserTroca."   "."Gostaria de trocar o livro"."  "."Pelo seu Livro:"."  ".$_POST['livro'];
    


    $image="";
    if(!$_FILES["image"]<=0 && $idReceptor!=""){

    }else if($message=="" && $idReceptor==""){
        die(header("HTTP/0.1 401 Escreva uma mensagem!"));
    }else{
      
    }


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
    }else{
        $update=$mysqli->prepare("UPDATE tbconversation SET unreadConversation ='y'  WHERE
         (mainUserConversation = '$idUserMain' AND otherUserConversation= '$idReceptor')");




        $update->execute();
        if(!$update){
            die(header("HTTP/1.0 401 Ocorreu um erro ao atualizar a conversa!"));
        }
        header('Location: ../chat.php');
    }
    $stmt=("INSERT INTO tbChat(senderChat,receiverChat,messageChat,imageChat,creationChat)
    VALUES ('$idUserMain', '$idReceptor', '$mensagemTrocaDireta', '$image', now()) ");
    $queryFinal=$mysqli->prepare($stmt);
    $queryFinal->execute();
   
    
    header('Location: ../chat.php');
    if(!$stmt){
        die(header("HTTP/1.0 401 Ocorreu um erro ao enviar sua mensagem!"));
    }
//


}else if(isset($_POST['proposta'])&& isset($_POST['idReceptor'])){

    $idReceptor=$_POST['idReceptor'];
    $selectMain="SELECT * FROM tbUser WHERE idUser='$idUserMain'";
    $resultado=$mysqli->query($selectMain);

    while($res=mysqli_fetch_assoc($resultado)){
        $nomeUserTroca=$res['nomeUser'];
    }

    
    $mensagemTrocaProposta="Você recebeu uma Proposta!"."   ".$nomeUserTroca."deseja negociar a troca do livro:"."   ".$_POST['livro'];
    



    
    $image="";
    if(!$_FILES["image"]<=0 && $idReceptor!=""){

    }else if($mensagemTrocaProposta=="" && $idReceptor==""){
        die(header("HTTP/0.1 401 Escreva uma mensagem!"));
    }else{
      
    }


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
    }else{
        $update=$mysqli->prepare("UPDATE tbconversation SET unreadConversation ='y'  WHERE
         (mainUserConversation = '$idUserMain' AND otherUserConversation= '$idReceptor')");




        $update->execute();
        if(!$update){
            die(header("HTTP/1.0 401 Ocorreu um erro ao atualizar a conversa!"));
        }
        header('Location: ../chat.php');
    }
    $stmt=("INSERT INTO tbChat(senderChat,receiverChat,messageChat,imageChat,creationChat)
    VALUES ('$idUserMain', '$idReceptor', '$mensagemTrocaProposta', '$image', now()) ");
    $queryFinal=$mysqli->prepare($stmt);
    $queryFinal->execute();
   
    
    header('Location: ../chat.php');
    if(!$stmt){
        die(header("HTTP/1.0 401 Ocorreu um erro ao enviar sua mensagem!"));
    }//


}   


*/























    if(isset($_POST["message"]) && isset($_POST["id"])){
        $user_id=$_POST["id"];
        $message=$_POST["message"];
        
        $image="";
        if(!$_FILES["image"]<=0 && $user_id!=""){

        }else if($message=="" && $user_id==""){
            die(header("HTTP/0.1 401 Escreva uma mensagem!"));
        }else{
          
        }

 
        $checkConversation = ("SELECT * FROM tbConversation WHERE
         (mainUserConversation = '$idUserMain' AND otherUserConversation='$user_id')");
        $resCheck=$mysqli->query($checkConversation);  
        $count=$resCheck->num_rows;

        if($count<1){

            $createChat=("INSERT INTO tbConversation (mainUserConversation, otherUserConversation,
            UnreadConversation, CreationConversation) VALUES ('$idUserMain', '$user_id', 'n', now())");

            $query=$mysqli->prepare($createChat);
            $query->execute();




            $createChat2=("INSERT INTO tbConversation (mainUserConversation, otherUserConversation,
            UnreadConversation, CreationConversation) VALUES ('$user_id', '$idUserMain', 'y', now())");
            $query2=$mysqli->prepare($createChat2);
            $query2->execute();
    
        


            if(!$createChat || !$createChat2){
                die(header("HTTP/1.0 401 Ocorreu um erro ao criar a conversa!"));
            }
            header('Location: ../chat.php');
        }else{
            $update=$mysqli->prepare("UPDATE tbconversation SET unreadConversation ='y'  WHERE
             (mainUserConversation = '$idUserMain' AND otherUserConversation= '$user_id')");




            $update->execute();
            if(!$update){
                die(header("HTTP/1.0 401 Ocorreu um erro ao atualizar a conversa!"));
            }
            header('Location: ../chat.php');
        }
        $stmt=("INSERT INTO tbChat(senderChat,receiverChat,messageChat,imageChat,creationChat)
        VALUES ('$idUserMain', '$user_id', '$message', '$image', now()) ");
        $queryFinal=$mysqli->prepare($stmt);
        $queryFinal->execute();
       
        
        header('Location: ../chat.php');
        if(!$stmt){
            die(header("HTTP/1.0 401 Ocorreu um erro ao enviar sua mensagem!"));
        }

    }else{
        die(header("Location: ../galeria.php"));
    }
?>