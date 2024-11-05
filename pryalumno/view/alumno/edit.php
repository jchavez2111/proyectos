<?php
require_once("c://xampp/htdocs/pryalumno/view/head/head.php");
require_once("c://xampp/htdocs/pryalumno/controller/alumnoController.php");
require_once("c://xampp/htdocs/pryalumno/controller/carreraController.php");
require_once("c://xampp/htdocs/pryalumno/controller/cursoController.php");

$objAlumno = new alumnoController();
$objCarrera = new carreraController();
$objCurso = new cursoController();

$alumno = $objAlumno->show($_GET['id']);
$carreras = $objCarrera->index();
$cursos = $objCurso->index();
?>
<form action="update.php" method="post" autocomplete="off">
    <h2>Modificando Registro</h2>
    <div class="form-group">
        <label for="id">Id:</label>
        <input type="text" id="id" name="id" readonly required value="<?= $alumno["id"] ?>">
    </div>
    <div class="form-group">
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required value="<?= $alumno["apellido"] ?>">
    </div>
    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required value="<?= $alumno["nombre"] ?>">
    </div>

    <div class="form-group">
        <label for="idcarrera">ID Carrera:</label>
        <select class="form-select" name="idcarrera" id="idcarrera">
            <option value="0">Seleccionar</option>
            <?php foreach ($carreras as $carrera) : ?>
                <option value="<?= $carrera["idcarrera"] ?>" <?= ($carrera["idcarrera"] == $alumno["idcarrera"]) ? 'selected' : '' ?>><?= $carrera["nomcar"] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="idcurso">ID Curso:</label>
        <select class="form-select" name="idcurso" id="idcurso">
            <option value="0">Seleccionar</option>
            <?php foreach ($cursos as $curso) : ?>
                <option value="<?= $curso["idcurso"] ?>" <?= ($curso["idcurso"] == $alumno["idcurso"]) ? 'selected' : '' ?>><?= $curso["nomcur"] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="inicio">Inicio:</label>
        <input type="date" id="inicio" name="inicio" required value="<?= htmlspecialchars($alumno['inicio']) ?>">
    </div>
    <div class="form-group">
        <label for="fin">Fin:</label>
        <input type="date" id="fin" name="fin" required value="<?= htmlspecialchars($alumno['fin']) ?>">
    </div>
    <div class="form-group">
        <label for="nota">Nota:</label>
        <input type="text" id="nota" name="nota" required oninput="updateEstado()" value="<?= $alumno["nota"] ?>">
    </div>
    <div class="form-group">
        <label for="estado">Estado:</label>
        <input type="text" id="estado" name="estado" required readonly>
    </div>
    <div>
        <input type="submit" class="btn btn-success" value="Actualizar">
        <a class="btn btn-danger" href="show.php?id=<?= $alumno["id"] ?>">Cancelar</a>
    </div>
</form>

<script src="../../js/alumnoEstado.js"></script>
<?php
require_once("c://xampp/htdocs/pryalumno/view/head/footer.php");
?>