<?php
    include('../dao/conexao.php');
    include('../loginUser/protect.php');
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Livro</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livro</title>
    <link rel="stylesheet" href="../css/cadastroLivro.css">
    <link  href="../js/main.js">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
</head>
<body>
    <!-- Navigation -->
    <?php
    $idUser=$_SESSION['id'];
    $sqlSelect="SELECT * FROM tbPerfil WHERE idUser=$idUser";
    $resultado = $mysqli->query($sqlSelect);
    ?>

    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <div class="user">
                                <?php
                                   while($user_data = mysqli_fetch_assoc($resultado))
                                   {
                                   echo "<img height='350'width='300' style='border-radius:10px; box-shadow:1px 1px 10px black;' src=".$user_data['path']." alt='Foto do usuario'>";
                                   }
                                ?>
                         
                            </div>
                        </span>
                        <span class="title"><img src="../images/Logo.png" class="imagem"></span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="person-outline"></ion-icon>
                        </span>
                        <span class="title">Perfil</span>
                    </a>
                </li>
                <li>
                    <a href="../Login.php">
                        <span class="icon">
                            <ion-icon name="save-outline"></ion-icon>
                        </span>
                        <span class="title">Salvos</span>
                    </a>
                </li>
                <li>
                    <a href="./cadastro.php">
                        <span class="icon">
                            <ion-icon name="chatbox-ellipses-outline"></ion-icon>
                        </span>
                        <span class="title">Chat</span>
                    </a>
                </li>
                <li>
                    <a href="../loginUser/galeria.php">
                        <span class="icon">
                            <ion-icon name="image-outline"></ion-icon>
                        </span>
                        <span class="title">Galeria</span>
                    </a>
                </li>
                <li>
                    <a href="../Login.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sair</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Main -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
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
                        <div class="inputBox">
                            <label>Nome do Livro:</label>
                            <input type="text" class="form-control" name="nomeLivro">
                        </div>
                        <div class="inputBox">
                            <label>Nome do Autor:</label>
                            <input type="text" class="form-control" name="autorLivro">
                        </div>
                        <div class="inputBox">
                            <label>Descrição do Livro:</label>
                            <input type="text" class="form-control" name="descLivro">
                        </div>
                        <div class="inputBox">
                            <label>Ano da edição:</label>
                            <input type="text" class="form-control" name="edicaoLivro">
                        </div>
                        <div class="inputBox">
                            <label>Editora:</label>
                            <input type="text" class="form-control" name="editoraLivro">
                        </div>
                        <div class="inputBox">
                            <label>Número de páginas:</label>
                            <input type="text" class="form-control" name="paginasLivro">
                        </div>
                        <div class="inputBox">
                            <label>Acabamento:</label>
                            <input type="text" class="form-control" name="acabamentoLivro">
                        </div>
                        <div class="inputBox">
                            <label>Idioma:</label>
                            <input type="text" class="form-control" name="idiomaLivro">
                        </div>
                      

                        <label for="">Tipo de Livro</label>
                        <select name="genero" id="">
                            <option value="Manga">Mangá</option>
                            <option value="Hq">HQ</option>
                            <option value="Revista">Revista</option>
                            <option value="Cordel">Cordel</option>
                            <option value="Infantil">Infantil</option>
                            <option value="Infanto Juvenil">Infanto Juvenil</option>
                            <option value="Juvenil">Juvenil</option>
                            <option value="Adulto">Adulto</option>
                            <option value="Antologia">Antologia</option>
                            <option value="Games">Games</option>
                            <option value="didatico">Didáticos</option>
                            <option value="classico">Clássicos</option>
                        </select>
<!-- 
                        <Label>Selecione o arquivo</Label>
                            <input name="arquivo" type="file"> -->

                     
                 
                        <p>
                            <Label>Selecione o arquivo</Label>
                            <input name="arquivo" type="file"> 
                        </p>
                       
                        <div class="buttons">
                            <input type="submit" value="Cadastrar">
                        </div>
                        <tbody>
     
        </tbody>   
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