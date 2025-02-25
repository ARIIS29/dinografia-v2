<section class="container d-flex justify-content-center align-items-center vh-100 mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-8 login-color">
            <?php if ($this->session->flashdata('exito')) : ?>
                <div class="exito-message">
                    <?php echo $this->session->flashdata('exito'); ?>
                </div>
            <?php endif; ?>

            <div class="text-center">
                <img src="<?php echo base_url('almacenamiento/img/dinografia/text-inciarsesion.png') ?>" alt="" class="img-fluid mt-3" width="80%">
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 mb-3 offset-lg-2 text-azul mt-2">
                <form class="row g-3 needs-validation" action="<?php echo base_url('login/autenticacion'); ?>" method="POST" novalidate>
                    <div class="col-md-8">
                        <label for="usuario" class="form-label">Usuario</label>
                        <input type="text" class="form-control text-azul-caja" name="usuario" id="usuario" value="<?php echo set_value('usuario', $this->session->flashdata('usuario')); ?>" required>
                        <div class="valid-feedback">
                            Usuario correcto
                        </div>
                        <div class="invalid-feedback">
                            Ingrese su usuario por favor.
                        </div>
                        <?php if ($this->session->flashdata('error1')) : ?>
                            <div class="error-message-login">
                                <?php echo $this->session->flashdata('error1'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-8">
                        <label for="contrasenia" class="form-label">Contraseña</label>
                        <input type="password" class="form-control text-azul-caja" name="contrasenia" id="contrasenia" value="" required>
                        <div class="valid-feedback">
                            Contraseña correcta
                        </div>
                        <div class="invalid-feedback">
                            Ingrese su contraseña por favor.
                        </div>
                        <?php if ($this->session->flashdata('error2')) : ?>
                            <div class="error-message-login">
                                <?php echo $this->session->flashdata('error2'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-12 offset-lg-3">
                        <button class="btn btn-primary" type="submit">Aceptar</button>
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