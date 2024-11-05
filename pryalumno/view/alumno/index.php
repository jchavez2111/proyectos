<?php
require_once("c://xampp/htdocs/pryalumno/view/head/head.php");
require_once("c://xampp/htdocs/pryalumno/controller/alumnoController.php");
$obj = new alumnoController();
$alumnos = $obj->index();
?>
<div class="mb-3">
    <a href="/pryalumno/view/alumno/create.php" class="btn btn-primary">Agregar nuevo alumno</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Apellido</th>
            <th scope="col">Nombre</th>
            <th scope="col">Carrera</th>
            <th scope="col">Curso</th>
            <th scope="col">Fecha Inicio</th>
            <th scope="col">Fecha Fin</th>
            <th scope="col">Nota</th>
            <th scope="col">Estado</th>
            <th scope="col">Ver</th>
            <th scope="col">Modificar</th>
            <th scope="col">Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($alumnos) : ?>
            <?php foreach ($alumnos as $alumno) : ?>
                <tr>
                    <th scope="col"><?= $alumno["id"] ?></th>
                    <th scope="col"><?= $alumno["apellido"] ?></th>
                    <th scope="col"><?= $alumno["nombre"] ?></th>
                    <th scope="col"><?= $alumno["nomcar"] ?></th>
                    <th scope="col"><?= $alumno["nomcur"] ?></th>
                    <th scope="col"><?= $alumno["inicio"] ?></th>
                    <th scope="col"><?= $alumno["fin"] ?></th>
                    <th>
                        <?php if ($alumno["nota"] > 10.5) : ?>
                            <strong class="text-primary"><?= $alumno["nota"] ?></strong>
                        <?php else : ?>
                            <strong class="text-danger"><?= $alumno["nota"] ?></strong>
                        <?php endif; ?>
                    </th>
                    <th>
                        <?php if ($alumno["estado"] == "Aprobado") : ?>
                            <strong class="text-primary"><?= $alumno["estado"] ?></strong>
                        <?php else : ?>
                            <strong class="text-danger"><?= $alumno["estado"] ?></strong>
                        <?php endif; ?>
                    </th>

                    <th>
                        <a href="show.php?id=<?= $alumno["id"] ?>" class="btn btn-primary">Ver</a>
                    </th>
                    <th>
                        <a href="edit.php?id=<?= $alumno["id"] ?>" class="btn btn-success">Modificar</a>
                    </th>
                    <th>
                        <!-- Button trigger modal -->
                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#id<?= $alumno["id"] ?>">Eliminar</a>

                        <!-- Modal -->
                        <div class="modal fade" id="id<?= $alumno["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">¿Desea eliminar el registro?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Una vez eliminado no se podra recuperar el registro
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cerrar</button>
                                        <a href="delete.php?id=<?= $alumno["id"] ?>" class="btn btn-danger">Eliminar</a>
                                        <!-- <button type="button" >Eliminar</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </th>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="12" class="text-center">No hay registros actualmente</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<?php
require_once("c://xampp/htdocs/pryalumno/view/head/footer.php");
?>