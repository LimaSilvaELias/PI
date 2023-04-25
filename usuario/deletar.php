<?php
include_once('../login/conexao.php');
require("../login/validarsessao.php");

$id = $_GET['id'];
$deletar = "DELETE FROM consulta WHERE codigo = $id";
$resultado = mysqli_query($conn, $deletar);


if ($resultado) {
  header('Location: perfil.php');
} else {
  echo "Erro: verifique sua conexão e tente novamente.";
}

mysqli_close($conn);
?>
