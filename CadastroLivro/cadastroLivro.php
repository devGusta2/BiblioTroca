<?php
    include('../dao/conexao.php');
    include('../loginUser/protect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livro</title>
    <link rel="icon" type="image/png" href="../images/logo.png"/>
    <link rel="stylesheet" href="../css/cadastroLivro.css">
    <link  href="../js/main.js">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
</head>
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
                <li>
                    <a href="../loginUser/perfil.php">
                        <span class="icon">
                            <ion-icon name="person-circle-outline"></ion-icon>
                        </span>
                        <span class="title">Perfil</span>
                    </a>
                </li>
                <li>
                    <a href="../loginUser/galeria.php">
                        <span class="icon">
                            <ion-icon name="images-outline"></ion-icon>
                        </span>
                        <span class="title">Home</span>
                    </a>
                </li>
                <li class="active">
                    <a class="active" href="#">
                        <span class="icon">
                        <ion-icon name="paper-plane-outline"></ion-icon>
                        </span>
                        <span class="title">Publicar</span>
                    </a>
                </li>
                <li>
                    <a href="../loginUser/salvos.php">
                        <span class="icon">
                            <ion-icon name="bookmarks-outline"></ion-icon>
                        </span>
                        <span class="title">Salvos</span>
                    </a>
                </li>
                <li>
                    <a href="../loginUser/chat.php">
                        <span class="icon">
                            <ion-icon name="chatbubbles-outline"></ion-icon>
                        </span>
                        <span class="title">Chat</span>
                    </a>
                </li>
                <li>
                    <a href="../loginUser/logout.php">
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

            <?php
              
            ?>

            <!-- Order List -->
            <div class="details">
                <div class="recentOrders">
                    <h3>INFORMAÇÕES DO LIVRO:</h3>
                    <form enctype="multipart/form-data" method="post" action="salvarLivro.php">
                        <div class="input-box">
                            <input type="text" placeholder="Nome do Livro:" name="nomeLivro">
                            <input type="text" placeholder="Nome do Autor:" name="autorLivro">
                        </div>
                        <div class="input-box">
                            <input type="text" placeholder="Ano da edição:" name="edicaoLivro">
                            <input type="text" placeholder="Editora:" name="editoraLivro">
                        </div>
                        <div class="input-box">
                            <input type="number" placeholder="Número de páginas:" name="paginasLivro">
                            <input type="text" placeholder="Acabamento:" name="acabamentoLivro">
                        </div>
                        <div class="input-box">
                            <input type="text" placeholder="Idioma:" name="idiomaLivro">
                            <select name="genero" id="">
                                <option value="Adulto">Adulto</option>
                                <option value="Antologia">Antologia</option>
                                <option value="Cordel">Cordel</option>
                                <option value="classico">Clássicos</option>
                                <option value="didatico">Didáticos</option>
                                <option value="Ficção Científica">Ficção Científica</option>
                                <option value="Games">Games</option>
                                <option value="Fantasia">Fantasia</option>
                                <option value="Infantil">Infantil</option>
                                <option value="Infanto Juvenil">Infanto Juvenil</option>
                                <option value="Juvenil">Juvenil</option>
                                <option value="Manga">Mangá</option>
                                <option value="Revista">Revista</option>
                            </select>
                        </div>
                        <div class="input-box2">
                            <label>Adicionar Foto: 
                            <input class="file" name="arquivo" placeholder="Selecione a imagem" type="file">
                            </label>
                        </div>
                        <div class="input-box">
                            <textarea cols="30" rows="10" placeholder="Descrição do livro" name="descLivro"></textarea>
                        </div>
                        <input type="submit" value="Cadastrar" class="btn">
                    </form>
                </div>
            </div>
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
</body>
</html>
</body>
</html>