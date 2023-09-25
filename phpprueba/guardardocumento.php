<?php
include('db.php');

// Comprobar si se ha cargado un archivo
if (isset($_FILES['archivo'])) {
    extract($_POST);
    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];
   
    // Definir la carpeta de destino
    $carpeta_destino = "F:/xampp/htdocs/phpprueba/doctemp/";

    // Obtener el nombre y la extensión del archivo
    $nombre_archivo = basename($_FILES["archivo"]["name"]);
    $extension = strtolower(pathinfo($nombre_archivo, PATHINFO_EXTENSION));

    // Verificar si la extensión del archivo es válida
    if ($extension == "pdf" || $extension == "doc" || $extension == "docx") {
        // Crear la consulta SQL para la inserción
        $query = "INSERT INTO doctemp (titulo, contenido, archivo) VALUES (?, ?, ?)";

        // Preparar la consulta
        $stmt = mysqli_prepare($conn, $query);

        // Verificar si la preparación de la consulta fue exitosa
        if ($stmt) {
            // Mover el archivo a la carpeta de destino
            if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $carpeta_destino . $nombre_archivo)) {
                // Vincular parámetros
                mysqli_stmt_bind_param($stmt, "sss", $titulo, $contenido, $nombre_archivo);
                $resultado = mysqli_stmt_execute($stmt);
                if ($resultado) {
                    echo "Archivo subido correctamente.";
                } else {
                    echo "Error al subir archivo a la base de datos.";
                }
            } else {
                echo "Error al mover el archivo.";
            }
        } else {
            echo "Error al preparar la consulta.";
        }
    } else {
        echo "Solo se permiten archivos PDF, DOC y DOCX.";
    }
}
?>