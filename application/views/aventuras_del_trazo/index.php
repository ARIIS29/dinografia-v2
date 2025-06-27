<section class="d-flex justify-content-center align-items-center mt-10" id="menuPrincipal">
    <div class="container">
        <div class="col-lg-6 col-md-6 justify-aling-center text-center titulo-con-luz d-block d-sm-none mt-5">
            <h1 class="titulo-h1-azul-movil">AVENTURAS DEL TRAZO</h1>
        </div>
        <audio id="dinoAudio" src="<?php echo base_url('almacenamiento/audios/audio_aventuras_trazo.mp3') ?>" preload="auto"></audio>
        <div class="col-lg-12 col-md-12 d-flex align-items-center ">
            <!-- Imagen -->
            <img src="<?php echo base_url('almacenamiento/img/botones/btn-indicaciones.png') ?>" alt="Img-Dino-Indicaciones" class="img-fluid dino-hablando me-3 d-none d-sm-block" id="dino" width="6%">
            <!-- Texto -->
            <p class=" texto_indicaciones mb-0">Elige una letra para comenzar tu exploración y haz clic en un botón</p>
        </div>
        <div class="row justify-content-center text-center">
            <!-- Botón 1 -->
            <div class="col-lg-3 col-md-3 col-sm-4 col-6 mb-4">
                <a href="<?php echo base_url('letras/bosque_bambu/index') ?>">
                    <img src="<?php echo base_url('almacenamiento/img/botones/btn-bambu.png') ?>" alt="Botón bosque de bambú" class="img-fluid enlargable" width="100%">
                </a>
            </div>
            <!-- Botón 2 -->
            <div class="col-lg-3 col-md-3 col-sm-4 col-6 mb-4">
                <a href="<?php echo base_url('letras/desierto/index') ?>">
                    <img src="<?php echo base_url('almacenamiento/img/botones//btn-desierto.png') ?>" alt="Botón el desierto" class="img-fluid enlargable" width="100%">
                </a>
            </div>
            <!-- Botón 3 -->
            <div class="col-lg-3 col-md-3 col-sm-4 col-6 mb-4">
                <a href="<?php echo base_url('ejercicios/ejercicios_letra_p/index') ?>">
                    <img src="<?php echo base_url('almacenamiento/img/botones/btn-playa.png') ?>" alt="Explorador de Hojas" class="img-fluid enlargable" width="100%">
                </a>
            </div>
            <!-- Botón 4 -->
            <div class="col-lg-3 col-md-3 col-sm-4 col-6 mb-4">
                <a href="<?php echo base_url('ejercicios/ejercicios_letra_q/index') ?>">
                    <img src="<?php echo base_url('almacenamiento/img/botones/btn-quetzal.png') ?>" alt="Dino Dice" class="img-fluid enlargable" width="100%">
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