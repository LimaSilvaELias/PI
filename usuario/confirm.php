
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
<?php
    include_once('../login/conexao.php');
    require("../login/validarsessao.php");
    
    //$dataconsulta= $_SESSION['dtconsulta'];
    //$hora_inicio= $_SESSION['hora_inicio'];
    
    $id = $_GET['id'];
    $dataconsulta = $_GET['dataconsulta'];
    
    $diaconsulta = substr($dataconsulta, 0, 10);
    $hora_inicio = substr($dataconsulta, 10, 18);

    ?>
<div class="d-flex animedown"> 
        <iframe src="../navegador.html" class="navegador" id="meuiframe"></iframe>
    </div>
    <div class="verticalDiv"></div>
<div class="boxUniversal animedown">
    <div class="verticalDiv"></div>
    <div class="bodydiv">
        <br>
        <div class="center divstyle">
            <div>
            <h1>Deseja cancelar sua consulta?</h1><br>
            <center>
            <a class='btn btn-success' href='perfil.php?'>Não Cancelar</a>
            <form method="post" action="deletar.php">
                <input type="hidden" name="id" value="<?php echo $id; ?>">

                <button type="submit" class="btn btn-danger" onclick="<?php           
                $horario = "UPDATE horario SET disponivel = 1 WHERE dtconsulta = '$diaconsulta' AND hora_inicio = '$hora_inicio';";
                mysqli_query($conn, $horario); ?>">
                <a class='btn btn-danger' href='deletar.php?id=<?php echo $id ?>'>Cancelar Consulta</a>
                </button>
            </form>

            </center>
            </div>                      
        

        </div>
        <br><br>
    </div>
    <div class="verticalDiv"></div>
</div>
<div class="verticalDiv"></div>
<iframe src="../footer.html" class="rodape" ></iframe>

</body>
