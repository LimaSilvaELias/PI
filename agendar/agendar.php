<?php  
include_once('../login/conexao.php');
require("../login/validarsessao.php");

$token= $_SESSION['token'];
$cpf= $_SESSION['cpf'];
$pontuacao_cpf = substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>JavaMIX - Agendar</title>
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
      <div class="bodydiv">
        <div class="horizontalDiv"></div>
        <div class="card-group container-fluid text-dark">
          <div class="card animecards">
            <img src="https://img.cancaonova.com/cnimages/canais/uploads/sites/6/2015/10/formacao_a_medicina_e-_a-_profissao_com_-o_-dom_-de_-salvar_-vidas.jpg" class="card-img-top img16_9" alt="...">
            <div class="card-body">
              <h5 class="card-title">Agende Sua Consulta</h5>
              <p class="card-text">Preencha os campos para agendar a sua consulta conosco de forma rápida e fácil.</p>
            </div>
          </div>
          <div class="card animecards">
            <img src="https://www.medcentersauderio.com.br/images/Blog/clinico-geral.jpg" class="card-img-top img16_9" alt="...">
            <div class="card-body">
              <h5 class="card-title">Benefícios</h5>
              <p class="card-text">Agilidade no agendamento de consultas.
              Agende sua consulta em qualquer hora e lugar.
              Economize tempo!
              </p>
            </div>
          </div>
          <div class="card animecards">
            <img src="https://blog.estacio.br/wp-content/uploads/2020/02/medicina.jpg" class="card-img-top img16_9" alt="...">
            <div class="card-body">
              <h5 class="card-title">Equipe</h5>
              <p class="card-text">Profissionais atenciosos e 100% qualificados para o seu atendimento!</p>
            </div>
          </div>
        </div>   
        <div class="horizontalDiv"></div>
      </div>
      <br><br><br>
      <div class="bodydiv">
        <br>
        <div class="text-center divstyle">
          <img src="../Img/logobranca.png" width="50px">
          <h2>Agende sua Consulta</h2>
        </div>
        <br><br>
         <form method="POST" action="inserir_agendamento.php" name="">
         <?php 
         if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
         }   
         ?>
        <form method="POST" action="agendar.php" name="agendamento">
        <div class="gradeAgendar ">
              <div>
                Nome: <br>
                <input class="divdstyle" type="text" name="nome" maxlength="30" placeholder="Nome e Sobrenome">
              <br>
                E-mail:<br>
                <input class="divdstyle"type="mail" name="email" maxlength="40" placeholder="usuario@email.com">
              </div>
             <div>
                CPF:<br>
                <input class="divdstyle"type="text" name="cpf" maxlength="14" placeholder="000.000.000-00">
              <br>
                Data de Nascimento:<br>
                <span class="calendar"> <input type="date" id="datanascimento" name="datanascimento" ></span>
              </div>
              <div>
                <label for="hora_inicio">Horário da Consulta:</label><br>
                <select class="divdstyle"name="hora_inicio" required>
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
                </select><br>
              Data da Consulta:
              <br>
              <div class="calendar">
                <span class="calendar"> <input type="date" id="dtconsulta" name="dtconsulta" ></span>
              </div>
              </div>
                <br><br>

          </div>       
          <center>
            <input class="submit" type="submit" name="agendar" value="Agendar">
          </center>
            <br><br>
          </form>
        </form>




      <center>
          

      <?php   
        // Verifica se o formulário foi enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          // Recupera as informações do formulário
          $nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
          $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
          $cpf = filter_var($_POST['cpf'], FILTER_SANITIZE_STRING);
          $cpf_sem_pontuacao = str_replace(array('.', '-'), '', $cpf);
          $datanascimento = filter_var($_POST['datanascimento'], FILTER_SANITIZE_STRING);

          $dtconsulta = filter_var($_POST["dtconsulta"], FILTER_SANITIZE_STRING);
          $hora_inicio = filter_var($_POST["hora_inicio"], FILTER_SANITIZE_STRING);
          $datahora=$dtconsulta." ".$hora_inicio;

          
          // Verifica se o horário está disponível
          $sql = "SELECT * FROM horario WHERE dtconsulta = '$dtconsulta' AND hora_inicio = '$hora_inicio' AND disponivel = 1";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
              // Horário está disponível, atualiza a disponibilidade
              $sql = "UPDATE horario SET disponivel = 2 WHERE dtconsulta = '$dtconsulta' AND hora_inicio = '$hora_inicio';";
              mysqli_query($conn, $sql);
              
              $consulta = "INSERT INTO consulta (nome, email, cpf, datanascimento,dataconsulta,token) VALUES ('$nome', '$email','$cpf_sem_pontuacao','$datanascimento','$datahora','$token')";
              mysqli_query($conn, $consulta);

              echo "Consulta marcada com sucesso.";

          } else {
              // Horário já está ocupado
              echo "Horário já está ocupado. Por favor, selecione outro horário.";

            }
      }      
      
      ?>
      </center>
        
      </div>
    </div>

    <div class="verticalDiv"></div>
  </div>
  
  <div class="horizontalDiv"></div>
  <div class="horizontalDiv"></div>
  <iframe src="../footer.html" class="rodape"></iframe>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>      
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