<!DOCTYPE html>
<html>

<head>
    <title>Listado de Artículos</title>
    <!-- Incluir Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Incluir Datatables CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
</head>

<body>
    <div class="container">
        <br>
        <h1>Listado de Artículos</h1>
        <?php include_once 'create.php'; ?>
        <br>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($articulos as $articulo) : ?>
                    <tr>
                        <td><?php echo $articulo['codigo']; ?></td>
                        <td><?php echo $articulo['descripcion']; ?></td>
                        <td><?php echo number_format($articulo['precio'], 2); ?></td>
                        <td>
                            <button class="updateArticulo btn btn-warning" data-bs-toggle="modal" data-bs-target="#actualizarArticuloModal" data-codigo="<?php echo $articulo['codigo']; ?>" data-descripcion="<?php echo htmlspecialchars($articulo['descripcion']); ?>" data-precio="<?php echo $articulo['precio']; ?>">Actualizar</button>
                        </td>
                        <td>
                            <button class="deleteArticulo btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarArticuloModal" data-codigo="<?php echo $articulo['codigo']; ?>" data-descripcion="<?php echo htmlspecialchars($articulo['descripcion']); ?>">Eliminar</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php include_once 'update.php'; ?>
        <?php include_once 'delete.php'; ?>
    </div>

    <!-- Incluir jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Incluir Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Incluir Datatables JS -->
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>

    <script>
    $(document).ready(function() {
        $('#example').DataTable({
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "No se encontró nada - lo siento",
                "info": "Mostrando la página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                "search": "Buscar: "
            },
            // Esto establece los valores iniciales del menú desplegable
            "lengthMenu": [
                [5, 10, 25, 50, 100],
                [5, 10, 25, 50, 100]
            ]
        });
    });
</script>

</body>

</html>