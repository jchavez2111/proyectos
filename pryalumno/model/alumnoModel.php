<?php
class alumnoModel
{
    private $PDO;
    public function __construct()
    {
        require_once("c://xampp/htdocs/pryalumno/config/db.php");
        $con = new db();
        $this->PDO = $con->conexion();
    }


    public function insertar($apellido, $nombre, $idcarrera, $idcurso, $inicio, $fin, $nota, $estado)
    {
        $sql = "INSERT INTO alumno (apellido, nombre, idcarrera, idcurso, inicio, fin, nota, estado) 
            VALUES (:apellido, :nombre, :idcarrera, :idcurso, :inicio, :fin, :nota, :estado)";
        $stament = $this->PDO->prepare($sql);
        $stament->bindParam(":apellido", $apellido);
        $stament->bindParam(":nombre", $nombre);
        $stament->bindParam(":idcarrera", $idcarrera);
        $stament->bindParam(":idcurso", $idcurso);
        $stament->bindParam(":inicio", $inicio);
        $stament->bindParam(":fin", $fin);
        $stament->bindParam(":nota", $nota);
        $stament->bindParam(":estado", $estado);
        return ($stament->execute()) ? $this->PDO->lastInsertId() : false;
    }

    public function show($id)
    {
        $sql = "SELECT 
        a.id, a.apellido, a.nombre,
        a.idcarrera, ca.nomcar, a.idcurso, cu.nomcur,
        a.inicio, a.fin,
        a.nota, a.estado
    FROM alumno a
    INNER JOIN carrera ca 
    ON ca.idcarrera = a.idcarrera
    INNER JOIN curso cu 
    ON cu.idcurso = a.idcurso
    WHERE a.id = :id LIMIT 1";
        $stament = $this->PDO->prepare($sql);
        $stament->bindParam(":id", $id);
        return ($stament->execute()) ? $stament->fetch() : false;
    }
    public function index()
    {
        $sql = "SELECT 
            a.id,a.apellido,a.nombre,
            a.idcarrera,ca.nomcar,a.idcurso,cu.nomcur,
        a.inicio,a.fin,
        a.nota,a.estado
        FROM alumno a
        inner join carrera ca
        on ca.idcarrera=a.idcarrera
        inner join curso cu
        on cu.idcurso=a.idcurso 
        order by id;";
        $stament = $this->PDO->prepare($sql);
        return ($stament->execute()) ? $stament->fetchAll() : false;
    }    
    public function update($id, $apellido, $nombre, $idcarrera, $idcurso, $inicio, $fin, $nota, $estado)
    {

        $sql = "UPDATE alumno SET
        apellido = :apellido, nombre = :nombre, 
        idcarrera = :idcarrera, idcurso = :idcurso, 
        inicio = :inicio, 
        fin = :fin, 
        nota = :nota, 
        estado = :estado        
        WHERE id = :id";

        $stament = $this->PDO->prepare($sql);
        $stament->bindParam(":apellido", $apellido);
        $stament->bindParam(":nombre", $nombre);
        $stament->bindParam(":idcarrera", $idcarrera);
        $stament->bindParam(":idcurso", $idcurso);
        $stament->bindParam(":inicio", $inicio);
        $stament->bindParam(":fin", $fin);
        $stament->bindParam(":nota", $nota);
        $stament->bindParam(":estado", $estado);
        $stament->bindParam(":id", $id);
        return ($stament->execute()) ? $id : false;
    }
    public function delete($id)
    {
        $stament = $this->PDO->prepare("DELETE FROM alumno WHERE id = :id");
        $stament->bindParam(":id", $id);
        return ($stament->execute()) ? true : false;
    }
}
