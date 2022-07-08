<?php
require_once('../../database.php');
$id = $_GET['id'];

$res = $database->delete('tb_clientes', $id);
if ($res) {
  header('location: index.php');
} else {
  echo "Falha ao excluir registro";
}
