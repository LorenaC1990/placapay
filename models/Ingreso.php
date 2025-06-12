<?php
require_once __DIR__ . '/../config/database.php';

class User
{
    private $conn;
    private $table_name = "ingresos";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

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

    public function postIngreso($post)
    {
        $query = "INSERT INTO {$this->table_name} (placa, tarifa, hora_ingreso, hora_salida) VALUES (:placa, :tarifa, :hora_ingreso, :hora_salida)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':placa' => $post['placa'],
            ':tarifa' => $post['tarifa'],
            ':hora_ingreso' => time(), // poner fecha y hora
            ':hora_salida' => null
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

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

    public function traerIngreso($id)
    {
        $query = "SELECT * FROM {$this->table_name} WHERE id = $id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result : "No existe el id";
    }

    public function actualizar_ingreso($ingreso)
    {
        $query = "UPDATE {$this->table_name} SET placa = :placa, tarifa = :tarifa WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':id' => $ingreso['id'],
            ':tarifa' => $ingreso['tarifa'],
            ':placa' => $ingreso['placa']
        ]);

        if ($stmt->rowCount() <= 0) {
            return "No se actualizó ningún registro";
        }

        return "Éxito al actualizar";
    }

    public function eliminar_ingreso($id) {
        $query = "DELETE FROM {$this->table_name} WHERE id = $id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return "Se eliminó con éxito";
    }
}
