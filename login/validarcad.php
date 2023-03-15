<?php 
session_start();
include_once('conexao.php');



//CONVERTENDO OS CAMPOS PARA O BD PHP
$nome = $_POST['nome'];
$usuario = $_POST['usuario'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$cpf = $_POST['cpf'];
$cpf_sem_pontuacao = str_replace(array('.', '-'), '', $cpf);

// conectar ao banco de dados usando a função mysqli_connect().

// Verifique se houve algum erro ao se conectar ao banco de dados
if (mysqli_connect_errno()) {
    echo "Erro ao conectar ao banco de dados MySQL: " . mysqli_connect_error();
    exit();
}

// Verifique se o nome de usuário ou o endereço de e-mail já estão sendo usados por outro usuário no banco de dados
$consulta = "SELECT * FROM logins WHERE email = '$email'";
$resultado = mysqli_query($conn, $consulta);

if (mysqli_num_rows($resultado) > 0) {
    echo "O endereço de e-mail já esta em uso. Por favor, escolha outro.";
    exit();
}

// Criptografe a senha usando a função password_hash() e insira os dados do usuário na tabela "logins" do banco de dados
$senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);

$insercao = "INSERT INTO logins (nome, usuario, email, senha, cpf) VALUES ('$nome','$usuario', '$email', '$senha_criptografada','$cpf_sem_pontuacao')";
mysqli_query($conn, $insercao);

mysqli_close($conn);

header('Location: perfil.php');
exit();







?>