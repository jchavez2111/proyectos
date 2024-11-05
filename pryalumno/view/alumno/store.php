<?php
    require_once("c://xampp/htdocs/pryalumno/controller/alumnoController.php");
    $obj = new alumnoController();
    $obj->guardar(
        $_POST['apellido'], 
        $_POST['nombre'], 
        $_POST['idcarrera'], 
        $_POST['idcurso'], 
        $_POST['inicio'], 
        $_POST['fin'], 
        $_POST['nota'], 
        $_POST['estado']    
    );
?>