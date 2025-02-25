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
                    En esta misión exploraremos la letra ‘b’. Usa tu dedo o lápiz digital para formar la letra ‘b’ a tu manera. <br> ¡Esta es tu arena mágica! Experimenta, crea y diviértete realizando todos los trazos que quieras.
                <ul>
                    <li>Para borrar todo y realizar un nuevo trazo, da clic en el botón
                        <button class="btn-limpiar-desact" title="Limpiar toda la pizarra" disabled>
                            <i class="fas fa-trash-alt"></i> Limpiar Arena
                        </button>
                    </li>
                    <li>Para guardar tus trazos en la Galería de Trazos en la Arena da clic en el botón
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
    <div class="container text-center">
        <div class="col-lg-12 col-md-12 d-flex align-items-center">
            <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/dino-indicaciones.png') ?>" alt="Img-Dino-Indicaciones" class="img-fluid dino-hablando me-3" width="4%">
            <p class="texto_indicaciones_bambu mb-0">Usa tu dedo para trazar la letra "b" en la arena. ¡Diviértete practicando!</p>
        </div>

        <div class="row">
            <div class="col-lg-8 col-md-8 col-12 text-center">
                <button id="limpiar" class="btn btn-limpiar-inactive" title="Limpiar toda la arena"><i class="fas fa-trash-alt"></i> Limpiar Arena</button>
                <button id="guardar" class="btn btn-guardar-inactive" title="Guardar mi trazo"><i class="fas fa-camera"></i> Guardar Trazo</button>
                <button id="toggleLetraB" class="btn btn-toggle-active" title="Mostrar/ocultar Letra B"><i class="fas fa-image"></i> Mostrar/ocultar Letra B</button>
                <canvas id="lienzo" width="700" height="350"></canvas>
            </div>
            <div class="col-lg-4 col-md-4 d-flex align-items-center">
                <img id="letraBImg" src="<?php echo base_url('almacenamiento/img/bosque_bambu/letrab-img.png') ?>" alt="Img-Dino-Indicaciones" class="img-fluid me-3" style="display: none;" width="80%">
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
        const imgLetraB = document.getElementById('letraBImg');
        const btnToggleLetraB = document.getElementById('toggleLetraB');

        // Ocultar la imagen por defecto
        imgLetraB.style.display = 'none';

        // Evento para mostrar/ocultar la imagen al hacer clic en el botón
        btnToggleLetraB.addEventListener('click', () => {
            if (imgLetraB.style.display === 'none') {
                imgLetraB.style.display = 'block';
            } else {
                imgLetraB.style.display = 'none';
            }
        });

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
        limpiar.addEventListener('click', () => {
            contexto.clearRect(0, 0, lienzo.width, lienzo.height); // Limpia todo el canvas
            actualizarlimpiar();
        });

        botonGuardar.addEventListener('click', () => {
            const baseUrl = '<?php echo base_url(); ?>';
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
            const formData = new FormData();
            formData.append('imagen', imagenBase64);
            // Enviar la imagen al servidor usando AJAX
            fetch(baseUrl + 'letras/bosque_bambu/guardarImagenTrazosArena', {
                    method: 'POST',
                    body: formData // Enviando el FormData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        mostrarMensajeExito(); // Mostrar mensaje de éxito
                        // actualizarBotonGuardar(); // Actualiza el estado del botón

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

        // Función para actualizar la apariencia del botón de limpiar
        function actualizarlimpiar() {
            limpiar.classList.toggle('btn-limpiar-active');
            // Agregar la clase de parpadeo
            limpiar.classList.add('boton-parpadeo');

            // Remover la clase de parpadeo después de 0.5 segundos (duración del parpadeo)
            setTimeout(function() {
                limpiar.classList.remove('boton-parpadeo');
            }, 500); // Tiempo en milisegundos
        }



    });
</script>