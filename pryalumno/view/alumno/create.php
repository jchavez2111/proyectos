<?php
require_once("c://xampp/htdocs/pryalumno/view/head/head.php");
require_once("c://xampp/htdocs/pryalumno/controller/carreraController.php");
require_once("c://xampp/htdocs/pryalumno/controller/cursoController.php");
$objCarrera = new carreraController();
$objCurso = new cursoController();
$carreras = $objCarrera->index();
$cursos = $objCurso->index();
?>

<form action="store.php" method="POST" autocomplete="off">
    <div class="form-group">
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required>
    </div>
    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
    </div>
    <div class="form-group">
        <label for="idcarrera">ID Carrera:</label>
        <select class="form-select" name="idcarrera" id="idcarrera">
            <option value="0">Seleccionar</option>
            <?php foreach ($carreras as $carrera) : ?>
                <option value="<?= $carrera["idcarrera"] ?>"><?= $carrera["nomcar"] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="idcurso">ID Curso:</label>
        <select class="form-select" name="idcurso" id="idcurso">
            <option value="0">Seleccionar</option>
            <?php foreach ($cursos as $curso) : ?>
                <option value="<?= $curso["idcurso"] ?>"><?= $curso["nomcur"] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="inicio">Inicio:</label>
        <input type="date" id="inicio" name="inicio" required>
    </div>
    <div class="form-group">
        <label for="fin">Fin:</label>
        <input type="date" id="fin" name="fin" required>
    </div>
    <div class="form-group">
        <label for="nota">Nota:</label>
        <input type="text" id="nota" name="nota" required oninput="updateEstado()">
    </div>
    <div class="form-group">
        <label for="estado">Estado:</label>
        <input type="text" id="estado" name="estado" required readonly>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
    <a class="btn btn-danger" href="index.php">Cancelar</a>
</form>

<script src="../../js/alumnoEstado.js"></script>

<?php
require_once("c://xampp/htdocs/pryalumno/view/head/footer.php");
?>
