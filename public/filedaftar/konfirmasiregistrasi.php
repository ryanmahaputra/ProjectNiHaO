<?php
// Periksa apakah ada data yang dikirim dari formulir registrasi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai yang dikirimkan dari formulir
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $konfirmasi_password = $_POST["konfirmasi_password"];
    $daftar_sebagai = $_POST["daftar_sebagai"];

    // Periksa apakah password dan konfirmasi password sama
    if ($password !== $konfirmasi_password) {
        echo "Konfirmasi password tidak sesuai!";
        exit; // Keluar dari skrip jika konfirmasi password tidak sesuai
    }

    // Lakukan tindakan penyimpanan data ke database atau yang lainnya di sini
    // Contoh: menyimpan data ke dalam database MySQL
    $host = 'localhost';
    $db   = 'nama_database';
    $user = 'nama_pengguna_database';
    $pass = 'kata_sandi_database';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
        
        // Masukkan data registrasi ke dalam database
        $stmt = $pdo->prepare("INSERT INTO users (nama, email, password, daftar_sebagai) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nama, $email, $password, $daftar_sebagai]);
        
        echo "Registrasi berhasil!";
    } catch (\PDOException $e) {
        echo "Registrasi gagal: " . $e->getMessage();
    }
}
?>
