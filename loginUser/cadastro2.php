<?php
require('../dao/conexao.php');
    include('protect.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../images/logo.png" />
    <link rel="stylesheet" href="../css/cadastroUser.css">
    <title>Cadastro</title>
</head>
    <body>
        <div class="box">
            <form enctype="multipart/form-data" action="SalvarCadastro2.php" method="post">
                <h2>Quase lá</h2>
                <div class="box-form">
                    <div class="box-form-1">
                        <div class="inputBox">
                            <input type="text" name="cpf" id="" required="required" oninput="maskCPF(this)" maxLength="14">
                            <span>CPF</span>
                            <i></i>
                        </div>
                        <div class="inputBox">
                            <input type="text" name="cep" id="" required="required">
                            <span>CEP</span>
                            <i></i>
                        </div>
                        <div class="inputBox">
                            <input type="text" name="cidade" id="" required="required">
                            <span>Estado</span>
                            <i></i>
                        </div>
                        <div class="inputBox">
                            <input type="text" name="bairro" id="" required="required">
                            <span>Bairro</span>
                            <i></i>
                        </div>
                    </div>
                    <div class="box-form-2">
                        <div class="inputBox">
                            <input type="text" name="tel" id="" required="required">
                            <span>Telefone</span>
                            <i></i>
                        </div>
                        <div class="inputBox">
                            <input type="text" name="apelido" required="required">
                            <span>Apelido</span>
                            <i></i>
                        </div>
                        <div class="inputBox">
                            <input type="number" name="idade" required="required">
                            <span>Idade</span>
                            <i></i>
                        </div>
                        <div class="inputBox">
                            <input name="bio" id="textArea" required="required">
                            <span>Biografia</span>
                            <i></i>
                        </div>
                    </div>
                    <div class="box-form-3">
                        <label>Gênero Favorito:</label>
                        
                        <select placeholder="Biografia" name="generoLivro" id="" class="inputBox2">
                            <option value="Terror">Terror</option>
                            <option value="Romance">Romance</option>
                            <option value="Ação">Ação</option>
                            <option value="Mistério">Mistério</option>
                            <option value="Poesia">Poesia</option>
                            <option value="História">História</option>
                            <option value="Conto">Conto</option>
                        </select>
                
                        <label>Sexo:</label>
                        
                        <select name="sexo" id="" class="inputBox2">
                            <option value="feminino">Feminino</option>
                            <option value="masculino">Masculino</option>
                        </select>

                        <label>Adicionar Foto:</label>

                        <div class="inputBox2">
                            <input type="file" placeholder="Adicionar Foto" class="file" name="arquivoUser" id="">  
                        </div>
                                
                        <input class="button" type="submit" value="Finalizar">
                    </div>
                </div>
            </form>
        </div>

        <script src='../js/script.js'></script>
    </body>
</html>