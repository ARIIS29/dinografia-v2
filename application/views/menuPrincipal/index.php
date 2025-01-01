<section class="d-flex align-items-center mt-13" id="menuPrincipal">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 d-none d-sm-block dino-hablando text-center">
                <p>Haz clic en Dino para que hable o se detenga.</p>
                <img src="<?php echo base_url('almacenamiento/img/dinografia/dinografia-dino-lapiz.png') ?>" alt="" class="img-fluid enlargable" id="dino" width="55%">
            </div>
            <div class="col-lg-8 col-md-8 d-none d-sm-block btn-transicion text-center">
                "¡Hola, bienvenido a Dinografía!
                ¡Soy tu amigo Dino!, y estoy aquí para acompañarte en increíbles aventuras.
                ¡Comencemos juntos! Primero, da clic en el botón de Guía del Explorador, para aprender los secretos de una escritura fantástica.
                Recuerda: una buena escritura comienza con una buena postura. ¡Vamos a divertirnos mientras aprendemos!"
            </div>
            <audio id="dinoAudio" src="<?php echo base_url('almacenamiento/audios/bienvenido-dinografia.mp3') ?>" preload="auto"></audio>
        </div>
    </div>
</section>

<script>
    // Referencias a elementos
    const dino = document.getElementById('dino');
    const audio = document.getElementById('dinoAudio');

    // Inicia animación y audio al cargar la página
    window.addEventListener('DOMContentLoaded', function() {
        dino.classList.add('hablando'); // Inicia la animación
        audio.play().catch(error => {
            console.log("Error al reproducir el audio automáticamente:", error);
        });
    });

    // Manejo del clic en Dino
    dino.addEventListener('click', function() {
        if (dino.classList.contains('hablando')) {
            dino.classList.remove('hablando'); // Detiene la animación
            audio.pause(); // Pausa el audio
            audio.currentTime = 0; // Reinicia el audio
        } else {
            dino.classList.add('hablando'); // Inicia la animación
            audio.play().catch(error => {
                console.log("Error al reproducir el audio:", error);
            });
        }
    });

    // Detener animación cuando termine el audio
    audio.addEventListener('ended', function() {
        dino.classList.remove('hablando'); // Detiene la animación
    });
</script>