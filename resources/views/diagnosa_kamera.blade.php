<!DOCTYPE html>
<html lang="en">

<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nihao! Scan Ikan Nilamu!</title>
    <link href="\diagnosa_input\diagnosa_input.css" rel="stylesheet">
    <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="\diagnosa_input\diagnosa_input.js"></script>
    <script src="/bootstrap-5.3.3-dist/js/bootstrap.js"></script>
    <style>

    </style>
</head>

<body>

    <header>
        <div class="logo">
            <img src="tampilanutama/headercamera.png" alt="NIHAO Logo">
            <h1>NiHaO</h1>
        </div>
        <nav>
            <ul>
                <li><a href="#home">Home</a></li>
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
            <a href="#"><b><u>Log Out</u></b></a>
            </div>

        </div>

        <div id="main">
            <button class="openbtn" onclick="openNav()">&#9776;</button>
    
        </div>
    </header>



    <form action="/upload" method="post" enctype="multipart/form-data" id="uploadForm">
    @csrf
    <div class="upload-container">
        <label for="file-upload" class="custom-file-upload">
            <video id="videoElement" autoplay width="500" height="500"></video>
            <canvas id="canvas" width="500" height="500" style="display:none;"></canvas>
        </label>
        <input id="file-upload" name="image" type="file" style="display:none;"/>

        <div class="butup">
            <button type="button"><b>Ambil Gambar</b></button>
            <button type="button" onclick="window.location.href='input'"><b>Kembali</b></button>
        </div>
    </div>
</form>

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


           


    </script>

</body>
</html>
