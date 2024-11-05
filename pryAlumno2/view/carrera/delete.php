<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Eliminar Carrera</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <!-- Modal -->
        <div class="modal fade" 
        id="deleteModal<?= $carrera['idcarrera'] ?>" 
        tabindex="-1" aria-labelledby="deleteModalLabel<?= $carrera['idcarrera'] ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel<?= $carrera['idcarrera'] ?>">Eliminar Carrera</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="index.php?action=delete&id=<?= $carrera['idcarrera'] ?>" method="post">                            
                            <div class="mb-3">
                                ¿ Esta seguro en eliminar la carrera de <strong> <?= $carrera['nomcar'] ?></strong> ?
                            </div>
                            <button type="submit" class="btn btn-primary">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
