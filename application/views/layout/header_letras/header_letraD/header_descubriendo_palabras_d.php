<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descubriendo palabras d</title>
    <link href='https://fonts.googleapis.com/css?family=Cedarville Cursive' rel='stylesheet'>

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap-css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/mystyle_desierto.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/mystyle_general.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/estilos_juegos/mystyle_descubriendo_palabras.css') ?>">
    <link rel="shortcut icon" href="<?php echo base_url('almacenamiento/img/dinografia/dinografia-dino-lapiz.png') ?>" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="body-explorando-letrab">
    <section id="header-inicial">
        <nav class="navbar navbar-color navbar-expand-lg navbar-light fixed-top">
            <div class="container-fluid">
                <div class="col-lg-3 col-md-3 justify-aling-center tipografia">
                    <a href="<?php echo site_url('letras/desierto/explora_y_descubre_d') ?>" class="btn boton-regresar-desierto float-start" id="btnRegresar"> <i class="fas fa-arrow-left"></i></a>
                </div>
                <div class="col-lg-6 col-md-6 justify-aling-center text-center d-none d-md-block">
                    <h1 class="titulo-h1-desierto">DESCUBRIENDO PALABRAS</h1>
                </div>
                <div class="col-lg-6 col-md-6 justify-aling-center text-center d-block d-md-none">
                    <h1 class="titulo-h1-desierto-movil">DESCUBRIENDO PALABRAS</h1>
                </div>
                <div class="col-lg-3 col-md-3 justify-aling-center tipografia">
                    <a href="<?php echo site_url('login/cerrar_sesion') ?>" id="cerrarSesion" class="btn boton-cerrar-sesion float-end">Cerrar sesión</a>
                </div>

            </div>
        </nav>

    </section>

    <section id="header-juego" class="d-none">
        <nav class="navbar navbar-color-d navbar-expand-lg navbar-light fixed-top d-none d-md-block">
            <div class="container-fluid">
                <div class="col-lg-2 col-md-2 justify-aling-center tipografia">
                    <a href="<?php echo site_url('letras/desierto/descubriendo_palabras_d') ?>" class="btn boton-regresar-desierto float-start" id="btnRegresar"> <i class="fas fa-arrow-left"></i></a>
                </div>
                <div class="col-lg-6 col-md-6 justify-aling-center text-center texto_indicaciones_desierto">
                    <img id="dinoIndicaciones" src="<?php echo base_url('almacenamiento/img/desierto/dino-indicaciones.png') ?>" alt="Img-Dino-Indicaciones" class="img-fluid me-3" style="cursor: pointer;" width="8%">¡Vamos a descubrir la palabra oculta! 🔍 <br>Haz clic en el botón verde ✅ para verificar tu respuesta.
                </div>
                <div class="col-lg-3 col-md-3 d-flex justify-items-center texto_indicaciones_desierto">
                    <div class="col-lg-4 col-md-4 d-flex align-items-center">
                        <img src="<?php echo base_url('almacenamiento/img/desierto/reloj.png') ?>" alt="" class="img-fluid" width="40%">
                        <span class="text-azul" id="timer">00:00</span>
                    </div>
                    <div class="col-lg-4 col-md-4 d-flex align-items-center">
                        <img src="<?php echo base_url('almacenamiento/img/desierto/movimientos.png') ?>" alt="" class="img-fluid ms-4" width="40%">
                        <span class="text-azul" id="contadorVidas">3</span>
                    </div>
                    <div class="col-lg-4 col-md-4 d-flex align-items-center">
                        <img src="<?php echo base_url('almacenamiento/img/desierto/estrella.png') ?>" alt="" class="img-fluid ms-1" width="40%">
                        <span class="text-azul" id="contadorEstrellas">0</span>
                    </div>

                </div>

            </div>
        </nav>

        <nav class="navbar navbar-color navbar-expand-lg navbar-light fixed-top d-block d-md-none">
            <div class="container-fluid">
                <div class="col-lg-3 col-md-3 d-flex justify-items-center texto_indicaciones_desierto">
                    <div class="col-lg-4 col-md-4 d-flex align-items-center">
                        <img src="<?php echo base_url('almacenamiento/img/desierto/reloj.png') ?>" alt="" class="img-fluid" width="20%">
                        <span class="text-azul" id="timer">00:00</span>
                    </div>
                    <div class="col-lg-4 col-md-4 d-flex align-items-center">
                        <img src="<?php echo base_url('almacenamiento/img/desierto/movimientos.png') ?>" alt="" class="img-fluid ms-4" width="20%">
                        <span class="text-azul" id="contadorVidas">3</span>
                    </div>
                    <div class="col-lg-4 col-md-4 d-flex align-items-center">
                        <img src="<?php echo base_url('almacenamiento/img/desierto/estrella.png') ?>" alt="" class="img-fluid ms-1" width="20%">
                        <span class="text-azul" id="contadorEstrellas">0</span>
                    </div>

                </div>

            </div>
        </nav>
    </section>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>