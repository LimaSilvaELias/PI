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
<body>
    <script src="../login/validarsessao.php"></script>
    <div class="d-flex animedown"> 
        <iframe src="../navegador.html" class="navegador" id="meuiframe"></iframe>
    </div>
<?php
session_start();
include_once('../login/conexao.php');

// Verificar se o usuário tem uma sessão ativa
if (!isset($_SESSION['token'])) {
  header('Location: ../login/cad.php');
  exit();
}

// Recuperar as informações do usuário da tabela do banco de dados
$token = $_SESSION['token'];
$nome = $_SESSION['nome'];
$email= $_SESSION['email'];

$cpf= $_SESSION['cpf'];
$pontuacao_cpf = substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);

$query = "SELECT * FROM cliente WHERE token='$token'";

mysqli_close($conn);
?>
    <div class="boxUniversal ">
        <div class="container-fluid animeup">
            <div class="boxUniversal infoperfil">
                <div class="animeup">
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
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <hr>
                        <li><a class="dropdown-item" href="../login/destruirsessao.php">Sair</a></li>
                        </ul>
                    </div> 
                </div>
            </div> 
            <br>
            <div class="grade center darkgrade consulta">
                <i class="">
                    nome: <br><br>
                    consulta: <br>
                    data: <br>
                    horario: <br>
                    <button type="submit">Editar</button>......<button type="submit">Cancelar</button>
                
                </i>
                <i class="">
                    
                    nome: <br><br>
                    consulta: <br>
                    data: <br>
                    horario: <br>
                    <button type="submit">Editar</button>......<button type="submit">Cancelar</button>
                </i>
                <i class="">
                    
                    nome: <br><br>
                    consulta: <br>
                    data: <br>
                    horario: <br>
                    <button type="submit">Editar</button>......<button type="submit">Cancelar</button>
                </i>
                <i class="">
                    
                    nome: <br><br>
                    consulta: <br>
                    data: <br>
                    horario: <br>
                    <button type="submit">Editar</button>......<button type="submit">Cancelar</button>
                </i>
                <i class="">
                    
                    nome: <br><br>
                    consulta: <br>
                    data: <br>
                    horario: <br>
                    <button type="submit">Editar</button>......<button type="submit">Cancelar</button>
                </i>
                <i class="">
                    
                    nome: <br><br>
                    consulta: <br>
                    data: <br>
                    horario: <br>
                    <button type="submit">Editar</button>......<button type="submit">Cancelar</button>
                </i>
                <i class="">
                    
                    nome: <br><br>
                    consulta: <br>
                    data: <br>
                    horario: <br>
                    <button type="submit">Editar</button>......<button type="submit">Cancelar</button>
                </i>
                <i class="">
                    
                    nome: <br><br>
                    consulta: <br>
                    data: <br>
                    horario: <br>
                    <button type="submit">Editar</button>......<button type="submit">Cancelar</button>
                </i>
                <i class="">
                    
                    nome: <br><br>
                    consulta: <br>
                    data: <br>
                    horario: <br>
                    <button type="submit">Editar</button>......<button type="submit">Cancelar</button>
                </i>
                <i class="">
                    
                    nome: <br><br>
                    consulta: <br>
                    data: <br>
                    horario: <br>
                    <button type="submit">Editar</button>......<button type="submit">Cancelar</button>
                </i>
                <i class="">
                    
                    nome: <br><br>
                    consulta: <br>
                    data: <br>
                    horario: <br>
                    <button type="submit">Editar</button>......<button type="submit">Cancelar</button>
                </i>
                <i class="">
                    
                    nome: <br><br>
                    consulta: <br>
                    data: <br>
                    horario: <br>
                    <button type="submit">Editar</button>......<button type="submit">Cancelar</button>
                </i>

            </div>
            <div class="verticalDiv"></div>
        </div>
    </div>
    
    <div class="horizontalDiv"></div>
    <div class="horizontalDiv"></div>

    <iframe src="../footer.html" class="rodape" ></iframe>

    <script src="scripts/responsividade.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>