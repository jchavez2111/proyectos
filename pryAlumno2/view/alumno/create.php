<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Crear Alumno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
        Registrar Alumno
    </button>
    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar Alumno</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="index.php?action=create" method="POST">
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="apellido" class="form-label">Apellido:</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" required>
                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="mb-3">
                                <label for="idcarrera">ID Carrera:</label>
                                <select class="form-select" name="idcarrera" id="idcarrera">
                                    <option value="0">Seleccionar</option>
                                    <?php foreach ($carreras as $carrera) : ?>
                                        <option value="<?= $carrera["idcarrera"] ?>"><?= $carrera["nomcar"] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="idcurso">ID Curso:</label>
                                <select class="form-select" name="idcurso" id="idcurso">
                                    <option value="0">Seleccionar</option>
                                    <?php foreach ($cursos as $curso) : ?>
                                        <option value="<?= $curso["idcurso"] ?>"><?= $curso["nomcur"] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="inicio" class="form-label">Inicio:</label>
                                <input type="date" class="form-control" id="inicio" name="inicio" required>
                            </div>
                            <div class="mb-3">
                                <label for="fin" class="form-label">Fin:</label>
                                <input type="date" class="form-control" id="fin" name="fin" required>
                            </div>
                            <div class="mb-3">
                                <label for="nota">Nota:</label>
                                <input type="text" class="form-control" id="nota" name="nota" required oninput="updateEstado()">
                            </div>
                            
                        </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Guardar" class="btn btn-primary">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>

</html>