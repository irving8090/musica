<?php
// login.php
class Login {
    // Esta clase se utiliza para manejar la información de inicio de sesión básica
    public $usuario;
    public $contrasena;
    public $nombre;
    public $ape_paterno;
    public $ape_materno;
    
    

    public function __construct($usuario, $contrasena, $nombre, $ape_paterno, $ape_materno) {
        $this->usuario = $usuario;
        $this->contrasena = $contrasena;
        $this->nombre = $nombre;
        $this->ape_paterno = $ape_paterno;
        $this->ape_materno = $ape_materno;
       
    }

    // 
}
?>
