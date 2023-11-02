<?php
    require("protect.php");
    require("../dao/conexao.php");
    $idAdm=$_SESSION['id'];
    $sqlSelectAdm="SELECT * FROM tbuseradm WHERE idUserAdm='$idAdm'";
    $result=$mysqli->query($sqlSelectAdm);

    while($dadosAdm = mysqli_fetch_assoc($result)){
        $emailAdm=$dadosAdm['emailUserAdm'];
        $nomeUserAdm=$dadosAdm['nomeUserAdm'];
    }

?>