<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dinografia</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap-css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/mystyle_terminos.css') ?>">
    <style>
        /* Estilo para la barra de navegación fija */
        .fixed-top {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1030;
        }

        /* Estilo para el contenido que sigue la barra de navegación */
        .nav-padding {
            padding-top: 80px;
            /* Ajusta esto según la altura de tu barra de navegación */
        }
    </style>
</head>

<body>
<section>
        <nav class="navbar navbar-color navbar-expand-lg navbar-light fixed-top">
            <div class="container-fluid">
                <a class="" href="<?php echo base_url('#dinografia')?>"><img
                        src="<?php echo base_url('almacenamiento/img/dinografia-log2.svg')?>" alt=""
                        class="img-fluid"></a>
                <button class="navbar-toggler float-end" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
    </section>