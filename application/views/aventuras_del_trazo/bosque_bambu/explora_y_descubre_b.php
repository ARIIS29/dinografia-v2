<section class="d-flex justify-content-center align-items-center mt-10" id="menuPrincipal">
    <div class="container">
        <div class="col-lg-6 col-md-6 justify-aling-center text-center titulo-con-luz d-block d-sm-none mt-5">
            <h1 class="titulo-h1-bambu-movil">EXPLORA Y DESCUBRE</h1>
        </div>
        <div class="col-lg-12 col-md-12 d-flex align-items-center">
            <!-- Imagen -->
            <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/dino-indicaciones.png') ?>" alt="Img-Dino-Indicaciones" class="img-fluid dino-hablando me-3 d-none d-sm-block" id="dino" width="6%">
            <!-- Texto -->
            <p class="texto_indicaciones_bambu mb-0"> ¡Haz clic en uno de los botones y completemos misiones juntos!</p>
            <audio id="dinoAudio" src="<?php echo base_url('almacenamiento/audios/audios_b/b_menu_explora_descubre.mp3') ?>" preload="auto"></audio>
        </div>
        <div class="row justify-content-center text-center">
            <div class="col-lg-2 col-md-2 col-sm-4 col-6 btn-transicion">
                <a href="<?php echo base_url('letras/bosque_bambu/descubriendo_palabras_b') ?>">
                    <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/descubriendo_palabras-btn.png') ?>" alt="Botón bosque de bambú" class=" img-fluid animated-button">
                </a>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-6 btn-transicion">
                <a href="<?php echo base_url('letras/bosque_bambu/descubriendo_mensajes_secretos_b') ?>">
                    <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/mensajes_secretos_btn.png') ?>" alt="Botón bosque de bambú" class=" img-fluid animated-button">
                </a>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-6 btn-transicion">
                <a href="<?php echo base_url('letras/bosque_bambu/explorador_hojas_b') ?>">
                    <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/explorando_hojas_btn.png') ?>" alt="Botón bosque de bambú" class=" img-fluid animated-button">
                </a>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-6 btn-transicion">
                <a href="<?php echo base_url('letras/bosque_bambu/elementos_perdidos_b') ?>">
                    <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/encontrando_objetos_btn.png') ?>" alt="Botón bosque de bambú" class=" img-fluid animated-button">
                </a>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-6 btn-transicion">
                <a href="<?php echo base_url('letras/bosque_bambu/dino_dice_b') ?>">
                    <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/dino_dice_btn.png') ?>" alt="Botón bosque de bambú" class=" img-fluid animated-button">
                </a>
            </div>

            <div class="col-lg-2 col-md-2 col-sm-4 col-6 btn-transicion">
                <a href="<?php echo base_url('letras/bosque_bambu/memorama_b') ?>">
                    <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/btn-la_ruta_del_trazo.png') ?>" alt="Botón bosque de bambú" class=" img-fluid animated-button">
                </a>
            </div>

        </div>
        <div class="col-lg-12 col-md-12 col-sm-4 col-6 btn-transicion text-center mt-5">
            <a href="<?php echo base_url('letras/bosque_bambu/mi_avance_b') ?>">
                <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/btn-avance-b.png') ?>" alt="Botón bosque de bambú" class=" img-fluid animated-button" width="20%">
            </a>
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