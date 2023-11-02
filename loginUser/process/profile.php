<?php
    // include("");//sessao
    require("../../dao/conexao.php");
    include("../protect.php");
//pesquisar oq é cookie

?>
<?php
    //MUDAR ISSO AQUI DEPOIS ***************************************************************
    $idUser=$_SESSION["id"];
    
    $token=$_COOKIE["tokenUser"];
    $secure=$_COOKIE["secureUser"];

    $stmt=$mysqli->prepare("SELECT idUser, nomeUser, onlineUser, creationUser FROM tbUser
    WHERE (idUser=? AND tokenUser LIKE ? AND secureUser = ?) LIMIT 1");
    $stmt->bind_param("isi", $id, $token, $secure);
    $stmt->execute();
    $me = $stmt->get_result()->fetch_assoc();
    if(!$me){
        die(header('location: loginUser.php'));
    }else{
        $uid=$me["idUser"];
        $username=$me["nomeUser"];
        // falta uma foto aq
        $user_online=strtotime($me["onlineUser"]);
        $user_creation=$me["creationUser"];

        $stmt=$con->prepare("UPDATE tbUser SET 'onlineUser'= now() WHERE idUser = ?");
        $stmt->bind_param("i", $uid);
        $stmt->execute();
    }
    // }else{
    //     die(header('location: loginUser.php'));
    // }
    header('Location: chat.html');
?>