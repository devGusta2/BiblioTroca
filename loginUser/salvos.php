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
    <title>Salvos</title><link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/png" href="../images/logo.png"/>
    <link rel="stylesheet" href="../css/salvos.css">
    <link rel="stylesheet" href="../css/styleSalvos.css">
    <link  href="../js/main.js">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <style>
        .nobookClass{
            font-size: 18pt;
            margin-top: 10%;
            text-align: center;
        }
        #imgNoBook{
            height: 40vh;
            width: 40vh;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
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

 
    <div class="container">
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
                <li class="active">
                    <a class="active" href="#">
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
                            <input type="text" placeholder="Pesquise Aqui"></input>
                            <ion-icon name="search-outline"></ion-icon>
                        </label>
                    </div>
                    <div class="bx bx-moon" id="darkMode-icon"></div>
                </div>

            <!-- Order List -->

            <div class="details">
                <div class="recentOrders">
                <?php
                        //SELECIONA OS LIVROS SALVOS PELO USUARIO LOGADO
                                $sqlLivroSalvo="SELECT * FROM tbSalvo WHERE idPerfil='$idUser' ORDER BY idLivro DESC";
                                $final=$mysqli->query($sqlLivroSalvo);
                                $count = $final->num_rows;
          
                            if($count<1){
                                
                                ?>
                                <div class="nobookClass" >
                                    <img src="../images/noBookIcon.png" alt="icon-no-book" id="imgNoBook">
                                    <p id="titleNoBook">Você não possui nenhum livro salvo!</p>
                                </div>
                                <?php
                                
                                
                            }else{

                                while($data=mysqli_fetch_assoc($final)){
                                    $idLivroSalvo=$data['idLivro'];
                                
                                $sqlSelectImgLivro="SELECT * FROM tbLivro WHERE idLivro='$idLivroSalvo'";
                                $resImgLivro=$mysqli->query($sqlSelectImgLivro);
                                while($dataImgLivro=mysqli_fetch_assoc($resImgLivro)){
                                    $imgLivro=$dataImgLivro['path'];
                                    $nomeLivro=$dataImgLivro['nomeLivro'];
                                    $idUserPoster=$dataImgLivro['idUser'];
                                    $descLivro=$dataImgLivro['descLivro'];

                                }

                                $sqlSelectPoster="SELECT * FROM tbPerfil WHERE idPerfil='$idUserPoster'";
                                $resPoster=$mysqli->query($sqlSelectPoster);
                                while($dataPoster=mysqli_fetch_assoc($resPoster)){
                                    $imgPoster=$dataPoster['path'];
                                    $apelidoPoster=$dataPoster['apelidoPerfil'];
                                }

                                ?>

<div class="cardFeed">
                                    <div class="post-row">
                                        <div class="user-profile">
                                            <?php
                                          

                                            echo "<img src=".$imgPoster." alt='Foto do usuario'>";
                                            ?>
                                            <div>
                                                <p><?php echo $apelidoPoster;?></p>
                                                <!--Arrumar, ainda não foi 
                                                implementado a data de postagem-->
                                                <span>Out 26 2023, 14:39 pm</span>
                                                
                                                
                                            </div>
                                        </div>
                                        
                                        <div id="show-nav" class="dropdown">

                                            <div id="dropdown" onClick="myFunction(this)"><img src="../images/tresPontos.png" class="user-pic"></div>
                                        
                                            <div id="myDropdown" class="dropdown-content">

                                                <div class="user-info">
                                                    
                                                </div>
                                                <hr>

                                                <a onclick="abrirModal5()" class="sub-menu-link">
                                                    <ion-icon name="megaphone-outline"></ion-icon>

                                                    <p>Denúnciar</p>

                                                    <span></span>
                                                </a>
                                                <a href="#" class="sub-menu-link">
                                                    <ion-icon name="bookmark-outline"></ion-icon>
                                                    <form action="apagarSalvo.php" method="POST">
                                                        <input type="text" name="idLivroDelete" value="<?php echo $idLivroSalvo;?>" hidden >
                                                        <button type="submit">
                                                            <p>Excluri Publicação Salva</p>
                                                            <span></span>
                                                        </button>
                                                    </form>
                                                </a>
                                            </div>
                                        
                                        </div>
                                        <div class="sub-menu-wrap" id="subMenu">
                                            <div class="sub-menu">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Aumentar a fonte do titulo do livro -->
                                    <p class="post-text"><?php echo $nomeLivro;?><br><span><?php echo $descLivro?></span></p>
                                    <?php echo "<img   src=".$imgLivro." class='post-img'alt='capa do livro'>";?>
                                    

                                    <div class="post-row">
                                        <div class="activity-icons">
                                            <div clas><i class='bx bx-like'></i> 120</div>
                                            <div clas><i class='bx bx-chat'></i> 120</div>
                                            <div clas><i class='bx bx-navigation'></i> 120</div>
                                        </div>
                                    </div>
                                    <div class="post-profile-icon"></div>
                                </div>


                                <!-- <div class="cardFeed">
                                    <div class="post-row">
                                        <div class="user-profile">
                                            <img src=" <?php //echo $imgPoster?>">
                                            <div>
                                                <p><?php //echo $apelidoPoster ?></p>
                                                <span>Out 23 2023, 13:40 pm</span>
                                            </div>
                                        </div>
                                        <img src="../images/tresPontos.png" class="user-pic" onclick="toggleMenu()">
                                        <div class="sub-menu-wrap" id="subMenu">
                                            <div class="sub-menu">
                                                <div class="user-info">
                                                    <img src="<?php //echo $imgPoster;?>">
                                                    <h2>Henrique Ribeiro</h2>
                                                </div>
                                                <hr>
    
                                                <a onclick="abrirModal5()" class="sub-menu-link">
                                                    <ion-icon name="megaphone-outline"></ion-icon>
                                                    <p>Denúnciar</p>
                                                    <span></span>
                                                </a>
                                                <a href="#" class="sub-menu-link">
                                                        <form action="salvarPubli.php" method="GET">
                                                            <input type="text" name="idLivroSalvar" value="<?php //echo $idLivroSalvo;?>" hidden>
                                                            <button type="submit">
                                                            <p>Excluir dos salvos</p>
                                                            <span></span>
                                                        </button>
                                                    </form>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <img src="<?php  //echo $imgLivro;?>" class="post-img">
                                    <a class="verMais" href="#">Ver Mais...</a>
                                </div> -->
                                
                                <?php
                                }
                            }       
                    ?>
                </div>

                <!-- Customers -->
                <div class="recentCustomers">
                    <div class="leilao">
                        <div class="cardHeader">
                            <h2>Leilões</h2>
                        </div>

                        <table>
                        <tr>
                                <td width="60px">
                                    <div class="imgBx"><img src="../images/jk.jpg" alt=""></div>
                                </td>
                                <td>
                                    <h4>Harry Potter 3<br> <span>J. K. Rowling</span></h4>
                                </td>
                            </tr>
                            <tr>
                                <td width="60px">
                                    <div class="imgBx"><img src="../images/Andre.jpeg" alt=""></div>
                                </td>
                                <td>
                                    <h4>Game of Thrones <br> <span>Andre Alves</span></h4>
                                </td>
                            </tr>
                            <tr>
                                <td width="60px">
                                    <div class="imgBx"><img src="../images/Gustavo.jpeg" alt=""></div>
                                </td>
                                <td>
                                    <h4>Dança dos Dragões <br> <span>Gustavo Rodrigues</span></h4>
                                </td>
                            </tr>
                            <tr>
                                <td width="60px">
                                    <div class="imgBx"><img src="../images/nando.png" alt=""></div>
                                </td>
                                <td>
                                    <h4>Mazer Runner <br> <span>Nando Moura</span></h4>
                                </td>
                            </tr>
                            <tr>
                                <td width="60px">
                                    <div class="imgBx"><img src="../images/jorge.jpg" alt=""></div>
                                </td>
                                <td>
                                    <h4>Jogos Vorazes <br> <span>George Martin</span></h4>
                                </td>
                            </tr>
                            <tr>
                                <td width="60px">
                                    <div class="imgBx"><img src="../images/alan.jpg" alt=""></div>
                                </td>
                                <td>
                                    <h4>Naruto #3 <br> <span>AlanZoka</span></h4>
                                </td>
                            </tr>
                            <tr>
                                <td width="60px">
                                    <div class="imgBx"><img src="../images/peter jordan.jpg" alt=""></div>
                                </td>
                                <td>
                                    <h4>Vingadores #1 <br> <span>Peter Jordan</span></h4>
                                </td>
                            </tr>
                            <tr>
                                <td width="60px">
                                    <div class="imgBx"><img src="../images/Julio.jpeg" alt=""></div>
                                </td>
                                <td>
                                    <h4>Vingadores #1 <br> <span>Julio Martins</span></h4>
                                </td>
                            </tr>
                            <tr>
                                <td width="60px">
                                    <div class="imgBx"><img src="../images/José.jpg" alt=""></div>
                                </td>
                                <td>
                                    <h4>Jujutsu Kaisen 0 <br> <span>José Guilherme</span></h4>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Five-->
    <div class="janela-modal" id="janela-modal5">
        <div class="modal">
            <button class="fechar" id="janela-modal5">X</button>
            <h1>Motivo da denúncia?</h1>
            <form action="" method="post">
                <div>
                <input type="radio" name="Falta de compromisso" value="Falta de compromisso"> Falta de compromisso<br>
                 <input type="radio" name="linguagem ou atitude preconceituosa" value="linguagem ou atitude preconceituosa"> linguagem ou atitude preconceituosa<br>
                 <input type="radio" name="falso conteudo de negociação" value="falso conteudo de negociação"> falso conteudo de negociação<br>
                 <input type="radio" name=" Item ilegal em divulgação" value="Item ilegal em divulgação"> Item ilegal em divulgação<br>
                 <input type="radio" name="Furto" value="Furto"> Furto <br>
                 <input type="radio" name="Atitude Criminosa" value="Atitude Criminosa"> Atitude Criminosa<br>
                 <input type="radio" name="Divulgar informaçoes falsas" value="Divulgar informaçoes falsas"> Divulgar informaçoes falsas <br>
                 <input type="radio" name="Ocorrencia Especifica" value="Ocorrencia Especifica"> Ocorrencia Especifica <br>
                 Descreva o ocorrido: <br>
                 <textarea style="resize: none;" name="ocorrencia"></textarea> <br>
                </div>
                <button type="submit" class="btn-modal">Enviar</button>
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
    <!-- Menu : -->
    <script>
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