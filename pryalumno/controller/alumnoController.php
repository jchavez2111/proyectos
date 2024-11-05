<?php
class alumnoController
{
    private $model;
    public function __construct()
    {
        require_once("c://xampp/htdocs/pryalumno/model/alumnoModel.php");
        $this->model = new alumnoModel();
    }
    public function guardar($apellido, $nombre, $idcarrera, $idcurso, $inicio, $fin, $nota, $estado)
    {
        $id = $this->model->insertar($apellido, $nombre, $idcarrera, $idcurso, $inicio, $fin, $nota, $estado);
        if ($id != false) {
            header("Location:show.php?id=" . $id);
        } else {
            header("Location:create.php");
        }
    }
    public function show($id)
    {
        return ($this->model->show($id) != false) ? $this->model->show($id) : header("Location:index.php");
    }
    public function index()
    {
        return ($this->model->index()) ? $this->model->index() : false;
    }
    public function update($id, $apellido, $nombre, $idcarrera, $idcurso, $inicio, $fin, $nota, $estado)
    {
        return ($this->model->update($id, $apellido, $nombre, $idcarrera, $idcurso, $inicio, $fin, $nota, $estado) != false) ? header("Location:show.php?id=" . $id) : header("Location:index.php");
    }
    public function delete($id)
    {
        return ($this->model->delete($id)) ? header("Location:index.php") : header("Location:show.php?id=" . $id);
    }
}



