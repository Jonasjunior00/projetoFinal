<?php

$resultDados = new Conexao();
$dados = $resultDados->consultarBanco('SELECT * FROM contato');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Contatos</h1>
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
                                        <?php foreach ($dados as $Dadosusuarios) { ?>
                                            <tr>
                                                <td><?php echo $Dadosusuarios['id_contato'] ?></td>
                                                <td><?php echo $Dadosusuarios['nome'] ?></td>
                                                <td><?php echo $Dadosusuarios['email'] ?></td>
                                                <td><?php echo $Dadosusuarios['msg'] ?></td>
                                                <td><?php echo $Dadosusuarios['cat'] ?></td>
                                                <td><?php echo $Dadosusuarios['dataCriacao'] ?></td>
                                                <td><?php echo $Dadosusuarios['dataAtualizacao'] ?></td>
                                                <td>
                                                    <a href="?pg=visualizar-contato&id=<?php echo $Dadosusuarios['id_contato'] ?>" class="btn <?php echo ($Dadosusuarios['visualizar'] == 1) ? "btn-warning" : "btn-success"; ?>" type="submit">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="?pg=contato-apagar&id=<?php echo $Dadosusuarios['id_contato'] ?>" class="btn btn-danger" type="submit">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>

                                    </tfoot>
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
    <!-- Main content -->

    <!-- /.Left col -->
    <!-- right col (We are only adding the ID to make the widgets sortable)-->

    <!-- right col -->
</div>
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->