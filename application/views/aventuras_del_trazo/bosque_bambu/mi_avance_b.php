<section class="container mt-12">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 mt-5">
            <table class="table display nowrap table-striped table-bordered scroll-horizontal table-hover text-center" cellspacing="0" name="table" id="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Fecha</th>
                        <th>Actividad</th>
                        <th>Cronómetro</th>
                        <th>Aciertos</th>
                        <th>Incorrectas</th>
                        <th>Estrellas</th>
                        <th>Evaluación</th>
                        <th>Observaciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</section>
<script src="<?php echo base_url('assets/js/evaluacion_ejercicios/index.js') ?>"></script>

<script>
    // Mostrar el modal automáticamente cuando se carga la página
    window.addEventListener('DOMContentLoaded', (event) => {
        var myModal = new bootstrap.Modal(document.getElementById('modalInstrucciones'), {
            keyboard: false // No cerrará el modal con la tecla ESC
        });
        myModal.show();
    });
</script>
<?php print_r($prgreso_list)?>