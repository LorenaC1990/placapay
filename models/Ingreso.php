<?php
require_once __DIR__ . '/../config/database.php';

class Ingreso
{
    private $conn;
    private $table_name = "ingresos";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Traer ingresos (activos o reporte)
    public function traerIngresos($reporte = false)
    {
        if ($reporte) {
            // $query = "SELECT * FROM " . $this->table_name . " ORDER BY `hora_ingreso` desc";
            $query = "SELECT * FROM " . $this->table_name . " WHERE `hora_salida` IS NOT NULL ORDER BY `hora_ingreso` desc";
        } else {
            $query = "SELECT * FROM " . $this->table_name . " WHERE `hora_salida` IS NULL ORDER BY `hora_ingreso` desc";
        }

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

// Agregar ingreso
    public function postIngreso($post)
{
    $query = "INSERT INTO {$this->table_name} (placa, tarifa, hora_ingreso, hora_salida) 
              VALUES (:placa, :tarifa, :hora_ingreso, NULL)";
              
    $stmt = $this->conn->prepare($query);
    $stmt->execute([
        ':placa' => $post['placa'],
        ':tarifa' => $post['tarifa'],
        ':hora_ingreso' => date('Y-m-d H:i:s')
    ]);
}

// Marcar salida (actualizar hora_salida)
    public function checkoutIngreso($postId)
    {
        $query = "UPDATE {$this->table_name} SET hora_salida = :hora_salida WHERE id = :id AND hora_salida IS NULL";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':id' => $postId,
            ':hora_salida' => time()
        ]);

        if ($stmt->rowCount() <= 0) {
            return "No se actualizó ningún registro";
        }

        return "Éxito al marcar salida";
    }

// Eliminar ingreso
    public function eliminarIngreso($id) {
    $query = "DELETE FROM {$this->table_name} WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->execute([':id' => $id]);

    if ($stmt->rowCount() > 0) {
        return "Ingreso eliminado correctamente";
    } else {
        return "No se encontró el ingreso o ya fue eliminado";
    }
    }    

// Obtener ingreso por ID (para editar)
      public function getIngresoPorId($id)
    {
        $query = "SELECT * FROM {$this->table_name} WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

// Editar ingreso (actualizar placa y tarifa)
    public function editarIngreso($data)
    {
        $query = "UPDATE {$this->table_name} SET placa = :placa, tarifa = :tarifa WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            ':placa' => $data['placa'],
            ':tarifa' => $data['tarifa'],
            ':id' => $data['id']
        ]);
    }

}

