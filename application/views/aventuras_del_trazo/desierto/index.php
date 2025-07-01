<section class="d-flex justify-content-center align-items-center mt-8" id="menuPrincipal">
    <div class="container">
        <div class="row d-flex justify-content-evenly">
            <div id="tutorialModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background-color:rgba(221, 247, 216, 0.8); justify-content:center; align-items:center; z-index:1000;">
                <div style="position:relative; background:#fff; padding:10px; border-radius:10px; max-width:90%; width:600px;">
                    <iframe id="youtubeIframe" width="100%" height="315" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen src="">
                    </iframe>
                    <button id="cerrarTutorial" type="button" class="btn btn-danger" style="position:absolute; top:10px; right:10px;">Cerrar</button>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 justify-aling-center text-center titulo-con-luz d-block d-sm-none mt-5">
                <h1 class="titulo-h1-desierto-movil">DESIERTO</h1>
            </div>
            <div class="col-lg-12 col-md-12 d-flex align-items-center">
                <!-- Imagen -->
                <img src="<?php echo base_url('almacenamiento/img/desierto/dino-indicaciones.png') ?>" alt="Img-Dino-Indicaciones" class="img-fluid dino-hablando me-3 d-none d-sm-block" id="dino" width="7%">
                <!-- Texto -->
                <p class="texto_indicaciones_desierto mb-0">¡Comencemos con la exploración, haciendo clic en un botón!</p>
                <audio id="dinoAudio" src="<?php echo base_url('almacenamiento/audios/audios_b/audio_desierto.mp3') ?>" preload="auto"></audio>
            </div>
            <div class="row justify-content-center text-center">
                <!-- Botón 1 -->
                <div class="col-lg-3 col-md-3 col-6 btn-transicion d-none d-sm-block">
                    <a href="<?php echo base_url('letras/desierto/trazando_aventuras_d') ?>">
                        <img src="<?php echo base_url('almacenamiento/img/desierto/btn_trazando_aventuras.png') ?>" alt="Botón trazando aventuras d" class=" img-fluid animated-button" width="90%">
                    </a>
                </div>
                <!-- Botón 2 -->
                <div class="col-lg-3 col-md-3 col-6 btn-transicion d-none d-sm-block">
                    <a href="<?php echo base_url('letras/desierto//explora_y_descubre_d') ?>">
                        <img src="<?php echo base_url('almacenamiento/img/desierto/btn_explora_descubre.png') ?>" alt="Botón explora y descubre d" class="img-fluid animated-button2" width="90%">
                    </a>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-4 col-6 btn-transicion text-center mt-4">
                    <a id="abrirTutorial">
                        <img src="<?php echo base_url('almacenamiento/img/desierto/btn_explora_letra_d.png') ?>" alt="Botón mi_avance_lapiz" class=" img-fluid animated-button" width="20%">
                    </a>
                </div>

            </div>

            <div class="row justify-content-center text-center d-block d-sm-none">
                <!-- Botón 1 -->
                <div class="col-lg-3 col-md-3 col-sm-2 btn-transicion">
                    <a href="<?php echo base_url('letras/desierto/trazando_aventuras_d') ?>">
                        <img src="<?php echo base_url('almacenamiento/img/desierto/btn_trazando_aventuras.png') ?>" alt="Botón desierto" class=" img-fluid">
                    </a>
                </div>
                <!-- Botón 2 -->
                <div class="col-lg-3 col-md-3 col-sm-2 btn-transicion">
                    <a href="<?php echo base_url('letras/desierto/explora_y_descubre_d') ?>">
                        <img src="<?php echo base_url('almacenamiento/img/desierto/btn_explora_descubre.png') ?>" alt="" class="img-fluid">
                    </a>
                </div>

            </div>
        </div>
</section>

<script>
    const videoURL = "https://www.youtube.com/embed/JX_AP9rO4q4"; // reemplaza con tu ID real

    document.getElementById('abrirTutorial').addEventListener('click', function(e) {
        e.preventDefault();
        const modal = document.getElementById('tutorialModal');
        const iframe = document.getElementById('youtubeIframe');

        iframe.src = videoURL + "?autoplay=1"; // inicia reproducción automáticamente
        modal.style.display = 'flex';
    });

    document.getElementById('cerrarTutorial').addEventListener('click', function() {
        const modal = document.getElementById('tutorialModal');
        const iframe = document.getElementById('youtubeIframe');

        modal.style.display = 'none';
        iframe.src = ""; // Detiene el video al cerrar
    });

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
        if (!sessionStorage.getItem('audioDinoReproducido_desierto')) {
            iniciarDino();
            sessionStorage.setItem('audioDinoReproducido_desierto', 'true');
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