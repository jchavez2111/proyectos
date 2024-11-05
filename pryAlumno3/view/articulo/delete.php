<!DOCTYPE html>
<html>

<head>
    <title>Eliminar Artículo</title>
</head>

<body>
    <!-- Modal -->
    <div class="modal fade" id="eliminarArticuloModal" tabindex="-1" role="dialog" aria-labelledby="eliminarArticuloModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eliminarArticuloModalLabel">Eliminar Artículo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formEliminarArticulo">
                        ¿Está seguro que desea eliminar el artículo <strong id="articuloDescripcion"></strong>?
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="eliminarArticulo">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Cuando se hace click en el botón "Eliminar" del modal
            document.getElementById("eliminarArticulo").addEventListener("click", function(e) {
                e.preventDefault();
                // Aquí obtenemos el código del artículo
                const codigo = document.querySelector(".modal-footer").getAttribute("data-codigo");

                fetch('ajax/articulos.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: `codigo=${encodeURIComponent(codigo)}&action=delete`
                    })
                    .then(response => response.text())
                    .then(responseText => {
                        alert(responseText);
                        location.reload();
                    })
                    .catch(error => console.error('Error:', error));
            });

            // Llenar el formulario del modal con los datos del artículo
            document.querySelectorAll(".deleteArticulo").forEach(button => {
                button.addEventListener("click", function() {
                    const codigo = this.getAttribute("data-codigo");
                    const descripcion = this.getAttribute("data-descripcion");

                    // Mostrar la descripción del artículo en el modal
                    document.getElementById("articuloDescripcion").textContent = descripcion;
                    // Guardar el código del artículo en el pie del modal
                    document.querySelector(".modal-footer").setAttribute("data-codigo", codigo);

                    $('#eliminarArticuloModal').modal('show');
                });
            });
        });
    </script>

</body>

</html>