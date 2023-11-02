<!-- 
Programador Gustavo Rodrigues
Código para enviar as mensagens 
data:22/10/2023

-->

<?php
    include("../../dao/conexao.php");
    include("../protect.php");
    $idUserMain=$_SESSION['id'];
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

            // $createChat=$mysqli->prepare("INSERT INTO tbConversation (mainUserConversation, otherUserConversation,
            // UnreadConversation, CreationConversation) VALUES ($idUserMain, $user_id, 'n', now())");




            // $createChat->bind_param("ii",$uid, $user_id);

            $createChat2=("INSERT INTO tbConversation (mainUserConversation, otherUserConversation,
            UnreadConversation, CreationConversation) VALUES ('$user_id', '$idUserMain', 'y', now())");
            $query2=$mysqli->prepare($createChat2);
            $query2->execute();
    
        

            // $createChat2=$mysqli->prepare("INSERT INTO tbConversation (mainUserConversation, otherUserConversation,
            // UnreadConversation, CreationConversation) VALUES ($user_id, $idUserMain, 'y', now())");


            // $createChat->bind_param("ii",$user_id, $uid);
            // $createChat2->execute();  

            if(!$createChat || !$createChat2){
                die(header("HTTP/1.0 401 Ocorreu um erro ao criar a conversa!"));
            }
            header('Location: ../chat.php');
        }else{
            $update=$mysqli->prepare("UPDATE tbconversation SET unreadConversation ='y'  WHERE
             (mainUserConversation = '$idUserMain' AND otherUserConversation= '$user_id')");
            // $update->bind_param("ii",$user_id, $uid);
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
        // $stmt=$mysqli->prepare("INSERT INTO `tbChat`(`senderChat`,`receiverChat`,`messageChat`,`imageChat`,`creationChat`)
        // VALUES ('$idUserMain', '$user_id', '$message', '$image', now()) ");
        // $stmt->bind_param("ii",$user_id, $idUser,$message,$image);
        
        header('Location: ../chat.php');
        if(!$stmt){
            die(header("HTTP/1.0 401 Ocorreu um erro ao enviar sua mensagem!"));
        }

    }else{
        die(header("Location: ../galeria.php"));
    }
?>