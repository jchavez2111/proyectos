<?php
class Carrera {
    private $conn;
    private $table_name = "carrera";

    public $idcarrera;
    public $nomcar;

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
        $query = "SELECT * FROM " . $this->table_name . " WHERE idcarrera = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->idcarrera);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->nomcar = $row['nomcar'];
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET nomcar=:nomcar";
        $stmt = $this->conn->prepare($query);

        $this->nomcar = htmlspecialchars(strip_tags($this->nomcar));

        $stmt->bindParam(":nomcar", $this->nomcar);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET nomcar = :nomcar WHERE idcarrera = :idcarrera";
        $stmt = $this->conn->prepare($query);

        $this->nomcar = htmlspecialchars(strip_tags($this->nomcar));
        $this->idcarrera = htmlspecialchars(strip_tags($this->idcarrera));

        $stmt->bindParam(":nomcar", $this->nomcar);
        $stmt->bindParam(":idcarrera", $this->idcarrera);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }


    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE idcarrera = :idcarrera";
        $stmt = $this->conn->prepare($query);

        $this->idcarrera = htmlspecialchars(strip_tags($this->idcarrera));

        $stmt->bindParam(":idcarrera", $this->idcarrera);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
