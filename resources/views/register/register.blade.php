<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="/css/register.css">
</head>

<body>
    <div class=" container">
        <div class="design">
            <div class="pill-1 rotate-45"></div>
            <div class="pill-2 rotate-45"></div>
            <div class="pill-3 rotate-45"></div>
            <div class="pill-4 rotate-45"></div>
        </div>
        <form class="login" action="/proses_register" method="POST">
            @csrf
            <h1>Daftar sekarang!</h1>
            <h3 class="title">{{ $judul }}</h3>
            <div class="text-input">
                <i class="ri-user-fill"></i>
                <input type="text" name="name" placeholder="Nama" />
            </div>
            @error('name')
            <div class="message"><span style="color: red">{{ $message }}</span></div>
            @enderror
            <div class="text-input">
                <i class="ri-user-fill"></i>
                <input type="text" name="email" placeholder="Email" />
            </div>
            @error('email')
            <div class="message"><span style="color: red">{{ $message }}</span></div>
            @enderror
            <div class="text-input">
                <i class="ri-lock-fill"></i>
                <input type="password" name="password" placeholder="Password" />
            </div>
            @error('password')
            <div class="message"><span style="color: red">{{ $message }}</span></div>
            @enderror
            <div class="text-input">
                <i class="ri-lock-fill"></i>
                <input type="password" placeholder="Confirm Password" name="password" />
            </div>
            @error('password')
            <div class="message"><span style="color: red">{{ $message }}</span></div>
            @enderror
            <button class="login-btn" type="submit">DAFTAR</button>
        </form>
    </div>
</body>

</html>