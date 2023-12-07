
<?php 
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['id'])){
    ?>
    <div style='width: 100%; height: 100%; top: 0; left: 0; display: flex; align-items: center; justify-content: center;
    position: fixed; background: rgba(0, 0, 0, .9);'>>
        <div style='width: 100%; max-width: 750px; min-height: 170px; background: #fdfdfd; backdrop-filter: blur(10px); padding: 50px;
        border-top: .8rem solid #6695fd; border-bottom: .8rem solid #6695fd; border-radius: 40px; box-shadow: rgba(0, 0, 0, .2);'>
            <h1 style='color: #333; margin: 4px; text-align: center; font-family: Arial, Helvetica, sans-serif;'>FAÇA LOGIN ANTES</h1>
            <div style='align-items: center; justify-content: center;'>
                <a href="../loginUser/loginUser.php" style='display: inline-block; text-decoration: none; padding: 0.8rem 1.8rem; background: #6695fd;
                border-radius: .6rem; box-shadow: 0 .2rem .5rem rgba(0, 0, 0, .2); font-size: 1.6rem; cursor: pointer; color: #fff; letter-spacing: .1rem;
                font-weight: 600; border: .2rem solid transparent; margin-top: 15px; transition: .5s ease; font-family: Arial, Helvetica, sans-serif; margin-left: 300px;
                margin-top: 40px;'>Entrar</a>
            </div>
        </div>
    </div>
    <?php
    die("<p style='display: none'><a href=\"../loginUser/loginUser.php\">Entrar</p>");
}else{
    
}



?>