<!-- Sección que contiene el contenido principal -->
<section class="d-flex justify-content-center align-items-center mt-3">
    <div class="container">
        <div class="row d-flex justify-content-evenly">
            <div id="tutorialModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background-color:rgba(221, 247, 216, 0.8); justify-content:center; align-items:center; z-index:1000;">
                <div style="position:relative; background:#fff; padding:10px; border-radius:10px; max-width:90%; width:600px;">
                    <video id="tutorialVideo" width="100%" controls>
                        <source src="<?php echo base_url('almacenamiento/img/bosque_bambu/tutorial_b/b_tutorial_galeria_arena.mp4'); ?>" type="video/mp4">
                        Tu navegador no soporta el video.
                    </video>
                    <button id="cerrarTutorial" type="button" class="btn btn-danger" style="position:absolute; top:10px; right:10px;">Cerrar</button>
                </div>
            </div>
            <div class="row d-flex justify-content-evenly">
                <div class="col-lg-12 col-md-12 d-flex align-items-center mt-10">
                    <!-- Imagen -->
                    <img src="<?php echo base_url('almacenamiento/img/dinografia/dino-galeria-b.png') ?>" alt="Img-Dino-Indicaciones" class="img-fluid me-4 d-none d-sm-block" id="dino" width="5%">
                    <!-- Texto -->
                    <p class="texto_tabla_bambu"> <b>¡Hola <?php echo $this->session->userdata('usuario') ?>, es hora de evaluar tu trazo en la arena!! 📝</b> <br></p>

                </div>
                <div class="col-12 indicaciones">
                    <p>
                        Aquí puedes ver los trazos que hiciste en <b>"Trazos en la Arena".
                        </b> <br>
                        Observa con atención cada trazo y elige la opción que mejor describe tu trabajo.
                    </p>
                    <a id="abrirTutorial" class="btn galeria-trazos-arena me-2"><i class="fas fa-clipboard-check"></i> Guía para evaluar mi trazo</a>
                    </p>
                    <div class="row">
                        <div class="col-4">
                            <p>🟢¡Super asombroso! 🎉</p>
                        </div>
                        <div class="col-4">
                            <p>🟡¡Casi logrado! 🌟</p>

                        </div>
                        <div class="col-4">
                            🟠¡A seguir practicando! 💪

                        </div>

                    </div>
                </div>

                <?php foreach ($galeriasb_lista as $key => $galeria) : ?>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div id="card1" class="card me-5">
                            <div id="cara1" class="cara cara1 d-block">
                                <div class="content bg-<?php echo $galeria->evaluacion; ?>">
                                    <img src="<?php echo '../' . $galeria->url_imagen; ?>" width="200%" class="img-fluid">
                                    <h6 class="card-title texto ms-1">Trazo <?php echo $key + 1 ?></h6>
                                    <h6 class="card-text texto ms-1">Fecha: <?php echo $galeria->fecha_registro ?></h6>
                                </div>
                            </div>
                            <?php if ($galeria->evaluacion == null) : ?>
                                <div id="cara2" class="cara cara2">
                                    <div class="content">
                                        <h5 class="text-center indicaciones mt-4"><b>Evalúa tu trazo 📝:</b></h5>
                                        <ul>
                                            <li class="bueno"><a class="texto-verde" title="El trazo en la arena se ve muy claro. La curva y la línea están en su lugar perfecto." href="<?php echo base_url('galeria/guardar_bueno/' . $galeria->identificador); ?>" id="bueno">🎉 ¡Super asombroso!</a></li>
                                            <li class="regular"> <a class="texto-amarillo" title="El trazo está muy bien formado en la arena, pero la curva o la línea necesitan un pequeño ajuste." href="<?php echo base_url('galeria/guardar_regular/' . $galeria->identificador); ?>" id="regular">🌟 ¡Casi logrado!</a></li>
                                            <li class="malo"><a class="texto-naranja" title="El trazo en la arena aún no se parece a la letra ‘b’.La curva o la línea necesitan más definición." href="<?php echo base_url('galeria/guardar_malo/' . $galeria->identificador); ?>" id="malo">💪 ¡A seguir practicando!</a></li>
                                        </ul>
                                    </div>
                                </div>
                            <?php elseif ($galeria->evaluacion == 'bueno') : ?>
                                <div id="cara2" class="cara cara2">
                                    <div class="content texto-verde">
                                        <h5 class="text-center"><b>¡Super asombroso! 🎉</b></h5>
                                        <p>¡Wow! Sentiste el trazo con mucha seguridad. <br>
                                            Tu dedo explorador recorrió muy bien la curva y la línea. <br>
                                            ¡Estoy muy orgulloso de ti!🦖👏 <img src="<?php echo base_url('almacenamiento/img/letra-b/dino-verde-evaluacion.png'); ?>" alt="" width="12%"></p>
                                    </div>
                                </div>
                            <?php elseif ($galeria->evaluacion == 'regular') : ?>
                                <div id="cara2" class="cara cara2">
                                    <div class="content texto-amarillo">
                                        <h5 class="text-center mt-3"><b>¡Casi lo logras! 🌟</b></h5>
                                        <p>Buen trabajo! Ya estás reconociendo la forma de la letra. Solo necesitas un poco más de práctica con tu dedo mágico.
                                            ¡Sigue así, lo estás haciendo genial! 🦖✨ <img src="<?php echo base_url('almacenamiento/img/letra-q/dino-amarillo-evaluacion.png'); ?>" alt="" width="12%"></p>
                                    </div>
                                </div>
                            <?php elseif ($galeria->evaluacion == 'malo') : ?>
                                <div id="cara2" class="cara cara2">
                                    <div class="content texto-naranja">
                                        <h5 class="text-center mt-3"><b>¡A seguir practicando! 💪</b></h5>
                                        <p>¡No te preocupes, explorador! A veces necesitamos más intentos.
                                            Cada trazo con tu dedo te ayuda a conocer mejor la letra.
                                            ¡Yo sé que puedes lograrlo!” 🦖💚 <img src="<?php echo base_url('almacenamiento/img/letra-d/dino-naranja-evaluacion.png'); ?>" alt="" width="12%"></p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- <img src="<?php echo $galeria->url_imagen ?>" alt=""> -->
                <?php endforeach ?>
            </div>

        </div>
