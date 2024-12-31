const palabras = [
    { palabra: "gato", emoji: "🐱" },
    { palabra: "perro", emoji: "🐶" },
    { palabra: "ardilla", emoji: "🐿️" },
    { palabra: "oso", emoji: "🐻" },
    { palabra: "beso", emoji: "💋" },
];
const contenedorLetras = document.getElementById("contenedorLetras");
const contenedorPalabra = document.getElementById("contenedorPalabra");
const mensaje = document.getElementById("mensaje");
const emojiPalabra = document.getElementById("emojiPalabra");
const timerElement = document.getElementById('timer');
const contadorVidas = document.getElementById("contadorVidas");

let palabrasRestantes = [...palabras];
let palabrasIncorrectas = [];
let palabraActual = null;
let elementoArrastrado = null;
let timer;
let minutes = 0;
let seconds = 0;
let vidas = 3;
let touchElementoArrastrado = null;

var contadorBuenas = 0;
var palabrasCorrectas = [];
var nuevapalabrasCorrectas = [];


function startTimer() {
    timer = setInterval(() => {
        seconds++;
        if (seconds === 60) {
            minutes++;
            seconds = 0;
        }
        timerElement.textContent = `Tiempo: ${formatTime(minutes)}:${formatTime(seconds)}`;
    }, 1000);
}

function formatTime(time) {
    return time < 10 ? `0${time}` : time;
}

function mostrarJuego() {
    document.getElementById('areaJuego').style.display = 'none';
    document.getElementById('contenedorJuego').style.display = 'flex';
    iniciarJuego();
}

function iniciarJuego() {

    contenedorLetras.innerHTML = "";
    contenedorPalabra.innerHTML = "";
    mensaje.textContent = "";
    mensaje.className = "";
    mensaje.textContent2 = "";

    const indice = Math.floor(Math.random() * palabrasRestantes.length);
    palabraActual = palabrasRestantes.splice(indice, 1)[0];

    emojiPalabra.textContent = palabraActual.emoji;

    const letras = mezclar(palabraActual.palabra.split(""));
    letras.forEach(letra => {
        const casillaLetra = document.createElement("div");
        casillaLetra.textContent = letra;
        casillaLetra.classList.add("casilla-letra");
        casillaLetra.draggable = true;
        casillaLetra.addEventListener("dragstart", iniciarArrastre);
        contenedorLetras.appendChild(casillaLetra);
    });

    for (let i = 0; i < palabraActual.palabra.length; i++) {
        const casillaPalabra = document.createElement("div");
        casillaPalabra.classList.add("casilla-palabra");
        casillaPalabra.setAttribute("data-indice", i);
        casillaPalabra.addEventListener("dblclick", limpiarCasilla);
        contenedorPalabra.appendChild(casillaPalabra);
    }

}

contenedorLetras.addEventListener("touchstart", (evento) => {
    const touch = evento.targetTouches[0];
    const elemento = evento.target;

    if (elemento.classList.contains("casilla-letra")) {
        touchElementoArrastrado = elemento;

        // Clonar el elemento para la vista de arrastre
        const clone = elemento.cloneNode(true);
        clone.style.position = "absolute";
        clone.style.zIndex = "1000";
        clone.style.pointerEvents = "none";
        clone.id = "arrastradoTouch";
        document.body.appendChild(clone);

        elemento.dataset.startX = touch.clientX;
        elemento.dataset.startY = touch.clientY;
        elemento.dataset.offsetX = touch.clientX - elemento.getBoundingClientRect().left;
        elemento.dataset.offsetY = touch.clientY - elemento.getBoundingClientRect().top;
    }
});

// Mover el elemento durante el toque
document.addEventListener("touchmove", (evento) => {
    if (!touchElementoArrastrado) return;

    const touch = evento.targetTouches[0];
    const clone = document.getElementById("arrastradoTouch");
    const x = touch.clientX - touchElementoArrastrado.dataset.offsetX;
    const y = touch.clientY - touchElementoArrastrado.dataset.offsetY;

    if (clone) {
        clone.style.left = `${x}px`;
        clone.style.top = `${y}px`;
    }
});

// Soltar el elemento táctil
document.addEventListener("touchend", (evento) => {
    if (!touchElementoArrastrado) return;

    const touch = evento.changedTouches[0];
    const casillaObjetivo = document.elementFromPoint(touch.clientX, touch.clientY);

    // Eliminar la vista de arrastre
    const clone = document.getElementById("arrastradoTouch");
    if (clone) clone.remove();

    if (casillaObjetivo && casillaObjetivo.classList.contains("casilla-palabra") && !casillaObjetivo.textContent) {
        casillaObjetivo.textContent = touchElementoArrastrado.textContent;
        const indice = casillaObjetivo.dataset.indice;
        const correcto = touchElementoArrastrado.textContent === palabraActual.palabra[indice];
        casillaObjetivo.dataset.correcto = correcto;

        if (correcto) {
            touchElementoArrastrado.draggable = false;
            touchElementoArrastrado.style.opacity = 0.5;
        } else {
            touchElementoArrastrado.style.visibility = "hidden";
        }
    }

    touchElementoArrastrado = null;
});
function mezclar(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
}

function iniciarArrastre(evento) {
    elementoArrastrado = evento.target;
}

contenedorPalabra.ondragover = (evento) => evento.preventDefault();

contenedorPalabra.ondrop = (evento) => {
    evento.preventDefault();
    const objetivo = evento.target;

    if (objetivo.classList.contains("casilla-palabra") && !objetivo.textContent) {
        objetivo.textContent = elementoArrastrado.textContent;
        const indice = objetivo.dataset.indice;
        const correcto = elementoArrastrado.textContent === palabraActual.palabra[indice];
        objetivo.dataset.correcto = correcto;

        if (correcto) {
            elementoArrastrado.draggable = false;
            elementoArrastrado.style.opacity = 0.5;
        } else {
            elementoArrastrado.style.visibility = "hidden";
        }
    }
};

