<?php
include_once "app/painelAdm/helpers/HelperAdm.php";
session_start();

//variavel 
$pg = 'cpanel';

if (isset($_GET['pg'])) {
    $pg = $_GET['pg'];
}

if (isset($_SESSION['usuario'])) {

    switch ($pg) {
        case 'cpanel':
            include_once "app/painelAdm/paginas/includes/header.php";
            include_once "app/painelAdm/paginas/includes/navegacao.php";
            include_once "app/painelAdm/paginas/inicial.php";
            include_once "app/painelAdm/paginas/includes/rodape.php";
            break;

        case 'sair':
            session_destroy();
            Header('location:' . $_SERVER['PHP_SELF']);

            break;

        default:
            include_once "app/painelAdm/paginas/includes/header.php";
            include_once "app/painelAdm/paginas/includes/navegacao.php";
            include_once "app/painelAdm/paginas/inicial.php";
            include_once "app/painelAdm/paginas/includes/rodape.php";
            break;
    }
} else {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (VerificaSeLogado()) {
            //contruindo a pagina
            include_once "app/painelAdm/paginas/includes/header.php";
            include_once "app/painelAdm/paginas/includes/navegacao.php";
            include_once "app/painelAdm/paginas/inicial.php";
            include_once "app/painelAdm/paginas/includes/rodape.php";
        }
    } else {
        include_once "app/painelAdm/paginas/login.php";
    }
}
