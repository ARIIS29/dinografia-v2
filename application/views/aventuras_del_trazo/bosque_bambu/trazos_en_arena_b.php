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
    <div class="container text-center">
        <div class="col-lg-6 col-md-6 justify-aling-center text-center titulo-con-luz d-block d-sm-none mt-5">
            <h1 class="titulo-h1-bambu-movil">TRAZOS EN LA ARENA</h1>
        </div>
        <div class="col-lg-12 col-md-12 d-flex align-items-center">
            <img id="dinoIndicaciones" src="<?php echo base_url('almacenamiento/img/bosque_bambu/dino-indicaciones.png') ?>" alt="Img-Dino-Indicaciones" class="img-fluid me-3 d-none d-sm-block" style="cursor: pointer;" width="6%">
            <audio id="dinoIndicacionesAudio" src="<?php echo base_url('almacenamiento/audios/audio_trazos_arena_indicaciones.mp3') ?>" preload="auto"></audio>
            <p class="texto_indicaciones_bambu mb-0">Usa tu dedo para trazar la letra "b" en la arena. ¡Diviértete practicando!</p>
            <div class="col-1 d-none d-sm-block">
                <a href="<?php echo base_url('galeria/galeriat') ?>">
                    <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/btn-galeriat.png') ?>" alt="" class="img-fluid enlargable ms-3" width="80%">
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-md-8 col-12 text-center">
                <button id="limpiar" class="btn btn-limpiar-inactive" title="Limpiar toda la arena"><i class="fas fa-trash-alt"></i> Limpiar Arena</button>
                <button id="guardar" class="btn btn-guardar-inactive" title="Guardar mi trazo"><i class="fas fa-camera"></i> Guardar Trazo</button>
                <button id="toggleLetraB" class="btn btn-toggle-active" title="Mostrar/ocultar Letra B"><i class="fas fa-image"></i> Mostrar/ocultar Letra B</button>
                <audio id="audioEstrellas" src="<?php echo base_url('almacenamiento/audios/efecto_sonido_estrella.mp3') ?>" preload="auto"></audio>
                <div class="col-12 d-none d-sm-block">
                    <canvas id="lienzo" width="700" height="350"></canvas>
                </div>
                <div class="col-7 d-block d-sm-none">
                    <canvas id="lienzo" width="400" height="350"></canvas>
                </div>
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

        const dinoModal = document.getElementById('dinoModal');
        const dinoModalAudio = document.getElementById('dinoModalAudio');
        const modal = new bootstrap.Modal(document.getElementById('modalInstrucciones'));
        const audioEstrellas = document.getElementById('audioEstrellas');
        const imgLetraB = document.getElementById('letraBImg');
        const btnToggleLetraB = document.getElementById('toggleLetraB');
        let estrellas = 0;

        // Elementos de la imagen con audio fuera del modal
        const dinoIndicaciones = document.getElementById('dinoIndicaciones');
        const dinoIndicacionesAudio = document.getElementById('dinoIndicacionesAudio');


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
        botonGuardar.style.display = "none";
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
            trazoRealizado = true;
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
            mostrarBotonGuardar()
        }


        // Botón para borrar el lienzo
        limpiar.addEventListener('click', () => {
            contexto.clearRect(0, 0, lienzo.width, lienzo.height); // Limpia todo el canvas
            actualizarlimpiar();
            trazoRealizado = false;
            botonGuardar.style.display = "none"; // Oculta el botón de guardar
        });
        // Función para mostrar el botón de guardar si hay trazos en el canvas
        function mostrarBotonGuardar() {
            if (trazoRealizado) {
                botonGuardar.style.display = "inline-block";
            }
        }
        botonGuardar.addEventListener('click', () => {
            const baseUrl = '<?php echo base_url(); ?>';
            // Crear un canvas temporal para agregar el fondo
            const canvasTemporal = document.createElement("canvas");
            const contextoTemporal = canvasTemporal.getContext("2d");
            estrellas += 25;
            contadorEstrellas.textContent = estrellas;
            console.log("Estrellas ", estrellas);

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
            formData.append('puntaje', estrellas);
            document.getElementById("toggleLetraB").disabled = true;
            document.getElementById("limpiar").disabled = true;
            document.getElementById("guardar").disabled = true;

            estrellaSalta();
            mostrarEstrellasCentrales();

            // Enviar la imagen al servidor usando AJAX
            fetch(baseUrl + 'letras/bosque_bambu/guardarImagenTrazosArena', {
                    method: 'POST',
                    body: formData // Enviando el FormData
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
            Tu trazo se ha guardado con éxito en la <br> Galería Trazos en la Arena.<br>
            ¡Sigue explorando! 🦖<br> Recompensa acumulada: <strong>${estrellas}</strong> estrellas 🌟`;
            mensaje.style.color = '#214524';
            mensaje.style.fontFamily = '"Century Gothic", sans-serif';
            mensaje.style.fontWeight = 'bold';
            mensaje.style.position = 'absolute';
            mensaje.style.top = '50px'; // Posición en la pantalla
            mensaje.style.left = '50%'; // Centrar horizontalmente
            mensaje.style.transform = 'translateX(-50%)'; // Centrar correctamente
            mensaje.style.backgroundColor = '#E0F3B8';
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
                contexto.clearRect(0, 0, lienzo.width, lienzo.height); // Limpiar el lienzo
                trazoRealizado = false; // Restablecer trazo
                botonGuardar.style.display = "none"; // Ocultar el botón de guardar
                mensaje.remove(); // Eliminar el mensaje
                document.getElementById("toggleLetraB").disabled = false;
                document.getElementById("limpiar").disabled = false;
                document.getElementById("guardar").disabled = false;
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