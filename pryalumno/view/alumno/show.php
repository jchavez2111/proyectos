<?php
    require_once("c://xampp/htdocs/pryalumno/view/head/head.php");
    require_once("c://xampp/htdocs/pryalumno/controller/alumnoController.php");
    $obj = new alumnoController();
    $alumno = $obj->show($_GET['id']);
?>
<h2 class="text-center">Detalles del registro</h2>
<div class="pb-3">
    <a href="index.php" class="btn btn-primary">Regresar</a>
    <a href="edit.php?id=<?= $alumno[0]?>" class="btn btn-success">Actualizar</a>
    
    <!-- Button trigger modal -->
    <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Eliminar</a>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <a href="delete.php?id=<?= $alumno[0]?>" class="btn btn-danger">Eliminar</a>
            <!-- <button type="button" >Eliminar</button> -->
        </div>
        </div>
    </div>
    </div>
</div>

<table class="table container-fluid">
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
        </tr>
    </thead>
    <tbody>
        <tr>
            <td scope="col"><?= $alumno["id"]?></td>          
            <td scope="col"><?= $alumno["apellido"]?></td>
            <td scope="col"><?= $alumno["nombre"]?></td>
            <td scope="col"><?= $alumno["nomcar"]?></td>
            <td scope="col"><?= $alumno["nomcur"]?></td>
            <td scope="col"><?= $alumno["inicio"]?></td>
            <td scope="col"><?= $alumno["fin"]?></td>
            <td>
                        <?php if ($alumno["nota"] > 10.5) : ?>
                            <strong class="text-primary"><?= $alumno["nota"] ?></strong>
                        <?php else : ?>
                            <strong class="text-danger"><?= $alumno["nota"] ?></strong>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if ($alumno["estado"] =="Aprobado" ) : ?>
                            <strong class="text-primary"><?= $alumno["estado"] ?></strong>
                        <?php else : ?>
                            <strong class="text-danger"><?= $alumno["estado"] ?></strong>
                        <?php endif; ?>
                    </td>
        </tr>
    </tbody>
</table>



<?php
    require_once("c://xampp/htdocs/pryalumno/view/head/footer.php");
?>