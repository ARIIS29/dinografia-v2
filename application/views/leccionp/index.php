<!-- Sección que contiene el contenido principal -->
<section class="mt-8">
    <div class="container">
        <!-- Imagen que solo se muestra en dispositivos medianos y grandes -->
        <div class="col-lg-6 col-md-6 d-none d-sm-block">
            <!-- Muestra una imagen desde el almacenamiento -->
            <img src="<?php echo base_url('almacenamiento/img/letra-p/msjp1.png') ?>" alt="" class="img-fluid" width="70%">
        </div>
        <div class="row">
            <!-- Columna para el video -->
            <div class="col-lg-6 col-md-6 col-12">
                <!-- Elemento de video con controles -->
                <video controls>
                    <source src="<?php echo base_url('almacenamiento/img/letra-p/letrap-escritura.mp4'); ?>" type="video/mp4">
                </video>
            </div>
            <!-- Columna para la imagen de fondo y el canvas -->
            <div class="col-lg-6 col-md-6 col-12" style="position: relative;">
                <!-- Imagen de fondo -->
                <img id="fondo-letrab" src="<?php echo base_url('almacenamiento/img/letra-p/letra-p.gif'); ?>" alt="Background Image" style="display: block;" class="img-fluid">
                <!-- Canvas para dibujar -->
                <canvas id="canvas" style="border:1px solid #000000;"></canvas>
                <br>
                <!-- Selector de color -->
                <input type="color" id="color" value="#0D6EFD" title="Gama de colores">
                <!-- Selector de grosor -->
                <input type="range" id="grosor" min="15" max="20" value="1" title="Grosor de la línea">
                <!-- Botón para usar el lápiz -->
                <button id="lapiz" type="button" class="btn btn-lapiz-inactive" title="Usar lapiz para dibujar"><i class="fas fa-pencil-alt"></i></button>
                <!-- Botón para limpiar el canvas -->
                <button id="limpiar" class="btn btn-limpiar-inactive" title="Limpiar toda la pizarra"><i class="fas fa-trash-alt"></i></button>
                <!-- Botón para alternar la visibilidad del fondo -->
                <button id="alternar-fondo" class="btn btn-toggle-active" title="Mostrar/ocultar fondo"><i class="fas fa-image"></i></button>
                <!-- Botón para guardar el dibujo -->
                <button id="guardar" class="btn btn-guardar-inactive" title="Guardar el trazo del lienzo"><i class="fas fa-camera"></i></button>
            </div>
        </div>
    </div>
</section>

