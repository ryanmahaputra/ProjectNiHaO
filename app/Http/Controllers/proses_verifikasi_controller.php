<?php
// proses_verifikasi_otp.php

// Mulai sesi
session_start();

// Periksa jika pengguna sudah masuk dengan kode OTP
if(isset($_SESSION['otp']) && isset($_SESSION['email'])) {
    // Ambil kode OTP yang dimasukkan oleh pengguna
    $user_otp = $_POST['otp'];

    // Ambil kode OTP dari sesi
    $otp = $_SESSION['otp'];

    // Periksa apakah kode OTP yang dimasukkan oleh pengguna sama dengan kode OTP yang dikirimkan
    if($user_otp == $otp) {
        // Jika cocok, redirect pengguna ke halaman reset password
        header('Location: reset_password.blade.php');
        exit;
    } else {
        // Jika tidak cocok, berikan pesan kesalahan
        echo "Kode OTP yang dimasukkan tidak valid. Silakan coba lagi.";
    }
} else {
    // Jika sesi kode OTP tidak ada, kembali ke halaman lupa password
    header('Location: lupapassword.blade.php');
    exit;
}
?>