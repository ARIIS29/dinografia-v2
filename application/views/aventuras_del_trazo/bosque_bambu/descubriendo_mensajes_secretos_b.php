<section class="mt-10">
    <div class="container-fluid d-flex justify-content-center" style="position: relative;">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-8 col-8 justify-content-center color-fondo texto_instrucciones_bambu" id="areaJuego">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="d-flex align-items-center">
                        <img id="dinoIndicaciones1" src="<?php echo base_url('almacenamiento/img/bosque_bambu/dino-indicaciones.png') ?>" alt="Img-Dino-Indicaciones" class="img-fluid me-3 d-none d-sm-block" style="cursor: pointer;" width="6%">

                        <p class="mb-0">¡Es hora de comenzar la aventura! <br></p>
                    </div>
                    <p>
                        Prepárate para una emocionante misión: ¡Ayuda al Dino a descubrir las palabras secretas que se forman con la letra b!<br>
                        <b> Instrucciones del juego</b> <br>
                        ¡Descubre la palabra secreta! Arrastra las letras a los cuadros verdes para formar la palabra, cuando termines haz clic en el botón verde ✅ para verificar tu respuesta. <br>
                        Da clic en el botón azul, para saber <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#videoModal">
                            ¿Cómo jugar?
                        </button> <br>
                    </p>

                    <audio id="audioVista1" src="<?php echo base_url('almacenamiento/audios/descubriendo_palabras_b.mp3') ?>" preload="auto"></audio>
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
                                        <source src="<?php echo base_url('almacenamiento/img/instrucciones/descubriendo_palabras.mp4'); ?>" type="video/mp4">
                                        Tu navegador no soporta el elemento de video.
                                    </video>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p>
                        ¡Diviértete aprendiendo mientras exploramos juntos el mágico bosque de bambú! <br>
                        Haz clic en el botón de <b>Iniciar</b> para comenzar la exploración.</p>
                    <div class="col-lg-12 col-md-12 col-12 text-center animated-button">
                        <a id="play-btn">
                            <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/btn-iniciar.png') ?>" alt="" class="img-fluid" width="20%">
                        </a>
                    </div>

                </div>

            </div>
            <div class="col-lg-12 col-md-12 col-12" id="contenedorJuego">
                <audio id="audioVista2" src="<?php echo base_url('almacenamiento/audios/audio2_descubriendo_palabras_b.mp3') ?>" preload="auto"></audio>

                <div class="col-lg-12 col-md-12 col-12 position-relative mt-5 text-center mx-auto" id="animacionCarga" style="max-width: 800px; ">
                    <!-- Texto Cargando -->
                    <p id="loadingText" class="texto_loading">Cargando...</p>
                    <!-- Barra de progreso -->
                    <div class="col-lg-12 col-md-12 col-12">
                        <img id="car" src="<?php echo base_url('almacenamiento/img/dinografia/dino-coche.png') ?>" alt="Dino Coche" class="img-fluid img_dino_coche">
                    </div>
                    <div class="progress" style="height: 30px;">
                        <div id="progress" class="progress-bar bg-success" style="width: 0;"></div>
                    </div>
                    <!-- Imagen del coche -->

                </div>

                <canvas id="confettiCanvas"></canvas>
                <audio id="audioEstrellas" src="<?php echo base_url('almacenamiento/audios/efecto_sonido_estrella.mp3') ?>" preload="auto"></audio>
                <audio id="audioIncorrecto" src="<?php echo base_url('almacenamiento/audios/incorrecto.mp3') ?>" preload="auto"></audio>
                <audio id="audioTractor" src="<?php echo base_url('almacenamiento/audios/efecto_sonido_estrella.mp3') ?>" preload="auto"></audio>
                <!-- <p class="indicaciones">Arrastra las palabras hacia los contenedores verdes y forma bien el mensaje secreto. <br>Da clic en el botón verde ✅ para verificar tu respuesta.</p> -->
                <div id="emojiPalabra" class="emoji"></div>
                <div id="contenedorPalabras"></div>
                <div id="contenedorOracion"></div>
                <div id="botonesContenedor" class="d-flex justify-content-center mt-5 d-none">

                    <button id="verificarPalabraBtn" class="btn verificar me-2" title="Verificar Palbra">
                        <i class="fas fa-check"></i> Verificar Palabra
                    </button>

                    <button id="saltarPalabraBtn" class="btn saltar me-2" title="Saltar Palabra">
                        <i class="fas fa-arrow-right"></i> Saltar Palabra
                    </button>

                    <button id="reiniciarJuegoBtn" class="btn reiniciar me-2" title="Reiniciar Juego">
                        <i class="fas fa-redo"></i> Reiniciar Misión
                    </button>

                    <button id="finalizarJuegoBtn" class="btn finalizar me-2" title="Finalizar Juego">
                        <i class="fas fa-times"></i> Finalizar Misión
                    </button>
                </div>
                <div class="col-lg-12 col-md-12 col-12" id="mensaje">
                </div>
            </div>

        </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const playBtn = document.getElementById('play-btn');
        const audioEstrellas = document.getElementById('audioEstrellas');
        const audioTractor = document.getElementById('audioTractor');
        const audioIncorrecto = document.getElementById('audioIncorrecto');
        const dinoIndicaciones1 = document.getElementById('dinoIndicaciones1');
        const dinoIndicaciones = document.getElementById('dinoIndicaciones');
        const audio1 = document.getElementById('audioVista1');
        const audio2 = document.getElementById('audioVista2');


        document.getElementById('play-btn').addEventListener('click', function() {
            // Mostrar el encabezado del juego
            document.getElementById('header-juego').classList.remove('d-none');

            // Ocultar el encabezado inicial
            document.getElementById('header-inicial').classList.add('d-none');
        });

        audio1.play().catch(error => {
            console.log("Error al reproducir audioVista1:", error);
        });
        audioIndicacionesUno();

        playBtn.addEventListener('click', function() {

            playBtn.style.display = 'none'; // Ocultar el botón después de hacer clic
            console.log("Juego mostrado"); // Agrega esta línea para depurar
            // Ocultar el área donde está el botón de inicio
            document.getElementById('areaJuego').style.display = 'none';
            // Mostrar el contenedor del juego
            document.getElementById('contenedorJuego').style.display = 'block'; // Cambié 'flex' por 'block' para asegurar visibilidad
            audio1.pause();
            audio1.currentTime = 0;
            audio2.play().catch(error => {
                console.log("Error al reproducir audio automáticamente:", error);
            });
            audioIndicacionesDos();
            startAnimation();

            // Inicia el cronómetro
        });

        function audioIndicacionesUno() {
            dinoIndicaciones1.addEventListener('click', function() {
                if (audio1.paused) {
                    audio1.play().catch(error => console.log("Error al reproducir el audio:", error));
                } else {
                    audio1.pause();
                    audio1.currentTime = 0;
                }
            });
        }

        function audioIndicacionesDos() {
            dinoIndicaciones.addEventListener('click', function() {
                if (audio2.paused) {
                    audio2.play().catch(error => console.log("Error al reproducir el audio:", error));
                } else {
                    audio2.pause();
                    audio2.currentTime = 0;
                }
            });
        }

        function startAnimation() {
            // audioEstrellaPuntos();
            const loadingText = document.getElementById('loadingText');
            const progress = document.getElementById('progress');
            const car = document.getElementById('car');
            const animacionCarga = document.getElementById('animacionCarga');

            // Mostrar el texto de "Cargando..."
            loadingText.style.display = 'block';

            let width = 0;
            const interval = setInterval(() => {
                width += 2; // Incremento de progreso (ajusta la velocidad según prefieras)
                progress.style.width = width + '%';
                // Mueve el coche a lo largo de la barra (ajustamos su posición en función del ancho alcanzado)
                car.style.left = Math.min(width, 90) + '%'; // Se detiene antes de llegar al 100%

                if (width >= 100) {
                    clearInterval(interval);
                    // Opcional: muestra un mensaje final de "¡Comienza!"
                    loadingText.textContent = "¡Comienza!";
                    // Después de un breve retraso, oculta la animación y comienza el juego
                    setTimeout(() => {
                        animacionCarga.style.display = 'none';
                        iniciarJuego();
                        startTimer();
                    }, 500);
                }
            }, 50);
        }
        const palabras = [{
                palabra: "Explorando el bosque de bambú.",
                emoji: ""
            }, {
                palabra: "Bambú se escribe con la letra b.",
                emoji: ""
            },
            {
                palabra: "La letra b siempre camina a la derecha.",
                emoji: ""
            },
            {
                palabra: "La letra b se encuentra en los binoculares.",
                emoji: ""
            },
            {
                palabra: "Recuerda los binoculares cuando escribas la letra b.",
                emoji: ""
            },
        ];

        let palabrasRestantes = [...palabras];
        let palabraActual = null;

        //Bloque de palabras buenas
        var contadorBuenas = 0;
        var palabrasCorrectas = [];
        var nuevapalabrasCorrectas = [];

        //Bloque de palabras incorrectas
        var contadorIncorrectas = 0;
        let palabrasIncorrectas = [];
        var palabraIncorrecta = ' ';
        var nuevapalabrasIncorrectas = [];

        const contenedorPalabras = document.getElementById("contenedorPalabras");
        const contenedorOracion = document.getElementById("contenedorOracion");
        const mensaje = document.getElementById("mensaje");
        const emojiPalabra = document.getElementById("emojiPalabra");
        const timerElement = document.getElementById('timer');
        const contadorVidas = document.getElementById("contadorVidas");
        const contadorEstrellas = document.getElementById("contadorEstrellas");

        // const botonVerificar = document.querySelector("button");


        let elementoArrastrado = null;
        let timer;
        let minutes = 0;
        let seconds = 0;
        let vidas = 3;
        let estrellas = 0;
        // Añadir soporte táctil para arrastrar y soltar
        let touchElementoArrastrado = null;
        var mensajeIncorrecto = '';
        var nuevaMensajeIncorrecto = [];

        document.getElementById('verificarPalabraBtn').addEventListener('click', verificarPalabra);
        document.getElementById('saltarPalabraBtn').addEventListener('click', saltarPalabra);
        document.getElementById('finalizarJuegoBtn').addEventListener('click', finalizarJuego);
        document.getElementById('reiniciarJuegoBtn').addEventListener('click', reiniciarJuego);

        function startTimer() {
            timer = setInterval(() => {
                seconds++;
                if (seconds === 60) {
                    minutes++;
                    seconds = 0;
                }
                timerElement.textContent = `${formatTime(minutes)}:${formatTime(seconds)}`;
            }, 1000);
        }

        function formatTime(time) {
            return time < 10 ? `0${time}` : time;
        }

        function iniciarJuego() {
            document.getElementById('botonesContenedor').classList.remove('d-none');

            contenedorPalabras.innerHTML = "";
            contenedorOracion.innerHTML = "";
            mensaje.textContent = "";
            mensaje.className = "";
            mensaje.textContent2 = "";

            const indice = Math.floor(Math.random() * palabrasRestantes.length);
            palabraActual = palabrasRestantes.splice(indice, 1)[0];

            emojiPalabra.textContent = palabraActual.emoji;

            const letras = mezclar(palabraActual.palabra.split(" "));
            console.log('Constante letras: ', letras);
            letras.forEach(letra => {
                const casillaLetra = document.createElement("div");
                casillaLetra.textContent = letra;
                casillaLetra.classList.add("casilla-letra");
                casillaLetra.draggable = true;
                casillaLetra.addEventListener("dragstart", iniciarArrastre);
                contenedorPalabras.appendChild(casillaLetra);
            });

            for (let i = 0; i < palabraActual.palabra.split(" ").length; i++) {
                const casillaPalabra = document.createElement("div");
                casillaPalabra.classList.add("casilla-palabra");
                casillaPalabra.setAttribute("data-indice", i);
                casillaPalabra.addEventListener("dblclick", limpiarCasilla);
                contenedorOracion.appendChild(casillaPalabra);
            }

        }

        // Iniciar el arrastre táctil
        contenedorPalabras.addEventListener("touchstart", (evento) => {
            const touch = evento.targetTouches[0];
            const elemento = evento.target;

            if (elemento.classList.contains("casilla-letra")) {
                touchElementoArrastrado = elemento;

                // Clonar el elemento para la vista de arrastre
                const clone = elemento.cloneNode(true);
                clone.style.position = "absolute";
                clone.style.zIndex = "1000";
                clone.style.pointerEvents = "none";
                clone.id = "arrastradoTouch";
                document.body.appendChild(clone);

                elemento.dataset.startX = touch.clientX;
                elemento.dataset.startY = touch.clientY;
                elemento.dataset.offsetX = touch.clientX - elemento.getBoundingClientRect().left;
                elemento.dataset.offsetY = touch.clientY - elemento.getBoundingClientRect().top;
            }
        });

        // Mover el elemento durante el toque
        document.addEventListener("touchmove", (evento) => {
            if (!touchElementoArrastrado) return;

            const touch = evento.targetTouches[0];
            const clone = document.getElementById("arrastradoTouch");
            const x = touch.clientX - touchElementoArrastrado.dataset.offsetX;
            const y = touch.clientY - touchElementoArrastrado.dataset.offsetY;

            if (clone) {
                clone.style.left = `${x}px`;
                clone.style.top = `${y}px`;
            }
        });

        // Soltar el elemento táctil
        document.addEventListener("touchend", (evento) => {
            if (!touchElementoArrastrado) return;

            const touch = evento.changedTouches[0];
            const casillaObjetivo = document.elementFromPoint(touch.clientX, touch.clientY);

            // Eliminar la vista de arrastre
            const clone = document.getElementById("arrastradoTouch");
            if (clone) clone.remove();

            if (casillaObjetivo && casillaObjetivo.classList.contains("casilla-palabra") && !casillaObjetivo.textContent) {
                casillaObjetivo.textContent = touchElementoArrastrado.textContent;
                const indice = casillaObjetivo.dataset.indice;
                const correcto = touchElementoArrastrado.textContent === palabraActual.palabra[indice];
                casillaObjetivo.dataset.correcto = correcto;

                if (correcto) {
                    touchElementoArrastrado.draggable = false;
                    touchElementoArrastrado.style.opacity = 0.5;
                } else {
                    touchElementoArrastrado.style.visibility = "hidden";
                }
            }

            touchElementoArrastrado = null;
        });


        function mezclar(array) {
            for (let i = array.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [array[i], array[j]] = [array[j], array[i]];
            }
            return array;
        }

        function iniciarArrastre(evento) {
            elementoArrastrado = evento.target;
        }

        contenedorOracion.ondragover = (evento) => evento.preventDefault();

        contenedorOracion.ondrop = (evento) => {
            evento.preventDefault();
            const objetivo = evento.target;

            if (objetivo.classList.contains("casilla-palabra") && !objetivo.textContent) {
                objetivo.textContent = elementoArrastrado.textContent;
                const indice = objetivo.dataset.indice;
                const correcto = elementoArrastrado.textContent === palabraActual.palabra.split(" ")[indice];
                objetivo.dataset.correcto = correcto;

                if (correcto) {
                    elementoArrastrado.draggable = false;
                    elementoArrastrado.style.opacity = 0.5;
                } else {
                    elementoArrastrado.style.visibility = "hidden";
                }
            }
        };

        function limpiarCasilla(evento) {
            const casilla = evento.target;

            if (casilla.dataset.correcto === "true") return;

            const letraCorrespondiente = Array.from(contenedorPalabras.children).find(
                letra => letra.style.visibility === "hidden" && letra.textContent === casilla.textContent
            );
            if (letraCorrespondiente) {
                letraCorrespondiente.style.visibility = "visible";
                casilla.textContent = "";
            }
        }


        function verificarPalabra() {
            console.log("palabra verificada");
            // Si las vidas son 0, no ejecutar la función
            if (vidas <= 0) {
                return;
            }

            let errores = false;

            // Verificar si las palabras coinciden
            Array.from(contenedorOracion.children).forEach((casilla, i) => {
                palabraIncorrecta = palabraIncorrecta + casilla.textContent + ' ';
                // const palabraactual = palabraActual.palabra.split(" ");
                if (casilla.textContent !== palabraActual.palabra.split(" ")[i]) {
                    casilla.classList.add("error");
                    errores = true;
                } else {
                    casilla.classList.remove("error");
                }
            });

            // Manejar el caso cuando no hay errores
            if (!errores) {
                mensaje.textContent = "¡Super asombroso 🎉! Has formado bien la oración. Recompensa 200 estrellas";
                mensaje.className = "correcto";
                mensaje.scrollIntoView({
                    behavior: "smooth",
                    block: "end"
                });

                contadorBuenas++;
                estrellas += 200;
                contadorEstrellas.textContent = estrellas;
                nuevapalabrasCorrectas = palabrasCorrectas.push(palabraActual.palabra);
                console.log('Buenas', contadorBuenas);
                console.log('Palabra correcta:', palabraActual.palabra);
                console.log('Array de Palabra correcta:', nuevapalabrasCorrectas);
                for (i = 0; i < palabrasCorrectas.length; i++) {
                    console.log(`${i}: ${palabrasCorrectas[i]}`);
                    estrellaSalta();
                    mostrarEstrellasCentrales();
                }
                palabraIncorrecta = '';

                // Verificar si se completaron todas las palabras
                if (palabrasRestantes.length === 0) {
                    // Crear el mensaje inicial
                    mostrarMensajeExitoFelicidades();
                    let resultado = `¡Felicidades, has formado todos los mensajes secretos! 🎉. Ganaste ${estrellas} estrellas, descubriste los ${contadorBuenas} mensajes secretos y lo hiciste en un tiempo de ${formatTime(minutes)}:${formatTime(seconds)}.`;
                    document.getElementById("verificarPalabraBtn").disabled = true;
                    document.getElementById("saltarPalabraBtn").disabled = true;
                    document.getElementById("finalizarJuegoBtn").disabled = true;


                    // Añadir cada palabra correcta al mensaje
                    // for (let i = 0; i < palabrasCorrectas.length; i++) {
                    //     resultado += `${i + 1}. ${palabrasCorrectas[i]}\n`; 
                    // }

                    // Asignar el mensaje completo al elemento
                    mensaje.textContent = resultado;

                    // Detener el temporizador y establecer la clase
                    clearInterval(timer);
                    mensaje.className = "correcto";

                    mensaje.scrollIntoView({
                        behavior: "smooth",
                        block: "end"
                    });

                    enviarEvaluacionMensajesSecretosB();
                    mostrarConfeti();
                    return;
                }

                setTimeout(iniciarJuego, 3000);
            } else {
                // Reducir vidas y mostrar mensaje de error
                vidas--;
                contadorVidas.textContent = vidas;
                contadorIncorrectas++;
                movimientosSalta();
                if (contadorIncorrectas === 1) {
                    mostrarLapizRoto(1);
                    mensaje.innerHTML = `¡Casi lo logras <?php echo $this->session->userdata('usuario'); ?>!🌟 
                Las letras en rojo no van ahí. Dales doble clic y corrígelas ✅ <br>
                ¡Solo te quedan  ${vidas} intentos, tú puedes! 💪`;
                }
                if (contadorIncorrectas === 2) {
                    mostrarLapizRoto(2);
                    mensaje.innerHTML = `¡Casi lo logras <?php echo $this->session->userdata('usuario'); ?>!🌟 
                Las letras en rojo no van ahí. Dales doble clic y corrígelas ✅ <br>
                ¡Solo te queda  ${vidas} intento, tú puedes! 💪`;
                }
                if (contadorIncorrectas === 3) {
                    mostrarLapizRoto(3);
                    mensaje.innerHTML = `¡Casi lo logras <?php echo $this->session->userdata('usuario'); ?>!🌟 
                 Te quedaste sin intentos, ¡pero diste lo mejor! 💪`;
                }

                // mensaje.textContent = `¡Buen intento!🌟 Las casillas rojas están mal colocadas, da dos veces clic en la ficha roja para corregir y vuelve a verificar ✅. Te quedan solo ${vidas} intentos`;
                mensaje.className = "incorrecto";
                // nuevapalabrasIncorrectas = palabrasIncorrectas.push(palabraActual.palabra);
                console.log('Incorrectas', contadorIncorrectas);
                console.log('Palabra correcta:', palabraActual.palabra);
                console.log('Palabra incorrecta: ', palabraIncorrecta);
                mensaje.scrollIntoView({
                    behavior: "smooth",
                    block: "end"
                });

                let palabraIncorrectaCorrecta = '🔴 <b>Mensaje formado: </b>' + palabraIncorrecta + '<br> 🟢 <b>Mensaje correcto: </b>' + palabraActual.palabra;

                nuevapalabrasIncorrectas = palabrasIncorrectas.push(palabraIncorrectaCorrecta);
                palabraIncorrecta = ' ';
                for (i = 0; i < palabrasIncorrectas.length; i++) {
                    console.log(`${i}: ${palabrasIncorrectas[i]}`);
                }

                // console.log('Array de Palabra incorrecta:', nuevapalabrasIncorrectas);
                // for (i = 0; i < palabrasIncorrectas.length; i++) {
                //     console.log(`${i}: ${palabrasIncorrectas[i]}`);
                // }

                // Si las vidas llegan a 0, desactivar el botón de verificar
                if (vidas <= 0) {
                    mostrarMensajeExitoIntentos();
                    mensaje.textContent = `Juego terminado. ¡A seguir practicando, te has quedado sin intentos! 💪. Ganaste ${estrellas} estrellas, descubriste los ${contadorBuenas} mensajes secretos y lo hiciste en un tiempo de ${formatTime(minutes)}:${formatTime(seconds)}.`;
                    mensaje.className = "incorrecto";
                    clearInterval(timer);
                    mensaje.scrollIntoView({
                        behavior: "smooth",
                        block: "end"
                    });

                    // Desactivar los elementos del juego
                    Array.from(contenedorPalabras.children).forEach(letra => {
                        letra.draggable = false;
                        letra.style.cursor = "not-allowed";
                    });
                    Array.from(contenedorOracion.children).forEach(casilla => {
                        casilla.style.pointerEvents = "none";
                    });
                    document.getElementById("verificarPalabraBtn").disabled = true;
                    document.getElementById("saltarPalabraBtn").disabled = true;
                    document.getElementById("finalizarJuegoBtn").disabled = true;

                    enviarEvaluacionMensajesSecretosB();
                }
            }
        }

        function mostrarMensajeExitoIntentos() {
            // Crear el mensaje de éxito
            const mensaje = document.createElement('div');
            mensaje.textContent = `Recomepensa acumulada ${estrellas}`;
            mensaje.innerHTML = `<b>¡Tu misión ha terminado! 🦖</b> <br> 
            ¡Muy cerca, <?php echo $this->session->userdata('usuario'); ?>, usaste tus 3 intentos! ✏️ <br>
            Puedes seguir mejorando en tu próxima exploración 💪<br>
            ⭐ Estrellas obtenidas: <strong>${estrellas}</strong><br> 
            📝 Palabras encontradas <strong>${contadorBuenas}</strong><br>
            ⏰ Tiempo <strong>${formatTime(minutes)}:${formatTime(seconds)}</strong>.  <br>
            Cada exploración te llevará a buen resultado. ¡Sigue explorando! 🔍 <br>
            ¿Quieres seguir explorando esta misión o ir al menú principal?`;
            mensaje.style.color = '#214524';
            mensaje.style.fontWeight = 'bold';
            mensaje.style.position = 'absolute';
            mensaje.style.top = '50px'; // Posición en la pantalla
            mensaje.style.left = '50%'; // Centrar horizontalmente
            mensaje.style.transform = 'translateX(-50%)'; // Centrar correctamente
            mensaje.style.backgroundColor = '#E0F3B8';
            mensaje.style.border = '5px solid #00984f';
            mensaje.style.padding = '10px';
            mensaje.style.borderRadius = '5px';
            mensaje.style.zIndex = '9999'; // Asegurar que el mensaje esté encima del canvas
            audioEstrellas.play().catch(error => {
                console.log("Error al reproducir el audio:", error);
            });

            // Agregar los botones para seguir o no trazando
            const botones = document.createElement('div');
            botones.style.marginTop = '10px';
            botones.style.textAlign = 'center';
            const botonSeguir = document.createElement('button');
            botonSeguir.textContent = 'Sí, seguir explorando';
            botonSeguir.style.marginRight = '10px';
            botonSeguir.classList.add('btn', 'btn-success');

            const botonNoSeguir = document.createElement('button');
            botonNoSeguir.textContent = 'No, ir al menú principal';
            botonNoSeguir.classList.add('btn', 'btn-danger');

            // Acción al hacer clic en "Sí, seguir trazando"
            botonSeguir.addEventListener('click', () => {
                reiniciarJuego();
                mensaje.remove(); // Eliminar el mensaje
            });

            // Acción al hacer clic en "No, ir al menú principal"
            botonNoSeguir.addEventListener('click', () => {
                window.location.href = '<?php echo base_url('letras/bosque_bambu'); ?>'; // Cambiar la URL del menú principal
            });

            // Añadir los botones al mensaje
            botones.appendChild(botonSeguir);
            botones.appendChild(botonNoSeguir);
            mensaje.appendChild(botones);

            // Añadir el mensaje al body
            document.body.appendChild(mensaje);

        }

        function mostrarMensajeExitoFinalizar() {

            // Crear el mensaje de éxito
            const mensaje = document.createElement('div');
            mensaje.textContent = `Recomepensa acumulada ${estrellas}`;
            mensaje.innerHTML = `<b>¡Fin de la misión! 🦖</b> <br> 
            ¡Haz finalizado la exploración, <?php echo $this->session->userdata('usuario'); ?>! ✏️ <br>
            En tu recorrido diste un gran paso, ¡cada intento te hace mejor! 💪<br>
            ⭐ Estrellas obtenidas: <strong>${estrellas}</strong><br> 
            📝 Palabras encontradas <strong>${contadorBuenas}</strong><br>
            ⏰ Tiempo <strong>${formatTime(minutes)}:${formatTime(seconds)}</strong> <br>
            Cada exploración te llevará a buen resultado. ¡Sigue explorando! 🔍 <br>
            ¿Quieres seguir explorando esta misión o ir al menú principal?`;
            mensaje.style.color = '#214524';
            mensaje.style.fontWeight = 'bold';
            mensaje.style.position = 'absolute';
            mensaje.style.top = '50px'; // Posición en la pantalla
            mensaje.style.left = '50%'; // Centrar horizontalmente
            mensaje.style.transform = 'translateX(-50%)'; // Centrar correctamente
            mensaje.style.backgroundColor = '#E0F3B8';
            mensaje.style.border = '5px solid #00984f';
            mensaje.style.padding = '10px';
            mensaje.style.borderRadius = '5px';
            mensaje.style.zIndex = '9999'; // Asegurar que el mensaje esté encima del canvas
            audioEstrellas.play().catch(error => {
                console.log("Error al reproducir el audio:", error);
            });

            // Agregar los botones para seguir o no trazando
            const botones = document.createElement('div');
            botones.style.marginTop = '10px';
            botones.style.textAlign = 'center';
            const botonSeguir = document.createElement('button');
            botonSeguir.textContent = 'Sí, seguir explorando';
            botonSeguir.style.marginRight = '10px';
            botonSeguir.classList.add('btn', 'btn-success');

            const botonNoSeguir = document.createElement('button');
            botonNoSeguir.textContent = 'No, ir al menú principal';
            botonNoSeguir.classList.add('btn', 'btn-danger');

            // Acción al hacer clic en "Sí, seguir trazando"
            botonSeguir.addEventListener('click', () => {
                reiniciarJuego();
                mensaje.remove(); // Eliminar el mensaje
            });

            // Acción al hacer clic en "No, ir al menú principal"
            botonNoSeguir.addEventListener('click', () => {
                window.location.href = '<?php echo base_url('letras/bosque_bambu'); ?>'; // Cambiar la URL del menú principal
            });

            // Añadir los botones al mensaje
            botones.appendChild(botonSeguir);
            botones.appendChild(botonNoSeguir);
            mensaje.appendChild(botones);

            // Añadir el mensaje al body
            document.body.appendChild(mensaje);

        }

        function mostrarMensajeExitoFelicidades() {
            // Crear el mensaje de éxito
            const mensaje = document.createElement('div');
            mensaje.textContent = `Recomepensa acumulada ${estrellas}`;
            mensaje.innerHTML = `<b>¡Misión completada!</b> 🎉🦖 <br> 
            ¡Felicidades <?php echo $this->session->userdata('usuario'); ?>! ✏️ <br>
            En esta misión descubristes <b>todas las palabras</b>. <br>
            ¡Sigue así, lo estas haciendo genial!🎁¡Toma tu recompensa! <br>
            ⭐ Estrellas ganadas: <strong>${estrellas}</strong> <br> 
            📝 Palabras encontradas <strong>${contadorBuenas}</strong> <br>
            ⏰ Tiempo <strong>${formatTime(minutes)}:${formatTime(seconds)}</strong><br>
            Cada exploración te llevará a buen resultado. ¡Sigue explorando! 🔍<br>
            ¿Quieres seguir explorando esta misión o ir al menú principal?`;
            mensaje.style.color = '#214524';
            mensaje.style.fontWeight = 'bold';
            mensaje.style.position = 'absolute';
            mensaje.style.top = '50px'; // Posición en la pantalla
            mensaje.style.left = '50%'; // Centrar horizontalmente
            mensaje.style.transform = 'translateX(-50%)'; // Centrar correctamente
            mensaje.style.backgroundColor = '#E0F3B8';
            mensaje.style.border = '5px solid #00984f';
            mensaje.style.padding = '10px';
            mensaje.style.borderRadius = '5px';
            mensaje.style.zIndex = '9999'; // Asegurar que el mensaje esté encima del canvas
            audioEstrellas.play().catch(error => {
                console.log("Error al reproducir el audio:", error);
            });

            // Agregar los botones para seguir o no trazando
            const botones = document.createElement('div');
            botones.style.marginTop = '10px';
            botones.style.textAlign = 'center';
            const botonSeguir = document.createElement('button');
            botonSeguir.textContent = 'Sí, seguir explorando';
            botonSeguir.style.marginRight = '10px';
            botonSeguir.classList.add('btn', 'btn-success');

            const botonNoSeguir = document.createElement('button');
            botonNoSeguir.textContent = 'No, ir al menú principal';
            botonNoSeguir.classList.add('btn', 'btn-danger');

            // Acción al hacer clic en "Sí, seguir trazando"
            botonSeguir.addEventListener('click', () => {
                reiniciarJuego();
                mensaje.remove(); // Eliminar el mensaje
            });

            // Acción al hacer clic en "No, ir al menú principal"
            botonNoSeguir.addEventListener('click', () => {
                window.location.href = '<?php echo base_url('letras/bosque_bambu'); ?>'; // Cambiar la URL del menú principal
            });

            // Añadir los botones al mensaje
            botones.appendChild(botonSeguir);
            botones.appendChild(botonNoSeguir);
            mensaje.appendChild(botones);

            // Añadir el mensaje al body
            document.body.appendChild(mensaje);

        }

        function saltarPalabra() {
            console.log("palabra saltada");
            palabrasRestantes.push(palabraActual);
            iniciarJuego();
        }

        function finalizarJuego() {
            mostrarMensajeExitoFinalizar();
            console.log("fin del juego");
            // Detener el cronómetro
            clearInterval(timer);

            // Mostrar un mensaje con el tiempo y los aciertos
            mensaje.textContent = `¡El juego ha sido finalizado con éxito! 🎉. Ganaste ${estrellas} estrellas, descubriste los ${contadorBuenas} mensajes secretos y lo hiciste en un tiempo de ${formatTime(minutes)}:${formatTime(seconds)}.`;
            mensaje.className = "incorrecto";
            mensaje.scrollIntoView({
                behavior: "smooth",
                block: "end"
            });
            // Desactivar los elementos del juego
            Array.from(contenedorPalabras.children).forEach(letra => {
                letra.draggable = false;
                letra.style.cursor = "not-allowed";
            });
            Array.from(contenedorOracion.children).forEach(casilla => {
                casilla.style.pointerEvents = "none";
            });

            // Deshabilitar los botones para evitar interacción adicional
            document.getElementById("verificarPalabraBtn").disabled = true;
            document.getElementById("saltarPalabraBtn").disabled = true;
            document.getElementById("finalizarJuegoBtn").disabled = true;
            enviarEvaluacionMensajesSecretosB();
        }

        function reiniciarJuego() {
            console.log("juego reiniciado");
            estrellas = 0;
            contadorEstrellas.textContent = estrellas;

            //Bloque de palabras buenas
            contadorBuenas = 0;
            palabrasCorrectas = [];
            nuevapalabrasCorrectas = [];

            //Bloque de palabras incorrectas
            contadorIncorrectas = 0;
            palabrasIncorrectas = [];
            palabraIncorrecta = '';
            nuevapalabrasIncorrectas = [];
            clearInterval(timer); // Detener el cronómetro anterior
            minutes = 0;
            seconds = 0;
            // timerElement.textContent = "Tiempo: 00:00";

            vidas = 3; // Reiniciar vidas
            contadorVidas.textContent = vidas;

            contadorBuenas = 0; // Reiniciar aciertos
            palabrasRestantes = [...palabras]; // Volver a llenar las palabras restantes
            palabrasCorrectas = [];
            mensaje.textContent = ""; // Limpiar mensajes
            mensaje.className = "";

            document.getElementById("verificarPalabraBtn").disabled = false;
            document.getElementById("saltarPalabraBtn").disabled = false;
            document.getElementById("finalizarJuegoBtn").disabled = false;

            iniciarJuego(); // Iniciar el juego de nuevo
            startTimer(); // Iniciar el cronómetro
        }

        function audioEstrellaPuntos() {
            console.log("audio reproducido");
            audioEstrellas.play().catch(error => {
                console.log("Error al reproducir el audio:", error);
            });
        }

        function estrellaSalta() {
            const estrella = document.querySelector('img[src*="estrella.png"]');

            // Reiniciar animación si ya tiene la clase
            estrella.classList.remove('saltarE');
            void estrella.offsetWidth; // Forzar reflow para reiniciar la animación
            estrella.classList.add('saltarE');

            // Reproducir audio (opcional)
            audioEstrellas.play().catch(error => {
                console.log("Error al reproducir el audio:", error);
            });
        }

        function movimientosSalta() {
            const estrella = document.querySelector('img[src*="movimientos.png"]');

            // Reiniciar animación si ya tiene la clase
            estrella.classList.remove('saltarE');
            void estrella.offsetWidth; // Forzar reflow para reiniciar la animación
            estrella.classList.add('saltarE');

            // Reproducir audio (opcional)
            audioIncorrecto.play().catch(error => {
                console.log("Error al reproducir el audio:", error);
            });
        }

        function mostrarEstrellasCentrales(cantidad = 20) {
            for (let i = 0; i < cantidad; i++) {
                const estrella = document.createElement('div');
                estrella.classList.add('estrella-central');

                // Posición aleatoria
                const top = Math.random() * 100;
                const left = Math.random() * 100;
                estrella.style.top = `${top}%`;
                estrella.style.left = `${left}%`;

                // Tamaño aleatorio
                const tamaño = Math.floor(Math.random() * 60) + 30; // Entre 30 y 90 px
                estrella.style.width = `${tamaño}px`;
                estrella.style.height = `${tamaño}px`;

                // Ángulo de rotación aleatorio
                const rotacion = Math.floor(Math.random() * 360);
                estrella.style.setProperty('--rotacion', `${rotacion}deg`);

                // Dirección de desplazamiento al desaparecer
                const offsetX = Math.random() * 100 - 50; // entre -50 y +50
                const offsetY = Math.random() * 100 - 50;
                estrella.style.setProperty('--desplazarX', `${offsetX}px`);
                estrella.style.setProperty('--desplazarY', `${offsetY}px`);

                document.body.appendChild(estrella);

                // Quitar del DOM después de la animación
                setTimeout(() => {
                    estrella.remove();
                }, 1600);
            }

            // Reproducir audio (opcional)
            audioEstrellas.play().catch(error => {
                console.log("Error al reproducir el audio:", error);
            });
        }


        function mostrarLapizRoto(vidasPerdidas) {
            const lapiz = document.createElement('div');
            lapiz.classList.add('lapiz-central');

            // Crear partes del lápiz
            const goma = document.createElement('div');
            goma.classList.add('goma');

            const cuerpo = document.createElement('div');
            cuerpo.classList.add('cuerpo');

            const punta = document.createElement('div');
            punta.classList.add('punta');

            // Agregar partes visibles dependiendo de vidas restantes
            if (vidasPerdidas < 1) {
                lapiz.appendChild(goma);
                lapiz.appendChild(cuerpo);
                lapiz.appendChild(punta);
            } else if (vidasPerdidas === 1) {
                lapiz.appendChild(goma);
                lapiz.appendChild(cuerpo);
                lapiz.appendChild(punta);
                setTimeout(() => goma.classList.add('roto'), 400);
            } else if (vidasPerdidas === 2) {
                lapiz.appendChild(cuerpo);
                lapiz.appendChild(punta);
                setTimeout(() => cuerpo.classList.add('roto'), 400);
            } else if (vidasPerdidas === 3) {
                lapiz.appendChild(punta);
                setTimeout(() => punta.classList.add('roto'), 400);
            }

            document.body.appendChild(lapiz);

            // Remover lápiz del DOM después de la animación
            setTimeout(() => {
                lapiz.remove();
            }, 1600); // Duración total
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

        // Función para enviar el tiempo final por AJAX, datos a enviar al controlador (backend)
        function enviarEvaluacionMensajesSecretosB() {
            var tiempo = `${formatTime(minutes)}:${formatTime(seconds)}`;
            $.ajax({
                url: '<?php echo base_url('ejercicios/ejercicios_letra_b/enviarEvaluacionMensajesSecretosB'); ?>', // URL de tu controlador
                type: 'POST',
                data: {
                    tiempoFinal: tiempo,
                    palabrasCorrectas: contadorBuenas,
                    palabrasIncorrectas: contadorIncorrectas,
                    totalEstrellas: estrellas,
                    arrayPalabras: JSON.stringify(palabrasIncorrectas)

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