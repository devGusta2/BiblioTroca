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
    <title>Feed</title>
    <link rel="icon" type="image/png" href="../images/logo.png" />
    <link rel="stylesheet" href="../css/galeria.css">
    <link rel="stylesheet" href="../css/style.css">
    <link  href="../js/main.js">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
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
                <li class="active">
                    <a class="active" href="#">
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
                            <input type="text" placeholder="Pesquise Aqui"></input>
                            <ion-icon name="search-outline"></ion-icon>
                        </label>
                    </div>
                    <div class="bx bx-moon" id="darkMode-icon"></div>
                </div>

            <!-- Order List -->

        
        </div>
    </div>

    <!-- Modal Five-->

    <div class="janela-modal" id="janela-modal5">
        <div class="modal">
            <button class="fechar" id="janela-modal5">X</button>
            <h1>Motivo da denúncia?</h1>
            <form action="salvarDenuncia.php" method="POST">
                <div class="motivos">
                    <div class="denuncia">
                        <div class="texto">
                            <input type="radio" name="opção" value="Falta de compromisso" placeholder="">
                            <p>Falta de compromisso</p>
                        </div>
                        <div class="texto">
                            <input type="radio" name="opção" value="Linguagem ou atitude preconceituosa">
                            <p>Linguagem ou atitude preconceituosa</p>
                        </div>
                        <div class="texto">
                            <input type="radio" name="opção" value="Falso conteudo de negociação">
                            <p>Falso conteúdo de negociação</p>
                        </div>
                        <div class="texto">
                            <input type="radio" name="opção" value="Item ilegal em divulgação">
                            <p>Item ilegal em divulgação</p>
                        </div>
                    </div>
                    <div class="denuncia">
                        <div class="texto">
                            <input type="radio" name="opção" value="Plágio">
                            <p>Plágio</p>
                        </div>
                        <div class="texto">
                            <input type="radio" name="opção" value="Conteúdo Ofensivo">
                            <p>Conteúdo Ofensivo</p>
                        </div>
                        <div class="texto">
                            <input type="radio" name="opção" value="Divulgar informaçoes falsas">
                            <p>Divulgar informações falsas</p>
                        </div>
                        <div class="texto">
                            <input type="radio" name="opção" value="Quebra de regulamentos">
                            <p>Quebra de regulamentos</p>
                        </div>
                    </div>
                </div>
                <textarea cols="90" rows="8" placeholder=" Descrição da denúncia" name="ocorrencia" name="descLivro"></textarea>
                <button type="submit" class="btn-modal">Enviar</button>
                <input hidden name="idDenunciado" value="<?php echo $idUserLivro  ?>">
                <?php 
                    $nomeUser = "SELECT * FROM tbuser WHERE idUser = '$idUserLivro'";
                    $result = $mysqli->query($nomeUser);

                    while($nome=mysqli_fetch_assoc($result)){
                        $nomeAcusado=$nome['nomeUser'];
                }
                
                    

                ?>
                <input hidden name="nomeDenunciado" value="<?php echo $nomeAcusado  ?>">

                
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