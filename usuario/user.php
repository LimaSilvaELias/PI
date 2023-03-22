<?php


// Conectar-se ao banco de dados
$conexao = mysqli_connect("localhost", "usuario", "senha", "nome_do_banco");

// Selecionar o registro que contém a imagem que você deseja exibir
$resultado = mysqli_query($conexao, "SELECT imagem FROM tabela WHERE id = 1");

// Recuperar a imagem do registro selecionado
$linha = mysqli_fetch_array($resultado);
$imagem = $linha['imagem'];

// Exibir a imagem na página
echo "<img src='data:image/jpeg;base64," . base64_encode($imagem) . "'>";


?>