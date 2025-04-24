<section class="mt-10">
    <div class="container-fluid d-flex justify-content-center" style="position: relative;">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-8 col-8 justify-content-center color-fondo instrucciones" id="areaJuego">
                <div class="col-lg-12 col-md-12 col-12 mt-2">
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
                                        <source src="<?php echo base_url('almacenamiento/img/instrucciones/elementos_perdidos.mp4'); ?>" type="video/mp4">
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
            <div class="col-lg-12 col-md-12 col-12 justify-content-center" id="contenedorJuego">

                <audio id="audioVista2" src="<?php echo base_url('almacenamiento/audios/audio2_descubriendo_palabras_b.mp3') ?>" preload="auto"></audio>
                <audio id="audioEstrellas" src="<?php echo base_url('almacenamiento/audios/efecto_sonido_estrella.mp3') ?>" preload="auto"></audio>
                <audio id="audioIncorrecto" src="<?php echo base_url('almacenamiento/audios/incorrecto.mp3') ?>" preload="auto"></audio>
                <audio id="audioTractor" src="<?php echo base_url('almacenamiento/audios/efecto_sonido_estrella.mp3') ?>" preload="auto"></audio>
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

                <!-- <div class="col-12 text-center" id="objetivoEmoji"></div> -->
                <div class="justify-content-center areaJuegoObjetos" id="areaJuegoObjetos"></div>
                <div class="col-lg-4 col-md-4">
                    <span class="text-azul ms-2" id="objetoRecolectado"></span>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <button id="pasarNivelBtn" class="btn saltar me-2" title="Saltar elemento">
                        <i class="fas fa-arrow-right"></i>
                    </button>
                    <button id="reiniciarJuegoBtn" class="btn reiniciar me-2" title="Reiniciar Juego">
                        <i class="fas fa-redo"></i>
                    </button>

                    <button id="finalizarJuegoBtn" class="btn finalizar me-2" title="Finalizar Juego">
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

            console.log("Juego mostrado"); // Agrega esta línea para depurar
            playBtn.style.display = 'none'; // Ocultar el botón después de hacer clic
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
                        iniciarTemporizador();
                        mostrarEmojis();
                    }, 500);
                }
            }, 50);
        }

        const areaJuego = document.getElementById('areaJuego');
        const contenedorJuego = document.getElementById('contenedorJuego');

        const areaJuegoObjetos = document.getElementById('areaJuegoObjetos');
        const mensaje = document.getElementById('mensaje');
        const temporizadorElemento = document.getElementById('temporizador');
        const objetivoEmojiElemento = document.getElementById('objetivoEmoji');
        const intentosElemento = document.getElementById('intentos');
        const siguienteNivelElemento = document.getElementById('siguienteNivel');
        const recolectadosElemento = document.getElementById('objetoRecolectado');

        document.getElementById('pasarNivelBtn').addEventListener('click', pasarNivel);
        document.getElementById('finalizarJuegoBtn').addEventListener('click', finalizarJuego);
        document.getElementById('reiniciarJuegoBtn').addEventListener('click', reiniciarJuego);


        const frutasDisponibles = [{
                emoji: "🥾",
                nombre: "bota"
            },
            {
                emoji: "🧭",
                nombre: "brújula"
            },
            {
                emoji: "⛵",
                nombre: "barco"
            },
            {
                emoji: "🧣",
                nombre: "bufanda"
            },
            {
                emoji: "🏳️",
                nombre: "bandera"
            },
            {
                emoji: "💡",
                nombre: "bombilla"
            },
            {
                emoji: "👜",
                nombre: "bolsa"
            },
            {
                emoji: "🚲",
                nombre: "bicicleta"
            },
            {
                emoji: "🧥",
                nombre: "abrigo"
            },
            {
                emoji: "🎈",
                nombre: "globo"
            },
            {
                emoji: "🌂",
                nombre: "sombrilla"
            },
            {
                emoji: "👒",
                nombre: "sombrero"
            }
        ];
        let frutasSeleccionadas = []; // Almacena las frutas ya seleccionadas
        let nivel = 0;
        let erroresRecolectados = [];
        let emojiCorrecto;
        let cuentaCorrecta = 0;
        let temporizador;
        let minutos = 0;
        let segundos = 0;
        let intentos = 3;
        let frutasRecolectadas = 0;
        let estrellas = 0;
        var contadorIncorrectas = 0;
        let noencotrado = 0;

        // Función para obtener una fruta aleatoria que no haya sido seleccionada previamente
        function seleccionarFrutaAleatoria() {
            const frutasRestantes = frutasDisponibles.filter(fruta => !frutasSeleccionadas.includes(fruta));
            const frutaAleatoria = frutasRestantes[Math.floor(Math.random() * frutasRestantes.length)];
            frutasSeleccionadas.push(frutaAleatoria);
            return frutaAleatoria;
        }

        function mostrarEmojis() {
            areaJuegoObjetos.innerHTML = '';
            mensaje.textContent = '';

            // Seleccionamos una fruta aleatoria que no haya sido seleccionada antes
            emojiCorrecto = seleccionarFrutaAleatoria();
            cuentaCorrecta = 0;

            // Instrucción con emoji y su nombre
            // objetivoEmojiElemento.innerHTML = `¡Encuentra todos los elementos de <span>${emojiCorrecto.nombre}</span> (${emojiCorrecto.emoji}) haciendo clic sobre ellos!`;
            objetivoEmojiElemento.innerHTML = `<img id="dinoIndicaciones" src="<?php echo base_url('almacenamiento/img/bosque_bambu/dino-indicaciones.png') ?>" alt="Img-Dino-Indicaciones" class="img-fluid me-3" style="cursor: pointer;" width="8%">
            ¡Encuentra todos los elementos de <span>${emojiCorrecto.nombre}</span> (${emojiCorrecto.emoji}) haciendo clic sobre ellos!`;

            const tamañoGrid = nivel + 2; // Aumenta el número de columnas por nivel
            const totalEmojis = tamañoGrid * 3; // Número fijo de filas (por ejemplo, 5 filas)
            areaJuegoObjetos.style.gridTemplateColumns = `repeat(${tamañoGrid}, 50px)`;

            const arrayEmojis = [];
            for (let i = 0; i < Math.floor(totalEmojis / 3); i++) {
                arrayEmojis.push(emojiCorrecto.emoji); // Solo el emoji
                cuentaCorrecta++;
            }

            while (arrayEmojis.length < totalEmojis) {
                const emojiAleatorio = obtenerEmojiAleatorio();
                if (emojiAleatorio !== emojiCorrecto.emoji) {
                    arrayEmojis.push(emojiAleatorio);
                }
            }

            arrayEmojis.sort(() => Math.random() - 0.5);

            arrayEmojis.forEach((emoji) => {
                const emojiElemento = document.createElement('div');
                emojiElemento.classList.add('emoji');
                emojiElemento.textContent = emoji; // Solo el emoji

                emojiElemento.addEventListener('click', () => {
                    comprobarRespuesta(emojiElemento);
                });

                areaJuegoObjetos.appendChild(emojiElemento);
            });
        }

        function obtenerEmojiAleatorio() {
            const emojis = ['🥾', '🧭', '⛵', '🧣', '🏳️', '💡', '👜', '🚲', '🧥', '🎈', '🌂', '👒'];
            return emojis[Math.floor(Math.random() * emojis.length)];
        }

        function comprobarRespuesta(emojiElemento) {
            const emojiSeleccionado = emojiElemento.textContent;
            if (emojiElemento.classList.contains('seleccionado')) {

                return;
            }

            // Marcar el emoji como seleccionado
            emojiElemento.classList.add('seleccionado');
            if (emojiSeleccionado === emojiCorrecto.emoji) {
                emojiElemento.classList.add('correcto');
                cuentaCorrecta--;
                frutasRecolectadas++;
                // recolectadosElemento.textContent = `${frutasRecolectadas}`;
                estrellas += 50;
                contadorEstrellas.textContent = estrellas;
                console.log('estrellas obtrenidas', contadorEstrellas);
                estrellaSalta();
                mostrarEstrellasCentrales();

                if (cuentaCorrecta === 0) {
                    mensaje.textContent = `¡Super asombroso 🎉! Has encontrado todos los elementos de ${emojiCorrecto.emoji} (${emojiCorrecto.nombre}). Recomepensa acumulada ${estrellas}`;
                    mensaje.className = "correcto";
                    mensaje.scrollIntoView({
                        behavior: "smooth",
                        block: "end"
                    });
                    deshabilitarSeleccionEmojis();
                    setTimeout(pasarNivel, 4000);

                }
                noencotrado = 77 - frutasRecolectadas;
                console.log('No encontrado', noencotrado);

            } else {
                console.log(intentos);
                emojiElemento.classList.add('incorrecto');
                intentos--;
                contadorIncorrectas++;
                intentosElemento.textContent = `${intentos}`;
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

                erroresRecolectados.push({
                    seleccionado: emojiSeleccionado,
                    correcto: emojiCorrecto.emoji
                });

                mensaje.textContent = `¡Sigue intentando!🌟. Has seleccionado un elemento incorrecto (${emojiSeleccionado}). El elemento que debes buscar es ${emojiCorrecto.emoji} (${emojiCorrecto.nombre}). Te quedan solo ${intentos} intentos`;
                mensaje.className = "incorrecto";
                mensaje.scrollIntoView({
                    behavior: "smooth",
                    block: "end"
                });
                console.log("Errores recolectados: ", JSON.stringify(erroresRecolectados));

                if (intentos <= 0) {
                    console.log('entre a intentos 0')
                    deshabilitarSeleccionEmojis();
                    document.getElementById("pasarNivelBtn").disabled = true;
                    document.getElementById("finalizarJuegoBtn").disabled = true;
                    // botonPasarNivel.disabled = true;
                    clearInterval(temporizador);
                    mensaje.textContent = `Juego terminado. ¡A seguir practicando, te has quedado sin intentos! 💪. Ganaste ${estrellas} estrellas, encontraste ${frutasRecolectadas} elementos y lo hiciste en un tiempo de  ${String(minutos).padStart(2, '0')}:${String(segundos).padStart(2, '0')}.`;
                    mensaje.className = "incorrecto";
                    mensaje.scrollIntoView({
                        behavior: "smooth",
                        block: "end"
                    });
                    enviarEvaluacionEncontrandoObjetosB();

                }
            }
        }

        function pasarNivel() {
            if (nivel < 10) { // 5 niveles en total (nivel 0 a 4)
                nivel++;
                mostrarEmojis();
                if (nivel === 8) {
                    document.getElementById("pasarNivelBtn").disabled = true;
                }


            } else {
                mensaje.textContent = `¡Felicidades, has encontrado todos los elementos! 🎉. Ganaste ${estrellas} estrellas, encontraste los ${frutasRecolectadas} elementos perdidos y lo hiciste en un tiempo de ${String(minutos).padStart(2, '0')}:${String(segundos).padStart(2, '0')}.`;
                mensaje.className = "correcto";
                mensaje.scrollIntoView({
                    behavior: "smooth",
                    block: "end"
                });
                clearInterval(temporizador);
                mostrarConfeti();
                deshabilitarSeleccionEmojis();
                //  document.getElementById("finalizarJuegoBtn").disabled = true;
                document.getElementById("finalizarJuegoBtn").disabled = true;
                document.getElementById("pasarNivelBtn").disabled = true;
                enviarEvaluacionEncontrandoObjetosB();

            }
        }

        function deshabilitarSeleccionEmojis() {
            const emojis = document.querySelectorAll('.emoji');
            emojis.forEach(emoji => {
                emoji.style.pointerEvents = 'none';
            });
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


        function reiniciarJuego() {
            estrellas = 0;
            contadorEstrellas.textContent = estrellas;
            clearInterval(temporizador);
            temporizadorElemento.textContent = "00:00";
            contadorIncorrectas = 0;
            nivel = 0;
            intentos = 3;
            minutos = 0;
            segundos = 0;
            frutasRecolectadas = 0;
            noencotrado = 0;
            frutasSeleccionadas = []; // Resetear frutas seleccionadas
            erroresRecolectados = [];
            intentosElemento.textContent = `${intentos}`;
            // recolectadosElemento.textContent = `Frutas recolectadas: ${frutasRecolectadas}`;
            // botonPasarNivel.disabled = false;
            // botonFinalizar.disabled = false;
            document.getElementById("pasarNivelBtn").disabled = false;
            document.getElementById("finalizarJuegoBtn").disabled = false;
            mostrarEmojis();
            iniciarTemporizador();
        }


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

        function finalizarJuego() {
            clearInterval(temporizador); // Detener el temporizador
            mensaje.textContent = `¡El juego ha sido finalizado con éxito! 🎉. Ganaste ${estrellas} estrellas, encontraste ${frutasRecolectadas} elementos y lo hiciste en un tiempo de ${String(minutos).padStart(2, '0')}:${String(segundos).padStart(2, '0')}.`; // Mostrar mensaje
            mensaje.className = "incorrecto";
            deshabilitarSeleccionEmojis(); // Deshabilitar la selección de emojis
            document.getElementById("pasarNivelBtn").disabled = true; // Deshabilitar el botón de pasar nivel
            document.getElementById("finalizarJuegoBtn").disabled = true; // Deshabilitar el botón de finalizar juego
            mensaje.scrollIntoView({
                behavior: "smooth",
                block: "end"
            });
            enviarEvaluacionEncontrandoObjetosB();
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
        function enviarEvaluacionEncontrandoObjetosB() {
            var tiempo = `${String(minutos).padStart(2, '0')}:${String(segundos).padStart(2, '0')}`;

            $.ajax({
                url: '<?php echo base_url('ejercicios/ejercicios_letra_b/enviarEvaluacionEncontrandoObjetosB'); ?>', // URfL de tu controlador
                type: 'POST',
                data: {
                    tiempoFinal: tiempo,
                    objetosCorrectos: frutasRecolectadas,
                    objetosIncorrectos: contadorIncorrectas,
                    totalEstrellas: estrellas,
                    objetosNoEncontrados: noencotrado,
                    arrayObjetosIncorrectos: JSON.stringify(erroresRecolectados)

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