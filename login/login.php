<?php 
session_start();
include_once('conexao.php');


// Verifique se o formulário de login foi enviado
if(isset($_POST['login'])) {

    // Obtenha o nome de usuário ou e-mail e senha do usuário do formulário de login
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Verifique se o nome de usuário ou e-mail existe no banco de dados
    $consulta = "SELECT * FROM cliente WHERE email = '$email'";
    $resultado = mysqli_query($conn, $consulta);


    if (mysqli_num_rows($resultado) > 0) {
        // validação da senha 
        $objeto = mysqli_fetch_assoc($resultado);
        if(password_verify($senha, $objeto['senha'])) {
            // Se a senha bater com o email será redirecionado para a pag perfil 
            
            $_SESSION['nome'] = $objeto['nome'];
            $_SESSION['cpf'] = $objeto['cpf'];
            $_SESSION['email'] = $objeto['email'];
            $_SESSION['codigo'] = $objeto['codigo'];
            $_SESSION['token'] = $objeto['token'];

            
            header('Location: ../usuario/perfil.php');
            exit();
        } else {
            //echo "Senha incorreta. Tente novamente.";
            $_SESSION['msg']="<h2><p style='color: red;'>Senha incorreta. Tente novamente.</p></h2";
            header('Location: ../login/cad.php');
        }
    } else {
        //echo "E-mail não encontrado. Tente novamente.";
        $_SESSION['msg']="<h2><p style='color: red;'>E-mail não encontrado. Tente novamente.</p></h2";
        header('Location: ../login/cad.php');
    }
}

mysqli_close($conn);

?>

<!-- Código HTML para o formulário de login -->

