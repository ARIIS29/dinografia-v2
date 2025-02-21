<!-- Sección que contiene el contenido principal -->
<!-- <div class="modal fade" id="modalInstrucciones" tabindex="-1" aria-labelledby="modalInstruccionesLabel" aria-hidden="true">
    <div class="modal-dialog texto-modal-bambu">
        <div class="modal-content mod-color mt-5">
            <div class="modal-header">
                <h5 class="modal-title" id="videoModalLabel">
                    <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/dino-indicaciones.png') ?>" alt="Img-Dino-Indicaciones" class="img-fluid dino-hablando me-3" width="8%"><b>¡Hola Explorador!</b>
                </h5>
                <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close" title="Cerrar ventana"></button>
            </div>
            <div class="modal-body">
                <p>
                    ¡Bienvenido al bosque de bambú! <br>
                    En esta aventura, exploraremos juntos la letra <b>b</b> y aprenderemos a escribirla correctamente! <br>
                    Prepárate para practicar y completar todas las misiones que el bosque de bambú tiene para ti. <br>
                    ¡Comencemos con la exploración!
                </p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Entendido</button>
            </div>
        </div>
    </div>
</div> -->

<!-- ¡Bienvenido al bosque de bambú! En esta aventura, exploraremos juntos la letra b. A lo largo del viaje, descubrirás sus secretos y completarás misiones divertidas que te ayudarán a mejorar tus trazos y escribirla fácilmente.
¡Juntos, exploremos la letra b y aprenderemos a escribirla correctamente! Prepárate para practicar y completar todas las misiones que el bosque de bambú tiene para ti.
¡Comencemos con la exploración! -->

<section class="d-flex justify-content-center align-items-center mt-10" id="menuPrincipal">
    <div class="container">
        <div class="col-lg-6 col-md-6 justify-aling-center text-center titulo-con-luz d-block d-sm-none mt-5">
            <h1 class="titulo-h1-bambu-movil">BOSQUE DE BAMBÚ</h1>
        </div>
        <div class="col-lg-12 col-md-12 d-flex align-items-center">
            <!-- Imagen -->
            <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/dino-indicaciones.png') ?>" alt="Img-Dino-Indicaciones" class="img-fluid dino-hablando me-3 d-none d-sm-block" id="dino" width="6%">
            <!-- Texto -->
            <p class="texto_indicaciones_bambu mb-0">¡Comencemos con la exploración, haciendo clic en un botón!</p>
            <audio id="dinoAudio" src="<?php echo base_url('almacenamiento/audios/audio_bosque_bambu.mp3') ?>" preload="auto"></audio>
        </div>
        <div class="row justify-content-center text-center">
            <!-- Botón 1 -->
            <div class="col-lg-3 col-md-3 col-6 btn-transicion d-none d-sm-block">
                <a href="<?php echo base_url('letras/bosque_bambu/trazando_aventuras_b') ?>">
                    <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/btn-la_ruta_del_trazo.png') ?>" alt="Botón bosque de bambú" class=" img-fluid animated-button">
                </a>
            </div>
            <!-- Botón 2 -->
            <div class="col-lg-3 col-md-3 col-6 btn-transicion d-none d-sm-block">
                <a href="<?php echo base_url('letras/bosque_bambu//explora_y_descubre_b') ?>">
                    <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/btn-explorando_la_letrab.png') ?>" alt="" class="img-fluid animated-button2">
                </a>
            </div>

        </div>

        <div class="row justify-content-center text-center d-block d-sm-none">
            <!-- Botón 1 -->
            <div class="col-lg-3 col-md-3 col-sm-2 btn-transicion">
                <a href="<?php echo base_url('letras/bosque_bambu/trazando_aventuras_b') ?>">
                    <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/btn-la_ruta_del_trazo.png') ?>" alt="Botón bosque de bambú" class=" img-fluid">
                </a>
            </div>
            <!-- Botón 2 -->
            <div class="col-lg-3 col-md-3 col-sm-2 btn-transicion">
                <a href="<?php echo base_url('letras/bosque_bambu//explora_y_descubre_b') ?>">
                    <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/btn-explorando_la_letrab.png') ?>" alt="" class="img-fluid">
                </a>
            </div>

        </div>
    </div>
</section>

<script>
    // Referencias a elementos
    const dino = document.getElementById('dino');
    const audio = document.getElementById('dinoAudio');

    // Inicia animación y audio al cargar la página
    window.addEventListener('DOMContentLoaded', function() {
        dino.classList.add('dino-hablando'); // Inicia la animación
        audio.play().catch(error => {
            console.log("Error al reproducir el audio automáticamente:", error);
        });
    });

    // Manejo del clic en Dino
    dino.addEventListener('click', function() {
        if (dino.classList.contains('dino-hablando')) {
            dino.classList.remove('dino-hablando'); // Detiene la animación
            audio.pause(); // Pausa el audio
            audio.currentTime = 0; // Reinicia el audio
        } else {
            dino.classList.add('dino-hablando'); // Inicia la animación
            audio.play().catch(error => {
                console.log("Error al reproducir el audio:", error);
            });
        }
    });

    // Detener animación cuando termine el audio
    audio.addEventListener('ended', function() {
        dino.classList.remove('dino-hablando'); // Detiene la animación
    });
</script>