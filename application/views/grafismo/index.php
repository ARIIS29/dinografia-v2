<!-- Sección que contiene el contenido principal -->
<section class="mt-8">
    <style>
        #fondo-letrab {
            margin-left: 19%;
            position: absolute;
            width: 800px;
            height: 400px;
            z-index: -1;
            /* Asegura que esté detrás del lienzo */
        }

        #canvas {
            position: relative;
            z-index: 1;
            /* Asegura que el lienzo esté delante de la imagen de fondo */
            width: 800px;
            height: 400px;
        }

        #entradaImagen {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
            /* Asegura que esté visible encima del canvas */
            opacity: 0.8;
            /* Opcional: haz que el selector de archivo sea semitransparente */
        }
    </style>
    <div class="container">
        <div class="row">
            <!-- Columna para la imagen de fondo y el canvas -->
            <div class="col-lg-12 col-md-12 col-12 text-center mt-5" style="position: relative;">
                <h4>¡Elige tu imagen favorita y prepárate para dibujar como un artista! 🎨🖌️</h4>
                <!-- Selector de archivo para imagen -->
                <input type="file" id="entradaImagen" class="" accept="image/*">
                <!-- Imagen de fondo -->
                <img id="fondo-letrab" src="<?php echo base_url('almacenamiento/img/lera-b/letra-b.gif'); ?>" alt="Coloca una imagen" style="display: block;" class="img-fluid">
                <!-- Canvas para dibujar -->
                <canvas id="canvas"></canvas>
                <br>
                <!-- Selector de color -->
                <input type="color" id="color" value="#00A249" title="Gama de colores">
                <!-- Selector de grosor -->
                <input type="range" id="grosor" min="8" max="15" value="1" title="Grosor de la línea">
                <!-- Botón para usar el lápiz -->
                <button id="lapiz" type="button" class="btn btn-lapiz-inactive" title="Usar lápiz para dibujar"><i class="fas fa-pencil-alt"></i></button>
                <!-- Botón para limpiar el canvas -->
                <button id="limpiar" class="btn btn-limpiar-inactive" title="Limpiar toda la pizarra"><i class="fas fa-trash-alt"></i></button>
                <!-- Botón para guardar el dibujo -->
                <button id="guardar" class="btn btn-guardar-inactive" title="Guardar el trazo del lienzo"><i class="fas fa-camera"></i></button>
            </div>
        </div>
    </div>
</section>

<!-- Script que maneja la funcionalidad del canvas y los botones -->
<script>
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
        const entradaImagen = document.getElementById('entradaImagen'); // Selector de archivo

        // Función para ajustar el tamaño del canvas al tamaño del contenedor
        function adjustCanvasSize() {
            canvas.width = canvas.offsetWidth;
            canvas.height = canvas.offsetHeight;
            fondo.style.width = `${canvas.width}px`;
            fondo.style.height = `${canvas.height}px`;
        }

        adjustCanvasSize();
        // Función para cargar la imagen seleccionada como fondo
        entradaImagen.addEventListener('change', (event) => {
            const archivo = event.target.files[0];
            if (archivo) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    fondo.src = e.target.result; // Establece la imagen de fondo
                    entradaImagen.style.display = 'none'; // Oculta el selector de archivo
                };
                reader.readAsDataURL(archivo);
            }
        });

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

                fetch(baseUrl + 'grafismo/guardarImagen', {
                        method: 'POST',
                        body: formData // Enviando el FormData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            console.log('Imagen guardada con éxito:', data);
                            mostrarMensajeExito(); // Mostrar mensaje de éxito
                            actualizarBotonGuardar(); // Actualiza el estado del botón

                            // Pregunta al usuario si desea insertar una nueva imagen
                            if (confirm("¿Desea insertar una nueva imagen?")) {
                                entradaImagen.style.display = 'block'; // Muestra el selector de archivo
                                entradaImagen.value = ''; // Limpia el valor del input para permitir una nueva selección
                            }
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
            mensaje.textContent = '¡Captura guardada con éxito en la galería B!';
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
            ctx.strokeStyle = colorPicker.value; // Establece el color de la línea
            ctx.lineJoin = 'round'; // Configura el tipo de unión de líneas
            ctx.lineCap = 'round'; // Configura el tipo de extremo de línea
            ctx.lineTo(x, y); // Dibuja una línea desde la última posición
            ctx.stroke(); // Dibuja la línea en el canvas
            ctx.beginPath(); // Comienza un nuevo camino
            ctx.moveTo(x, y); // Mueve el contexto a la posición actual
        }

        // Actualiza el estado del botón de limpiar
        function actualizarBotonLimpiar() {
            botonLimpiar.classList.toggle('btn-limpiar-active');
            // Agregar la clase de parpadeo
            botonLimpiar.classList.add('boton-parpadeo');

            // Remover la clase de parpadeo después de 0.5 segundos (duración del parpadeo)
            setTimeout(function() {
                botonLimpiar.classList.remove('boton-parpadeo');
            }, 500); // Tiempo en milisegundos
        }

        // Actualiza el estado del botón de lápiz
        function actualizarBotonLapiz() {
            if (usarLapiz) {
                botonLapiz.classList.add('btn-lapiz-active');
                botonLapiz.classList.remove('btn-lapiz-inactive');
            } else {
                botonLapiz.classList.remove('btn-lapiz-active');
                botonLapiz.classList.add('btn-lapiz-inactive');
            }
        }
    });
</script>