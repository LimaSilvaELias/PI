<?php
    include_once('../login/conexao.php');
    require("../login/validarsessao.php");

    $id = $_GET['id'];
    $query = "SELECT * FROM consulta WHERE codigo='$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    // Exibir as informações nos campos do formulário de edição
?>
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
<body >
<div class="d-flex animedown"> 
        <iframe src="../navegador.html" class="navegador" id="meuiframe"></iframe>
    </div>
    <div class="verticalDiv"></div>
<div class="boxUniversal animedown">
    <div class="verticalDiv"></div>
    <div class="bodydiv">
        <br>
        <div class="justify-content-center d-flex divstyle">
            <form action="atualizar.php?id=<?php echo$id?>" method="post">
                <input type="hidden" name="id" value="<?php echo $row['codigo']; ?>">

                <label for="nome">Nome:</label><br>
                <input type="text" name="nome"  value="<?php echo $row['nome']; ?>">
                <br>
                <label for="cpf">CPF:</label><br>
                <input type="text" name="cpf" maxlength="11" value="<?php echo $row['cpf']; ?>">
                <br>
                <label for="email">Email:</label><br>
                <input type="email" name="email"  value="<?php echo $row['email']; ?>">
                <br>
                Data de nascimento
                <div class="calendar">
                <span class="calendar"> 
                <input type="date" name="datanascimento" value="<?php echo $row['datanascimento']; ?>"></span>
                </div>
                <br>
                
                <div class="opacity-50 " >
                <span class="calendar"> 
                <input type="datetime-local" name="dataconsulta" value="<?php echo date('Y-m-d\TH:i', strtotime($row['dataconsulta'])); ?>"></span>
                </div>
                
                <br>
                <button type="submit">Atualizar</button>
            </form>
            <?php
            
            
            ?>

        </div>
        <br><br>
    </div>
    <div class="verticalDiv"></div>
</div>
<div class="verticalDiv"></div>
<iframe src="../footer.html" class="rodape" ></iframe>

</body>