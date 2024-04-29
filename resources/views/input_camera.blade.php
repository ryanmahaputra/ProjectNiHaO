<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camera App</title>
</head>
<body>
    <video id="videoElement" autoplay></video>
    <button id="captureButton">Ambil Gambar</button>
    <canvas id="canvas" style="display:none;"></canvas>

    
    <script>
        const video = document.getElementById('videoElement');
        const canvas = document.getElementById('canvas');
        const captureButton = document.getElementById('captureButton');
        const context = canvas.getContext('2d');

        navigator.mediaDevices.getUserMedia({ video: true })
            .then((stream) => {
                video.srcObject = stream;
            })
            .catch((err) => {
                console.error('Gagal mengakses kamera:', err);
            });

        captureButton.addEventListener('click', () => {
            context.drawImage(video, 0, 0, canvas.width, canvas.height);
            const imageDataURL = canvas.toDataURL('image/jpeg');
            sendData(imageDataURL);
        });

        function sendData(imageDataURL) {
            fetch('/upload-image', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ image: imageDataURL }),
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Gagal mengirim gambar ke server');
                }
                return response.json();
            })
            .then(data => {
                console.log('Gambar berhasil dikirim:', data);
                // Lakukan sesuatu dengan respons dari server jika diperlukan
            })
            .catch(error => {
                console.error('Terjadi kesalahan:', error);
            });
        }
    </script>
</body>
</html>
