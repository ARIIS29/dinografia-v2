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
            <div class="col-lg-12 col-md-12 col-12 justify-content-center" id="contenedorJuego">
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

                <div class="areaJuegoMemorama" id="areaJuegoMemorama"></div>
                <div id="resultado"></div>
                <div id="movimientosRestantes"></div>

                <div id="botonesContenedor" class="d-flex justify-content-center mt-5">

                    <button id="reiniciarJuegoBtn" class="btn reiniciar me-2" title="Reiniciar Juego">
                        <i class="fas fa-redo"></i> Reiniciar Misión
                    </button>

                    <button id="finalizarJuegoBtn" class="btn finalizar me-2" title="Finalizar Juego">
                        <i class="fas fa-times"></i> Finalizar Misión
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
                        iniciarTemporizador();
                    }, 500);
                }
            }, 50);
        }

        const areaJuego = document.getElementById('areaJuego');
        const contenedorJuego = document.getElementById('contenedorJuego');
        const areaJuegoMemorama = document.getElementById('areaJuegoMemorama');
        const mensaje = document.getElementById('mensaje');
        const resultado = document.getElementById('resultado');
        const movimientosRestantes = document.getElementById('movimientosRestantes');
        const temporizadorElemento = document.getElementById('temporizador');



        // document.getElementById('pasarNivelBtn').addEventListener('click', pasarNivel);
        document.getElementById('finalizarJuegoBtn').addEventListener('click', finalizarJuego);

        document.getElementById('reiniciarJuegoBtn').addEventListener('click', reiniciarJuego);



        // Arreglo de parejas base: Emoji y palabra
        const parejasBase = [{
                emoji: '🫏',
                palabra: 'burro'
            },
            {
                emoji: '🦓',
                palabra: 'cebra'
            },
            {
                emoji: '🦬',
                palabra: 'bisonte'
            },
            {
                emoji: '🐺',
                palabra: 'lobo'
            },
            {
                emoji: '🐎',
                palabra: 'caballo'
            },
            {
                emoji: '🦉',
                palabra: 'búho'
            },
            {
                emoji: '🐋',
                palabra: 'ballena'
            },
            {
                emoji: '🐝',
                palabra: 'abeja'
            },
            {
                emoji: '🐑',
                palabra: 'borrego'
            },
            {
                emoji: '🐂',
                palabra: 'búfalo'
            }
        ];

        let tarjetasVolteadas = [];
        let paresEncontrados = 0;
        let paresTotalesEncontrados = 0;
        let totalPares = 0;
        let parejas = [];
        let nivel = 0;
        let movimientos = 0;
        let temporizador;
        let minutos = 0;
        let segundos = 0;

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

        // Función para mezclar las cartas
        function mezclarArreglo(arreglo) {
            for (let i = arreglo.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [arreglo[i], arreglo[j]] = [arreglo[j], arreglo[i]];
            }
            return arreglo;
        }
        let movimientosSobrantes = 0; // Movimientos sobrantes de cada nivel

        function iniciarJuego() {
            nivel++;
            if (nivel > 3) {
                nivel = 3;
            }

            // Mezclar las parejas base antes de seleccionar las del nivel
            const parejasMezcladas = mezclarArreglo([...parejasBase]);
            parejas = parejasMezcladas.slice(0, nivel * 2);
            totalPares = parejas.length;

            areaJuegoMemorama.innerHTML = '';
            resultado.textContent = '';
            tarjetasVolteadas = [];
            paresEncontrados = 0;

            // Ajustar los movimientos según el nivel
            switch (nivel) {
                case 1:
                    movimientos = 4;
                    break;
                case 2:
                    movimientos = 8;
                    break;
                case 3:
                    movimientos = 12;
                    break;
                default:
                    movimientos = 16;
                    break;
            }

            movimientosRestantes.textContent = `${movimientos}`;
            movimientosSobrantes += movimientos; // corregido: no sumes el elemento HTML
            console.log("movimientos sobr", movimientosSobrantes);
            console.log("movimientos res", movimientosRestantes.textContent);

            // Ajustar la cuadrícula del tablero según el nivel
            switch (nivel) {
                case 1:
                    areaJuegoMemorama.style.gridTemplateColumns = 'repeat(2, 100px)';
                    areaJuegoMemorama.style.gridTemplateRows = 'repeat(2, 100px)';
                    break;
                case 2:
                    areaJuegoMemorama.style.gridTemplateColumns = 'repeat(4, 100px)';
                    areaJuegoMemorama.style.gridTemplateRows = 'repeat(2, 100px)';
                    break;
                case 3:
                    areaJuegoMemorama.style.gridTemplateColumns = 'repeat(4, 100px)';
                    areaJuegoMemorama.style.gridTemplateRows = 'repeat(3, 100px)';
                    break;
            }

            // Crear arreglo de tarjetas duplicadas (emoji y palabra)
            let tarjetas = [];
            parejas.forEach(par => {
                tarjetas.push({
                    tipo: 'emoji',
                    valor: par.emoji
                });
                tarjetas.push({
                    tipo: 'palabra',
                    valor: par.palabra
                });
            });

            // Mezclar las tarjetas
            const tarjetasMezcladas = mezclarArreglo(tarjetas);

            // Crear elementos de las tarjetas en el DOM
            tarjetasMezcladas.forEach((tarjeta, indice) => {
                const tarjetaDiv = document.createElement('div');
                tarjetaDiv.classList.add('tarjeta');
                tarjetaDiv.setAttribute('data-id', indice);
                tarjetaDiv.setAttribute('data-valor', tarjeta.valor);
                tarjetaDiv.addEventListener('click', () => voltearTarjeta(tarjetaDiv));
                areaJuegoMemorama.appendChild(tarjetaDiv);
            });

            resultado.textContent = `${paresTotalesEncontrados}`;
            mostrarTarjetasPor4Segundos();
        }


        // Función para mostrar las tarjetas durante 4 segundos
        function mostrarTarjetasPor4Segundos() {
            const tarjetas = document.querySelectorAll('.tarjeta');
            tarjetas.forEach(tarjeta => {
                tarjeta.classList.add('volteada');
                tarjeta.textContent = tarjeta.getAttribute('data-valor');
            });

            setTimeout(() => {
                // Ocultar las tarjetas después de 4 segundos
                tarjetas.forEach(tarjeta => {
                    tarjeta.classList.remove('volteada');
                    tarjeta.textContent = '';
                });
                mensaje.textContent = '¡Comienza a emparejar!';
            }, 2000);
        }

        // Función para voltear las cartas
        function voltearTarjeta(tarjeta) {
            if (tarjeta.classList.contains('volteada') || tarjetasVolteadas.length === 2 || movimientos === 0) return;

            tarjeta.classList.add('volteada');
            tarjeta.textContent = tarjeta.getAttribute('data-valor');
            tarjetasVolteadas.push(tarjeta);

            if (tarjetasVolteadas.length === 2) {
                movimientos--; // Disminuir el contador de movimientos

                verificarEmparejamiento();
                // const tarjetasNoEmparejadas = document.querySelectorAll('.tarjeta:not(.emparejada)');
                movimientosRestantes.textContent = `${movimientos}`;
                if (movimientos === 0 && paresEncontrados < totalPares) {
                    clearInterval(temporizador);
                    mensaje.textContent = 'fin del juego';

                    const tarjetas = document.querySelectorAll('.tarjeta');
                    tarjetas.forEach(tarjeta => {
                        const tarjetaClon = tarjeta.cloneNode(true);
                        tarjeta.parentNode.replaceChild(tarjetaClon, tarjeta);
                    });
                }

            }
        }

        // Función para verificar si las cartas emparejadas son iguales
        function verificarEmparejamiento() {

            const [primeraTarjeta, segundaTarjeta] = tarjetasVolteadas;
            const primeraValor = primeraTarjeta.getAttribute('data-valor');
            const segundaValor = segundaTarjeta.getAttribute('data-valor');

            // Verificar si las tarjetas forman una pareja válida
            if (parejas.some(par => (primeraValor === par.emoji && segundaValor === par.palabra) || (primeraValor === par.palabra && segundaValor === par.emoji))) {

                mensaje.textContent = '¡Correcto! Emparejaste las cartas.';
                paresEncontrados++;
                paresTotalesEncontrados++;


                // Cambiar el color de fondo a verde
                primeraTarjeta.style.backgroundColor = 'green';
                segundaTarjeta.style.backgroundColor = 'green';


                if (paresEncontrados === totalPares) {
                    paresTotalesEncontrados += totalPares;


                    if (nivel === 3) {
                        clearInterval(temporizador);

                        // Bloquear clics en las tarjetas
                        const tarjetas = document.querySelectorAll('.tarjeta');
                        tarjetas.forEach(tarjeta => {
                            const clon = tarjeta.cloneNode(true); // sin eventos
                            tarjeta.replaceWith(clon);
                        });

                        mensaje.textContent = `🎉 ¡Felicidades! Has encontrado todos los pares y completado la misión.`;
                        mensaje.className = "mensaje-final";

                        // También puedes mostrar un botón para volver a jugar
                        document.getElementById('reiniciarJuegoBtn').style.display = 'inline-block';

                    } else {
                        setTimeout(() => {
                            iniciarJuego(); // pasar al siguiente nivel si no es el último
                        }, 1500);
                    }
                }


                resultado.textContent = `${paresTotalesEncontrados}`;
            } else {
                mensaje.textContent = '¡Intenta de nuevo!';
                setTimeout(() => {
                    // Voltear las cartas nuevamente
                    primeraTarjeta.classList.remove('volteada');
                    segundaTarjeta.classList.remove('volteada');
                    primeraTarjeta.textContent = '';
                    segundaTarjeta.textContent = '';

                }, 1000);
            }

            tarjetasVolteadas = [];



        }

        function reiniciarJuego() {
            clearInterval(temporizador);
            minutos = 0;
            segundos = 0;
            mensaje.textContent = "";
            mensaje.className = "";
            paresTotalesEncontrados = 0;
            movimientosSobrantes = 0;
            nivel = 0;
            iniciarJuego();
            iniciarTemporizador();
        }

        // Función para finalizar el juego
        function finalizarJuego() {
            clearInterval(temporizador);

            // Mostrar mensaje con resultado final
            const tiempoFinal = `${String(minutos).padStart(2, '0')}:${String(segundos).padStart(2, '0')}`;
            mensaje.textContent = `¡Misión finalizada! Pares encontrados: ${paresTotalesEncontrados}. Tiempo: ${tiempoFinal}`;
            mensaje.className = "mensaje-final"; // Puedes estilizar esto en CSS


            // Deshabilitar las tarjetas al reemplazarlas por copias sin eventos
            const tarjetas = document.querySelectorAll('.tarjeta');
            tarjetas.forEach(tarjeta => {
                const tarjetaClon = tarjeta.cloneNode(true);
                tarjeta.parentNode.replaceChild(tarjetaClon, tarjeta);
            });
            // Opcional: deshabilitar las cartas restantes
            // const tarjetas = document.querySelectorAll('.tarjeta');
            // tarjetas.forEach(tarjeta => tarjeta.removeEventListener('click', voltearTarjeta));
        }




    });
</script>