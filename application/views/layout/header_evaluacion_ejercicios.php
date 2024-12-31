<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aventuras del Trazo</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/tables/datatables/datatables.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/extensions/responsive.dataTables.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap-css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/mystyle_evaluacion_ejercicios.css') ?>">
    <link rel="shortcut icon" href="<?php echo base_url('almacenamiento/img/dino-lapiz.png') ?>" type="image/x-icon">
</head>


<body>
    <section>
        <nav class="navbar navbar-color navbar-expand-lg navbar-light fixed-top">
            <div class="container-fluid">
                <div class="col-lg-3 col-md-3">
                    <a class="nav-link" href="<?php echo base_url('MenuPrincipal') ?>"><img src="<?php echo base_url('almacenamiento/img/btn-regresar.png') ?>" alt="" class="img-fluid" width="30%"></a>
                </div>

                <div class="col-lg-9 col-md-9 justify-aling-center">
                    <a class="nav-link" href="<?php echo base_url('') ?>"><img src="<?php echo base_url('almacenamiento/img/titulos/evaluacion_aventutas.png') ?>" alt="" class="img-fluid"></a>

                </div>
            </div>
        </nav>
    </section>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('assets/js/tables/datatables/datatables.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/tables/datatables/dataTables.responsive.min.js') ?>"></script>