<!-- Modal con video tutorial -->
<div class="modal fade" id="modalInstrucciones" tabindex="-1" aria-labelledby="modalInstruccionesLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered texto_indicaciones_modal ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalInstruccionesLabel">
                    <img id="dinoModal" src="<?php echo base_url('almacenamiento/img/bosque_bambu/dino-indicaciones.png') ?>" alt="Img-Dino-Indicaciones" class="img-fluid me-3" width="8%">
                    <audio id="dinoModalAudio" src="<?php echo base_url('almacenamiento/audios/audios_b/b_trazos_arena_indicaciones.mp3') ?>" preload="auto"></audio>

                    <b>¡Hola Explorador!</b>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <p class="mb-3">
                    En esta aventura sensorial, aprenderemos a sentir y trazar la letra "b" con tu dedo. Mira este video para descubrir cómo trazar en la arena y empezar tu exploración.
                </p>
                <div class="ratio ratio-16x9">
                    <video id="tutorialVideo" controls>
                        <source src="<?php echo base_url('almacenamiento/img/bosque_bambu/tutorial_b/b_tutorial_trazos_arena.mp4'); ?>" type="video/mp4">
                        Tu navegador no soporta el video.
                    </video>
                </div>
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
                <img id="letraBImg" src="<?php echo base_url('almacenamiento/img/bosque_bambu/letra.gif') ?>" alt="Img-Dino-Indicaciones" class="img-fluid me-3" style="display: none;" width="80%">
            </div>
        </div>

    </div>
</section>

<!-- Script que maneja la funcionalidad del canvas y los botones -->
<script>
    // Función que se ejecuta cuando el contenido del DOM se ha cargado
    document.addEventListener("DOMContentLoaded", () => {

        const modalEl = document.getElementById('modalInstrucciones');
        const video = document.getElementById('tutorialVideo');
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

        modalEl.addEventListener('shown.bs.modal', function() {
            if (dinoModalAudio) {
                dinoModalAudio.play().catch(error => {
                    console.log("Error al reproducir el audio automáticamente:", error);
                });
            }
            if (dinoModal) {
                dinoModal.classList.add('dino-hablando');
            }
        });

        modalEl.addEventListener('hidden.bs.modal', function() {
            // Detener video
            if (video) {
                video.pause();
                video.currentTime = 0;
            }

            // Detener audio del modal
            if (dinoModalAudio) {
                dinoModalAudio.pause();
                dinoModalAudio.currentTime = 0;
            }

            if (dinoModal) {
                dinoModal.classList.remove('dino-hablando');
            }

            // Retrasar la reproducción de dinoIndicacionesAudio para evitar bloqueo
            setTimeout(() => {
                if (dinoIndicacionesAudio) {
                    dinoIndicacionesAudio.play().catch(error => {
                        console.log("⚠️ No se pudo reproducir dinoIndicacionesAudio automáticamente:", error);
                    });
                }
            }, 500); // 500 ms de espera antes de reproducir
        });


        // Manejo del clic en el dino dentro del modal
        if (dinoModal && dinoModalAudio) {
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
        }

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