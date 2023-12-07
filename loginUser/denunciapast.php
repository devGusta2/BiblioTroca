<?php
    require('../dao/conexao.php');
    include('protect.php');

    $idUserLivro=$_POST['idUserDenunciado'];
    $idLivro=$_POST['idLivroDenunciado'];
?>


<form action="salvarDenuncia.php" method="POST">
                <div class="motivos">
                    <div class="denuncia">
                        <div class="texto">
                            <input type="radio" name="opção" value="Falta de compromisso" placeholder="">
                            <p>Falta de compromisso</p>
                        </div>
                        <div class="texto">
                            <input type="radio" name="opção" value="Linguagem ou atitude preconceituosa">
                            <p>Linguagem ou atitude preconceituosa</p>
                        </div>
                        <div class="texto">
                            <input type="radio" name="opção" value="Falso conteudo de negociação">
                            <p>Falso conteúdo de negociação</p>
                        </div>
                        <div class="texto">
                            <input type="radio" name="opção" value="Item ilegal em divulgação">
                            <p>Item ilegal em divulgação</p>
                        </div>
                    </div>
                    <div class="denuncia">
                        <div class="texto">
                            <input type="radio" name="opção" value="Plágio">
                            <p>Plágio</p>
                        </div>
                        <div class="texto">
                            <input type="radio" name="opção" value="Conteúdo Ofensivo">
                            <p>Conteúdo Ofensivo</p>
                        </div>
                        <div class="texto">
                            <input type="radio" name="opção" value="Divulgar informaçoes falsas">
                            <p>Divulgar informações falsas</p>
                        </div>
                        <div class="texto">
                            <input type="radio" name="opção" value="Quebra de regulamentos">
                            <p>Quebra de regulamentos</p>
                        </div>
                    </div>
                </div>
                <textarea cols="90" rows="8" placeholder=" Descrição da denúncia" name="ocorrencia" name="descLivro"></textarea>
                <button type="submit" class="btn-modal">Enviar</button>
                <?php 
                             $nomeUser = "SELECT * FROM tbUser WHERE idUser = '$idUserLivro'";
                              $result = $mysqli->query($nomeUser);

                       while($nome=mysqli_fetch_assoc($result)){
                       $nomeAcusado=$nome['nomeUser'];
                        }
                ?>
                
                <input hidden name="idDenunciado" value="<?php echo $idUserLivro;?>">
                <input type="hidden" name="nomeDenunciado" value="<?php echo $nomeAcusado;?>">

            </form>
            <?php  ?>