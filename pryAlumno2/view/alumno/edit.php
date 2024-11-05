<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Alumno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <!-- Modal -->
        <div class="modal fade" id="editModal<?= $alumno['id'] ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $alumno['id'] ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel<?= $alumno['id'] ?>">Editar alumno</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="index.php?action=edit&id=<?= $alumno['id'] ?>" method="post">
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="id" class="form-label">Id</label>
                                    <input type="text" readonly class="form-control" id="id" name="id" value="<?= $alumno['id'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="apellido" class="form-label">Apellido</label>
                                    <input type="text" class="form-control" id="apellido" name="apellido" value="<?= $alumno['apellido'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $alumno['nombre'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="idcarrera" class="form-label">ID Carrera:</label>
                                    <select class="form-select" name="idcarrera" id="idcarrera">
                                        <option value="0">Seleccionar</option>
                                        <?php foreach ($carreras as $carrera) : ?>
                                            <option value="<?= $carrera["idcarrera"] ?>" <?= ($carrera["idcarrera"] == $alumno["idcarrera"]) ? 'selected' : '' ?>><?= $carrera["nomcar"] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="idcurso" class="form-label">ID Curso:</label>
                                    <select class="form-select" name="idcurso" id="idcurso">
                                        <option value="0">Seleccionar</option>
                                        <?php foreach ($cursos as $curso) : ?>
                                            <option value="<?= $curso["idcurso"] ?>" <?= ($curso["idcurso"] == $alumno["idcurso"]) ? 'selected' : '' ?>><?= $curso["nomcur"] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="inicio" class="form-label">Inicio:</label>
                                    <input type="date" class="form-control" id="inicio" name="inicio" required value="<?= htmlspecialchars($alumno['inicio']) ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="fin" class="form-label">Fin:</label>
                                    <input type="date" class="form-control" id="fin" name="fin" required value="<?= htmlspecialchars($alumno['fin']) ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="nota" class="form-label">Nota:</label>
                                    <input type="text" class="form-control" id="nota" name="nota" required oninput="updateEstado()" value="<?= $alumno['nota'] ?>">
                                </div>
                                
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>