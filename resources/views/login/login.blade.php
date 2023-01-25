<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/css/login.css">
</head>

<body>
    <div class=" container">

        <div class="design">
            <div class="pill-1 rotate-45"></div>
            <div class="pill-2 rotate-45"></div>
            <div class="pill-3 rotate-45"></div>
            <div class="pill-4 rotate-45"></div>
        </div>
        <form class="login" action="/proses_login" method="POST">
            @csrf
            @if (session('berhasil'))
            {{ session('berhasil') }}
            @endif
            <h1>Welcome Back!</h1>
            <h3 class="title">User Login</h3>
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
            <button class="login-btn" type="submit">LOGIN</button>
            <div class="create">
                <a href="/register">Create Your Account</a>
                <i class="ri-arrow-right-fill"></i>
            </div>
        </form>
    </div>
</body>

</html>