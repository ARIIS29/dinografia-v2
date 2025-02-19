<section class="d-flex mt-9" id="menuPrincipal">
    <div class="container-fluid">
        <div class="col-lg-6 col-md-6 justify-aling-center text-center titulo-con-luz d-block d-sm-none mt-5">
        </div>
        <div class="row mt-2 justify-content-center">
            <div class="col-lg-8 col-md-8 btn-transicion contenedor-instrucciones text-center">
                <div class="col-lg-12 col-md-12">
                    <h2 class="text-center mt-3">
                        <img src="<?php echo base_url('almacenamiento/img/dinografia/dinografia-dino-lapiz.png') ?>" alt="Img-Dino-Indicaciones" class="img-fluid dino-hablando me-3" id="dino" width="8%">¡Hola, bienvenido a Dinografía!
                    </h2><br>
                    <audio id="dinoAudio" src="<?php echo base_url('almacenamiento/audios/bienvenido-dinografia.mp3') ?>" preload="auto"></audio>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-8 text-parrafo">
                        <p class="ms-4 me-4">
                            Soy tu amigo Dino, y estoy aquí para acompañarte en increíbles aventuras.<br>
                            ¡Comencemos juntos!<br>
                            Primero, da clic en el botón de <b>"Guía del Dino Explorador"</b>, para aprender los secretos de una escritura fantástica.<br>
                            Recuerda: una buena escritura comienza con una buena postura. ¡Vamos a divertirnos mientras aprendemos! <br>
                        </p>

                    </div>
                    <div class="col-lg-4 col-md-4 d-none  d-sm-block">
                        <a href="<?php echo base_url('Guia_dino_explorador') ?>">
                            <img src="<?php echo base_url('almacenamiento/img/botones/guia_del_explorador.png') ?>" alt="Guia del explorador" class="img-fluid boton-animacion-pulso mt-5" width="60%">
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 d-block d-sm-none">
                        <a href="<?php echo base_url('Guia_dino_explorador') ?>">
                            <img src="<?php echo base_url('almacenamiento/img/botones/guia_del_explorador.png') ?>" alt="Guia del explorador" class="img-fluid boton-animacion-pulso mt-5" width="50%">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <br>
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