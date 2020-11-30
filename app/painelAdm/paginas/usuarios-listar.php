<?php
$resultDados = new Conexao();
$dados = $resultDados->consultarBanco('SELECT * FROM usuarios ');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Lista De Usuários</h1>
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
                <div class="row py-12">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Escolha um arquivo para fazer a edição</h3>
                                <br>
                                <a href="?pg=usuarios-form" class="btn btn-primary"><span class="fa fa-user-plus"> Novo usuário</span></a>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nome</th>
                                            <th>Assunto</th>
                                            <th>Menssagem</th>
                                            <th>O que deseja fazer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($dados as $DadosUsuarios) { ?>
                                            <tr>
                                                <td><?php echo $DadosUsuarios['id_usuario'] ?></td>
                                                <td><?php echo $DadosUsuarios['nome'] ?></td>
                                                <td><?php echo $DadosUsuarios['dataCriacao'] ?></td>
                                                <td><?php echo $DadosUsuarios['dataAtualizacao'] ?></td>

                                                <td class="text-center">
                                                    <a href="?pg=usuarios-visualizar&id=<?php echo $DadosUsuarios['id_usuario'] ?>" class="btn btn-success"><span class="fas fa-eye" class="regi-eye"></span></a>
                                                    <a href="?pg=usuarios-editar&id=<?php echo $DadosUsuarios['id_usuario'] ?>" class="btn btn-warning"><span class="fas fa-pen" class="regi-eye"></span></a>
                                                    <a href="?pg=usuario-apagar&id=<?php echo $DadosUsuarios['id_usuario'] ?>" class="btn btn-danger"><span class="fas fa-trash" class="regi-eye"></span></a>

                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</div>