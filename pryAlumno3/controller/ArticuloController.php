<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../model/Articulo.php';


class ArticuloController
{
    private $db;
    private $articulo;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->articulo = new Articulo($this->db);
    }

    public function index()
    {
        $stmt = $this->articulo->read();
        $articulos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include 'view/articulo/index.php';
    }

    public function create($descripcion, $precio)
    {
        $this->articulo->descripcion = $descripcion;
        $this->articulo->precio = $precio;
        if ($this->articulo->create()) {
            echo "Artículo creado exitosamente.";
        } else {
            echo "Error al crear el artículo.";
        }
    }


    public function update($codigo, $descripcion, $precio)
    {
        $this->articulo->descripcion = $descripcion;
        $this->articulo->precio = $precio;
        if ($this->articulo->update($codigo)) {
            echo "Artículo actualizado exitosamente.";
        } else {
            echo "Error al actualizar el artículo.";
        }
    }

    public function delete($codigo)
    {
        if ($this->articulo->delete($codigo)) {
            echo "Artículo eliminado exitosamente.";
        } else {
            echo "Error al eliminar el artículo.";
        }
    }
}
