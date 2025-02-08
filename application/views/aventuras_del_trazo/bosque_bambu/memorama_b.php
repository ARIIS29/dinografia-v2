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

                <div class="col-lg-12 col-md-12 col-12 text-center">
                    <button id="play-btn">Play</button>
                </div>

            </div>

            <div class="col-lg-12 col-md-12 col-12 justify-content-center" id="contenedorJuego">
                <canvas id="confettiCanvas"></canvas>
                <div class="col-12 text-center" id="objetivoEmoji"></div>
                <div class="justify-content-center areaJuego" id="areaJuego"></div>
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

        const areaJuego = document.getElementById('areaJuego');
        const contenedorJuego = document.getElementById('contenedorJuego');
        const mensaje = document.getElementById('mensaje');
        const temporizadorElemento = document.getElementById('temporizador');
        const resultado = document.getElementById('resultado');
        const movimientosRestantes = document.getElementById('movimientosRestantes');

        document.getElementById('pasarNivelBtn').addEventListener('click', pasarNivel);
        document.getElementById('finalizarJuegoBtn').addEventListener('click', finalizarJuego);
        document.getElementById('reiniciarJuegoBtn').addEventListener('click', reiniciarJuego);


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
            document.getElementById('areaJuego').style.display = 'none';
            document.getElementById('contenedorJuego').style.display = 'block'; // Cambié 'flex' por 'block' para asegurar visibilidad
            iniciarJuego();
            iniciarTemporizador();
        });

        const parejasBase = [{
                emoji: '🐱',
                palabra: 'gato'
            },
            {
                emoji: '🐶',
                palabra: 'perro'
            },
            {
                emoji: '🐷',
                palabra: 'cerdo'
            },
            {
                emoji: '🐯',
                palabra: 'tigre'
            },
            {
                emoji: '🐵',
                palabra: 'mono'
            },
            {
                emoji: '🐰',
                palabra: 'conejo'
            },
            {
                emoji: '🦁',
                palabra: 'león'
            },
            {
                emoji: '🐔',
                palabra: 'gallina'
            },
            {
                emoji: '🐘',
                palabra: 'elefante'
            },
            {
                emoji: '🦄',
                palabra: 'unicornio'
            }
        ];

        let tarjetasVolteadas = [];
        let paresEncontrados = 0;
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

        // Función para ajustar el tamaño de la cuadrícula según el nivel
        function ajustarCuadrícula() {
            switch (nivel) {
                case 1:
                    areaJuego.style.gridTemplateColumns = 'repeat(2, 100px)';
                    areaJuego.style.gridTemplateRows = 'repeat(2, 100px)';
                    break;
                case 2:
                    areaJuego.style.gridTemplateColumns = 'repeat(2, 100px)';
                    areaJuego.style.gridTemplateRows = 'repeat(3, 100px)';
                    break;
                case 3:
                    areaJuego.style.gridTemplateColumns = 'repeat(4, 100px)';
                    areaJuego.style.gridTemplateRows = 'repeat(2, 100px)';
                    break;
                case 4:
                    areaJuego.style.gridTemplateColumns = 'repeat(4, 100px)';
                    areaJuego.style.gridTemplateRows = 'repeat(3, 100px)';
                    break;
                case 5:
                    areaJuego.style.gridTemplateColumns = 'repeat(4, 100px)';
                    areaJuego.style.gridTemplateRows = 'repeat(4, 100px)';
                    break;
                default:
                    areaJuego.style.gridTemplateColumns = 'repeat(4, 100px)';
                    areaJuego.style.gridTemplateRows = 'repeat(4, 100px)';
            }
        }



        let movimientosSobrantes = 0; // Variable para guardar los movimientos sobrantes

        // Función para iniciar el juego
        function iniciarJuego() {
            nivel++;
            if (nivel > 5) {
                // nivel = 5; // Limitar a 5 niveles
            }

            // Ajustar las parejas según el nivel
            parejas = parejasBase.slice(0, nivel * 2); // Cada nivel añade más pares
            totalPares = parejas.length;

            // Mostrar el mensaje de nivel
            mensaje.textContent = `Nivel ${nivel}`;

            areaJuego.innerHTML = '';
            resultado.textContent = '';
            tarjetasVolteadas = [];
            paresEncontrados = 0;

            // Solo sumar los movimientos sobrantes del nivel anterior, no el total
            switch (nivel) {
                case 1:
                    movimientos = 4;
                    break;
                case 2:
                    movimientos = 8 + movimientosSobrantes;
                    console.log('moviNi2', movimientos);
                    break;
                case 3:
                    movimientos = 12;
                    break;
                case 4:
                    movimientos = 16;
                    break;
                case 5:
                    movimientos = 20;
                    break;
                default:
                    movimientos = 4; // Por defecto en caso de un error
            }

            // Sumar los movimientos sobrantes de la ronda anterior
            movimientos += movimientosSobrantes;
            console.log('movimientos', movimientos);
            console.log('movSobra', movimientosSobrantes);

            // Actualizar los movimientos restantes
            movimientosRestantes.textContent = `Movimientos restantes: ${movimientos}`;

            // Guardar los movimientos sobrantes para el siguiente nivel
            movimientosSobrantes = movimientos; // Guardamos los movimientos sobrantes del nivel actual

            // Ajustar la cuadrícula del tablero según el nivel
            ajustarCuadrícula();

            // Crear el arreglo de tarjetas mezclado (emoji y palabra)
            const tarjetas = [];
            parejas.forEach(par => {
                tarjetas.push(par.emoji, par.palabra);
            });

            const tarjetasMezcladas = mezclarArreglo(tarjetas);

            tarjetasMezcladas.forEach((tarjeta, indice) => {
                const tarjetaDiv = document.createElement('div');
                tarjetaDiv.classList.add('tarjeta');
                tarjetaDiv.setAttribute('data-id', indice);
                tarjetaDiv.setAttribute('data-valor', tarjeta);
                tarjetaDiv.addEventListener('click', () => voltearTarjeta(tarjetaDiv));

                areaJuego.appendChild(tarjetaDiv);
            });

            // Mostrar las tarjetas durante 4 segundos
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
                movimientosRestantes.textContent = `Movimientos restantes: ${movimientos}`;
                verificarEmparejamiento();
            }
        }

        // Función para verificar si las cartas emparejadas son iguales
        function verificarEmparejamiento() {
            const [primeraTarjeta, segundaTarjeta] = tarjetasVolteadas;
            const primeraValor = primeraTarjeta.getAttribute('data-valor');
            const segundaValor = segundaTarjeta.getAttribute('data-valor');

            // Verificar si las tarjetas volteadas son un emoji y su palabra correspondiente
            if (parejas.some(par => (primeraValor === par.emoji && segundaValor === par.palabra) || (primeraValor === par.palabra && segundaValor === par.emoji))) {
                paresEncontrados++;
                resultado.textContent = `Pares encontrados: ${paresEncontrados}`;
                mensaje.textContent = '¡Correcto! Emparejaste las cartas.';
                if (paresEncontrados === totalPares) {
                    mensaje.textContent = `¡Felicidades! Completaste el nivel ${nivel}.`;
                    resultado.textContent = '';
                    setTimeout(() => {
                        iniciarJuego(); // Iniciar el siguiente nivel después de un breve retraso
                    }, 2000);
                }
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
            tarjetasVolteadas = [];
            paresEncontrados = 0;
            totalPares = 0;
            parejas = [];
            nivel = 0;
            movimientos = 0;
        }


        // Iniciar el juego por primera vez


    });
</script>