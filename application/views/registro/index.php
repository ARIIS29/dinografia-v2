<section class="container d-flex justify-content-center align-items-center vh-100 mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-8 login-color">
            <?php if ($this->session->flashdata('usuario_existente')) : ?>
                <div class="error-message">
                    <?php echo $this->session->flashdata('usuario_existente'); ?>
                </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('error')) : ?>
                <div class="error-message">
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>
            <div class="text-center">
                <img src="<?php echo base_url('almacenamiento/img/dinografia/text-registrar.png') ?>" alt="" class="img-fluid mt-3" width="70%">
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 mb-3 text-start text-azul row g-3 needs-validation d-flex justify-content-center align-items-center" novalidate>
                <form class="row g-3 needs-validation d-flex justify-content-center align-items-center" action="<?php echo base_url('registro/registrar_usuario'); ?>" method="POST" novalidate>
                    <div class="col-md-8">
                        <label for="usuario" class="form-label">Crear usuario</label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control text-azul-caja" name="usuario" id="usuario" aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                                Por favor ingrese su usuario.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <label for="contrasenia" class="form-label">Crear contraseña</label>
                        <input type="password" class="form-control text-azul-caja" name="contrasenia" id="contrasenia" value="" required>
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