<style>
    /* Fuente y color general */
    .table-estilos {
        font-family: 'Century Gothic', sans-serif;
        font-size: 15px;
    }

    /* Encabezado personalizado */
    .table-estilos thead {
        background-color: #00984F !important;
        color: white !important;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .table-estilos thead th {
        font-family: 'Century Gothic', sans-serif;
        font-size: 16px;
        padding: 10px;
        border: 1px solid #ccc;
        text-align: center;
    }

</style>

<section class="container mt-12">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 mt-10">
            <table class="table-estilos table display nowrap table-striped table-bordered scroll-horizontal table-hover" cellspacing="0" name="table" id="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Actividad</th>
                        <th>Fecha</th>
                        <th>Tiempo</th>
                        <th>Logros</th>
                        <th>Intentos</th>
                        <th>Estrellas</th>
                        <!-- <th>Evaluación</th> -->
                        <th>Informe de Aventura</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</section>
<!-- <?php print_r($prgreso_list) ?> -->
<script src="<?php echo base_url('assets/js/evaluacion_ejercicios/index.js') ?>"></script>