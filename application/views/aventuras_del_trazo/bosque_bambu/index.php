<section class="d-flex mt-10" id="menuPrincipal">
    <div class="container-fluid">
        <div class="row mt-2 justify-content-center">
            <div class="col-lg-8 col-md-8 btn-transicion contenedor-instrucciones text-center">
                <div class="text-parrafo">
                    
                    <h1 class="text-center mt-3"><img src="<?php echo base_url('almacenamiento/img/bosque_bambu/dino-indicaciones.png') ?>" alt="Img-Dino-Indicaciones" class="img-fluid dino-hablando me-3" width="8%"> ¡Bienvenido explorador!</h1><br>
                    <p class="ms-4 me-4">
                        En el mágico bosque de bambú, vamos a emprender una emocionante aventura para descubrir la letra <b>b</b>. A lo largo de este viaje, descubriremos los secretos de esta fantástica letra y aprenderemos a dominarla a través de aventuras que nos ayudaran a identificarla con facilidad. <br>
                        Únete a la exploración y sé parte de esta increíble aventura dando clic en el botón <b>"Exploración de la letra b"</b>. <br>
                        ¡Vamos a descubrir lo que el bosque de bambú tiene reservado para ti!
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Referencias a elementos
        const dino = document.getElementById('dino');
        const audio = document.getElementById('dinoAudio');
        const botonExploracion = document.querySelector('.boton-animacion-pulso');

        // Inicia animación y audio al cargar la página
        window.addEventListener('DOMContentLoaded', function() {
            dino.classList.add('dino-hablando'); // Inicia la animación
            audio.play().catch(error => {
                console.log("Error al reproducir el audio automáticamente:", error);
            });
        });

        // Manejo del clic en Dino
        dino.addEventListener('click', function() {
            if (dino.classList.contains('dino-hablando')) {
                dino.classList.remove('dino-hablando'); // Detiene la animación
                audio.pause(); // Pausa el audio
                audio.currentTime = 0; // Reinicia el audio
            } else {
                dino.classList.add('dino-hablando'); // Inicia la animación
                audio.play().catch(error => {
                    console.log("Error al reproducir el audio:", error);
                });
            }
        });

        // Detener animación cuando termine el audio
        audio.addEventListener('ended', function() {
            dino.classList.remove('dino-hablando'); // Detiene la animación
        });

        // Función para mover el scroll automáticamente al pasar el cursor
        botonExploracion.addEventListener('mouseover', function() {
            window.scrollTo({
                top: document.body.scrollHeight, // Desplazamiento hasta el final de la página
                behavior: 'smooth' // Hace que el desplazamiento sea suave
            });
        });
    });
</script>