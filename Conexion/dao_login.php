<?php
class DAO_LOGIN
{
    // Función para crear un nuevo registro de usuario en la base de datos
    public function create_login($LOGIN, $conn) {
        $sql = "INSERT INTO usuarios (usuario, contrasena, nombre, ape_paterno, ape_materno) 
                VALUES (?, ?, ?, ?, ?)";
    
        $stmt = $conn->prepare($sql);
    
        if (!$stmt) {
            die("Error al preparar la consulta: " . $conn->error);
        }
    
        $stmt->bind_param(
            "sssss",
            $LOGIN->usuario,
            $LOGIN->contrasena,
            $LOGIN->nombre,
            $LOGIN->ape_paterno,
            $LOGIN->ape_materno
        );
    
        if (!$stmt->execute()) {
            die("Error al ejecutar la consulta: " . $stmt->error);
        }
    
        $ID_LOGIN = $stmt->insert_id; // Obtener el ID del nuevo registro
        $stmt->close();
    
        return $ID_LOGIN;
    }
    

    // Función para leer un usuario por nombre de usuario
    public function read_login($usuario, $conn)
    {
        $sql = "SELECT * FROM usuarios WHERE usuario='$usuario'";
        $stm = mysqli_query($conn, $sql);
        return $stm;
    }

    // Función para verificar el inicio de sesión usando usuario y contraseña
    public function read_login_inicio($usuario, $contrasena, $conn)
    {
        $sql = "SELECT * FROM usuarios WHERE usuario = ? AND contrasena = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $usuario, $contrasena);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result;
    }
}
?>
