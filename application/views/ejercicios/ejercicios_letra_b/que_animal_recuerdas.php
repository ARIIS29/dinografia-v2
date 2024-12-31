<section class="mt-8">
    <div class="container-fluid d-flex justify-content-center" style="position: relative;">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12" id="areaJuego">
                <a id="play-btn" class="enlargable">
                    <img src="<?php echo base_url('almacenamiento/img/botones/btn-iniciar.png') ?>" alt="" class="img-fluid" width="80%">
                </a>
            </div>


            <div id="contenedorJuego" style="display: none;">
                <h1>¡Memoriza la Secuencia de Frutas!</h1>
                <div class="temporizador" id="temporizador">Tiempo: 00:00</div>
                <div id="contador" class="secuencia-correcta">Secuencias correctas: 0</div>
                <div id="contador-intentos" class="temporizador">Intentos restantes: 3</div>
                <div id="mostrar-secuencia" class="mostrar-secuencia"></div>
                <div id="contenedor-frutas" class="contenedor-frutas"></div>
                <div id="contenedor-seleccionadas" class="contenedor-seleccionadas"></div>
                <button id="boton-iniciar">Iniciar Juego</button>
                <button id="pasarNivelBtn">Siguiente Objeto</button>
                <button id="finalizarJuegoBtn">Finalizar Juego</button>
                <button id="reiniciarJuegoBtn">Reiniciar Juego</button>
                <div id="objetivoEmoji">Selecciona: 🍎</div>
                <div class="areaJuegoObjetos" id="areaJuegoObjetos"></div>
                <div id="mensaje"></div>
<!-- 
                <button id="boton-confirmar" class="boton-confirmar" style="display:none;">Confirmar Secuencia</button>
                <button id="boton-reiniciar" class="boton-confirmar" style="display:none;">Reiniciar Juego</button>
                <button id="boton-finalizar" class="boton-confirmar" style="display:none;">Finalizar Juego</button> -->

            </div>


        </div>
</section>


