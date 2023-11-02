<!--

Programador: Gustavo Rodrigues
data:22/10/2023
script para enviar os dados para o send
-->
<?php
include("../../dao/conexao.php");
include("../protect.php");
    if(isset($_GET["id"]) && $_GET["id"] > 0){
        $idUser=$_GET['id'];
        $getUser=("SELECT nomeUser FROM tbUser WHERE (idUser LIKE '$idUser')LIMIT 1");
        $res=$mysqli->query($getUser);
        $user=$res->fetch_assoc();

        ?>
            <script src="../../js/jquery.js"></script>
            <style>
                @import "global.css";
        body{
            user-select: none;
        }
       

#chat div.empty{
    width: 49%;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
}

#chat .topMenu {
    position: absolute;
    top: 0;
    width: 49%;
}

#chat .topMenu img{
    float: right;
    margin-top: 12px;
    margin-right: 20px;
    cursor: pointer;
}

#chat .innerContainer {
    width: 100%;
    height: 80vh;
    margin-top: 10vh;
    overflow-y: auto;
}

#chat .innerContainer p.info{
    padding: 10px 20px;
    text-align: center;
    font-size: 10pt;
}

#chat #sendMessage {
    position: absolute;
    bottom: 0;
    width: 49%;
    height: 50px;
}

#chat #sendMessage #messageInput{
    width: 80%;
    margin-left: 5%;
    padding: 10px;
    border: none;
    border-radius: 20px;
    background-color: #EEE;
    outline: 0;
}

#chat #sendMessage label{
    float: right;
    margin-top: 5px;
    margin-right: 30px;
    cursor: pointer;
}

#chat .innerContainer .row{
    display: block;
    padding: 5px 10%;
}

#chat .innerContainer .recieved p{
    display: inline-block;
    padding: 10px 20px;
    background-color: #EEE;
    border-radius: 20px;
    background-color: #939393;
    max-width: 80%;
    color: white;
}

#chat .innerContainer .sent{
    text-align: right;
}

#chat .innerContainer .sent p{
    display: inline-block;
    padding: 10px 20px;
    background-color: #4CBFFF;
    color: #FFF;
    border-radius: 20px;
    max-width: 80%;
}




#chat .innerContainer img{
    background-color: #EEE;
    border-radius: 20px;
    max-width: 80%;
    max-height: 300px;
}

.title1{
    font-size: 22pt;
    font-weight: bold;
    font-family: Arial, Helvetica, sans-serif;
    position: relative;
    margin-top: -45%;
    margin-left: 5%;
}
            </style>
        
     
     
        <div class="topMenu">
            <p class="title1"><?php echo $user['nomeUser'];?></p>
            <!-- <img src="" alt="CLoseChat"> -->
        </div>
  
        <div class="innerContainer"></div>
            <form method="POST" enctype="multipart/form-data" id="sendMessage" action="../loginUser/process/send.php" >
                <input type="number" name="id" value="<?php echo $idUser?>" hidden>
                <input type="text" name="message" maxlength="500" placeholder="Escreva aqui sua mensagem!" id="messageInput">
                <input type="file" name="image" accept="image/x-png, image/jpeg" id="sendImage" hidden>
                <label for="sendImage">mandarImagem</label>
                <!-- <button type="submit">Enviar</button> -->
            </form>


            <script>

              
            $("#messageInput").on('keyup', function (e) {
                if (e.keyCode === 13 && ($("#messageInput").val().length > 0)) {
                    sendMessage()
                }
            });


            $("#sendImage").change(function() {
                sendMessage();
                console.log("SEND");
            });
                 function sendMessage() {
                var formData = new FormData($("#sendMessage")[0]);
                $.ajax({
                    type: 'post',
                    url: 'process/send.php',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        $("#sendMessage")[0].reset();
                    },
                    error: function (error) {
                        Swal.fire({
                            title: 'Mensagem não enviada',
                            text: error.statusText,
                            icon: 'error',
                            confirmButtonText: 'Tentar novamente'
                        })
                    }
                });
            }

            setInterval(() => {
                
                $.ajax({
                    url: 'process/retrieve.php?id=<?php echo $idUser; ?>',
                    success: function (data) {
                        $('#chat .innerContainer').html(data);
                        $('#chat .innerContainer').scrollTop($('#chat .innerContainer').prop("scrollHeight"));
                    },
                    error: function (error) {
                        Swal.fire({
                            title: 'Erro de chat',
                            text: error.statusText,
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        })
                    }
                });
            }, 500);

            </script>
        </div>
        </body>
        </html>
        <?

    }else{
        ?>
            <!-- <div class="empty">
                <img id="noConversationImg" style="height:20em; widht:20em; margin-left:20%;"src="../images/noConversation.png" alt="Nada por aqui">
                <p style="text-align:center;font-weight:bold; font-size:15pt">Não há nada por aqui, comece uma conversa agora mesmo!</p>
            </div> -->
        <?php
    }
?>