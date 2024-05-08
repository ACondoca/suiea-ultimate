<?php
    // Inicialize a sessão
    session_start();

    // Verifique se o usuário está logado, se não, redirecione-o para uma página de login
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: ../auth/login.php");
        exit;
    }

    
?>