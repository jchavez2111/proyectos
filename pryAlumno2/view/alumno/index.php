<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Alumnos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container"><br>
        <h1>Lista de alumnos</h1>
        <?php include_once 'view/alumno/create.php'; ?>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>Apellido</th>
                <th>Nombre</th>
                <th>Carrera</th>
                <th>Curso</th>
                <th>Inicio</th>
                <th>Fin</th>
                <th>Nota</th>
                <th>Estado</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
            <?php foreach ($alumnos as $alumno) : ?>
                <tr>
                    <td><?= $alumno['id'] ?></td>
                    <td><?= $alumno['apellido'] ?></td>
                    <td><?= $alumno['nombre'] ?></td>
                    <td><?= $alumno['carrera'] ?></td>
                    <td><?= $alumno['curso'] ?></td>
                    <td><?= $alumno['inicio'] ?></td>
                    <td><?= $alumno['fin'] ?></td>
                    <td>
                        <?php if ($alumno["nota"] > 10.5) : ?>
                            <strong class="text-primary"><?= $alumno["nota"] ?></strong>
                        <?php else : ?>
                            <strong class="text-danger"><?= $alumno["nota"] ?></strong>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if ($alumno["estado"] == "Aprobado") : ?>
                            <strong class="text-primary"><?= $alumno["estado"] ?></strong>
                        <?php else : ?>
                            <strong class="text-danger"><?= $alumno["estado"] ?></strong>
                        <?php endif; ?>
                    </td>
                    <td>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $alumno['id'] ?>">
                            Editar
                        </button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $alumno['id'] ?>">
                            Eliminar
                        </button>
                    </td>

                </tr>
                <?php include 'view/alumno/edit.php'; ?>
                <?php include 'view/alumno/delete.php'; ?>
            <?php endforeach; ?>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/alumno.js"></script>
</body>

</html>
