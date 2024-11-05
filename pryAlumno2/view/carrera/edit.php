<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Carrera</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <!-- Modal -->
        <div class="modal fade" id="editModal<?= $carrera['idcarrera'] ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $carrera['idcarrera'] ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel<?= $carrera['idcarrera'] ?>">Editar Carrera</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="index.php?action=edit&id=<?= $carrera['idcarrera'] ?>" method="post">
                            <div class="mb-3">
                                <label for="idcarrera" class="form-label">Id</label>
                                <input type="text" readonly class="form-control" id="idcarrera" name="idcarrera" value="<?= $carrera['idcarrera'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="nomcar" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nomcar" name="nomcar" value="<?= $carrera['nomcar'] ?>">
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>