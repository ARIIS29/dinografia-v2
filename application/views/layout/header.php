<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Bienvenido a Dinografía!</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap-css/bootstrap.css') ?>">
    <link href='https://fonts.googleapis.com/css?family=Cedarville Cursive' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/mystyle.css') ?>">
    <link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" href="<?php echo base_url('almacenamiento/img/dinografia/dinografia-dino-lapiz.png') ?>" type="image/x-icon">
</head>

<body class="body-color">
    <section>
        <nav class="navbar navbar-color navbar-expand-lg navbar-light fixed-top">
            <div class="container-fluid">
                <a class="" href="#dinografia"><img src="<?php echo base_url('almacenamiento/img/dinografia/dinografia-log2.svg')?>" alt="" class="img-fluid"></a>
                <button class="navbar-toggler float-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <form class="d-flex ms-auto">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="#disgrafia">Disgrafía</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#aplicacion">Acerca</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="#modulos">Módulos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#mapa">Mapa</a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('Registro')?>" tabindex="-1">Registrar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('login')?>" tabindex="-1">Iniciar
                                    Sesión</a>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </nav>
    </section>

    <script>
   // Función para agregar la clase "active" al enlace de navegación correspondiente
   function highlightNavigation() {
        const sections = document.querySelectorAll('section');
        const scrollY = window.scrollY || window.pageYOffset;

        sections.forEach(section => {
            const sectionTop = section.offsetTop - 50; // Ajusta el valor según el diseño de tu página
            const sectionHeight = section.clientHeight;
            const sectionId = section.getAttribute('id');
            const navLink = document.querySelector(`.navbar-nav .nav-link[href="#${sectionId}"]`);

            if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
                document.querySelectorAll('.navbar-nav .nav-link').forEach(link => {
                    link.classList.remove('active');
                });
                if (navLink) {
                    navLink.classList.add('active');
                }
            }
        });
    }

    document.addEventListener('DOMContentLoaded', () => {
        highlightNavigation();

        window.addEventListener('scroll', highlightNavigation);
    });
    </script>