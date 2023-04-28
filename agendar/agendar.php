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

<body class="bg">

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
         <center>
         <?php 
         if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
         }   
         ?>
         </center>
         <form method="POST" action="inserir_agendamento.php" name="">
        
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
                <input class="divdstyle"type="text" name="cpf" maxlength="14" placeholder="000.000.000-00 " required oninput="this.value = formatarCPF(this.value)">
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
     
      </div>
    </div>

    <div class="verticalDiv"></div>
  </div>
  
  <div class="horizontalDiv"></div>
  <div class="horizontalDiv"></div>
  <iframe src="../footer.html" class="rodape"></iframe>

  <script>
		function formatarCPF(cpf) {
			cpf = cpf.replace(/\D/g, ''); // remove todos os caracteres não numéricos
			cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2'); // insere um ponto após os primeiros 3 dígitos
			cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2'); // insere outro ponto após os próximos 3 dígitos
			cpf = cpf.replace(/(\d{3})(\d{1,2})$/, '$1-$2'); // insere um traço antes dos últimos 2 dígitos
			return cpf;
		}
	</script>
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