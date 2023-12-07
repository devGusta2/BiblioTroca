<?php

include ('../dao/conexao.php');

$emailCadastro=trim($_POST['emailCodigo']);
$senhaCadastro=password_hash(trim($_POST['senhaCodigo']),PASSWORD_DEFAULT);
$nomeCadastro=trim($_POST['nomeCodigo']);

if (isset($_POST['usuarioCodigo']) && isset($_POST['randomCodigo']) && $_POST['usuarioCodigo'] === $_POST['randomCodigo']) {
    // Se os dois campos existirem e tiverem os mesmos valores
    $statusCadastro = "pendente";
    $status = "ativo";
    $sql = "INSERT INTO tbUser(emailUser, senhaUser, nomeUser, statusUser, statusCadastro) VALUES('$emailCadastro', '$senhaCadastro', '$nomeCadastro', '$status', '$statusCadastro')";
    $sql2 = "INSERT INTO tbPerfil (apelidoPerfil, idadePerfil, biografiaPerfil, favGeneroPerfil, cepPerfil, cidadePerfil, bairroPerfil, fotoPerfil, path, idUser, cpfPerfil) VALUES('null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null')";
    
    $query = $mysqli->prepare($sql);
    $query2 = $mysqli->prepare($sql2);
    $query->execute();
    $query2->execute();
   

    session_start();
    $_SESSION['exibirModal'] = true;

    // Redirecione para a página principal
    header('Location: loginUser.php');
    exit(); // Certifique-se de sair após o redirecionamento
} else {
    header('Location: protect.php');
    exit(); // Certifique-se de sair após o redirecionamento
}

?>

?>

