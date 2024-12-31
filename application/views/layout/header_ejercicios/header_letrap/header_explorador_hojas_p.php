<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explorado hojas - letra p</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap-css/bootstrap.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/mystyle_ejercicios/mystyle_letrab/mystyle_explorador_hojas_b.css') ?>">
    <link rel="shortcut icon" href="<?php echo base_url('almacenamiento/img/letra-p/dino-lapiz-azul.png') ?>" type="image/x-icon">


    <head>
    </head>


</head>

<body class="body-playa">
    <section id="header-inicial">
        <nav class="navbar navbar-color navbar-expand-lg navbar-light fixed-top">
            <div class="container-fluid">
                <div class="col-lg-3 col-md-3">
                    <a class="nav-link" href="<?php echo base_url('ejercicios/ejercicios_letra_p') ?>"><img src="<?php echo base_url('almacenamiento/img/btn-regresar.png') ?>" alt="" class="img-fluid" width="30%"></a>
                </div>
                <div class="col-lg-5 col-md-5 text-center d-none d-sm-block">
                    <img src="<?php echo base_url('almacenamiento/img/letra-p/playa-palmeras-titulo.png') ?>" alt="" class="img-fluid" width="90%">
                </div>
                <!-- <div class="col-lg-4 col-md-4 row d-flex justify-content-end">
                    <div class="col-lg-4 col-md-4 d-none d-sm-block btn-lecciones">
                        <a class="nav-link" href="<?php echo base_url('RutaTrazo') ?>">
                            <img src="<?php echo base_url('almacenamiento/img/btn-rutatrazo.png') ?>" alt="" class="img-fluid enlargable">
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 d-none d-sm-block btn-ejercicios">
                        <a class="nav-link" href="<?php echo base_url('galeria/Galeriab') ?>">
                            <img src="<?php echo base_url('almacenamiento/img/letra-b/btn-galeriab.png') ?>" alt="" class="img-fluid enlargable">
                        </a>
                    </div>
                </div> -->
                <button class="navbar-toggler float-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <form class="d-flex ms-auto d-block d-sm-none">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('RutaTrazo') ?>">Ruta del trazo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('galeria/Galeriab') ?>">Galeria b</a>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </nav>
    </section>
    <section id="header-juego" class="d-none">
        <nav class="navbar navbar-color navbar-expand-lg navbar-light fixed-top">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <a class="nav-link" href="<?php echo base_url('ejercicios/ejercicios_letra_p/explorador_hojas_p') ?>"><img src="<?php echo base_url('almacenamiento/img/btn-regresar.png') ?>" alt="" class="img-fluid" width="30%"></a>
                    </div>
                    <div class="col-lg-6 col-md-6 d-flex justify-items-center d-none d-sm-block">
                        <img src="<?php echo base_url('almacenamiento/img/titulos/explorando_hojas.png') ?>" alt="" class="img-fluid" width="90%">
                    </div>
                    <div class="col-lg-3 col-md-3 d-flex justify-items-center ">
                        <div class="col-lg-4 col-md-4 d-flex align-items-center">
                            <img src="<?php echo base_url('almacenamiento/img/reloj.png') ?>" alt="" class="img-fluid" width="40%">
                            <span class="text-azul" id="temporizador">00:00</span>
                        </div>
                        <div class="col-lg-4 col-md-4 d-flex align-items-center">
                            <img src="<?php echo base_url('almacenamiento/img/hojas/hojap.png') ?>" alt="" class="img-fluid ms-4" width="40%">
                            <span class="text-azul" id="contadorPuntos">0</span>
                        </div>
                        <div class="col-lg-4 col-md-4 d-flex align-items-center">
                            <img src="<?php echo base_url('almacenamiento/img/estrella.png') ?>" alt="" class="img-fluid ms-1" width="40%">
                            <span class="text-azul" id="contadorEstrellas">0</span>
                        </div>


                    </div>
                </div>

                <!-- <button class="navbar-toggler float-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <form class="d-flex ms-auto">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="#menuLecciones"><img src="<?php echo base_url('almacenamiento/img/lecciones.svg') ?>" alt="" class="img-fluid"></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#aplicacion"><img src="<?php echo base_url('almacenamiento/img/ejercicios.svg') ?>" alt="" class="img-fluid"></a>
                            </li>
                        </ul>
                    </form>
                </div> -->
            </div>
        </nav>
    </section>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>