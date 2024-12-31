<section class="mt-10">
    <div class="container-fluid d-flex justify-content-center" style="position: relative;">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-8 col-8 justify-content-center color-fondo instrucciones" id="areaJuego">
                <div class="col-lg-12 col-md-12 col-12 mt-2">
                    <p>
                    <h1>¡Bienvenidos a la aventura del bosque del quetzal! <br> <b>Explorando Hojas - Letra q</b></h1> <br>
                    Prepárate para una emocionante misión: ¡Atrapa todas las hojas que aparezcan en el bosque del quetzal! <br>
                    <b> Instrucciones del juego</b> <br>
                    Da clic en el boton azul, para saber <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#videoModal">
                        ¿Cómo jugar?
                    </button> <br>

                    <!-- Modal -->
                    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="videoModalLabel">Instrucciones del juego</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Contenedor del video -->
                                    <video id="videoElement" width="100%" controls>
                                        <!-- Ruta al archivo de video -->
                                        <source src="<?php echo base_url('almacenamiento/img/instrucciones/Explorado_hojas.mp4'); ?>" type="video/mp4">
                                        Tu navegador no soporta el elemento de video.
                                    </video>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    ¡Diviértete aprendiendo mientras exploramos juntos el mágico bosque de bambú! <br>
                    Haz clic en el botón de Iniciar para comenzar a jugar.

                    </p>
                </div>
                <div class="col-lg-12 col-md-12 col-12 text-center enlargable">
                    <a id="play-btn">
                        <img src="<?php echo base_url('almacenamiento/img/botones/btn-iniciar.png') ?>" alt="" class="img-fluid" width="50%">
                    </a>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-12 justify-content-center" id="contenedorJuego">
                <canvas id="confettiCanvas"></canvas>

                <div class="col-lg-8 col-md-8 col-8 justify-content-center area" id="area">
                    <p class="indicaciones">¡Atrapa todas las hojas que aparezcan haciendo clic en ellas!<br></p>

                    <img id="hoja" src="<?php echo base_url('almacenamiento/img/hojas/hojaq.png') ?>" alt="HojaB" class="hoja-img" width="7%">
                    <!-- <div id="cuentaRegresiva">3</div> -->
                </div>
                <div class="d-flex justify-content-center mt-2">
                    <button id="reiniciarBtn" class="btn reiniciar me-2" title="Reiniciar Juego">
                        <i class="fas fa-redo"></i>
                    </button>

                    <button id="finalizarBtn" class="btn finalizar me-2" title="Finalizar Juego">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div>
                <p id="mensaje"></p>
            </div>

        </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const playBtn = document.getElementById('play-btn');
        const temporizadorElemento = document.getElementById('temporizador');
        document.getElementById('play-btn').addEventListener('click', function() {
            // Mostrar el encabezado del juego
            document.getElementById('header-juego').classList.remove('d-none');

            // Ocultar el encabezado inicial
            document.getElementById('header-inicial').classList.add('d-none');
        });
        const videoModal = document.getElementById('videoModal');
        const videoElement = document.getElementById('videoElement');

        // Pausa el video cuando el modal se cierra
        videoModal.addEventListener('hidden.bs.modal', function() {
            videoElement.pause();
            videoElement.currentTime = 0; // Reinicia el video
        });

        let hoja = document.getElementById('hoja');
        // let cuentaRegresiva = document.getElementById('cuentaRegresiva');

        document.getElementById('reiniciarBtn').addEventListener('click', reiniciarJuego);
        document.getElementById('finalizarBtn').addEventListener('click', finalizarJuego);


        let puntaje = 0;
        const metaPuntos = 40; // Número de hojas a atrapar
        let tiempoHoja = 1300;
        let intervaloJuego;
        let hojasAparecidas = 0;
        let temporizador;
        let minutos = 0;
        let segundos = 0;
        let estrellas = 0;
        let hojasNoAtrapadas = 0;
        let puntajeReal = 0;

        function iniciarTemporizador() {
            temporizador = setInterval(() => {
                segundos++;
                if (segundos === 60) {
                    minutos++;
                    segundos = 0;
                }
                temporizadorElemento.textContent = `${String(minutos).padStart(2, '0')}:${String(segundos).padStart(2, '0')}`;
            }, 1000);
        }

        function posicionAleatoria() {
            let area = document.getElementById('area');
            let x = Math.random() * (area.offsetWidth - 50);
            let y = Math.random() * (area.offsetHeight - 50);
            return {
                x,
                y
            };
        }

        function movimientoHoja() {
            if (hojasAparecidas < metaPuntos) {
                let pos = posicionAleatoria();
                hoja.style.left = pos.x + 'px';
                hoja.style.top = pos.y + 'px';
                hoja.style.display = 'block';
                hojasAparecidas++;
                console.log('hojas apa: ', hojasAparecidas);
                console.log('puntaje: ', puntaje);

                setTimeout(() => {
                    hoja.style.display = 'none';
                }, tiempoHoja);

            } else {
                finalizarJuego();
            }
        }
        hoja.addEventListener('click', () => {
            puntaje++;
            contadorPuntos.textContent = puntaje;
            hoja.style.display = 'none';
            estrellas += 25;
            contadorEstrellas.textContent = estrellas;
            console.log('puntajes real: ', puntaje);
            hojasNoAtrapadas = metaPuntos - puntaje;
            console.log('hojasNoAtrapadas: ', hojasNoAtrapadas);

        });



        function iniciarJuego() {
            puntaje = 0;
            hojasAparecidas = 0; // Reiniciar el contador de hojas
            hojasNoAtrapadas = 0;
            // barraProgreso.value = 0;
            clearInterval(intervaloJuego);
            intervaloJuego = setInterval(movimientoHoja, tiempoHoja + 500);
        }

        function finalizarJuego() {
            clearInterval(temporizador);
            clearInterval(intervaloJuego);
            const mensaje = document.getElementById('mensaje');
            if (hojasAparecidas < metaPuntos) {
                var mensajeFinal = `¡El juego ha sido finalizado con éxito! 🎉. Ganaste ${estrellas} estrellas, atrapaste ${puntaje} hojas y lo hiciste en un tiempo de ${String(minutos).padStart(2, '0')}:${String(segundos).padStart(2, '0')}.`;
                mensaje.textContent = mensajeFinal;
                mensaje.className = "incorrecto";
                document.getElementById("finalizarBtn").disabled = true;
            } else {
                var mensajeFinal = `¡Felicidades has concluido el juego! 🎉. Ganaste ${estrellas} estrellas, atrapaste las ${puntaje} hojas disponibles y lo hiciste en un tiempo de ${String(minutos).padStart(2, '0')}:${String(segundos).padStart(2, '0')}.`;
                mensaje.textContent = mensajeFinal;
                mensaje.className = "correcto";
                document.getElementById("finalizarBtn").disabled = true;
                mostrarConfeti();


            }

            mensaje.scrollIntoView({
                behavior: "smooth",
                block: "end"
            });
            enviarEvaluacionexploradorHojasQ();
        }


        function reiniciarJuego() {
            // contadorPuntos.textContent = puntaje;
            const mensaje = document.getElementById('mensaje');
            mensaje.textContent = '';
            clearInterval(temporizador);
            temporizadorElemento.textContent = "00:00";
            estrellas = 0;
            contadorEstrellas.textContent = estrellas;
            minutos = 0;
            segundos = 0;
            puntaje = 0;
            contadorPuntos.textContent = puntaje;
            tiempoHoja = 1500;
            hojasAparecidas = 0;
            hojasNoAtrapadas = 0;
            document.getElementById("finalizarBtn").disabled = false;

            iniciarJuego();
            iniciarTemporizador();
        }

        function mostrarConfeti() {
            const canvas = document.getElementById("confettiCanvas");
            const ctx = canvas.getContext("2d");
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;

            const colores = ["#ff6347", "#32cd32", "#4682b4", "#f4d03f", "#ff7f50"];
            const particulas = Array.from({
                length: 200
            }, () => ({
                x: Math.random() * canvas.width,
                y: Math.random() * canvas.height,
                r: Math.random() * 5 + 2,
                color: colores[Math.floor(Math.random() * colores.length)],
                vx: Math.random() * 2 - 1,
                vy: Math.random() * 2 + 1
            }));

            function animar() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                particulas.forEach(p => {
                    p.x += p.vx;
                    p.y += p.vy;
                    p.y = p.y > canvas.height ? 0 : p.y;
                    ctx.beginPath();
                    ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
                    ctx.fillStyle = p.color;
                    ctx.fill();
                });
                requestAnimationFrame(animar);
            }

            animar();

            // Detener confeti después de 5 segundos
            setTimeout(() => (canvas.style.display = "none"), 2000);
        }


        playBtn.addEventListener('click', function() {
            playBtn.style.display = 'none'; // Ocultar el botón después de hacer clic
            console.log("Juego mostrado"); // Agrega esta línea para depurar
            // Ocultar el área donde está el botón de inicio
            document.getElementById('areaJuego').style.display = 'none';
            // Mostrar el contenedor del juego
            document.getElementById('contenedorJuego').style.display = 'block'; // Cambié 'flex' por 'block' para asegurar visibilidad
            iniciarJuego();
            iniciarTemporizador();
        });

        // Función para enviar el tiempo final por AJAX, datos a enviar al controlador (backend)
        function enviarEvaluacionexploradorHojasQ() {
            var tiempo = `${String(minutos).padStart(2, '0')}:${String(segundos).padStart(2, '0')}`;
            $.ajax({
                url: '<?php echo base_url('ejercicios/ejercicios_letra_q/enviarEvaluacionexploradorHojasQ'); ?>', // URL de tu controlador
                type: 'POST',
                data: {
                    tiempoFinal: tiempo,
                    hojasAtrapadas: puntaje,
                    hojasIncorrectas: hojasNoAtrapadas,
                    totalEstrellas: estrellas

                }, // Datos a enviar
                success: function(response) {
                    console.log('Tiempo enviado exitosamente:', response);
                },
                error: function(xhr, status, error) {
                    console.error('Error al enviar el tiempo:', error);
                }
            });
        }


    });
</script>