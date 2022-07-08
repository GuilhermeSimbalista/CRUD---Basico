<?php
require_once('../../database.php');
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $estado = mysqli_fetch_assoc($database->getRegister('tb_estados', $id));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LocadoraWeb</title>
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>

<header id="custom-header">
    <nav id="custom-nav" class="custom-container">
        <a class="custom-logo" href="#">Locadora<span>WEB</span> </a>
        <!-- menu -->
        <div class="custom-menu">
        <ul class="custom-grid">
            <li>
            <a href="../../index.php" class="custom-title">Início</a>
            </li>
        </ul>
        </div>
    </nav>
</header>
  <br />
  <hr />

  <div class="container">
    <!-- criando a área central -->
    <main class="container text-center">
      <hr />
      <br />

      <dl class="dl-horizontal">
        <dt>Estado:</dt>
        <dd><?php echo $estado['nome']; ?></dd>
        <dt>Sigla:</dt>
        <dd><?php echo $estado['sigla']; ?></dd>
      </dl>

      <dl class="dl-horizontal">
        <dt>Região:</dt>
        <dd><?php echo $estado['regiao']; ?></dd>
      </dl>

      <div id="actions" class="row">
        <div class="col-md-12">
          <a href="update_estado.php?id=<?php echo $estado['id']; ?>" class="btn btn-primary">Editar</a>
          <a href="index.php" class="btn btn-warning">Voltar</a>
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm">Excluir</button>
                <div class="modal fade" id="confirm" role="dialog">
                <div class="modal-dialog modal-md">
                  <div class="modal-content">
                    <div class="modal-body">
                      <p> Deseja Excluir?</p>
                    </div>
                    <div class="modal-footer">
                  <a href="delete_estado.php?id=<?php echo $estado['id']; ?>" type="button" class="btn btn-danger" id="delete">Apagar Registo</a>
                <button type="button" data-dismiss="modal" class="btn btn-default">Cancelar</button>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
      <hr />
    </main>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>