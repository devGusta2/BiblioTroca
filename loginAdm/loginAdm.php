<?php include ('../dao/conexao.php');
    if(isset($_POST['email']) || isset($_POST['senha'])){
        if(strlen($_POST['email'])==0){
            echo'Preencha seu email';
        }else if(strlen($_POST['senha'])==0){
            echo'Preencha sua senha';
        }else{
            $email=($_POST['email']);
            $senha=($_POST['senha']);

            $sql_code="SELECT * FROM tbuserAdm WHERE emailUserAdm ='$email' AND senhaUserAdm ='$senha'";
            $sql_query=$mysqli->query($sql_code) or die("Falha na execução do código SQL".$mysqli->error);
            $qnt=$sql_query->num_rows;
            if($qnt==1){
                $usuario=$sql_query->fetch_assoc();
                if(!isset($_SESSION)){
                    session_start();
                }

                $_SESSION['id']=$usuario['idUserAdm'];
                $_SESSION['nome']=$usuario['nomeUserAdm'];

                header('Location: dashboard.php');
            }else{
                echo'Falha ao logar, email ou senha incorretos';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/loginNovo.css">
    <link rel="icon" type="image/png" href="../images/logo.png" />
    <title>Login Adm</title>
</head>
<body>
    <div class="container">
        <div class="signin-signup">
            <form action="" method="post" class="sign-in-form">
                <h2 class="title">Entrar</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="email" placeholder="Email" required="required">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="senha" placeholder="Senha" required="required">
                </div>
                <input  type="submit" value="Entrar" name='logar' class="btn">
                <p class="social-text">Visite nossas redes sociais:</p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
                <p class="account-text">Não tenho conta? <a href="#" id="sign-up-btn2">Entrar</a></p>
            </form>
            <form action="salvarCadastro.php" method="post" class="sign-up-form">
                <h2 class="title">Cadastrar</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="nomeCadastro" placeholder="Nome" required="required">
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="text" name="emailCadastro" placeholder="Email" required="required">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="senhaCadastro" placeholder="Senha" required="required">
                </div>
                <input type="submit" value="Enviar" class="btn">
                <p class="social-text">Visite nossas redes sociais:</p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
                <p class="account-text">Já tenho conta! <a href="#" id="sign-in-btn2">Entrar</a></p>
            </form>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Membro da rede?</h3>
                    <p>Entrer na rede para te acesso as novidades postadas!</p>
                    <button class="btn2" id="sign-in-btn">Entrar</button>
                </div>
                <img src="../images/login.jpg" alt="" class="image">
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Área Administrativa</h3>
                </div>
                <br>
                <img src="../images/cadastro.jpg" alt="" class="image">
            </div>
        </div>
    </div>
    <script src="./js/script.js"></script>

    <script>
        const sign_in_btn = document.querySelector("#sign-in-btn");
        const sign_up_btn = document.querySelector("#sign-up-btn");
        const container = document.querySelector(".container");
        const sign_in_btn2 = document.querySelector("#sign-in-btn2");
        const sign_up_btn2 = document.querySelector("#sign-up-btn2");
        sign_up_btn.addEventListener("click", () => {
            container.classList.add("sign-up-mode");
        });
        sign_in_btn.addEventListener("click", () => {
            container.classList.remove("sign-up-mode");
        });
        sign_up_btn2.addEventListener("click", () => {
            container.classList.add("sign-up-mode2");
        });
        sign_in_btn2.addEventListener("click", () => {
            container.classList.remove("sign-up-mode2");
        });
    </script>
</body>
</html>