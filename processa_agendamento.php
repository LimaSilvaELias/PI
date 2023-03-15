<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/divisoes.css">
</head>
<body>
    <form method="POST" action="processa_agendamento.php">
        <label for="dtconsulta">dtconsulta:</label>
        <div class="calendar">
            <span class="calendar-icon"> <input type="date" id="data" name="dtconsulta" ></span>
        </div>
        <!-- <input type="date" id="data" name="dtconsulta" readonly value=""> -->

        <label for="hora_inicio">Horário:</label>
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
    
        <button type="submit">Agendar Consulta</button>
    </form>
    <?php
        session_start();

        // $dtconsulta = filter_input(INPUT_POST, 'dtconsulta', FILTER_SANITIZE_STRING); 
        // $hora_inicio   = filter_input(INPUT_POST, 'hora_inicio', FILTER_SANITIZE_STRING);
        // $disponivel   = filter_input(INPUT_POST, 'disponivel', FILTER_SANITIZE_STRING);
        // Conexão com o banco de dados MySQL
        $host = "localhost";
        $user = "root";
        $pass = "";
        $dbname = "bd16";

        $conn = mysqli_connect($host, $user, $pass, $dbname);

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

</body>
</html>


<!-- <input type="date" id="data" name="dtconsulta" readonly style="display: none;">
        <button type="button" onclick="mostrarCalendario()">Selecionar Data</button>

<script>
function mostrarCalendario() {
  var campoData = document.getElementById('data');
  if (campoData.style.display === 'none') {
    campoData.style.display = 'block';
    document.getElementById('data').removeAttribute('readonly'); 
  } else {
    campoData.style.display = 'none';
    onblur=function(){ 
        document.getElementById('data').setAttribute('readonly', true); 
    };
  }
}
</script> -->