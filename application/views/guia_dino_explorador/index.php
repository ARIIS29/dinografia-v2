<section class="d-flex justify-content-center align-items-center">
    <div class="container mt-10">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div id="formWizard">
                    <!-- Barra de Progreso -->
                    <ul id="progressbar" class="text-center">
                        <li class="active" id="step1"><strong>INICIO</strong></li>
                        <li id="step2"><strong>A</strong></li>
                        <li id="step3"><strong>B</strong></li>
                        <li id="step4"><strong>C</strong></li>
                        <li id="step5"><strong>D</strong></li>
                        <li id="step6"><strong>E</strong></li>
                        <li id="step7"><strong>F</strong></li>
                        <li id="step8"><strong>G</strong></li>
                        <li id="step9"><strong>H</strong></li>
                        <li id="step10"><strong>I</strong></li>
                        <li id="step11"><strong>J</strong></li>
                        <li id="step12"><strong>FIN</strong></li>
                        <li id="step13"><strong>Aventuras del Trazo</strong></li>
                    </ul>
                    <!-- Form Steps -->
                    <div class="card mt-1">
                        <div class="card-body">
                            <form id="wizardForm">
                                <div class="form-step form-step-active active text-center">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-6 col-md-6">
                                            <img src="<?php echo base_url('almacenamiento/img/escritura/recomendaciones-dino.png') ?>" alt="Dino explorador escritura" class="img-fluid dino-audio-control" style="cursor: pointer;" width="50%">
                                        </div>
                                        <div class="col-lg-6 col-md-6 texto_instrucciones">
                                            <audio id="audio" src="<?php echo base_url('almacenamiento/audios/audio_gd_inicio.mp3') ?>" preload="auto"></audio>
                                            <h2 class="text-center">¡Hola Explorador!</h2>
                                            <p>¡Bienvenido a la Guía del Dino! Esta guía ha sido creada especialmente para ayudarte a mejorar tu escritura y sentirte más seguro y cómodo mientras practicas. Antes de comenzar con las actividades, sigue estas recomendaciones clave que te ayudarán a escribir aún mejor. </p>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="button" class="btn btn-next btn-verde">Siguiente</button>
                                    </div>

                                </div>
                                <!-- A -->
                                <div class="form-step text-center active">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-6 col-md-6">
                                            <img src="<?php echo base_url('almacenamiento/img/escritura/incisoA.png') ?>" alt="Img-incisoA" class="img-fluid" width="50%">
                                        </div>

                                        <div class="col-lg-6 col-md-6 texto_instrucciones">
                                            <div>
                                                <h2 class="text-center">Siéntate correctamente: <img src="<?php echo base_url('almacenamiento/img/escritura/icono-dino.png') ?>" alt="Dino con lupa" id="dino" class="img-fluid dino-audio-control" style="cursor: pointer;" width="15%"></h2>
                                                <audio id="audio" src="<?php echo base_url('almacenamiento/audios/audio_gd_a.mp3') ?>" preload="auto"></audio>
                                                <p>Apoya tu espalda en el respaldo de la silla.</p>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 text-center">
                                        <button type="button" class="btn btn-prev btn-primary">Anterior</button>
                                        <button type="button" class="btn btn-next btn-verde">Siguiente</button>
                                    </div>

                                </div>
                                <!-- B -->
                                <div class="form-step text-center">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-6 col-md-6">
                                            <img src="<?php echo base_url('almacenamiento/img/escritura/incisoB.png') ?>" alt="Img-incisoB" class="img-fluid" width="50%">
                                        </div>
                                        <audio id="audio" src="<?php echo base_url('almacenamiento/audios/audio_gd_b.mp3') ?>" preload="auto"></audio>
                                        <div class="col-lg-6 col-md-6 texto_instrucciones">
                                            <h2 class="text-center">Mantén una distancia adecuada: <img src="<?php echo base_url('almacenamiento/img/escritura/icono-dino.png') ?>" alt="Dino con lupa" id="dino" class="img-fluid dino-audio-control" style="cursor: pointer;" width="15%"></h2>
                                            <p>No acerques mucho tu cabeza a la hoja.</p>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 text-center">
                                        <button type="button" class="btn btn-prev btn-primary">Anterior</button>
                                        <button type="button" class="btn btn-next btn-verde">Siguiente</button>
                                    </div>
                                </div>
                                <!-- C -->
                                <div class="form-step text-center">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-6 col-md-6">
                                            <img src="<?php echo base_url('almacenamiento/img/escritura/incisoC.png') ?>" alt="Img-incisoC" class="img-fluid" width="50%">
                                        </div>
                                        <audio id="audio" src="<?php echo base_url('almacenamiento/audios/audio_gd_c.mp3') ?>" preload="auto"></audio>
                                        <div class="col-lg-6 col-md-6 texto_instrucciones">
                                            <h2 class="text-center">Ajusta tu posición: <img src="<?php echo base_url('almacenamiento/img/escritura/icono-dino.png') ?>" alt="Dino con lupa" id="dino" class="img-fluid dino-audio-control" style="cursor: pointer;" width="15%"></h2>
                                            <p>Acerca la silla a la mesa para estar cómodo.</p>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="button" class="btn btn-prev btn-primary">Anterior</button>
                                        <button type="button" class="btn btn-next btn-verde">Siguiente</button>
                                    </div>
                                </div>
                                <!-- D -->
                                <div class="form-step text-center">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-6 col-md-6">
                                            <img src="<?php echo base_url('almacenamiento/img/escritura/incisoD.png') ?>" alt="Img-incisoD" class="img-fluid" width="50%">
                                        </div>
                                        <audio id="audio" src="<?php echo base_url('almacenamiento/audios/audio_gd_d.mp3') ?>" preload="auto"></audio>
                                        <div class="col-lg-6 col-md-6 texto_instrucciones">
                                            <h2 class="text-center">Alínea tu silla: <img src="<?php echo base_url('almacenamiento/img/escritura/icono-dino.png') ?>" alt="Dino con lupa" id="dino" class="img-fluid dino-audio-control" style="cursor: pointer;" width="15%"></h2>
                                            <p>Coloca el respaldo alineado con la mesa.</p>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="button" class="btn btn-prev btn-primary">Anterior</button>
                                        <button type="button" class="btn btn-next btn-verde">Siguiente</button>
                                    </div>
                                </div>
                                <!-- E -->
                                <div class="form-step text-center">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-6 col-md-6">
                                            <img src="<?php echo base_url('almacenamiento/img/escritura/incisoE.png') ?>" alt="Img-incisoE" class="img-fluid" width="50%">
                                        </div>
                                        <audio id="audio" src="<?php echo base_url('almacenamiento/audios/audio_gd_e.mp3') ?>" preload="auto"></audio>
                                        <div class="col-md-6  col-sm-12 texto_instrucciones">
                                            <h2 class="text-center">Evita mover el papel: <img src="<?php echo base_url('almacenamiento/img/escritura/icono-dino.png') ?>" alt="Dino con lupa" id="dino" class="img-fluid dino-audio-control" style="cursor: pointer;" width="15%"></h2>
                                            <p>Mantén el papel fijo para que los renglones no salgan torcidos.</p>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="button" class="btn btn-prev btn-primary">Anterior</button>
                                        <button type="button" class="btn btn-next btn-verde">Siguiente</button>
                                    </div>
                                </div>
                                <!-- F -->
                                <div class="form-step text-center">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-6 col-md-6">
                                            <img src="<?php echo base_url('almacenamiento/img/escritura/incisoF.png') ?>" alt="Img-incisoF" class="img-fluid" width="50%">
                                        </div>
                                        <audio id="audio" src="<?php echo base_url('almacenamiento/audios/audio_gd_f.mp3') ?>" preload="auto"></audio>
                                        <div class="col-lg-6 col-md-6 texto_instrucciones">
                                            <h2 class="text-center">Posición de los dedos: <img src="<?php echo base_url('almacenamiento/img/escritura/icono-dino.png') ?>" alt="Dino con lupa" id="dino" class="img-fluid dino-audio-control" style="cursor: pointer;" width="15%"></h2>
                                            <p>No pongas los dedos muy separados de la punta del lápiz.</p>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="button" class="btn btn-prev btn-primary">Anterior</button>
                                        <button type="button" class="btn btn-next btn-verde">Siguiente</button>
                                    </div>
                                </div>
                                <!-- G -->
                                <div class="form-step text-center">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-6 col-md-6">
                                            <img src="<?php echo base_url('almacenamiento/img/escritura/incisoG.png') ?>" alt="Img-incisoG" class="img-fluid" width="50%">
                                        </div>
                                        <audio id="audio" src="<?php echo base_url('almacenamiento/audios/audio_gd_g.mp3') ?>" preload="auto"></audio>
                                        <div class="col-lg-6 col-md-6 texto_instrucciones">
                                            <h2 class="text-center">Evita la fatiga: <img src="<?php echo base_url('almacenamiento/img/escritura/icono-dino.png') ?>" alt="Dino con lupa" id="dino" class="img-fluid dino-audio-control" style="cursor: pointer;" width="15%"></h2>
                                            <p>No acerques demasiado los dedos a la punta del lápiz, para que puedas ver lo que escribes sin cansarte.</p>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="button" class="btn btn-prev btn-primary">Anterior</button>
                                        <button type="button" class="btn btn-next btn-verde">Siguiente</button>
                                    </div>
                                </div>
                                <!-- H -->
                                <div class="form-step text-center">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-6 col-md-6">
                                            <img src="<?php echo base_url('almacenamiento/img/escritura/incisoH.png') ?>" alt="Img-incisoH" class="img-fluid" width="50%">
                                        </div>
                                        <audio id="audio" src="<?php echo base_url('almacenamiento/audios/audio_gd_h.mp3') ?>" preload="auto"></audio>
                                        <div class="col-lg-6 col-md-6 texto_instrucciones">
                                            <h2 class="text-center">Sujeta el lápiz correctamente: <img src="<?php echo base_url('almacenamiento/img/escritura/icono-dino.png') ?>" alt="Dino con lupa" id="dino" class="img-fluid dino-audio-control" style="cursor: pointer;" width="15%"></h2>
                                            <p>Coloca los dedos sobre el lápiz a una distancia de 2 a 3 centímetros de la hoja.</p>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="button" class="btn btn-prev btn-primary">Anterior</button>
                                        <button type="button" class="btn btn-next btn-verde">Siguiente</button>
                                    </div>
                                </div>
                                <!-- I -->
                                <div class="form-step text-center">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-6 col-md-6">
                                            <img src="<?php echo base_url('almacenamiento/img/escritura/incisoI.png') ?>" alt="Img-incisoI" class="img-fluid" width="50%">
                                        </div>
                                        <audio id="audio" src="<?php echo base_url('almacenamiento/audios/audio_gd_i.mp3') ?>" preload="auto"></audio>
                                        <div class="col-lg-6 col-md-6 texto_instrucciones">
                                            <h2 class="text-center">Si escribes con la mano derecha: <img src="<?php echo base_url('almacenamiento/img/escritura/icono-dino.png') ?>" alt="Dino con lupa" id="dino" class="img-fluid dino-audio-control" style="cursor: pointer;" width="15%"></h2>
                                            <p> Inclina el papel ligeramente hacia la izquierda.</p>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="button" class="btn btn-prev btn-primary">Anterior</button>
                                        <button type="button" class="btn btn-next btn-verde">Siguiente</button>
                                    </div>
                                </div>
                                <!-- J -->
                                <div class="form-step text-center">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-6 col-md-6">
                                            <img src="<?php echo base_url('almacenamiento/img/escritura/incisoJ.png') ?>" alt="Img-incisoJ" class="img-fluid" width="50%">
                                        </div>
                                        <audio id="audio" src="<?php echo base_url('almacenamiento/audios/audio_gd_j.mp3') ?>" preload="auto"></audio>
                                        <div class="col-lg-6 col-md-6 texto_instrucciones">
                                            <h2 class="text-center">Si escribes con la mano izquierda: <img src="<?php echo base_url('almacenamiento/img/escritura/icono-dino.png') ?>" alt="Dino con lupa" id="dino" class="img-fluid dino-audio-control" style="cursor: pointer;" width="15%"></h2>
                                            <p>Inclina el papel ligeramente hacia la derecha. </p>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="button" class="btn btn-prev btn-primary">Anterior</button>
                                        <button type="button" class="btn btn-next btn-verde">Siguiente</button>
                                    </div>
                                </div>
                                <!-- fin -->
                                <div class="form-step text-center">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-6 col-md-6">
                                            <img src="<?php echo base_url('almacenamiento/img/escritura/recomendaciones-dino.png') ?>" alt="Img-Fin" class="img-fluid dino-audio-control" style="cursor: pointer;" width="50%">
                                        </div>
                                        <audio id="audio" src="<?php echo base_url('almacenamiento/audios/audio_gd_fin.mp3') ?>" preload="auto"></audio>
                                        <div class="col-lg-6 col-md-6 texto_instrucciones">
                                            <h2 class="text-center">¡Haz llegado al fin de la guía!</h2>
                                            <br>
                                            <p> Recuerda que una buena postura es la base para una escritura clara y ordenada. <br>
                                                ¡Sigue estas recomendaciones del Dino Explorador y prepárate para grandes aventuras en el mundo de la escritura!</p>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="button" class="btn btn-prev btn-primary">Anterior</button>
                                        <button type="button" class="btn btn-next btn-verde">Siguiente</button>
                                    </div>
                                </div>

                                <!-- Aventuras DEL TRAZO -->
                                <div class="form-step text-center">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-6 col-md-6 texto_instrucciones mt-2">
                                            <h2 class="text-center">¡Llegó el momento de continuar con la aventura!<img src="<?php echo base_url('almacenamiento/img/escritura/icono-dino.png') ?>" alt="Dino con lupa" id="dino" class="img-fluid dino-audio-control" style="cursor: pointer;" width="15%"></h2>
                                            <p>
                                                Ahora que conoces lo necesario, ¡es hora de seguir explorando y enfrentarte a nuevos desafíos!
                                                Da clic en el botón <b>"Aventuras del Trazo"</b> para seguir explorando.
                                            </p>
                                        </div>
                                        <audio id="audio" src="<?php echo base_url('almacenamiento/audios/audio_gd_fin_at.mp3') ?>" preload="auto"></audio>

                                        <div class="col-lg-6 col-md-6 mt-5">
                                            <a href="<?php echo base_url('Aventuras_del_trazo') ?>">
                                                <img src="<?php echo base_url('almacenamiento/img/botones/btn-aventuras_del_trazo.png') ?>" alt="Boton Aventuras del trazo" class="img-fluid boton-animacion-pulso" width="40%">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="button" class="btn btn-prev btn-primary">Anterior</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <br>
    </div>
