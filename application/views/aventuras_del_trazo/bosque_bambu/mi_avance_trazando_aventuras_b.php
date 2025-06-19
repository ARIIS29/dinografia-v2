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
        <div class="col-lg-12 col-md-12 d-flex align-items-center mt-10">
            <!-- Imagen -->
            <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/dino-lapiz-avance.png') ?>" alt="Img-Dino-Indicaciones" class="img-fluid me-4 d-none d-sm-block" id="dino" width="5%">
            <!-- Texto -->
            <p class="texto_tabla_bambu"> <b>¡Hola <?php echo $this->session->userdata('usuario') ?>!</b></p>
        </div>

        <table class="table-estilos table display nowrap table-striped table-bordered scroll-horizontal table-hover" cellspacing="0" name="table" id="table">
            <thead>
                <tr>
                    <th class="">#</th>
                    <th class="">Lección</th>
                    <th class="">Fecha</th>
                    <th class="">Evaluacion</th>
                </tr>
            </thead>
        </table>
    </div>
    </div>
</section>
<!-- <?php print_r($prgreso_list) ?> -->
<script src="<?php echo base_url('assets/js/evaluacion_lecciones/index.js') ?>"></script>
