
  // Escuchar el clic en el botón "Acceder"
  document.getElementById('accederBtn').addEventListener('click', function () {
        // Ocultar el botón "Acceder"
        this.style.display = 'none';
        // Mostrar los botones ocultos
        document.getElementById('botonesOcultos').style.display = 'block';
    });
