<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cazadores</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap-css/bootstrap.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/mystyle_cazadores.css') ?>">
    <link rel="shortcut icon" href="<?php echo base_url('almacenamiento/img/dino-lapiz.png') ?>" type="image/x-icon">

    <head>
    </head>


</head>

<body>
    <section>
        <nav class="navbar navbar-color navbar-expand-lg navbar-light fixed-top">
            <div class="container-fluid">
                <div class="col-lg-3 col-md-3">
                    <a class="nav-link" href="<?php echo base_url('MenuPrincipal') ?>"><img src="<?php echo base_url('almacenamiento/img/btn-regresar.png') ?>" alt="" class="img-fluid" width="30%"></a>
                </div>
                <div class="col-lg-6 col-md-6 d-flex justify-items-center d-none d-sm-block">
                    <img src="<?php echo base_url('almacenamiento/img/titulos/explorando_caminos.png') ?>" alt="" class="img-fluid" width="90%">
                </div>
                <div class="col-lg-3 col-md-3 row">
                    <div class="col-lg-6 col-md-6 d-flex align-items-center">
                        <img src="<?php echo base_url('almacenamiento/img/reloj.png') ?>" alt="" class="img-fluid me-2" width="40%">
                        <span id="minutos">0</span>:<span id="segundos">00</span>
                    </div>
                    <div class="col-lg-6 col-md-6 d-flex align-items-center">
                        <img src="<?php echo base_url('almacenamiento/img/hojas/hojab.png') ?>" alt="" class="img-fluid me-2" width="40%">
                        <div id="marcador">
                            <progress id="barraProgreso" value="0" max="100" class="mt-2"></progress>
                        </div>
                        <span id="puntaje">0</span>

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