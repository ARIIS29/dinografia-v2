<!-- Sección que contiene el contenido principal -->
<div class="modal fade" id="modalInstrucciones" tabindex="-1" aria-labelledby="modalInstruccionesLabel" aria-hidden="true">
    <div class="modal-dialog texto-modal-bambu">
        <div class="modal-content mod-color">
            <div class="modal-header">
                <h5 class="modal-title" id="videoModalLabel">
                    <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/dino-indicaciones.png') ?>" alt="Img-Dino-Indicaciones" class="img-fluid dino-hablando me-3" width="8%"><b>¡Hola Explorador!</b>
                </h5>
                <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close" title="Cerrar ventana"></button>
            </div>
            <div class="modal-body">
                <p>
                    ¡Bienvenido al bosque de bambú!
                    En esta aventura, exploraremos juntos la letra <b>b</b>.
                    A lo largo del viaje, descubrirás sus secretos y completarás misiones divertidas que te ayudarán a mejorar tus trazos y escribirla fácilmente. <br>
                    ¡Juntos, exploremos la letra <b>b</b> y aprenderemos a escribirla correctamente! Prepárate para practicar y completar todas las misiones que el bosque de bambú tiene para ti. <br>
                    ¡Comencemos con la exploración!
                </p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Entendido</button>
            </div>
        </div>
    </div>
</div>


<section class="d-flex justify-content-center align-items-center mt-10" id="menuPrincipal">
    <div class="container">
        <div class="col-lg-12 col-md-12 d-flex align-items-center">
            <!-- Imagen -->
            <img src="<?php echo base_url('almacenamiento/img/botones/btn-indicaciones.png') ?>" alt="Img-Dino-Indicaciones" class="img-fluid dino-hablando me-3" width="6%">
            <!-- Texto -->
            <p class="texto_indicaciones_bambu mb-0">Haz clic en uno de los botones y tracemos aventuras con la letra b</p>
        </div>
        <div class="row justify-content-center text-center">
            <div class="col-lg-3 col-md-3 col-sm-4 col-6 btn-transicion">
                <a href="<?php echo base_url('letras/bosque_bambu/letrab') ?>">
                    <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/btn-la_ruta_del_trazo.png') ?>" alt="Botón bosque de bambú" class=" img-fluid animated-button">
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-6 btn-transicion">
                <a href="<?php echo base_url('letras/bosque_bambu/trazos_en_arena_b') ?>">
                    <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/btn-la_ruta_del_trazo.png') ?>" alt="Botón bosque de bambú" class=" img-fluid animated-button">
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-6 btn-transicion">
                <a href="<?php echo base_url('letras/bosque_bambu/grafismo_b') ?>">
                    <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/btn-la_ruta_del_trazo.png') ?>" alt="Botón bosque de bambú" class=" img-fluid animated-button">
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-6 btn-transicion">
                <a href="<?php echo base_url('letras/bosque_bambu/trazando_aventuras_b') ?>">
                    <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/btn-la_ruta_del_trazo.png') ?>" alt="Botón bosque de bambú" class=" img-fluid animated-button">
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