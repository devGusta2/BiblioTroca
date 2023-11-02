<?php
include('../dao/conexao.php');
include('../loginAdm/processos/selects/admSelect.php');
$querySelect = "SELECT * FROM tbUser WHERE statusUser='bloqueado'";
$result = $mysqli->query($querySelect);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard</title>
    <link rel="icon" type="image/png" href="../images/logo.png" />
    <link rel="stylesheet" href="../css/bloqueados.css">
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
                <li class="active">
                    <a class="active" href="#">
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
                <li>
                    <a href="./formDenuncias.php">
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
                        <h2>Usuários Bloqueados</h2>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Nome</td>
                                <td>Data Bloqueio</td>
                                <td>Motivo</td>
                                <td>Desbloquear</td>
                            </tr>
                        </thead>

                        <tbody>

                            <?php while($dadosUsers=mysqli_fetch_assoc($result)){
                                $idUser=$dadosUsers['idUser'];
                                $nomeUser=$dadosUsers['nomeUser'];
                                $dataBloqueio="26-10-2023";
                                $motivoBloqueio="Falta de compromisso";
                                         ?>
                            <tr>
                                <td><?= $idUser ?></td>
                                <td><?= $nomeUser ?></td>
                                <td><?= $dataBloqueio?></td>
                                <td><?= $motivoBloqueio ?></td>
                                <td>
                                <form action="unban.php" method="POST">
                                    <input type="hidden" id="idUser" name="idUser" value="<?php echo $idUser?>">
                                    <button type="submit"><ion-icon name="ban-sharp"></ion-icon></button>
                                </form>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Four-->
    <div class="janela-modal" id="janela-modal4">
        <div class="modal">
            <button class="fechar" id="janela-modal4">X</button>
            <h1>Tem certeza que deseja excluir o item selecionado?</h1>
            <form action="deleteLivro.php" method="post">
                <input class="form-control" id="idLivro" name="idLivro" value="<?=$idLivro[0]?>" type="hidden">

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
</body>
</html>