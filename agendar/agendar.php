<?php
        session_start();

        // $dtconsulta = filter_input(INPUT_POST, 'dtconsulta', FILTER_SANITIZE_STRING); 
        // $hora_inicio   = filter_input(INPUT_POST, 'hora_inicio', FILTER_SANITIZE_STRING);
        // $disponivel   = filter_input(INPUT_POST, 'disponivel', FILTER_SANITIZE_STRING);
        // Conexão com o banco de dados MySQL
        $host = "localhost";
        $user = "root";
        $pass = "";
        $dbname = "pi";

        $conn = mysqli_connect($host, $user, $pass, $dbname);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/divisoes.css">
  <link rel="stylesheet" href="../css/animacoes.css">
  <script src="jquery-3.6.3.min.js"></script>

</head>

<body>

  <div class="d-flex">
    <iframe src="../navegador.html" class="navegador"></iframe>
  </div>
  <div class="boxUniversal">

    <div class="verticalDiv"></div>
    <div>
      <div class="horizontalDiv"></div>
      
        <div class="card-group container-fluid bodydiv">
          <div class="card animecards">
            <img src="https://img.cancaonova.com/cnimages/canais/uploads/sites/6/2015/10/formacao_a_medicina_e-_a-_profissao_com_-o_-dom_-de_-salvar_-vidas.jpg" class="card-img-top img16_9" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
          </div>
          <div class="card animecards">
            <img src="https://media.discordapp.net/attachments/874439592999260190/891460284680642570/ANVHnRTXD4sZAAAAAElFTkSuQmCC.png" class="card-img-top img16_9" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
            </div>
          </div>
          <div class="card animecards">
            <img src="https://blog.estacio.br/wp-content/uploads/2020/02/medicina.jpg" class="card-img-top img16_9" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
            </div>
          </div>
        </div>   

      <br><br><br>
      <div class="bodydiv">
        <div class="text-center divstyle">
          <img src="../Img/logopreto.png" width="100px">
          <h2>Agende sua Consulta</h2>
        </div>
        <br><br>
        <div class="justify-content-center d-flex divstyle">
        <form method="POST" action="agendar.php" name="agendamento">
          
            <br>
            <div class="">
              Nome:<br>
              <input type="text" name="nome" maxlength="30" placeholder="Nome e Sobrenome">
              <br>
              E-mail:<br>
              <input type="mail" name="email" maxlength="40" placeholder="usuario@email.com">
              <br>
              CPF:<br>
              <input type="text" name="cpf" maxlength="14" placeholder="000.000.00-00"><br>
              
              Data Nascimento:<br>
              <input type="datetime" name="datanascimento" max="8" placeholder="00 / 00 / 0000">
            </div>
            
            <div>
              Data Consulta:
              <br>
              
                
        
        <div class="calendar">
            <span class="calendar-icon"> <input type="date" id="data" name="dtconsulta" ></span>
        </div>
        <!-- <input type="date" id="data" name="dtconsulta" readonly value=""> -->
  
        <label for="hora_inicio">Horário da Consulta:</label><br>
        <select name="hora_inicio" required>
            <option value="">Selecione um horário</option>
            <option value="09:00:00">09:00</option>
            <option value="09:30:00">09:30</option>
            <option value="10:00:00">10:00</option>
            <option value="10:30:00">10:30</option>
            <option value="11:00:00">11:00</option>
            <option value="11:30:00">11:30</option>
            <option value="14:00:00">14:00</option>
            <option value="14:30:00">14:30</option>
            <option value="15:00:00">15:00</option>
            <option value="15:30:00">15:30</option>
            <option value="16:00:00">16:00</option>
            <option value="16:30:00">16:30</option>
            <option value="17:00:00">17:00</option>
            <option value="17:30:00">17:30</option>
        </select>
    
              <br><br>
            <div class="">
              <div class="">
                <input class="submit" type="submit" name="agendar" value="Agendar">
                </div>
                
              <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                


            </div>
            <br>
            
          </form>
          <center>
          <?php
      
        
        // Verifica se o formulário foi enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Recupera as informações do formulário
            $dtconsulta = $_POST["dtconsulta"];
            $hora_inicio = $_POST["hora_inicio"];

            // Verifica se o horário está disponível
            $sql = "SELECT * FROM horario WHERE dtconsulta = '$dtconsulta' AND hora_inicio = '$hora_inicio' AND disponivel = 1";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $sql = "UPDATE horario SET disponivel = 2 WHERE dtconsulta = '$dtconsulta' AND hora_inicio = '$hora_inicio';";
                echo"$sql  ";
            }
            if (mysqli_num_rows($result) > 0) {
                // Horário está disponível
                $dtconsulta = $_POST["dtconsulta"];
                $hora_inicio = $_POST["hora_inicio"];
                echo "Horário disponível. Pode agendar a consulta.";
            } else {
                // Horário já está ocupado
                echo "Horário já está ocupado. Por favor, selecione outro horário.";
            }
        }
      ?>
      </center>
        </div>
      </div>
    </div>

    <div class="verticalDiv"></div>
  </div>
  <div class="horizontalDiv"></div>
  <div class="horizontalDiv"></div>
  <iframe src="../footer.html" class="rodape"></iframe>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
    crossorigin="anonymous"></script>
    <script src="../scripts/animacoes.js"></script>
    <script src="../scripts/responsividade.js"></script>
</body>

</html>