<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trazando en la Arena - b</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap-css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/mystyle_bosque_bambu.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/mystyle_general.css') ?>">
    <link rel="shortcut icon" href="<?php echo base_url('almacenamiento/img/dinografia/dinografia-dino-lapiz.png') ?>" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body class="body-explorando-letrab">
    <section>
        <nav class="navbar navbar-color navbar-expand-lg navbar-light fixed-top d-none d-sm-block">
            <div class="container-fluid">

                <div class="col-lg-3 col-md-3 justify-aling-center tipografia">
                    <a href="<?php echo site_url('letras/bosque_bambu/trazando_aventuras_b') ?>" class="btn boton-regresar-bambu float-start"> <i class="fas fa-arrow-left"></i></a>
                </div>
                <div class="col-lg-6 col-md-6 justify-aling-center text-center">
                    <h1 class="titulo-h1-bambu">TRAZOS EN LA ARENA</h1>
                </div>
                <div class="col-lg-3 col-md-3  justify-content-end">
                    <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/estrella.png') ?>" alt="" class="img-fluid ms-5" width="15%">
                    <span class="texto_indicaciones_bambu ms-2" id="contadorEstrellas">0</span>
                </div>

            </div>
        </nav>
        <!-- vista para movil -->
        <nav class="navbar navbar-color navbar-expand-lg navbar-light fixed-top d-block d-sm-none">
            <div class="container-fluid">

                <a href="<?php echo site_url('letras/bosque_bambu/trazando_aventuras_b') ?>" class="btn boton-regresar-bambu float-start"> <i class="fas fa-arrow-left"></i></a>
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
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>