function limpiarCasilla(evento) {
    const casilla = evento.target;

    if (casilla.dataset.correcto === "true") return;

    const letraCorrespondiente = Array.from(contenedorLetras.children).find(
        letra => letra.style.visibility === "hidden" && letra.textContent === casilla.textContent
    );
    if (letraCorrespondiente) {
        letraCorrespondiente.style.visibility = "visible";
        casilla.textContent = "";
    }
}


function verificarPalabra() {
    // Si las vidas son 0, no ejecutar la función
    if (vidas <= 0) {
        return;
    }

    let errores = false;

    // Verificar si las letras coinciden
    Array.from(contenedorPalabra.children).forEach((casilla, i) => {
        if (casilla.textContent !== palabraActual.palabra[i]) {
            casilla.classList.add("error");
            errores = true;
        } else {
            casilla.classList.remove("error");
        }
    });

    // Manejar el caso cuando no hay errores
    if (!errores) {
        mensaje.textContent = "¡Correcto! 🎉 Bien hecho.";
        mensaje.className = "correcto";
        contadorBuenas++;
        nuevapalabrasCorrectas = palabrasCorrectas.push(palabraActual.palabra);
        console.log('Buenas', contadorBuenas);
        console.log('Palabra correcta:', palabraActual.palabra);
        console.log('Array de Palabra correcta:', nuevapalabrasCorrectas);
        for (i = 0; i < palabrasCorrectas.length; i++) {
            console.log(`${i}: ${palabrasCorrectas[i]}`);
        }

        // Verificar si se completaron todas las palabras
        if (palabrasRestantes.length === 0) {
            // Crear el mensaje inicial
            let resultado = `¡Felicidades! Has completado las ${contadorBuenas} palabras. El tiempo fue ${formatTime(minutes)}:${formatTime(seconds)}.\n\nPalabras correctas:\n`;
            document.getElementById("verificarPalabraBtn").disabled = true;
            document.getElementById("saltarPalabraBtn").disabled = true;
            document.getElementById("finalizarJuegoBtn").disabled = true;


            // Añadir cada palabra correcta al mensaje
            for (let i = 0; i < palabrasCorrectas.length; i++) {
                resultado += `${i + 1}. ${palabrasCorrectas[i]}\n`; // Formato: "1. palabra"
            }

            // Asignar el mensaje completo al elemento
            mensaje.textContent = resultado;

            // Detener el temporizador y establecer la clase
            clearInterval(timer);
            mensaje.className = "correcto";
            return;
        }

        setTimeout(iniciarJuego, 3000);
    } else {
        // Reducir vidas y mostrar mensaje de error
        mensaje.textContent = "Hay errores. Corrige la palabra.";
        mensaje.className = "incorrecto";
        vidas--;
        contadorVidas.textContent = vidas;

        // Si las vidas llegan a 0, desactivar el botón de verificar
        if (vidas <= 0) {
            mensaje.textContent = `¡Te quedaste sin vidas! Juego terminado. Total de palabras correctas: ${contadorBuenas}`;
            mensaje.className = "incorrecto";
            clearInterval(timer);
            // Desactivar los elementos del juego
            Array.from(contenedorLetras.children).forEach(letra => {
                letra.draggable = false;
                letra.style.cursor = "not-allowed";
            });
            Array.from(contenedorPalabra.children).forEach(casilla => {
                casilla.style.pointerEvents = "none";
            });
            document.getElementById("verificarPalabraBtn").disabled = true;
            document.getElementById("saltarPalabraBtn").disabled = true;
            document.getElementById("finalizarJuegoBtn").disabled = true;


        }
    }
}

function saltarPalabra() {
    palabrasRestantes.push(palabraActual);
    iniciarJuego();
}
function finalizarJuego() {
    // Detener el cronómetro
    clearInterval(timer);

    // Mostrar un mensaje con el tiempo y los aciertos
    mensaje.textContent = `Juego finalizado. Tiempo total: ${formatTime(minutes)}:${formatTime(seconds)}. Aciertos: ${contadorBuenas}`;
    mensaje.className = "correcto";

    // Desactivar los elementos del juego
    Array.from(contenedorLetras.children).forEach(letra => {
        letra.draggable = false;
        letra.style.cursor = "not-allowed";
    });
    Array.from(contenedorPalabra.children).forEach(casilla => {
        casilla.style.pointerEvents = "none";
    });

    // Deshabilitar los botones para evitar interacción adicional
    document.getElementById("verificarPalabraBtn").disabled = true;
    document.getElementById("saltarPalabraBtn").disabled = true;
    document.getElementById("finalizarJuegoBtn").disabled = true;

}
function reiniciarJuego() {
    clearInterval(timer); // Detener el cronómetro anterior
    minutes = 0;
    seconds = 0;
    timerElement.textContent = "Tiempo: 00:00";

    vidas = 3; // Reiniciar vidas
    contadorVidas.textContent = vidas;

    contadorBuenas = 0; // Reiniciar aciertos
    palabrasRestantes = [...palabras]; // Volver a llenar las palabras restantes
    palabrasCorrectas = [];
    mensaje.textContent = ""; // Limpiar mensajes
    mensaje.className = "";

    document.getElementById("verificarPalabraBtn").disabled = false;
    document.getElementById("saltarPalabraBtn").disabled = false;
    document.getElementById("finalizarJuegoBtn").disabled = false;

    iniciarJuego(); // Iniciar el juego de nuevo
    startTimer(); // Iniciar el cronómetro
}


iniciarJuego();
startTimer();