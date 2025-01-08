<section class="d-flex justify-content-center align-items-center mt-10" id="menuPrincipal">
    <div class="container-fluid text-center">
        <!-- Modal -->
        <div class="modal fade texto-modal" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="videoModalLabel">
                            <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/dino-indicaciones.png') ?>" alt="Img-Dino-Indicaciones" class="img-fluid dino-hablando me-3" width="8%"><b>¡Atención, exploradores!</b>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>En unos momentos, se reproducirá automáticamente un video importante para nuestra aventura.</p>
                        <p>Ajusta tu volumen para que puedas escuchar cómodamente las indicaciones.</p>
                        <p>Si el video no comienza a reproducirse automáticamente, busca el botón de Play en el reproductor de YouTube y haz clic en él para comenzar.</p>
                        <p>¡Prepárate para disfrutar y aprender en esta increíble aventura! 🌟</p>
                        <p>Cuando finalice el video da clic en el botón <b>"La Aventura Continúa"</b></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Entendido</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Video -->
        <div class="row">
            <div class="col-lg-9 col-md-9 embed-responsive embed-responsive-16by9 text-center">
                <iframe id="youtubeVideo" width="700" height="400" class="embed-responsive-item" src="https://www.youtube.com/embed/v6QPxN7_Ojs?autoplay=0&rel=0" allow="autoplay; encrypted-media" allowfullscreen>
                </iframe>
            </div>
            <div class="col-lg-3 col-md-3 text-center">
                <a href="<?php echo base_url('letras//bosque_bambu/explorando_letrab') ?>">
                    <img src="<?php echo base_url('almacenamiento/img/bosque_bambu/btn-la-aventura-continua.png') ?>" alt="Guia del explorador" class="img-fluid boton-animacion-pulso mt-5" width="50%">
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        // Mostrar el modal al cargar la página
        $('#videoModal').modal('show');

        // Reproducir el video automáticamente cuando el modal se cierra
        $('#videoModal').on('hidden.bs.modal', function() {
            const iframe = document.getElementById('youtubeVideo');
            iframe.src = "https://www.youtube.com/embed/v6QPxN7_Ojs?autoplay=1"; // Reemplazar completamente la URL para activar autoplay
        });
    });
</script>