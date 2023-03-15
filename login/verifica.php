<?php
require_once('vendor/autoload.php');


$mysqli = new mysqli('localhost', 'root', '', 'logins');
if ($mysqli->connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  exit();
}

$client = new Google_Client(['client_id' => 'seu_id_do_cliente']);
$id_token = $_POST['idtoken'];
try {
  $payload = $client->verifyIdToken($id_token);
  if ($payload) {
    $user_id = $payload['sub'];
    // Verifique se o ID do usuário recebido do token é um ID válido no seu sistema
    // Se for válido, faça o login do usuário e redirecione para a página de perfil
    // Se não for válido, exiba uma mensagem de erro e redirecione para a página de login
  } else {
    http_response_code(400);
    echo 'Erro na validação do token do Google';
  }
} catch (Exception $e) {
  http_response_code(400);
  echo 'Erro na validação do token do Google: ' . $e->getMessage();
}

?>
