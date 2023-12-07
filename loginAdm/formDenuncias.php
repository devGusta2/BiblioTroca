<?php
include('../dao/conexao.php');
include('../loginAdm/processos/selects/admSelect.php');

$querySelect = "SELECT * FROM tbDenuncia";

$result = $mysqli->query($querySelect);

$idDenuncia = $result->fetch_all();

// $innerjoindenuncia = "SELECT * FROM tbDenuncia INNER JOIN tbDenunciado ON tbDenunciado.idDenunciado = tbDenuncia.idDenunciado";
$queryDenuncia="SELECT * FROM tbDenuncia";
$resultado=$mysqli->query($queryDenuncia);

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
    <script src="../js/jquery.js"></script>
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
                        <span class="title2">Olá, adm</span>
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
                    <input type="text" placeholder="Pesquise Aqui" onkeyup="busca()" id="barra-pesquisa"></input>
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
                    <div class="subTable">

                    </div>
                    <div class="defautTable">
                    <table>
                        <thead>
                            <tr>
                                <td>ID Denúncia</td>
                                <td>tipo Denuncia</td>
                                <td>Descrição</td>
                                <td>ID Remetente </td>
                                <td>Nome Remetente</td>
                                <td>ID Destinatário</td>
                                <td>Nome Destinatário</td>
                                <td>Bloquear</td>
                                <!-- <td>Excluir</td> -->
                            </tr>
                        </thead>

                        <tbody>

<?php 
    
    
    while($vaimds=mysqli_fetch_assoc($resultado)){
        $idDenuncia=$vaimds['idDenuncia'];
        $tipoDenuncia=$vaimds['tipoDenuncia'];
        $descDenuncia=$vaimds['descDenuncia'];
        $idUserDenuncia=$vaimds['idUser'];
        $idUserDenunciado=$vaimds['idDenunciado'];
    

    $sqlSelectDenunciador="SELECT * FROM tbUser WHERE idUser='$idUserDenuncia'";
    $final=$mysqli->query($sqlSelectDenunciador);

    while($resDenunciador=mysqli_fetch_assoc($final)){
           $nome=$resDenunciador['nomeUser'];
        }

      //ESTÁ CERTO
    
        while($vaimds2=mysqli_fetch_assoc($resultado)){
            $idUserDenunciado=$vaimds2['idDenunciado'];
        }
       
        $sqlSelectDenunciador1="SELECT * FROM tbPerfil WHERE idUser='$idUserDenunciado'";
        $final1=$mysqli->query($sqlSelectDenunciador1);

        while($resDenunciador1=mysqli_fetch_assoc($final1)){
               $nome1=$resDenunciador1['apelidoPerfil'];
            }
        ?>
       
    <tr>
    <td><?php echo $idDenuncia;?></td>
        <td><?php echo $tipoDenuncia; ?></td>
        <td><?php echo $descDenuncia; ?></td>
        <td><?php echo $idUserDenuncia; ?></td>
        <td><?php echo $nome; ?></td>
        <td><?php echo $idUserDenunciado; ?></td>
        <td><?php echo $nome1; ?></td>
      
        <td>
        <form action="ban.php" method="POST">
            <input type="hidden" id="idUser" name="idUser" value="<?=$idDenunciado[0]?>">
            <button type="submit"><ion-icon name="ban-sharp"></ion-icon></button>
        </form>
        </td>
        <td>
             <!-- <a onclick="abrirModal6(<?=$idDenuncia[0]?>,'idDenuncia')"><ion-icon name="close"></ion-icon></a>  -->
        </td>
    </tr>
    <?php } ?>
</tbody>
                    </table>
                    </div>
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
    <!-- <div class="janela-modal" id="janela-modal6">
        <div class="modal">
        <button class="fechar" id="janela-modal6">X</button>
            <h1>Tem certeza que deseja excluir o item selecionado?</h1>
            <form action="apagarDenuncia.php" method="post">
                <input class="form-control" id="idDenuncia" name="idDenuncia" value="" type="hidden">

                <button type="submit" class="btn-modal">Sim</button>

            </form>
        </div>
    </div> -->
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

    <script>
                function busca(){
            var contBusca=document.querySelector('#barra-pesquisa').value;
                document.querySelector('.defautTable').style='display:none;';
                document.querySelector('.subTable').style='display:block;';
            if(contBusca===''){
                document.querySelector('.defautTable').style='display:block;';
                document.querySelector('.subTable').style='display:none;';
            }
            $.ajax({
                url:'processos/search.php?buscaDen='+contBusca,
                success:function(data){
                    document.querySelector('.subTable').innerHTML=data;
                }
            });
        }
    </script>
</body>
</html>