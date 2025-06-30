<!-- Sección que contiene el contenido principal -->
<!-- Modal con video tutorial -->
<div class="modal fade" id="modalInstrucciones" tabindex="-1" aria-labelledby="modalInstruccionesLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered texto_indicaciones_modal ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalInstruccionesLabel">
                    <img id="dinoModal" src="<?php echo base_url('almacenamiento/img/desierto/dino-indicaciones.png') ?>" alt="Img-Dino-Indicaciones" class="img-fluid me-3" width="8%">
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
                        <source src="<?php echo base_url('almacenamiento/img/desierto/tutorial_b/b_tutorial_letrab.mp4'); ?>" type="video/mp4">
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
        #canvas-grafismo {
            width: 800px;
            height: 400px;
            border: 2px solid #E97132;
            display: block;
            margin: auto;
            background-color: white;
        }

        .imagen-previa {
            width: 100%;
            cursor: pointer;
            margin: 5px;
            border: 2px solid transparent;
        }

        .imagen-previa.selected {
            border-color: blue;
        }
    </style>
    <div class="container text-center">
        <div class="col-lg-6 col-md-6 justify-aling-center text-center titulo-con-luz d-block d-sm-none mt-5">
            <h1 class="titulo-h1-desierto-movil">GRAFISMO</h1>
        </div>
        <div class="col-lg-12 col-md-12 d-flex align-items-center">
            <img id="dinoIndicaciones" src="<?php echo base_url('almacenamiento/img/desierto/dino-indicaciones.png') ?>" alt="Img-Dino-Indicaciones" class="img-fluid me-3 d-none d-sm-block" style="cursor: pointer;" width="6%">
            <audio id="dinoIndicacionesAudio" src="<?php echo base_url('almacenamiento/audios/audio_trazos_arena_indicaciones.mp3') ?>" preload="auto"></audio>
            <p class="texto_indicaciones_desierto mb-0">Usa tu dedo para trazar la letra "b" en la arena. ¡Diviértete practicando!</p>
            <div class="col-1 d-none d-sm-block">
                <a href="<?php echo base_url('galeria/galeriag') ?>">
                    <img src="<?php echo base_url('almacenamiento/img/desierto/btn-galeriag.png') ?>" alt="" class="img-fluid enlargable ms-3" width="80%">
                </a>
            </div>
            <audio id="audioEstrellas" src="<?php echo base_url('almacenamiento/audios/efecto_sonido_estrella.mp3') ?>" preload="auto"></audio>
        </div>


        <div class="col-lg-8 text-center">
            <input type="color" id="color" value="#A1420F" title="Gama de colores">
            <input type="range" id="grosor" min="5" max="15" value="1" title="Grosor de la línea">
            <!-- <button id="lapiz" type="button">Lápiz</button>
        <button id="limpiar">Limpiar</button>
        <button id="guardar">Guardar</button> -->
            <button id="lapiz" type="button" class="btn btn-lapiz-inactive" title="Usar lapiz para dibujar"><i class="fas fa-pencil-alt"></i> Usar Lápiz</button>
            <button id="limpiar" class="btn btn-limpiar-inactive" title="Limpiar toda la pizarra"><i class="fas fa-trash-alt"></i> Limpiar Pizarra</button>
            <button id="guardar" class="btn btn-guardar-inactive" title="Guardar mi trazo"><i class="fas fa-camera"></i> Guardar Trazo</button>
        </div>

        <div class="row">
            <div class="col-lg-10">
                <canvas id="canvas-grafismo"></canvas>
            </div>
            <div id="imagenContainer" class="col-lg-2">
                <div class="row">
                    <div class="col-lg-8">
                        <img src="<?php echo base_url('almacenamiento/img/desierto/act_letra_d.png'); ?>" class="imagen-previa" data-src="<?php echo base_url('almacenamiento/img/desierto/act_letra_d.png'); ?>">
                    </div>
                    <div class="col-lg-8">

                        <img src="<?php echo base_url('almacenamiento/img/desierto/act_entre_curvas.png'); ?>" class="imagen-previa" data-src="<?php echo base_url('almacenamiento/img/desierto/act_entre_curvas.png'); ?>">
                    </div>
                    <div class="col-lg-8">
                        <img src="<?php echo base_url('almacenamiento/img/desierto/act_que_tiene_el_dino.png'); ?>" class="imagen-previa" data-src="<?php echo base_url('almacenamiento/img/desierto/act_que_tiene_el_dino.png'); ?>">

                    </div>
                    <div class="col-lg-8">
                        <img src="<?php echo base_url('almacenamiento/img/desierto/act_que_letra_falta.png'); ?>" class="imagen-previa" data-src="<?php echo base_url('almacenamiento/img/desierto/act_que_letra_falta.png'); ?>">

                    </div>
                    <div class="col-lg-8">

                        <img src="<?php echo base_url('almacenamiento/img/desierto/act_recuerda_el_animal.png'); ?>" class="imagen-previa" data-src="<?php echo base_url('almacenamiento/img/desierto/act_recuerda_el_animal.png'); ?>">
                    </div>


                </div>
            </div>


        </div>

        <br>



    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const canvas = document.getElementById('canvas-grafismo');
        const ctx = canvas.getContext('2d');
        const imagenes = document.querySelectorAll('.imagen-previa');
        const colorPicker = document.getElementById('color');
        const controlGrosor = document.getElementById('grosor');
        const botonLimpiar = document.getElementById('limpiar');
        const botonLapiz = document.getElementById('lapiz');
        const botonGuardar = document.getElementById('guardar');

        let trazoRealizado = false;
        let dibujando = false;
        let usarLapiz = false;
        let estrellas = 0;
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

        botonGuardar.style.display = "none";

        function ajustarCanvas() {
            canvas.width = 800;
            canvas.height = 400;
        }
        ajustarCanvas();


        function cargarImagen(src) {
            const img = new Image();
            img.src = src;
            img.onload = () => {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
            };
        }

        imagenes.forEach(img => {
            img.addEventListener('click', () => {
                imagenes.forEach(img => img.classList.remove('selected'));
                img.classList.add('selected');
                cargarImagen(img.dataset.src);
            });
        });

        canvas.addEventListener('mousedown', (event) => {
            if (usarLapiz) {
                dibujando = true;
                ctx.beginPath();
                ctx.moveTo(event.offsetX, event.offsetY);
            }
        });

        canvas.addEventListener('mouseup', () => dibujando = false);
        canvas.addEventListener('mousemove', (event) => {
            if (dibujando) {
                ctx.lineWidth = controlGrosor.value;
                ctx.strokeStyle = colorPicker.value;
                ctx.lineJoin = 'round';
                ctx.lineCap = 'round';
                ctx.lineTo(event.offsetX, event.offsetY);
                ctx.stroke();
                ctx.beginPath();
                ctx.moveTo(event.offsetX, event.offsetY);
                trazoRealizado = true; // Indica que se ha dibujado algo
                mostrarBotonGuardar();
            }
        });

        function comenzarDibujo(x, y) {
            if (usarLapiz) {
                dibujando = true;
                ctx.beginPath();
                ctx.moveTo(x, y);
            }
        }

        function dibujar(x, y) {
            if (dibujando) {
                ctx.lineWidth = controlGrosor.value;
                ctx.strokeStyle = colorPicker.value;
                ctx.lineJoin = 'round';
                ctx.lineCap = 'round';
                ctx.lineTo(x, y);
                ctx.stroke();
                ctx.beginPath();
                ctx.moveTo(x, y);
                trazoRealizado = true; // Indica que se ha dibujado algo
                mostrarBotonGuardar();
            }
        }

        function detenerDibujo() {
            dibujando = false;
            ctx.beginPath();
        }

        // Eventos para mouse
        canvas.addEventListener('mousedown', (event) => comenzarDibujo(event.offsetX, event.offsetY));
        canvas.addEventListener('mousemove', (event) => dibujar(event.offsetX, event.offsetY));
        canvas.addEventListener('mouseup', detenerDibujo);
        canvas.addEventListener('mouseleave', detenerDibujo);

        // Eventos para dispositivos táctiles
        canvas.addEventListener('touchstart', (event) => {
            const touch = event.touches[0];
            const rect = canvas.getBoundingClientRect();
            comenzarDibujo(touch.clientX - rect.left, touch.clientY - rect.top);
        });

        canvas.addEventListener('touchmove', (event) => {
            event.preventDefault();
            const touch = event.touches[0];
            const rect = canvas.getBoundingClientRect();
            dibujar(touch.clientX - rect.left, touch.clientY - rect.top);
        });

        canvas.addEventListener('touchend', detenerDibujo);

        function mostrarBotonGuardar() {
            if (trazoRealizado) {
                botonGuardar.style.display = "inline-block";
            }
        }

        botonLimpiar.addEventListener('click', () => {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            trazoRealizado = false; // Indica que el canvas está vacío
            botonGuardar.style.display = "none"; // Oculta el botón de guardar
            const imagenSeleccionada = document.querySelector('.imagen-previa.selected');
            if (imagenSeleccionada) cargarImagen(imagenSeleccionada.dataset.src);
        });

        botonLapiz.addEventListener('click', () => {
            usarLapiz = !usarLapiz;
            actualizarBotonLapiz();
        });

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

        botonGuardar.addEventListener('click', () => {

            const baseUrl = '<?php echo base_url(); ?>';

            const tempCanvas = document.createElement('canvas');
            const tempCtx = tempCanvas.getContext('2d');
            estrellas += 25;
            contadorEstrellas.textContent = estrellas;
            console.log("Estrellas ", estrellas);

            tempCanvas.width = canvas.width;
            tempCanvas.height = canvas.height;

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

            fetch(baseUrl + 'letras/desierto/guardarImagenGrafismoB', {
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
            mensaje.innerHTML = `¡Increíble trabajo, <?php echo $this->session->userdata('usuario'); ?>!🎉<br>
            Tu trazo se ha guardado con éxito en la Galería Grafismo d.<br>
            ¡Sigue explorando! 🦖<br> Recompensa acumulada: <strong>${estrellas}</strong> estrellas 🌟`;
            mensaje.style.color = '#704004';
            mensaje.style.fontFamily = '"Century Gothic", sans-serif';
            mensaje.style.fontWeight = 'bold';
            mensaje.style.position = 'absolute';
            mensaje.style.top = '50px'; // Posición en la pantalla
            mensaje.style.left = '50%'; // Centrar horizontalmente
            mensaje.style.transform = 'translateX(-50%)'; // Centrar correctamente
            mensaje.style.backgroundColor = '#F1CCB0';
            mensaje.style.border = '5px solid #E97132';
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
                window.location.href = '<?php echo base_url('letras/desierto'); ?>'; // Cambiar la URL del menú principal
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
    });
</script>