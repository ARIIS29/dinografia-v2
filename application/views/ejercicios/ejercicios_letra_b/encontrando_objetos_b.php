<section class="mt-10">
    <div class="container-fluid d-flex justify-content-center" style="position: relative;">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-8 col-8 justify-content-center color-fondo instrucciones" id="areaJuego">
                <div class="col-lg-12 col-md-12 col-12 mt-2">
                    <p>
                    <h1>¡Bienvenidos a la aventura del bosque de bambú! <br> <b>Elementos - Letra b</b></h1> <br>
                    ¡Prepárate para una emocionante misión! Ayuda al dino a encontrar todos los elementos perdidos en el bosque de bambú. ¡Todos tienen algo en común: contienen la letra b!<br>
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

                <div class="col-12 text-center" id="objetivoEmoji"></div>
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

        document.getElementById('play-btn').addEventListener('click', function() {
            // Mostrar el encabezado del juego
            document.getElementById('header-juego').classList.remove('d-none');

            // Ocultar el encabezado inicial
            document.getElementById('header-inicial').classList.add('d-none');
        });

        const areaJuego = document.getElementById('areaJuego');
        const contenedorJuego = document.getElementById('contenedorJuego');

        const areaJuegoObjetos = document.getElementById('areaJuegoObjetos');
        const mensaje = document.getElementById('mensaje');
        const temporizadorElemento = document.getElementById('temporizador');
        const objetivoEmojiElemento = document.getElementById('objetivoEmoji');
        const intentosElemento = document.getElementById('intentos');
        const siguienteNivelElemento = document.getElementById('siguienteNivel');
        const recolectadosElemento = document.getElementById('objetoRecolectado');
        // const botonFinalizar = document.getElementById('finalizarJuego');
        // const botonPasarNivel = document.getElementById('pasarNivel');
        // const botonReiniciar = document.getElementById('reiniciarJuego');
        // document.getElementById('pasarNivel').addEventListener('click', pasarNivel);

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
            objetivoEmojiElemento.innerHTML = `¡Encuentra todos los elementos de <span>${emojiCorrecto.nombre}</span> (${emojiCorrecto.emoji}) haciendo clic sobre ellos!`;

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


        playBtn.addEventListener('click', function() {
            console.log('Clic en el botón de inicio');
            playBtn.style.display = 'none'; // Ocultar el botón
            areaJuego.style.display = 'none'; // Ocultar el área del botón
            contenedorJuego.style.display = 'block'; // Mostrar el juego
            iniciarTemporizador();
            mostrarEmojis();
        });

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