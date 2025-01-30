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
                    En esta misión exploraremos la letra ‘b’. Usa tu dedo o lápiz digital para trazar círculos, líneas o incluso formar la letra ‘b’ a tu manera. <br> ¡Esta es tu arena mágica! Experimenta, crea y diviértete realizando todos los trazos que quieras.
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
            <div class="col-lg-6 col-md-6 col-12">
                <canvas id="lienzo" width="600" height="350"></canvas>
                <button id="botonLimpiar" class="btn btn-limpiar-inactive" title="Limpiar arena"><i class="fas fa-trash-alt"></i></button>
                <button id="guardar" class="btn btn-guardar-inactive" title="Guardar el trazo del lienzo"><i class="fas fa-camera"></i></button>
            </div>

        </div>

    </div>
    </div>
</section>

<!-- Script que maneja la funcionalidad del canvas y los botones -->
<script>
    // Función que se ejecuta cuando el contenido del DOM se ha cargado
    document.addEventListener("DOMContentLoaded", () => {

        const modal = new bootstrap.Modal(document.getElementById('modalInstrucciones'));

        // Mostrar el modal al cargar la página
        modal.show();

        const lienzo = document.getElementById("lienzo");
        const contexto = lienzo.getContext("2d");
        const botonGuardar = document.getElementById("guardar");
        let dibujando = false;

        // Configuración inicial del "estilo de arena"
        contexto.strokeStyle = "#FADFA6";
        contexto.lineWidth = 25;
        contexto.lineCap = "round";

        // Inicia el trazo cuando se toca o hace clic
        lienzo.addEventListener("mousedown", iniciarDibujo);
        lienzo.addEventListener("touchstart", iniciarDibujo);
        lienzo.addEventListener("mouseup", detenerDibujo);
        lienzo.addEventListener("touchend", detenerDibujo);
        lienzo.addEventListener("mousemove", dibujar);
        lienzo.addEventListener("touchmove", dibujar);

        // Función para iniciar el trazo
        function iniciarDibujo(evento) {
            dibujando = true;
            [ultimaX, ultimaY] = obtenerCoordenadas(evento);
        }

        // Función para detener el trazo
        function detenerDibujo() {
            dibujando = false;
            contexto.beginPath(); // Comienza un nuevo trazo
        }

        // Función para obtener las coordenadas según el tipo de evento
        function obtenerCoordenadas(evento) {
            if (evento.touches) {
                return [evento.touches[0].clientX - lienzo.offsetLeft, evento.touches[0].clientY - lienzo.offsetTop];
            } else {
                return [evento.clientX - lienzo.offsetLeft, evento.clientY - lienzo.offsetTop];
            }
        }

        // Función para dibujar en el lienzo
        function dibujar(evento) {
            if (!dibujando) return;

            const [x, y] = obtenerCoordenadas(evento);
            contexto.lineTo(x, y);
            contexto.stroke();
            contexto.beginPath();
            contexto.moveTo(x, y);
        }

        // Botón para borrar el lienzo
        botonLimpiar.addEventListener('click', () => {
            contexto.clearRect(0, 0, lienzo.width, lienzo.height); // Limpia todo el canvas
            actualizarBotonLimpiar();
        });

        botonGuardar.addEventListener('click', () => {
            // Crear un canvas temporal para agregar el fondo
            const canvasTemporal = document.createElement("canvas");
            const contextoTemporal = canvasTemporal.getContext("2d");

            // Configurar dimensiones del canvas temporal
            canvasTemporal.width = lienzo.width;
            canvasTemporal.height = lienzo.height;

            // Establecer el color de fondo
            contextoTemporal.fillStyle = "#D5A152"; // Color de fondo (puedes cambiarlo)
            contextoTemporal.fillRect(0, 0, canvasTemporal.width, canvasTemporal.height);

            // Copiar el contenido del canvas original al canvas temporal
            contextoTemporal.drawImage(lienzo, 0, 0);

            // Obtener la imagen en formato base64 del canvas temporal
            const imagenBase64 = canvasTemporal.toDataURL("image/jpeg");

            // Enviar la imagen al servidor usando AJAX
            fetch('trazos_arena/guardarImagen', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        imagen: imagenBase64
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        mostrarMensajeExito(); // Mostrar mensaje de éxito
                        actualizarBotonGuardar(); // Actualiza el estado del botón

                    } else {
                        console.error(data.message); // Mostrar mensaje de error en la consola
                    }
                })
                .catch(error => console.error('Error en la solicitud:', error));
        });

        function mostrarMensajeExito() {
            const mensaje = document.createElement('div');
            mensaje.textContent = '¡Captura guardada con éxito en la galería trazos arena!';
            mensaje.style.color = 'green';
            mensaje.style.fontWeight = 'bold';
            mensaje.style.position = 'absolute';
            mensaje.style.top = '150px';
            mensaje.style.right = '150px';
            mensaje.style.backgroundColor = '#DFF2BF';
            mensaje.style.border = '1px solid #4CAF50';
            mensaje.style.padding = '10px';
            mensaje.style.borderRadius = '5px';
            document.body.appendChild(mensaje);

            setTimeout(() => {
                mensaje.remove();
            }, 3000);
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



    });
</script>