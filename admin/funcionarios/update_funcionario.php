<?php
require_once('../../database.php');
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  if (isset($_POST) & !empty($_POST)) {
    $funcionario['nome'] = $database->sanitize($_POST['nome']);
    $funcionario['nascimento'] = $database->sanitize($_POST['nascimento']);
    $funcionario['genero'] = $database->sanitize($_POST['genero']);
    $funcionario['estado_civil'] = $database->sanitize($_POST['estado_civil']);
    $funcionario['celular'] = $database->sanitize($_POST['celular']);
    $funcionario['email'] = $database->sanitize($_POST['email']);
    $funcionario['dataadmissao'] = $database->sanitize($_POST['dataadmissao']);
    $funcionario['cargo'] = $database->sanitize($_POST['cargo']);
    $funcionario['salario'] = $database->sanitize($_POST['salario']);
    $funcionario['id_cidade'] = $database->sanitize($_POST['id_cidade']);
    $funcionario['id_uf'] = $database->sanitize($_POST['id_uf']);
    
    $res = $database->update('tb_funcionarios', 'id', $id, $funcionario);
    if ($res) {
      header('location: index.php');
    } else {
      echo "failed to insert data";
    }
  } else {
    $funcionario = mysqli_fetch_assoc($database->getRegister('tb_funcionarios', $id));
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
      <h1 class="text-center">Atualizar Funcionario</h1>
      <hr />
      <!-- iniciando o formulário -->
      <form action="update_funcionario.php?id=<?php echo $funcionario['id']; ?>" id="formAlterarCliente" method="post" class="needs-validation" novalidate>
          <div class="container">
          <div class="col-md-12">
            <div class="form-row justify-content-center align-items-center">
              <div class="form-group col-md-4">
                <label for="inputNome">Nome</label>
                <input type="text" class="form-control" id="inputNome" name="nome" value="<?php echo $funcionario['nome']; ?>" required>
                <div class="valid-tooltip">
                  Looks good!
                </div>
              </div>
              <div class="form-group col-md-2">
                <label for="inputNascimento">Data de Nascimento</label>
                <input type="text" class="form-control" id="inputNascimento" name="nascimento" value="<?php echo $funcionario['nascimento']; ?>">
              </div>
            </div>
            <div class="form-row justify-content-center align-items-center">
              <div class="form-group col-md-1.2">
                <label for="inputGenero">Genero(M / F)</label>
                <input type="text" class="form-control" id="inputGenero" name="genero" value="<?php echo $funcionario['genero']; ?>">
                </div>
            </div>
            <div class="form-row justify-content-center align-items-center">
            <div class="form-group col-md-3">
                <label for="inputEstadoCivil">Estado Civil</label>
                <input type="text" class="form-control" id="inputEstadoCivil" name="estado_civil" value="<?php echo $funcionario['estado_civil']; ?>">
                </div>
            </div>
            <div class="form-row justify-content-center align-items-center">
            <div class="form-group col-md-2">
                <label for="inputCel">Celular</label>
                <input type="text" class="form-control" id="inputCel" name="celular" value="<?php echo $funcionario['celular']; ?>">
                </div>
            </div>
            <div class="form-row justify-content-center align-items-center">
            <div class="form-group col-md-4">
                <label for="inputEmail">Email</label>
                <input type="text" class="form-control" id="inputEmail" name="email" value="<?php echo $funcionario['email']; ?>">
                </div>
            </div>
            <div class="form-row justify-content-center align-items-center">
            <div class="form-group col-md-3">
                <label for="inputDataadmissao">Data da Admissão</label>
                <input type="text" class="form-control" id="inputDataadmissao" name="dataadmissao" value="<?php echo $funcionario['dataadmissao']; ?>">
                </div>
            </div>
            <div class="form-row justify-content-center align-items-center">
            <div class="form-group col-md-2">
                <label for="inputCargo">Cargo</label>
                <input type="text" class="form-control" id="inputCargo" name="cargo" value="<?php echo $funcionario['cargo']; ?>">
                </div>
            </div>
            <div class="form-row justify-content-center align-items-center">
            <div class="form-group col-md-3">
                <label for="inputSalario">Salario</label>
                <input type="text" class="form-control" id="inputSalario" name="salario" value="<?php echo $funcionario['salario']; ?>">
                </div>
            </div>
          </div>
          <div class="container">
          <div class="col-md-12">
          <div class="form-row justify-content-center align-items-center">
              <div class="form-group col-md-4">
              <!-- Metodo para mostrar chave estrangeira -->
              <select name="id_cidade">  
                <option value="Selecione"selected>Selecione</option>
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