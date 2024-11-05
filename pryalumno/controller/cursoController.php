<?php
class cursoController
{
    private $model;
    public function __construct()
    {
        require_once("c://xampp/htdocs/pryalumno/model/cursoModel.php");
        $this->model = new cursoModel();
    }

    public function show($id)
    {
        return ($this->model->show($id) != false) ? $this->model->show($id) : header("Location:index.php");
    }
    public function index()
    {
        return ($this->model->index()) ? $this->model->index() : false;
    }
}
