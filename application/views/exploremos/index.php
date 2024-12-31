<section class="d-flex justify-content-center align-items-center mt-9" id="galeriaVideos">
    <div class="container mt-4">
        <div id="videoContainer">
            <!-- Video 1 - Letra b -->
            <div class="video-item active" id="video1">
                <div class="col-lg-6 col-md-6 d-none d-sm-block">
                    <!-- Muestra una imagen desde el almacenamiento -->
                    <img src="<?php echo base_url('almacenamiento/img/letra-b/msjb2.png') ?>" alt="" class="img-fluid" width="90%">
                </div>

                <div class="d-flex justify-content-center">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/v6QPxN7_Ojs" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <!-- Video 2 - Letra d-->
            <div class="video-item" id="video2" style="display:none;">
                <div class="col-lg-6 col-md-6 d-none d-sm-block">
                    <img src="<?php echo base_url('almacenamiento/img/letra-d/msjd2.png') ?>" alt="" class="img-fluid" width="90%">
                </div>
                <div class="d-flex justify-content-center">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/JX_AP9rO4q4" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <!-- Video 3 - Letra p-->
            <div class="video-item" id="video3" style="display:none;">
                <div class="col-lg-6 col-md-6 d-none d-sm-block">
                    <img src="<?php echo base_url('almacenamiento/img/letra-p/msjp2.png') ?>" alt="" class="img-fluid" width="90%">
                </div>
                <div class="d-flex justify-content-center">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/rXM0yXDVPeE" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>

            </div>
            <!-- Video 4 - Letra q-->
            <div class="video-item" id="video4" style="display:none;">
                <div class="col-lg-6 col-md-6 d-none d-sm-block">
                    <img src="<?php echo base_url('almacenamiento/img/letra-q/msjq2.png') ?>" alt="" class="img-fluid" width="90%">
                </div>
                <div class="d-flex justify-content-center">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/Ss9Hp6g17VM" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>

            </div>
            <!-- Añadir más videos como sea necesario -->
        </div>

        <!-- Controles -->
        <button class="carousel-control-prev" type="button" id="prevBtn">
            <img src="<?php echo base_url('almacenamiento/img/btn-anterior.png') ?>" alt="Previous" class="custom-control-prev-icon">
            <span class="visually-hidden">Regresar</span>
        </button>
        <button class="carousel-control-next" type="button" id="nextBtn">
            <img src="<?php echo base_url('almacenamiento/img/btn-siguiente.png') ?>" alt="Next" class="custom-control-next-icon">
            <span class="visually-hidden">Siguiente</span>
        </button>

    </div>
</section>

<script>
    var videos = document.getElementsByClassName('video-item');
    var currentIndex = 0;
    var backgrounds = [
        '<?php echo base_url('almacenamiento/img/letra-b/bambu.png'); ?>',
        '<?php echo base_url('almacenamiento/img/letra-d/desierto.png'); ?>',
        '<?php echo base_url('almacenamiento/img/letra-p/playa.png'); ?>',
        '<?php echo base_url('almacenamiento/img/letra-q/quetzal-fondo.png'); ?>'
    ];

    function showVideo(index) {
        // Ocultar todos los videos y pausar
        for (var i = 0; i < videos.length; i++) {
            videos[i].style.display = 'none';
            var iframe = videos[i].getElementsByTagName('iframe')[0];
            iframe.src = iframe.src; // Pausar el video
        }

        // Mostrar el video actual
        videos[index].style.display = 'block';
        document.body.style.background = 'url(' + backgrounds[index] + ')' + 'no-repeat center center fixed';
    }

    document.getElementById('prevBtn').addEventListener('click', function() {
        currentIndex = (currentIndex === 0) ? videos.length - 1 : currentIndex - 1;
        showVideo(currentIndex);
    });

    document.getElementById('nextBtn').addEventListener('click', function() {
        currentIndex = (currentIndex === videos.length - 1) ? 0 : currentIndex + 1;
        showVideo(currentIndex);
    });

    // Mostrar el primer video al cargar la página
    showVideo(currentIndex);
</script>