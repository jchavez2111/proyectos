<?php
require_once 'model/Alumno.php';

class AlumnoController {
    private $db;
    private $alumno;

    public function __construct($db) {
        $this->db = $db;
        $this->alumno = new Alumno($db);
    }

    public function index() {
        $stmt = $this->alumno->read();
        $carreras = $this->alumno->readAllCarreras();
        $cursos = $this->alumno->readAllCursos();
        $alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        require_once 'view/alumno/index.php';
    }

    public function create() {
        if($_POST) {
            $this->alumno->apellido = $_POST['apellido'];
            $this->alumno->nombre = $_POST['nombre'];
            $this->alumno->idcarrera = $_POST['idcarrera'];
            $this->alumno->idcurso = $_POST['idcurso'];
            $this->alumno->inicio = $_POST['inicio'];
            $this->alumno->fin = $_POST['fin'];
            $this->alumno->nota = $_POST['nota'];
            $this->alumno->estado = $_POST['estado'];
            if($this->alumno->create()) {
                header("Location: index.php");
            }
        }
        require_once 'view/alumno/create.php';
    }

    public function edit($id) {
        $this->alumno->id = $id;
        $this->alumno->readOne();

        if($_POST) {
            $this->alumno->apellido = $_POST['apellido'];
            $this->alumno->nombre = $_POST['nombre'];
            $this->alumno->idcarrera = $_POST['idcarrera'];
            $this->alumno->idcurso = $_POST['idcurso'];
            $this->alumno->inicio = $_POST['inicio'];
            $this->alumno->fin = $_POST['fin'];
            $this->alumno->nota = $_POST['nota'];
            $this->alumno->estado = $_POST['estado'];
            if($this->alumno->update()) {
                header("Location: index.php");
            }
        }
        require_once 'view/alumno/edit.php';
    }

    public function delete() {
        if(isset($_GET['id'])) {
            $this->alumno->id = $_GET['id'];
            if($this->alumno->delete()) {
                header("Location: index.php");
            }
        }
    }
}
?>
