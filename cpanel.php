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
            include_once "app/painelAdm/index.php";
            break;

        case 'sair':

            break;

        default:
            include_once "app/painelAdm/index.php";
            break;
    }
} else {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (VerificaSeLogado()) {
            include_once "app/painelAdm/paginas/login.php";
        }


    } else {
       include_once "app/painelAdm/paginas/login.php" ;
    }
}     





















//$paginas = isset($_GET['pg']);
// verificando session usuario
// if (!isset($_SESSION['usuario'])) {
//     $usuario = 'jonas@gmail.com';
//     $senha = '123456';
//     // iniciando session
//     session_start();
//     $_SESSION['usuario'] = $usuario ;
//     $_SESSION['senha'] = $senha ;

//     switch ($_GET['pg']) {
//         case 'cpanel':
//             include_once "app/painelAdm/index.php";
//             break;

//         case 'login':
//             include_once "app/painelAdm/index.php";
//             break;

//         default:
//             break;
//     }
// } else {
//     include_once "app/site/paginas/inicial.php";
// };
