<?php
    session_start();
    if(!isset($_SESSION['id_usuario'])) //verifica se a sessão realmente foi iniciada, se não foi iniciada e o usuário tentou acessar pela url
    {
        header("location: index.php"); //se sim, redireciona para a área de login
        exit;
    }
?>

SEJA BEEM VINDO A SUA ÁREA PRIVADA!

<a href="sair.php">Sair</a>