</section>

<script>
    document.getElementById('abrirTutorial').addEventListener('click', function(e) {
        e.preventDefault(); // Evita redireccionamiento
        const modal = document.getElementById('tutorialModal');
        const video = document.getElementById('tutorialVideo');

        modal.style.display = 'flex';

        // Reproduce el video automáticamente
        video.currentTime = 0; // Reinicia por si ya se había visto antes
        video.play().catch(error => {
            console.warn('El navegador bloqueó la reproducción automática:', error);
        });
    });

    document.getElementById('cerrarTutorial').addEventListener('click', function() {
        const modal = document.getElementById('tutorialModal');
        const video = document.getElementById('tutorialVideo');

        modal.style.display = 'none';
        video.pause();
    });
    document.getElementById('evaluar').addEventListener('click', function() {
        document.getElementById('cara1').classList.remove('d-block');
        document.getElementById('cara1').classList.add('d-none');

        document.getElementById('cara2').classList.remove('d-none');
        document.getElementById('cara2').classList.add('d-block');
    });
    document.getElementById('bueno').addEventListener('click', function() {
        document.getElementById('m1').classList.remove('d-none');
        document.getElementById('m1').classList.add('d-block');

        document.getElementById('cara2').classList.remove('d-block');
        document.getElementById('cara2').classList.add('d-none');
        document.getElementById('card1').classList.add('bg-bueno');
    });

    document.getElementById('regular').addEventListener('click', function() {
        document.getElementById('m2').classList.remove('d-none');
        document.getElementById('m2').classList.add('d-block');

        document.getElementById('cara2').classList.remove('d-block');
        document.getElementById('cara2').classList.add('d-none');
        document.getElementById('card1').classList.add('bg-regular');
    });

    document.getElementById('malo').addEventListener('click', function() {
        document.getElementById('m3').classList.remove('d-none');
        document.getElementById('m3').classList.add('d-block');

        document.getElementById('cara2').classList.remove('d-block');
        document.getElementById('cara2').classList.add('d-none');
        document.getElementById('card1').classList.add('bg-malo');
    });
</script>