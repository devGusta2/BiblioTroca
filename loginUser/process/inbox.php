<?php
?>
    <style>
             body{
            user-select: none;
        }
    </style>
<?php
include("../../dao/conexao.php");
include('../protect.php');
$idUser=$_SESSION['id'];
$stmt = $mysqli->prepare("SELECT * FROM tbConversation WHERE (mainUserConversation = '$idUser') ORDER BY modificationConversation DESC");
$stmt->execute();    
$result=$stmt->get_Result();
$count=$result->num_rows;

if ($count<1){
    echo '<div class="empyty"><p>Nada por aqui! procure um usuário para conversar.</p></div>';
}else{
    while($inbox=mysqli_fetch_assoc($result)){
            $otherUser=$inbox['otherUserConversation'];
            $stmt = $mysqli->prepare("SELECT idUser, nomeUser FROM tbUser WHERE (idUser ='$otherUser' )LIMIT 1");
            $stmt1 = ("SELECT idUser, nomeUser FROM tbUser WHERE (idUser ='$otherUser' )LIMIT 1");
          
            $stmt->execute();
            $user=$stmt->get_result();
            $resultado = $mysqli->query($stmt1);
            while($resOther=mysqli_fetch_assoc($resultado)){
                $idUserOther=$resOther['idUser'];
            }

            if($user){
                ?>
                <div class="chat <?php if($inbox["unreadConversation"]=="y"){echo "new";}?>"onclick="chat('<?php echo $idUserOther;?>')">
                <?php 
                    while($user_data1 = mysqli_fetch_assoc($user)){
                    $idOtherUser=$user_data1['idUser'];
                    
                    $sqlPfp=("SELECT * FROM tbPerfil WHERE idUser='$idOtherUser'");//photo for profile
                    $imgUserLivro=$mysqli->query($sqlPfp);    
                    while($infoUserLivro = mysqli_fetch_assoc($imgUserLivro))//perfil
                    {
                        $testeImagemUser=$infoUserLivro['path'];
                        $apelido=$infoUserLivro['apelidoPerfil'];

                        echo "<img src=".$testeImagemUser." alt='Foto do usuario'>";
                    }
                    ?>
             
                    <p><?php echo $apelido;?></p>
                    </div>
                <?php
                    }
                
             
            }
    }
}


?>