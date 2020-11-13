<?php
// Header
//include_once "app/site/paginas/includes/header.php";

// Navegação 
//include_once "app/site/paginas/includes/navegacao.php";

$paginas = isset($_GET['pg']);
// verificando session usuario
if (!isset($_SESSION['usuario'])) {
    $usuario = 'jonas@gmail.com';
    $senha = '123456';
    // iniciando session
    session_start();
    $_SESSION['usuario'] = $usuario ;
    $_SESSION['senha'] = $senha ;

    switch ($_GET['pg']) {
        case 'cpanel':
            include_once "app/painelAdm/index.php";
            break;

        case 'login':
            include_once "app/painelAdm/index.php";
            break;

        default:
            break;
    }
} else {
    include_once "app/painelAdm/paginas/login.php";
};
