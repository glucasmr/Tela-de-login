<?php
    session_start();
    if(!isset($_SESSION['id_usuario']))
    {
        header("location: index.php");
        exit;
    }
?>

SEJA BEEM VINDO A SUA ÁREA PRIVADA!

<a href="sair.php">Sair</a>