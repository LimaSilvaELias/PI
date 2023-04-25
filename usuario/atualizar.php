<?php

include_once('../login/conexao.php');
require("../login/validarsessao.php");
$id = $_GET['id'];

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_NUMBER_INT);
$datanascimento =  $_POST['datanascimento'];

$atualizar="UPDATE consulta SET nome='$nome',email='$email',cpf='$cpf',datanascimento='$datanascimento' WHERE codigo='$id'";  

$resultado = mysqli_query($conn, $atualizar);
mysqli_close($conn);

header('Location: perfil.php');
exit();



?>