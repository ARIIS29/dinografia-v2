<section class="mt-10">
    <div class="container-fluid d-flex justify-content-center" style="position: relative;">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-8 col-8 justify-content-center color-fondo texto_instrucciones_bambu" id="areaJuego">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="d-flex align-items-center">
                        <img id="dinoIndicaciones1" src="<?php echo base_url('almacenamiento/img/bosque_bambu/dino-indicaciones.png') ?>" alt="Img-Dino-Indicaciones" class="img-fluid me-3 d-none d-sm-block" style="cursor: pointer;" width="6%">

                        <p class="mb-0">¡Comencemos la exploración!<br></p>
                    </div>
                    <p>
                        Prepárate para esta emocionante misión: ¡Atrapa todas las hojas que aparezcan en la pantalla del bosque de bambú! <br>
                        <b> Cuando veas una hoja aparecer, presiona sobre ella rápidamente para atraparla.</b>
                        </button> <br>
                    </p>

                    <audio id="audioVista1" src="<?php echo base_url('almacenamiento/audios/audios_b/b_explorador_hojas.mp3') ?>" preload="auto"></audio>

                    <!-- Modal del tutorial -->
                    <div id="tutorialModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background-color:rgba(221, 247, 216, 0.8); justify-content:center; align-items:center; z-index:1000;">
                        <div style="position:relative; padding:10px; border-radius:10px; max-width:90%; width:600px;">
                            <video id="tutorialVideo" width="100%" controls>
                                <source src="<?php echo base_url('almacenamiento/img/bosque_bambu/tutorial_b/b_tutorial_explorador_hojas.mp4'); ?>" type="video/mp4">
                                Tu navegador no soporta el video.
                            </video>
                            <!-- <button id="cerrarTutorial" >Cerrar</button> -->
                            <button id="cerrarTutorial" type="button" class="btn btn-danger" style="position:absolute; top:10px; right:10px;">Cerrar</button>
                        </div>

                    </div>
                    <p>
                        ¡Exploremos juntos esta misión en el mágico bosque de bambú!<br>
                        Haz clic en el botón de <b>Iniciar</b> para comenzar la exploración.</p>
                    <div class="col-lg-12 col-md-12 col-12 text-center animated-button">
                        <a id="play-btn">
                            <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/btn-iniciar.png') ?>" alt="" class="img-fluid" width="20%">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-12 justify-content-center" id="contenedorJuego">
                <audio id="audioVista2" src="<?php echo base_url('almacenamiento/audios/audios_b/b_explorador_hojas_tractor.mp3') ?>" preload="auto"></audio>

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

                <div id="area" class="col-lg-8 col-md-8 col-8 justify-content-center area d-none">
                    <img id="hoja" src="<?php echo base_url('almacenamiento/img/bosque_bambu/hojab.png') ?>" alt="HojaB" class="hoja-img" width="8%" style="cursor: pointer;">
                </div>
                <div id="botonesContenedor" class="d-flex justify-content-center d-none">

                    <button id="reiniciarBtn" class="btn reiniciar me-2" title="Reiniciar Juego">
                        <i class="fas fa-redo"></i> Reiniciar Misión
                    </button>

                    <button id="finalizarBtn" class="btn finalizar me-2" title="Finalizar Juego">
                        <i class="fas fa-times"></i> Finalizar Misión
                    </button>
                </div>
            </div>
            <div>
                <p id="mensaje"></p>
            </div>

        </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const playBtn = document.getElementById('play-btn');
        const temporizadorElemento = document.getElementById('temporizador');

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
        if (!sessionStorage.getItem('audio1Reproducido_exploradorHojas')) {
            audio1.play().then(() => {
                sessionStorage.setItem('audio1Reproducido_exploradorHojas', 'true');
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

            document.getElementById('cerrarTutorial').addEventListener('click', function() {
                modal.style.display = 'none';
                video.pause();

                playBtn.style.display = 'none'; // Ocultar el botón después de hacer clic
                console.log("Juego mostrado"); // Agrega esta línea para depurar
                // Ocultar el área donde está el botón de inicio
                document.getElementById('areaJuego').style.display = 'none';
                // Mostrar el contenedor del juego
                document.getElementById('contenedorJuego').style.display = 'block'; // Cambié 'flex' por 'block' para asegurar visibilidad

                audio2.play().catch(error => {
                    console.log("Error al reproducir audio automáticamente:", error);
                });

                audioIndicacionesDos();
                enviarInicioEvaluacionExploradorHojasB();
                startAnimation();
            });

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
        document.getElementById('btnRegresar').addEventListener('click', function(event) {
            event.preventDefault();

            if (!audio1.paused) {
                audio1.pause();
                audio1.currentTime = 0;
            }

            window.location.href = this.href;
        });

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



        let hoja = document.getElementById('hoja');
        // let cuentaRegresiva = document.getElementById('cuentaRegresiva');

        document.getElementById('reiniciarBtn').addEventListener('click', reiniciarJuego);
        document.getElementById('finalizarBtn').addEventListener('click', finalizarJuego);


        let puntaje = 0;
        const metaPuntos = 10; // Número de hojas a atrapar
        let tiempoHoja = 1300;
        let intervaloJuego;
        let hojasAparecidas = 0;
        let temporizador;
        let minutos = 0;
        let segundos = 0;
        let estrellas = 0;
        let hojasNoAtrapadas = 0;
        let puntajeReal = 0;

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

        function posicionAleatoria() {
            let area = document.getElementById('area');
            let x = Math.random() * (area.offsetWidth - 50);
            let y = Math.random() * (area.offsetHeight - 50);
            return {
                x,
                y
            };
        }

        function movimientoHoja() {
            if (hojasAparecidas < metaPuntos) {
                let pos = posicionAleatoria();
                hoja.style.left = pos.x + 'px';
                hoja.style.top = pos.y + 'px';
                hoja.style.display = 'block';
                hojasAparecidas++;
                console.log('hojas apa: ', hojasAparecidas);
                console.log('puntaje: ', puntaje);

                setTimeout(() => {
                    if (hoja.style.display === 'block') {
                        // El usuario no hizo clic
                        hoja.style.display = 'none';

                        movimientosSalta();

                    }
                }, tiempoHoja);

            } else {
                finalizarJuego();

            }
        }
        hoja.addEventListener('click', () => {
            puntaje++;
            contadorPuntos.textContent = puntaje;
            estrellaSalta();
            hoja.style.display = 'none';
            estrellas += 100;
            contadorEstrellas.textContent = estrellas;
            console.log('puntajes real: ', puntaje);
            hojasNoAtrapadas = metaPuntos - puntaje;
            console.log('hojasNoAtrapadas: ', hojasNoAtrapadas);
            enviarEvaluacionExploradorHojasB();


        });

        function iniciarJuego() {
            document.getElementById('botonesContenedor').classList.remove('d-none');
            document.getElementById('area').classList.remove('d-none');
            puntaje = 0;
            hojasAparecidas = 0; // Reiniciar el contador de hojas
            hojasNoAtrapadas = 0;
            // barraProgreso.value = 0;
            clearInterval(intervaloJuego);
            intervaloJuego = setInterval(movimientoHoja, tiempoHoja + 500);

        }

        function mostrarMensajeExitoFinalizar() {

            // Crear el mensaje de éxito
            const mensaje = document.createElement('div');
            mensaje.textContent = `Recomepensa acumulada ${estrellas}`;
            mensaje.innerHTML = `<b>¡Fin de la misión! 🦖</b> <br> 
            ¡Haz finalizado la exploración, <?php echo $this->session->userdata('usuario'); ?>! ✏️ <br>
            En tu exploración diste un gran paso, ¡cada intento te hace mejor! 💪<br>
            🌟 Estrellas obtenidas: <strong>${estrellas}</strong><br> 
            🍃 Hojas atrapadas: <strong>${puntaje}</strong><br>
            ⏰ Tiempo: <strong>${String(minutos).padStart(2, '0')}:${String(segundos).padStart(2, '0')}</strong> <br>
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
            En esta misión atrapaste <b>todas las hojas</b>. <br>
            ¡Sigue así, lo estas haciendo genial!🎁¡Toma tu recompensa! <br>
            🌟 Estrellas ganadas: <strong>${estrellas}</strong> <br> 
            🍃 Hojas atrapadas: <strong>${puntaje}</strong> <br>
            ⏰ Tiempo: <strong>${String(minutos).padStart(2, '0')}:${String(segundos).padStart(2, '0')}</strong><br>
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

        function finalizarJuego() {
            clearInterval(temporizador);
            clearInterval(intervaloJuego);
            const mensaje = document.getElementById('mensaje');
            if (hojasAparecidas < metaPuntos) {
                mostrarMensajeExitoFinalizar()


            } else {
                setTimeout(() => {
                    mostrarConfeti();
                    mostrarMensajeExitoFelicidades();

                }, 1500);
                mostrarEstrellasCentrales();
            }

            mensaje.scrollIntoView({
                behavior: "smooth",
                block: "end"
            });
            document.getElementById("finalizarBtn").disabled = true;
            document.getElementById("reiniciarBtn").disabled = true;

            enviarEvaluacionExploradorHojasB();
        }


        function reiniciarJuego() {
            // contadorPuntos.textContent = puntaje;
            const mensaje = document.getElementById('mensaje');
            mensaje.textContent = '';
            clearInterval(temporizador);
            temporizadorElemento.textContent = "00:00";
            estrellas = 0;
            contadorEstrellas.textContent = estrellas;
            minutos = 0;
            segundos = 0;
            puntaje = 0;
            contadorPuntos.textContent = puntaje;
            tiempoHoja = 1500;
            hojasAparecidas = 0;
            hojasNoAtrapadas = 0;
            document.getElementById("finalizarBtn").disabled = false;
            document.getElementById('reiniciarBtn').disabled = false;


            iniciarJuego();
            iniciarTemporizador();
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
            const estrella = document.querySelector('img[src*="hojab.png"]');

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


        // Función para enviar el tiempo final por AJAX, datos a enviar al controlador (backend)
        function enviarEvaluacionExploradorHojasB() {
            var tiempo = `${String(minutos).padStart(2, '0')}:${String(segundos).padStart(2, '0')}`;
            $.ajax({
                url: '<?php echo base_url('letras/bosque_bambu/enviarEvaluacionExploradorHojasB'); ?>', // URL de tu controlador
                type: 'POST',
                data: {
                    letra: 'b',
                    tiempoFinal: tiempo,
                    hojasAtrapadas: puntaje,
                    hojasIncorrectas: hojasNoAtrapadas,
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


        function enviarInicioEvaluacionExploradorHojasB() {
            var tiempo = `${String(minutos).padStart(2, '0')}:${String(segundos).padStart(2, '0')}`;

            $.ajax({
                url: '<?php echo base_url('letras/bosque_bambu/guardarRegistroEvaluacionExploradorHojasB'); ?>', // URL de tu controlador
                // URL de tu controlador
                type: 'POST',
                data: {
                    letra: 'b',
                    tiempoFinal: tiempo,
                    hojasAtrapadas: puntaje,
                    hojasIncorrectas: hojasNoAtrapadas,
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