<section class="d-flex align-items-center mt-13" id="menuPrincipal">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 d-none d-sm-block btn-transicion text-center">
                <a class="btn-trigger" href="javascript:void(0)" onclick="showFloatingButtons('group1')">
                    <img src="<?php echo base_url('almacenamiento/img/botones/comienza_aventura.png') ?>" alt="" class="img-fluid enlargable" width="55%">
                </a>
            </div>
            <div class="col-lg-4 col-md-4 d-none d-sm-block btn-transicion text-center">
                <a class="btn-trigger" href="javascript:void(0)" onclick="showFloatingButtons('group2')">
                    <img src="<?php echo base_url('almacenamiento/img/botones/zona_aprendizaje-btn.png') ?>" alt="" class="img-fluid enlargable" width="55%">
                </a>
            </div>
            <div class="col-lg-4 col-md-4 d-none d-sm-block btn-transicion text-center">
                <a class="btn-trigger" href="javascript:void(0)" onclick="showFloatingButtons('group3')">
                    <img src="<?php echo base_url('almacenamiento/img/botones/mi_progreso-btn.png') ?>" alt="" class="img-fluid enlargable" width="55%">
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Grupos de botones flotantes -->
<div class="floating-buttons" id="group1" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);">
    <button class="btn-close" onclick="closeFloatingButtons('group1')"></button>
    <div class="row">
        <p>¡Ha llegado el momento de empezar, explorador! Haz clic en uno de los botones y comencemos la aventura.</p>
        <div class="col-6 text-center btn-transicion">
            <a href="<?php echo base_url('escritura') ?>">
                <img src="<?php echo base_url('almacenamiento/img/botones/bitacora-explorador.png') ?>" alt="" class="img-fluid enlargable" width="55%">
            </a>
        </div>
        <div class="col-6 text-center btn-transicion">
            <a href="<?php echo base_url('exploremos') ?>">
                <img src="<?php echo base_url('almacenamiento/img/botones/exploremos-btn.png') ?>" alt="" class="img-fluid enlargable" width="55%">
            </a>
        </div>
    </div>
</div>

<div class="floating-buttons" id="group2" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);">
    <button class="btn-close" onclick="closeFloatingButtons('group2')"></button>
    <div class="row">
        <p>¡Sumérgete en la aventura del aprendizaje y haz clic en un botón para comenzar!</p>
        <div class="col-6 text-center btn-transicion">
            <a href="<?php echo base_url('RutaTrazo') ?>">
                <img src="<?php echo base_url('almacenamiento/img/btn-rutatrazo.png') ?>" alt="" class="img-fluid enlargable" width="55%">
            </a>
        </div>
        <div class="col-6 text-center btn-transicion">
            <a href="<?php echo base_url('AventurasTrazo') ?>">
                <img src="<?php echo base_url('almacenamiento/img/botones/aventuras_trazo_btn.png') ?>" alt="" class="img-fluid enlargable" width="55%">
            </a>
        </div>
        <div class="col-6 text-center btn-transicion">
            <a href="<?php echo base_url('grafismo') ?>">
                <img src="<?php echo base_url('almacenamiento/img/botones/grafismo-btn.png') ?>" alt="" class="img-fluid enlargable" width="55%">
            </a>
        </div>
        <div class="col-6 text-center btn-transicion">
            <a href="<?php echo base_url('trazos_arena') ?>">
                <img src="<?php echo base_url('almacenamiento/img/botones/arena-btn.png') ?>" alt="" class="img-fluid enlargable" width="55%">
            </a>
        </div>
    </div>
</div>

<div class="floating-buttons" id="group3" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);">
    <button class="btn-close" onclick="closeFloatingButtons('group3')"></button>
    <div class="row">
        <p> ¡Mide tu progreso, explorador!</p>
        <div class="col-4 text-center btn-transicion">
            <a href="<?php echo base_url('menuGalerias') ?>">
                <img src="<?php echo base_url('almacenamiento/img/botones/galerias-btn.png') ?>" alt="" class="img-fluid enlargable" width="55%">
            </a>
        </div>
        <div class="col-4 text-center btn-transicion">
            <a href="<?php echo base_url('evaluacion_lecciones') ?>">
                <img src="<?php echo base_url('almacenamiento/img/botones/evaluacion_lecciones_btn.png') ?>" alt="" class="img-fluid enlargable" width="55%">
            </a>
        </div>
        <div class="col-4 text-center btn-transicion">
            <a href="<?php echo base_url('evaluacion_ejercicios') ?>">
                <img src="<?php echo base_url('almacenamiento/img/botones/evaluacion_ejercicios_btn.png') ?>" alt="" class="img-fluid enlargable" width="55%">
            </a>
        </div>
    </div>
</div>


<script>
    function showFloatingButtons(groupId) {
        // Oculta los botones principales
        document.getElementById('menuPrincipal').style.display = 'none';

        // Oculta todos los grupos de botones flotantes
        const allGroups = document.querySelectorAll('.floating-buttons');
        allGroups.forEach(group => group.style.display = 'none');

        // Muestra el grupo seleccionado
        document.getElementById(groupId).style.display = 'block';
    }

    function closeFloatingButtons(groupId) {
        // Oculta el grupo de botones flotantes
        document.getElementById(groupId).style.display = 'none';
        // Muestra los botones principales nuevamente
        document.getElementById('menuPrincipal').style.display = 'block';
    }
</script>