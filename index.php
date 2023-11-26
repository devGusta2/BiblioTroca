<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        BiblioTroca
    </title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="icon" type="image/png" href="./images/logo.png"/>
</head>

<body>
    <!-- MOBILE NAV -->
    <div class="mb-nav">
        <div class="mb-move-item"></div>
        <div class="mb-nav-item active">
            <a href="#home">
                <i class="bx bxs-home"></i>
            </a>
        </div>
        <div class="mb-nav-item">
            <a href="#about">
                <i class='bx bxs-food-menu'></i>
            </a>
        </div>
        <div class="mb-nav-item">
            <a href="#video">
                <i class='bx bx-video'></i>
            </a>
        </div>
        <div class="mb-nav-item">
            <a href="#empresa">
                <i class='bx bx-buildings'></i>
            </a>
        </div>
    </div>
    <!-- END MOBILE NAV -->
    <!-- BACK TO TOP BTN -->
    <a href="#home" class="back-to-top">
        <i class="bx bxs-to-top"></i>
    </a>
    <!-- END BACK TO TOP BTN -->
    <!-- TOP HEADER -->
    <div class="nav">
        <div class="menu-wrap">
            <a href="#home">
                <div class="logo">
                    BiblioTroca
                </div>
            </a>
            <div class="menu h-xs">
                <a href="#home">
                    <div class="menu-item active">
                        Home
                    </div>
                </a>
                <a href="#about">
                    <div class="menu-item">
                        Sobre
                    </div>
                </a>
                <a href="#video">
                    <div class="menu-item">
                        Vídeo
                    </div>
                </a>
                <a href="#empresa">
                    <div class="menu-item">
                        Empresa
                    </div>
                </a>
            </div>
            <div class="right-menu">
                <a href="./loginUser/loginUser.php">
                    <div class="cart-btn">
                        <i class='bx bxs-door-open'></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- FIM HEADER -->
    <!-- HOME -->
    <section id="home" class="fullheight align-items-center bg-img bg-img-fixed"
        style="background-image: url(images/livro4.jpeg);">
        <div class="container">
            <div class="row">
                <div class="col-6 col-xs-12">
                    <div class="slogan">
                        <h1 class="left-to-right play-on-scroll">
                            BiblioTroca
                        </h1>
                        <p class="left-to-right play-on-scroll delay-2">

                            A BiblioTroca é uma rede social que consiste que pessoas
                             possam realizar a troca de livros com outras pessoas. Esses livros podem ser trocados 
                             por outros livros ou até mesmo, vendidos pelos usuários, que poderão combinar os termos das trocas 
                             pela plataforma.
                            
                        </p>
                        <br>
                        <div class="left-to-right margin-bottom-10 play-on-scroll delay-4">
                            <a href="./loginUser/loginUser.php">
                                Entrar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FIM HOME -->
    <!-- SOBRE -->
    <section class="about fullheight align-items-center" id="about">
        <div class="container">
            <div class="row">
                <div class="col-7 h-xs align-items-center">
                    <img src="images/logo.png" alt="" class="width-10 left-to-right play-on-scroll">
                </div>
                <div class="col-5 col-xs-12 align-items-center">
                    <div class="about-slogan right-to-left play-on-scroll">
                        <h3>
                            <span class="primary-color">Nós</span> da <span class="primary-color">BiblioTroca</span>
                            criamos essa rede social para <span class="primary-color">você</span>
                        </h3>
                        <p>
                            Esperamos que a nossa plataforma propicie a pessoas que não tem acesso a livros devido aos altos valores, 
                            acesso ao mundo da leitura a preços mais convidativos, que não tenham um impacto tão grande em seu orçamento doméstico.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FIM SOBRE -->
    <!-- VÍDEO -->
    <section class="align-items-center bg-img bg-img-fixed" id="video"
        style="background-image: url(images/livro2.jpeg);">
        <div class="container">
            <div class="food-menu">
                <h1>
                    Se que saber mais sobre a <span class="primary-color">BiblioTroca</span> veja nosso vídeo!
                </h1>
                <br>
                <video class="" width="720" height="440" controls>
                    <source src="./video/pitch.mp4" type="video/mp4">
                    <source src="movie.ogg" type="video/ogg">
                </video>
                
            </div>
                <div class="food-category">
                    
                </div>      
            </div>
        </div>
    </section>
    <!-- FIM VÍDEO -->
    <!-- EMPRESA SECTION -->
    <section id="empresa">
        <div class="container">
            <div class="align-items-center">
                <div class="col-4 col-xs-12">
                    <div class="review-wrap zoom play-on-scroll delay-4">
                        <div class="review-content">
                            <h3>
                                Empresa Desenvolvedora
                            </h3>
                            <div class="review-img bg-img"
                                style="background-image: url(images/Logo1.png);">
                            </div>
                        </div>
                        <div class="review-info">
                            <p>
                                A Zero Um desenvolveu esse sistema para facilita a
                                buscar por livros para os usúarios.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FIM EMPRESA SECTION -->
    <!-- FOOTER -->
    <section class="footer bg-img" style="background-image: url(images/livro2.jpeg);">
        <div class="container">
            <div class="row">
                <div class="col-6 col-xs-12">
                    <h1>
                        Dúvidas
                    </h1>
                    <br>
                    <p>
                        Em caso de dúvidas entre em contato com a gente.
                    </p>
                    <br>
                    <p>Email: bibliotroca@gmail.com</p>
                    <p>Telefone: 11 99999-8888</p>
                    <p>Website: BiblioTroca.com</p>
                </div>
                <div class="col-2 col-xs-12">
                    <h1>
                        Entrar
                    </h1>
                    <br>
                    <p>
                        <a href="./loginUser/loginUser.php">
                            Usúario
                        </a>
                    </p>
                    <p>
                        <a href="./loginAdm/loginAdm.php">
                            ADM
                        </a>
                    </p>
                </div>
                <div class="col-4 col-xs-12">
                    <h1>
                    BiblioTroca
                    </h1>
                    <br>
                    <p>
                        A BiblioTroca e um portal web para que pessoas comuns possam realizar a troca de livros.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- FIM FOOTER -->

    <script src="./js/index.js"></script>
</body>

</html>