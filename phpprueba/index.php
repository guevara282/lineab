<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <!-- MESSAGES -->

            <?php if (isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message']?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php session_unset(); } ?>

            <!-- ADD TASK FORM -->
            <div class="card card-body">

                <div class="form-group">
                    <h1>Procesos/Eventos</h1>
                    <div>
                        <input id="accederBtn" name="save_task" class="btn btn-success btn-block" value="Acceder">
                    </div>
                    <div class="card card-body" id="botonesOcultos" style="display: none;">
                        <div class="btn-group btn-group-horizontal">
                            <form action="eventoparticiapioncerrada.php" method="POST">
                                <input type="submit" name="crear" class="btn btn-success btn-block " value="Crear">
                            </form>
                            <form action="">
                                <input type="submit" name="save_task" class="btn btn-success btn-block " value="Copiar">
                            </form>
                            <form action="">
                                <input type="submit" name="save_task" class="btn btn-success btn-block "
                                    value="Consultar">
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-8">

        </div>
    </div>
</main>
<script src="script.js"></script>
<?php include('includes/footer.php'); ?>