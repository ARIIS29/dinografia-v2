<!-- Sección que contiene el contenido principal -->
<div class="modal fade" id="modalInstrucciones" tabindex="-1" aria-labelledby="modalInstruccionesLabel" aria-hidden="true">
    <div class="modal-dialog  texto-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="videoModalLabel">
                    <img id="dinoModal" src="<?php echo base_url('almacenamiento/img/bosque_bambu/dino-indicaciones.png') ?>" alt="Img-Dino-Indicaciones" class="img-fluid dino-hablando me-3" width="8%"><b>¡Hola Explorador!</b>
                    <audio id="dinoModalAudio" src="<?php echo base_url('almacenamiento/audios/audio_trazos_arena.mp3') ?>" preload="auto"></audio>
                </h5>
            </div>
            <div class="modal-body texto-modal-bambu">
                <p>
                    En esta misión trazaremos en la arena la letra ‘b’. Usa tu dedo o lápiz digital para formar la letra ‘b’ a tu manera. <br>Experimenta, crea y diviértete realizando todos los trazos que quieras.
                <ul>
                    <li>Para borrar todo y realizar un nuevo trazo, da clic en el botón
                        <button class="btn-limpiar-desact" title="Limpiar toda la pizarra" disabled>
                            <i class="fas fa-trash-alt"></i> Limpiar Arena
                        </button>
                    </li>
                    <li>Para guardar tus trazos en la Galería de Trazos en la Arena, da clic en el botón
                        <button class="btn-guardar-desact" title="Guardar mi trazo" disabled>
                            <i class="fas fa-camera"></i> Guardar Trazo.
                        </button> Si no lo haces, tus trazos no se guardarán.

                    </li>
                </ul>
                ¡Haz tantos trazos como quieras! Guarda los que más te gusten. <br>
                ¡Vamos a trazar y aprender! ¡Lo harás genial!
                </p>

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
            border: 1px solid #000;
            display: block;
            margin: auto;
        }

        .imagen-previa {
            width: 100px;
            height: auto;
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
            <h1 class="titulo-h1-bambu-movil">GRAFISMO</h1>
        </div>
        <div class="col-lg-12 col-md-12 d-flex align-items-center">
            <img id="dinoIndicaciones" src="<?php echo base_url('almacenamiento/img/bosque_bambu/dino-indicaciones.png') ?>" alt="Img-Dino-Indicaciones" class="img-fluid me-3 d-none d-sm-block" style="cursor: pointer;" width="6%">
            <audio id="dinoIndicacionesAudio" src="<?php echo base_url('almacenamiento/audios/audio_trazos_arena_indicaciones.mp3') ?>" preload="auto"></audio>
            <p class="texto_indicaciones_bambu mb-0">Usa tu dedo para trazar la letra "b" en la arena. ¡Diviértete practicando!</p>
            <div class="col-1 d-none d-sm-block">
                <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/btn-galeriat.png') ?>" alt="" class="img-fluid enlargable ms-3" width="80%">
            </div>
            <audio id="audioEstrellas" src="<?php echo base_url('almacenamiento/audios/efecto_sonido_estrella.mp3') ?>" preload="auto"></audio>
        </div>


        <div class="col-lg-8 text-center">
            <input type="color" id="color" value="#00A249" title="Gama de colores">
            <input type="range" id="grosor" min="8" max="15" value="1" title="Grosor de la línea">
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
                        <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/letra-b.png'); ?>" class="imagen-previa" data-src="<?php echo base_url('almacenamiento/img/bosque_bambu/letra-b.png'); ?>">
                    </div>
                    <div class="col-lg-8">
                        <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/ejemplo.jpg'); ?>" class="imagen-previa" data-src="<?php echo base_url('almacenamiento/img/bosque_bambu/ejemplo.jpg'); ?>">

                    </div>
                    <div class="col-lg-8">

                        <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/ejer.jpg'); ?>" class="imagen-previa" data-src="<?php echo base_url('almacenamiento/img/bosque_bambu/ejer.jpg'); ?>">
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
        const dinoModal = document.getElementById('dinoModal');
        const dinoModalAudio = document.getElementById('dinoModalAudio');
        const modal = new bootstrap.Modal(document.getElementById('modalInstrucciones'));
        const audioEstrellas = document.getElementById('audioEstrellas');
        const dinoIndicaciones = document.getElementById('dinoIndicaciones');
        const dinoIndicacionesAudio = document.getElementById('dinoIndicacionesAudio');

        let trazoRealizado = false;
        let dibujando = false;
        let usarLapiz = false;
        let estrellas = 0;
        // Mostrar el modal al cargar la página
        modal.show();

        // Iniciar animación y audio cuando el modal se abre
        document.getElementById('modalInstrucciones').addEventListener('shown.bs.modal', function() {
            dinoModal.classList.add('dino-hablando');
            dinoModalAudio.play().catch(error => console.log("Error al reproducir el audio:", error));
        });

        // Detener animación cuando termine el audio
        dinoModalAudio.addEventListener('ended', function() {
            dinoModal.classList.remove('dino-hablando');
        });

        // Manejo del clic en Dino dentro del modal para repetir el audio
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

        // Detener el audio y la animación cuando se cierra el modal, y luego reproducir dinoIndicacionesAudio
        document.getElementById('modalInstrucciones').addEventListener('hidden.bs.modal', function() {
            dinoModalAudio.pause();
            dinoModalAudio.currentTime = 0;
            dinoModal.classList.remove('dino-hablando');

            // Reproducir dinoIndicacionesAudio después de cerrar el modal
            setTimeout(() => {
                dinoIndicacionesAudio.play().catch(error => console.log("Error al reproducir el audio:", error));
            }, 500); // Pequeña demora para asegurar carga del audio
        });

        // Manejo del clic en dinoIndicaciones para repetir el audio
        dinoIndicaciones.addEventListener('click', function() {
            if (dinoIndicacionesAudio.paused) {
                dinoIndicacionesAudio.play().catch(error => console.log("Error al reproducir el audio:", error));
            } else {
                dinoIndicacionesAudio.pause();
                dinoIndicacionesAudio.currentTime = 0;
            }
        });


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

            fetch(baseUrl + 'letras/bosque_bambu/guardarImagenGrafismoB', {
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

        function mostrarMensajeExito() {
            // Crear el mensaje de éxito
            const mensaje = document.createElement('div');
            mensaje.textContent = `Recomepensa acumulada ${estrellas}`;
            mensaje.innerHTML = `¡Increíble trabajo, explorador!<br>
            Tu trazo se ha guardado con éxito en la Galería Grafismo.<br>
            ¡Sigue explorando! <br> Recompensa acumulada: <strong>${estrellas}</strong> estrellas 🌟`;
            mensaje.style.color = '#214524';
            mensaje.style.fontWeight = 'bold';
            mensaje.style.position = 'absolute';
            mensaje.style.top = '50px'; // Posición en la pantalla
            mensaje.style.left = '50%'; // Centrar horizontalmente
            mensaje.style.transform = 'translateX(-50%)'; // Centrar correctamente
            mensaje.style.backgroundColor = '#ffffff';
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
    });
</script>