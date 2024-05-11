<?php
// lupaPasswordController.php

// Fungsi untuk mengirim email dengan kode OTP
function kirimKodeOTP($email, $otp) {
    // Lakukan pengaturan email, misalnya menggunakan PHPMailer atau fungsi mail() bawaan PHP
    // Di sini kita akan menggunakan fungsi mail() bawaan PHP sebagai contoh

    // Generate subjek dan pesan email
    $subject = 'Kode OTP untuk Reset Password';
    $message = 'Berikut adalah kode OTP Anda: ' . $otp;

    // Kirim email
    $headers = 'From: your-email@example.com'; // Ganti dengan alamat email Anda
    $mailSent = mail($email, $subject, $message, $headers);

    return $mailSent;
}

// Lakukan validasi jika request merupakan POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah email telah dikirimkan
    if (isset($_POST["email"])) {
        // Ambil email dari input form
        $email = $_POST["email"];

        // Generate kode OTP secara acak (di sini kita menggunakan rentang 100000 hingga 999999)
        $otp = rand(100000, 999999);

        // Kirim kode OTP melalui email
        $mailSent = kirimKodeOTP($email, $otp);

        // Periksa apakah email berhasil dikirim
        if ($mailSent) {
            // Simpan kode OTP dan email dalam sesi untuk digunakan pada halaman verifikasi
            session_start();
            $_SESSION['otp'] = $otp;
            $_SESSION['email'] = $email;

            // Redirect pengguna ke halaman verifikasi OTP
            header('Location: verifikasi_otp.php');
            exit;
        } else {
            // Jika gagal mengirim email, tampilkan pesan kesalahan
            echo "Gagal mengirim email. Silakan coba lagi.";
        }
    } else {
        // Jika email tidak ditemukan pada request, tampilkan pesan kesalahan
        echo "Email tidak ditemukan.";
    }
} else {
    // Jika bukan request POST, redirect pengguna ke halaman lupa password
    header('Location: lupaPasswordForm.php');
    exit;
}
?>