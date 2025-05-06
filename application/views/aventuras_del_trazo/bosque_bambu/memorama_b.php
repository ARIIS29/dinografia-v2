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
        const areaJuego = document.getElementById('areaJuego');
        const contenedorJuego = document.getElementById('contenedorJuego');
        const areaJuegoMemorama = document.getElementById('areaJuegoMemorama');
        const mensaje = document.getElementById('mensaje');
        const resultado = document.getElementById('resultado');
        const movimientosRestantes = document.getElementById('movimientosRestantes');
        const temporizadorElemento = document.getElementById('temporizador');

        playBtn.addEventListener('click', function() {
            console.log('Clic en el botón de inicio');
            playBtn.style.display = 'none'; // Ocultar el botón
            areaJuego.style.display = 'none'; // Ocultar el área del botón
            contenedorJuego.style.display = 'block'; // Mostrar el juego
            // Iniciar el juego por primera vez
            iniciarJuego();
            iniciarTemporizador();
        });

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
            if (nivel > 4) {
                nivel = 4;
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
                movimientosRestantes.textContent = `${movimientos}`;
                verificarEmparejamiento();
                if (movimientos === 0) {
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