</section>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        const formSteps = document.querySelectorAll('.form-step');
        const nextButtons = document.querySelectorAll('.btn-next');
        const prevButtons = document.querySelectorAll('.btn-prev');
        const progressbarItems = document.querySelectorAll('#progressbar li');
        let formStepIndex = 0;
        let currentAudio = null;

        function playAudio() {
            if (currentAudio) {
                currentAudio.pause();
                currentAudio.currentTime = 0;
            }

            const audio = formSteps[formStepIndex].querySelector('audio');
            if (audio) {
                currentAudio = audio;
                audio.play().catch(error => {
                    console.log("Error al reproducir el audio automáticamente:", error);
                });
            }
        }

        function toggleAudio(imgElement) {
            const audio = imgElement.closest('.form-step').querySelector('audio');
            if (audio) {
                if (audio.paused) {
                    audio.play();
                } else {
                    audio.pause();
                    audio.currentTime = 0;
                }
            }
        }

        function updateFormSteps() {
            formSteps.forEach((step, index) => {
                step.classList.toggle('form-step-active', index === formStepIndex);
            });

            progressbarItems.forEach((circle, index) => {
                if (index <= formStepIndex) {
                    circle.classList.add('active');
                } else {
                    circle.classList.remove('active');
                }
            });

            playAudio();

        }

        nextButtons.forEach(button => {
            button.addEventListener('click', () => {
                if (formStepIndex < formSteps.length - 1) {
                    formStepIndex++;
                    updateFormSteps();
                }
            });
        });

        prevButtons.forEach(button => {
            button.addEventListener('click', () => {
                if (formStepIndex > 0) {
                    formStepIndex--;
                    updateFormSteps();
                }
            });
        });

        progressbarItems.forEach((circle, index) => {
            circle.addEventListener('click', () => {
                formStepIndex = index;
                updateFormSteps();
            });
        });

        // 🔹 Asociar el evento de clic solo a la imagen del dino dentro de cada form-step
        formSteps.forEach(step => {
            const dinoImg = step.querySelector('.dino-audio-control'); // Busca la imagen con esta clase
            if (dinoImg) {
                dinoImg.addEventListener('click', function() {
                    toggleAudio(this);
                });
            }
        });

        updateFormSteps();
    });
</script>