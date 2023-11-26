
<?php
require("../../dao/conexao.php");
include("../protect.php");
$idUser=$_SESSION['id'];


$resultado1=$mysqli->query("SELECT * FROM tbTroca WHERE idSenderTroca='$idUser'");
$cont1=$resultado1->num_rows;

if($cont1>0){

    while($resSender=mysqli_fetch_assoc($resultado1)){
        $idTroca=$resSender['idTroca'];
        $idSender=$resSender['idSenderTroca'];
        $idReceiver=$resSender['idReceiverTroca'];
        $valorProposta=$resSender['valorPropostaTroca'];
        $proposta=$resSender['prospostaTroca'];
        $idLivroReceiver=$resSender['idLivroReceptor'];
        $idLivroSender=$resSender['idLivroMainUser'];
        $statusTroca=$resSender['statusTroca'];   

        $sqlSender=$mysqli->query("SELECT * FROM tbUser WHERE idUser='$idReceiver'");
        while($dadosSender=mysqli_fetch_assoc($sqlSender)){
            $nomeReceiver=$dadosSender['nomeUser'];
        }

        $book1=$mysqli->query("SELECT * FROM tbLivro WHERE idLivro='$idLivroSender'");
        while($resBook1=mysqli_fetch_assoc($book1)){
            $nomeLivroSender=$resBook1['nomeLivro'];
            $edicaoLivroSender=$resBook1['edicaoLivro'];
            $autorLivroSender=$resBook1['autorLivro'];
            $imgLivroSender=$resBook1['path'];
        }

        $book2=$mysqli->query("SELECT * FROM tbLivro WHERE idLivro='$idLivroReceiver'");
        
        while($resBook=mysqli_fetch_assoc($book2)){
            $nomeLivroReceiver=$resBook['nomeLivro'];
            $edicaoLivroReceiver=$resBook['edicaoLivro'];
            $autorLivroReceiver=$resBook['autorLivro'];
            $imgLivroReceiver=$resBook['path'];
        }
    }

if($statusTroca=='aberta'){
    ?>

                    <div class="row senderTroca">
                        <div class="prop" style="padding:3% 0;text-align:center; background-color:#FFD14B;color:black;
                        border-radius:10px; display:flex; flex-direction:column;">
                            <h3>Você enviou uma solicitação de troca!</h3><br>
                            <h4>Sua oferta + <?php echo $proposta;?> em troca de:</h4><br>
                            <div class="col" style="display:flex;flex-direction:row;">
                        <div class="row" style="display:flex;flex-direction:row;">
                            <div class="img">
                                <?php echo"<img src='$imgLivroSender' id='imgBook'>"?>
                            </div>
                            <div class="info" style="display:flex;flex-direction:column; text-align:left;">
                                <div class="rowInfo" tyle="display:flex;flex-direction:row;">
                                    <h4>Título:</h4>
                                    <span><?php echo $nomeLivroSender?></span>
                                </div>
                                <br>
                                <div class="rowInfo" tyle="display:flex;flex-direction:row;">
                                    <h4>Autor:</h4>
                                    <span><?php echo $autorLivroSender?></span>
                                </div>
                                <br>
                                <!-- <div class="rowInfo" tyle="display:flex;flex-direction:row;">
                                    <h4>Edição:</h4>
                                    <span><?php echo $edicaoLivroSender?></span>
                                </div> -->
                            </div>
                        </div><br>
                        <!-- <h4 style="text-align:left; margin-left:4.3em;">Pelo Seu Livro:</h4><br> -->
                        <div class="row" style="display:flex;flex-direction:row;">
                            <div class="img">
                                <?php echo"<img src='$imgLivroReceiver' id='imgBook'>"?>
                            </div>
                            <div class="info" style="display:flex;flex-direction:column; text-align:left;">
                                <div class="rowInfo" tyle="display:flex;flex-direction:row;">
                                    <h4>Título:</h4>
                                    <span><?php echo $nomeLivroReceiver?></span>
                                </div>
                                <br>
                                <div class="rowInfo" tyle="display:flex;flex-direction:row;">
                                    <h4>Autor:</h4>
                                    <span><?php echo $autorLivroReceiver?></span>
                                </div>
                                <br>
                                <!-- <div class="rowInfo" tyle="display:flex;flex-direction:row;">
                                    <h4>Edição:</h4>
                                    <span><?php echo $edicaoLivroReceiver?></span>
                                </div> -->
                            </div>
                        </div>
                    </div>
                            
                            <h4>Só resta esperar...</h4><br>
                            <span>Quando <?php echo $nomeReceiver;?> Responder avisaremos</span>
                        </div>

                    </div>
         
    <?php
}else if ($statusTroca=='negada'){
    ?>

    <div class="row recievedTroca">
        <?php echo "Troca Recusada."?>
    </div>
    <?php
}else{
    ?>

    <div class="row recievedTroca">
        <?php echo "Troca Finalizada ."?>
    </div>
    <?php
    }
}

$resultado=$mysqli->query("SELECT * FROM tbTroca WHERE idReceiverTroca='$idUser'");
$cont=$resultado->num_rows;

