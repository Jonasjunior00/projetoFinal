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

        case 'visualizar-usuarios':
            include_once "app/painelAdm/paginas/includes/header.php";
            include_once "app/painelAdm/paginas/includes/navegacao.php";
            include_once "app/painelAdm/paginas/visualizar-usuarios.php";
            include_once "app/painelAdm/paginas/includes/rodape.php";
            break;
            
        case 'contato':
            include_once "app/painelAdm/paginas/includes/header.php";
            include_once "app/painelAdm/paginas/includes/navegacao.php";
            include_once "app/painelAdm/paginas/contato.php";
            include_once "app/painelAdm/paginas/includes/rodape.php";
            break;

        case 'usuarios-editar':
            include_once "app/painelAdm/paginas/includes/header.php";
            include_once "app/painelAdm/paginas/includes/navegacao.php";

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                //função de atualização de usuario
                atualizarUsuario();
            } else {

                $IdUsuarioEditar = isset($_GET['id']);

                if ($IdUsuarioEditar) {
                    $DadosUsuario = visualizarUsuario($IdUsuarioEditar);
                    include_once "app/painelAdm/paginas/usuarios-editar.php";
                } else {
                    Header('Location: ?pg=usuarios-listar');
                }
            }

            include_once "app/painelAdm/paginas/usuarios-visualizar.php";
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


        case 'visualizar-contato':
            include_once "app/painelAdm/paginas/includes/header.php";
            include_once "app/painelAdm/paginas/includes/navegacao.php";
            include_once "app/painelAdm/paginas/visualizar-contato.php";
            include_once "app/painelAdm/paginas/includes/rodape.php";
            break;

        case 'contato-apagar':
            $parametros = array(
                'id_contato' => $_GET['id']
            );
            $apagarContato = new Conexao();
            $apagarContato->intervencaoNoBanco('DELETE FROM usuarios WHERE id_contato = :id_contato', $parametros);
            header('Location: ?pg=contato');
            break;

        default:
            include_once "app/painelAdm/paginas/includes/header.php";
            include_once "app/painelAdm/paginas/includes/navegacao.php";
            include_once "app/painelAdm/paginas/inicial.php";
            include_once "app/painelAdm/paginas/includes/rodape.php";
            break;
    }
} else {
    $erro;
    // verifica se foi submetido um metodo post
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
