<?php
function VerificaSeLogado()
{
    $usuario = 'admin';
    $senha = '123456';

    if ($_POST['usuario'] == $usuario) {
        echo 'igual';
    } else {
        echo 'Usuário e senha não existe';
    }
}
