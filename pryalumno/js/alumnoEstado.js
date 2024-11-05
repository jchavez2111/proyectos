function updateEstado() {
    var nota = parseFloat(document.getElementById('nota').value);
    var estado = document.getElementById('estado');

    if (!isNaN(nota)) {
        if (nota >= 10.5) {
            estado.value = 'Aprobado';
        } else {
            estado.value = 'Desaprobado';
        }
    } else {
        estado.value = '';
    }
}

// Call updateEstado on page load
window.onload = function () {
    updateEstado();
};