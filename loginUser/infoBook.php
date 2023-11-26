<!-- Programador Gustavo Rodrigues -->
<?php
require('../dao/conexao.php');
include('protect.php');
$idUserMain=$_SESSION['id'];
//Verifica se o dado passou pelo post
if(isset($_POST) && $_POST['idUserLivro']!=$idUserMain){
    $idLivro=$_POST['idLivro'];
    $idUserLivro=$_POST['idUserLivro'];
    //seleciona tudo da tabela livro referente o id do livro que foi clicado
    $sqlSelect="SELECT * FROM tbLivro WHERE idLivro='$idLivro'";
    $result=$mysqli->query($sqlSelect);
    //define as variaveis 
    while($res=mysqli_fetch_assoc($result)){
        $autorLivro=$res['autorLivro'];
        $acabamento=$res['acabamentoLivro'];
        $editorLivro=$res['editoraLivro'];
        $nomeLivro=$res['nomeLivro'];
        $desc=$res['descLivro'];
        $img=$res['path'];
        

        $motivoTroca=$res['motivoTroca'];
        $valor=$res['valorTroca'];
        $opc=$res['opcTroca'];
    }



}else{
    header('Location: galeria.php');
}

//FAZER DPS A VERIFICAÇÃO SE O USUARIO N ESCOLHEU UM LIVRO DE SI MESMO
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../css/infoLivro.css"> -->
    <title>BiblioTroca<?php echo $idLivro;?></title>
    <style>
        *{
    padding: 0;
    left: 0;
    top: 0;
}
body{
    font-family: Arial, Helvetica, sans-serif;
}
.post-img{
    border-radius:15px;
    height: 30em;
    width: 20em;
    box-shadow:5px 5px 10px #CBCBCB;
}
.container{
    height: 100vh;
    width: 100%;
    
    
}
.contBook{
    margin-left: 10em;
    display: flex;
    flex-direction: row;
    gap:7em ;
    padding: 3% 0;

}
.infoBook{
    display: flex;
    flex-direction: column;
    text-align: left;

}
.title{
    font-size: 25pt;
}
.button{
    outline: 0;
    border: 0;
    background-color: #6695FD;
    color: white;
    height: 3em;
    border-radius: 15px;
    font-size: 12pt;
    font-weight: bold;
    cursor: pointer;
    width: 30em;
    
}
.buttonBox{
    gap: 0.5em;
    display: flex;
    flex-direction: column;
    margin-top:3em;
}

.button:hover{
    background-color: #8a9fce;
    transition: 0.5s;
    cursor: pointer;
  
}
.button:not(:hover){
    background-color: #6695FD;
    transition: 0.5s;
    cursor: pointer;
}
.desc,.columnInput{
    display: flex;
    flex-direction: column;
}
.desc{
    margin-top:3em;
    max-width:700px;
}


.requerimento{
    color:#8a9fce ;
    display:flex;
    flex-direction:column;
   
}

.propostaBox{
    display: block;
}

#buttonConfirm{
    outline: 0;
    border: solid #6695FD 3px;
    background-color: white;
    color: #6695FD;
    height: 3em;
    border-radius: 15px;
    font-size: 12pt;
    font-weight: bold;
    cursor: pointer;
    width: 30em;
}
#cancel{
    outline: 0;
    background-color:#F04D4D;
    border:0;
    color: white;
    height: 3em;
    border-radius: 15px;
    font-size: 12pt;
    font-weight: bold;
    cursor: pointer;
    width: 30em;
}
.propostaBox{
    display:none;
    flex-direction:column;
    gap:0.5em;
    align-items:left;
    
}
.column{
    display:flex;
    flex-direction:column;
    gap:0.5em;
    margin-top:0.5em;
}

.inputs{
    display:flex;
    flex-direction:row;
    gap:0.5em;
    align-items:center;
}
.inpt{
    height:3em;
    width:17.4em;
    border-radius:10px;
    outline:0;
}
    </style>
