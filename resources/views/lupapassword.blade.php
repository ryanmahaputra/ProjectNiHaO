<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - NiHaO</title>
    <link href="/lupapassword/lupapassword.css" rel="stylesheet">
    <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>

    <header>
        <div class="logo">
            <img src="/tampilanutama/headercamera.png" alt="NIHAO Logo">
            <h1>NiHaO</h1>
        </div>
        <nav>
            <ul>
                <li onclick="window.location.href='/'"><a href="#home">Home</a></li>
                <li><a href="#blog">Blog</a></li>
                <li><a href="#service">Service</a></li>
                <li><a href="#about">About</a></li>
            </ul>
        </nav>
    </header>

    <div class="gabung">
        <div class="container">
            <div class="form-container">
                <!-- Form Lupa Password -->
                <form id="otpForm" method="POST" action="verifikasiOTP.php">
                    <div class="kontainer_form">
                        <div class="form-group">
                            <label class="form-label" for="email"><b>Email:</b></label>
                            <input type="email" id="email" class="form-control form-control-lg" name="email" required />
                        </div>
                        <div class="buttons">
                            <button type="button" onclick="generateAndRedirect()" class="btn btn-primary"><b>Kirim Kode OTP</b></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="/bootstrap-5.3.3-dist/js/bootstrap.js"></script>
</body>

</html>