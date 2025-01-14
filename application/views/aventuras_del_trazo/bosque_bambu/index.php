<!-- Sección que contiene el contenido principal -->
<div class="modal fade" id="modalInstrucciones" tabindex="-1" aria-labelledby="modalInstruccionesLabel" aria-hidden="true">
    <div class="modal-dialog  texto-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="videoModalLabel">
                    <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/dino-indicaciones.png') ?>" alt="Img-Dino-Indicaciones" class="img-fluid dino-hablando me-3" width="8%"><b>¡Hola Explorador!</b>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>
                    ¡Bienvenido al bosque de bambú! <br>
                    En esta aventura, exploraremos juntos la letra <b>b</b>. <br>
                    A lo largo del viaje, descubrirás sus secretos y completarás misiones divertidas que te ayudarán a mejorar tus trazos y escribirla fácilmente. <br>
                    ¡Juntos, exploremos la letra <b>b</b> y aprenderemos a escribirla correctamente! <br> Prepárate para practicar y completar todas las misiones que el bosque de bambú tiene para ti. <br>
                    ¡Comencemos con la exploración!
                </p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Entendido</button>
            </div>
        </div>
    </div>
</div>

<style>
    .boton-regresar {
        background-color: #A8D5BA;
        /* Verde pastel */
        border: 2px solid #C6E6D8;
        /* Verde claro */
        border-radius: 20px;
        /* Bordes redondeados */
        color: white;
        /* Texto blanco */
        font-family: "Poppins", sans-serif;
        /* Fuente amigable */
        padding: 10px 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        /* Espacio entre ícono y texto */
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        /* Sombra suave */
    }
</style>
<section class="d-flex justify-content-center align-items-center mt-10" id="menuPrincipal">
    <div class="container">
        <div class="col-lg-12 col-md-12 d-flex align-items-center">
            <!-- Imagen -->
            <img src="<?php echo base_url('almacenamiento/img/botones/btn-indicaciones.png') ?>" alt="Img-Dino-Indicaciones" class="img-fluid dino-hablando me-3" width="6%">
            <!-- Texto -->
            <p class=" texto_indicaciones mb-0">Haz click en uno de los botones y exploremos juntos grandes aventuras.</p>
        </div>
        <div class="row justify-content-center text-center">
            <!-- Botón 1 -->
            <div class="col-lg-3 col-md-3 col-sm-4 col-6 mb-4 btn-transicion">
                <a class="btn-trigger" href="javascript:void(0)" onclick="showFloatingButtons('group1')">
                    <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/btn-la_ruta_del_trazo.png') ?>" alt="Botón bosque de bambú" class="img-fluid enlargable" width="100%">
                </a>
            </div>
            <!-- Botón 2 -->
            <div class="col-lg-3 col-md-3 col-sm-4 col-6 mb-4 btn-transicion">
                <a class="btn-trigger" href="javascript:void(0)" onclick="showFloatingButtons('group2')">
                    <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/btn-explorando_la_letrab.png') ?>" alt="" class="img-fluid enlargable" width="100%">
                </a>
            </div>

        </div>
    </div>
</section>

<script>
    // Mostrar el modal automáticamente cuando se carga la página
    window.addEventListener('DOMContentLoaded', (event) => {
        var myModal = new bootstrap.Modal(document.getElementById('modalInstrucciones'), {
            keyboard: false // No cerrará el modal con la tecla ESC
        });
        myModal.show();
    });
</script>