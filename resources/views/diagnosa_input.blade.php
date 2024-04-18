<!DOCTYPE html>
        <html lang="en">

        <head> 
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Nihao! Selamat Datang</title>
            <link href="\header\header.css" rel="stylesheet">
            <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
            <script src="\header\header.js"></script>
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

            <form id="image-form" action="/process-image" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="upload-container">
        <label for="file-upload" class="custom-file-upload">
            <img id="uploaded-image" src="\diagnosa_input\mid.png" alt="Folder Icon" width="800" height="auto" />
        </label>
        <input id="file-upload" name="image" type="file" style="display:none;"/>
    </div>
    <button type="submit">Process Image</button>
</form>

<script>
    document.getElementById('file-upload').addEventListener('change', function() {
        const file = this.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            document.getElementById('uploaded-image').src = e.target.result;
        }

        reader.readAsDataURL(file);
    });

    document.getElementById('image-form').addEventListener('submit', function(e) {
        e.preventDefault()  ;

        const formData = new FormData(this);

        fetch('/process-image', {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            // show hasil
            console.log(data);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
</script>

        </body>
        </html>
