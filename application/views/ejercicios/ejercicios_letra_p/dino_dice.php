<section class="mt-10">
    <div class="container-fluid d-flex justify-content-center" style="position: relative;">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-8 col-8 justify-content-center color-fondo instrucciones" id="areaJuego">
                <div class="col-lg-12 col-md-12 col-12 mt-2">
                    <p>
                    <h1>¡Bienvenidos a la aventura de playa palmeras! <br> <b>¡Hazle Caso al Dino! - Letra p</b></h1> <br>
                    Prepárate para una emocionante misión: ¡El Dino necesita tu ayuda! Para continuar con la aventura, debe recolectar elementos para explorar playa palmeras. Lee con atención las instrucciones, prepara todo para la nueva expedición haciéndole caso al Dino, y demuestra que eres el mejor explorador. Todos los elementos tienen algo en común: están relacionadas con la letra p. ¿Estás listo para la aventura?<br>
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
                                        <source src="<?php echo base_url('almacenamiento/img/instrucciones/hazle_caso_dino.mp4'); ?>" type="video/mp4">
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
                <div class="indicaciones" id="instruccion"></div>
                <div class="contenedor-figuras mt-8" id="contenedorFiguras"></div>

                <canvas id="confettiCanvas"></canvas>

                <div class="d-flex justify-content-center mt-8">
                    <button id="omitirBtn" class="btn saltar me-2" title="Saltar elemento">
                        <i class="fas fa-arrow-right"></i>
                    </button>
                    <button id="reiniciarBtn" class="btn reiniciar me-2" title="Reiniciar Juego">
                        <i class="fas fa-redo"></i>
                    </button>

                    <button id="finalizarBtn" class="btn finalizar me-2" title="Finalizar Juego">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div>
                    <p id="mensaje"></p>
                </div>

            </div>

        </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const playBtn = document.getElementById('play-btn');

        document.getElementById('play-btn').addEventListener('click', function() {
            // Mostrar el encabezado del juego
            document.getElementById('header-juego').classList.remove('d-none');

            // Ocultar el encabezado inicial
            document.getElementById('header-inicial').classList.add('d-none');
        });

        const emojis = ['🏕️', '📄', '⚽', '🐟', '🔍', '🎣', '☂️', '🍐', '🍌', '🍍', '🗺️'];
        const nombresEmojis = {
            '🏕️': 'campamento',
            '📄': 'papel',
            '⚽': 'pelota',
            '🐟': 'pez',
            '🔍': 'lupa',
            '🎣': 'caña de pescar',
            '☂️': 'paraguas',
            '🍐': 'pera',
            '🍌': 'plátano',
            '🍍': 'piña',
            '🗺️': 'mapa'
        };

        const temporizadorElemento = document.getElementById('temporizador');

        let instruccionActual = {};
        let contadorCorrectos = 0;
        let intentos = 3;
        let temporizador;
        let minutos = 0;
        let segundos = 0;
        let cantidadFiguras = 2;
        let figurasEncontradas = [];
        let objetosIncorrectos = [];
        let estrellas = 0;
        var contadorIncorrectas = 0;

        document.getElementById('omitirBtn').addEventListener('click', omitirInstruccion);
        document.getElementById('reiniciarBtn').addEventListener('click', reiniciarJuego);
        document.getElementById('finalizarBtn').addEventListener('click', finalizarJuego);

        const videoModal = document.getElementById('videoModal');
        const videoElement = document.getElementById('videoElement');

        // Pausa el video cuando el modal se cierra
        videoModal.addEventListener('hidden.bs.modal', function() {
            videoElement.pause();
            videoElement.currentTime = 0; // Reinicia el video
        });

        function generarFiguras() {
            const contenedor = document.getElementById("contenedorFiguras");
            contenedor.innerHTML = ""; // Limpiar contenedor

            // Selecciona aleatoriamente los emojis a mostrar
            const emojisSeleccionados = emojis.sort(() => Math.random() - 0.5).slice(0, cantidadFiguras);

            emojisSeleccionados.forEach(emoji => {
                const div = document.createElement("div");
                div.className = "figura";
                div.textContent = emoji;
                div.addEventListener('click', () => verificarFigura(emoji));
                contenedor.appendChild(div);
            });
        }

        // Función que se ejecuta al hacer clic en un emoji
        function verificarFigura(emojiSeleccionado) {
            const mensaje = document.getElementById("mensaje");

            const divFiguraSeleccionada = Array.from(document.getElementById("contenedorFiguras").children)
                .find(div => div.textContent === emojiSeleccionado);


            if (divFiguraSeleccionada.classList.contains('seleccionado')) {
                return;
            }
            // Marcar el emoji como seleccionado
            divFiguraSeleccionada.classList.add('seleccionado');

            if (emojiSeleccionado === instruccionActual.emoji) {
                contadorCorrectos++;
                // document.getElementById("contadorCorrectos").textContent = contadorCorrectos;
                divFiguraSeleccionada.classList.add("correcto");
                estrellas += 100;
                contadorEstrellas.textContent = estrellas;

                mensaje.textContent = `¡Super asombroso!🎉 Has seleccionado el elemento correcto (${emojiSeleccionado}). Ganaste 100 estrellas`;
                mensaje.className = "correcto";
                mensaje.scrollIntoView({
                    behavior: "smooth",
                    block: "end"
                });
                desactivarEmoji();

                if (!figurasEncontradas.includes(emojiSeleccionado)) {
                    figurasEncontradas.push(emojiSeleccionado);
                }

                cantidadFiguras++;
                if (cantidadFiguras > emojis.length) {
                    mostrarMensajeFinal();
                } else {
                    setTimeout(() => {
                        generarFiguras();
                        nuevaInstruccion();
                    }, 4000);
                }
            } else {
                objetosIncorrectos.push({
                    seleccionado: emojis[emojiSeleccionado] || emojiSeleccionado, // Si no se encuentra el emoji, se guarda el emoji mismo
                    correcto: emojis[instruccionActual.emoji] || instruccionActual.emoji // Lo mismo para el correcto
                });
                console.log('elemento no: ' + JSON.stringify(objetosIncorrectos));

                intentos--;
                contadorIncorrectas++;
                mensaje.textContent = `¡Sigue intentando!🌟. Has seleccionado un elemento incorrecto (${emojiSeleccionado}). El elemento que debes buscar es (${instruccionActual.emoji}). Te quedan solo ${intentos} intentos`;
                mensaje.className = "incorrecto";
                mensaje.scrollIntoView({
                    behavior: "smooth",
                    block: "end"
                });
                document.getElementById("intentos").textContent = intentos;
                divFiguraSeleccionada.classList.add("incorrecto");


                if (intentos === 0) {
                    mensaje.textContent = `Juego terminado. ¡A seguir practicando, te has quedado sin intentos! 💪. Ganaste ${estrellas} estrellas, recolectaste ${contadorCorrectos} elementos y lo hiciste en un tiempo de ${String(minutos).padStart(2, '0')}:${String(segundos).padStart(2, '0')}.`;
                    mensaje.className = "incorrecto";
                    mensaje.scrollIntoView({
                        behavior: "smooth",
                        block: "end"
                    });
                    desactivarEmoji();
                    clearInterval(temporizador); // Detener el cronómetro
                    document.getElementById("omitirBtn").disabled = true;
                    document.getElementById("finalizarBtn").disabled = true;
                    enviarEvaluacionDinoDiceP();
                }
            }
        }

        function nuevaInstruccion() {
            document.getElementById("mensaje").textContent = "";
            const emojisVisibles = Array.from(document.getElementById("contenedorFiguras").children);
            const emojiAleatorio = emojisVisibles[Math.floor(Math.random() * emojisVisibles.length)];
            const emojiSeleccionado = emojiAleatorio.textContent;

            const nombreEmoji = nombresEmojis[emojiSeleccionado] || "emoji desconocido";

            instruccionActual = {
                emoji: emojiSeleccionado,
                texto: `El dino dice: ¡Haz clic en ${nombreEmoji} (${emojiSeleccionado})!`
            };

            document.getElementById("instruccion").textContent = instruccionActual.texto;
        }

        function desactivarEmoji() {
            const figuras = document.querySelectorAll(".figura");
            figuras.forEach(figura => {
                figura.style.pointerEvents = "none"; // Deshabilita interactividad
            });
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

        function mostrarMensajeFinal() {
            mensaje.textContent = `¡Felicidades, has seguido todas las instrucciones del Dino a la perfección! 🎉. Ganaste ${estrellas} estrellas, recolectaste los ${contadorCorrectos} elementos indicados y lo hiciste en un tiempo de ${String(minutos).padStart(2, '0')}:${String(segundos).padStart(2, '0')}.`;
            mensaje.className = "correcto";
            mensaje.scrollIntoView({
                behavior: "smooth",
                block: "end"
            });
            mostrarConfeti();
            desactivarEmoji();
            document.getElementById("omitirBtn").disabled = true;
            document.getElementById("finalizarBtn").disabled = true;

            clearInterval(temporizador);
            enviarEvaluacionDinoDiceP();
        }
        // Inicia el cronómetro
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
        // window.onload = reiniciarJuego;

        function reiniciarJuego() {
            estrellas = 0;
            contadorIncorrectas = 0;
            contadorEstrellas.textContent = estrellas;
            clearInterval(temporizador);
            temporizadorElemento.textContent = "00:00";
            minutos = 0;
            segundos = 0;
            cantidadFiguras = 2;
            contadorCorrectos = 0;
            intentos = 3;
            segundosTranscurridos = 0;
            figurasEncontradas = [];
            objetosIncorrectos = [];
            // document.getElementById("contadorCorrectos").textContent = contadorCorrectos;
            document.getElementById("intentos").textContent = intentos;
            document.getElementById("mensaje").textContent = "";

            // Habilitar figuras
            const figuras = document.querySelectorAll(".figura");
            figuras.forEach(figura => {
                figura.style.pointerEvents = "auto"; // Reactiva interactividad
            });

            // Habilitar botones de acción

            document.getElementById("reiniciarBtn").disabled = false; // Deshabilitar reiniciar en curso
            document.getElementById("omitirBtn").disabled = false;
            document.getElementById("finalizarBtn").disabled = false;

            generarFiguras();
            nuevaInstruccion();
            iniciarTemporizador();
        }


        // Omitir instrucción
        function omitirInstruccion() {
            generarFiguras();
            nuevaInstruccion();
        }

        // Inicia el juego al cargar la página

        function finalizarJuego() {
            clearInterval(temporizador); // Detener el cronómetro
            const mensajeFinal = `¡El juego ha sido finalizado con éxito! 🎉. Ganaste ${estrellas} estrellas, recolectaste ${contadorCorrectos} elementos y lo hiciste en un tiempo de ${String(minutos).padStart(2, '0')}:${String(segundos).padStart(2, '0')}.`;
            mensaje.className = "incorrecto";
            mensaje.scrollIntoView({
                behavior: "smooth",
                block: "end"
            });

            document.getElementById("mensaje").textContent = mensajeFinal;
            document.getElementById("mensaje").style.color = "blue";

            mostrarConfeti(); // Mostrar confeti como celebración opcional

            // Deshabilitar botones adicionales si deseas
            desactivarEmoji();

            document.getElementById("reiniciarBtn").disabled = false; // Habilitar el botón de reiniciar
            document.getElementById("omitirBtn").disabled = true;
            document.getElementById("finalizarBtn").disabled = true;
            enviarEvaluacionDinoDiceP();

        }

        playBtn.addEventListener('click', function() {
            console.log("Juego mostrado"); // Agrega esta línea para depurar
            playBtn.style.display = 'none'; // Ocultar el botón
            areaJuego.style.display = 'none'; // Ocultar el área del botón
            contenedorJuego.style.display = 'block'; // Mostrar el juego
            generarFiguras();
            nuevaInstruccion();
            iniciarTemporizador();
        });

        // Función para enviar el tiempo final por AJAX, datos a enviar al controlador (backend)
        function enviarEvaluacionDinoDiceP() {
            var tiempo = `${String(minutos).padStart(2, '0')}:${String(segundos).padStart(2, '0')}`;
            $.ajax({
                url: '<?php echo base_url('ejercicios/ejercicios_letra_p/enviarEvaluacionDinoDiceP'); ?>', // URfL de tu controlador
                type: 'POST',
                data: {
                    tiempoFinal: tiempo,
                    objetosCorrectos: contadorCorrectos,
                    intentosInocrrectos: contadorIncorrectas,
                    totalEstrellas: estrellas,
                    arrayObjetosIncorrectos: JSON.stringify(objetosIncorrectos)

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