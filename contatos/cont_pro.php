<?php
session_start();
include_once("../login/conexao.php");

$nome = filter_input(INPUT_POST,'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST,'email', FILTER_SANITIZE_STRING);
$mensagem= filter_input(INPUT_POST,'mensagem', FILTER_SANITIZE_STRING);

$result_contato = "INSERT INTO contato(nome, email, mensagem)
 VALUES('$nome', '$email', '$mensagem')";
$resultado = mysqli_query($conn, $result_contato);

if ($conn->affected_rows == 1) {
    $_SESSION['msg'] = "<h2><p style='color: green;'>Mensagem Enviada</p></h2>";
    
} else {
    $_SESSION['msg'] = "<h2><p style='color:red';>Mensagem Não Enviada, Verifique se todos os campos foram preenchidos correntamente!</p></h2>";
}
header("Location:contatos.html"); 
?>