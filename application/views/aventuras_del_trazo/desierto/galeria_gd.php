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

            <div class="col-lg-12 col-md-12 d-flex align-items-center mt-10">
                <!-- Imagen -->
                <img src="<?php echo base_url('almacenamiento/img/dinografia/dino-galeria-b.png') ?>" alt="Img-Dino-Indicaciones" class="img-fluid me-4 d-none d-sm-block" id="dino" width="5%">
                <!-- Texto -->
                <p class="texto_tabla_bambu"> <b>¡Hola <?php echo $this->session->userdata('usuario') ?>, es hora de evaluar tu trazo de Grafísmo!! 📝</b> <br></p>

            </div>
            <div class="col-12 indicaciones">
                <p>
                    Aquí puedes ver los trazos que hiciste en <b>"Grafísmo".
                    </b> <br>
                    ¡Observa bien lo que dibujaste y dime cómo te sentiste al hacerlo!
                </p>
                <a id="abrirTutorial" class="btn galeria-grafismo me-2"><i class="fas fa-clipboard-check"></i> Guía para evaluar mi trazo</a>
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
                                        <li class="bueno"><a class="texto-verde" title="El trazo con el lápiz es muy preciso y fluido. Las líneas siguen el camino con firmeza y control." href="<?php echo base_url('galeria/guardar_bueno/' . $galeria->identificador); ?>" id="bueno">🎉 ¡Super asombroso!</a></li>
                                        <li class="regular"> <a class="texto-amarillo" title="El trazo está muy bien hecho, aunque hay pequeños detalles por ajustar, como la dirección o el control en algunas partes." href="<?php echo base_url('galeria/guardar_regular/' . $galeria->identificador); ?>" id="regular">🌟 ¡Casi logrado!</a></li>
                                        <li class="malo"><a class="texto-naranja" title="El trazo necesita más precisión y control del lápiz. Puede que algunas líneas se salgan del camino o pierdan forma." href="<?php echo base_url('galeria/guardar_malo/' . $galeria->identificador); ?>" id="malo">💪 ¡A seguir practicando!</a></li>
                                    </ul>
                                </div>
                            </div>
                        <?php elseif ($galeria->evaluacion == 'bueno') : ?>
                            <div id="cara2" class="cara cara2">
                                <div class="content texto-verde">
                                    <h5 class="text-center"><b>¡Super asombroso! 🎉</b></h5>
                                    <p>¡Eso fue increíble! <br>
                                        Usaste tu lápiz con mucha precisión.
                                        El trazo es claro, firme y muy bien hecho. <br>
                                        ¡Sigue así, pequeño artista del bosque!🦖👏 <img src="<?php echo base_url('almacenamiento/img/letra-b/dino-verde-evaluacion.png'); ?>" alt="" width="12%"></p>
                                </div>
                            </div>
                        <?php elseif ($galeria->evaluacion == 'regular') : ?>
                            <div id="cara2" class="cara cara2">
                                <div class="content texto-amarillo">
                                    <h5 class="text-center mt-3"><b>¡Casi lo logras! 🌟</b></h5>
                                    <p>El trazo con tu lápiz está muy bien. Solo necesitas ajustar un poco la forma o dirección.
                                        ¡Vas por un excelente camino! 🦖✨ <img src="<?php echo base_url('almacenamiento/img/letra-q/dino-amarillo-evaluacion.png'); ?>" alt="" width="12%"></p>
                                </div>
                            </div>
                        <?php elseif ($galeria->evaluacion == 'malo') : ?>
                            <div id="cara2" class="cara cara2">
                                <div class="content texto-naranja">
                                    <h5 class="text-center mt-3"><b>¡A seguir practicando! 💪</b></h5>
                                    <p>A veces el lápiz no va por donde queremos, pero cada trazo cuenta.
                                        Sigue practicando, poco a poco tu mano se volverá más segura.
                                        ¡Yo creo en ti! 🦖💚 <img src="<?php echo base_url('almacenamiento/img/letra-d/dino-naranja-evaluacion.png'); ?>" alt="" width="12%"></p>
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