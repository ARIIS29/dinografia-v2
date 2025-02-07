<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explorador de hojas - b</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap-css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/mystyle_bosque_bambu.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/mystyle_general.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/estilos_juegos/mystyle_explorador_hojas.css') ?>">
    <link rel="shortcut icon" href="<?php echo base_url('almacenamiento/img/dinografia/dinografia-dino-lapiz.png') ?>" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="body-explorando-letrab">
    <section>
        <nav class="navbar navbar-color navbar-expand-lg navbar-light fixed-top">
            <div class="container-fluid">
                <div class="col-lg-3 col-md-3 justify-aling-center tipografia">
                    <a href="<?php echo site_url('letras/bosque_bambu/explora_y_descubre_b') ?>" class="btn boton-regresar-bambu float-start"> <i class="fas fa-arrow-left"></i></a>
                </div>
                <div class="col-lg-6 col-md-6 justify-aling-center text-center">
                    <h1 class="titulo-h1-bambu">EXPLORADOR DE HOJAS</h1>
                </div>
                <div class="col-lg-3 col-md-3 d-flex justify-items-center ">
                        <div class="col-lg-4 col-md-4 d-flex align-items-center">
                            <img src="<?php echo base_url('almacenamiento/img/dinografia/reloj.png') ?>" alt="" class="img-fluid" width="40%">
                            <span class="text-azul" id="temporizador">00:00</span>
                        </div>
                        <div class="col-lg-4 col-md-4 d-flex align-items-center">
                            <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/hojab.png') ?>" alt="" class="img-fluid ms-4" width="40%">
                            <span class="text-azul" id="contadorPuntos">0</span>
                        </div>
                        <div class="col-lg-4 col-md-4 d-flex align-items-center">
                            <img src="<?php echo base_url('almacenamiento/img/dinografia/estrella.png') ?>" alt="" class="img-fluid ms-1" width="40%">
                            <span class="text-azul" id="contadorEstrellas">0</span>
                        </div>

                    </div>

            </div>
        </nav>
    </section>



    