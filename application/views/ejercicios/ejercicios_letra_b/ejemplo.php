<section class="mt-10">
    <div class="container-fluid d-flex justify-content-center" style="position: relative;">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12" id="areaJuego">
                <a id="play-btn" class="enlargable">
                    <img src="<?php echo base_url('almacenamiento/img/botones/btn-iniciar.png') ?>" alt="" class="img-fluid" width="80%">
                </a>
            </div>
            <div id="contenedorJuego">
                <p>Arrastra las letras a su lugar correcto para formar la palabra.</p>
                <!-- <div id="vidas">
                    Vidas: <span id="contadorVidas">3</span>
                </div> -->
                <div id="emojiPalabra" class="emoji"></div>
                <div id="contenedorLetras"></div>
                <div id="contenedorPalabra"></div>
                <p id="mensaje"></p>
                <button id="verificarPalabraBtn">Verificar</button>
                <button id="saltarPalabraBtn">Saltar Palabra</button>
                <button id="finalizarJuegoBtn">Finalizar Juego</button>
                <button id="reiniciarJuegoBtn">Reiniciar Juego</button>

            </div>

        </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const playBtn = document.getElementById('play-btn');
        
        playBtn.addEventListener('click', function() {
            playBtn.style.display = 'none'; // Ocultar el botón después de hacer clic
            console.log("Juego mostrado"); // Agrega esta línea para depurar
            // Ocultar el área donde está el botón de inicio
            document.getElementById('areaJuego').style.display = 'none';
            // Mostrar el contenedor del juego
            document.getElementById('contenedorJuego').style.display = 'block'; // Cambié 'flex' por 'block' para asegurar visibilidad
            iniciarJuego();
            startTimer();
            // Inicia el cronómetro
        });
        // iniciarJuego();
        // startTimer();


    });
</script>