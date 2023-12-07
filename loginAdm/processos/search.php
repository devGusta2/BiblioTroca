<?php
include('../../dao/conexao.php');

if(isset($_GET['buscaParam'])){
    $busca=$_GET['buscaParam'];
    $sqlSelect="SELECT * FROM tbUser WHERE (nomeUser LIKE '%$busca%') 
    ORDER BY idUser DESC";
    $nova=$mysqli->query($sqlSelect);
    $num=$nova->num_rows;



    if($num<1){
        echo"Não foi encontrado nenhum resultado";
    }else{
        ?>
                    <table>
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Nome</td>
                                <td>Email</td>
                                <td>Idade</td>
                                <td>Sexo</td>
                                <td>CEP</td>
                                <td>Estado</td>
                                <td>CPF</td>
                                <td>Foto</td>
                            </tr>
                        </thead>

                        <tbody>

                            <?php while ($res = mysqli_fetch_assoc($nova)){
                                $id = $res['idUser'];
                                $nomeUser = $res['nomeUser'];
                                $emailUser = $res['emailUser'];
                               
                                $vamo =  "SELECT * FROM tbPerfil WHERE idPerfil='$id'";
                                $nova1 = $mysqli->query($vamo);

                                while ($res2 = mysqli_fetch_assoc($nova1)){
                                    $idade = $res2['idadePerfil'];
                                    $sexo = $res2['sexoPerfil'];
                                    $cepPerfil = $res2['cepPerfil'];
                                    $cidadePerfil = $res2['cidadePerfil'];
                                    $cpfPerfil = $res2['cpfPerfil'];
                                    $imagem = $res2['path'];

                                }
                                ?>
                            <tr>
                                <td><?php echo $id;?></td>
                                <td><?php echo $nomeUser; ?></td>
                                <td><?php echo $emailUser; ?></td>
                                <td><?php echo $idade; ?></td>
                                <td><?php echo $sexo; ?></td>
                                <td><?php echo $cepPerfil; ?></td>
                                <td><?php echo $cidadePerfil; ?></td>
                                <td><?php echo $cpfPerfil; ?></td>
                                <td>
                                    <a class="btnImagem" onclick="abrirModal()"><ion-icon name="image-outline"></ion-icon></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>

<?php
    }
}else if(isset($_GET['buscaBloq'])){
    $busca=$_GET['buscaBloq'];
    $sqlSelect="SELECT * FROM tbUser WHERE (nomeUser LIKE '%$busca%') AND statusUser='bloqueado'
    ORDER BY idUser DESC";
    $nova=$mysqli->query($sqlSelect);
    $num=$nova->num_rows;

    if($num<1){
        echo"Não foi encontrado nenhum resultado";
    }else{

        ?>
             <table>
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Nome</td>
                                <td>Data Bloqueio</td>
                                <td>Motivo</td>
                                <td>Desbloquear</td>
                            </tr>
                        </thead>

                        <tbody>

                            <?php while($dadosUsers=mysqli_fetch_assoc($nova)){
                                $idUser=$dadosUsers['idUser'];
                                $nomeUser=$dadosUsers['nomeUser'];
                                $dataBloqueio="26-10-2023";
                                $motivoBloqueio="Falta de compromisso";
                                         ?>
                            <tr>
                                <td><?= $idUser ?></td>
                                <td><?= $nomeUser ?></td>
                                <td><?= $dataBloqueio?></td>
                                <td><?= $motivoBloqueio ?></td>
                                <td>
                                <form action="unban.php" method="POST">
                                    <input type="hidden" id="idUser" name="idUser" value="<?php echo $idUser?>">
                                    <button type="submit"><ion-icon name="ban-sharp"></ion-icon></button>
                                </form>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
        <?php
    }
}else if(isset($_GET['buscaLivro'])){
    $busca=$_GET['buscaLivro'];
    $querySelect = "SELECT * FROM tblivro WHERE (nomeLivro LIKE '%$busca%')";

    $result = $mysqli->query($querySelect);
    
    $idLivro = $result->fetch_all();

    $numColunas = $result->field_count;

    if($numColunas<1){
        echo"Não foi encontrado nenhum resultado";
    }else{
        ?>
                                <table>
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Livro</td>
                                <td>Autor</td>
                                <td>Descrição</td>
                                <td>Ano</td>
                                <td>Editora</td>
                                <td>Páginas</td>
                                <td>Acabamento</td>
                                <td>Idioma</td>
                                <td>Capa</td>
                                <td>Excluir</td>
                            </tr>
                        </thead>

                        <tbody>

                            <?php foreach ($idLivro as $idLivro) { ?>
                            <tr>
                                <td><?= $idLivro[0] ?></td>
                                <td><?= $idLivro[1] ?></td>
                                <td><?= $idLivro[2] ?></td>
                                <td><?= $idLivro[3] ?></td>
                                <td><?= $idLivro[5] ?></td>
                                <td><?= $idLivro[6] ?></td>
                                <td><?= $idLivro[8] ?></td>
                                <td><?= $idLivro[9] ?></td>
                                <td><?= $idLivro[7] ?></td>
                                <td>
                                    <a class="btnImagem" onclick="abrirModal3()"><ion-icon name="image-outline"></ion-icon></a>
                                </td>
                                <!-- Modal Three-->
                                <div class="janela-modal" id="janela-modal3">
                                    <div class="modal">
                                        <button class="fechar" id="janela-modal3">X</button>
                                        <h1>Capa do Livro</h1>
                                        <img class="img-modal" src="../images/senhor dos aneis.png">
                                    </div>
                                </div>
                                <td>
                                    <a onclick="abrirModal(<?=$idLivro[0]?>,'idLivro')"><ion-icon name="close"></ion-icon></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
        <?php
    }
}else if(isset($_GET['buscaDen'])){
    $busca=$_GET['buscaDen'];
    $querySelect = "SELECT * FROM tbDenuncia WHERE (nomeDenuncia LIKE '%$busca%')";
   
    // $innerjoindenuncia = "SELECT * FROM tbDenuncia INNER JOIN tbDenunciado ON tbDenunciado.idDenunciado = tbDenuncia.idDenunciado";

    $resultado=$mysqli->query($querySelect);

    $numD=$resultado->num_rows;

    if($numD<1){
        echo "Não foi encontrado nenhum resultado!";
    }else{
        ?>
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
        <?php
    }
}
?>