<?php
require_once('../../database.php');
if (isset($_POST) & !empty($_POST)) {
  $cidades['nome'] = $database->sanitize($_POST['nome']);
  $cidades['abreviatura'] = $database->sanitize($_POST['abreviatura']);
  $cidades['id_estado'] = $database->sanitize($_POST['id_estado']);

  //Chave estrangeira

  $result = $database->read('tb_estados');
  while($dados = mysqli_fetch_assoc($result)) {

  }


  $res = $database->create('tb_cidades', $cidades);
  if ($res) {
    header('location: index.php');
    //echo "Successfully inserted data";
  } else {
    echo "failed to insert data";
  }
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
      <br />
      <hr />
      <h1 class="text-center">Cadastrar nova Cidade</h1>
      <hr />
      <!-- iniciando o formulário -->
      <form action="create_cidade.php" id="formCadastroCidade" method="post" class="needs-validation" novalidate>
        <div class="container">
          <div class="col-md-12">
            <div class="form-row justify-content-center align-items-center">
              <div class="form-group col-md-4">
                <label for="inputNome">Nome</label>
                <input type="text" class="form-control" id="inputNome" name="nome" required>
                <div class="valid-tooltip">
                  Looks good!
                </div>
              </div>
              <div class="form-group col-md-2">
                <label for="inputAbreviatura">Abreviatura</label>
                <input type="text" class="form-control" id="inputAbreviatura" name="abreviatura">
              </div>
            </div>
          </div>
          <div class="container">
          <div class="col-md-12">
          <div class="form-row justify-content-center align-items-center">
              <div class="form-group col-md-4">
              <!-- Metodo para mostrar chave estrangeira -->
              <select name="id_estado">  
                <option value="Selecione" selected>Selecione</option>
                <?php
                  //Chave estrangeira
                $result = $database->read('tb_estados');
                while($dados = mysqli_fetch_assoc($result)) {
                ?>
                <option value="<?php echo $dados['id'] ?>">
                  <?php echo $dados['nome'] ?>
                </option>
                <?php
                }
                ?>
              </select>
              <!-- FIM METODO -->
                <div class="valid-tooltip">
                  Looks good!
                </div>
              </div>
            </div>
          </div>
          <hr />
          <div class="row">
            <div class="col-md-12" style="text-align:right;">
              <a href="index.php" class="btn btn-secondary">Voltar</a>
              <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
          </div>
        </div>
      </form>
      <!-- finalizando o formulário -->
      <hr />
      <br />
    </main>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>



</html>