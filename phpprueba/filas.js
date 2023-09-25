let filaCounter = 1; // Comenzar desde 1 para incluir la fila por defecto

function agregarFila() {
    const tablaBody = document.getElementById('fileTableBody');
    const filas = tablaBody.querySelectorAll('tr');

    // Verificar si todas las filas tienen archivos cargados
    let todasLasFilasTienenArchivos = true;

    filas.forEach((fila, index) => {
        const archivoInput = fila.querySelector('input[type="file"]');
        if (!archivoInput.files.length) {
            todasLasFilasTienenArchivos = false;
        }
    });

    if (todasLasFilasTienenArchivos) {
        const nuevaFila = document.createElement('tr');

        nuevaFila.innerHTML = `
            <td>${filaCounter}</td>
            <td><input type="text" class="form-control" id="objeto" name="objeto"${filaCounter}" required/></td>
            <td><input type="text" class="form-control" id="objeto" name="objeto" ${filaCounter}" /></td>
            <td>
                <input type="file" name="archivo${filaCounter}" />
                <button onclick="eliminarFila(this)">Eliminar</button>
            </td>
        `;

        tablaBody.appendChild(nuevaFila);
        filaCounter++;
    } else {
        alert('Cargue un archivo en todas las filas antes de agregar una nueva fila.');
    }
}

function eliminarFila(button) {
    const fila = button.parentNode.parentNode;
    fila.remove();
}
