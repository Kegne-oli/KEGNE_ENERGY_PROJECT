@extends('layouts.app')
@section('title', 'Active Alerts')
@section('content')

<div class="ke-content-header">
    <h1>Active Alerts</h1>
    <p>Real-time notification management and system anomalies.</p>
</div>

{{-- Action Bar --}}
<div class="d-flex align-items-center gap-2 mb-4 flex-wrap">
    <button class="btn ke-btn-primary d-flex align-items-center gap-1">
        <span class="material-symbols-outlined" style="font-size:16px">done_all</span>
        Resolve All
    </button>
    <button class="btn ke-btn-outline d-flex align-items-center gap-1">
        <span class="material-symbols-outlined" style="font-size:16px">refresh</span>
        Refresh
    </button>
    <div class="ms-auto d-flex align-items-center gap-2 flex-wrap">
        {{-- Search --}}
        <div style="position:relative">
            <span class="material-symbols-outlined" style="position:absolute;left:10px;top:50%;transform:translateY(-50%);font-size:17px;color:var(--ke-outline)">search</span>
            <input type="text" class="form-control" placeholder="Search by alert ID or title..."
                   style="padding-left:34px;font-size:13px;border-radius:10px;border-color:var(--ke-outline-var);min-width:220px">
        </div>
        {{-- Severity filter --}}
        <select class="form-select" style="font-size:13px;border-radius:10px;border-color:var(--ke-outline-var);width:auto">
            <option>Severity: All</option>
            <option>Critical</option>
            <option>Warning</option>
            <option>Info</option>
            <option>Resolved</option>
        </select>
        {{-- Time filter --}}
        <select class="form-select" style="font-size:13px;border-radius:10px;border-color:var(--ke-outline-var);width:auto">
            <option>Last 24 Hours</option>
            <option>Last 7 Days</option>
            <option>Last 30 Days</option>
        </select>
    </div>
</div>

{{-- Alert List --}}
@php
$alerts = [
    [
        'type'    => 'critical',
        'badge'   => 'CRITICAL',
        'badgeCss'=> 'ke-pill-red',
        'icon'    => 'error',
        'iconBg'  => '#fee2e2',
        'iconColor'=> '#dc2626',
        'title'   => 'Grid Inverter Failure',
        'desc'    => 'Unit #TR-882 in Sector B has stopped reporting. Immediate physical inspection required to prevent power feed issues.',
        'time'    => '4 minutes ago',
        'solar'   => 'Solar: 8',
    ],
    [
        'type'    => 'warning',
        'badge'   => 'WARNING',
        'badgeCss'=> 'ke-pill-orange',
        'icon'    => 'warning',
        'iconBg'  => '#fef3c7',
        'iconColor'=> '#d97706',
        'title'   => 'High Battery Temperature',
        'desc'    => 'Battery Module #9-1 at 45°C. Fans operating. Cooling system efficiency drop detected.',
        'time'    => '22 minutes ago',
        'solar'   => 'Solar: 5',
    ],
    [
        'type'    => 'resolved',
        'badge'   => 'RESOLVED',
        'badgeCss'=> 'ke-pill-green',
        'icon'    => 'check_circle',
        'iconBg'  => '#d1fae5',
        'iconColor'=> '#059669',
        'title'   => 'Communication Restored',
        'desc'    => 'External sensor array is back online after scheduled maintenance.',
        'time'    => '1 hour ago',
        'solar'   => 'Solar: 6',
    ],
    [
        'type'    => 'warning',
        'badge'   => 'WARNING',
        'badgeCss'=> 'ke-pill-orange',
        'icon'    => 'electric_bolt',
        'iconBg'  => '#fef3c7',
        'iconColor'=> '#d97706',
        'title'   => 'Voltage Instability Detected',
        'desc'    => 'Minor voltage fluctuation on Phase 3 of the South distribution hub. Currently within 2% of threshold.',
        'time'    => '2 hours ago',
        'solar'   => 'Solar: 3',
    ],
];
@endphp

<div class="row g-3 mb-4">
    <div class="col-lg-8">
        @foreach($alerts as $alert)
        <div class="ke-alert-item {{ $alert['type'] }} mb-3">
            <div class="alert-icon" style="--bg: {{ $alert['iconBg'] }}; background: var(--bg)">
                <span class="material-symbols-outlined" style="--ic: {{ $alert['iconColor'] }}; color: var(--ic); font-size: 20px">{{ $alert['icon'] }}</span>
            </div>
            <div style="flex:1;min-width:0">
                <div class="d-flex align-items-center gap-2 mb-1 flex-wrap">
                    <span class="alert-title">{{ $alert['title'] }}</span>
                    <span class="ke-pill {{ $alert['badgeCss'] }}" style="font-size:10px">{{ $alert['badge'] }}</span>
                </div>
                <p class="alert-desc">{{ $alert['desc'] }}</p>
                <div class="d-flex gap-3 flex-wrap">
                    <span class="alert-meta">
                        <span class="material-symbols-outlined" style="font-size:12px">schedule</span>
                        {{ $alert['time'] }}
                    </span>
                    <span class="alert-meta">
                        <span class="material-symbols-outlined" style="font-size:12px">bolt</span>
                        {{ $alert['solar'] }}
                    </span>
                </div>
            </div>
            @if($alert['type'] !== 'resolved')
            <button class="btn btn-sm ke-btn-outline align-self-start" style="font-size:12px;white-space:nowrap">
                Resolve
            </button>
            @endif
        </div>
        @endforeach
    </div>

    {{-- Right column: density + predictive --}}
    <div class="col-lg-4">

        {{-- Alert Density --}}
        <div class="ke-section-card mb-3">
            <div class="section-card-title mb-1" style="font-size:13px;text-transform:uppercase;letter-spacing:0.05em;font-weight:600;color:var(--ke-on-surface-var)">Alert Density</div>
            <div class="ke-chart-placeholder" style="height:100px">
                @php
                $density = [20,35,25,80,30,45,20,35,55,25,40,70];
                @endphp
                @foreach($density as $i => $h)
                @php $bg = $i === 3 ? '#dc2626' : 'var(--ke-outline-var)'; @endphp
                <div class="ke-bar" style="--h: {{ $h }}%; --bg: {{ $bg }}; height: var(--h); background: var(--bg); max-width: 20px; flex: 1"></div>
                @endforeach
            </div>
            <p style="font-size:12px;color:var(--ke-on-surface-var);margin-top:0.5rem;margin-bottom:0">
                Spike detected at 09:00 AM PST during peak load.
            </p>
        </div>

        {{-- Predictive Maintenance --}}
        <div class="ke-section-card" style="background:var(--ke-primary-container);border:none">
            <div class="section-card-title mb-2" style="color:#fff">Predictive Maintenance Active</div>
            <p style="font-size:13px;color:rgba(255,255,255,0.75);margin-bottom:1rem;line-height:1.6">
                AI-driven analysis has identified 3 potential failures before they occur
                in the Northern Array. Scheduled maintenance has been automated for next Tuesday.
            </p>
            <div class="d-flex gap-2 flex-wrap">
                <span class="ke-pill ke-pill-gold">AI Optimized</span>
                <span class="ke-pill" style="background:rgba(255,255,255,0.15);color:#fff">v4.2.0 Core Enabled</span>
            </div>
        </div>

    </div>
</div>

@endsection