
<?php
require("../../dao/conexao.php");
include("../protect.php");


    if(isset($_GET['id'])){
        $user_id=$_GET['id'];
        $idUser=$_SESSION['id'];
        $stmt =("SELECT * FROM tbChat WHERE 
                (senderChat = $idUser AND receiverChat=$user_id)  OR (receiverChat = $idUser AND senderChat=$user_id)");
        $res=$mysqli->query($stmt);
        $count=$res->num_rows;


        $getUser=("SELECT nomeUser FROM tbUser WHERE (idUser LIKE '$user_id') LIMIT 1");
        $user=$mysqli->query($getUser);
        while($resUser=mysqli_fetch_assoc($user)){
            $userName=$resUser['nomeUser'];
        }

        
        if($count < 1){
            // echo '<p class="info">Envie sua primeira mensagem para'.$userName.'</p>';
        }else{
            while($message=mysqli_fetch_assoc($res)){
                $mensagem=$message["senderChat"];
                $mensagemTexto=$message["messageChat"];
                
              
                if($message["senderChat"]==$idUser && $message["imageChat"] !=""){
                    ?>
                        <div class="row sent">
                            <img src="uploads/<?php echo $message["imageChat"]?>" alt="">
                        </div>
                    <?php
                }else if($message["senderChat"]==$idUser){
                    ?>
                    <div class="row sent">
                        <p><?php echo $mensagemTexto?></p>
                    </div>
                <?php
                }else if($message["imageChat"]!=""){
                    ?>
                    <div class="row recieved">
                        <img src="uploads/<?php echo $message["imageChat"]?>" alt="">
                    </div>
                <?php
                }else{
                    ?>
                    <div class="row recieved">
                        <p><?php echo $mensagemTexto?></p>
                    </div>
                <?php
                }
            }
        }
    }


?>


