<?php
require_once 'model/Carrera.php';

class CarreraController {
    private $db;
    private $carrera;

    public function __construct($db) {
        $this->db = $db;
        $this->carrera = new Carrera($db);
    }

    public function index() {
        $stmt = $this->carrera->read();
        $carreras = $stmt->fetchAll(PDO::FETCH_ASSOC);
        require_once 'view/carrera/index.php';
    }

    public function create() {
        if($_POST) {
            $this->carrera->nomcar = $_POST['nomcar'];
            if($this->carrera->create()) {
                header("Location: index.php");
            }
        }
        require_once 'view/carrera/create.php';
    }

    public function edit($id) {
        $this->carrera->idcarrera = $id;
        $this->carrera->readOne();

        if($_POST) {
            $this->carrera->nomcar = $_POST['nomcar'];
            if($this->carrera->update()) {
                header("Location: index.php");
            }
        }
        require_once 'view/carrera/edit.php';
    }

    public function delete() {
        if(isset($_GET['id'])) {
            $this->carrera->idcarrera = $_GET['id'];
            if($this->carrera->delete()) {
                header("Location: index.php");
            }
        }
    }
}
?>
