<?php
class cursoModel
{
    private $PDO;
    public function __construct()
    {
        require_once("c://xampp/htdocs/pryalumno/config/db.php");
        $con = new db();
        $this->PDO = $con->conexion();
    }




    public function show($id)
    {
        $sql = "SELECT  
        idcurso, nomcur from curso
    WHERE idcurso = :id LIMIT 1";
        $stament = $this->PDO->prepare($sql);
        $stament->bindParam(":id", $id);
        return ($stament->execute()) ? $stament->fetch() : false;
    }
    public function index()
    {
        $sql = "SELECT 
            idcurso, nomcur from curso;";
        $stament = $this->PDO->prepare($sql);
        return ($stament->execute()) ? $stament->fetchAll() : false;
    }
}
