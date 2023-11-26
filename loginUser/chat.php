<!-- Programador Gustavo Rodrigues
Parte do chat do projeto
data: 28/09/2023-->
<!-- chat é igual a o index do video -->
<?php
    include("../dao/conexao.php");
    include("protect.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/homePage.css">
    <link rel="stylesheet" href="../css/inbox2.css">
    <link rel="stylesheet" href="../css/chat.css">
    <link rel="stylesheet" href="../css/galeria.css">   
    
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/sweetalert2.css">
    
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <script src="../js/jquery.js"></script>
    <!-- <script src="../js/sweetalert2.js"></script> -->
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
    <title>Chat</title>
</head>
<body>
    <!-- <div id="loading">Loading</div> -->




    <?php
    $idUser=$_SESSION['id'];
    $sqlSelect="SELECT * FROM tbPerfil WHERE idUser='$idUser'";//seleciona da tabela perfil
    $sqlSelectUser="SELECT * FROM tbUser WHERE idUser='$idUser'";// seleciona da tabela User
    $result=$mysqli->query($sqlSelectUser);
    $resultado = $mysqli->query($sqlSelect);
    
    while($userData= mysqli_fetch_assoc($result)){
        /* verifica se o usuario ja terminou de preencher as informações 
        adicionais*/
        $status=$userData['statusCadastro'];
        strtolower($status);
        if($status=='pendente'){
            header('Location: cadastro2.php');
        }
    }

    ?>


<div class="contentChat">





<div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <div class="user">
                            <?php
                            
                            while($user_data = mysqli_fetch_assoc($resultado)){echo "<img height='350'width='300' style='border-radius:10px; box-shadow:1px 1px 10px black;' src=".$user_data['path']." alt='Foto do usuario'>";}
                            ?>
                                
                                
                            </div>
                        </span>
                        <span class="title2">Olá,
                            <?php
                            $sqlSelectUser2="SELECT * FROM tbUser WHERE idUser='$idUser'";// seleciona da tabela User
                            $result2=$mysqli->query($sqlSelectUser2);
                            while($user_data = mysqli_fetch_assoc($result2)){
                            $userName=$user_data['nomeUser'];
                            echo $userName;
                            }?></span>
                            
                    </a>
                </li>
                <li>
                    <a href="perfil.php">
                        <span class="icon">
                            <ion-icon name="person-circle-outline"></ion-icon>
                        </span>
                        <span class="title">Perfil</span>
                    </a>
                </li>
                <li>
                    <a href="galeria.php">
                        <span class="icon">
                            <ion-icon name="images-outline"></ion-icon>
                        </span>
                        <span class="title">Home</span>
                    </a>
                </li>
                <li>
                    <a href="../CadastroLivro/cadastroLivro.php">
                        <span class="icon">
                        <ion-icon name="paper-plane-outline"></ion-icon>
                        </span>
                        <span class="title">Publicar</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="bookmarks-outline"></ion-icon>
                        </span>
                        <span class="title">Salvos</span>
                    </a>
                </li>
                <li class="active">
                    <a class="active" href="chat.php">
                        <span class="icon">
                            <ion-icon name="chatbubbles-outline"></ion-icon>
                        </span>
                        <span class="title">Chat</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <span class="icon" style>
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sair</span>
                    </a>
                </li>
                <div>
                    <span><img src="../images/Logo.png" class="imagem"></span>
                </div>
            </ul>
        </div>


















<div id="inbox" class="column" style="margin-left: 20em;">
        <p class="title">Conversas</p>
        <input type="text" maxlenght="15" name="username" class="searchField" onkeyup="search()" placeholder="Pesquisar conversa">
        <div id="searchContainer"></div>
        <div class="container"></div>
    </div>
       
    <div id="chat" class="column"></div>

    <!-- <div id="profile" class="column">
        <p class="title">Perfil</p>
        <div class="container"></div>
        <div class="menu">
            <button><a href="galeria.php">Sair</a></button>
        </div>
    </div> -->

</div>






<script src="../js/main.js"></script>

<!-- Icones -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<!-- Swipper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<!-- reveal -->
<script src="https://unpkg.com/scrollreveal"></script>


    <script>
           function loadInbox(){
            $.ajax({
                url:'process/inbox.php',
                    success: function(data){
                    $('#inbox .container').html(data);

                },
                error: function(error){
                    Swal.fire(
                        {
                            title:'Erro!',
                            text: error.statusText,
                            icon:'error',
                            confirmButtonText:'OK'
                        }
                    )
                }
            })
        }

        // function loadProfile(id=0){
        //     $.ajax({
        //         url:'process/inbox.php?',
        //             success: function(data){
        //             $('#profile .container').html(data);

        //         },
        //         error: function(error){
        //             Swal.fire(
        //                 {
        //                     title:'Erro!',
        //                     text: error.statusText,
        //                     icon:'error',
        //                     confirmButtonText:'OK'
        //                 }
        //             )
        //         }
        //     })
        // }

        function chat(id= 0){
            $.ajax({       
                url:'process/chat.php?id='+id,
                   success: function(data){
                    $('#chat').html(data);

                },
                error: function(error){
                    Swal.fire(
                        {
                            title:'Erro!',
                            text: error.statusText,
                            icon:'error',
                            confirmButtonText:'OK'
                        }
                    )
                }
            })
        }

         function search(){
             var term=$('input.searchField').val();
             if(term.length>=3){
                 $.ajax({
                     url: 'process/search.php?term=' + term,
                     success: function(data){
                         $('#searchContainer').html(data);
                         $('#searchContainer').show();
                     }
                 });
             }else{
                $('#searchContainer').hide();
             }
         }


        $(document).ready(function(){
            setInterval(() => {
                loadInbox();
            }, 100);
            loadProfile();
            chat();
        })
    </script>
</body>
</html>