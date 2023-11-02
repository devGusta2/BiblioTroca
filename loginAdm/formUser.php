<?php
include('../dao/conexao.php');
include('../loginAdm/processos/selects/admSelect.php');
$querySelect = "SELECT * FROM tbuser";

$result = $mysqli->query($querySelect);

$idUser = $result->fetch_all();

$vai =  "SELECT * FROM tbUser";
$nova = $mysqli->query($vai);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard</title>
    <link rel="icon" type="image/png" href="../images/logo.png" />
    <link rel="stylesheet" href="../css/dashboard.css">
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
                <li class="active">
                    <a class="active" href="./formUser.php">
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
                        <h2>Usuários Cadastrados</h2>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Nome</td>
                                <td>Email</td>
                                <td>Idade</td>
                                <td>Sexo</td>
                                <td>CEP</td>
                                <td>Estado</td>
                                <td>CPF</td>
                                <td>Foto</td>
                            </tr>
                        </thead>

                        <tbody>

                            <?php while ($res = mysqli_fetch_assoc($nova)){
                                $id = $res['idUser'];
                                $nomeUser = $res['nomeUser'];
                                $emailUser = $res['emailUser'];
                               
                                $vamo =  "SELECT * FROM tbPerfil WHERE idPerfil='$id'";
                                $nova1 = $mysqli->query($vamo);

                                while ($res2 = mysqli_fetch_assoc($nova1)){
                                    $idade = $res2['idadePerfil'];
                                    $sexo = $res2['sexoPerfil'];
                                    $cepPerfil = $res2['cepPerfil'];
                                    $cidadePerfil = $res2['cidadePerfil'];
                                    $cpfPerfil = $res2['cpfPerfil'];
                                    $imagem = $res2['path'];

                                }
                                ?>
                            <tr>
                                <td><?php echo $id;?></td>
                                <td><?php echo $nomeUser; ?></td>
                                <td><?php echo $emailUser; ?></td>
                                <td><?php echo $idade; ?></td>
                                <td><?php echo $sexo; ?></td>
                                <td><?php echo $cepPerfil; ?></td>
                                <td><?php echo $cidadePerfil; ?></td>
                                <td><?php echo $cpfPerfil; ?></td>
                                <td>
                                    <a class="btnImagem" onclick="abrirModal()"><ion-icon name="image-outline"></ion-icon></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal One-->
    <div class="janela-modal" id="janela-modal">
        <div class="modal">
            <button class="fechar" id="janela-modal">X</button>
            <h1>Foto de perfil:</h1>
            <form action="" method="post">
                <img class="img-modal" src="../images/eu.png">
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