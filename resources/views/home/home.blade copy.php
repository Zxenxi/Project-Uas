<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>ini adalah home</h1>
    @auth
    <form action="/logout" method="post">
        @csrf
        {{ auth()->user()->name }}
        <button type="submit">
            logout
        </button>
    </form>
    @endauth
    <hr>
    <button>
        <a href="tambah">tambah</a>
    </button>
</body>

</html>