<?php
$id = isset($_GET['id']);

if ($id) {
  $id = $_GET['id'];

  $parametros = array(
    ':id_contato' => $id
  );

  $resultUsuario = new Conexao();

  $dados = $resultUsuario->consultarBanco(
    'SELECT * FROM contato WHERE id_contato = :id_contato',
    $parametros
  );

  visualizarMsg();

} else {
  header("Location: ?pg=servicos");
}


?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">visualizar Usuários</h1>
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
      <div class="container-fluid">
        <div class="row">
          <div class="col-6">
            <?php foreach ($dados as $dadosUsuarios) { ?>
              <form action="?pg=contato-novo" method="POST">
                <div class="jumbotron">
                  <h4>Dados do Usuário:</h4>
                  <div class="lead">
                    <h5>Nome:</h5>
                    <?php echo $dadosUsuarios['nome'] ?>
                    <h5>E-mail:</h5>
                    <?php echo $dadosUsuarios['email'] ?>
                    <h5>Mensagem:</h5>
                    <?php echo $dadosUsuarios['msg'] ?>
                    <h5>Visualizar:</h5>
                    <?php echo $dadosUsuarios['cat'] ?>
                    <h5>Data Criação:</h5>
                    <?php echo $dadosUsuarios['dataCriacao'] ?>
                    <h5>Data Atualização:</h5>
                    <?php echo $dadosUsuarios['dataAtualizacao'] ?>
                  </div>
                </div>
                <div class="form-group">
                  <a href="?pg=servicos" class="btn btn-info">Voltar</a>
                </div>
              </form>
            <?php } ?>
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