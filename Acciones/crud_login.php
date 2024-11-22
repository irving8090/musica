<?php
// Incluir los archivos necesarios
include '../Conexion/conexion.php'; // Archivo de conexión a la base de datos
include '../Conexion/login.php'; // Clase Login
include '../Conexion/dao_login.php'; // DAO para manejar las operaciones del login

$crud = new DAO_LOGIN(); // Crear el objeto DAO_LOGIN

// Verificar si es un registro o un inicio de sesión
if (isset($_POST['BTNREGISTRAR'])) {
    // **Formulario de Registro**

    // Recoger los datos del formulario
    $NOMBRE = trim($_POST['NOMBRE'] ?? "");
    $APE_PATERNO = trim($_POST['APE_PATERNO'] ?? "");
    $APE_MATERNO = trim($_POST['APE_MATERNO'] ?? "");
    $USUARIO = trim($_POST['USUARIO'] ?? ""); // Aquí `CORREO` se usa como usuario
    $CONTRASENA = trim($_POST['CONTRASENA'] ?? "");

    

    // Encriptar la contraseña
    $CONTRASENA_ENCRIPTADA = md5($CONTRASENA);

    // Crear el objeto Login
    $nuevoUsuario = new Login($USUARIO, $CONTRASENA_ENCRIPTADA, $NOMBRE, $APE_PATERNO, $APE_MATERNO);

    // Intentar registrar al nuevo usuario
    $nuevoID = $crud->create_login($nuevoUsuario, $conn);

    if ($nuevoID) {
        // Registro exitoso, redirigir al login
        header('Location: ../index.php');
        exit();
    } else {
        // Error al registrar
        echo "Error al registrar el usuario.";
        exit();
    }
} elseif (isset($_POST['BTNINICIAR'])) {
    // **Formulario de Inicio de Sesión**

    // Recoger los datos del formulario
    $USUARIO = trim($_POST['USUARIO'] ?? ""); // Aquí `CORREO` se usa como usuario
    $CONTRASENA = trim($_POST['CONTRASENA'] ?? "");

    // Validar campos obligatorios
    if (empty($USUARIO) || empty($CONTRASENA)) {
        die("Error: El usuario y la contraseña son obligatorios.");
    }

    // Encriptar la contraseña
    $CONTRASENA_ENCRIPTADA = md5($CONTRASENA);

    // Intentar iniciar sesión
    $stm = $crud->read_login_inicio($USUARIO, $CONTRASENA_ENCRIPTADA, $conn);

    if (!$stm) {
        die("Error al consultar la base de datos: " . mysqli_error($conn));
    }

    $FILAS = mysqli_num_rows($stm);

    if ($FILAS > 0) {
        // Credenciales correctas, iniciar sesión
        session_start();
        $_SESSION['usuario'] = $USUARIO; // Guardar usuario en sesión
        header('Location: ../principal.html');
        exit();
    } else {
        // Credenciales incorrectas, redirigir al login
        header('Location: ../index.php?error=credenciales');
        exit();
    }
} else {
    // Si no se presionó ningún botón, redirigir al formulario de login por defecto
    header('Location: ../index.php');
    exit();
}
