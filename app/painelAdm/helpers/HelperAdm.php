<?php
include_once 'app/painelAdm/helpers/conexao.php';


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
            $erro = 'Usuário e senha invalidos';
            include_once 'app/painelAdm/paginas/login.php';
        }
    } else {
        $erro = 'Usuário e senha invalidos';
        include_once 'app/painelAdm/paginas/login.php';
    }
}


function inserirUsuario()
{
//echo '<pre>';
//print_r($_FILES);
//die();


   // pegando as variaveis por post
    $nome = trim($_POST['nome']);
    $senha = trim($_POST['senha']);

    //pegando a imagem
  //  $img_usuario = $_FILES['img_usuario'];

   move_uploaded_file($_FILES['img_usuario']['tmp_name'],'app/painelAdm/assets/img/' . $_FILES['img_usuario']['name']);
 //die('Upload Finalizado com Sucesso');

    //validando as variáveis e encriptografando a senha
    $parametros = array(
        ':nome' => $nome,
        ':senha' => password_hash($senha, PASSWORD_DEFAULT),
        ':img_usuario' => ($_FILES['img_usuario']['name'] == true) ?
         'app/painemAdmin/assets/img/' . $_FILES['img_usuario']['name'] :
          'app/painelAdmin/assets/img/anonimous.jpg'  

    );

    $resultDados = new Conexao();
    $resultDados->intervencaoNoBanco('INSERT INTO usuarios(nome, senha, img) VALUES (:nome, :senha, :img_usuario)', $parametros);
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
        'UPDATE  usuarios SET senha = :senha WHERE id_usuario = :id_usuario',
        $parametros
    );

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


  //função visualizar mensagem
function visualizarMsg()
{
    
$idcontato = $_GET['id'];

$parametros = array(
    'visualizar' => 1,
    'id_contato' => $idcontato

);
 $resultUsuarioConsulta = new conexao();
 $dados = $resultUsuarioConsulta->intervencaoNoBanco('UPDATE usuarios SET visualizar = :visualizar WHERE id_contato = :id_contato', $parametros );
}


