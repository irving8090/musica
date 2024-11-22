<?php
// Definición de las variables necesarias para la conexión a la base de datos
    $host = "localhost";
    $dbname = "web";
    $username = "root";
    $password = "";
     // Creación de la conexión a la base de datos utilizando la clase mysqli
    $conn = new mysqli($host,$username,$password,$dbname);
    //echo "Conexion exitosa";
    if($conn->connect_error){
        die("Error al conectar").$conn->connect_error;
    }
?>