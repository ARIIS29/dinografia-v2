<!-- Sección que contiene el contenido principal -->
<section class="mt-10">
    <div class="col-lg-12 col-md-12 d-flex justify-content-center">
        <div id="area">
            <img id="hoja" src="<?php echo base_url('almacenamiento/img/hojas/hojab.png') ?>" alt="HojaB" class="">
            <div id="cuentaRegresiva">3</div>

            <!-- Controles para nivel e inicio del juego -->
            <div class="text-center" id="controles">
                <a class="nav-link botonDificultad btn-dificultad" data-dificultad="facil"><img src="<?php echo base_url('almacenamiento/img/botones/btn-facil.png') ?>" alt="Boton-Facil" class="img-fluid enlargable" width="30%"></a>
                <a class="nav-link botonDificultad btn-dificultad" data-dificultad="media"><img src="<?php echo base_url('almacenamiento/img/botones/btn-medio.png') ?>" alt="Boton-Media" class="img-fluid enlargable" width="30%"></a>
                <a class="nav-link botonDificultad btn-dificultad" data-dificultad="dificil"><img src="<?php echo base_url('almacenamiento/img/botones/btn-dificil.png') ?>" alt="Boton-dificil" class="img-fluid enlargable" width="30%"></a>
            </div>

        </div>
        <!-- Botón de reinicio centrado (escondido inicialmente) -->
        <button id="botonReiniciar">Reiniciar Juego</button>
    </div>
</section>

<script>
    let hoja = document.getElementById('hoja');
    let puntuacion = document.getElementById('puntaje');
    let barraProgreso = document.getElementById('barraProgreso');
    let controles = document.getElementById('controles');
    let botonReiniciar = document.getElementById('botonReiniciar');
    let minutosDisplay = document.getElementById('minutos');
    let segundosDisplay = document.getElementById('segundos');
    let cuentaRegresiva = document.getElementById('cuentaRegresiva');
    

    let puntaje = 0;
    let metaPuntos = 0;
    let intervaloJuego;
    let tiempoHoja = 2000;
    let tiempo = 0;
    let intervaloCronometro;

   function posicionAleatoria() {
        let area = document.getElementById('area');
        let x = Math.random() * (area.offsetWidth - 50);
        let y = Math.random() * (area.offsetHeight - 50);
        return { x, y };
    }

    function movimientoHoja() {
        let pos = posicionAleatoria();
        hoja.style.left = pos.x + 'px';
        hoja.style.top = pos.y + 'px';
        hoja.style.display = 'block';

        setTimeout(() => {
            hoja.style.display = 'none';
        }, tiempoHoja);
    }

    function iniciarCronometro() {
        tiempo = 0;
        minutosDisplay.innerText = '0';
        segundosDisplay.innerText = '00';
        intervaloCronometro = setInterval(() => {
            tiempo++;
            let minutos = Math.floor(tiempo / 60);
            let segundos = tiempo % 60;
            minutosDisplay.innerText = minutos;
            segundosDisplay.innerText = segundos < 10 ? '0' + segundos : segundos;
        }, 1000);
    }

    function detenerCronometro() {
        clearInterval(intervaloCronometro);
    }

    function iniciarCuentaRegresiva(dificultad, callback) {
        let contador = 3;
        cuentaRegresiva.style.display = 'block';
        cuentaRegresiva.innerText = contador;

        let intervalo = setInterval(() => {
            contador--;
            if (contador > 0) {
                cuentaRegresiva.innerText = contador;
            } else {
                clearInterval(intervalo);
                cuentaRegresiva.style.display = 'none';
                callback();
            }
        }, 1000);
    }

    function iniciarJuego(dificultad) {
        puntaje = 0;
        puntuacion.innerText = puntaje;
        barraProgreso.value = 0;

        if (dificultad === 'facil') {
            tiempoHoja = 2000;
            metaPuntos = 5;
            hoja.style.width = '100px';
            hoja.style.height = '100px';
        } else if (dificultad === 'media') {
            tiempoHoja = 1500;
            metaPuntos = 10;
            hoja.style.width = '70px';
            hoja.style.height = '70px';
        } else if (dificultad === 'dificil') {
            tiempoHoja = 1000;
            metaPuntos = 15;
            hoja.style.width = '50px';
            hoja.style.height = '50px';
        }

        clearInterval(intervaloJuego);
        intervaloJuego = setInterval(movimientoHoja, tiempoHoja + 500);

        iniciarCronometro();
    }

    function finalizarJuego() {
        clearInterval(intervaloJuego);
        detenerCronometro();
        alert('¡Felicidades! Has atrapado todos los insectos de este nivel.');
        // botonReiniciar.style.display = 'block';
    }

    function reiniciarJuego() {
        detenerCronometro();
        clearInterval(intervaloJuego);
        controles.style.display = 'flex';
        botonReiniciar.style.display = 'none';
        puntuacion.innerText = 0; // Reiniciar puntaje
        barraProgreso.value = 0; // Reiniciar barra de progreso
    }

    hoja.addEventListener('click', () => {
        puntaje++;
        puntuacion.innerText = puntaje;

        let progress = (puntaje / metaPuntos) * 100;
        barraProgreso.value = progress;

        hoja.style.display = 'none';

        if (puntaje >= metaPuntos) {
            finalizarJuego();
        }
    });

    const botonesDificultad = document.querySelectorAll('.botonDificultad');

    botonesDificultad.forEach(boton => {
        boton.addEventListener('click', () => {
            controles.style.display = 'none'; // Ocultar controles
            const dificultad = boton.getAttribute('data-dificultad');
            iniciarCuentaRegresiva(dificultad, () => iniciarJuego(dificultad)); // Iniciar cuenta regresiva
        });
    });


</script>
</script>