<section class="mt-10">
    <div class="container-fluid d-flex justify-content-center" style="position: relative;">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-8 col-8 justify-content-center color-fondo texto_instrucciones_bambu" id="areaJuego">
                <div class="col-lg-12 col-md-12 col-12 mt-2">
                    <div class="d-flex align-items-center">
                        <img id="dinoIndicaciones1" src="<?php echo base_url('almacenamiento/img/bosque_bambu/dino-indicaciones.png') ?>" alt="Img-Dino-Indicaciones" class="img-fluid me-3 d-none d-sm-block" style="cursor: pointer;" width="6%">

                        <p class="mb-0">¡Escuchemos en la aventura! <br></p>
                    </div>
                    <p>
                        Prepárate para una emocionante misión: Recolecta los elementos que se necesitan para la exploración del bosque de bambú. Lee con atención las instrucciones que el Dino te indicará.
                        <br>
                        <b>Para cumplir con la misión debes seleccionar o dar clic en el elemento que se te pide.</b>
                    </p>

                    <audio id="audioVista1" src="<?php echo base_url('almacenamiento/audios/audios_b/b_dino_dice.mp3') ?>" preload="auto"></audio>

                    <!-- Modal del tutorial -->
                    <div id="tutorialModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background-color:rgba(0,0,0,0.)8; justify-content:center; align-items:center; z-index:1000;">
                        <div style="position:relative; background:#fff; padding:10px; border-radius:10px; max-width:90%; width:600px;">
                            <video id="tutorialVideo" width="100%" controls>
                                <source src="<?php echo base_url('almacenamiento/img/bosque_bambu/tutorial_b/b_tutorial_dino_dice_b.mp4'); ?>" type="video/mp4">
                                Tu navegador no soporta el video.
                            </video>
                            <!-- <button id="cerrarTutorial" >Cerrar</button> -->
                            <button id="cerrarTutorial" type="button" class="btn btn-danger" style="position:absolute; top:10px; right:10px;">Cerrar</button>
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
                <!-- <div class="indicaciones" id="instruccion"></div> -->
                <audio id="audioVista2" src="<?php echo base_url('almacenamiento/audios/audios_b/b_dino_dice_tractor.mp3') ?>" preload="auto"></audio>

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
                <div class="contenedor-figuras mt-8" id="contenedorFiguras"></div>

                <canvas id="confettiCanvas"></canvas>
                <audio id="audioEstrellas" src="<?php echo base_url('almacenamiento/audios/efecto_sonido_estrella.mp3') ?>" preload="auto"></audio>
                <audio id="audioIncorrecto" src="<?php echo base_url('almacenamiento/audios/incorrecto.mp3') ?>" preload="auto"></audio>
                <audio id="audioTractor" src="<?php echo base_url('almacenamiento/audios/efecto_sonido_estrella.mp3') ?>" preload="auto"></audio>


                <div class="d-flex justify-content-center mt-8">
                    <button id="omitirBtn" class="btn saltar me-2" title="Saltar elemento">
                        <i class="fas fa-arrow-right"></i> Saltar elemento
                    </button>
                    <button id="reiniciarBtn" class="btn reiniciar me-2" title="Reiniciar Juego">
                        <i class="fas fa-redo"></i> Reiniciar Misión
                    </button>

                    <button id="finalizarBtn" class="btn finalizar me-2" title="Finalizar Juego">
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

        // audio1.play().catch(error => {
        //     console.log("Error al reproducir audioVista1:", error);
        // });

        if (!sessionStorage.getItem('audio1Reproducido_dinodiceB')) {
            audio1.play().then(() => {
                sessionStorage.setItem('audio1Reproducido_dinodiceB', 'true');
            }).catch(error => {
                console.log("Error al reproducir audioVista1:", error);
            });
        }
        audioIndicacionesUno();

        playBtn.addEventListener('click', function() {

            playBtn.style.display = 'none';
            audio1.pause();
            audio1.currentTime = 0;

            // Mostrar el modal del tutorial
            const modal = document.getElementById('tutorialModal');
            const video = document.getElementById('tutorialVideo');
            modal.style.display = 'flex';
            video.currentTime = 0;
            video.play();

            // Cuando el usuario cierra el modal
            document.getElementById('cerrarTutorial').addEventListener('click', function() {
                modal.style.display = 'none';
                video.pause();
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
                enviarInicioEvaluacionDinoDiceB();
                startAnimation();

            });

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
                        generarFiguras();
                        nuevaInstruccion();
                        iniciarTemporizador();
                    }, 500);
                }
            }, 50);
        }



        const emojis = ['🚲', '⛵', '👜', '🧭', '🥾', '🎋', '🧣', '🏳️', '💡', '🏀', '🗑️'];
        const nombresEmojis = {
            '🚲': 'bicicleta',
            '⛵': 'barco',
            '👜': 'bolsa',
            '🧭': 'brújula',
            '🥾': 'bota',
            '🎋': 'bambú',
            '🧣': 'bufanda',
            '🏳️': 'bandera',
            '💡': 'bombilla',
            '🏀': 'balón',
            '🗑️': 'bote'
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
                enviarEvaluacionDinoDiceB();

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
                estrellaSalta();
                mostrarEstrellasCentrales();
                contadorCorrectos++;
                // document.getElementById("contadorCorrectos").textContent = contadorCorrectos;
                divFiguraSeleccionada.classList.add("correcto");
                estrellas += 100;
                contadorEstrellas.textContent = estrellas;


                mensaje.textContent = `¡Super asombroso <?php echo $this->session->userdata('usuario'); ?>! 🎉 ¡Has seleccionado el elemento correcto (${emojiSeleccionado})! ¡Ganaste +100 estrellas! 🌟`;
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
                    }, 3000);
                }

            } else {
                objetosIncorrectos.push({
                    seleccionado: emojis[emojiSeleccionado] || emojiSeleccionado, // Si no se encuentra el emoji, se guarda el emoji mismo
                    correcto: emojis[instruccionActual.emoji] || instruccionActual.emoji // Lo mismo para el correcto
                });
                console.log('elemento no: ' + JSON.stringify(objetosIncorrectos));

                intentos--;
                contadorIncorrectas++;
                movimientosSalta();
                if (contadorIncorrectas === 1) {
                    mostrarLapizRoto(1);
                    mensaje.innerHTML = `¡Sigue intentando <?php echo $this->session->userdata('usuario'); ?>!🌟 Seleccionaste ${emojiSeleccionado}, pero el elemento que debes seleccionar es ${instruccionActual.emoji}. <br>
                    ¡Solo te quedan  ${intentos} intentos, tú puedes! 💪`;
                }
                if (contadorIncorrectas === 2) {
                    mostrarLapizRoto(2);
                    mensaje.innerHTML = `¡Sigue intentando <?php echo $this->session->userdata('usuario'); ?>!🌟 Seleccionaste ${emojiSeleccionado}, pero el elemento que debes seleccionar es ${instruccionActual.emoji}. <br>
                    ¡Solo te quedan  ${intentos} intento, tú puedes! 💪`;
                }
                if (contadorIncorrectas === 3) {
                    mostrarLapizRoto(3);
                    mensaje.innerHTML = `¡Casi lo logras <?php echo $this->session->userdata('usuario'); ?>!🌟 Te quedaste sin intentos, ¡pero diste lo mejor! 💪`;
                }

                // mensaje.textContent = `¡Sigue intentando!🌟. Has seleccionado un elemento incorrecto (${emojiSeleccionado}). El elemento que debes buscar es (${instruccionActual.emoji}). Te quedan solo ${intentos} intentos`;
                mensaje.className = "incorrecto";
                mensaje.scrollIntoView({
                    behavior: "smooth",
                    block: "end"
                });

                document.getElementById("intentos").textContent = intentos;
                divFiguraSeleccionada.classList.add("incorrecto");

                if (intentos === 0) {
                    setTimeout(function() {
                        mostrarMensajeExitoIntentos();
                    }, 1500);
                    // mensaje.textContent = `Juego terminado. ¡A seguir practicando, te has quedado sin intentos! 💪. Ganaste ${estrellas} estrellas, recolectaste ${contadorCorrectos} elementos y lo hiciste en un tiempo de ${String(minutos).padStart(2, '0')}:${String(segundos).padStart(2, '0')}.`;
                    mensaje.className = "incorrecto";
                    mensaje.scrollIntoView({
                        behavior: "smooth",
                        block: "end"
                    });
                    desactivarEmoji();
                    clearInterval(temporizador); // Detener el cronómetro
                    document.getElementById("omitirBtn").disabled = true;
                    document.getElementById("reiniciarBtn").disabled = true; // Habilitar el botón de reiniciar
                    document.getElementById("finalizarBtn").disabled = true;
                    enviarEvaluacionDinoDiceB();
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
                texto: `<div class="d-flex align-items-center"> <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/dino-indicaciones.png') ?>"alt="Dino" style="width: 50px; height: auto; margin-right: 10px;"> ¡Haz clic en el elemento que se te indica! <span style="background-color: yellow; color: black; padding: 2px 4px; border-radius: 4px;"> ${nombreEmoji}</span></div>
`
            };

            // Usar innerHTML para mostrar imagen + texto
            document.getElementById("instruccion").innerHTML = instruccionActual.texto;

        }

        function mostrarMensajeExitoIntentos() {
            // Crear el mensaje de éxito
            const mensaje = document.createElement('div');
            mensaje.textContent = `Recomepensa acumulada ${estrellas}`;
            mensaje.innerHTML = `<b>¡Tu misión ha terminado! 🦖</b> <br> 
            ¡Muy cerca, <?php echo $this->session->userdata('usuario'); ?>, usaste tus 3 intentos! ✏️ <br>
            Puedes seguir mejorando en tu próxima exploración 💪<br>
            🌟 Estrellas obtenidas: <strong>${estrellas}</strong><br> 
            🔍 Elementos encontrados: <strong>${contadorCorrectos}</strong><br>
            ⏰ Tiempo <strong>${String(minutos).padStart(2, '0')}:${String(segundos).padStart(2, '0')}</strong>.  <br>
            Cada exploración te llevará a buen resultado. ¡Sigue explorando! 🔍 <br>
            ¿Quieres seguir explorando esta misión o ir al menú principal?`;
            mensaje.style.color = '#214524';
            mensaje.style.fontFamily = '"Century Gothic", sans-serif';
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
            🌟 Estrellas obtenidas: <strong>${estrellas}</strong><br> 
            🔍 Elementos encontrados: <strong>${contadorCorrectos}</strong><br>
            ⏰ Tiempo <strong>${String(minutos).padStart(2, '0')}:${String(segundos).padStart(2, '0')}</strong> <br>
            Cada exploración te llevará a buen resultado. ¡Sigue explorando! 🔍 <br>
            ¿Quieres seguir explorando esta misión o ir al menú principal?`;
            mensaje.style.color = '#214524';
            mensaje.style.fontFamily = '"Century Gothic", sans-serif';
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
            En esta misión encontrates muchos <b>elementos</b>. <br>
            ¡Sigue así, lo estas haciendo genial!🎁¡Toma tu recompensa! <br>
            🌟 Estrellas ganadas: <strong>${estrellas}</strong> <br> 
            🔍 Elementos encontrados: <strong>${contadorCorrectos}</strong> <br>
            ⏰ Tiempo <strong>${String(minutos).padStart(2, '0')}:${String(segundos).padStart(2, '0')}</strong><br>
            Cada exploración te llevará a buen resultado. ¡Sigue explorando! 🔍<br>
            ¿Quieres seguir explorando esta misión o ir al menú principal?`;
            mensaje.style.color = '#214524';
            mensaje.style.fontFamily = '"Century Gothic", sans-serif';
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

        function desactivarEmoji() {
            const figuras = document.querySelectorAll(".figura");
            figuras.forEach(figura => {
                figura.style.pointerEvents = "none"; // Deshabilita interactividad
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
            console.log("muestra estrellas");
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

        function mostrarMensajeFinal() {
            // mostrarMensajeExitoFelicidades();
            // mensaje.textContent = `¡Felicidades, has seguido todas las instrucciones del Dino a la perfección! 🎉. Ganaste ${estrellas} estrellas, recolectaste los ${contadorCorrectos} elementos indicados y lo hiciste en un tiempo de ${String(minutos).padStart(2, '0')}:${String(segundos).padStart(2, '0')}.`;
            // mensaje.className = "correcto";
            setTimeout(() => {
                mostrarConfeti();

                mostrarMensajeExitoFelicidades();

            }, 1500);
            mensaje.scrollIntoView({
                behavior: "smooth",
                block: "end"
            });
            mostrarEstrellasCentrales();
            desactivarEmoji();
            document.getElementById("reiniciarBtn").disabled = true;
            document.getElementById("omitirBtn").disabled = true;
            document.getElementById("finalizarBtn").disabled = true;

            clearInterval(temporizador);
            enviarEvaluacionDinoDiceB();
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
            mostrarMensajeExitoFinalizar();
            desactivarEmoji();

            document.getElementById("reiniciarBtn").disabled = true; // Habilitar el botón de reiniciar
            document.getElementById("omitirBtn").disabled = true;
            document.getElementById("finalizarBtn").disabled = true;
            enviarEvaluacionDinoDiceB();

        }

        // Función para enviar el tiempo final por AJAX, datos a enviar al controlador (backend)
        function enviarEvaluacionDinoDiceB() {
            var tiempo = `${String(minutos).padStart(2, '0')}:${String(segundos).padStart(2, '0')}`;
            $.ajax({
                url: '<?php echo base_url('letras/bosque_bambu/enviarEvaluacionDinoDiceB'); ?>', // URfL de tu controlador
                type: 'POST',
                data: {
                    letra: 'b',
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

        function enviarInicioEvaluacionDinoDiceB() {
            var tiempo = `${String(minutos).padStart(2, '0')}:${String(segundos).padStart(2, '0')}`;
            $.ajax({
                url: '<?php echo base_url('letras/bosque_bambu/guardarRegistroEvaluacionDinoDiceB'); ?>', // URfL de tu controlador
                type: 'POST',
                data: {
                    letra: 'b',
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