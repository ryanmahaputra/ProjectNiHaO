<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganti Password - NiHaO</title>
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
                <li><a href="#home">Home</a></li>
                <li><a href="#blog">Blog</a></li>
                <li><a href="#service">Service</a></li>
                <li><a href="#about">About</a></li>
            </ul>
        </nav>
    </header>


    <div class="gabung">
        <div class="container">
            <div class="welcome">
                <h1><b>Ganti Password</b></h1>
                <form id="changePasswordForm" action="/gantipassword.php" method="POST">
                    <div class="mb-3">
                        <label for="oldPassword" class="form-label">Password Lama</label>
                        <input type="password" class="form-control" id="oldPassword" name="oldPassword" required>
                    </div>
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">Password Baru</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirmNewPassword" class="form-label">Konfirmasi Password Baru</label>
                        <input type="password" class="form-control" id="confirmNewPassword" name="confirmNewPassword" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Ganti Password</button>
                </form>
            </div>
        </div>
    </div>
    <script src="/bootstrap-5.3.3-dist/js/bootstrap.js"></script>
    <script>
        document.getElementById("changePasswordForm").addEventListener("submit", function(event) {
            var oldPassword = document.getElementById("oldPassword").value;
            var newPassword = document.getElementById("newPassword").value;
            var confirmNewPassword = document.getElementById("confirmNewPassword").value;

            if (oldPassword === newPassword) {
                alert("Password baru tidak boleh sama dengan password lama!");
                event.preventDefault(); // Hindari pengiriman formulir jika validasi gagal
            } else if (newPassword !== confirmNewPassword) {
                alert("Konfirmasi password baru tidak cocok!");
                event.preventDefault(); // Hindari pengiriman formulir jika validasi gagal
            }
        });
    </script>
</body>

</html>
