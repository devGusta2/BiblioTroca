<?php
    include('../../dao/conexao.php');
    include('../protect.php');

  
    if(isset($_GET["term"])){
         $userName=mysqli_real_escape_string($mysqli, $_GET["term"]);
        //VERFICIAR SE A SITAXE TA CERTA
        
        $stmt=$mysqli->prepare(("SELECT idUser, nomeUser FROM tbUser
        WHERE (nomeUser LIKE '%$userName%') ORDER BY nomeUser DESC LIMIT 20"));
        $stmt1=(("SELECT path FROM tbPerfil WHERE (idUser LIKE '%$userName%')
        ORDER BY idUser DESC LIMIT 20"));

        $stmt->execute();
        
        $result = $stmt->get_result();
        $resultado=$mysqli->query($stmt1);
        
        $count = $result->num_rows;


        
        if($count<1){
            echo'<p class="noResults">Sem resultados</p>';
        }else{
            
           
            while($user_data = mysqli_fetch_assoc($result)){
            ?>
            
                <div class="row" onclick="$('#searchContainer').hide(); chat('<?php echo $user_data['idUser'];?>')">
                    <?php 
                    $idTeste=$user_data['idUser'];
                 
                    while  ($user_data1 = mysqli_fetch_assoc($resultado)){
                        echo "<img height='350'width='300' style='border-radius:10px; box-shadow:1px 1px 10px black;' src=".$user_data1['path']." alt='Foto do usuario'>";
                    }
                    $idUsuario=$user_data['nomeUser'];
                    $sqlImg="SELECT * FROM tbPerfil WHERE idPerfil='$idTeste'";
                    $res=$mysqli->query($sqlImg);
                    while($imgUser=mysqli_fetch_assoc($res)){
                        $imagemUser=$imgUser['path'];
                        echo "<img height='350'width='300' style='border-radius:10px; box-shadow:1px 1px 10px black;' src=".$imgUser['path']." alt='Foto do usuario'>";
                    }
                    ?>
                    
                    <p><b><?php echo $user_data['nomeUser'];?></b></p>
                    
                </div>
            
            <?php
            }
        }
    }
?>