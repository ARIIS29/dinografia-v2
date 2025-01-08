<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guía del Dino Explorador</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap-css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/mystyle_guia_dino_explorador.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/mystyle_general.css') ?>">
    <link rel="shortcut icon" href="<?php echo base_url('almacenamiento/img/dinografia/dinografia-dino-lapiz.png') ?>" type="image/x-icon">
</head>


<body>
    <section>
        <nav class="navbar navbar-color navbar-expand-lg navbar-light fixed-top">
            <div class="container-fluid">
                <div class="col-lg-3 col-md-3">
                    <a class="nav-link" href="<?php echo base_url('Dinografia') ?>"><img src="<?php echo base_url('almacenamiento/img/dinografia/dinografia-log2.svg') ?>" alt="" class="img-fluid"></a>
                </div>
                <div class="col-lg-6 col-md-6 justify-aling-center text-center">
                    <img src="<?php echo base_url('almacenamiento/img/titulos/guia_dino_explorador.png') ?>" alt="Dinografía" class="img-fluid" width="100%">
                </div>
                <div class="col-lg-3 col-md-3 justify-aling-center">
                    <a href="<?php echo site_url('login/cerrar_sesion') ?>" id="cerrarSesion" class="btn btn-danger float-end">Cerrar sesion</a>
                </div>

            </div>
        </nav>
    </section>

    