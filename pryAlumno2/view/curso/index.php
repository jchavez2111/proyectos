<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Cursos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container"><br>
        <h1>Lista de Cursos</h1>        
        <?php include_once 'view/curso/create.php'; ?>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Editar</th>
                <th>Delete</th>
            </tr>
            <?php foreach ($cursos as $curso) : ?>
                <tr>
                    <td><?= $curso['idcurso'] ?></td>
                    <td><?= $curso['nomcur'] ?></td>
                    <td>
                        <button type="button" class="btn btn-warning" 
                        data-bs-toggle="modal" data-bs-target="#editModal<?= $curso['idcurso'] ?>">
                        Editar
                    </button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#deleteModal<?= $curso['idcurso'] ?>">
                        Eliminar
                    </button>
                    </td>

                </tr>
                <?php include 'view/curso/edit.php'; ?>
                <?php include 'view/curso/delete.php'; ?>
            <?php endforeach; ?>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>