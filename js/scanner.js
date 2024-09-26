// Dimensiones del video
const videoWidth = 640;
const videoHeight = 480;

// Elementos del DOM
const videoTag = document.getElementById("theVideo");
const canvasTag = document.getElementById("theCanvas");
const btnStartCamera = document.getElementById("btnStartCamera");

// Variable para rastrear el estado de la cámara
let cameraActive = false;

// Establecer atributos de video y lienzo
videoTag.setAttribute("width", videoWidth);
videoTag.setAttribute("height", videoHeight);
canvasTag.setAttribute("width", videoWidth);
canvasTag.setAttribute("height", videoHeight);

// Manejador de evento para el botón de iniciar cámara
btnStartCamera.addEventListener("click", async () => {
    try {
        // Obtener acceso a la cámara
        const stream = await navigator.mediaDevices.getUserMedia({
            audio: false,
            video: { width: videoWidth, height: videoHeight },
        });

        // Asignar el flujo de la cámara al elemento de video
        videoTag.srcObject = stream;
        btnStartCamera.disabled = true; // Desactivar el botón después de iniciar la cámara

        
        cameraActive = true;

        // Configuración de Quagga para el escaneo de códigos de barras
        const quaggaConf = {
            inputStream: {
                target: videoTag,
                type: "LiveStream",
                constraints: {
                    width: { min: 640 },
                    height: { min: 480 },
                    facingMode: "environment", // Usar la cámara trasera (si está disponible)
                    aspectRatio: { min: 1, max: 2 }
                }
            },
            decoder: {
                readers: ['ean_reader'] // Configurar el lector de códigos EAN
            }
        };

        // Inicializar Quagga y comenzar el escaneo
        Quagga.init(quaggaConf, function (err) {
            if (err) {
                return console.log(err);
            }
            Quagga.start();
        });

        // Manejar eventos cuando se detecta un código de barras
        Quagga.onDetected(async function (result) {
            if (result.codeResult) {
                const detectedBarcode = result.codeResult.code;

                // Realizar búsqueda en la base de datos
                const found = await buscarEnBaseDeDatos(detectedBarcode);
                if (found) {
                    // Si se encuentra el código de barras, redirigir a la página de búsqueda
                    window.location.href = 'searchbarcode.php?barcode=' + encodeURIComponent(detectedBarcode);
                } else {
                    console.log("No se encontraron resultados para el código de barras:", detectedBarcode);
                }
            }
        });

    } catch (error) {
        console.log("Error al acceder a la cámara:", error);
    }
});

// Función para buscar en la base de datos utilizando el código de barras
async function buscarEnBaseDeDatos(barcode) {
    try {
        const response = await fetch('buscar.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'barcode=' + encodeURIComponent(barcode)
        });

        if (response.ok) {
            const data = await response.text();
            const resultCount = parseInt(data);
            return resultCount !== 0; // Devolver true si se encuentra una coincidencia
        } else {
            throw new Error("Error al buscar en la base de datos");
        }
    } catch (error) {
        console.error("Error al buscar en la base de datos:", error);
        return false;
    }
}
