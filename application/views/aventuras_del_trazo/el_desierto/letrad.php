<!-- Modal con video tutorial -->
<div class="modal fade" id="modalInstrucciones" tabindex="-1" aria-labelledby="modalInstruccionesLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered texto_indicaciones_modal ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalInstruccionesLabel">
                    <img id="dinoModal" src="<?php echo base_url('almacenamiento/img/bosque_bambu/dino-indicaciones.png') ?>" alt="Img-Dino-Indicaciones" class="img-fluid me-3" width="8%">
                    <audio id="dinoModalAudio" src="<?php echo base_url('almacenamiento/audios/audios_b/b_letrab.mp3') ?>" preload="auto"></audio>

                    <b>¡Hola Explorador!</b>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <p class="mb-3">
                    En esta aventura aprenderemos a trazar la letra "b". Mira este video para aprender cómo utilizar la pizarra.
                </p>
                <div class="ratio ratio-16x9">
                    <video id="tutorialVideo" controls>
                        <source src="<?php echo base_url('almacenamiento/img/bosque_bambu/tutorial_b/b_tutorial_letrab.mp4'); ?>" type="video/mp4">
                        Tu navegador no soporta el video.
                    </video>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<section class="d-flex justify-content-center align-items-center mt-8">
    <style>
        #canvas {
            position: relative;
            z-index: 1;
            /* Asegura que el lienzo esté delante de la imagen de fondo */
            width: 100%;
            height: 300px;
            /* Altura fija igual a la de la imagen de fondo */
        }
    </style>
    <div class="container">
        <div class="col-lg-6 col-md-6 justify-aling-center text-center titulo-con-luz d-block d-sm-none mt-5">
            <h1 class="titulo-h1-bambu-movil">LETRA - B</h1>
            <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/estrella.png') ?>" alt="" class="img-fluid ms-5" width="15%">
            <span class="texto_indicaciones_bambu ms-2" id="estrellas">0</span>

        </div>
        <div class="col-lg-12 col-md-12 d-flex align-items-center">
            <!-- Imagen -->
            <img id="dinoIndicaciones" src="<?php echo base_url('almacenamiento/img/bosque_bambu/dino-indicaciones.png') ?>" alt="Img-Dino-Indicaciones" class="img-fluid me-3 d-none d-sm-block" style="cursor: pointer;" width="6%">
            <!-- Texto -->
            <audio id="dinoIndicacionesAudio" src="<?php echo base_url('almacenamiento/audios/audios_b/audio_traza_letrab_indicaciones.mp3') ?>" preload="auto"></audio>
            <div class="d-none d-md-block">
                <p class="texto_indicaciones_bambu mb-0">¡Da clic en el botón del lápiz, sigue mis instrucciones y traza la letra "b" en la pizarra! </p>
            </div>
            <div class="d-block d-md-none">
                <p class="texto_indicaciones_bambu mb-0 mt-5">¡Da clic en el botón del lápiz, sigue mis instrucciones y traza la letra "b" en la pizarra! </p>
            </div>
            <div class="col-1 d-none d-sm-block">
                <a href="<?php echo base_url('galeria/galeriab') ?>">
                    <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/btn-galeriab.png') ?>" alt="" class="img-fluid enlargable ms-3" width="80%">
                </a>
            </div>

        </div>
        <div class="row mt-3">
            <!-- Columna para el video -->
            <div class="col-lg-6 col-md-6 col-12">
                <!-- Elemento de video con controles -->
                <video id="video" controls>
                    <source src="<?php echo base_url('almacenamiento/img/bosque_bambu/letrab-escritura.mp4'); ?>" type="video/mp4">
                </video>
            </div>
            <!-- Columna para la imagen de fondo y el canvas -->
            <div class="col-lg-6 col-md-6 col-12" style="position: relative;">
                <!-- Imagen de fondo -->
                <img id="fondo-letra" src="<?php echo base_url('almacenamiento/img/bosque_bambu/letra-b.png'); ?>" alt="Background Image" style="display: block;" class="img-fluid">
                <!-- Canvas para dibujar -->
                <canvas id="canvas"></canvas>
                <audio id="audioEstrellas" src="<?php echo base_url('almacenamiento/audios/efecto_sonido_estrella.mp3') ?>" preload="auto"></audio>
                <br>
                <!-- Selector de color -->
                <button id="botonColor" class="btn btn-color-inactive" title="Seleccionar color del lápiz">
                    <i class="fas fa-palette"></i>
                </button>
                <!-- Input de color oculto -->
                <input type="color" id="color" value="#007300" style="display: none;" title="Cambiar color del lápiz">
                <!-- Botón para usar el lápiz -->
                <button id="lapiz" type="button" class="btn btn-lapiz-inactive" title="Usar lapiz para dibujar"><i class="fas fa-pencil-alt"></i> Usar Lápiz</button>
                <!-- Botón para limpiar el canvas -->
                <button id="limpiar" class="btn btn-limpiar-inactive" title="Limpiar toda la pizarra"><i class="fas fa-trash-alt"></i> Limpiar Pizarra</button>
                <button id="guardar" class="btn btn-guardar-inactive" title="Guardar mi trazo"><i class="fas fa-camera"></i> Guardar Trazo</button>

            </div>
        </div>
    </div>
