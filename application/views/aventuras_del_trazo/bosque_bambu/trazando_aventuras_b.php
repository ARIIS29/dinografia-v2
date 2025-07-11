<section class="d-flex justify-content-center align-items-center mt-10" id="menuPrincipal">
    <div class="container">
        <div class="col-lg-6 col-md-6 justify-aling-center text-center titulo-con-luz d-block d-sm-none mt-5">
            <h1 class="titulo-h1-bambu-movil">TRAZANDO AVENTURAS</h1>
        </div>
        <div class="col-lg-12 col-md-12 d-flex align-items-center">
            <!-- Imagen -->
            <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/dino-indicaciones.png') ?>" alt="Img-Dino-Indicaciones" class="img-fluid dino-hablando me-3 d-none d-sm-block" id="dino" width="6%">
            <!-- Texto -->
            <p class="texto_indicaciones_bambu mb-0"> ¡Haz clic en un botón y tracemos juntos grandes aventuras!</p>
            <audio id="dinoAudio" src="<?php echo base_url('almacenamiento/audios/audios_b/b_trazando_aventuras.mp3') ?>" preload="auto"></audio>
        </div>
        <div class="row justify-content-center text-center">
            <div class="col-lg-3 col-md-3 col-sm-4 col-6 btn-transicion">
                <a href="<?php echo base_url('letras/bosque_bambu/letrab') ?>">
                    <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/btn-traza-la-letrab.png') ?>" alt="Botón bosque de bambú" class=" img-fluid animated-button" width="65%">
                </a>
                <a href="<?php echo site_url('galeria/galeriab') ?>" class="btn galeria-letrab me-2"> <i class="fas fa-image"></i> Ver Galería</a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-6 btn-transicion">
                <a href="<?php echo base_url('letras/bosque_bambu/trazos_en_arena_b') ?>">
                    <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/btn-trazos-arena-b.png') ?>" alt="Botón bosque de bambú" class=" img-fluid animated-button" width="65%">
                </a>
                <a href="<?php echo site_url('galeria/galeriat') ?>" class="btn galeria-trazos-arena me-2"> <i class="fas fa-image"></i> Ver Galería</a>

            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-6 btn-transicion">
                <a href="<?php echo base_url('letras/bosque_bambu/grafismo_b') ?>">
                    <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/btn-grafismo.png') ?>" alt="Botón bosque de bambú" class=" img-fluid animated-button" width="65%">
                </a>
                <a href="<?php echo site_url('galeria/galeriag') ?>" class="btn galeria-grafismo me-2"> <i class="fas fa-image"></i> Ver Galería</a>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-4 col-6 btn-transicion text-center mt-3">
                <a href="<?php echo base_url('letras/bosque_bambu/mi_avance_trazando_aventuras_b') ?>">
                    <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/btn-avance-leccionesb.png') ?>" alt="Botón bosque de bambú" class=" img-fluid animated-button" width="20%">
                </a>
            </div>

        </div>
    </div>
</section>
<script>
    // Referencias a elementos
    const dino = document.getElementById('dino');
    const audio = document.getElementById('dinoAudio');

    // Función para iniciar animación y audio
    function iniciarDino() {
        dino.classList.add('dino-hablando'); // Inicia la animación
        audio.play().catch(error => {
            console.log("Error al reproducir el audio automáticamente:", error);
        });
    }

    window.addEventListener('DOMContentLoaded', function() {
        if (!sessionStorage.getItem('audioDinoReproducido_trazando_aventuras')) {
            iniciarDino();
            sessionStorage.setItem('audioDinoReproducido_trazando_aventuras', 'true');
        }
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