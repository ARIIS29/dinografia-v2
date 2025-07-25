<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trazando Avneturas "d"</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap-css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/mystyle_desierto.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/mystyle_general.css') ?>">
    <link rel="shortcut icon" href="<?php echo base_url('almacenamiento/img/dinografia/dinografia-dino-lapiz.png') ?>" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

</head>


<body>
    <section>
        <nav class="navbar navbar-color navbar-expand-lg navbar-light fixed-top d-none d-sm-block">
            <div class="container-fluid">

                <div class="col-lg-3 col-md-3 justify-aling-center tipografia">
                    <a href="<?php echo site_url('letras/desierto') ?>" class="btn boton-regresar-desierto float-start"> <i class="fas fa-arrow-left"></i></a>
                </div>
                <div class="col-lg-6 col-md-6 justify-aling-center text-center d-none d-md-block">
                    <h1 class="titulo-h1-desierto">TRAZANDO AVENTURAS</h1>
                </div>
                <div class="col-lg-6 col-md-6 justify-aling-center text-center d-block d-md-none">
                    <h1 class="titulo-h1-desierto-movil">TRAZANDO AVENTURAS</h1>
                </div>
                <div class="col-lg-3 col-md-3 justify-aling-center tipografia">
                    <a href="<?php echo site_url('login/cerrar_sesion') ?>" id="cerrarSesion" class="btn boton-cerrar-sesion float-end">Cerrar sesión</a>
                </div>

            </div>
        </nav>

        <nav class="navbar navbar-color navbar-expand-lg navbar-light fixed-top d-block d-sm-none">
            <div class="container-fluid">
                <a href="<?php echo site_url('letras/desierto') ?>" class="btn boton-regresar-desierto float-start"> <i class="fas fa-arrow-left"></i></a>
                <button class="navbar-toggler float-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <form class="d-flex ms-auto">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <div class="col-lg-3 col-md-3 justify-aling-center tipografia">
                                    <a href="<?php echo site_url('login/cerrar_sesion') ?>" id="cerrarSesion" class="btn boton-cerrar-sesion float-end">Cerrar sesión</a>
                                </div>
                            </li>

                        </ul>
                    </form>
                </div>
            </div>
        </nav>
    </section>