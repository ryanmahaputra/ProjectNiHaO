<?php
// Sambungkan ke database
$koneksi = mysqli_connect("localhost", "root", "", "laravel");

// Fungsi untuk mengirim email
function kirimEmail($email, $kode_otp) {
    // Sesuaikan dengan pengaturan server email Anda
    $to = $email;
    $subject = "Kode OTP untuk Reset Password";
    $message = "Berikut adalah kode OTP Anda: $kode_otp";
    $headers = "From: your@example.com" . "\r\n" .
               "Reply-To: your@example.com" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Kirim email
    return mail($to, $subject, $message, $headers);
}

if(isset($_POST['submit'])) {
    $email = $_POST['email'];

    // Generate OTP
    $kode_otp = rand(100000, 999999);

    // Simpan kode OTP ke database untuk verifikasi nantinya
    $query = "INSERT INTO otps (email, kode_otp) VALUES ('$email', '$kode_otp')";
    $result = mysqli_query($koneksi, $query);

    if($result) {
        // Kirim kode OTP melalui email
        if(kirimEmail($email, $kode_otp)) {
            echo "Kode OTP telah dikirimkan ke email Anda.";
        } else {
            echo "Gagal mengirimkan kode OTP. Silakan coba lagi.";
        }
    } else {
        echo "Gagal menyimpan kode OTP. Silakan coba lagi.";
    }
}
?>