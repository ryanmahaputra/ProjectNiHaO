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

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    echo "Koneksi berhasil!";
} catch (\PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <link href="/file daftar/daftar.css" rel="stylesheet">
</head>

<body>
    <section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">   
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Buat Akun</h2>

                                <form action="/daftar" method="POST">
                                    @csrf
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example1cg">Username</label>
                                        <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="username" required />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cg">Kata Sandi</label>
                                        <input type="password" id="form3Example4cg" class="form-control form-control-lg" name="password" required />
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Daftar</button>
                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0">Sudah Punya Akun?
                                        <a href="/home" class="fw-bold text-body">Login Disini</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="/bootstrap-5.3.3-dist/js/bootstrap.js"></script>
</body>

</html>