</head>
    <body>
        <!-- container geral -->
        <div class="container">
            <!-- container das informações do livro e botoes -->
            <div class="contBook">
                <?php echo "<img src=".$img." class='post-img'alt='capa do livro'>"?>
                <div class="infoBook">
                    <div class="tag"></div>
                    <div class="title">
                        <span><?php echo $nomeLivro;?></span>
                    </div>
                    <div class="requerimento">
                        <span><h3>Mínimo aceito:</h3><?php //colocar oque a pessoa quer
                        //em troca?></span>

                        <span><h4>R$<?php echo $valor;?></h4></span>
                        <span  style="color:orange;"><h3>Aceita em troca:</h3></span>
                        <span style="color:black;"><?php echo $opc;?></span>
                        <span><h4>Motivo da troca/Venda:</h4></span>
                        <span><?php echo $motivoTroca;?></span>
                        
                    </div>
                    <div class="buttonBox">
                        <form action="process/teste.php" method="POST">
                            <input type="hidden" name="trocaDireta">
                            <input type="hidden" name="livro" value="<?php echo $nomeLivro?>">
                            <input type="hidden" name="idReceptor" value="<?php echo $idUserLivro?>">
                            
                        </form>


                        <form action="process/teste.php" method="POST">
                            <div class="propostaBox" id="boxProp">
                                <div class="inputs">
                                    <div class="columnInput">
                                        <span>Seus Livros:</span>
                                            <select name="idParaTroca" id="" class="inpt">
                                                <?php
                                                    $selectMainUser="SELECT * FROM tbLivro WHERE idUser='$idUserMain'";
                                                    $final=$mysqli->query($selectMainUser);
                                                
                                                ?>
                                                <?php
                                                    while($opt=mysqli_fetch_assoc($final)){
                                                        $nmLivro=$opt['nomeLivro'];
                                                        $idLivro1=$opt['idLivro'];
                                                        ?>
                                                            <option value="<?php echo $idLivro1?>"><?php echo $nmLivro;?></option>
                                                        <?php
                                                    }
                                                ?>
                                            </select>
                                        
                                    </div>
                                    <div class="columnInput">
                                        <span>R$:</span>
                                        
                                        <input type="number" class="inpt" name="cash">
                                    </div>
                                </div>
                                <div class="column">
                                <input type="hidden" name="proposta">
                                <input type="hidden" name="livro" value="<?php echo $nomeLivro?>">
                                <input type="hidden" name="idReceptor" value="<?php echo $idUserLivro?>">
                                <input type="hidden" name="idLivroReceptor" value="<?php echo $idLivro?>">
                                <input type="submit" value="Confirmar Proposta" id="buttonConfirm">
                                <input type="button" value="Cancelar" id="cancel" onclick="hide()">
                                </div>
                            </div>


                            
                            
                            
                            <input type="button" value="Fazer Proposta" class="button" onclick="hide()" id="button2">
                        </form>
                    </div>
                    <div class="desc">
                        <h4>Descrição do Livro</h4>
                        <span><h5>Descrição</h5><?php echo $desc;?></span>
                        <span><h5>Acabamento</h5><?php echo $acabamento;?></span>

                        <span><h5>Autor:</h5><?php echo $autorLivro; ?></span>
                        <span><h5>Editora:</h5><?php  echo $editorLivro;?></span>
                        <span><?php ?></span>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var caixaBotoes=document.getElementById("boxProp");
            var botaoInicialProp=document.getElementById("button2");
            var show=false;

            function hide(){
                show=!show
                if(show){
                    caixaBotoes.style.display="block";
                    document.getElementById("button2").style.display="none";
                    document.getElementById("euQueroId").style.display="none";
                  
                }else{
                    caixaBotoes.style.display="none";
                    document.getElementById("button2").style.display="block";
                    document.getElementById("euQueroId").style.display="block";
                }
            }
        </script>
    </body>
</html>