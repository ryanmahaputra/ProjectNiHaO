function generateAndRedirect() {
    // Generate OTP
    var otp = generateOTP();

    // Redirect to OTP verification page with email and OTP as query parameters
    var email = document.getElementById('email').value;
    if (email) {
        window.location.href = 'verifikasiOTPController.php?email=' + encodeURIComponent(email) + '&otp=' + encodeURIComponent(otp);
    } else {
        alert('Masukkan email terlebih dahulu.');
    }
}

function generateOTP(length = 6) {
    var characters = '0123456789';
    var otp = '';
    for (var i = 0; i < length; i++) {
        otp += characters.charAt(Math.floor(Math.random() * characters.length));
    }
    return otp;
}
