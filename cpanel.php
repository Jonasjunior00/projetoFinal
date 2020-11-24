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
            include_once "app/painelAdm/paginas/includes/rodape.php";
            break;
        case 'inicial':
            include_once "app/painelAdm/paginas/includes/header.php";
            include_once "app/painelAdm/paginas/includes/navegacao.php";
            include_once "app/painelAdm/paginas/inicial.php";
            include_once "app/painelAdm/paginas/includes/rodape.php";
            break;
        case 'produtos':
            include_once "app/painelAdm/paginas/includes/header.php";
            include_once "app/painelAdm/paginas/includes/navegacao.php";
            include_once "app/painelAdm/paginas/produtos.php";
            include_once "app/painelAdm/paginas/includes/rodape.php";
            break;
        case 'servicos':
            include_once "app/painelAdm/paginas/includes/header.php";
            include_once "app/painelAdm/paginas/includes/navegacao.php";
            include_once "app/painelAdm/paginas/servicos.php";
            include_once "app/painelAdm/paginas/includes/rodape.php";
            break;
        case 'contato':
            include_once "app/painelAdm/paginas/includes/header.php";
            include_once "app/painelAdm/paginas/includes/navegacao.php";
            include_once "app/painelAdm/paginas/contato.php";
            include_once "app/painelAdm/paginas/includes/rodape.php";
            break;


        case 'sair':
            session_destroy();
            Header('location:' . $_SERVER['PHP_SELF']);

            break;

            /*********** crud ***************/

        case 'usuarios-form':
            include_once "app/painelAdm/paginas/includes/header.php";
            include_once "app/painelAdm/paginas/includes/navegacao.php";
            include_once "app/painelAdm/paginas/usuarios-form.php";
            include_once "app/painelAdm/paginas/includes/rodape.php";
            break;


        case 'usuarios-listar':
            include_once "app/painelAdm/paginas/includes/header.php";
            include_once "app/painelAdm/paginas/includes/navegacao.php";
            include_once "app/painelAdm/paginas/usuarios-listar.php";
            include_once "app/painelAdm/paginas/includes/rodape.php";
            break;

        case 'usuarios-novo':
            include_once "app/painelAdm/paginas/includes/header.php";
            include_once "app/painelAdm/paginas/includes/navegacao.php";
            //função criar usuario
            inserirUsuario();
            include_once "app/painelAdm/paginas/usuarios-novo.php";
            include_once "app/painelAdm/paginas/includes/rodape.php";
            break;

        case 'usuarios-visualizar':
            include_once "app/painelAdm/paginas/includes/header.php";
            include_once "app/painelAdm/paginas/includes/navegacao.php";
            include_once "app/painelAdm/paginas/usuarios-visualizar.php";
            include_once "app/painelAdm/paginas/includes/rodape.php";
            break;

        case 'usuarios-editar':
            include_once "app/painelAdm/paginas/includes/header.php";
            include_once "app/painelAdm/paginas/includes/navegacao.php";
            if ($_REQUEST['REQUEST_METHOD'] == 'POST') {
                //função de atualização de usuario
                atualizarUsuario();
                
            } else {
                echo 'mostrar usuário pelo id';
            }

            include_once "app/painelAdm/paginas/usuarios-editar.php";
            include_once "app/painelAdm/paginas/includes/rodape.php";

            break;

        case 'usuario-apagar':

            $parametros = array(
                ':id_usuario' => $_GET['id']
            );
            $apagarUsuario = new Conexao();
            $apagarUsuario->intervencaoNoBanco('DELETE FROM usuarios WHERE id_usuario = :id_usuario', $parametros);

            Header('Location: ?pg=usuarios-listar');
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
