<!DOCTYPE html>
<html lang="en">
<title>To do list!</title>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sidebar 5</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="./main.css" />
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
    <aside class="sidebar">
        <div class="sidebar-inner">
            <header class="sidebar-header">
                <button type="button" class="sidebar-burger" onclick="toggleSidebar()"></button>
                <div class="sidebar-logo">
                    {{ auth()->user()->name }}
                </div>
                {{-- <img src="./assets/blocklord-logo.png" class="sidebar-logo" /> --}}
            </header>
            <nav class="sidebar-nav">
                <button type="button">
                    <img src="/assets/icon-home.svg" />
                    <span>
                        <a href="/dashboard" class='far'>
                            Dashboard
                        </a>
                    </span>
                </button>
                <button type="button">
                    <img src="./assets/icon-levels.svg" />
                    <span style="animation-delay: 0.2s">
                        <a href="tambah">
                            Task
                        </a>
                    </span>
                </button>
            </nav>
            <footer class="sidebar-footer">
                <form action="logout" method="post">
                    @csrf
                    <button type="submit">
                        <img src="./assets/icon-lock.svg" />
                        <span style="color: white">Logout</span>
                    </button>
                </form>
            </footer>
        </div>
    </aside>
    <div class="inside">
        <h1>@yield('judul')</h1>
        @yield('halaman')


        <script type="text/javascript">
            const toggleSidebar = () => document.body.classList.toggle("open");
        </script>
</body>

</html>