<?php
include_once 'app/painelAdm/helpers/conexao.php';
/* futuramente vira do banco de dados
verificar se existe um usuario no bando 
SIM= adiciona os valores e inicia a sessao
NÃo= Usuario e senha não confere*/

function VerificaSeLogado()
{
    $usuario = trim($_POST['usuario']);
    $senha = trim($_POST['senha']);

    $parametros = array(
        ':usuario' => $usuario
    );
    $resultConexao = new Conexao();
    $resultadoConsulta = $resultConexao->consultarBanco('SELECT * FROM usuarios WHERE nome = :usuario', $parametros);

    if (count($resultadoConsulta) > 0) {
        $senha_bd = $resultadoConsulta[0]['senha'];
        if (password_verify($senha, $senha_bd)) {
            //adiciona session
            $_SESSION['usuario'] = $usuario;
            return true;
        } else {
            echo 'a senha não confere';
            return false;
        }
    } else {
        //usuario e senha não confere
        echo 'usuario e senha não confere';
    }
}


function inserirUsuario()
{

    // pegando as variaveis por post
    $nome = trim($_POST['nome']);
    $senha = trim($_POST['senha']);

    $parametros = array(
        ':nome' => $nome,
        ':senha' => password_hash($senha, PASSWORD_DEFAULT)

    );

    $resultDados = new Conexao();
    $resultDados->intervencaoNoBanco('INSERT INTO usuarios(nome, senha) VALUES (:nome, :senha)', $parametros);
    include_once "app/painelAdm/paginas/usuarios-listar.php";
}
function atualizarUsuario()
{
    //pegando as variaveis via post
    $idUsuario = trim($_POST['id_usuario']);
    $senha = trim($_POST['senha']);

    // echo $idUsuario."|";
    // echo $senha;
    // die();

    //validando as variáveis
    $parametros = array(
        ':id_usuario' => $idUsuario,
        ':senha' => password_hash($senha, PASSWORD_DEFAULT)
    );

    //atualizando no banco
    $atualizarUsuario = new Conexao();
    $atualizarUsuario->intervencaoNoBanco(
        'UPDATE  usuarios SET senha = :senha WHERE id_usuario = :id_usuario', $parametros);

    include_once "app/painelAdm/paginas/usuarios-listar.php";
}

function visualizarUsuario($id)
{
    if ($id) {
        $parametros = array(
            'id_usuario' => $_GET['id']
        );


        $resultUsuarioConsulta = new Conexao();
        $dados = $resultUsuarioConsulta->consultarBanco('SELECT * FROM usuarios WHERE id_usuario = :id_usuario', $parametros);

        if (count($dados) > 0) {

            return $dados;
        } else {
            header('Location: ?pg=usuarios-listar');
        }
    }
}
