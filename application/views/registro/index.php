<section class="container mt-10">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-6 col-sm-12 mt-3 mb-3 text-center registro-color d-none d-sm-block">
            <?php if ($this->session->flashdata('error')) : ?>
                <div class="error-message">
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('registro_exitoso')) : ?>
                <div class="exito-message">
                    <?php echo $this->session->flashdata('registro_exitoso'); ?>
                </div>
            <?php endif; ?>
            <img src="<?php echo base_url('almacenamiento/img/text-registrar.png') ?>" alt="" class="img-fluid mt-3" width="80%">
            <div class="col-lg-12 col-md-12 col-sm-12 mb-3 text-start row g-3 needs-validation d-flex justify-content-center align-items-center" novalidate>
                <form class="row g-3 needs-validation d-flex justify-content-center align-items-center" action="<?php echo base_url('registro/registrar_usuario'); ?>" method="POST" novalidate>
                    <div class="col-md-8">
                        <label for="usuario" class="form-label">Crear usuario</label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control" name="usuario" id="usuario" aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                                Por favor ingrese su usuario.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <label for="contrasenia" class="form-label">Crear contraseña</label>
                        <input type="password" class="form-control" name="contrasenia" id="contrasenia" value="" required>
                        <div class="invalid-feedback">
                            Por favor ingrese su contraseña.
                        </div>
                    </div>

                    <div class="col-12 d-flex justify-content-center">
                        <button class="btn btn-primary" type="submit">Registrarte</button>
                    </div>
                </form>

            </div>
        </div>
        <!-- división para telefono -->
        <div class="col-lg-6 col-md-6 col-sm-12 text-center registro-color d-block d-sm-none mt-30">
            <img src="<?php echo base_url('almacenamiento/img/text-registrar.png') ?>" alt="" class="img-fluid" width="80%">
            <div class="col-lg-12 col-md-12 col-sm-12 mb-3 text-start">
                <form class="row g-3 needs-validation" novalidate>
                    <div class="col-md-6">
                        <label for="validationCustomUsername" class="form-label">Usuario</label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                                Por favor ingrese su usuario.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label float-start">Contraseña</label>
                        <input type="password" class="form-control" id="validationCustom02" value="" required>
                        <div class="invalid-feedback">
                            Por favor ingrese su contraseña.
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label" for="fecha_nacimiento">Fecha de nacimiento
                        </label>
                        <div class="col-md-12 col-sm-12 ">
                            <input name="fecha_nacimiento" id="fecha_nacimiento" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                            <!-- Script para cambiar el tipo de entrada de fecha a texto después de 1 minuto -->
                            <script>
                                function timeFunctionLong(input) {
                                    setTimeout(function() {
                                        input.type = 'text';
                                    }, 60000);
                                }
                            </script>
                            <div class="invalid-feedback">
                                Por favor ingrese su fecha de nacimiento.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom04" class="form-label">Sexo</label>
                        <div class="d-flex justify-content-start">
                            <!-- Utilizamos flexbox para alinear los elementos -->
                            <div class="form-check me-3">
                                <!-- Agregamos clase 'me-3' para separación entre elementos -->
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="" required>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Mujer
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="" required>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Hombre
                                </label>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            Por favor seleccione una opción.
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="validationCustom05" class="form-label">Edad</label>
                        <input type="number" class="form-control" id="validationCustom05" value="" required min="1" step="1">
                        <div class="valid-feedback">
                            ¡Bien!
                        </div>
                        <div class="invalid-feedback">
                            Por favor ingresa su edad.
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                            <label class="form-check-label" for="invalidCheck">
                                Acepto términos y condiciones.
                            </label>
                            <div class="invalid-feedback">
                                Debe aceptar términos y condicones.
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <button class="btn btn-primary" type="submit">Registrarte</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</section>


<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>