<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nihao! Scan Ikan Nilamu!</title>
    <link href="/diagnosa_input/diagnosa_input.css" rel="stylesheet">
    <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="/diagnosa_input/diagnosa_input.js"></script>
    <script src="/bootstrap-5.3.3-dist/js/bootstrap.js"></script>
    <style>

    </style>
</head>

<body>

    <header>
        <div class="logo">
            <img src="/tampilanutama/headercamera.png" alt="NIHAO Logo">
            <h1>NiHaO</h1>
        </div>
        <nav>
            <ul>
                <li onclick="window.location.href='/beranda_pembudidaya'"><a href="#home">Home</a></li>
                <li><a href="#blog">Blog</a></li>
                <li><a href="#service">Service</a></li>
                <li><a href="#about">About</a></li>
            </ul>
        </nav>

        <div id="mySidebar" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="#"><b><u>Profil</u></b></a>
            <a href="#"><b><u>Ganti Password</u></b></a>
            <a href="#"><b><u>Kententuan Layanan</u></b></a>
            <a href="#"><b><u>Kebijakan Privasi</u></b></a>

            <div class="logoutbtn">
              <a href="/login"><b><u>Log Out</u></b></a>
            </div>

        </div>

        <div id="main">
            <button class="openbtn" onclick="openNav()">&#9776;</button>

        </div>
    </header>



    <form action="/upload" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container">

            <div class="upload-container">
                <label for="file-upload" class="custom-file-upload">
                    <img id="uploaded-image" src="/diagnosa_input/mid.png" alt="Folder Icon" width="800" height="auto" />
                </label>

                <input id="file-upload" name="image" type="file" style="display:none;" />

                <div class="butup">
                    <button type="submit"><b>Upload</b></button>
                    <button type="button" onclick="showCamera()"><b>Gunakan Kamera</b></button>
                </div>
            </div>

            <div id="kamera-container" class="kamera-container" style="display: none;">
                <label for="kamera-upload" class="kamera-file-upload">
                    <video id="videoElement" autoplay width="500" height="500"></video>
                    <canvas id="canvas" width="500" height="500" style="display:none;"></canvas>
                </label>

                <div class="butup">
                    <button type="button" onclick="takePicture()" for="file-upload"><b>Ambil Gambar</b></button>
                    <button type="button" onclick="closeCamera()"><b>Tutup Kamera</b></button>
                </div>

            </div>
        </div>
    </form>

    <script>
        const video = document.getElementById('videoElement');
        const canvas = document.getElementById('canvas');

        function showCamera() {
            // Menampilkan kamera-container
            document.getElementById('kamera-container').style.display = 'block';

            // Mengambil izin akses kamera
            navigator.mediaDevices.getUserMedia({ video: true })
                .then((stream) => {
                    video.srcObject = stream;
                })
                .catch((err) => {
                    console.error('Gagal mengakses kamera:', err);
                });
        }

        function takePicture() {
            // Mengambil gambar dari video
            const context = canvas.getContext('2d');
            context.drawImage(video, 0, 0, canvas.width, 390);
            // Tampilkan canvas
            canvas.style.display = 'block';
            // Sembunyikan video
            video.style.display = 'none';

            // Membuat objek File dari data gambar
            canvas.toBlob(function(blob) {
                // Membuat objek File dari blob gambar dengan format jpg
                const file = new File([blob], 'captured_image.jpg', { type: 'image/jpeg' });

                // Membuat objek FileList
                const filesList = new DataTransfer();
                filesList.items.add(file);

                // Memasukkan FileList ke dalam input dengan id="file-upload"
                const fileInput = document.getElementById('file-upload');
                fileInput.files = filesList.files;
            }, 'image/jpeg');
        }

        // Polyfill untuk membuat objek FileListItem
        class FileListItem extends Array {
            constructor(items, options) {
                super(...items);
                Object.defineProperty(this, 'options', {
                    value: options || {}
                });
            }
            toString() {
                return `[object FileList]`;
            }
        }



        function closeCamera() {
        // Menyembunyikan kamera-container
        document.getElementById('kamera-container').style.display = 'none';
        // Stop video
        const stream = video.srcObject;
        const tracks = stream.getTracks();

        tracks.forEach(track => {
            track.stop();
        });

        // Menampilkan kembali video
        video.style.display = 'block';
        // Sembunyikan canvas
        canvas.style.display = 'none';
    }
    </script>

</body>

</html>
