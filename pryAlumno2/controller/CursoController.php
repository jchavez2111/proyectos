<?php
require_once 'model/Curso.php';

class CursoController {
    private $db;
    private $curso;

    public function __construct($db) {
        $this->db = $db;
        $this->curso = new curso($db);
    }

    public function index() {
        $stmt = $this->curso->read();
        $cursos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        require_once 'view/curso/index.php';
    }

    public function create() {
        if($_POST) {
            $this->curso->nomcur = $_POST['nomcur'];
            if($this->curso->create()) {
                header("Location: index.php");
            }
        }
        require_once 'view/curso/create.php';
    }

    public function edit($id) {
        $this->curso->idcurso = $id;
        $this->curso->readOne();

        if($_POST) {
            $this->curso->nomcur = $_POST['nomcur'];
            if($this->curso->update()) {
                header("Location: index.php");
            }
        }
        require_once 'view/curso/edit.php';
    }

    public function delete() {
        if(isset($_GET['id'])) {
            $this->curso->idcurso = $_GET['id'];
            if($this->curso->delete()) {
                header("Location: view/curso/index.php");
            }
        }
    }
}
?>
