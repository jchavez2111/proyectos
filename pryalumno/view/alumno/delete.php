<?php
    require_once("c://xampp/htdocs/pryalumno/controller/alumnoController.php");
    $obj = new alumnoController();
    $obj->delete($_GET['id']);

?>