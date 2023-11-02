<?php
include('../dao/conexao.php');
include('../loginAdm/processos/selects/admSelect.php');

$querySelect = "SELECT * FROM tbuser";

$result = $mysqli->query($querySelect);

$idUser = $result->fetch_all();

$n_idUser = count($idUser);

?>

<?php
include('../dao/conexao.php');

$querySelect = "SELECT * FROM tblivro";

$result = $mysqli->query($querySelect);

$idLivro = $result->fetch_all();

$n_idLivro = count($idLivro);

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
                <li class="active">
                    <a class="active" href="./dashboard.php">
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

            <!-- Cards -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers"><?=$n_idUser?></div>
                        <div class="cardName">Usuários Cadastrados</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="person-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">2</div>
                        <div class="cardName">Usuários Bloqueados</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="person-remove-outline"></ion-icon>
                    </div>
                </div>
                
                <div class="card">
                    <div>
                        <div class="numbers">1</div>
                        <div class="cardName">Usuários Ativos</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers"><?=$n_idLivro?></div>
                        <div class="cardName">Total de Publicações</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="library-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">4</div>
                        <div class="cardName">Livros</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="reader-sharp"></ion-icon>
                    </div>
                </div>
                
                <div class="card">
                    <div>
                        <div class="numbers">1</div>
                        <div class="cardName">HQ's</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="book-outline"></ion-icon>
                    </div>
                </div>
            </div>
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">1</div>
                        <div class="cardName">Mangás</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="newspaper"></ion-icon>
                    </div>
                </div>
                
                <div class="card">
                    <div>
                        <div class="numbers">0</div>
                        <div class="cardName">Revistas</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="book"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">0</div>
                        <div class="cardName">Denúncias</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="megaphone-outline"></ion-icon>
                    </div>
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