<!-- Script que maneja la funcionalidad del canvas y los botones -->
<script>
    // Función para alternar la visibilidad de la imagen de fondo
    document.getElementById('alternar-fondo').onclick = function() {
        var img = document.getElementById('fondo-letrab');
        var btn = document.getElementById('alternar-fondo');
        // Alternar la visibilidad de la imagen y actualizar el título y la clase del botón
        if (img.style.display === 'none') {
            img.style.display = 'block';
            btn.title = 'Ocultar fondo';
            btn.classList.add('btn-toggle-active'); // Cambia la clase si es necesario
        } else {
            img.style.display = 'none';
            btn.title = 'Mostrar fondo';
            btn.classList.remove('btn-toggle-active'); // Cambia la clase si es necesario
        }
    };

    // Función que se ejecuta cuando el contenido del DOM se ha cargado
    document.addEventListener("DOMContentLoaded", () => {
        const canvas = document.getElementById('canvas');
        const ctx = canvas.getContext('2d');
        let dibujando = false; // Variable para rastrear si se está dibujando
        let usarLapiz = false; // Variable para rastrear si se está usando el lápiz
        const colorPicker = document.getElementById('color'); // Selector de color
        const controlGrosor = document.getElementById('grosor'); // Selector de grosor de línea
        const botonLimpiar = document.getElementById('limpiar'); // Botón de limpiar canvas
        const botonLapiz = document.getElementById('lapiz'); // Botón del lápiz
        const botonGuardar = document.getElementById('guardar'); // Botón de guardar el dibujo
        const fondo = document.getElementById('fondo-letrab'); // Imagen de fondo

        // Función para ajustar el tamaño del canvas al tamaño del contenedor
        function adjustCanvasSize() {
            canvas.width = canvas.offsetWidth;
            canvas.height = 300;
            fondo.style.width = `${canvas.width}px`;
            fondo.style.height = `${canvas.height}px`;
        }

        adjustCanvasSize();

        // Eventos del canvas para dibujar con el ratón
        canvas.addEventListener('mousedown', (event) => {
            if (usarLapiz) {
                dibujando = true;
                ctx.beginPath();
                ctx.moveTo(event.offsetX, event.offsetY);
            }
        });

        canvas.addEventListener('mouseup', () => dibujando = false);
        canvas.addEventListener('mousemove', (event) => {
            if (dibujando) draw(event.offsetX, event.offsetY);
        });

        // Eventos del canvas para dibujar con el tacto (pantallas táctiles)
        canvas.addEventListener('touchstart', (event) => {
            if (usarLapiz) {
                dibujando = true;
                const touch = event.touches[0];
                ctx.beginPath();
                ctx.moveTo(touch.clientX - canvas.getBoundingClientRect().left, touch.clientY - canvas.getBoundingClientRect().top);
            }
        });

        canvas.addEventListener('touchend', () => dibujando = false);
        canvas.addEventListener('touchmove', (event) => {
            event.preventDefault();
            if (dibujando) {
                const touch = event.touches[0];
                draw(touch.clientX - canvas.getBoundingClientRect().left, touch.clientY - canvas.getBoundingClientRect().top);
            }
        });

        botonLimpiar.addEventListener('click', () => {
            ctx.clearRect(0, 0, canvas.width, canvas.height); // Limpia todo el canvas
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

                fetch(baseUrl + 'leccionp/guardarImagen', {
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

        // Función para mostrar el mensaje de éxito
        function mostrarMensajeExito() {
            const mensaje = document.createElement('div');
            mensaje.textContent = '¡Captura guardada con éxito en la galería P!';
            mensaje.style.color = 'green';
            mensaje.style.fontWeight = 'bold';
            mensaje.style.position = 'absolute';
            mensaje.style.top = '150px'; // Posición en la pantalla
            mensaje.style.right = '150px';
            mensaje.style.backgroundColor = '#DFF2BF';
            mensaje.style.border = '1px solid #4CAF50';
            mensaje.style.padding = '10px';
            mensaje.style.borderRadius = '5px';
            document.body.appendChild(mensaje);

            // Eliminar el mensaje después de 3 segundos
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

        // Función para dibujar en el canvas
        function draw(x, y) {
            ctx.lineWidth = controlGrosor.value; // Establece el grosor de la línea
            ctx.lineCap = 'round'; // Establece el estilo de la terminación de la línea

            if (usarLapiz) {
                ctx.globalCompositeOperation = 'source-over'; // Usa el lápiz (dibuja)
                ctx.strokeStyle = colorPicker.value; // Establece el color de la línea
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

        // Función para actualizar la apariencia del botón de alternar fondo
        function actualizarBotonAlternarFondo() {
            if (fondoVisible) {
                botonAlternarFondo.classList.remove('btn-toggle-inactive');
                botonAlternarFondo.classList.add('btn-toggle-active');
            } else {
                botonAlternarFondo.classList.remove('btn-toggle-active');
                botonAlternarFondo.classList.add('btn-toggle-inactive');
            }
        }

        // Función para actualizar la apariencia del botón de lápiz
        function actualizarBotonLapiz() {
            if (usarLapiz) {
                botonLapiz.classList.remove('btn-lapiz-inactive');
                botonLapiz.classList.add('btn-lapiz-active');
            } else {
                botonLapiz.classList.remove('btn-lapiz-active');
                botonLapiz.classList.add('btn-lapiz-inactive');
            }
        }
    });
</script>