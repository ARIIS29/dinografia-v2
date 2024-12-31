<!-- Sección que contiene el contenido principal -->
<section class="mt-10">
    <div class="text-center" style="position: relative;">
        <canvas id="laberinto-canvas" width="800" height="400"></canvas>
        <a id="play-btn" class="enlargable">
            <img src="<?php echo base_url('almacenamiento/img/botones/btn-iniciar.png') ?>" alt="" class="img-fluid" width="80%">
        </a>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const canvas = document.getElementById('laberinto-canvas');
        const ctx = canvas.getContext('2d');
        const playBtn = document.getElementById('play-btn');

        const CELL_SIZE = 25;
        const ROWS = Math.floor(canvas.height / CELL_SIZE);
        const COLS = Math.floor(canvas.width / CELL_SIZE);

        let laberinto = [];
        let jugador = {
            row: 0,
            col: 0
        };
        let finCelda = {
            row: Math.floor(ROWS / 2),
            col: Math.floor(COLS / 2)
        }; // Colocar la meta en el centro
        let contadorMovimientos = 0;
        let tiempo = 0;
        let intervaloJugador;
        let ultimaPosicionPuntero = null;

        const caminoRecorrido = [{
            row: jugador.row,
            col: jugador.col
        }]; // Guardar las posiciones del jugador

        const imagenDino = new Image();
        const imagenMeta = new Image();

        imagenDino.src = 'almacenamiento/img/dino-lapiz1.png'; // Reemplaza con la ruta a tu imagen del jugador
        imagenMeta.src = 'almacenamiento/img/diario.png'; // Reemplaza con la ruta a tu imagen de meta

        // Inicializa el laberinto
        function initializeMaze() {
            laberinto = Array.from({
                length: ROWS
            }, () => Array.from({
                length: COLS
            }, () => true));
        }

        // Genera el laberinto utilizando el algoritmo de Recursive Backtracking
        function generateMaze() {
            const stack = [{
                row: 0,
                col: 0
            }];
            laberinto[0][0] = false;

            while (stack.length > 0) {
                const currentCell = stack[stack.length - 1];
                const neighbors = getUnvisitedNeighbors(currentCell);

                if (neighbors.length > 0) {
                    const randomNeighbor = neighbors[Math.floor(Math.random() * neighbors.length)];
                    removeWall(currentCell, randomNeighbor);
                    stack.push(randomNeighbor);
                    laberinto[randomNeighbor.row][randomNeighbor.col] = false;
                } else {
                    stack.pop();
                }
            }
        }

        // Obtiene los vecinos no visitados de una celda
        function getUnvisitedNeighbors(cell) {
            const neighbors = [];

            if (cell.row > 1 && laberinto[cell.row - 2][cell.col]) {
                neighbors.push({
                    row: cell.row - 2,
                    col: cell.col
                });
            }
            if (cell.row < ROWS - 2 && laberinto[cell.row + 2][cell.col]) {
                neighbors.push({
                    row: cell.row + 2,
                    col: cell.col
                });
            }
            if (cell.col > 1 && laberinto[cell.row][cell.col - 2]) {
                neighbors.push({
                    row: cell.row,
                    col: cell.col - 2
                });
            }
            if (cell.col < COLS - 2 && laberinto[cell.row][cell.col + 2]) {
                neighbors.push({
                    row: cell.row,
                    col: cell.col + 2
                });
            }

            return neighbors;
        }

        // Elimina la pared entre dos celdas
        function removeWall(cell1, cell2) {
            laberinto[(cell1.row + cell2.row) / 2][(cell1.col + cell2.col) / 2] = false;
        }

        // Dibuja el laberinto en el canvas
        function drawMaze() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            for (let row = 0; row < ROWS; row++) {
                for (let col = 0; col < COLS; col++) {
                    if (laberinto[row][col]) {
                        ctx.fillStyle = '#5B2504';//color del laberinto
                        ctx.fillRect(col * CELL_SIZE, row * CELL_SIZE, CELL_SIZE, CELL_SIZE);
                    }
                }
            }

            // Dibuja el objetivo
            ctx.drawImage(imagenMeta, finCelda.col * CELL_SIZE, finCelda.row * CELL_SIZE, CELL_SIZE, CELL_SIZE);

            // Dibuja el camino recorrido
            ctx.beginPath();
            ctx.moveTo(caminoRecorrido[0].col * CELL_SIZE + CELL_SIZE / 2, caminoRecorrido[0].row * CELL_SIZE + CELL_SIZE / 2);

            for (let i = 1; i < caminoRecorrido.length; i++) {
                ctx.lineTo(caminoRecorrido[i].col * CELL_SIZE + CELL_SIZE / 2, caminoRecorrido[i].row * CELL_SIZE + CELL_SIZE / 2);
            }
            ctx.strokeStyle = 'green';
            ctx.lineWidth = 5;
            ctx.stroke();

            // Dibuja al jugador
            ctx.drawImage(imagenDino, jugador.col * CELL_SIZE, jugador.row * CELL_SIZE, CELL_SIZE, CELL_SIZE);
        }

        // Manejador de teclado para mover al jugador
        function handleKeyDown(event) {
            switch (event.key) {
                case 'ArrowUp':
                    movePlayer(-1, 0);
                    break;
                case 'ArrowDown':
                    movePlayer(1, 0);
                    break;
                case 'ArrowLeft':
                    movePlayer(0, -1);
                    break;
                case 'ArrowRight':
                    movePlayer(0, 1);
                    break;
            }
        }

        // Manejador de pointer (lápiz o cursor) para mover al jugador
        function handlePointerDown(event) {
            ultimaPosicionPuntero = {
                x: event.clientX,
                y: event.clientY
            };
        }

        function handlePointerMove(event) {
            if (!ultimaPosicionPuntero) return;

            const dx = event.clientX - ultimaPosicionPuntero.x;
            const dy = event.clientY - ultimaPosicionPuntero.y;

            if (Math.abs(dx) > Math.abs(dy)) {
                if (dx > 0) {
                    movePlayer(0, 1);
                } else {
                    movePlayer(0, -1);
                }
            } else {
                if (dy > 0) {
                    movePlayer(1, 0);
                } else {
                    movePlayer(-1, 0);
                }
            }

            ultimaPosicionPuntero = {
                x: event.clientX,
                y: event.clientY
            };
            event.preventDefault();
        }

        // Manejadores de eventos táctiles
        function handleTouchStart(event) {
            const touch = event.touches[0];
            ultimaPosicionPuntero = {
                x: touch.clientX,
                y: touch.clientY
            };
        }

        function handleTouchMove(event) {
            const touch = event.touches[0];
            handlePointerMove(touch); // Usa la misma lógica que el cursor
        }

        function movePlayer(rowDelta, colDelta) {
            const newRow = jugador.row + rowDelta;
            const newCol = jugador.col + colDelta;

            if (newRow >= 0 && newRow < ROWS && newCol >= 0 && newCol < COLS && !laberinto[newRow][newCol]) {
                jugador.row = newRow;
                jugador.col = newCol;
                contadorMovimientos++;

                // Guardar la nueva posición del jugador en el camino
                caminoRecorrido.push({
                    row: jugador.row,
                    col: jugador.col
                });

                // Verificar si el jugador ha llegado al final
                if (jugador.row === finCelda.row && jugador.col === finCelda.col) {
                    clearInterval(intervaloJugador);
                    alert('¡Felicidades, has llegado al final del laberinto!\n' +
                        'Movimientos: ' + contadorMovimientos + '\n' +
                        'Tiempo: ' + tiempo + ' segundos');
                }

                // Actualizar contador de movimientos
                document.getElementById('contadorMovimientos').textContent = contadorMovimientos;
                drawMaze();
            }
        }

        // Función para formatear el tiempo en mm:ss
        function formatTime(segundosTotales) {
            const minutos = Math.floor(segundosTotales / 60);
            const segundos = segundosTotales % 60;
            return `${minutos.toString().padStart(2, '0')}:${segundos.toString().padStart(2, '0')}`;
        }

        // Actualiza el cronómetro
        function updateTimer() {
            tiempo++;

            // Calcula los minutos y segundos
            let minutos = Math.floor(tiempo / 60);
            let segundos = tiempo % 60;

            // Formatea para que siempre se muestren dos dígitos (e.g., 01:05)
            let tiempoFormateado = `${minutos.toString().padStart(2, '0')}:${segundos.toString().padStart(2, '0')}`;

            // Actualiza el contenido del span con el tiempo formateado
            const tiempoElement = document.getElementById('tiempo');
            if (tiempoElement) {
                tiempoElement.textContent = tiempoFormateado;
            }
        }



        // Inicialización del juego al hacer clic en "Play"
        playBtn.addEventListener('click', function() {
            playBtn.style.display = 'none'; // Ocultar el botón después de hacer clic
            initializeMaze();
            generateMaze();
            drawMaze();

            // Manejador del evento de teclado
            document.addEventListener('keydown', handleKeyDown);

            // Manejadores de eventos de puntero (lápiz o cursor)
            canvas.addEventListener('pointerdown', handlePointerDown);
            canvas.addEventListener('pointermove', handlePointerMove);

            // Manejadores de eventos táctiles
            canvas.addEventListener('touchstart', handleTouchStart);
            canvas.addEventListener('touchmove', handleTouchMove);

            // Inicia el cronómetro
            intervaloJugador = setInterval(updateTimer, 1000);
        });
    });
</script>