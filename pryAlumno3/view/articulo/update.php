<!DOCTYPE html>
<html>

<head>
    <title>Actualizar Artículo</title>

</head>

<body>
    <div class="container">
        <!-- Modal -->
        <div class="modal fade" id="actualizarArticuloModal" tabindex="-1" role="dialog" aria-labelledby="actualizarArticuloModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="actualizarArticuloModalLabel">Actualizar Artículo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formActualizarArticulo">
                            <div class="form-group">
                                <label for="codigo_modal">Codigo:</label>
                                <input type="text" class="form-control" id="codigo_modal" name="codigo_modal" readonly>
                            </div>
                            <div class="form-group">
                                <label for="descripcion_modal">Descripción:</label>
                                <input type="text" class="form-control" id="descripcion_modal" name="descripcion_modal">
                            </div>
                            <div class="form-group">
                                <label for="precio_modal">Precio:</label>
                                <input type="text" class="form-control" id="precio_modal" name="precio_modal">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" id="actualizarArticulo">Actualizar</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Llenar el formulario del modal con los datos del artículo
                document.querySelectorAll(".updateArticulo").forEach(button => {
                    button.addEventListener("click", function() {
                        const codigo = this.getAttribute("data-codigo");
                        const descripcion = this.getAttribute("data-descripcion");
                        const precio = this.getAttribute("data-precio");

                        document.getElementById("codigo_modal").value = codigo;
                        document.getElementById("descripcion_modal").value = descripcion;
                        document.getElementById("precio_modal").value = parseFloat(precio).toFixed(2);

                        $('#actualizarArticuloModal').modal('show');
                    });
                });

                // Cuando se hace click en el botón "Actualizar" del modal
                document.getElementById("actualizarArticulo").addEventListener("click", function(e) {
                    e.preventDefault();
                    const codigo = document.getElementById("codigo_modal").value;
                    const descripcion = document.getElementById("descripcion_modal").value;
                    let precio = parseFloat(document.getElementById("precio_modal").value).toFixed(2);

                    fetch('ajax/articulos.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            body: `codigo=${encodeURIComponent(codigo)}&descripcion=${encodeURIComponent(descripcion)}&precio=${encodeURIComponent(precio)}&action=update`
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