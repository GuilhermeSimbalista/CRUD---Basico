<?php
require_once('../../database.php');
$clientes = $database->read('tb_clientes');
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
      <div class="row">
        <div class="col-sm-6">
          <h2>Clientes</h2>
        </div>
        <div class="col-sm-6 text-right h2">
          <a class="btn btn-info" href="create_cliente.php"><i class="fa fa-plus"></i>Novo Cliente</a>
          <a class="btn btn-secondary" href="index.php"><i class="fa fa-refresh"></i>Atualizar</a>
        </div>
      </div>
      <br />
      <table class="table table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Data de Nascimento</th>
            <th>Genero</th>
            <th>Estado Civil</th>
            <th>Telefone</th>
            <th>Celular</th>
            <th>Email</th>
            <th>Rua</th>
            <th>Numero</th>
            <th>Complemento</th>
            <th>Bairro</th>
            <th>CEP</th>
            <th>id Cidade</th>
            <th>id Estado</th>
            <th style="text-align:center">Opções</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($clientes) : ?>
            <?php foreach ($clientes as $cliente) : ?>
              <tr>
                <td><?php echo $cliente['id'] ?></td>
                <td><?php echo $cliente['nome'] ?></td>
                <td><?php echo $cliente['nascimento'] ?></td>
                <td><?php echo $cliente['genero'] ?></td>
                <td><?php echo $cliente['estadocivil'] ?></td>
                <td><?php echo $cliente['fone'] ?></td>
                <td><?php echo $cliente['cel'] ?></td>
                <td><?php echo $cliente['email'] ?></td>
                <td><?php echo $cliente['rua'] ?></td>
                <td><?php echo $cliente['num'] ?></td>
                <td><?php echo $cliente['comp'] ?></td>
                <td><?php echo $cliente['bairro'] ?></td>
                <td><?php echo $cliente['cep'] ?></td>
                <td><?php echo $cliente['id_cidade'] ?></td>
                <td><?php echo $cliente['id_uf'] ?></td>

                <td class="actions">
                  <a href="read_cliente.php?id=<?php echo $cliente['id']; ?>" class="btn btn-sm btn-success">Visualizar</a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else : ?>
            <tr>
              <td colspan="4">Nenhum registro encontrado!</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
      <hr />
    </main>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>