@extends('layouts.guest')

@section('title', 'Smart Solar Management')

@section('content')

{{-- ══ NAVBAR ══════════════════════════════════════════════ --}}
<nav class="navbar navbar-expand-md ke-navbar fixed-top">
    <div class="container-xl">
        <a class="navbar-brand ke-brand" href="#">KEGNE ENERGY</a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#landingNav"
                aria-controls="landingNav" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="landingNav">
            <ul class="navbar-nav mx-auto gap-1">
                <li class="nav-item"><a class="nav-link" href="#features">Features</a></li>
                <li class="nav-item"><a class="nav-link" href="#how">How it works</a></li>
                <li class="nav-item"><a class="nav-link" href="#cta">Pricing</a></li>
            </ul>
            <div class="d-flex align-items-center gap-2 mt-2 mt-md-0">
                <a href="{{ route('login') }}"    class="btn ke-btn-outline btn-sm">Login</a>
                <a href="{{ route('register') }}" class="btn ke-btn-primary btn-sm">Get Started</a>
            </div>
        </div>
    </div>
</nav>

<main>

    {{-- ══ HERO ═════════════════════════════════════════════ --}}
    <section class="ke-hero">
        <div class="container-xl">
            <div class="row align-items-center g-5">

                {{-- Left copy --}}
                <div class="col-lg-6">
                    <div class="ke-badge">
                        <span class="material-symbols-outlined" style="font-size:15px">bolt</span>
                        Empowering the future of Solar
                    </div>
                    <h1>Manage your solar energy the smart way</h1>
                    <p class="lead">
                        Real-time monitoring, intelligent storage optimization, and automated reporting.
                        Experience the most advanced energy management platform ever built.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="{{ route('register') }}" class="btn ke-btn-primary">Get Started Now</a>
                        <button class="btn ke-btn-outline">
                            <span class="material-symbols-outlined" style="font-size:17px">play_circle</span>
                            Live Demo
                        </button>
                    </div>
                </div>

                {{-- Right image --}}
                <div class="col-lg-6">
                    <img
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBsUDdHP1yVSQyrEevekpz28ESvW4qlnhTM9G_4JUyJeKreDwwKcelohhkg9zCsLWZEnPVky5ZTi_nku9-bPFAoDhscxPLwLuS13KIoVPLTVwteQpaEVsOHZuHdvW5JPQljaFD2_p14gYcN9azEm9FHBLQNiq01tuJ1ZfTo6YQrr8u3Ip-KDPnpx5Af149OP9mnnqzCm5NrXz7eEUERxgf3Lg6y7e6ZErMAV85KNFsYe3bzn5AxCZEJ8vwd9Cc8SOxcifbzpjRwO9Y"
                        alt="KEGNE ENERGY Dashboard"
                        class="ke-dashboard-img"
                    >
                </div>

            </div>
        </div>
    </section>

    {{-- ══ STATS BAR ════════════════════════════════════════ --}}
    <section class="ke-stats-bar">
        <div class="container-xl">
            <div class="row text-center g-4">
                <div class="col-6 col-md-3">
                    <div class="stat-number">12,400+</div>
                    <div class="stat-label">Installations</div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-number gold">4.2 GWh</div>
                    <div class="stat-label">Energy Produced</div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-number">850k</div>
                    <div class="stat-label">Tons CO2 Saved</div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-number gold">$2.8M</div>
                    <div class="stat-label">User Savings</div>
                </div>
            </div>
        </div>
    </section>

    {{-- ══ FEATURES ═════════════════════════════════════════ --}}
    <section class="ke-features" id="features">
        <div class="container-xl">
            <div class="text-center mb-5">
                <h2 class="section-title ke-heading">Comprehensive Energy Control</h2>
                <p class="section-sub">
                    A suite of powerful tools designed to help you monitor, manage, and maximize
                    your renewable energy investment with industrial-grade precision.
                </p>
            </div>

            @php
            $features = [
                [
                    'icon'  => 'monitoring',
                    'bg'    => '#0d3b6e',
                    'color' => '#82a6e0',
                    'title' => 'Live Monitoring',
                    'desc'  => 'Real-time data streaming from your solar array directly to your dashboard with sub-second latency.',
                ],
                [
                    'icon'  => 'battery_charging_full',
                    'bg'    => '#58b8ff',
                    'color' => '#00476e',
                    'title' => 'Storage Optimization',
                    'desc'  => 'AI-driven algorithms that manage battery cycles to ensure longevity and maximum efficiency during peak hours.',
                ],
                [
                    'icon'  => 'auto_graph',
                    'bg'    => '#ffddb4',
                    'color' => '#633f00',
                    'title' => 'Predictive Analytics',
                    'desc'  => 'Forecasting models that predict energy generation based on hyper-local weather patterns and history.',
                ],
                [
                    'icon'  => 'notifications_active',
                    'bg'    => '#00254d',
                    'color' => '#ffffff',
                    'title' => 'Instant Alerts',
                    'desc'  => 'Get notified immediately about performance drops, maintenance needs, or unusual consumption patterns.',
                ],
                [
                    'icon'  => 'description',
                    'bg'    => '#dee9fc',
                    'color' => '#00254d',
                    'title' => 'Automated Reports',
                    'desc'  => 'Generate weekly or monthly compliance and performance reports with a single click or schedule them.',
                ],
                [
                    'icon'  => 'build',
                    'bg'    => '#ffdad6',
                    'color' => '#93000a',
                    'title' => 'Maintenance Hub',
                    'desc'  => 'Detailed health diagnostics for every panel and inverter in your system to prevent downtime.',
                ],
                [
                    'icon'  => 'cloud',
                    'bg'    => '#006497',
                    'color' => '#ffffff',
                    'title' => 'Cloud Sync',
                    'desc'  => 'Securely access your data from anywhere in the world across all your mobile and desktop devices.',
                ],
                [
                    'icon'  => 'eco',
                    'bg'    => '#533400',
                    'color' => '#ffddb4',
                    'title' => 'Carbon Tracking',
                    'desc'  => 'Quantify your environmental impact with precise metrics on CO2 offset and fossil fuel reduction.',
                ],
            ];
            @endphp

            <div class="row g-4">
                @foreach($features as $f)
                <div class="col-sm-6 col-lg-3">
                    <div class="ke-feature-card">
                        <div class="ke-icon-box feature-icon feature-icon-{{ $loop->index }}">
                            <span class="material-symbols-outlined">{{ $f['icon'] }}</span>
                        </div>
                        <h5>{{ $f['title'] }}</h5>
                        <p>{{ $f['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ══ CTA ══════════════════════════════════════════════ --}}
    <section class="ke-cta-section" id="cta">
        <div class="container-xl">
            <div class="ke-cta-wrap">
                <img
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAtZtoP4NeAekNCQOeQfCwt4pN2P8QSkzIAbBeQG9a7mnrp723tbNuHOIf0_-p0dPVamzs_s9BJOhFismeB8k8szHmQfWw0eSfOjqfZKBm2LmsbVa3TapFrMxTfnHkjPWE344Y56wD3JdXU0W-r5dISe8HEFNpVOlqEL_bR-r23ZjQ7rxBvMfzaLuxPJI6oDfJxqDgWrQ4LafSXbYobZTzwKvCO3wj1FciikySSjN8G19eBMdmTwIRRhATKB4mFplUw9o-RiBLduVQ"
                    alt=""
                    class="cta-bg"
                >
                <div class="ke-cta-inner">
                    <h2>Ready to take control of your energy?</h2>
                    <p>
                        Join over 12,000 users who are already optimizing their solar production
                        and saving thousands annually with KEGNE ENERGY.
                    </p>
                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                        <a href="{{ route('register') }}" class="btn ke-btn-gold">Start Your Free Trial</a>
                        <button class="btn ke-btn-ghost">Schedule a Consult</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

{{-- ══ FOOTER ═══════════════════════════════════════════════ --}}
<footer class="ke-footer">
    <div class="container-xl">
        <div class="row align-items-center gy-3">

            <div class="col-md-4 text-center text-md-start">
                <div class="brand-name">KEGNE ENERGY</div>
                <p class="copy mt-1">© 2025 KEGNE ENERGY. All rights reserved.</p>
            </div>

            <div class="col-md-4 d-flex justify-content-center gap-4 flex-wrap">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
                <a href="#">Contact Support</a>
            </div>

            <div class="col-md-4 d-flex justify-content-center justify-content-md-end gap-2">
                <button class="ke-social-btn" title="Website">
                    <span class="material-symbols-outlined" style="font-size:18px">public</span>
                </button>
                <button class="ke-social-btn" title="Community">
                    <span class="material-symbols-outlined" style="font-size:18px">group</span>
                </button>
                <button class="ke-social-btn" title="Share">
                    <span class="material-symbols-outlined" style="font-size:18px">share</span>
                </button>
            </div>

        </div>
    </div>
</footer>

@endsection