<?php
include_once 'app/painelAdm/helpers/conexao.php';
/* futuramente vira do banco de dados
verificar se existe um usuario no bando 
SIM= adiciona os valores e inicia a sessao
NÃo= Usuario e senha não confere*/

function VerificaSeLogado()
{
    $usuario = $_POST['usuario'];
    // criar link conexao
    $resultConexao = new conexao();

    $parametros = array(
        ':usuario' => $usuario
    );

    $resultadoConsulta = $resultConexao->consultarBanco('SELECT * FROM usuarios WHERE nome = :usuario', $parametros);


    if (count($resultadoConsulta)) {
        //adiciona sessão 

        $_SESSION['usuario'] = $usuario;
        return true;
    } else {
        echo 'Usuário e senha não existe';
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
