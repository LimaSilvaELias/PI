<?php 
session_start();
include_once('../login/conexao.php');
require("../login/validarsessao.php");
$token= $_SESSION['token'];
$cpf= $_SESSION['cpf'];

//CONVERTENDO OS CAMPOS PARA O BD PHP
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

	//=============================================================================================
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cpf = $_POST["cpf"];
    if (validaCPF($cpf)) {
		echo "<p>ok.</p>";
    } else {
        $_SESSION['msg']="<h2><p style='color: lightred;'>O CPF $cpf é inválido</p></h2>";
		header("location: agendar.php");
        exit();
    }
	};
	//=============================================================================================
	// Verifica se o horário está disponível
	$sql = "SELECT * FROM horario WHERE dtconsulta = '$dtconsulta' AND hora_inicio = '$hora_inicio' AND disponivel = 1";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		// Horário está disponível, atualiza a disponibilidade
		$sql = "UPDATE horario SET disponivel = 2 WHERE dtconsulta = '$dtconsulta' AND hora_inicio = '$hora_inicio';";
		mysqli_query($conn, $sql);
		
		$consulta = "INSERT INTO consulta (nome, email, cpf, datanascimento,dataconsulta,token) VALUES ('$nome', '$email','$cpf_sem_pontuacao','$datanascimento','$datahora','$token')";
		mysqli_query($conn, $consulta);

		$_SESSION['msg']="<h2><p style='color: lightgreen;'>Consulta marcada com sucesso</p></h2>";

	} else {
		// Horário já está ocupado
		$_SESSION['msg']="<h2><p style='color: lightred;'>Horário já está ocupado. Por favor, selecione outro horário</p></h2>";
		header("location: agendar.php");
        exit();
	  }
};
	
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
	mysqli_close($conn);
	header("location: agendar.php");
	exit();
?>