</section>

<!-- Script que maneja la funcionalidad del canvas y los botones -->
<script>
    // Función que se ejecuta cuando el contenido del DOM se ha cargado
    document.addEventListener("DOMContentLoaded", () => {
        const canvas = document.getElementById('canvas');
        const ctx = canvas.getContext('2d');
        let dibujando = false; // Variable para rastrear si se está dibujando
        let usarLapiz = false; // Variable para rastrear si se está usando el lápiz
        let trazoRealizado = false;
        let estrellas = 0;
        const contadorEstrellas = document.getElementById('contadorEstrellas');
        const botonLimpiar = document.getElementById('limpiar'); // Botón de limpiar canvas
        const botonLapiz = document.getElementById('lapiz'); // Botón del lápiz
        const botonGuardar = document.getElementById('guardar'); // Botón de guardar el dibujo
        const fondo = document.getElementById('fondo-letra'); // Imagen de fondo
        const botonColor = document.getElementById('botonColor'); // Botón de color
        const inputColor = document.getElementById('color'); // Input de color oculto
        const grosorFijo = 15;
        botonGuardar.style.display = "none";
        const modalEl = document.getElementById('modalInstrucciones');
        const video = document.getElementById('tutorialVideo');
        const dinoModal = document.getElementById('dinoModal');
        const dinoModalAudio = document.getElementById('dinoModalAudio');
        const modal = new bootstrap.Modal(document.getElementById('modalInstrucciones'));
        const audioEstrellas = document.getElementById('audioEstrellas');



        // Elementos de la imagen con audio fuera del modal
        const dinoIndicaciones = document.getElementById('dinoIndicaciones');
        const dinoIndicacionesAudio = document.getElementById('dinoIndicacionesAudio');


        // Mostrar el modal al cargar la página
        modal.show();

        modalEl.addEventListener('shown.bs.modal', function() {
            if (dinoModalAudio) {
                dinoModalAudio.play().catch(error => {
                    console.log("Error al reproducir el audio automáticamente:", error);
                });
            }
            if (dinoModal) {
                dinoModal.classList.add('dino-hablando');
            }
        });

        modalEl.addEventListener('hidden.bs.modal', function() {
            // Detener video
            if (video) {
                video.pause();
                video.currentTime = 0;
            }

            // Detener audio del modal
            if (dinoModalAudio) {
                dinoModalAudio.pause();
                dinoModalAudio.currentTime = 0;
            }

            if (dinoModal) {
                dinoModal.classList.remove('dino-hablando');
            }

            // Retrasar la reproducción de dinoIndicacionesAudio para evitar bloqueo
            setTimeout(() => {
                if (dinoIndicacionesAudio) {
                    dinoIndicacionesAudio.play().catch(error => {
                        console.log("⚠️ No se pudo reproducir dinoIndicacionesAudio automáticamente:", error);
                    });
                }
            }, 500); // 500 ms de espera antes de reproducir
        });


        // Manejo del clic en el dino dentro del modal
        if (dinoModal && dinoModalAudio) {
            dinoModal.addEventListener('click', function() {
                if (dinoModalAudio.paused) {
                    dinoModal.classList.add('dino-hablando');
                    dinoModalAudio.play().catch(error => console.log("Error al reproducir el audio:", error));
                } else {
                    dinoModal.classList.remove('dino-hablando');
                    dinoModalAudio.pause();
                    dinoModalAudio.currentTime = 0;
                }
            });
        }

        // Al hacer clic en el botón de color, simular el clic en el input de color
        botonColor.addEventListener('click', () => {
            inputColor.click(); // Simula el clic en el input de color
        });

        // Al cambiar el color en el input, actualiza el color del lápiz
        inputColor.addEventListener('input', () => {
            ctx.strokeStyle = inputColor.value; // Cambia el color del lápiz
        });


        // Función para ajustar el tamaño del canvas al tamaño del contenedor
        function adjustCanvasSize() {
            canvas.width = canvas.offsetWidth;
            canvas.height = 300;
            fondo.style.width = `${canvas.width}px`;
            fondo.style.height = `${canvas.height}px`;
        }

        adjustCanvasSize();

        canvas.addEventListener('mousedown', (event) => {
            if (usarLapiz) {
                dibujando = true;
                ctx.beginPath();
                ctx.moveTo(event.offsetX, event.offsetY);
            }
        });

        canvas.addEventListener('mouseup', () => {
            dibujando = false;
            ctx.beginPath(); // Finaliza el trazo
        });

        canvas.addEventListener('mousemove', (event) => {
            if (dibujando) {
                draw(event.offsetX, event.offsetY);
                trazoRealizado = true; // Indica que se ha dibujado algo
                mostrarBotonGuardar();
            }
        });

        // Función para mostrar el botón de guardar si hay trazos en el canvas
        function mostrarBotonGuardar() {
            if (trazoRealizado) {
                botonGuardar.style.display = "inline-block";
            }
        }

        // Eventos del canvas para dibujar con el tacto (pantallas táctiles)
        canvas.addEventListener('touchstart', (event) => {
            if (usarLapiz) {
                dibujando = true;
                const touch = event.touches[0];
                ctx.beginPath();
                ctx.moveTo(touch.clientX - canvas.getBoundingClientRect().left, touch.clientY - canvas.getBoundingClientRect().top);
            }
        });

        canvas.addEventListener('touchend', () => {
            dibujando = false;
            ctx.beginPath();
        });

        canvas.addEventListener('touchmove', (event) => {
            event.preventDefault();
            if (dibujando) {
                const touch = event.touches[0];
                draw(touch.clientX - canvas.getBoundingClientRect().left, touch.clientY - canvas.getBoundingClientRect().top);
                trazoRealizado = true; // Indica que se ha dibujado algo
                mostrarBotonGuardar();
            }
        });

        botonLimpiar.addEventListener('click', () => {
            ctx.clearRect(0, 0, canvas.width, canvas.height); // Limpia todo el canvas
            trazoRealizado = false; // Indica que el canvas está vacío
            botonGuardar.style.display = "none"; // Oculta el botón de guardar
            actualizarBotonLimpiar();
        });

        botonLapiz.addEventListener('click', () => {
            usarLapiz = !usarLapiz; // Alterna el uso del lápiz
            actualizarBotonLapiz();
        });

        // Añadir evento al botón de guardar
        botonGuardar.addEventListener('click', () => {
            const imagenFondo = new Image();
            imagenFondo.src = fondo.src;
            estrellas += 25;
            contadorEstrellas.textContent = estrellas;
            console.log("Estrellas ", estrellas);
            imagenFondo.onload = () => {
                const baseUrl = '<?php echo base_url(); ?>';

                const tempCanvas = document.createElement('canvas');
                const tempCtx = tempCanvas.getContext('2d');

                tempCanvas.width = canvas.width;
                tempCanvas.height = canvas.height;

                // Dibuja la imagen de fondo y el contenido del canvas
                tempCtx.drawImage(imagenFondo, 0, 0, canvas.width, canvas.height);
                tempCtx.drawImage(canvas, 0, 0);

                // Convierte la imagen a Base64
                const imagenBase64 = tempCanvas.toDataURL('image/png');

                // Crear un FormData para enviar la imagen correctamente
                const formData = new FormData();
                formData.append('imagen', imagenBase64);
                formData.append('puntaje', estrellas);
                document.getElementById("lapiz").disabled = true;
                document.getElementById("limpiar").disabled = true;
                document.getElementById("guardar").disabled = true;

                estrellaSalta();
                mostrarEstrellasCentrales();


                fetch(baseUrl + 'letras/bosque_bambu/guardarImagen', {
                        method: 'POST',
                        body: formData // Enviando el FormData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            console.log('Imagen guardada con éxito:', data);
                            mostrarMensajeExito(); // Mostrar mensaje de éxito
                            actualizarBotonGuardar(); // Actualiza el estado del botón
                        } else {
                            console.error('Error:', data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Error al guardar la imagen:', error);
                    });
            };

            imagenFondo.onerror = () => {
                console.error('Error al cargar la imagen de fondo');
            };
        });

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


        function mostrarMensajeExito() {
            // Crear el mensaje de éxito
            const mensaje = document.createElement('div');
            mensaje.textContent = `Recomepensa acumulada ${estrellas}`;
            mensaje.innerHTML = `¡Increíble trabajo,  <?php echo $this->session->userdata('usuario'); ?>!🎉<br>
            Tu trazo se ha guardado con éxito en la galería B.<br>
            ¡Sigue explorando! 🦖<br> Recompensa acumulada: <strong>${estrellas}</strong> estrellas 🌟`;
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
                document.getElementById("lapiz").disabled = false;
                document.getElementById("limpiar").disabled = false;
                document.getElementById("guardar").disabled = false;
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


        // Función para actualizar la apariencia del botón de guardar
        function actualizarBotonGuardar() {
            botonGuardar.classList.toggle('btn-guardar-active');
            // Agregar la clase de parpadeo
            botonGuardar.classList.add('boton-parpadeo');

            // Remover la clase de parpadeo después de 0.5 segundos (duración del parpadeo)
            setTimeout(function() {
                botonGuardar.classList.remove('boton-parpadeo');
            }, 500); // Tiempo en milisegundos
        }

        // Función para dibujar en el canvas
        function draw(x, y) {
            ctx.lineWidth = grosorFijo; // Establece el grosor fijo de la línea
            ctx.lineCap = 'round'; // Establece el estilo de la terminación de la línea

            if (usarLapiz) {
                ctx.globalCompositeOperation = 'source-over'; // Usa el lápiz (dibuja)
                ctx.strokeStyle = inputColor.value; // Establece el color de la línea
            }

            ctx.lineTo(x, y); // Dibuja una línea hacia la nueva posición
            ctx.stroke(); // Realiza el trazo
            ctx.beginPath(); // Comienza un nuevo trazo
            ctx.moveTo(x, y); // Mueve el punto inicial a la nueva posición
        }

        // Evento para detener el dibujo cuando el ratón sale del canvas
        canvas.addEventListener('mouseleave', () => {
            dibujando = false;
            ctx.beginPath(); // Resetea el camino
        });

        // Ajusta el tamaño del canvas cuando se redimensiona la ventana
        window.addEventListener('resize', adjustCanvasSize);

        // Función para actualizar la apariencia del botón de limpiar
        function actualizarBotonLimpiar() {
            botonLimpiar.classList.toggle('btn-limpiar-active');
            // Agregar la clase de parpadeo
            botonLimpiar.classList.add('boton-parpadeo');

            // Remover la clase de parpadeo después de 0.5 segundos (duración del parpadeo)
            setTimeout(function() {
                botonLimpiar.classList.remove('boton-parpadeo');
            }, 500); // Tiempo en milisegundos
        }

        // Función para actualizar la apariencia del botón de lápiz
        function actualizarBotonLapiz() {
            if (usarLapiz) {
                botonLapiz.classList.remove('btn-lapiz-inactive');
                botonLapiz.classList.add('btn-lapiz-active');
                canvas.classList.add('cursor-lapiz');
            } else {
                botonLapiz.classList.remove('btn-lapiz-active');
                botonLapiz.classList.add('btn-lapiz-inactive');
                canvas.classList.remove('cursor-lapiz');
            }
        }

    });
</script>