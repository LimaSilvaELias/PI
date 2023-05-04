<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/divisoes.css">
    <link rel="stylesheet" href="../css/animacoes.css">
    <script src="../jquery-3.6.3.min.js"></script>
</head>
<body class="bg text-light">
    <div class="d-flex animedown"> 
        <iframe src="../navegador.html" class="navegador" id="meuiframe"></iframe>
    </div>
    <?php
            include_once('../login/conexao.php');
            require("../login/validarsessao.php");

            // Recuperar as informações do usuário da tabela do banco de dados
            $token = $_SESSION['token'];
            $nome = $_SESSION['nome'];
            $email= $_SESSION['email'];
            $codigo= $_SESSION['codigo'];


            $cpf= $_SESSION['cpf'];
            $pontuacao_cpf = substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);

            $query = "SELECT * FROM cliente WHERE token='$token'";

    ?>
<br><br>
    <div class="boxUniversal ">
        <div></div>
        <div class="animeup">
            <div class="boxUniversal infoperfil bg-dark b_radius20 ">
                <div class="animeup m-4">
                    <div class="d-flex">
                    <div class="w-2x">
                     <img src="../Img/person-circle.svg" class=" input-outline-dark w-75">
                    </div> 
                    <div>
                    Nome:<?php echo " ", $nome ?>
                    <br>
                    Cpf: <?php echo " ",$pontuacao_cpf?>
                    <br>
                    Email: <?php echo " ",$email ?>
                    <br><br>
                    Bem vindo a seu espaço de gerenciamento.
                    </div>
                    </div>
                    <hr>
                    
                    <div class="dropdown text-center">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Mais+
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        
                        <li><a class="dropdown-item" href="../login/destruirsessao.php">Sair</a></li>
                        </ul>
                    </div>
                </div>
            </div> 
            <br>
            <div>
                <div class='d-flex flex-wrap justify-content-center'>
                    <?php 
                    // Query SQL
                        $query = "SELECT * FROM consulta WHERE token='$token'";

                        $result = mysqli_query($conn, $query);
                        
                        // Loop pelos resultados
                        while ($row = mysqli_fetch_assoc($result,)) {
                            // Imprime o valor de cada coluna
                            $dthrconsultar=$row['dataconsulta'];

                            $dtconsulta = substr($dthrconsultar, 0, 10);
                            $hora_inicio = substr($dthrconsultar, 10, 18);

                            echo "<div class='darkgrade m-2'>
                                    <div class='darkconsulta'>
                                    
                                    Nome: " . $row['nome'] . "<hr>
                                    CPF: " . $row['cpf'] . "<hr>
                                    Email: <br>" . $row['email'] . "<hr>
                                    
                                    Data de Nascimento: <br>" . $row['datanascimento'] . "<hr>
                                    Data e hora da consulta: <br>" . $row['dataconsulta'] . "<hr>
                                    <a class='btn btn-info' href='editarcon.php?id=" . $row['codigo'] . "'>Editar</a>
                                    
                                    <a class='btn btn-danger ' href='confirm.php?id=" . $row['codigo'] . ". &dataconsulta=" . $row['dataconsulta'] . "'>Cancelar Consulta</a>

                                    </div>
                                    </div>
                                ";
                        } 
                        mysqli_close($conn);
                    ?>
                    </div>
            </div>
            <div class="verticalDiv"></div>
        </div>
        <div></div>
    </div>
    
    <div class="horizontalDiv"></div>
    <div class="horizontalDiv"></div>

    <iframe src="../footer.html" class="rodape" ></iframe>
    <label class="botao hide"><img class="img-fluid" width="100px" src="../Img/list.svg"></label>
    <iframe name="navmob" class="elemento hide" src="../navegadormob.html" frameborder="0"></iframe>
    <label class="close hide"><img class="img-fluid" width="50px" src="../Img/arrow-bar-right.svg"></label>
    <script src="../scripts/animacoes.js"></script>
    <script src="../scripts/responsividade.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
    

</html>