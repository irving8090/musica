<?php
//  conexión a la base de datos
include '../Conexion/conexion.php'; 

// Verifica si se ha enviado un archivo
if (isset($_FILES['archivoMusica'])) {
    // Obtén la información del archivo
    $archivoTmp = $_FILES['archivoMusica']['tmp_name'];  // Ruta temporal del archivo
    $nombreArchivo = basename($_FILES['archivoMusica']['name']);  // Nombre original del archivo

    // Definir la ruta de destino, usando $_SERVER['DOCUMENT_ROOT'] para la carpeta 'musica'
    $directorioDestino = 'C:/xampp/htdocs/web/musica/';  // Ruta absoluta a la carpeta 'musica'
    $rutaArchivo = $directorioDestino . $nombreArchivo;  // Ruta completa de destino con el nombre del archivo

    // Verifica si la carpeta 'musica' existe, si no, la crea
    if (!is_dir($directorioDestino)) {
        if (!mkdir($directorioDestino, 0777, true)) {
            die('Error al crear la carpeta de destino.');
        }
    }

    // Intenta mover el archivo desde la carpeta temporal a la carpeta destino
    if (move_uploaded_file($archivoTmp, $rutaArchivo)) {
        // Si el archivo se movió correctamente, muestra un mensaje de éxito
        echo "El archivo se subió correctamente: " . $nombreArchivo;
        
        // 
        // Recoger datos del formulario
        $cancion = $_POST['cancion'] ?? '';
        $autor = $_POST['autor'] ?? '';
        $descripcion = $_POST['descripcion'] ?? '';

        // Preparar la consulta SQL para insertar la música en la base de datos
        $sql = "INSERT INTO musica (cancion, autor, descripcion, archivo) 
                VALUES ('$cancion', '$autor', '$descripcion', '$nombreArchivo')";

        // Ejecutar la consulta
        if (mysqli_query($conn, $sql)) {
            echo "Datos de la canción guardados en la base de datos correctamente.";
        } else {
            echo "Error al guardar los datos en la base de datos: " . mysqli_error($conn);
        }
    } else {
        // Si ocurrió un error al mover el archivo
        echo "Error al mover el archivo a la carpeta de destino.";
    }
} else {
    // Si no se ha enviado ningún archivo
    echo "No se ha enviado ningún archivo.";
}
?>
