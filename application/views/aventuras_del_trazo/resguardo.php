<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dino dice - b</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap-css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/mystyle_bosque_bambu.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/mystyle_general.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/estilos_juegos/mystyle_dino_dice_b.css') ?>">
    <link rel="shortcut icon" href="<?php echo base_url('almacenamiento/img/dinografia/dinografia-dino-lapiz.png') ?>" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="body-explorando-letrab">
    <section id="header-inicial">
        <nav class="navbar navbar-color navbar-expand-lg navbar-light fixed-top">
            <div class="container-fluid">
                <div class="col-lg-3 col-md-3 justify-aling-center tipografia">
                    <a href="<?php echo site_url('letras/bosque_bambu/explora_y_descubre_b') ?>" class="btn boton-regresar-bambu float-start"> <i class="fas fa-arrow-left"></i></a>
                </div>
                <div class="col-lg-6 col-md-6 justify-aling-center text-center d-none d-md-block">
                    <h1 class="titulo-h1-bambu">DINO DICE - B</h1>
                </div>
                <div class="col-lg-6 col-md-6 justify-aling-center text-center d-block d-md-none">
                    <h1 class="titulo-h1-bambu-movil">DINO DICE - B</h1>
                </div>
                <div class="col-lg-3 col-md-3 justify-aling-center tipografia">
                    <a href="<?php echo site_url('login/cerrar_sesion') ?>" id="cerrarSesion" class="btn boton-cerrar-sesion float-end">Cerrar sesión</a>
                </div>

            </div>
        </nav>

    </section>
    <section id="header-juego" class="d-none">
        <nav class="navbar navbar-color navbar-expand-lg navbar-light fixed-top">
            <div class="container-fluid">
                <div class="col-lg-3 col-md-3 justify-aling-center tipografia">
                    <a href="<?php echo site_url('letras/bosque_bambu/dino_dice_b') ?>" class="btn boton-regresar-bambu float-start"> <i class="fas fa-arrow-left"></i></a>
                </div>
                <div class="col-lg-6 col-md-6 justify-aling-center text-center texto_indicaciones_bambu" id="instruccion">
                    <img id="dinoIndicaciones" src="<?php echo base_url('almacenamiento/img/bosque_bambu/dino-indicaciones.png') ?>" alt="Img-Dino-Indicaciones" class="img-fluid me-3" style="cursor: pointer;" width="8%">
                </div>
                <div class="col-lg-3 col-md-3 d-flex justify-items-center texto_indicaciones_bambu">
                    <div class="col-lg-4 col-md-4 d-flex align-items-center">
                        <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/reloj.png') ?>" alt="" class="img-fluid" width="40%">
                        <span id="temporizador">00:00</span>
                    </div>
                    <div class="col-lg-4 col-md-4 d-flex align-items-center">
                        <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/movimientos.png') ?>" alt="" class="img-fluid ms-4" width="40%">
                        <span id="intentos">3</span>
                    </div>
                    <div class="col-lg-4 col-md-4 d-flex align-items-center">
                        <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/estrella.png') ?>" alt="" class="img-fluid ms-1" width="40%">
                        <span id="contadorEstrellas">0</span>
                    </div>

                </div>

            </div>
        </nav>
    </section>



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
                <div class="contenedor-figuras mt-8" id="contenedorFiguras"></div>

                <canvas id="confettiCanvas"></canvas>
                <audio id="audioEstrellas" src="<?php echo base_url('almacenamiento/audios/efecto_sonido_estrella.mp3') ?>" preload="auto"></audio>
                <audio id="audioIncorrecto" src="<?php echo base_url('almacenamiento/audios/incorrecto.mp3') ?>" preload="auto"></audio>
                <audio id="audioTractor" src="<?php echo base_url('almacenamiento/audios/efecto_sonido_estrella.mp3') ?>" preload="auto"></audio>


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
                    mensaje.innerHTML = `¡Casi lo logras <?php echo $this->session->userdata('usuario'); ?>!🌟 
                Las letras en rojo no van ahí. Dales doble clic y corrígelas ✅ <br>
                ¡Solo te quedan  ${intentos} intentos, tú puedes! 💪`;
                }
                if (contadorIncorrectas === 2) {
                    mostrarLapizRoto(2);
                    mensaje.innerHTML = `¡Casi lo logras <?php echo $this->session->userdata('usuario'); ?>!🌟 
                Las letras en rojo no van ahí. Dales doble clic y corrígelas ✅ <br>
                ¡Solo te queda  ${intentos} intento, tú puedes! 💪`;
                }
                if (contadorIncorrectas === 3) {
                    mostrarLapizRoto(3);
                    mensaje.innerHTML = `¡Casi lo logras <?php echo $this->session->userdata('usuario'); ?>!🌟 
                 Te quedaste sin intentos, ¡pero diste lo mejor! 💪`;
                }

                mensaje.textContent = `¡Sigue intentando!🌟. Has seleccionado un elemento incorrecto (${emojiSeleccionado}). El elemento que debes buscar es (${instruccionActual.emoji}). Te quedan solo ${intentos} intentos`;
                mensaje.className = "incorrecto";
                mensaje.scrollIntoView({
                    behavior: "smooth",
                    block: "end"
                });

                document.getElementById("intentos").textContent = intentos;
                divFiguraSeleccionada.classList.add("incorrecto");


                if (intentos === 0) {
                    mostrarMensajeExitoIntentos();
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
                texto: `<div class="d-flex align-items-center"> <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/dino-indicaciones.png') ?>"alt="Dino" style="width: 50px; height: auto; margin-right: 10px;"> El dino dice: ¡Haz clic en el elemento <span style="background-color: yellow; color: black; padding: 2px 4px; border-radius: 4px;">${nombreEmoji}</span> !</div>
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
            ⭐ Estrellas obtenidas: <strong>${estrellas}</strong><br> 
            📝 Palabras encontradas <strong>${contadorCorrectos}</strong><br>
            ⏰ Tiempo <strong>${String(minutos).padStart(2, '0')}:${String(segundos).padStart(2, '0')}</strong>.  <br>
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
            📝 Palabras encontradas <strong>${contadorCorrectos}</strong><br>
            ⏰ Tiempo <strong>${String(minutos).padStart(2, '0')}:${String(segundos).padStart(2, '0')}</strong> <br>
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
            📝 Palabras encontradas <strong>${contadorCorrectos}</strong> <br>
            ⏰ Tiempo <strong>${String(minutos).padStart(2, '0')}:${String(segundos).padStart(2, '0')}</strong><br>
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
            mostrarMensajeExitoFelicidades();
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
            enviarEvaluacionDinoDiceB();

        }



        // Función para enviar el tiempo final por AJAX, datos a enviar al controlador (backend)
        function enviarEvaluacionDinoDiceB() {
            var tiempo = `${String(minutos).padStart(2, '0')}:${String(segundos).padStart(2, '0')}`;
            $.ajax({
                url: '<?php echo base_url('ejercicios/ejercicios_letra_b/enviarEvaluacionDinoDiceB'); ?>', // URfL de tu controlador
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


///////////////


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elementos perdidos - b</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap-css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/mystyle_bosque_bambu.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/mystyle_general.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/estilos_juegos/mystyle_elementos_perdidos_b.css') ?>">
    <link rel="shortcut icon" href="<?php echo base_url('almacenamiento/img/dinografia/dinografia-dino-lapiz.png') ?>" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>



<body class="body-explorando-letrab">
    <section id="header-inicial">
        <nav class="navbar navbar-color navbar-expand-lg navbar-light fixed-top">
            <div class="container-fluid">
                <div class="col-lg-3 col-md-3 justify-aling-center tipografia">
                    <a href="<?php echo site_url('letras/bosque_bambu/explora_y_descubre_b') ?>" class="btn boton-regresar-bambu float-start"> <i class="fas fa-arrow-left"></i></a>
                </div>
                <div class="col-lg-6 col-md-6 justify-aling-center text-center d-none d-md-block">
                    <h1 class="titulo-h1-bambu">DINO DICE - B</h1>
                </div>
                <div class="col-lg-6 col-md-6 justify-aling-center text-center d-block d-md-none">
                    <h1 class="titulo-h1-bambu-movil">DINO DICE - B</h1>
                </div>
                <div class="col-lg-3 col-md-3 justify-aling-center tipografia">
                    <a href="<?php echo site_url('login/cerrar_sesion') ?>" id="cerrarSesion" class="btn boton-cerrar-sesion float-end">Cerrar sesión</a>
                </div>

            </div>
        </nav>

    </section>
    <section id="header-juego" class="d-none">
        <nav class="navbar navbar-color navbar-expand-lg navbar-light fixed-top">
            <div class="container-fluid">
                <div class="col-lg-3 col-md-3 justify-aling-center tipografia">
                    <a href="<?php echo site_url('letras/bosque_bambu/dino_dice_b') ?>" class="btn boton-regresar-bambu float-start"> <i class="fas fa-arrow-left"></i></a>
                </div>

                <div class="col-lg-6 col-md-6 justify-aling-center text-center texto_indicaciones_bambu" id="objetivoEmoji">
                    <img id="dinoIndicaciones" src="<?php echo base_url('almacenamiento/img/bosque_bambu/dino-indicaciones.png') ?>" alt="Img-Dino-Indicaciones" class="img-fluid me-3" style="cursor: pointer;" width="8%">
                </div>
                <div class="col-lg-3 col-md-3 d-flex justify-items-center texto_indicaciones_bambu">
                    <div class="col-lg-4 col-md-4 d-flex align-items-center">
                        <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/reloj.png') ?>" alt="" class="img-fluid" width="40%">
                        <span id="temporizador">00:00</span>
                    </div>
                    <div class="col-lg-4 col-md-4 d-flex align-items-center">
                        <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/movimientos.png') ?>" alt="" class="img-fluid ms-4" width="40%">
                        <span id="intentos">3</span>
                    </div>
                    <div class="col-lg-4 col-md-4 d-flex align-items-center">
                        <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/estrella.png') ?>" alt="" class="img-fluid ms-1" width="40%">
                        <span id="contadorEstrellas">0</span>
                    </div>

                </div>

            </div>
        </nav>
    </section>


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

                emojiElemento.classList.add('incorrecto');
                intentos--;
                intentosElemento.textContent = `${intentos}`;
                contadorIncorrectas++;
                erroresRecolectados.push({
                    seleccionado: emojiSeleccionado,
                    correcto: emojiCorrecto.emoji
                });
                movimientosSalta();
                if (contadorIncorrectas === 1) {
                    mostrarLapizRoto(1);
                    mensaje.innerHTML = `¡Casi lo logras <?php echo $this->session->userdata('usuario'); ?>!🌟 
                Las letras en rojo no van ahí. Dales doble clic y corrígelas ✅ <br>
                ¡Solo te quedan  ${intentos} intentos, tú puedes! 💪`;
                }
                if (contadorIncorrectas === 2) {
                    mostrarLapizRoto(2);
                    mensaje.innerHTML = `¡Casi lo logras <?php echo $this->session->userdata('usuario'); ?>!🌟 
                Las letras en rojo no van ahí. Dales doble clic y corrígelas ✅ <br>
                ¡Solo te queda  ${intentos} intento, tú puedes! 💪`;
                }
                if (contadorIncorrectas === 3) {
                    mostrarLapizRoto(3);
                    mensaje.innerHTML = `¡Casi lo logras <?php echo $this->session->userdata('usuario'); ?>!🌟 
                 Te quedaste sin intentos, ¡pero diste lo mejor! 💪`;
                }

                // mensaje.textContent = `¡Sigue intentando!🌟. Has seleccionado un elemento incorrecto (${emojiSeleccionado}). El elemento que debes buscar es ${emojiCorrecto.emoji} (${emojiCorrecto.nombre}). Te quedan solo ${intentos} intentos`;
                mensaje.className = "incorrecto";
                mensaje.scrollIntoView({
                    behavior: "smooth",
                    block: "end"
                });
                console.log("Errores recolectados: ", JSON.stringify(erroresRecolectados));

                if (intentos <= 0) {
                    console.log('entre a intentos 0');
                    mostrarMensajeExitoIntentos();
                    // botonPasarNivel.disabled = true;
                    clearInterval(temporizador);
                    // mensaje.textContent = `Juego terminado. ¡A seguir practicando, te has quedado sin intentos! 💪. Ganaste ${estrellas} estrellas, encontraste ${frutasRecolectadas} elementos y lo hiciste en un tiempo de  ${String(minutos).padStart(2, '0')}:${String(segundos).padStart(2, '0')}.`;
                    mensaje.className = "incorrecto";
                    mensaje.scrollIntoView({
                        behavior: "smooth",
                        block: "end"
                    });
                    deshabilitarSeleccionEmojis();
                    document.getElementById("pasarNivelBtn").disabled = true;
                    document.getElementById("finalizarJuegoBtn").disabled = true;
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
                mostrarMensajeExitoFelicidades();

                enviarEvaluacionEncontrandoObjetosB();

            }
        }

        function mostrarMensajeExitoIntentos() {
            // Crear el mensaje de éxito
            const mensaje = document.createElement('div');
            console.log("entra mensaje de intentos");
            mensaje.textContent = `Recomepensa acumulada ${estrellas}`;
            mensaje.innerHTML = `<b>¡Tu misión ha terminado! 🦖</b> <br> 
            ¡Muy cerca, <?php echo $this->session->userdata('usuario'); ?>, usaste tus 3 intentos! ✏️ <br>
            Puedes seguir mejorando en tu próxima exploración 💪<br>
            ⭐ Estrellas obtenidas: <strong>${estrellas}</strong><br> 
            📝 Palabras encontradas <strong>${frutasRecolectadas}</strong><br>
            ⏰ Tiempo <strong>${String(minutos).padStart(2, '0')}:${String(segundos).padStart(2, '0')}</strong>.  <br>
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
            📝 Palabras encontradas <strong>${frutasRecolectadas}</strong><br>
            ⏰ Tiempo <strong>${String(minutos).padStart(2, '0')}:${String(segundos).padStart(2, '0')}</strong> <br>  
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
            ⭐ Estrellas obtenidas: <strong>${estrellas}</strong><br> 
            📝 Palabras encontradas <strong>${frutasRecolectadas}</strong><br>
            ⏰ Tiempo <strong>${String(minutos).padStart(2, '0')}:${String(segundos).padStart(2, '0')}</strong> <br>  
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
            mostrarMensajeExitoFinalizar();
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

////////


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descubriendo palabras</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap-css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/mystyle_bosque_bambu.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/mystyle_general.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/estilos_juegos/mystyle_descubriendo_palabras.css') ?>">
    <link rel="shortcut icon" href="<?php echo base_url('almacenamiento/img/dinografia/dinografia-dino-lapiz.png') ?>" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="body-explorando-letrab">
    <section id="header-inicial">
        <nav class="navbar navbar-color navbar-expand-lg navbar-light fixed-top">
            <div class="container-fluid">

                <a href="<?php echo site_url('letras/bosque_bambu/explora_y_descubre_b') ?>" class="btn boton-regresar-bambu float-start"> <i class="fas fa-arrow-left"></i></a>

                <div class="col-lg-12 col-md-12 justify-content-center">
                    <h1 class="titulo-h1-bambu me-5">DESCUBRIENDO PALABRAS</h1>
                </div>
                <!-- <div class="col-lg-3 col-md-3 d-flex justify-items-center ">
                    <div class="col-lg-4 col-md-4 d-flex align-items-center">
                        <img src="<?php echo base_url('almacenamiento/img/dinografia/reloj.png') ?>" alt="" class="img-fluid" width="40%">
                        <span class="text-azul" id="timer">00:00</span>
                    </div>
                    <div class="col-lg-4 col-md-4 d-flex align-items-center">
                        <img src="<?php echo base_url('almacenamiento/img/dinografia/movimientos.png') ?>" alt="" class="img-fluid ms-4" width="40%">
                        <span class="text-azul" id="contadorVidas">3</span>
                    </div>
                    <div class="col-lg-4 col-md-4 d-flex align-items-center">
                        <img src="<?php echo base_url('almacenamiento/img/dinografia/estrella.png') ?>" alt="" class="img-fluid ms-1" width="40%">
                        <span class="text-azul" id="contadorEstrellas">0</span>
                    </div>

                </div> -->

            </div>
        </nav>
    </section>

    <section id="header-juego" class="d-none">
        <nav class="navbar navbar-color navbar-expand-lg navbar-light fixed-top">
            <div class="container-fluid">
                <div class="col-lg-2 col-md-2 justify-aling-center tipografia">
                    <a href="<?php echo site_url('letras/bosque_bambu/descubriendo_palabras_b') ?>" class="btn boton-regresar-bambu float-start"> <i class="fas fa-arrow-left"></i></a>
                </div>
                <div class="col-lg-6 col-md-6 justify-aling-center text-center texto_indicaciones_bambu">
                    <img id="dinoIndicaciones" src="<?php echo base_url('almacenamiento/img/bosque_bambu/dino-indicaciones.png') ?>" alt="Img-Dino-Indicaciones" class="img-fluid me-3" style="cursor: pointer;" width="8%">¡Vamos a descubrir la palabra oculta! 🔍 <br>Haz clic en el botón verde ✅ para verificar tu respuesta.
                </div>
                <div class="col-lg-3 col-md-3 d-flex justify-items-center texto_indicaciones_bambu">
                    <div class="col-lg-4 col-md-4 d-flex align-items-center">
                        <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/reloj.png') ?>" alt="" class="img-fluid" width="40%">
                        <span class="text-azul" id="timer">00:00</span>
                    </div>
                    <div class="col-lg-4 col-md-4 d-flex align-items-center">
                        <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/movimientos.png') ?>" alt="" class="img-fluid ms-4" width="40%">
                        <span class="text-azul" id="contadorVidas">3</span>
                    </div>
                    <div class="col-lg-4 col-md-4 d-flex align-items-center">
                        <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/estrella.png') ?>" alt="" class="img-fluid ms-1" width="40%">
                        <span class="text-azul" id="contadorEstrellas">0</span>
                    </div>

                </div>

            </div>
        </nav>
    </section>


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

                    <audio id="audioVista1" src="<?php echo base_url('almacenamiento/audios/audio_traza_letrab_indicaciones.mp3') ?>" preload="auto"></audio>
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
                        Haz clic en el botón de Iniciar para comenzar a jugar.</p>
                    <div class="col-lg-12 col-md-12 col-12 text-center animated-button">
                        <a id="play-btn">
                            <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/btn-iniciar.png') ?>" alt="" class="img-fluid" width="20%">
                        </a>
                    </div>

                </div>

            </div>
            <div class="col-lg-12 col-md-12 col-12 text-center" id="contenedorJuego">
                <audio id="audioVista2" src="<?php echo base_url('almacenamiento/audios/audio_gd_j.mp3') ?>" preload="auto"></audio>

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

                <div id="emojiPalabra" class="emoji mt-05"></div>
                <div id="contenedorLetras"></div>
                <div id="contenedorPalabra"></div>
                <div id="botonesContenedor" class="d-flex justify-content-center mt-4 d-none">

                    <button id="verificarPalabraBtn" class="btn verificar me-2" title="Verificar Palbra">
                        <i class="fas fa-check"></i>
                    </button>

                    <button id="saltarPalabraBtn" class="btn saltar me-2" title="Saltar Palabra">
                        <i class="fas fa-arrow-right"></i>
                    </button>

                    <button id="reiniciarJuegoBtn" class="btn reiniciar me-2" title="Reiniciar Juego">
                        <i class="fas fa-redo"></i>
                    </button>

                    <button id="finalizarJuegoBtn" class="btn finalizar me-2" title="Finalizar Juego">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <p id="mensaje"></p>

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
            audioTractorAnimacion();
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
                palabra: "bambú",
                emoji: "<?php echo base_url('almacenamiento/img/bosque_bambu/bambu_img.png'); ?>"
            },
            {
                palabra: "bosque",
                emoji: "<?php echo base_url('almacenamiento/img/bosque_bambu/bosque.png'); ?>"

            },
            {
                palabra: "botella",
                emoji: "<?php echo base_url('almacenamiento/img/bosque_bambu/botella.png'); ?>"
            },
            {
                palabra: "brújula",
                emoji: "<?php echo base_url('almacenamiento/img/bosque_bambu/brujula.png'); ?>"
            },
            {
                palabra: "binoculares",
                emoji: "<?php echo base_url('almacenamiento/img/bosque_bambu/binoculares.png'); ?>"
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
        var palabraIncorrecta = '';
        var nuevapalabrasIncorrectas = [];

        const contenedorLetras = document.getElementById("contenedorLetras");
        const contenedorPalabra = document.getElementById("contenedorPalabra");
        const mensaje = document.getElementById("mensaje");
        const emojiPalabra = document.getElementById("emojiPalabra");
        const timerElement = document.getElementById('timer');
        const contadorVidas = document.getElementById("contadorVidas");
        const contadorEstrellas = document.getElementById("contadorEstrellas");


        let elementoArrastrado = null;
        let timer;
        let minutes = 0;
        let seconds = 0;
        let vidas = 3;
        let estrellas = 0;
        // Añadir soporte táctil para arrastrar y soltar
        let touchElementoArrastrado = null;

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

            contenedorLetras.innerHTML = "";
            contenedorPalabra.innerHTML = "";
            mensaje.textContent = "";
            mensaje.className = "";
            mensaje.textContent2 = "";

            const indice = Math.floor(Math.random() * palabrasRestantes.length);
            palabraActual = palabrasRestantes.splice(indice, 1)[0];

            // emojiPalabra.textContent = palabraActual.emoji;
            emojiPalabra.innerHTML = `<img src="${palabraActual.emoji}" alt="emoji" style="width: 150px; height: auto;">`;

            const letras = mezclar(palabraActual.palabra.split(""));
            letras.forEach(letra => {
                const casillaLetra = document.createElement("div");
                casillaLetra.textContent = letra;
                casillaLetra.classList.add("casilla-letra");
                casillaLetra.draggable = true;
                casillaLetra.addEventListener("dragstart", iniciarArrastre);
                contenedorLetras.appendChild(casillaLetra);


            });

            for (let i = 0; i < palabraActual.palabra.length; i++) {
                const casillaPalabra = document.createElement("div");
                casillaPalabra.classList.add("casilla-palabra");
                casillaPalabra.setAttribute("data-indice", i);
                casillaPalabra.addEventListener("dblclick", limpiarCasilla);
                contenedorPalabra.appendChild(casillaPalabra);
            }


        }
        // Iniciar el arrastre táctil
        contenedorLetras.addEventListener("touchstart", (evento) => {
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

        contenedorPalabra.ondragover = (evento) => evento.preventDefault();

        contenedorPalabra.ondrop = (evento) => {
            evento.preventDefault();
            const objetivo = evento.target;

            if (objetivo.classList.contains("casilla-palabra") && !objetivo.textContent) {
                objetivo.textContent = elementoArrastrado.textContent;
                const indice = objetivo.dataset.indice;
                const correcto = elementoArrastrado.textContent === palabraActual.palabra[indice];
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

            const letraCorrespondiente = Array.from(contenedorLetras.children).find(
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

            // Verificar si las letras coinciden
            Array.from(contenedorPalabra.children).forEach((casilla, i) => {
                palabraIncorrecta = palabraIncorrecta + casilla.textContent;
                if (casilla.textContent !== palabraActual.palabra[i]) {
                    casilla.classList.add("error");
                    errores = true;
                } else {
                    casilla.classList.remove("error");
                }
            });

            // Manejar el caso cuando no hay errores
            if (!errores) {
                mensaje.textContent = "¡Super asombroso, <?php echo $this->session->userdata('usuario'); ?>, palabra descubierta! 🎉 Ganaste +200 estrellas";
                mensaje.className = "correcto";
                estrellas += 200;

                contadorEstrellas.textContent = estrellas;
                contadorBuenas++;
                nuevapalabrasCorrectas = palabrasCorrectas.push(palabraActual.palabra);
                console.log('Buenas', contadorBuenas);
                console.log('Palabra correcta:', palabraActual.palabra);
                console.log('Array de Palabra correcta:', nuevapalabrasCorrectas);
                for (i = 0; i < palabrasCorrectas.length; i++) {
                    console.log(`${i}: ${palabrasCorrectas[i]}`);
                    estrellaSalta();
                    mostrarEstrellasCentrales();

                }
                document.getElementById("verificarPalabraBtn").disabled = true;

                palabraIncorrecta = '';

                // Hacer scroll al mensaje
                mensaje.scrollIntoView({
                    behavior: "smooth",
                    block: "end"
                });

                // Verificar si se completaron todas las palabras
                if (palabrasRestantes.length === 0) {
                    // Crear el mensaje inicial
                    // let resultado = `¡Felicidades! Has completado las ${contadorBuenas} palabras. El tiempo fue ${formatTime(minutes)}:${formatTime(seconds)}.\n\nPalabras correctas:\n`;
                    // let resultado = `¡Felicidades, has descubierto todas las palabras! 🎉. Ganaste ${estrellas} estrellas, descubriste las ${contadorBuenas} palabras escondidas y lo hiciste en un tiempo de ${formatTime(minutes)}:${formatTime(seconds)}.`;
                    // mensaje.className = "correcto";
                    mostrarConfeti();

                    document.getElementById("verificarPalabraBtn").disabled = true;
                    document.getElementById("saltarPalabraBtn").disabled = true;
                    document.getElementById("finalizarJuegoBtn").disabled = true;

                    // Asignar el mensaje completo al elemento
                    mensaje.textContent = resultado;
                    mensaje.scrollIntoView({
                        behavior: "smooth",
                        block: "end"
                    });

                    // Detener el temporizador y establecer la clase
                    clearInterval(timer);
                    mensaje.className = "correcto";
                    mensaje.scrollIntoView({
                        behavior: "smooth",
                        block: "end"
                    });
                    enviarEvaluacionDescubriendoPalabrasB();
                    mostrarConfeti();
                    return;
                }

                setTimeout(function() {
                    // Habilitar el botón "Verificar" para la siguiente palabra
                    document.getElementById("verificarPalabraBtn").disabled = false;
                    iniciarJuego(); // Llama a la función que inicia la siguiente palabra
                }, 4000);
            } else {
                // Reducir vidas y mostrar mensaje de error
                vidas--;
                contadorVidas.textContent = vidas;
                contadorIncorrectas++;
                movimientosSalta();
                if (contadorIncorrectas === 1) {
                    mostrarLapizRoto(1);
                }
                if (contadorIncorrectas === 2) {
                    mostrarLapizRoto(2);
                }
                if (contadorIncorrectas === 3) {
                    mostrarLapizRoto(3);
                    mensaje.innerHTML = `¡Casi lo logras <?php echo $this->session->userdata('usuario'); ?>!🌟 
                 Te quedaste sin intentos, ¡pero diste lo mejor! 💪`;
                }

                mensaje.className = "incorrecto";
                // nuevapalabrasIncorrectas = palabrasIncorrectas.push(palabraActual.palabra);
                console.log('Incorrectas', contadorIncorrectas);
                console.log('Palabra correcta:', palabraActual.palabra);
                console.log('Palabra incorrecta: ', palabraIncorrecta);

                mensaje.scrollIntoView({
                    behavior: "smooth",
                    block: "end"
                });

                let palabraIncorrectaCorrecta = '🔴 Palabra incorrecta: ' + palabraIncorrecta + ' - 🟢Palabra correcta: ' + palabraActual.palabra;

                nuevapalabrasIncorrectas = palabrasIncorrectas.push(palabraIncorrectaCorrecta);
                palabraIncorrecta = '';
                for (i = 0; i < palabrasIncorrectas.length; i++) {
                    console.log(`${i}: ${palabrasIncorrectas[i]}`);
                }

                // Si las vidas llegan a 0, desactivar el botón de verificar
                if (vidas <= 0) {
                    mostrarMensajeExito();
                    mensaje.textContent = `Juego terminado. ¡A seguir practicando, te has quedado sin intentos! 💪. Ganaste ${estrellas} estrellas, descubriste ${contadorBuenas} palabras y lo hiciste en un tiempo de ${formatTime(minutes)}:${formatTime(seconds)}.`;
                    mensaje.className = "incorrecto";
                    clearInterval(timer);
                    mensaje.scrollIntoView({
                        behavior: "smooth",
                        block: "end"
                    });
                    // Desactivar los elementos del juego
                    Array.from(contenedorLetras.children).forEach(letra => {
                        letra.draggable = false;
                        letra.style.cursor = "not-allowed";
                    });
                    Array.from(contenedorPalabra.children).forEach(casilla => {
                        casilla.style.pointerEvents = "none";
                    });
                    document.getElementById("verificarPalabraBtn").disabled = true;
                    document.getElementById("saltarPalabraBtn").disabled = true;
                    document.getElementById("finalizarJuegoBtn").disabled = true;
                    enviarEvaluacionDescubriendoPalabrasB();

                }
            }
        }

        function mostrarMensajeExito() {
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
            mensaje.style.backgroundColor = '#ffffff';
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
            const botonSeguir = document.createElement('button');
            botonSeguir.textContent = 'Sí, seguir trazando';
            botonSeguir.style.marginRight = '10px';
            botonSeguir.classList.add('btn', 'btn-success');

            const botonNoSeguir = document.createElement('button');
            botonNoSeguir.textContent = 'No, ir al menú principal';
            botonNoSeguir.classList.add('btn', 'btn-danger');

            // Acción al hacer clic en "Sí, seguir trazando"
            botonSeguir.addEventListener('click', () => {
                ctx.clearRect(0, 0, canvas.width, canvas.height); // Limpiar el lienzo
                trazoRealizado = false; // Restablecer trazo
                botonGuardar.style.display = "none"; // Ocultar el botón de guardar
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
            mensaje.innerHTML = `<b>Exploración finalizada</b> <br> 
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
            mensaje.innerHTML = `<b>Exploración finalizada</b> <br> 
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

        function audioEstrellaPuntos() {
            console.log("audio reproducido");
            audioEstrellas.play().catch(error => {
                console.log("Error al reproducir el audio:", error);
            });
        }

        function audioTractorAnimacion() {
            console.log("audio reproducido");
            audioTractor.play().catch(error => {
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


        function finalizarJuego() {
            console.log("fin del juego");
            // Detener el cronómetro
            clearInterval(timer);

            // Mostrar un mensaje con el tiempo y los aciertos
            mensaje.textContent = `¡El juego ha sido finalizado con éxito! 🎉 Ganaste ${estrellas} estrellas, descubriste ${contadorBuenas} palabras y lo hiciste en un tiempo de ${formatTime(minutes)}:${formatTime(seconds)}.`;
            mensaje.className = "incorrecto";
            mensaje.scrollIntoView({
                behavior: "smooth",
                block: "end"
            });
            enviarEvaluacionDescubriendoPalabrasB();

            // Desactivar los elementos del juego
            Array.from(contenedorLetras.children).forEach(letra => {
                letra.draggable = false;
                letra.style.cursor = "not-allowed";
            });
            Array.from(contenedorPalabra.children).forEach(casilla => {
                casilla.style.pointerEvents = "none";
            });

            //se envian los datos al controlador para despues guardarlos en la base de datos

            // Deshabilitar los botones para evitar interacción adicional
            document.getElementById("verificarPalabraBtn").disabled = true;
            document.getElementById("saltarPalabraBtn").disabled = true;
            document.getElementById("finalizarJuegoBtn").disabled = true;


        }
        contenedorPalabra.addEventListener('input', function() {
            // Verificar si ya se completó la palabra
            const todasLasCasillasLlenas = Array.from(contenedorPalabra.children).every(casilla => casilla.textContent.trim() !== '');

            if (todasLasCasillasLlenas) {
                verificarPalabra(); // Llamar a la función automáticamente
            }
        });

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

        function finalizarJuego() {
            console.log("fin del juego");
            // Detener el cronómetro
            clearInterval(timer);
            mostrarMensajeExitoFinalizar();

            // Mostrar un mensaje con el tiempo y los aciertos
            mensaje.textContent = `¡El juego ha sido finalizado con éxito! 🎉 Ganaste ${estrellas} estrellas, descubriste ${contadorBuenas} palabras y lo hiciste en un tiempo de ${formatTime(minutes)}:${formatTime(seconds)}.`;
            mensaje.className = "incorrecto";
            mensaje.scrollIntoView({
                behavior: "smooth",
                block: "end"
            });

            console.log("entre al desabilita");
            // Desactivar los elementos del juego
            Array.from(contenedorLetras.children).forEach(letra => {
                letra.draggable = false;
                letra.style.cursor = "not-allowed";
            });
            Array.from(contenedorPalabra.children).forEach(casilla => {
                casilla.style.pointerEvents = "none";
            });

            //se envian los datos al controlador para despues guardarlos en la base de datos

            // Deshabilitar los botones para evitar interacción adicional
            document.getElementById("verificarPalabraBtn").disabled = true;
            document.getElementById('reiniciarJuegoBtn').disabled = true;
            document.getElementById("saltarPalabraBtn").disabled = true;
            document.getElementById("finalizarJuegoBtn").disabled = true;
            enviarEvaluacionDescubriendoPalabrasB();


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
            document.getElementById('reiniciarJuegoBtn').disabled = false;
            document.getElementById("saltarPalabraBtn").disabled = false;
            document.getElementById("finalizarJuegoBtn").disabled = false;

            iniciarJuego(); // Iniciar el juego de nuevo
            startTimer(); // Iniciar el cronómetro
        }


        // Función para enviar el tiempo final por AJAX
        function enviarEvaluacionDescubriendoPalabrasB() {
            $.ajax({
                url: '<?php echo base_url('descubriendo_palabras/enviarEvaluacionDescubriendoPalabrasB'); ?>', // URL de tu controlador
                type: 'POST',
                data: {
                    tiempoFinal: timer,
                    palabrasCorrectas: contadorBuenas,
                    palabrasIncorrectas: contadorIncorrectas,
                    tiempoFinal: tiempo,
                    tiempoFinal: tiempo,
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