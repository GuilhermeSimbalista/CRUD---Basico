<?php

// criando a classe 'Database'
class Database
{
    private $lastInsertID;
    private $connection;

/**
   * criando o construtor da classe Database
   */
    function __construct()
{
    $this->connect_db();
}


    public function connect_db()
{
    // atribuindo os parâmetros de conexão ao 
    // atributo 'connection' da classe 'Database'
    $this->connection = mysqli_connect(
    'localhost',
    'root',
    'root1234',
    'db_locadoraweb'
    );
    // testando se ocorreu um erro na conexão
    if (mysqli_connect_error()) {
    die("Falha na conexão com o banco! "
        . mysqli_connect_error()
        . mysqli_connect_errno());
    }
}

/**
   * criando a função padrão para executar as inserções
   * no banco de dados
**/

    public function create_agenda($servico, $data, $hora, $cliente, $animal, $tipoAnimal)
{
    $sql = "INSERT INTO tb_agenda (id_servico,data,hora,cliente,nome_animal,tipo_animal) values ('$servico','$data','$hora','$cliente','$animal','$tipoAnimal');";
    $res = mysqli_query($this->connection, $sql);
    //var_dump($res);
    if ($res) {
        return true;
    } else {
        return false;
    }
}

/**
   * criando a função padrão para executar as consultas
   * no banco de dados
   */
public function read($table)
{
    $sql = "SELECT * FROM $table;";
    $res = mysqli_query($this->connection, $sql);
    return $res;
}

/**
   * criando a função padrão para executar as recuperar
   * um registro no banco de dados
   */
    public function getRegister($table, $id = null)
{
    $sql = "SELECT * FROM $table WHERE id = $id;";
    $res = mysqli_query($this->connection, $sql);
    return $res;
}

/**
   * criando a função padrão para executar as inserções no 
   * banco de dados
   */

function create($table = null, $data = null)
{
    $colunas = null;
    $valores = null;
    /** o laço de foreach abaixo vai quebrar todo o conteúdo da variável $data em partes para poder obter os nomes das colunas 
     * e os dados que deverão ser inseridos
     */
    foreach ($data as $key => $valor) {
    $colunas .= trim($key, "'") . ",";
    $valores .= "'$valor',";
    }
    // remove a ultima virgula
    $colunas = rtrim($colunas, ',');
    $valores = rtrim($valores, ',');

    $sql = "insert into $table($colunas) values ($valores);";
    try {
        $this->connection->query($sql);
        $lastInsertId = $this->connection->insert_id;
        $_SESSION['message'] = 'Registro cadastrado com sucesso!';
        $_SESSION['type'] = 'success';
        return true;
    } catch (Exception $e) {
        $_SESSION['message'] = 'Não foi possível realizar a operação!';
        $_SESSION['type'] = 'danger';
        return false;
    }
    }

/**
   * criando a função padrão para executar as atualizações no 
   * banco de dados
   */

    function update($table = null, $chavePrimaria = null, $id = null, $data = null)
{
    $items = null;
    foreach ($data as $key => $valor) {
        $items .= trim($key, "'") . "='$valor',";
    }
    // remove a ultima virgula
    $items = rtrim($items, ',');
    $sql  = "update $table set $items where $chavePrimaria = $id;";
    try {
        $this->connection->query($sql);
        return true;
    } catch (Exception $e) {
        return false;
    }
}

    public function delete($table, $id)
{
    $sql = "DELETE FROM $table WHERE id = $id";
    $res = mysqli_query($this->connection, $sql);
    if ($res) {
        return true;
    } else {
        return false;
    }
}

    public function sanitize($var)
{
    $res = mysqli_real_escape_string($this->connection, $var);
    return $res;
}
}

// criando um objeto da classe 'Database'
$database = new Database();