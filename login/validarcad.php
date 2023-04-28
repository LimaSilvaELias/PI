<?php 
session_start();
include_once('conexao.php');



//CONVERTENDO OS CAMPOS PARA O BD PHP
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_NUMBER_INT);
$cpf_sem_pontuacao = str_replace(array('.', '-'), '', $cpf);

// conectar ao banco de dados usando a função mysqli_connect().

// Verifique se houve algum erro ao se conectar ao banco de dados
if (mysqli_connect_errno()) {
    echo "Erro ao conectar ao banco de dados MySQL: " . mysqli_connect_error();
    exit();
}

// Verifique se o nome de usuário ou o endereço de e-mail já estão sendo usados por outro usuário no banco de dados
$consulta = "SELECT * FROM cliente WHERE email = '$email'";
$resultado = mysqli_query($conn, $consulta);

if (mysqli_num_rows($resultado) > 0) {
    //echo "O endereço de e-mail já esta em uso. Por favor entre ou escolha outro.";
    $_SESSION['msg']="<h2><p style='color: red;'>Endereço de e-mail já cadastrado.</p></h2";
    header('Location: ../login/cad.php');
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cpf = $_POST["cpf"];
    if (validaCPF($cpf)) {
		echo "<p>ok.</p>";
    } else {
        $_SESSION['msg']="<h2><p style='color: lightred;'>O CPF $cpf é inválido</p></h2>";
		header("location: cad.php");
        exit();
    }
}
//=============================================================================================
function validaCPF($cpf) {
    $cpf = preg_replace('/[^0-9]/', '', $cpf);
    if (strlen($cpf) != 11) {
      return false;
    }
    $sum = 0;
    for ($i = 0; $i < 9; $i++) {
      $sum += (int) $cpf[$i] * (10 - $i);
    }
    $digit = ($sum % 11) < 2 ? 0 : 11 - ($sum % 11);
    if ($digit != (int) $cpf[9]) {
      return false;
    }
    $sum = 0;
    for ($i = 0; $i < 10; $i++) {
      $sum += (int) $cpf[$i] * (11 - $i);
    }
    $digit = ($sum % 11) < 2 ? 0 : 11 - ($sum % 11);
    if ($digit != (int) $cpf[10]) {
      return false;
    }
    return true;
  }
//=============================================================================================

$token = hash('sha256',$email);


// Criptografe a senha usando a função password_hash() e insira os dados do usuário na tabela "cliente" do banco de dados
$senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);

$insercao = "INSERT INTO cliente (nome, email, senha, cpf, token) VALUES ('$nome', '$email', '$senha_criptografada','$cpf_sem_pontuacao','$token')";
mysqli_query($conn, $insercao);

mysqli_close($conn);

header('Location: ../usuario/perfil.php');
exit();







?>