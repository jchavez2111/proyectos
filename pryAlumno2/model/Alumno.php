<?php
class Alumno
{
    private $conn;
    private $table_name = "alumno";

    public $id;
    public $apellido;
    public $nombre;
    public $idcarrera;
    public $idcurso;
    public $inicio;
    public $fin;
    public $nota;
    public $estado;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function read()
    {
        $query = "SELECT 
        a.id, a.apellido, a.nombre,
        a.idcarrera, ca.nomcar as carrera, 
        a.idcurso, cu.nomcur as curso,
        a.inicio, a.fin, a.nota, a.estado
        FROM alumno a
        INNER JOIN carrera ca 
        ON ca.idcarrera = a.idcarrera
        INNER JOIN curso cu 
        ON cu.idcurso = a.idcurso 
        ORDER BY a.id";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }


    public function readAllCarreras()
    {
        $carrera = new Carrera($this->conn);
        $stmt = $carrera->read();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readAllCursos()
    {
        $curso = new Curso($this->conn);
        $stmt = $curso->read();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readOne()
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->apellido = $row['apellido'];
        $this->nombre = $row['nombre'];
        $this->idcarrera = $row['idcarrera'];
        $this->idcurso = $row['idcurso'];
        $this->inicio = $row['inicio'];
        $this->fin = $row['fin'];
        $this->nota = $row['nota'];
        $this->estado = $row['estado'];
    }

    public function create()
    {
        $query = "INSERT INTO " . $this->table_name . " (apellido, nombre, idcarrera, idcurso, inicio, fin, nota, estado) VALUES (:apellido, :nombre, :idcarrera, :idcurso, :inicio, :fin, :nota, :estado)";
        $stmt = $this->conn->prepare($query);

        $this->apellido = htmlspecialchars(strip_tags($this->apellido));
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->idcarrera = htmlspecialchars(strip_tags($this->idcarrera));
        $this->idcurso = htmlspecialchars(strip_tags($this->idcurso));
        $this->inicio = htmlspecialchars(strip_tags($this->inicio));
        $this->fin = htmlspecialchars(strip_tags($this->fin));
        $this->nota = htmlspecialchars(strip_tags($this->nota));

        // Calcular estado basado en la nota
        $this->estado = $this->nota > 10.5 ? 'Aprobado' : 'Desaprobado';

        $stmt->bindParam(":apellido", $this->apellido);
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":idcarrera", $this->idcarrera);
        $stmt->bindParam(":idcurso", $this->idcurso);
        $stmt->bindParam(":inicio", $this->inicio);
        $stmt->bindParam(":fin", $this->fin);
        $stmt->bindParam(":nota", $this->nota);
        $stmt->bindParam(":estado", $this->estado);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function update()
    {
        $query = "UPDATE " . $this->table_name . " SET apellido = :apellido, nombre = :nombre, idcarrera = :idcarrera, idcurso = :idcurso, inicio = :inicio, fin = :fin, nota = :nota, estado = :estado WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $this->apellido = htmlspecialchars(strip_tags($this->apellido));
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->idcarrera = htmlspecialchars(strip_tags($this->idcarrera));
        $this->idcurso = htmlspecialchars(strip_tags($this->idcurso));
        $this->inicio = htmlspecialchars(strip_tags($this->inicio));
        $this->fin = htmlspecialchars(strip_tags($this->fin));
        $this->nota = htmlspecialchars(strip_tags($this->nota));
        $this->estado = htmlspecialchars(strip_tags($this->estado));
        // Calcular estado basado en la nota
        $this->estado = $this->nota > 10.5 ? 'Aprobado' : 'Desaprobado';

        $stmt->bindParam(":apellido", $this->apellido);
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":idcarrera", $this->idcarrera);
        $stmt->bindParam(":idcurso", $this->idcurso);
        $stmt->bindParam(":inicio", $this->inicio);
        $stmt->bindParam(":fin", $this->fin);
        $stmt->bindParam(":nota", $this->nota);
        $stmt->bindParam(":estado", $this->estado);
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }


    public function delete()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
