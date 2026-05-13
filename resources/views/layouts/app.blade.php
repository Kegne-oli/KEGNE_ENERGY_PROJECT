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
<body class="ke-app-body">

<div class="ke-layout">

    {{-- ══ SIDEBAR ══════════════════════════════════════════ --}}
    <aside class="ke-sidebar" id="keSidebar">
        <div class="ke-sidebar-brand">
            <a href="{{ route('home') }}" class="text-decoration-none">
                <span class="ke-sidebar-logo">KEGNE<br>ENERGY</span>
            </a>
        </div>

        <nav class="ke-sidebar-nav">
            @php
            $navItems = [
                ['route' => 'dashboard',            'icon' => 'dashboard',          'label' => 'Dashboard'],
                ['route' => 'energy-monitoring',    'icon' => 'bolt',               'label' => 'Energy Monitoring'],
                ['route' => 'consumption',          'icon' => 'electric_meter',     'label' => 'Consumption'],
                ['route' => 'savings',              'icon' => 'savings',            'label' => 'Savings'],
                ['route' => 'analytics',            'icon' => 'analytics',          'label' => 'Analytics'],
                ['route' => 'alerts',               'icon' => 'notifications',      'label' => 'Alerts'],
                ['route' => 'maintenance',          'icon' => 'build',              'label' => 'Maintenance'],
                ['route' => 'weather',              'icon' => 'cloud',              'label' => 'Weather'],
                ['route' => 'environment',          'icon' => 'eco',                'label' => 'Environment'],
                ['route' => 'battery',              'icon' => 'battery_charging_full','label' => 'Battery'],
                ['route' => 'reports',              'icon' => 'description',        'label' => 'Reports'],
                ['route' => 'my-chats',             'icon' => 'chat',               'label' => 'My Chats'],
                ['route' => 'settings',             'icon' => 'settings',           'label' => 'Settings'],
            ];
            @endphp

            @foreach($navItems as $item)
            <a href="{{ route($item['route']) }}"
               class="ke-nav-link {{ request()->routeIs($item['route']) ? 'active' : '' }}">
                <span class="material-symbols-outlined">{{ $item['icon'] }}</span>
                <span class="ke-nav-label">{{ $item['label'] }}</span>
            </a>
            @endforeach

            @if(Auth::user()->isAdmin())
            <div class="ke-nav-divider"></div>
            <a href="{{ route('admin.dashboard') }}"
               class="ke-nav-link {{ request()->routeIs('admin.*') ? 'active' : '' }}">
                <span class="material-symbols-outlined">admin_panel_settings</span>
                <span class="ke-nav-label">Admin Panel</span>
            </a>
            @endif
        </nav>

        <div class="ke-sidebar-footer">
            <div class="ke-sidebar-user">
                <div class="ke-user-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                <div class="ke-user-info">
                    <div class="ke-user-name">{{ Auth::user()->name }}</div>
                    <div class="ke-user-role">{{ ucfirst(Auth::user()->role) }}</div>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}" class="mt-2">
                @csrf
                <button type="submit" class="ke-logout-btn">
                    <span class="material-symbols-outlined">logout</span>
                    <span class="ke-nav-label">Logout</span>
                </button>
            </form>
        </div>
    </aside>

    {{-- ══ MAIN AREA ════════════════════════════════════════ --}}
    <div class="ke-main-wrap">

        {{-- Top bar --}}
        <header class="ke-topbar">
            <div class="d-flex align-items-center gap-3">
                <button class="ke-sidebar-toggle" id="sidebarToggle">
                    <span class="material-symbols-outlined">menu</span>
                </button>
                <div>
                    <div class="ke-topbar-title">Resource Management</div>
                </div>
            </div>
            <div class="d-flex align-items-center gap-2">
                <div class="ke-topbar-user">
                    <span class="ke-topbar-name">{{ Auth::user()->name }}</span>
                    <div class="ke-topbar-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                </div>
            </div>
        </header>

        {{-- Page content --}}
        <main class="ke-page-content">
            @yield('content')
        </main>

        {{-- Footer --}}
        <footer class="ke-app-footer">
            <div class="text-center">
                <div class="ke-brand" style="font-size:1rem;margin-bottom:4px">KEGNE ENERGY</div>
                <p class="mb-1" style="font-size:12px;color:var(--ke-outline)">© 2024 KEGNE ENERGY. All rights reserved.</p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="#" style="font-size:11px;color:var(--ke-outline)">Privacy Policy</a>
                    <a href="#" style="font-size:11px;color:var(--ke-outline)">Terms of Service</a>
                    <a href="#" style="font-size:11px;color:var(--ke-outline)">Contact Support</a>
                </div>
            </div>
        </footer>

    </div>
</div>

{{-- Chat System --}}
@livewire('chat.chat-icon')

{{-- Sidebar overlay for mobile --}}
<div class="ke-sidebar-overlay" id="sidebarOverlay"></div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const toggle   = document.getElementById('sidebarToggle');
    const sidebar  = document.getElementById('keSidebar');
    const overlay  = document.getElementById('sidebarOverlay');

    toggle.addEventListener('click', () => {
        sidebar.classList.toggle('open');
        overlay.classList.toggle('show');
    });
    overlay.addEventListener('click', () => {
        sidebar.classList.remove('open');
        overlay.classList.remove('show');
    });
</script>
@livewireScripts
</body>
</html>