<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - NiHaO</title>
    <link href="/lupapassword/lupapassword.css" rel="stylesheet">
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
                <li onclick="window.location.href='/'"><a href="#home">Home</a></li>
                <li><a href="#blog">Blog</a></li>
                <li><a href="#service">Service</a></li>
                <li><a href="#about">About</a></li>
            </ul>
        </nav>
    </header>

    <div class="gabung">
        <div class="container">
            <div class="form-container">
                <form method="POST" action="{{ route('requestOtp') }}" accept-charset="utf-8" style="margin: 100px auto;box-shadow: 0 0 15px -2px lightgray;width:100%;max-width:600px;padding:20px;box-sizing:border-box;">
                    @csrf
                    <h1 style="text-align: center;">OTP</h1>
                    <center>
                        <div style="display: {{ session('nomor') ? 'none' : 'flex' }};flex-direction:column;margin-bottom:10px;box-sizing:border-box; form-group">
                            <label class="form-label" for="email"><b>Nomor Whatsapp</b></label>
                            <input placeholder="62812xxxx" name="nomor" type="text" id="nomor" required style="padding:8px;border:2px solid lightgray;border-radius:5px;" value="{{ session('nomor') }}" {{ session('nomor') ? 'hidden' : '' }} />
                        </div>
                        @if(session('nomor'))
                            <div style="display: flex;flex-direction:column;margin-bottom:10px;">
                                <label for="otp" style="text-align: left;margin-bottom:5px;box-sizing:border-box;">OTP</label>
                                <input placeholder="xxxxxx" name="otp" type="text" id="otp" style="padding:8px;border:2px solid lightgray;border-radius:5px;" />
                            </div>
                        @endif
                        @if(!session('nomor'))
                            <button type="submit" id="btn-otp" style="background-color: orange;border:none;padding:8px 16px;color:white;cursor:pointer;" name="submit-otp">Request OTP</button>
                        @endif
                        @if(session('nomor'))
                            <button type="submit" formaction="{{ route('verifyOtp') }}" id="btn-login" style="background-color:darkturquoise;border:none;padding:8px 16px;color:white;cursor:pointer;" name="submit-login">Login</button>
                        @endif
                    </center>
                </form>
            </div>
        </div>
    </div>
<script src="/bootstrap-5.3.3-dist/js/bootstrap.js"></script>
</body>

</html>
