<div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="agregardocumento">Agregar documento</h3>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div class="modal-body">

                <form action="guardardocumento.php" method="POST" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="Titulo" class="form-label">Titulo</label>
                                <input type="text" id="titulo" name="titulo" class="form-control" required>

                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="Contenido" class="form-label">Contenido</label>
                                <input type="text" id="contenido" name="contenido"  class="form-control" value=" ">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="documento" class="form-label">Archivo(WORD & PDF)</label>
                        <input type="file" id="archivo"  name="archivo" class="form-control" required>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="registrar" name="registrar">Guardar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>

            </div>

            </form>
        </div>
    </div>
</div>