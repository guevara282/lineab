<?php

include('db.php');

if (isset($_POST['objeto'])) {
  // Obtener datos del formulario
  $objeto = $_POST["objeto"];
  $descripcion = $_POST["descripcion"];
  $moneda = $_POST["moneda"];
  $presupuesto = $_POST["presupuesto"];
  $actividad = $_POST["actividad"];
  $fechainicio = $_POST["fechainicio"];
  $fechacierre = $_POST["fechacierre"];
  $horainicio = $_POST["horainicio"];
  $horacierre = $_POST["horacierre"];
  
  
 // Crear la consulta SQL
  $query = "INSERT INTO oferta (objeto, descripcion, actividad, moneda, presupuesto, fechainicio, fechacierre, horainicio, horacierre) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

  // Preparar la consulta
  $stmt = mysqli_prepare($conn, $query);

  // Verificar si la preparación de la consulta fue exitosa
  if ($stmt) {
  // Vincular los datos
    mysqli_stmt_bind_param($stmt, "sssiissss", $objeto, $descripcion, $actividad, $moneda, $presupuesto, $fechainicio, $fechacierre, $horainicio, $horacierre);

   // Ejecutar la consulta
   if (mysqli_stmt_execute($stmt)) {
    print("paso");
      $_SESSION['message'] = 'Evento guardado';
      $_SESSION['message_type'] = 'success';
      header('Location: adddocumentos.php');
    } else {
        $_SESSION['message'] = 'Error al guardar el evento';
        $_SESSION['message_type'] = 'danger';
        header('Location: index.php');
      }

    // Cerrar la declaración
    mysqli_stmt_close($stmt);
    } else {
        $_SESSION['message'] = 'Error al preparar la consulta';
        $_SESSION['message_type'] = 'danger';
        header('Location: index.php');
    }

    // Cerrar la conexión a la base de datos 
    mysqli_close($conn);
}
  

?>