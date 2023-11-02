<?php
include('../dao/conexao.php');
include('../loginAdm/processos/selects/admSelect.php');

$querySelect = "SELECT * FROM tbDenuncia";

$result = $mysqli->query($querySelect);

$idDenuncia = $result->fetch_all();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard</title>
    <link rel="icon" type="image/png" href="../images/logo.png" />
    <link rel="stylesheet" href="../css/denuncias.css">
    <link  href="../js/main.js">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
</head>
<body>
    <!-- Navigation -->

    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <div class="user">
                                <img src="../images/icone.png" alt="">
                            </div>
                        </span>
                        <span class="title2"><?php echo $nomeUserAdm;?></span>
                    </a>
                </li>
                <li>
                    <a href="./dashboard.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="./formUser.php">
                        <span class="icon">
                            <ion-icon name="person-outline"></ion-icon>
                        </span>
                        <span class="title">Usuários Cadastrados</span>
                    </a>
                </li>
                <li>
                    <a href="./formBloqueados.php">
                        <span class="icon">
                            <ion-icon name="person-remove-outline"></ion-icon>
                        </span>
                        <span class="title">Usuários Bloqueados</span>
                    </a>
                </li>
                <li>
                    <a href="./formLivro.php">
                        <span class="icon">
                            <ion-icon name="book-outline"></ion-icon>
                        </span>
                        <span class="title">Livros</span>
                    </a>
                </li>
                <li class="active">
                    <a class="active" href="./formDenuncias.php">
                        <span class="icon">
                            <ion-icon name="megaphone-outline"></ion-icon>
                        </span>
                        <span class="title">Denúncias</span>
                    </a>
                </li>
                <li>
                    <a href="./LoginAdm.php">
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

            <!-- Order List -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Denúncias</h2>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Tipo Denuncia</td>
                                <td>Descrição</td>
                                <td>ID</td>
                                <td>Nome Remetente</td> 
                                <td>Publicação</td>
                                <td>ID</td>
                                <td>Nome Destinatário</td>
                                <td>Bloquear</td>
                                <td>Excluir</td>
                            </tr>
                        </thead>

                        <tbody>

                            <?php foreach ($idDenuncia as $idDenuncia) {
                                
                                ?>
                                
                            <tr>
                                <td><?= $idDenuncia[0] ?></td>
                                <td><?= $idDenuncia[1] ?></td>
                                <td><?= $idDenuncia[2] ?></td>
                                <td><?= $idDenuncia[3] ?></td>
                                <td><?= $idDenuncia[4] ?></td>
                                <td>
                                    <a class="btnImagem" onclick="abrirModal2()"><ion-icon name="image-outline"></ion-icon></a>
                                </td>
                                <td>25</td>
                                <td>Felipe</td>
                                <td>
                                <form action="ban.php" method="POST">
                                    <input type="hidden" id="idUser" name="idUser" value="<?=$idUser[0]?>">
                                    <button type="submit"><ion-icon name="ban-sharp"></ion-icon></button>
                                </form>
                                </td>
                                <td>
                                    <a onclick="abrirModal6(<?=$idLivro[0]?>,'idLivro')"><ion-icon name="close"></ion-icon></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Two-->
    <div class="janela-modal" id="janela-modal2">
        <div class="modal">
            <button class="fechar" id="janela-modal2">X</button>
            <h1>Informações da Publicação</h1>
            <form action="deleteLivro.php" method="post">
                <img class="img-modal" src="../images/hqs.png">
            </form>
        </div>
    </div>
    <!-- FIM Two -->

    <!-- Modal Six-->
    <div class="janela-modal" id="janela-modal6">
        <div class="modal">
            <button class="fechar" id="janela-modal6">X</button>
            <h1>Publicação:</h1>
            <form action="deleteLivro.php" method="post">
                
            </form>
        </div>
    </div>
    <!-- FIM Modal Six-->

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