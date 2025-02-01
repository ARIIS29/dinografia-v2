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



        botonGuardar.addEventListener('click', () => {
            const enlace = document.createElement('a');
            enlace.href = canvas.toDataURL('image/png');
            enlace.download = 'dibujo.png';
            enlace.click();
        });
    });
</script>