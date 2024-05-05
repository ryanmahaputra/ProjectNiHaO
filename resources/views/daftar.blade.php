<?php
$host = '127.0.0.1';
$db   = 'nihao';
$user = 'krisna';
$pass = 'krisna';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

// try {
//     $pdo = new PDO($dsn, $user, $pass, $options);
//     echo "Koneksi berhasil!";
// } catch (\PDOException $e) {
//     echo "Koneksi gagal: " . $e->getMessage();
    
// }
?>   
   
   
   <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Nihao! Selamat Datang</title>
                <link href="\register\register.css" rel="stylesheet">
                <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
                <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
                <script src="\register\register.js"></script>
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
                            <li onclick="window.location.href='/'"><a href="#home">Home</a></li>
                            <li><a href="#blog">Blog</a></li>
                            <li><a href="#service">Service</a></li>
                            <li><a href="#about">About</a></li>

                        </ul>
                    </nav>
    
                    
                </header>

                                 <form method="POST" action="{{ route('register') }}">

                                        @csrf

                                        <div class="kontainer_form">
                                            <div class="form-group">
                                                <label class="form-label" for="form3Example1cg"><b>Email:</b></label>
                                                <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="email" required />
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="form3Example4cg"><b>Username:</b></label>
                                                <input type="text" id="form3Example4cg" class="form-control form-control-lg" name="username" required />
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="form3Example4cg"><b>Password:</b></label>
                                                <input type="password" id="form3Example4cg" class="form-control form-control-lg" name="password" required />
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="form3Example4cg"><b>Konfirmasi Password:</b></label>
                                                <input type="password" id="form3Example4cg" class="form-control form-control-lg" name="konfirmasi password" required />
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="form3Example4cg"><b>Pilih Daftar Sebagai:</b></label>
                                                <select class="form-input" name="role">
                                                    <option value="Pembudidaya">Pembudidaya</option>
                                                    <option value="Komunitas">Komunitas</option>
                                                </select>
                                            </div>
                                            <div class="button_daftar">
                                                <button type="submit"><b>Register</b></button>
                                            </div>
                                        </div>


                                    </form>
            

            </body>

            </html>
