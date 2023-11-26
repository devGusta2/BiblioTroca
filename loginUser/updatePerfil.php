<!-- aqui será onde serão feitos os códigos de alteração do perfil, onde o usuario pode alterar a foto, capa, bio, etc -->
<?php


include ('../dao/conexao.php');
include('protect.php');
$idUser=$_SESSION['id'];
    
if(isset($_FILES['arquivoUser'])){
    $arquivo=$_FILES['arquivoUser'];

if($arquivo['error']){
    die("Falha ao enviar o arquivo, tente novamente.");
}

if($arquivo['size']>2097152){
    die("Arquivo muito grande! Max 2MB" );
}

$pasta="../LoginUser/arquivos/userImage/";

$nomeDoArquivo=$arquivo['name'];
$novoNomeDoarquivo=uniqid();
$extensao=strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

if($extensao !="jpg" && $extensao !='png'){
    die("Tipo de arquivo deve ser somente PNG ou JPG");
}
$path=$pasta.$novoNomeDoarquivo.".".$extensao;
$deu_certo=move_uploaded_file($arquivo['tmp_name'],$path);
}

$uptadeFoto="UPDATE  tbPerfil SET path='$path' WHERE idUser='$idUser'";
$query5=$mysqli->prepare($uptadeFoto);
$query5->execute();

header('Location: perfil.php');
?>                               