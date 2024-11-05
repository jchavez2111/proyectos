<?php
require_once '../controller/ArticuloController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new ArticuloController();

    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        switch ($action) {
            case 'create':
                $descripcion = $_POST['descripcion'];
                $precio = $_POST['precio'];
                $controller->create($descripcion, $precio);
                break;
            case 'update':
                $codigo = $_POST['codigo'];
                $descripcion = $_POST['descripcion'];
                $precio = $_POST['precio'];
                $controller->update($codigo, $descripcion, $precio);
                break;
            case 'delete':
                $codigo = $_POST['codigo'];
                $controller->delete($codigo);
                break;
            default:
                echo "Acción no válida.";
                break;
        }
    }
}
?>