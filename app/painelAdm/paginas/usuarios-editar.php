<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Editar Usuários</h1>
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
                        <form action="?pg=usuarios-novo" method="POST">
                            <div class="form-group">
                                <label for="usuario"> Nome de usuário</label>
                                <input type="text" name="nome" class="form-control" autofocus id="usuario" placeholder="Digite seu nome de usuário">
                            </div>
                            <div class="form-group">
                                <label for="usuario"> Senha</label>
                                <input type="password" class="form-control" name="senha" id="password" placeholder="Digite sua senha">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-lg" value="Atualizar">
                                <a href="?pg=usuarios-listar" type="submit" class="btn btn-danger btn-lg" id="usuario"> Voltar</a>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</div>