<?php
$id = isset($_GET['id']);

if ($id) {
    $id = $_GET['id'];
    $parametros = array(
        'id_usuario' => $id
    );
    $resultUsuario = new Conexao();
    $dados = $resultUsuario->consultarBanco('SELECT * FROM usuarios WHERE id_usuario = :id_usuario', $parametros);
} else {
    header("Location: ?pg=usuarios-listar");
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Visualizar Usuários</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid ">
                <div class="row">
                    <div class="col-10">

                        <?php foreach ($dados as $DadosUsuarios) { ?>
                            <form action="?pg=usuarios-novo" method="POST">
                                <div class="jumbotron">
                                    <h4 class="display-3"> Nome de usuário</h4>
                                    <div class="lead">
                                        <h5>Nome:</h5>
                                        <?php echo $DadosUsuarios['nome'] ?>
                                        <h5>Data criação:</h5>
                                        <?php echo $DadosUsuarios['dataCriacao'] ?>
                                        <h5>Data Atualização:</h5>
                                        <?php echo $DadosUsuarios['dataAtualizacao'] ?>
                                    </div>
                                    <div class="form-group"> 
                                        <a href="?pg=usuarios-listar" type="submit" class="btn btn-danger btn-lg"> Voltar</a>
                                    </div>
                                </div>
                            </form>
                        <?php } ?>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</div>