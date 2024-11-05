<?php
class Articulo
{
    private $conn;
    private $table_name = "articulos";

    public $codigo;
    public $descripcion;
    public $precio;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function read()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create()
    {
        $query = "INSERT INTO " . $this->table_name . " SET descripcion=:descripcion, precio=:precio";
        $stmt = $this->conn->prepare($query);

        $this->descripcion = htmlspecialchars(strip_tags($this->descripcion));
        $this->precio = htmlspecialchars(strip_tags($this->precio));

        $stmt->bindParam(":descripcion", $this->descripcion);
        $stmt->bindParam(":precio", $this->precio);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function update($codigo)
    {
        $query = "UPDATE " . $this->table_name . " SET descripcion=:descripcion, precio=:precio WHERE codigo=:codigo";
        $stmt = $this->conn->prepare($query);

        $this->descripcion = htmlspecialchars(strip_tags($this->descripcion));
        $this->precio = htmlspecialchars(strip_tags($this->precio));
        $codigo = htmlspecialchars(strip_tags($codigo));

        $stmt->bindParam(":descripcion", $this->descripcion);
        $stmt->bindParam(":precio", $this->precio);
        $stmt->bindParam(":codigo", $codigo);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete($codigo)
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE codigo = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $codigo);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
