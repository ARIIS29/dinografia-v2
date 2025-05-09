<!-- Sección que contiene el contenido principal -->
<!-- <div class="modal fade" id="modalInstrucciones" tabindex="-1" aria-labelledby="modalInstruccionesLabel" aria-hidden="true">
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
</div> -->


<section class="d-flex justify-content-center align-items-center mt-10" id="menuPrincipal">
    
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