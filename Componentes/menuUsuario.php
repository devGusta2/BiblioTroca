<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=decive-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dashboard.css">
</head>

<!-- Navigation -->
<div class="container">
    <div class="navigation">
        <ul>
            <li>
                <a href="#">
                    <span class="icon">
                        <div class="user">
                            <img src="../images/Felipe.jpeg" alt="">
                        </div>
                    </span>
                    <span class="title"><img src="../images/Logo.png" class="imagem"></span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon">
                        <ion-icon name="home-outline"></ion-icon>
                    </span>
                    <span class="title">Perfil</span>
                </a>
            </li>
            <li>
                <a href="./cadastro.php">
                    <span class="icon">
                        <ion-icon name="mail-unread-outline"></ion-icon>
                    </span>
                    <span class="title">Mensagens</span>
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