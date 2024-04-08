<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="\bootstrap-5.3.3-dist\css\bootstrap.css" rel="stylesheet">
    <link href="\file home\home.css" rel="stylesheet">
</head>
<body>
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">
                                    <div class="text-center">
                                        <img src="file home\logo_home.png"
                                             style="width: 120px;" alt="logo">
                                        <h4 class="mt-1 mb-5 pb-1">NIHAO! Selamat Datang</h4>
                                    </div>
                                    
                                    <form id="loginForm" method="post" action="process_login.php">
                                        <p></p>
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="username">Username</label>
                                            <input type="text" id="username" name="username" class="form-control" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="password">Password</label>
                                            <input type="password" id="password" name="password" class="form-control" />
                                        </div>
                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button id="loginButton" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Log in</button>
                                    
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center pb-4">
                                            <p class="mb-0 me-2">Belum Punya Akun?</p>
                                        
                                            <a href="{{ url('/daftar') }}" class="btn btn-outline-danger">Daftar Disini</a>
   
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4">NiHaO</h4>
                                    <p class="small mb-0">Hallo! para Peternak, NiHaO adalah aplikasi yang bisa membantu Anda dalam mendeteksi penyakit pada Ikan Nila dan Anda bisa berinteraksi dengan para Peternak Ikan Nila Lainnya. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="\bootstrap-5.3.3-dist\js\bootstrap.js"></script>
</body>
</html>
