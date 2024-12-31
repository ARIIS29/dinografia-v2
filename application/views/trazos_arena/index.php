<section class="mt-10 justify-content-center">
    <div class="col-lg-12 col-md-12 col-12 text-center">
        <p class="indicaciones">Usa tu dedo para trazar en la arena las letras b, d, p o q, siguiendo sus formas. Siente el movimiento mientras trazas, puedes buscar o solicitar alguna guia para formar las letras o figuras.</p>
    </div>
    <div class="container-fluid  d-flex justify-content-center">

        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <canvas id="lienzo" width="600" height="350"></canvas>
                <button id="botonLimpiar" class="btn btn-limpiar-inactive" title="Limpiar arena"><i class="fas fa-trash-alt"></i></button>
                <button id="guardar" class="btn btn-guardar-inactive" title="Guardar el trazo del lienzo"><i class="fas fa-camera"></i></button>
            </div>

        </div>
    </div>
</section>
<script>
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
</script>