<script>
    document.addEventListener("DOMContentLoaded", function() {

        const playBtn = document.getElementById('play-btn');

        const frutas = [
            { emoji: "🐍", nombre: "Serpiente" },
            { emoji: "🐑", nombre: "Oveja" },
            { emoji: "🦬", nombre: "Bisonte" },
            { emoji: "🦉", nombre: "Búho" },
            { emoji: "🐋", nombre: "Ballena" },
            { emoji: "🐂", nombre: "Búfalo" }
        ];

        const botonIniciar = document.getElementById("boton-iniciar");
        const mostrarSecuencia = document.getElementById("mostrar-secuencia");
        const contenedorFrutas = document.getElementById("contenedor-frutas");
        const contenedorSeleccionadas = document.getElementById("contenedor-seleccionadas");
        const temporizador = document.getElementById("temporizador");
        const botonConfirmar = document.getElementById("boton-confirmar");
        const botonReiniciar = document.getElementById("boton-reiniciar");
        const mensaje = document.getElementById("mensaje");
        const contador = document.getElementById('contador');
        const botonFinalizar = document.getElementById("boton-finalizar");
        

        document.getElementById('pasarNivelBtn').addEventListener('click', pasarNivel);
        document.getElementById('finalizarJuegoBtn').addEventListener('click', finalizarJuego);
        document.getElementById('reiniciarJuegoBtn').addEventListener('click', reiniciarJuego);

        let secuencia = [];
        let frutasUsuario = [];
        let longitudSecuencia = 1; // Empieza con una secuencia de 1 fruta
        let tiempoTotal = 0; // Tiempo en segundos
        let contadorSecuenciasCorrectas = 0; // Contador de secuencias correctas
        let intentos = 3; // Intentos globales


        // Temporizador global
        setInterval(() => {
            tiempoTotal++;
            actualizarTemporizador();
        }, 1000);

        function actualizarTemporizador() {
            const minutos = String(Math.floor(tiempoTotal / 60)).padStart(2, "0");
            const segundos = String(tiempoTotal % 60).padStart(2, "0");
            temporizador.innerText = `Tiempo: ${minutos}:${segundos}`;
        }
        function iniciarJuego() {
            secuencia = [];
            frutasUsuario = [];
            contenedorFrutas.innerHTML = "";
            contenedorSeleccionadas.innerHTML = "";
            mensaje.innerHTML = "";
            botonConfirmar.style.display = "none"; // Ocultar el botón de confirmación al inicio
            botonReiniciar.style.display = "inline-block";
            botonFinalizar.style.display = "inline-block";
            generarSecuencia();
            mostrarSecuenciaEnPantalla();
            // Resetear el botón de confirmar
            botonConfirmar.disabled = true;
        }

        function generarSecuencia() {
            secuencia = [];
            while (secuencia.length < longitudSecuencia) {
                const frutaAleatoria = frutas[Math.floor(Math.random() * frutas.length)];
                // Asegurarse de que la fruta aleatoria no se repita en la secuencia
                if (!secuencia.includes(frutaAleatoria)) {
                    secuencia.push(frutaAleatoria);
                }
            }
        }

        function mostrarSecuenciaEnPantalla() {
            mostrarSecuencia.innerHTML = secuencia.map(fruta => `${fruta.emoji} ${fruta.nombre}`).join(" ");
            // Crear el botón de continuar
            const botonContinuar = document.createElement("button");
            botonContinuar.innerText = "Continuar";
            botonContinuar.addEventListener("click", function () {
                mostrarSecuencia.innerText = ""; // Eliminar la secuencia cuando se da clic
                mostrarOpcionesFrutas(); // Mostrar las opciones de frutas
            });
            mostrarSecuencia.appendChild(botonContinuar); // Agregar el botón a la pantalla
        }

        function mostrarOpcionesFrutas() {
            const opciones = [...secuencia];

            // Agregar frutas adicionales para confundir
            while (opciones.length < 6) { // Llenar el tablero de 3x2 (6 elementos)
                const frutaAleatoria = frutas[Math.floor(Math.random() * frutas.length)];
                if (!opciones.includes(frutaAleatoria)) {
                    opciones.push(frutaAleatoria);
                }
            }

            // Mezclar las frutas
            opciones.sort(() => Math.random() - 0.5);

            // Mostrar las frutas en el tablero de 3x3
            opciones.forEach(fruta => {
                const frutaElemento = document.createElement("span");
                frutaElemento.classList.add("fruta");
                frutaElemento.textContent = `${fruta.emoji} ${fruta.nombre}`;
                frutaElemento.dataset.value = fruta.emoji;

                frutaElemento.addEventListener("click", manejarClicUsuario);
                contenedorFrutas.appendChild(frutaElemento);
            });

            // Mostrar el botón de confirmar
            botonConfirmar.style.display = "inline-block";
        }
        function manejarClicUsuario(evento) {
            const frutaSeleccionada = evento.target.dataset.value;

            if (frutasUsuario.length < longitudSecuencia) {
                frutasUsuario.push(frutaSeleccionada);
                evento.target.classList.add("seleccionada");

                // Añadir la fruta seleccionada al contenedor de seleccionadas
                const frutaEnContenedor = document.createElement("span");
                frutaEnContenedor.classList.add("fruta-en-contenedor");
                frutaEnContenedor.textContent = frutaSeleccionada;
                contenedorSeleccionadas.appendChild(frutaEnContenedor);
            }

            if (frutasUsuario.length === longitudSecuencia) {
                botonConfirmar.disabled = false;
            }else{
                mensaje.innerHTML = "No se han seleccionado todas las fichas";
            }
        }

        let cronometroActivo = true; // Variable para controlar el estado del cronómetro

        // Modificar la función para detener el cronómetro cuando se complete el nivel 5
        function actualizarTemporizador() {
            if (!cronometroActivo) return; // Si el cronómetro está detenido, no actualizar

            const minutos = String(Math.floor(tiempoTotal / 60)).padStart(2, "0");
            const segundos = String(tiempoTotal % 60).padStart(2, "0");
            temporizador.innerText = `Tiempo: ${minutos}:${segundos}`;
        }

        // Modificar la función verificarSeleccion para detener el juego
        function verificarSeleccion() {
            let esCorrecto = true;
            // Verificar que las frutas seleccionadas sean las correctas
            for (let i = 0; i < frutasUsuario.length; i++) {
                if (frutasUsuario[i] !== secuencia[i].emoji) {
                    esCorrecto = false;
                    marcarError(i); // Marcar la ficha incorrecta
                }
            }

            if (esCorrecto) {
                mensaje.innerHTML = "¡Correcto!";
                mensaje.classList.add("correcto");
                mensaje.classList.remove("incorrecto");
                longitudSecuencia++; // Aumentar la longitud de la secuencia
                contadorSecuenciasCorrectas++;
                contador.innerText = `Secuencias correctas: ${contadorSecuenciasCorrectas}`;
                // Verificar si se han completado 5 niveles
                if (longitudSecuencia > 5) {
                    mensaje.innerHTML = "¡Niveles Completados! Has alcanzado el nivel 5.";
                    mensaje.classList.add("correcto");

                    // Detener el cronómetro y el juego
                    cronometroActivo = false;
                    setTimeout(() => {
                        mensaje.innerHTML = "¡Juego Finalizado!";
                        mensaje.classList.add("correcto");
                    }, 2000); // Mostrar el mensaje después de 2 segundos
                } else {
                    setTimeout(iniciarJuego, 2000); // Reiniciar después de un tiempo
                }
            } else {
                intentos--; // Restar un intento
                document.getElementById('contador-intentos').innerText = `Intentos restantes: ${intentos}`;
                if (intentos === 0) {
                    mensaje.innerHTML = "¡Te has quedado sin intentos! El juego ha terminado.";
                    mensaje.classList.add("incorrecto");

                    // Detener el cronómetro y el juego
                    cronometroActivo = false;
                } else {
                    mensaje.innerHTML = `Incorrecto, la secuencia correcta era: ${secuencia.map(f => f.emoji).join(" ")}`;
                    mensaje.classList.add("incorrecto");
                    mensaje.classList.remove("correcto");
                }
            }

        }

        function marcarError(indice) {
            const frutasSeleccionadas = document.querySelectorAll(".fruta-en-contenedor");
            // Marcar la fruta incorrecta con la clase de error en el contenedor de frutas seleccionadas
            frutasSeleccionadas[indice].classList.add("error"); // Marcar la fruta incorrecta en rojo
        }
        function reiniciarJuego() {
            longitudSecuencia = 1; // Reiniciar la longitud de la secuencia
            tiempoTotal = 0; // Resetear el tiempo
            contadorSecuenciasCorrectas = 0; // Reiniciar el contador de secuencias correctas
            frutasUsuario = [];
            secuencia = [];
            intentos = 3; // Resetear los intentos a 3
            document.getElementById('contador-intentos').innerText = `Intentos restantes: ${intentos}`;
            mostrarSecuencia.innerText = "";
            contenedorFrutas.innerHTML = "";
            contenedorSeleccionadas.innerHTML = "";
            mensaje.innerHTML = "";
            actualizarTemporizador(); // Resetear el temporizador
            cronometroActivo = true; // Reactivar el cronómetro al reiniciar el juego
            botonConfirmar.style.display = "none"; // Ocultar el botón de confirmación
            botonReiniciar.style.display = "none"; // Ocultar el botón de reiniciar
            botonFinalizar.style.display = "none";
            botonIniciar.style.display = "inline-block"; // Volver a mostrar el botón de iniciar

            // Reiniciar el contador de secuencias correctas en la pantalla
            contador.innerText = `Secuencias correctas: 0`; // Establecer el contador a 0
        }
        function finalizarJuego() {
            // Detener el cronómetro
            cronometroActivo = false;

            // Mostrar mensaje de fin de juego
            mensaje.innerHTML = "¡Juego Finalizado!";
            mensaje.classList.add("correcto");

            // Ocultar los elementos del juego
            mostrarSecuencia.innerHTML = "";
            contenedorFrutas.innerHTML = "";
            contenedorSeleccionadas.innerHTML = "";
            botonConfirmar.style.display = "none";  // Puedes ocultar el botón de confirmar si lo deseas, si no, elimínalo

            // No se toca la visibilidad del botón de reiniciar ni los demás elementos
        }


        playBtn.addEventListener('click', function() {
            console.log('Clic en el botón de inicio');
            playBtn.style.display = 'none'; // Ocultar el botón
            areaJuego.style.display = 'none'; // Ocultar el área del botón
            contenedorJuego.style.display = 'block'; // Mostrar el juego
            iniciarTemporizador();
            mostrarEmojis();
        });

        

        // mostrarEmojis();
        // iniciarTemporizador();


    });
</script>