<!-- Aqui serão atualizados os dados dos usuarios para desbloqueados -->
<?php
require("../dao/conexao.php");
$idUser=$_POST['idUser'];
$sqlUnban="UPDATE tbUser SET statusUser='ativo' WHERE idUser='$idUser'";
$sqlUnban=$mysqli->prepare($sqlUnban);
$sqlUnban->execute();
header('Location: formBloqueados.php');
?>