<!-- Sección que contiene el contenido principal -->
<section class="mt-8">
    <div class="container">
        <div class="row d-flex justify-content-evenly">
            <p class="indicaciones mt-5">En esta sección se muestran los trazos que realizaste de la letra d.¡Evalúa tu desempeño en los trazos como explorador!.</p>
            <?php foreach ($galeriasd_lista as $key => $galeria) : ?>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div id="card1" class="card me-5">
                        <div id="cara1" class="cara cara1 d-block">
                            <div class="content bg-<?php echo $galeria->evaluacion; ?>">
                                <img src="<?php echo '../' . $galeria->url_imagen; ?>" width="200%" class="img-fluid">
                                <h6 class="card-title ms-1">Trazo <?php echo $key + 1 ?></h6>
                                <h6 class="card-text ms-1">Fecha: <?php echo $galeria->fecha_registro ?></h6>
                            </div>
                        </div>
                        <?php if ($galeria->evaluacion == null) : ?>
                            <div id="cara2" class="cara cara2">
                                <div class="content">
                                    <h5 class="text-center texto-azul mt-5"><b>Precisión del trazo</b></h5>
                                    <ul>
                                        <li class="bueno"><a class="texto-verde" title="El trazo es muy preciso. La curva y la línea vertical están en el lugar perfecto." href="<?php echo base_url('galeria/guardar_bueno/' . $galeria->identificador); ?>" id="bueno">¡Super asombroso! 🎉</a></li>
                                        <li class="regular"> <a class="texto-amarillo" title="El trazo está muy bien, solo falta un pequeño ajuste en la curva o línea." href="<?php echo base_url('galeria/guardar_regular/' . $galeria->identificador); ?>" id="regular">¡Casi logrado! 🌟</a></li>
                                        <li class="malo"><a class="texto-naranja" title="El trazo necesita más precisión en la curva o línea." href="<?php echo base_url('galeria/guardar_malo/' . $galeria->identificador); ?>" id="malo">¡A seguir practicando! 💪</a></li>
                                    </ul>
                                </div>
                            </div>
                        <?php elseif ($galeria->evaluacion == 'bueno') : ?>
                            <div id="cara2" class="cara cara2">
                                <div class="content texto-verde">
                                    <h5 class="text-center"><b>¡Super asombroso! 🎉</b></h5>
                                    <p>¡Increíble! Tu trazo es muy preciso. La curva y la línea vertical están en el lugar perfecto. Sigue así, ¡lo estás haciendo genial! <img src="<?php echo base_url('almacenamiento/img/letra-b/dino-verde-evaluacion.png'); ?>" alt="" width="12%"></p>
                                </div>
                            </div>
                        <?php elseif ($galeria->evaluacion == 'regular') : ?>
                            <div id="cara2" class="cara cara2">
                                <div class="content texto-amarillo">
                                    <h5 class="text-center mt-3"><b>¡Casi lo logras! 🌟</b></h5>
                                    <p>¡Buen intento! El trazo está muy bien, solo falta un pequeño ajuste en la curva o línea. Con un poco más de práctica, ¡será perfecto! Sigue practicando, ¡estás muy cerca! <img src="<?php echo base_url('almacenamiento/img/letra-q/dino-amarillo-evaluacion.png'); ?>" alt="" width="12%"></p>
                                </div>
                            </div>
                        <?php elseif ($galeria->evaluacion == 'malo') : ?>
                            <div id="cara2" class="cara cara2">
                                <div class="content texto-naranja">
                                    <h5 class="text-center mt-3"><b>¡A seguir practicando! 💪</b></h5>
                                    <p>No pasa nada, lo importante es que sigas intentándolo. El trazo necesita más precisión, pero cada vez que lo intentas, mejoras. ¡No te rindas, lo estás haciendo cada vez mejor! <img src="<?php echo base_url('almacenamiento/img/letra-d/dino-naranja-evaluacion.png'); ?>" alt="" width="12%"></p>
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