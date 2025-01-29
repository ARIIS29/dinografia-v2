<!-- Sección que contiene el contenido principal -->
<div class="modal fade" id="modalInstrucciones" tabindex="-1" aria-labelledby="modalInstruccionesLabel" aria-hidden="true">
    <div class="modal-dialog  texto-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="videoModalLabel">
                    <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/dino-indicaciones.png') ?>" alt="Img-Dino-Indicaciones" class="img-fluid dino-hablando me-3" width="8%"><b>¡Bienvenido Explorador!</b>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body texto-modal-bambu">
                <p>
                    En esta aventura aprenderemos a trazar la letra "b". En unos momentos verás un video que te enseñará cómo hacerlo. ¡Ajusta el volumen para escucharme y seguir mis indicaciones mientras trazas en la pizarra! <br>
                    <b>Es importante dar clic en los siguientes botones para hacer uso de la pizarra. Si deseas hacer lo siguiente:</b>
                <ul>

                    <li>Dibujar en la pizarra, da clic en el botón
                        <button class="btn-lapiz-desact" title="Usar lapiz para dibujar" disabled>
                            <i class="fas fa-pencil-alt"></i> Usar Lápiz
                        </button>

                    </li>
                    <li>Cambiar el color del lápiz, da clic en el siguiente botón
                        <button class="btn-color-desact" title="Cambiar color del lápiz" disabled>
                            <i class="fas fa-palette"></i>
                        </button>

                    </li>
                    <li>Borrar todo para realizar un nuevo trazo, da clic en el botón
                        <button class="btn-limpiar-desact" title="Limpiar toda la pizarra" disabled>
                            <i class="fas fa-trash-alt"></i> Limpiar Pizarra
                        </button>
                    </li>
                    <li>Para guardar tus trazos en la Galería Letra B, da clic en el botón
                        <button class="btn-guardar-desact" title="Guardar mi trazo" disabled>
                            <i class="fas fa-camera"></i> Guardar Trazo
                        </button> Si no lo haces, tus trazos no se guardarán.

                    </li>
                </ul>
                ¡Haz tantos trazos como quieras! Guarda los que más te gusten.
                Cierra esta ventana y ¡Vamos, a trazar y aprender! ¡Lo harás genial!
                </p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Entendido</button>
            </div>
        </div>
    </div>
</div>
<section class="mt-8">
    <div class="container">
        <div class="col-lg-12 col-md-12 d-flex align-items-center">
            <!-- Imagen -->
            <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/dino-indicaciones.png') ?>" alt="Img-Dino-Indicaciones" class="img-fluid dino-hablando me-3" width="4%">
            <!-- Texto -->
            <p class="texto_indicaciones_bambu mb-0">¡Traza la letra <b>b</b> en la pizarra!</p>
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
                <img id="fondo-letra" src="<?php echo base_url('almacenamiento/img/bosque_bambu/letra-b.gif'); ?>" alt="Background Image" style="display: block;" class="img-fluid">
                <!-- Canvas para dibujar -->
                <canvas id="canvas"></canvas>
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
        const botonLimpiar = document.getElementById('limpiar'); // Botón de limpiar canvas
        const botonLapiz = document.getElementById('lapiz'); // Botón del lápiz
        const botonGuardar = document.getElementById('guardar'); // Botón de guardar el dibujo
        const fondo = document.getElementById('fondo-letra'); // Imagen de fondo
        const botonColor = document.getElementById('botonColor'); // Botón de color
        const inputColor = document.getElementById('color'); // Input de color oculto
        const grosorFijo = 15;
        botonGuardar.style.display = "none";
        const video = document.getElementById('video');
        const modal = new bootstrap.Modal(document.getElementById('modalInstrucciones'));

        // Mostrar el modal al cargar la página
        modal.show();

        // Reproducir el video automáticamente después de cerrar el modal
        $('#modalInstrucciones').on('hidden.bs.modal', function() {
            video.play(); // Reproduce el video
        });
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

        function mostrarMensajeExito() {
            // Crear el mensaje de éxito
            const mensaje = document.createElement('div');
            mensaje.textContent = '¡Captura guardada con éxito en la galería B!';
            mensaje.style.color = 'green';
            mensaje.style.fontWeight = 'bold';
            mensaje.style.position = 'absolute';
            mensaje.style.top = '50px'; // Posición en la pantalla
            mensaje.style.left = '50%'; // Centrar horizontalmente
            mensaje.style.transform = 'translateX(-50%)'; // Centrar correctamente
            mensaje.style.backgroundColor = '#DFF2BF';
            mensaje.style.border = '1px solid #4CAF50';
            mensaje.style.padding = '10px';
            mensaje.style.borderRadius = '5px';
            mensaje.style.zIndex = '9999'; // Asegurar que el mensaje esté encima del canvas

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
                window.location.href = '<?php echo base_url('menu_principal'); ?>'; // Cambiar la URL del menú principal
            });

            // Añadir los botones al mensaje
            botones.appendChild(botonSeguir);
            botones.appendChild(botonNoSeguir);
            mensaje.appendChild(botones);

            // Añadir el mensaje al body
            document.body.appendChild(mensaje);

            // Eliminar el mensaje después de 5 segundos si no se ha hecho clic
            setTimeout(() => {
                mensaje.remove();
            }, 5000); // Se elimina después de 5 segundos si no se hace clic
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
                // canvas.classList.add('cursor-lapiz');
            } else {
                botonLapiz.classList.remove('btn-lapiz-active');
                botonLapiz.classList.add('btn-lapiz-inactive');
                // canvas.classList.remove('cursor-lapiz');
            }
        }

    });
</script>