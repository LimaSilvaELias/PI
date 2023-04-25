<?php 
session_start();
include_once('../login/conexao.php');

//CONVERTENDO OS CAMPOS PARA O BD PHP
$nome   = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$cpf    = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_NUMBER_INT);
$datanascimento = filter_input(INPUT_POST,'datanascimento', FILTER_SANITIZE_NUMBER_INT);

$cpf = $_POST['cpf'];
	// Verifica se um número foi informado
	if(empty($cpf)) {
		return false;
	}

	// Elimina possivel mascara
	$cpf = preg_replace("/[^0-9]/", "", $cpf);
	$cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
	
	// Verifica se o numero de digitos informados é igual a 11 
	if (strlen($cpf) != 11) {
		$_SESSION['msg']="<h2><p style='color: red;'>CPF INVÁLIDO, DIGITE OS 11 NÚMEROS DO CPF!</p></h2";
	}
	// Verifica se nenhuma das sequências invalidas abaixo 
	// foi digitada. Caso afirmativo, retorna falso
	else if ($cpf == '00000000000' || 
		$cpf == '11111111111' || 
		$cpf == '22222222222' || 
		$cpf == '33333333333' || 
		$cpf == '44444444444' || 
		$cpf == '55555555555' || 
		$cpf == '66666666666' || 
		$cpf == '77777777777' || 
		$cpf == '88888888888' || 
		$cpf == '99999999999') {
            $_SESSION['msg']="<h2><p style='color: red;'>CPF INVÁLIDO, DIGITE O CPF CORRETAMENTE!</p></h2";
	 // Calcula os digitos verificadores para verificar se o
	 // CPF é válido
	 } else {   
$number_quantity_to_loop = [9, 10];

foreach ($number_quantity_to_loop as $item) {

    $sum = 0;
    $number_to_multiplicate = $item + 1;
  
    for ($index = 0; $index < $item; $index++) {

        $sum += $cpf[$index] * ($number_to_multiplicate--);
  
    }

    $result = (($sum * 10) % 11);

}
if ($cpf[$item] != $result) {
	$_SESSION['msg']="<h2><p style='color: red;'>CPF INVÁLIDO, DIGITE UM CPF VÁLIDO!</p></h2";
}else{
 $result_cliente = "INSERT INTO consulta(nome, email, cpf, datanascimento) VALUES('$nome','$email','$cpf','$datanascimento');";
        $resultado = mysqli_query($conn, $result_cliente);
    
        if($conn->affected_rows == 1){
            $_SESSION['msg']="<h2><p style='color: green;'>Consulta Agendada Com Sucesso!</p></h2>";
			
        }else{
            $_SESSION['msg']="<h2><p style='color: red;'>Erro ao Agendar Consulta!</p></h2";
        }
        }
    }
	header("location: agendar.php");
?>
