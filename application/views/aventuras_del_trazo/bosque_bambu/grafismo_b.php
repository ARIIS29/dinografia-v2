<section class="mt-8">
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


        let trazoRealizado = false;
        let dibujando = false;
        let usarLapiz = false;

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



        // botonGuardar.addEventListener('click', () => {
        //     const enlace = document.createElement('a');
        //     enlace.href = canvas.toDataURL('image/png');
        //     enlace.download = 'dibujo.png';
        //     enlace.click();
        // });

        botonGuardar.addEventListener('click', () => {

            const baseUrl = '<?php echo base_url(); ?>';

            const tempCanvas = document.createElement('canvas');
            const tempCtx = tempCanvas.getContext('2d');

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
            mensaje.innerHTML = '¡Increíble trabajo, explorador!<br>Tu trazo se ha guardado con éxito en la galería B.<br>¡Sigue explorando!';
            mensaje.style.color = '#214524';
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
    });
</script>