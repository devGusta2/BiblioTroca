<?php 
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['id'])){
    die("Faça login primeiro.<p><a href=\"loginAdm.php\">Entrar</p>");
}

?>