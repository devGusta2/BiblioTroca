<?php
    require('../dao/conexao.php');
    include('protect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title><link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/png" href="../images/logo.png" />
    <link rel="stylesheet" href="../css/perfil.css">
    <link rel="stylesheet" href="../css/style.css">
    <link  href="../js/main.js">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="../js/jquery.js"></script>
</head>
<style>
    html {
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
        text-size-adjust: 100%;
        line-height: 1.4;
    }
</style>
<body>
    <!-- Navigation -->
    <?php
    $idUser=$_SESSION['id'];
    $sqlSelect="SELECT * FROM tbPerfil WHERE idUser='$idUser'";
    $sqlSelectUser="SELECT * FROM tbUser WHERE idUser='$idUser'";
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
         <?php
                   $idUser=$_SESSION['id'];
                   $sqlSelect="SELECT * FROM tbLivro WHERE idUser='$idUser'";
                   $selectUser="SELECT * FROM tbUser WHERE idUser='$idUser'";
                   $selectProfile="SELECT * FROM tbPerfil WHERE idUser='$idUser'";

                   $resultProfile=$mysqli->query($selectProfile);//perfil
                   $resultUser=$mysqli->query($selectUser);//usuario
                   $resultadoBook = $mysqli->query($sqlSelect);//livro
                   $count=$resultadoBook->num_rows;

                   while($userData = mysqli_fetch_assoc($resultUser))//usuario
                   {
                       $userName=$userData['nomeUser'];
                   }
                   while($profile_data = mysqli_fetch_assoc($resultProfile))//perfil
                    {
                       $userImg=$profile_data['path'];
                       $userApelido=$profile_data['apelidoPerfil'];
                       $bio=$profile_data['biografiaPerfil'];
                    }
            ?>
 
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <div class="user">
                                <img src="<?php echo $userImg?>" alt="">
                            </div>
                        </span>
                        <span class="title2">Olá,<?php echo $userName?></span>
                    </a>
                </li>
                <li class="active">
                    <a class="active" href="#">
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
                    <a href="salvos.php">
                        <span class="icon">
                            <ion-icon name="bookmarks-outline"></ion-icon>
                        </span>
                        <span class="title">Salvos</span>
                    </a>
                </li>
                <li>
                    <a href="chat.php">
                        <span class="icon">
                            <ion-icon name="chatbubbles-outline"></ion-icon>
                        </span>
                        <span class="title">Chat</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <span class="icon">
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

        <!-- Main -->
        <div class="main">
            <div class="menu">
                <div class="topbar">
                    <div class="toggle">
                        
                    </div>
                    <div class="search">
                        <label>
                            <input type="text" placeholder="Pesquise Aqui" onkeyup="search()"></input>
                            <div id="searchContainer" style="position: absolute;"></div>
                            <ion-icon name="search-outline"></ion-icon>
                        </label>
                    </div>
                    <div class="bx bx-moon" id="darkMode-icon"></div>
                </div>

            <!-- Order List -->

            <div class="details">
                <div class="recentOrders">
                <div class="cardFeed">
                        <section class="perfil-usuario">
                            <div class="contenedor-perfil">
                                <div class="portada-perfil" >
                                    <div class="sombra"></div>

                                    <form enctype="multipart/form-data" action="updatePerfil.php" method="post">
                                        <div class="avatar-perfil">
                                            <img src="<?php echo $userImg;?>" alt="img"> 
                                        </div>
                                        <div class="opcciones-perfil">
                                            <button type="submit">Alterar Foto
                                            <input type="file" placeholder="Adicionar Foto" class="file" name="arquivoUser" id=""></button> 
                                        </div>
                                    </form> 

                                    <div class="datos-perfil">
                                        <h4 class="titulo-usuario"><?php echo $userName;?></h4>
                                        <p class="bio-usuario"><?php echo $bio;?></p>
                                        <ul class="lista-perfil">
                                            
                                        <?php
                                         $idUserMain=$_SESSION['id'];
                                         $sqlVerify="SELECT * FROM tbSeguir WHERE idPerfil='$idUserMain'";
                                         $resultado=$mysqli->query($sqlVerify);
                                         $countSeguindo=$resultado->num_rows;

                                         $selectSeguidores = "SELECT COUNT(idPerfil) AS totalSeguidores FROM tbSeguir WHERE idSeguindo='$idUserMain'";
                                        $resSeguidores = $mysqli->query($selectSeguidores);
                                         
                                       
                                        ?>
                                            <li><?php  while($testeSeguidores=mysqli_fetch_assoc($resSeguidores)){
                                            $val=$testeSeguidores['totalSeguidores'];
                                            echo $val;
                                        }?> Seguidores</li>
                                            <li><?php echo $countSeguindo?> Seguindo</li>
                                            <li><?php echo $count?> Publicações</li>
                                        </ul>
                                    </div>
                                    
                                </div>
                                <div class="menu-perfil">
                                    <ul>
                                        <li><a href="#" title=""><i class="icono-perfil fas fa-bullhorn"></i> Publicações</a></li>
                                        <li><a href="#" title=""><i class="icono-perfil fas fa-info-circle"></i> Informarções</a></li>
                                        <li><a href="#" title=""><i class="icono-perfil fas fa-grin"></i> Amigos 27</a></li>
                                        <li><a href="#" title=""><i class="icono-perfil fas fa-camera"></i> Fotos</a></li>
                                    </ul>
                                </div>
                            </div>
                        </section>
                    </div>
                    <?php
                    $idUser=$_SESSION['id'];
                    $sqlSelect="SELECT * FROM tbLivro WHERE idUser='$idUser'";
                    $selectUser="SELECT * FROM tbUser WHERE idUser='$idUser'";
                    $selectProfile="SELECT * FROM tbPerfil WHERE idUser='$idUser'";

                    $resultProfile=$mysqli->query($selectProfile);//perfil
                    $resultUser=$mysqli->query($selectUser);//usuario
                    $resultadoBook = $mysqli->query($sqlSelect);//livro

                    while($userData = mysqli_fetch_assoc($resultUser))//usuario
                    {
                        $userName=$userData['nomeUser'];
                    }
                
                    while($profile_data = mysqli_fetch_assoc($resultProfile))//perfil
                    {
                       $userImg=$profile_data['path'];
                       $userApelido=$profile_data['apelidoPerfil'];
                    }
                
                        while($book_data=mysqli_fetch_assoc($resultadoBook)){//livro
                            $nomeLivro=$book_data['nomeLivro'];
                            $autorLivro=$book_data['autorLivro'];
                            $descLivro=$book_data['descLivro'];
                            $edicaoLivro=$book_data['edicaoLivro'];
                            $editoraLivro=$book_data['editoraLivro'];
                            $idiomaLivro=$book_data['idiomaLivro'];
                            $paginasLivro=$book_data['paginasLivro'];
                            $acabamentoLivro=$book_data['acabamentoLivro'];
                            $capaLivro=$book_data['path'];
                            ?>
                                <div class="cardFeed">
                                    <div class="post-row">
                                        <div class="user-profile">
                                            <?php
                                            echo "<img   src=".$userImg." alt='Foto do usuario'>";
                                            ?>
                                            <div>
                                                <p><?php echo $userName;?></p>
                                                <!--Arrumar, ainda não foi 
                                                implementado a data de postagem-->
                                                <span>Out 26 2023, 14:40 pm</span>
                                                
                                                
                                            </div>
                                        </div>
                                        <div id="show-nav" class="dropdown">
                                            <div id="dropdown" onClick="myFunction(this)"><img src="../images/tresPontos.png" class="user-pic"></div>
                                            <div id="myDropdown" class="dropdown-content">
                                                <div class="user-info">
                                                    <img src="../images/Eu.jpg">
                                                    <h2>Henrique</h2>
                                                </div>
                                                <hr>
                                                <a onclick="abrirModal5()" class="sub-menu-link">
                                                    <ion-icon name="megaphone-outline"></ion-icon>

                                                    <p>Denúnciar</p>

                                                    <span></span>
                                                </a>
                                                <a href="#" class="sub-menu-link">
                                                    <ion-icon name="bookmark-outline"></ion-icon>
                                                    <p>Salvar Publicação</p>
                                                    <span></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Aumentar a fonte do titulo do livro -->
                                    <p class="post-text"><?php echo $nomeLivro;?><br><span><?php echo $descLivro?></span></p>
                                    <?php echo "<img   src=".$capaLivro." class='post-img'alt='capa do livro'>";?>
                                    

                                    <div class="post-row">
                                        <div class="activity-icons">
                                            <div clas><i class='bx bx-like'></i> 120</div>
                                            <div clas><i class='bx bx-chat'></i> 120</div>
                                            <div clas><i class='bx bx-navigation'></i> 120</div>
                                        </div>
                                    </div>
                                    <div class="post-profile-icon"></div>
                                </div>
                            <?php
                        }
                    ?>             
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="janela-modal" id="janela-modal">
        <div class="modal">
            <button class="fechar" id="janela-modal">X</button>
            <h1>Tem certeza que deseja excluir o item selecionado?</h1>
            <form action="remover.php" method="post">
                <input class="form-control" id="id_mensagem" name="id_mensagem" value="<?=$mensagem[0]?>" type="hidden">

                <button type="submit" class="btn-modal">Sim</button>

            </form>
        </div>
    </div>

    <!-- JS -->
    <script src="../js/main.js"></script>

    <!-- Icones -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!-- Swipper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <!-- reveal -->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!-- Menu : -->
    <script>
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

        let subMenu = document.getElementById("subMenu");

        function toggleMenu(a){
            subMenu.classList.toggle("open-menu");
        }

        function myFunction(a) {
            a.parentNode.getElementsByClassName("dropdown-content")[0].classList.toggle("show");
        }
    </script>
</body>

</html>