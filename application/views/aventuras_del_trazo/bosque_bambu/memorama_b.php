<section class="mt-10">
    <div class="container-fluid d-flex justify-content-center" style="position: relative;">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-8 col-8 justify-content-center color-fondo texto_instrucciones_bambu" id="areaJuego">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="d-flex align-items-center">
                        <img id="dinoIndicaciones1" src="<?php echo base_url('almacenamiento/img/bosque_bambu/dino-indicaciones.png') ?>" alt="Img-Dino-Indicaciones" class="img-fluid me-3 d-none d-sm-block" style="cursor: pointer;" width="6%">

                        <p class="mb-0">¡Encontremos en la aventura! <br></p>
                    </div>
                    <p>
                        
                        Prepárate para una emocionante misión: ¡Ayuda al Dino a encontrar y descubrir las parejas, pero ten cuidado... ¡no son iguales!, debes encontrar el animal y la palabra que lo representa. ¡Tu atención y memoria te ayudarán en esta gran aventura!<br>
                        <b>Para explorar, da clic o selecciona las tarjetas para darles la vuelta y encontrar las parejas correctas.</b>
                        <br>
                    </p>

                    <audio id="audioVista1" src="<?php echo base_url('almacenamiento/audios/audios_b/b_encuentra_descubre.mp3') ?>" preload="auto"></audio>

                    <!-- Modal del tutorial -->
                    <div id="tutorialModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background-color:rgba(0,0,0,0.)8; justify-content:center; align-items:center; z-index:1000;">
                        <div style="position:relative; background:#fff; padding:10px; border-radius:10px; max-width:90%; width:600px;">
                            <video id="tutorialVideo" width="100%" controls>
                                <source src="<?php echo base_url('almacenamiento/img/bosque_bambu/tutorial_b/b_tutorial_memorama.mp4'); ?>" type="video/mp4">
                                Tu navegador no soporta el video.
                            </video>
                            <!-- <button id="cerrarTutorial" >Cerrar</button> -->
                            <button id="cerrarTutorial" type="button" class="btn btn-danger" style="position:absolute; top:10px; right:10px;">Cerrar</button>
                        </div>

                    </div>

                    <p>
                        ¡Diviértete descubriendo y aprendiendo mientras exploramos juntos el bosque de bambú! <br>
                        Haz clic en el botón de <b>Iniciar</b> para comenzar la exploración.</p>
                    <div class="col-lg-12 col-md-12 col-12 text-center animated-button">
                        <a id="play-btn">
                            <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/btn-iniciar.png') ?>" alt="" class="img-fluid" width="20%">
                        </a>
                    </div>

                </div>

            </div>
            <div class="col-lg-12 col-md-12 col-12 justify-content-center" id="contenedorJuego">
                <audio id="audioVista2" src="<?php echo base_url('almacenamiento/audios/audios_b/b_encuentra_descubre_tractor.mp3') ?>" preload="auto"></audio>

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

                <div id="botonesContenedor" class="d-flex justify-content-center mt-5 d-none">

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
        const contadorEstrellas = document.getElementById("contadorEstrellas");


        document.getElementById('play-btn').addEventListener('click', function() {
            // Mostrar el encabezado del juego
            document.getElementById('header-juego').classList.remove('d-none');

            // Ocultar el encabezado inicial
            document.getElementById('header-inicial').classList.add('d-none');
        });

        if (!sessionStorage.getItem('audio1Reproducido_memorama')) {
            audio1.play().then(() => {
                sessionStorage.setItem('audio1Reproducido_memorama', 'true');
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

                // Ahora sí se muestra el juego
                console.log("Juego mostrado");
                document.getElementById('areaJuego').style.display = 'none';
                document.getElementById('contenedorJuego').style.display = 'block';


                // Reproduce las instrucciones
                audio2.play().catch(error => {
                    console.log("Error al reproducir audio automáticamente:", error);
                });

                audioIndicacionesDos();
                enviarInicioEvaluacionMemorama();
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
        var contadorIncorrectas = 0;
        let totalPares = 0;
        let parejas = [];
        let nivel = 0;
        let movimientos = 0;
        let temporizador;
        let minutos = 0;
        let segundos = 0;
        let estrellas = 0;

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
            document.getElementById('botonesContenedor').classList.remove('d-none');

            nivel++;
            if (nivel > 3) {
                nivel = 3;
            }

            // Mezclar las parejas base antes de seleccionar las del nivel
            const parejasMezcladas = mezclarArreglo([...parejasBase]);
            parejas = parejasMezcladas.slice(0, nivel * 2);
            totalPares = parejas.length;

            areaJuegoMemorama.innerHTML = '';

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
                    movimientos = 4;
                    break;
            }

            movimientosRestantes.textContent = `${movimientos}`;

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

                tarjetaDiv.classList.add(tarjeta.tipo);

                tarjetaDiv.setAttribute('data-id', indice);
                tarjetaDiv.setAttribute('data-valor', tarjeta.valor);
                tarjetaDiv.addEventListener('click', () => voltearTarjeta(tarjetaDiv));
                areaJuegoMemorama.appendChild(tarjetaDiv);
            });


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
                mensaje.textContent = "¡Comienza a emparejar <?php echo $this->session->userdata('usuario'); ?>! 🔍 ";
                mensaje.className = "correcto";
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
                    setTimeout(() => {
                        mostrarMensajeExitoIntentos(); // pasar al siguiente nivel si no es el 
                        mostrarLapizRoto();

                    }, 1500);
                    enviarEvaluacionMemorama();

                    document.getElementById('reiniciarJuegoBtn').disabled = true;
                    document.getElementById("finalizarJuegoBtn").disabled = true;
                    const tarjetas = document.querySelectorAll('.tarjeta');
                    tarjetas.forEach(tarjeta => {
                        const tarjetaClon = tarjeta.cloneNode(true);
                        tarjeta.parentNode.replaceChild(tarjetaClon, tarjeta);
                    });
                }
                enviarEvaluacionMemorama();



            }
        }

        // Función para verificar si las cartas emparejadas son iguales
        function verificarEmparejamiento() {

            const [primeraTarjeta, segundaTarjeta] = tarjetasVolteadas;
            const primeraValor = primeraTarjeta.getAttribute('data-valor');
            const segundaValor = segundaTarjeta.getAttribute('data-valor');

            // Verificar si las tarjetas forman una pareja válida
            if (parejas.some(par => (primeraValor === par.emoji && segundaValor === par.palabra) || (primeraValor === par.palabra && segundaValor === par.emoji))) {
                estrellaSalta();
                mostrarEstrellasCentrales();
                mensaje.textContent = "¡Super asombroso <?php echo $this->session->userdata('usuario'); ?>! 🎉 ¡Encontraste su pareja! 🥳 ¡Ganaste +100 estrellas! 🌟";
                mensaje.className = "correcto";
                mensaje.scrollIntoView({
                    behavior: "smooth",
                    block: "end"
                });
                paresEncontrados++;
                paresTotalesEncontrados++;
                estrellas += 100;
                contadorEstrellas.textContent = estrellas;

                // Cambiar el color de fondo a verde
                primeraTarjeta.style.backgroundColor = '#2ecc71';
                segundaTarjeta.style.backgroundColor = '#2ecc71';


                if (paresEncontrados === totalPares) {

                    if (nivel === 3) {
                        clearInterval(temporizador);

                        // Bloquear clics en las tarjetas
                        const tarjetas = document.querySelectorAll('.tarjeta');
                        tarjetas.forEach(tarjeta => {
                            const clon = tarjeta.cloneNode(true); // sin eventos
                            tarjeta.replaceWith(clon);
                        });
                        setTimeout(() => {
                            mostrarConfeti();

                            mostrarMensajeExitoFelicidades();

                        }, 1500);

                        // mensaje.textContent = `🎉 ¡Felicidades! Has encontrado todos los pares y completado la misión.`;
                        // mensaje.className = "mensaje-final";
                        mostrarEstrellasCentrales();
                        enviarEvaluacionMemorama();
                        document.getElementById('reiniciarJuegoBtn').disabled = true;
                        document.getElementById("finalizarJuegoBtn").disabled = true;


                        // También puedes mostrar un botón para volver a jugar
                        document.getElementById('reiniciarJuegoBtn').style.display = 'inline-block';

                    } else {
                        setTimeout(() => {
                            iniciarJuego(); // pasar al siguiente nivel si no es el último
                        }, 1500);
                    }
                }

            } else {
                mensaje.innerHTML = `¡Casi lo logras <?php echo $this->session->userdata('usuario'); ?>!🌟 
                Esa no es la pareja correcta<br>
                ¡Sigue intentando, tú puedes! 💪 Solo te queda  ${movimientos} movimientos`;
                mensaje.className = "incorrecto";
                mensaje.scrollIntoView({
                    behavior: "smooth",
                    block: "end"
                });
                movimientosSalta();
                contadorIncorrectas++;
                console.log("incorrectos", contadorIncorrectas);

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

        function mostrarMensajeExitoIntentos() {
            const mensaje = document.createElement('div');
            mensaje.textContent = `Recomepensa acumulada ${estrellas}`;
            mensaje.innerHTML = `<b>¡Tu misión ha terminado! 🦖</b> <br> 
            ¡Muy cerca <?php echo $this->session->userdata('usuario'); ?>, usaste todos tus movimientos! ✏️ <br>
            Puedes seguir mejorando en tu próxima exploración 💪<br>
            🌟 Estrellas obtenidas: <strong>${estrellas}</strong><br> 
            💡 Parejas encontradas: <strong>${paresTotalesEncontrados}</strong><br>
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

        function mostrarMensajeExitoFinalizar() {

            // Crear el mensaje de éxito
            const mensaje = document.createElement('div');
            mensaje.textContent = `Recomepensa acumulada ${estrellas}`;
            mensaje.innerHTML = `<b>¡Fin de la misión! 🦖</b> <br> 
            ¡Haz finalizado la exploración, <?php echo $this->session->userdata('usuario'); ?>! ✏️ <br>
            En tu recorrido diste un gran paso, ¡cada intento te hace mejor! 💪<br>
            🌟 Estrellas obtenidas: <strong>${estrellas}</strong><br> 
            💡 Parejas encontradas: <strong>${paresTotalesEncontrados}</strong><br>
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
            En esta misión encontraste <b>todas las parejas</b>. <br>
            ¡Sigue así, lo estas haciendo genial!🎁¡Toma tu recompensa! <br>
            🌟 Estrellas ganadas: <strong>${estrellas}</strong> <br> 
            💡 Parejas encontradas: <strong>${paresTotalesEncontrados}</strong> <br>
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

        function reiniciarJuego() {
            estrellas = 0;
            contadorEstrellas.textContent = estrellas;
            clearInterval(temporizador);
            contadorIncorrectas = 0;
            minutos = 0;
            segundos = 0;
            mensaje.textContent = "";
            mensaje.className = "";
            paresTotalesEncontrados = 0;
            movimientosSobrantes = 0;
            nivel = 0;
            iniciarJuego();
            iniciarTemporizador();
            document.getElementById('reiniciarJuegoBtn').disabled = false;
            document.getElementById("finalizarJuegoBtn").disabled = false;
        }

        // Función para finalizar el juego
        function finalizarJuego() {
            clearInterval(temporizador);

            // Mostrar mensaje con resultado final
            const tiempoFinal = `${String(minutos).padStart(2, '0')}:${String(segundos).padStart(2, '0')}`;
            mostrarMensajeExitoFinalizar();

            // Deshabilitar las tarjetas al reemplazarlas por copias sin eventos
            const tarjetas = document.querySelectorAll('.tarjeta');
            tarjetas.forEach(tarjeta => {
                const tarjetaClon = tarjeta.cloneNode(true);
                tarjeta.parentNode.replaceChild(tarjetaClon, tarjeta);
            });
            document.getElementById('reiniciarJuegoBtn').disabled = true;
            document.getElementById("finalizarJuegoBtn").disabled = true;
            enviarEvaluacionMemorama();
            // Opcional: deshabilitar las cartas restantes
            // const tarjetas = document.querySelectorAll('.tarjeta');
            // tarjetas.forEach(tarjeta => tarjeta.removeEventListener('click', voltearTarjeta));
        }

        // Función para enviar el tiempo final por AJAX, datos a enviar al controlador (backend)
        function enviarEvaluacionMemorama() {
            var tiempo = `${String(minutos).padStart(2, '0')}:${String(segundos).padStart(2, '0')}`;
            $.ajax({
                url: '<?php echo base_url('letras/bosque_bambu/enviarEvaluacionMemorama'); ?>', // URfL de tu controlador
                type: 'POST',
                data: {
                    letra: 'b',
                    tiempoFinal: tiempo,
                    paresCorrectos: paresTotalesEncontrados,
                    intentosInocrrectos: contadorIncorrectas,
                    totalEstrellas: estrellas

                }, // Datos a enviar
                success: function(response) {
                    console.log('Tiempo enviado exitosamente:', response);
                },
                error: function(xhr, status, error) {
                    console.error('Error al enviar el tiempo:', error);
                }
            });
        }

        function enviarInicioEvaluacionMemorama() {
            var tiempo = `${String(minutos).padStart(2, '0')}:${String(segundos).padStart(2, '0')}`;
            $.ajax({
                url: '<?php echo base_url('letras/bosque_bambu/guardarRegistroMemorama'); ?>', // URfL de tu controlador
                type: 'POST',
                data: {
                    letra: 'b',
                    tiempoFinal: tiempo,
                    paresCorrectos: paresTotalesEncontrados,
                    intentosInocrrectos: contadorIncorrectas,
                    totalEstrellas: estrellas

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