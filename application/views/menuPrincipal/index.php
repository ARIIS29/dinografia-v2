<section class="d-flex align-items-center mt-10" id="menuPrincipal">
    <div class="container">
        <div class="row mt-2">
            <div class="col-lg-4 col-md-4 text-center">
                <img src="<?php echo base_url('almacenamiento/img/dinografia/dinografia-dino-lapiz.png') ?>" alt="Dino explorador" class="img-fluid" id="dino" width="70%">
                <p class="texto-dino-habla">Haz clic en Dino para que hable o se detenga.</p>
                <audio id="dinoAudio" src="<?php echo base_url('almacenamiento/audios/bienvenido-dinografia.mp3') ?>" preload="auto"></audio>

            </div>
            <div class="col-lg-8 col-md-8 btn-transicion text-parrafo">
                <h1 class="text-center mt-3">¡Hola, bienvenido a Dinografía!</h1><br>
                <p class="ms-4 me-4">
                    Soy tu amigo Dino, y estoy aquí para acompañarte en increíbles aventuras.<br>
                    ¡Comencemos juntos!<br>
                    Primero, da clic en el botón de <b>"Guía del Dino Explorador"</b>, para aprender los secretos de una escritura fantástica.<br>
                    Recuerda: una buena escritura comienza con una buena postura. <br>
                    ¡Vamos a divertirnos mientras aprendemos! <br>
                </p>
                <div class="text-center">
                    <a href="<?php echo base_url('Guia_dino_explorador') ?>">
                        <img src="<?php echo base_url('almacenamiento/img/botones/guia_del_explorador.png') ?>" alt="Guia del explorador" class="img-fluid boton-aventuras-animacion" width="20%">
                    </a>
                </div>
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