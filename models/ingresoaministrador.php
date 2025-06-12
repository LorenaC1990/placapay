<?php
require_once __DIR__ . '/../config/database.php';

class Admin
{
    private $conn;
    private $table_name = "ingresoadministrador";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function login($nombre, $contrasena)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE nombre_usuario = :nombre AND contrasena = :contrasena";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':nombre' => $nombre,
            ':contrasena' => $contrasena
        ]);

        return $stmt->rowCount() > 0;
}
}


