<section class="mt-10">
    <div class="container-fluid d-flex justify-content-center" style="position: relative;">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12" id="areaJuego">
                <a id="play-btn" class="enlargable">
                    <img src="<?php echo base_url('almacenamiento/img/botones/btn-iniciar.png') ?>" alt="" class="img-fluid" width="80%">
                </a>
            </div>
            <div id="contenedorJuego">
                <p>Arrastra las letras a su lugar correcto para formar la palabra.</p>
                <!-- <div id="vidas">
                    Vidas: <span id="contadorVidas">3</span>
                </div> -->
                <div id="emojiPalabra" class="emoji"></div>
                <div id="contenedorLetras"></div>
                <div id="contenedorPalabra"></div>
                <p id="mensaje"></p>
                <button id="verificarPalabraBtn">Verificar</button>
                <button id="saltarPalabraBtn">Saltar Palabra</button>
                <button id="finalizarJuegoBtn">Finalizar Juego</button>
                <button id="reiniciarJuegoBtn">Reiniciar Juego</button>

            </div>

        </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const playBtn = document.getElementById('play-btn');
        const palabras = [{
                palabra: "bambu",
                emoji: "🐱"
            },
            {
                palabra: "perro",
                emoji: "🐶"
            },
            {
                palabra: "ardilla",
                emoji: "🐿️"
            },
            {
                palabra: "oso",
                emoji: "🐻"
            },
            {
                palabra: "beso",
                emoji: "💋"
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
        // const botonVerificar = document.querySelector("button");


        let elementoArrastrado = null;
        let timer;
        let minutes = 0;
        let seconds = 0;
        let vidas = 3;
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
            contenedorLetras.innerHTML = "";
            contenedorPalabra.innerHTML = "";
            mensaje.textContent = "";
            mensaje.className = "";
            mensaje.textContent2 = "";

            const indice = Math.floor(Math.random() * palabrasRestantes.length);
            palabraActual = palabrasRestantes.splice(indice, 1)[0];

            emojiPalabra.textContent = palabraActual.emoji;

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
            // console.log('Palabra incorrecta: ', palabraIncorrecta);
            // nuevapalabrasIncorrectas = palabrasIncorrectas.push(palabraIncorrecta);
            // palabraIncorrecta = '';
            // for (i = 0; i < palabrasIncorrectas.length; i++) {
            //     console.log(`${i}: ${palabrasIncorrectas[i]}`);
            // }

            // Manejar el caso cuando no hay errores
            if (!errores) {
                mensaje.textContent = "¡Correcto! 🎉 Bien hecho.";
                mensaje.className = "correcto";
                contadorBuenas++;
                nuevapalabrasCorrectas = palabrasCorrectas.push(palabraActual.palabra);
                console.log('Buenas', contadorBuenas);
                console.log('Palabra correcta:', palabraActual.palabra);
                console.log('Array de Palabra correcta:', nuevapalabrasCorrectas);
                for (i = 0; i < palabrasCorrectas.length; i++) {
                    console.log(`${i}: ${palabrasCorrectas[i]}`);
                }
                palabraIncorrecta = '';

                // Verificar si se completaron todas las palabras
                if (palabrasRestantes.length === 0) {
                    // Crear el mensaje inicial
                    let resultado = `¡Felicidades! Has completado las ${contadorBuenas} palabras. El tiempo fue ${formatTime(minutes)}:${formatTime(seconds)}.\n\nPalabras correctas:\n`;
                    document.getElementById("verificarPalabraBtn").disabled = true;
                    document.getElementById("saltarPalabraBtn").disabled = true;
                    document.getElementById("finalizarJuegoBtn").disabled = true;


                    // Añadir cada palabra correcta al mensaje
                    for (let i = 0; i < palabrasCorrectas.length; i++) {
                        resultado += `${i + 1}. ${palabrasCorrectas[i]}\n`; // Formato: "1. palabra"
                    }

                    // Asignar el mensaje completo al elemento
                    mensaje.textContent = resultado;

                    // Detener el temporizador y establecer la clase
                    clearInterval(timer);
                    mensaje.className = "correcto";
                    return;
                }

                setTimeout(iniciarJuego, 3000);
            } else {
                // Reducir vidas y mostrar mensaje de error
                mensaje.textContent = "Hay errores. Corrige la palabra.";
                mensaje.className = "incorrecto";
                vidas--;
                contadorVidas.textContent = vidas;
                contadorIncorrectas++;
                // nuevapalabrasIncorrectas = palabrasIncorrectas.push(palabraActual.palabra);
                console.log('Incorrectas', contadorIncorrectas);
                console.log('Palabra correcta:', palabraActual.palabra);
                console.log('Palabra incorrecta: ', palabraIncorrecta);

                let palabraIncorrectaCorrecta = palabraIncorrecta+'-'+palabraActual.palabra;

                nuevapalabrasIncorrectas = palabrasIncorrectas.push(palabraIncorrectaCorrecta);
                palabraIncorrecta = '';
                for (i = 0; i < palabrasIncorrectas.length; i++) {
                    console.log(`${i}: ${palabrasIncorrectas[i]}`);
                }

                // console.log('Array de Palabra incorrecta:', nuevapalabrasIncorrectas);
                // for (i = 0; i < palabrasIncorrectas.length; i++) {
                //     console.log(`${i}: ${palabrasIncorrectas[i]}`);
                // }

                // Si las vidas llegan a 0, desactivar el botón de verificar
                if (vidas <= 0) {
                    mensaje.textContent = `¡Te quedaste sin vidas! Juego terminado. Total de palabras correctas: ${contadorBuenas}`;
                    mensaje.className = "incorrecto";
                    clearInterval(timer);
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


                }
            }
        }

        function saltarPalabra() {
            console.log("palabra saltada");
            palabrasRestantes.push(palabraActual);
            iniciarJuego();
        }

        function finalizarJuego() {
            console.log("fin del juego");
            // Detener el cronómetro
            clearInterval(timer);

            // Mostrar un mensaje con el tiempo y los aciertos
            mensaje.textContent = `Juego finalizado. Tiempo total: ${formatTime(minutes)}:${formatTime(seconds)}. Aciertos: ${contadorBuenas}`;
            mensaje.className = "correcto";

            // Desactivar los elementos del juego
            Array.from(contenedorLetras.children).forEach(letra => {
                letra.draggable = false;
                letra.style.cursor = "not-allowed";
            });
            Array.from(contenedorPalabra.children).forEach(casilla => {
                casilla.style.pointerEvents = "none";
            });

            // Deshabilitar los botones para evitar interacción adicional
            document.getElementById("verificarPalabraBtn").disabled = true;
            document.getElementById("saltarPalabraBtn").disabled = true;
            document.getElementById("finalizarJuegoBtn").disabled = true;

        }

        function reiniciarJuego() {
            console.log("juego reiniciado");

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

        playBtn.addEventListener('click', function() {
            playBtn.style.display = 'none'; // Ocultar el botón después de hacer clic
            console.log("Juego mostrado"); // Agrega esta línea para depurar
            // Ocultar el área donde está el botón de inicio
            document.getElementById('areaJuego').style.display = 'none';
            // Mostrar el contenedor del juego
            document.getElementById('contenedorJuego').style.display = 'block'; // Cambié 'flex' por 'block' para asegurar visibilidad
            iniciarJuego();
            startTimer();
            // Inicia el cronómetro
        });
        // iniciarJuego();
        // startTimer();


    });
</script>