if($cont>0){
    while($dados=mysqli_fetch_assoc($resultado)){
        $idTroca=$dados['idTroca'];
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
            $edicaoLivroSender=$resBook1['edicaoLivro'];
            $autorLivroSender=$resBook1['autorLivro'];
            $imgLivroSender=$resBook1['path'];
        }

        
        $book2=$mysqli->query("SELECT * FROM tbLivro WHERE idLivro='$idLivroReceiver'");
        
        while($resBook=mysqli_fetch_assoc($book2)){
            $nomeLivroReceiver=$resBook['nomeLivro'];
            $edicaoLivroReceiver=$resBook['edicaoLivro'];
            $autorLivroReceiver=$resBook['autorLivro'];
            $imgLivroReceiver=$resBook['path'];
        }
        $mensagem="Você Recebeu uma proposta!\n"."$nomeSender"."Gostaria de trocar o livro:".
        "$nomeLivroSender"."\n"."Pelo livro:"."$nomeLivroReceiver";
        
        
    }
    if($statusTroca=='aberta'){
        ?>
        <div class="row recievedTroca">
            <div class="prop" style="padding:3% 0;text-align:center; background-color:#6695FD;color:white;
            border-radius:10px; display:flex; flex-direction:column;">
                <h3>Você recebeu uma proposta!</h3><br>
                <h4><?php echo $nomeSender."  "."Gostaria de Trocar o Livro:";?></h4><br>

                    <div class="col" style="display:flex;flex-direction:row;">
                        <div class="row" style="display:flex;flex-direction:row;">
                            <div class="img">
                                <?php echo"<img src='$imgLivroSender' id='imgBook'>"?>
                            </div>
                            <div class="info" style="display:flex;flex-direction:column; text-align:left;">
                                <div class="rowInfo" tyle="display:flex;flex-direction:row;">
                                    <h4>Título:</h4>
                                    <span><?php echo $nomeLivroSender?></span>
                                </div>
                                <br>
                                <div class="rowInfo" tyle="display:flex;flex-direction:row;">
                                    <h4>Autor:</h4>
                                    <span><?php echo $autorLivroSender?></span>
                                </div>
                                <br>
                                <!-- <div class="rowInfo" tyle="display:flex;flex-direction:row;">
                                    <h4>Edição:</h4>
                                    <span><?php echo $edicaoLivroSender?></span>
                                </div> -->
                            </div>
                        </div><br>
                        <!-- <h4 style="text-align:left; margin-left:4.3em;">Pelo Seu Livro:</h4><br> -->
                        <div class="row" style="display:flex;flex-direction:row;">
                            <div class="img">
                                <?php echo"<img src='$imgLivroReceiver' id='imgBook'>"?>
                            </div>
                            <div class="info" style="display:flex;flex-direction:column; text-align:left;">
                                <div class="rowInfo" tyle="display:flex;flex-direction:row;">
                                    <h4>Título:</h4>
                                    <span><?php echo $nomeLivroReceiver?></span>
                                </div>
                                <br>
                                <div class="rowInfo" tyle="display:flex;flex-direction:row;">
                                    <h4>Autor:</h4>
                                    <span><?php echo $autorLivroReceiver?></span>
                                </div>
                                <br>
                                <!-- <div class="rowInfo" tyle="display:flex;flex-direction:row;">
                                    <h4>Edição:</h4>
                                    <span><?php echo $edicaoLivroReceiver?></span>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="boxChoose" style="display:flex; flex-direction:row; gap:1em; 
             justify-content:center; margin-left:em;">
               <form action="process/troca.php" method="post">
                    <input type="hidden" value="<?php echo $idLivroSender?>" name="idLivroS"><!--SENDER-->
                    <input type="hidden" value="<?php echo $idLivroReceiver?>" name="idLivroR"><!--RECEIVER-->
                    <input type="hidden" value="<?php echo $idTroca?>" name="idTroca">
                    <input type="hidden" value="acceptTROCA" name="acceptTROCA">
                    <input type="submit" type="submit" value="Aceitar" style="outline:0; border:0;"class="accept">
                </form>
                <form action="process/troca.php" method="post">
                    <input type="hidden" value="<?php echo $idTroca?>" name="idTroca">
                    <input type="hidden" value="denyTroca" name="denyTroca">
                    <input type="submit" value="Recusar" class="deny" style="outline:0; border:0;"class="accept">
               </form>
            </div>
            </div>
           
            
            <!-- <p>
                <?php //echo $mensagem?>
                
            </p> -->
     
        </div>
    <?php
    }else if ($statusTroca=='negada'){
        ?>

        <div class="row recievedTroca">
            <?php echo "Troca Recusada."?>
        </div>
        <?php
    }else{
        ?>

        <div class="row recievedTroca">
            <?php echo "Troca Finalizada ."?>
        </div>
        <?php
    }
}



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
                        <!-- colocar uma mesamge, generica ex vc recebeu uma mensagem
                     e dps verificar se é igual ao q mandaram dai fazer a alteraçção na msng -->
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


