<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nihao! Selamat Datang</title>
    <link href="/halamanlogin/login.css" rel="stylesheet">
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
          
                    <!-- Form Login -->
                    <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="kontainer_form">
                        <div class="form-group">
                            <label class="form-label" for="form3Example4cg"><b>Username:</b></label>
                            <input type="text" id="form3Example4cg" class="form-control form-control-lg" name="username" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="form3Example4cg"><b>Password:</b></label>
                            <input type="password" id="form3Example4cg" class="form-control form-control-lg" name="password" required />
                        </div>
                        <div class="buttons">
                            <button type="submit" class="btn btn-primary"><b>Login</b></button>
                        </div>
                    </div>
                </form>

                    
                    <!-- Link Registrasi -->
            
                </div>
            </div>
        </div>
    </div>
    <script src="/bootstrap-5.3.3-dist/js/bootstrap.js"></script>
</body>

</html>

