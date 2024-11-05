<?php
class Curso {
    private $conn;
    private $table_name = "curso";

    public $idcurso;
    public $nomcur;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE idcurso = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->idcurso);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->nomcur = $row['nomcur'];
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET nomcur=:nomcur";
        $stmt = $this->conn->prepare($query);

        $this->nomcur = htmlspecialchars(strip_tags($this->nomcur));

        $stmt->bindParam(":nomcur", $this->nomcur);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET nomcur = :nomcur WHERE idcurso = :idcurso";
        $stmt = $this->conn->prepare($query);

        $this->nomcur = htmlspecialchars(strip_tags($this->nomcur));
        $this->idcurso = htmlspecialchars(strip_tags($this->idcurso));

        $stmt->bindParam(":nomcur", $this->nomcur);
        $stmt->bindParam(":idcurso", $this->idcurso);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }


    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE idcurso = :idcurso";
        $stmt = $this->conn->prepare($query);

        $this->idcurso = htmlspecialchars(strip_tags($this->idcurso));

        $stmt->bindParam(":idcurso", $this->idcurso);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
