<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'php_mysql_crud'
) or die(mysqli_erro($mysqli));


function obtenerMonedas($conn) {
  $sql = "SELECT id, tipo FROM moneda"; 
  $result = $conn->query($sql);

  $monedas = array();

  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          $monedas[] = $row;
      }
  }

  return $monedas;
}
function obtenerDocumentos($conn) {
  $sql = "SELECT id, titulo, contenido FROM doctemp"; 
  $result = $conn->query($sql);

  $documentos = array();

  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          $documentos[] = $row;
      }
  }

  return $documentos;
}

?>
