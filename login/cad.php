<?php
session_start();
include_once('conexao.php');
if (isset($_SESSION['token'])){
    header('Location: ../index.html');
}
?>

    <!DOCTYPE html>
    <html lang="en">
    <head> 

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Corretora SENAC - Cadastro</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"    rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/divisoes.css">
        <link rel="stylesheet" href="../css/animacoes.css">
        <script src="jquery-3.6.3.min.js"></script>
    </head>
    <body class="bgbluehite">
    <div class="d-flex animedown"> 
        <iframe src="../navegador.html" class="navegador" id="meuiframe"></iframe>
    </div>
        <br><br>
    
    <br>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

    <center>
                        <?php 
         if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
         } 
         ?>
         </center>
         <br>
        <div class="loginBox animedown container-fluid ">
            <div></div>
            <div class="animedown defaultcard">
       
                    <form class="darkcard " method="post" action="validarcad.php">
                        <br>
                        
                            <h2>Cadastro de Usuários</h2><br>
                                <label for="nome">Nome:</label><br>
                                <input class="btn btn-outline-light"type="text" id="nome" name="nome" required autofocus><br><br>
                                <label for="email">Email:</label><br>
                                <input class="btn btn-outline-light"type="email" id="email" name="email" required><br><br>
                                <label for="cpf">CPF:</label><br>
                                <input class="btn btn-outline-light"type="text"name="cpf" id="cpf" minlength="11" required placeholder="000.000.000-00"><br><br>
                                <label >Senha:</label><br>
                                <input class="btn btn-outline-light"type="password" id="senha" name="senha" required><br><br>
                                <input class="btn btn-outline-light"type="submit" value="Cadastrar">
                            
                    </form>
                    
                </div>
            <div class="verticalDiv ghostDiv"></div>
            <div class="animedown defaultcard">
           
                <form class="darkcard" method="POST" action="login.php">
              
                    <br>
                    
                    <h2>Login de Usuários</h2><br>
                    <label for="usuario">E-mail:</label><br>
                    <input class="btn btn-outline-light" type="text" name="email" id="email" required><br><br>
                    <label>Senha:</label><br>
                    <input class="btn btn-outline-light" type="password" name="senha" id="senha" required><br><br>
                    <button class="btn btn-outline-light" type="submit" name="login">Entrar</button><br>
                </form>
            </div>
            <div></div>
        </div>
        <br>
        <br>
       <script src="../scripts/responsividade.js"></script>
       <center>
        <footer><p style="color: #808080;">
            <iframe src="../footer.html" class="rodape" ></iframe>
        </footer>
        </center>
        <label class="botao hide"><img class="img-fluid" width="100px" src="../Img/list.svg"></label>
        <iframe name="navmob" class="elemento hide" src="../navegadormob.html" frameborder="0"></iframe>
        <label class="close hide"><img class="img-fluid" width="50px" src="../Img/arrow-bar-right.svg"></label>

    <script src="../scripts/responsividade.js"></script>
    </body>
    </html>
