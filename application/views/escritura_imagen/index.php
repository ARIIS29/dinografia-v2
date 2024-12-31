<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversión de Escritura a Texto</title>
    <style>
        #canvas {
            border: 1px solid black;
            touch-action: none;
        }

        .controls {
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <h1>Escribe algo en el canvas</h1>

    <canvas id="canvas" width="500" height="300"></canvas>
    <div class="controls">
        <button id="clearCanvas">Limpiar</button>
        <button id="convertToText">Convertir a Texto</button>
    </div>

    <p id="output"></p>

    <script src="https://cdn.jsdelivr.net/npm/tesseract.js@4/dist/tesseract.min.js"></script>


    <script>
        const canvas = document.getElementById('canvas');
        const ctx = canvas.getContext('2d');
        let drawing = false;
        let lastX = 0;
        let lastY = 0;

        // Configuración de suavizado
        ctx.lineCap = 'round'; // Hace que las líneas sean más suaves en los extremos
        ctx.lineJoin = 'round'; // Suaviza las uniones entre líneas

        // Variables para dibujar en el canvas con suavizado
        canvas.addEventListener('mousedown', (e) => startDrawing(e.offsetX, e.offsetY));
        canvas.addEventListener('mousemove', (e) => draw(e.offsetX, e.offsetY));
        canvas.addEventListener('mouseup', stopDrawing);
        canvas.addEventListener('mouseleave', stopDrawing);

        // Eventos para pantalla táctil
        canvas.addEventListener('touchstart', (e) => {
            const touch = e.touches[0];
            const rect = canvas.getBoundingClientRect();
            startDrawing(touch.clientX - rect.left, touch.clientY - rect.top);
        }, {
            passive: false
        });

        canvas.addEventListener('touchmove', (e) => {
            const touch = e.touches[0];
            const rect = canvas.getBoundingClientRect();
            draw(touch.clientX - rect.left, touch.clientY - rect.top);
        }, {
            passive: false
        });

        canvas.addEventListener('touchend', stopDrawing, {
            passive: false
        });

        function startDrawing(x, y) {
            drawing = true;
            lastX = x;
            lastY = y;
            ctx.beginPath();
            ctx.moveTo(x, y);
        }

        function draw(x, y) {
            if (!drawing) return;
            ctx.lineTo(x, y);
            ctx.strokeStyle = 'black';
            ctx.lineWidth = 3;
            ctx.stroke();
            lastX = x;
            lastY = y;
        }

        function stopDrawing() {
            drawing = false;
            ctx.closePath();
        }

        // Limpiar el canvas
        document.getElementById('clearCanvas').addEventListener('click', () => {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            document.getElementById('output').innerText = ''; // Limpiar el texto de salida
        });

        // Convertir a texto con preprocesamiento
        document.getElementById('convertToText').addEventListener('click', () => {
            // Preprocesar la imagen: convertir a blanco y negro
            let imgData = ctx.getImageData(0, 0, canvas.width, canvas.height);
            let data = imgData.data;

            // Convertir a blanco y negro para mejorar precisión
            for (let i = 0; i < data.length; i += 4) {
                let avg = (data[i] + data[i + 1] + data[i + 2]) / 3;
                let value = avg > 128 ? 255 : 0;
                data[i] = data[i + 1] = data[i + 2] = value; // Gris
            }
            ctx.putImageData(imgData, 0, 0);

            // Usar Tesseract.js para convertir el contenido del canvas a texto
            Tesseract.recognize(
                canvas,
                'eng', {
                    logger: (m) => console.log(m), // Progreso de reconocimiento
                }
            ).then(({
                data: {
                    text
                }
            }) => {
                document.getElementById('output').innerText = `Texto reconocido: ${text}`;
            }).catch((error) => {
                console.error(error);
            });
        });
    </script>
</body>

</html>