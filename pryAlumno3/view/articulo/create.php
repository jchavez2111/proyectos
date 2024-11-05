<!DOCTYPE html>
<html>

<head>
    <title>Listado de Artículos</title>
</head>

<body>
    <div class="container">
        <!-- Botón para abrir el modal -->
        <button id="crearArticulo" class="btn btn-primary" data-toggle="modal" data-target="#crearArticuloModal">Crear Artículo</button>

        <!-- Modal -->
        <div class="modal fade" id="crearArticuloModal" tabindex="-1" role="dialog" aria-labelledby="crearArticuloModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="crearArticuloModalLabel">Crear Artículo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formArticulo">
                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion">
                            </div>
                            <div class="form-group">
                                <label for="precio">Precio:</label>
                                <input type="text" class="form-control" id="precio" name="precio">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" id="guardarArticulo">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Cuando se hace clic en el botón "Crear Artículo"
                document.getElementById('crearArticulo').addEventListener('click', function() {
                    $('#crearArticuloModal').modal('show'); // Mostrar el modal
                });

                // Cuando se hace clic en el botón "Guardar" del modal
                document.getElementById('guardarArticulo').addEventListener('click', function() {
                    const descripcion = document.getElementById('descripcion').value;
                    const precio = document.getElementById('precio').value;

                    fetch('ajax/articulos.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            body: new URLSearchParams({
                                descripcion: descripcion,
                                precio: precio,
                                action: 'create'
                            })
                        })
                        .then(response => response.text())
                        .then(responseText => {
                            alert(responseText);
                            location.reload();
                        })
                        .catch(error => console.error('Error:', error));
                });
            });
        </script>
    </div>
</body>

</html>