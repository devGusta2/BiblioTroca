<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/verificarEmail.css">
    <link rel="icon" type="image/png" href="../images/logo.png"/>
    <title>Verificar</title>
</head>

<body>

<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
//Load Composer's autoloader
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;





    require('../dao/conexao.php');

    
    
    


    $emailCadastro=trim($_POST['emailCadastro']);
    $senhaCadastro=trim($_POST['senhaCadastro']);
    $nomeCadastro=trim($_POST['nomeCadastro']);
    
    $codigo_autenticacao = mt_rand(100000, 999999);

   
    
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
    
        // Permitir o envio do e-mail com caracteres especiais
        $mail->CharSet = 'UTF-8';    
    
         // Definir para usar SMTP                             
        $mail->isSMTP();                
        // Servidor de envio de e-mail                           
        $mail->Host       = 'smtp.gmail.com';                     
    
         // Definir para usar SMTP
        $mail->SMTPAuth   = true;    
        
         // Servidor de envio de e-mail
        $mail->Username   = 'bibliotrocasiteoficial@gmail.com'; 
        
           // Senha do e-mail utilizado para enviar e-mail
        $mail->Password   = 'djgm nzwd brtz gaso';         
        
        // Ativar criptografia    
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  
        
       // Porta para enviar e-mail 
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('bibliotrocasiteoficial@gmail.com.br', 'bib');
        $mail->addAddress($emailCadastro , $nomeCadastro);     //Add a recipient
    
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Codigo de Verificação do seu Email';
        $mail->Body    = "Olá " . $nomeCadastro . ", <br><br>Seu código de verificação é $codigo_autenticacao<br><br>Esse código foi enviado para verificar seu login.<br><br>Digite ele no campo de verificação do Site.<br><br>";
       
    
        $mail->send();
        
    }
     catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    
        ?>





        <form action="salvarCadastro.php" method="post" >

                <div >
                    <input id="placeholder-text" type="hidden" name="nomeCodigo" value="<?php echo $nomeCadastro ?>" placeholder="<?php echo $nomeCadastro ?>" >
                </div>
                <div >
                    <input id="placeholder-text" type="hidden" name="emailCodigo" value="<?php echo $emailCadastro ?>" placeholder="<?php echo $nomeCadastro ?>" >
                </div>
                <div >
                    <input id="placeholder-text" type="hidden" name="senhaCodigo" value="<?php echo $senhaCadastro ?>" placeholder="<?php echo $nomeCadastro ?>" >
                </div>

                <div >
                    <input id="placeholder-text" type="hidden" name="randomCodigo" value="<?php echo $codigo_autenticacao ?>" placeholder="<?php echo $codigo_autenticacao ?>" >
                </div>


               <h3> Ola <?php echo $nomeCadastro ?> <h3>

                <h3>Um codigo de verificação com 6 digitos foi mandado para o email <?php echo $emailCadastro ?> para verificar seu cadastro</h3>


                <h3>Por favor insira seu codigo abaixo: </h3>

                <div >
                    <input  type="text" name="usuarioCodigo" placeholder="insira aqui seu codigo" require="required">
                </div>

                <input type="submit" value="Confirmar">

                     
               
                
                
        </form>
            <?php  ?>
 

</body>
