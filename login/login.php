<?php 
session_start();
include_once('conexao.php');

// Verifique se o formulário de login foi enviado
if(isset($_POST['login'])) {

    // Obtenha o nome de usuário ou e-mail e senha do usuário do formulário de login
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Verifique se o nome de usuário ou e-mail existe no banco de dados
    $consulta = "SELECT * FROM logins WHERE email = '$email'";
    $resultado = mysqli_query($conn, $consulta);

    if (mysqli_num_rows($resultado) > 0) {
        // validação da senha 
        $linha = mysqli_fetch_assoc($resultado);
        if(password_verify($senha, $linha['senha'])) {
            // Se a senha bater com o email será redirecionado para a pag perfil 
            $_SESSION['id'] = $linha['id'];
            $_SESSION['nome'] = $linha['nome'];
            header('Location: perfil.php');
            exit();
        } else {
            echo "Senha incorreta. Tente novamente.";
        }
    } else {
        echo "E-mail não encontrado. Tente novamente.";
    }
}

mysqli_close($conn);
?>

<!-- Código HTML para o formulário de login -->

