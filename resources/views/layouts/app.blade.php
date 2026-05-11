<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KEGNE ENERGY — @yield('title', 'Dashboard')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Manrope:wght@600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    @livewireStyles
</head>
<body>

    {{-- App Navbar --}}
    <nav class="navbar navbar-expand-md ke-navbar ke-app-navbar fixed-top shadow-sm">
        <div class="container-xl">
            <a class="navbar-brand ke-brand" href="{{ route('home') }}">KEGNE ENERGY</a>

            <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse" data-bs-target="#appNav"
                    aria-controls="appNav" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="appNav">
                <ul class="navbar-nav ms-auto align-items-center gap-2">

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                           href="{{ route('dashboard') }}">
                            <span class="material-symbols-outlined" style="font-size:17px">dashboard</span>
                            Dashboard
                        </a>
                    </li>

                    @if(Auth::user()->isAdmin())
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.*') ? 'active' : '' }}"
                           href="{{ route('admin.dashboard') }}">
                            <span class="material-symbols-outlined" style="font-size:17px">admin_panel_settings</span>
                            Admin Panel
                        </a>
                    </li>
                    @endif

                    <li class="nav-item">
                        <span class="nav-link text-muted" style="font-size:13px">
                            <span class="material-symbols-outlined" style="font-size:16px">person</span>
                            {{ Auth::user()->name }}
                            <span class="badge ms-1 {{ Auth::user()->isAdmin() ? 'ke-badge-admin' : 'ke-badge-user' }}" style="font-size:11px">
                                {{ Auth::user()->role }}
                            </span>
                        </span>
                    </li>

                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" class="m-0">
                            @csrf
                            <button type="submit" class="btn ke-btn-outline btn-sm">
                                <span class="material-symbols-outlined" style="font-size:15px">logout</span>
                                Logout
                            </button>
                        </form>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    {{-- Page Content --}}
    <main class="ke-app-main">
        <div class="container-xl">
            @yield('content')
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @livewireScripts
</body>
</html>