<?php
require_once 'config/database.php';
require_once 'controller/CarreraController.php';
require_once 'controller/CursoController.php';
require_once 'controller/AlumnoController.php';

$database = new Database();
$db = $database->getConnection();

$CarreraController = new CarreraController($db);
$CursoController = new CursoController($db);
$AlumnoController = new AlumnoController($db);

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : null;

switch ($action) {
    case 'create':
        #$CarreraController->create();
        #$CursoController->create();
        $AlumnoController->create();
        break;
    case 'edit':
        #$CarreraController->edit($id);
        #$CursoController->edit($id);
        $AlumnoController->edit($id);
        break;
    case 'delete':
        #$CarreraController->delete();        
        #$CursoController->delete();
        $AlumnoController->delete();
        break;
    default:
        #$CarreraController->index();
        #$CursoController->index();
        $AlumnoController->index();
        break;
}

