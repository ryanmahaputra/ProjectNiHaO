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

// Tambahkan variabel untuk menyimpan pesan kesalahan
$errorMsg = '';

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    echo "Koneksi berhasil!";
} catch (\PDOException $e) {
    // echo "Koneksi gagal: " . $e->getMessage();
}

// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk memeriksa apakah email dan password cocok
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
    $stmt->execute(['email' => $email, 'password' => $password]);
    $user = $stmt->fetch();

    if ($user) {
        // Jika email dan password cocok, lakukan tindakan yang sesuai
        header('Location: /tampilanutama');
        exit();
    } else {
        // Jika email atau password tidak cocok, atur pesan kesalahan
        $errorMsg = "Email atau password salah. Silahkan coba lagi.";
    }
}
?>