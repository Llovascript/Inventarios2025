<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sidebar</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    @vite(['resources/css/sidebar.css'])
</head>
<body>
    <button class="sidebar-menu-button">
        <span class="material-symbols-outlined">menu</span>
    </button>

    <aside class="sidebar">
        <header class="sidebar-header">
            <a href="#" class="header-logo">
                <img src="{{ asset('storage/img/logo.svg') }}" alt="CodingNepal">
            </a>
            <button class="sidebar-toggler">
                <span class="material-symbols-outlined">chevron_left</span>
            </button>
        </header>
        <nav class="sidebar-nav">
            <ul class="nav-list primary-nav">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <span class="material-symbols-outlined">Dashboard</span>
                        <span class="nab-label">Dashboard</span>
                    </a>
                </li>
                @auth
                @if (auth()->user()->id_role == 1)
                <li class="nav-item">
                    <a href="{{ route('custom.register.form') }}" class="nav-link">
                        <span class="material-symbols-outlined">app_registration</span>
                        <span class="nab-label">Registro</span>
                    </a>
                </li>
                @endif
                @endauth
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <span class="material-symbols-outlined">package_2</span>
                        <span class="nab-label">Factura y Articulos</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <span class="material-symbols-outlined">notifications</span>
                        <span class="nab-label">Notifications</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <span class="material-symbols-outlined">local_library</span>
                        <span class="nab-label">Resources</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <span class="material-symbols-outlined">star</span>
                        <span class="nab-label">Bookmarks</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <span class="material-symbols-outlined">extension</span>
                        <span class="nab-label">Extensions</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <span class="material-symbols-outlined">settings</span>
                        <span class="nab-label">Settings</span>
                    </a>
                </li>
            </ul>

            <ul class="nav-list secondary-nav">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <span class="material-symbols-outlined">help</span>
                        <span class="nab-label">Support</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <span class="material-symbols-outlined">logout</span>
                        <span class="nab-label">Sign out</span>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    @vite(['resources/js/sidebar.js'])
</body>
</html>