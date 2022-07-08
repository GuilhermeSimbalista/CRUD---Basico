<?php
require_once('../../database.php');
if (isset($_POST) & !empty($_POST)) {
  $funcionarios['nome'] = $database->sanitize($_POST['nome']);
  $funcionarios['nascimento'] = $database->sanitize($_POST['nascimento']);
  $funcionarios['genero'] = $database->sanitize($_POST['genero']);
  $funcionarios['estado_civil'] = $database->sanitize($_POST['estado_civil']);
  $funcionarios['celular'] = $database->sanitize($_POST['celular']);
  $funcionarios['email'] = $database->sanitize($_POST['email']);
  $funcionarios['dataadmissao'] = $database->sanitize($_POST['dataadmissao']);
  $funcionarios['cargo'] = $database->sanitize($_POST['cargo']);
  $funcionarios['salario'] = $database->sanitize($_POST['salario']);
  $funcionarios['id_cidade'] = $database->sanitize($_POST['id_cidade']);
  $funcionarios['id_uf'] = $database->sanitize($_POST['id_uf']);


  $res = $database->create('tb_funcionarios', $funcionarios);
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
      <h1 class="text-center">Cadastrar novo Funcionario</h1>
      <hr />
      <!-- iniciando o formulário -->
      <form action="create_funcionario.php" id="formCadastroFuncionario" method="post" class="needs-validation" novalidate>
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
                <label for="inputNascimento">Data de Nascimento</label>
                <input type="text" class="form-control" id="inputNascimento" name="nascimento">
              </div>
            </div>
            <div class="form-row justify-content-center align-items-center">
              <div class="form-group col-md-1.2">
                <label for="inputGenero">Genero(M / F)</label>
                <input type="text" class="form-control" id="inputGenero" name="genero">
                </div>
            </div>
            <div class="form-row justify-content-center align-items-center">
            <div class="form-group col-md-3">
                <label for="inputEstadoCivil">Estado Civil</label>
                <input type="text" class="form-control" id="inputEstadoCivil" name="estado_civil">
                </div>
            </div>
            <div class="form-row justify-content-center align-items-center">
            <div class="form-group col-md-2">
                <label for="inputCel">Celular</label>
                <input type="text" class="form-control" id="inputCel" name="celular">
                </div>
            </div>
            <div class="form-row justify-content-center align-items-center">
            <div class="form-group col-md-4">
                <label for="inputEmail">Email</label>
                <input type="text" class="form-control" id="inputEmail" name="email">
                </div>
            </div>
            <div class="form-row justify-content-center align-items-center">
            <div class="form-group col-md-3">
                <label for="inputDataadmissao">Data de Admissão</label>
                <input type="text" class="form-control" id="inputDataadmissao" name="dataadmissao">
                </div>
            </div>
            <div class="form-row justify-content-center align-items-center">
            <div class="form-group col-md-2">
                <label for="inputCargo">Cargo</label>
                <input type="text" class="form-control" id="inputCargo" name="cargo">
                </div>
            </div>
            <div class="form-row justify-content-center align-items-center">
            <div class="form-group col-md-3">
                <label for="inputSalario">Salario</label>
                <input type="text" class="form-control" id="inputSalario" name="salario">
                </div>
            </div>
          </div>
          <div class="container">
          <div class="col-md-12">
          <div class="form-row justify-content-center align-items-center">
              <div class="form-group col-md-4">
              <!-- Metodo para mostrar chave estrangeira -->
              <select name="id_cidade">  
                <option value="Selecione" selected>Selecione</option>
                <?php
                  //Chave estrangeira
                $result = $database->read('tb_cidades');
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
              <div class="container">
          <div class="col-md-12">
          <div class="form-row justify-content-center align-items-center">
              <div class="form-group col-md-3">
              <!-- Metodo para mostrar chave estrangeira -->
              <select name="id_uf">  
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