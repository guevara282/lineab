<?php include("db.php"); ?>
<?php include "agregar.php"; ?>
<?php
require_once ("db.php");
function generarOpcionesMoneda($conn) {
    $monedas = obtenerMonedas($conn);

    foreach ($monedas as $moneda) {
        echo "<option value='" . $moneda['id'] . "'>" . $moneda['tipo'] . "</option>";
    }
}
?>
<?php
require_once ("db.php");
function generarDocumentos($conn) {
    $documentos = obtenerDocumentos($conn);
    if (empty($documentos)) {
        echo '<tr><td colspan="4">No hay documentos disponibles.</td></tr>';
    }else{
        
    foreach ($documentos as $documento) {
        echo "<tr>";
        echo "<td>" . $documento['id'] . "</td>";
        echo "<td>" . $documento['titulo'] . "</td>";
        echo "<td>" . $documento['contenido'] . "</td>";
        echo '<td>';
        echo '<button class="btn btn-primary">Editar</button>';
        echo '<button class="btn btn-danger">Eliminar</button>';
        echo '</td>';
        echo "</tr>";
    }}
   
}
?>
<?php include('includes/header.php'); ?>

<form action="guardarevento.php" method="POST">
    <div class="container mt-4">
        <ul class="nav nav-tabs" id="myTabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#info">Información Básica</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#cronograma">Cronograma</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#documentos">Documentos</a>
            </li>
        </ul>

        <div class="tab-content mt-3">
            <div class="tab-pane active" id="info">

                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>Información</h2>
                            <div class="form-group">
                                <label for="objeto">Objeto:</label>
                                <input type="text" class="form-control" id="objeto" name="objeto" placeholder="Objeto"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción/Alcance:</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="4"
                                    placeholder="Descripción/Alcance"></textarea>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="moneda">Moneda:</label>
                                    <select class="form-control" id="moneda" name="moneda">
                                        <?php generarOpcionesMoneda($conn); ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="numpresupuestoero">Presupuesto:</label>
                                    <input type="number" class="form-control" id="presupuesto" name="presupuesto"
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <h2>Actividad</h2>
                            <div class="form-group">
                                <label for="actividad">Buscar Actividad:</label>
                                <input type="text" class="form-control" id="actividad" name="actividad"
                                    placeholder="Buscar Actividad" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="cronograma">
                <h2>Cronograma</h2>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <h2>Fecha Inicio</h2>
                            <div class="form-group">
                                <label for="fechainicio">Fecha:</label>
                                <input type="date" class="form-control" id="fechainicio" name="fechainicio" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h2>Hora Inicio</h2>
                            <div class="form-group">
                                <label for="horainicio">Hora:</label>
                                <input type="time" class="form-control" id="horainicio" name="horainicio" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h2>Fecha Cierre</h2>
                            <div class="form-group">
                                <label for="fechacierre">Fecha:</label>
                                <input type="date" class="form-control" id="fechacierre" name="fechacierre" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h2>Hora Cierre</h2>
                            <div class="form-group">
                                <label for="horacierre">Hora:</label>
                                <input type="time" class="form-control" id="horacierre" name="horacierre" required>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="tab-pane" id="documentos">
                <h2>Tabla de Datos</h2>
                <div class="container">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Título </th>
                                <th>Contenido</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="fileTableBody">
                            <td>1</td>
                            <td><input type="text" class="form-control" id="titulo" name="titulo" required/></td>
                            <td><input type="text" class="form-control" id="titulo" name="titulo" /></td>
                            <td>
                                <input type="file" name="archivo" />
                                <button onclick="eliminarFila(this)">Eliminar</button>
                            </td>
                        </tbody>
                    </table>
                    <button type="buton" class="btn btn-success" data-toggle="modal" onclick="agregarFila()">Agregar
                        Archivo</button>
                </div>

            </div>
            <!-- Botón de guardar -->
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</form>
<script src="filas.js"></script>
<?php include('includes/footer.php'); ?>