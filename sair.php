<?php
    session_start();
    unset($_SESSION['id_usuario']); //fecha a sessão deste id
    header("location: index.php");  //redireciona para a tela de login

?>