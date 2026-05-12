@extends('layouts.app')
@section('title', 'Battery Management')
@section('content')

<div class="ke-content-header">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
        <div>
            <h1>Battery Management</h1>
            <p>Primary storage monitoring and charge cycle control.</p>
        </div>
        <span class="ke-pill ke-pill-green d-flex align-items-center gap-1" style="font-size:13px;padding:6px 14px">
            <span class="material-symbols-outlined" style="font-size:15px">wifi</span>
            System Online
        </span>
    </div>
</div>

<div class="row g-3 mb-3">

    {{-- Donut charge gauge --}}
    <div class="col-lg-5">
        <div class="ke-section-card h-100 d-flex flex-column align-items-center justify-content-center" style="min-height:260px">
            <div class="ke-donut-wrap mb-3" style="width:180px;height:180px">
                <svg class="ke-donut" width="180" height="180" viewBox="0 0 180 180">
                    <circle cx="90" cy="90" r="70" fill="none" stroke="var(--ke-surface-cont)" stroke-width="18"/>
                    <circle cx="90" cy="90" r="70" fill="none" stroke="var(--ke-tertiary-fixed-dim)"
                            stroke-width="18"
                            stroke-dasharray="{{ round(2 * 3.14159 * 70, 2) }}"
                            stroke-dashoffset="{{ round(2 * 3.14159 * 70 * (1 - 0.82), 2) }}"
                            stroke-linecap="round"/>
                </svg>
                <div class="ke-donut-label">
                    <div class="donut-value" style="font-size:2.2rem;color:var(--ke-primary)">82%</div>
                    <div class="donut-sub">Charging</div>
                </div>
            </div>

            <div class="text-center">
                <div style="font-family:'Manrope',sans-serif;font-size:1.2rem;font-weight:700;color:var(--ke-primary);margin-bottom:2px">
                    Primary Storage Bank
                </div>
                <div style="font-size:12px;color:var(--ke-on-surface-var);margin-bottom:10px">
                    Unit ID: KE-BATT-0822-XP
                </div>
                <span class="ke-pill ke-pill-live">● LIVE MONITORING</span>
            </div>

            <div class="row g-2 w-100 mt-3">
                <div class="col-6">
                    <div style="background:var(--ke-surface-cont-low);border-radius:10px;padding:0.75rem;text-align:center">
                        <p style="font-size:11px;color:var(--ke-on-surface-var);margin-bottom:3px;text-transform:uppercase;letter-spacing:0.05em">Output Power</p>
                        <p style="font-family:'Manrope',sans-serif;font-size:1.2rem;font-weight:700;color:var(--ke-primary);margin:0">4.2 kW</p>
                    </div>
                </div>
                <div class="col-6">
                    <div style="background:var(--ke-surface-cont-low);border-radius:10px;padding:0.75rem;text-align:center">
                        <p style="font-size:11px;color:var(--ke-on-surface-var);margin-bottom:3px;text-transform:uppercase;letter-spacing:0.05em">Estimated Full</p>
                        <p style="font-family:'Manrope',sans-serif;font-size:1.2rem;font-weight:700;color:var(--ke-primary);margin:0">1h 45m</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Health + Temperature --}}
    <div class="col-lg-7">
        <div class="row g-3 h-100">

            {{-- Health --}}
            <div class="col-12">
                <div class="ke-section-card">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div class="section-card-title mb-0">Health</div>
                        <span class="material-symbols-outlined" style="color:var(--ke-outline-var);cursor:pointer">favorite_border</span>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <div class="ke-progress flex-grow-1">
                            <div class="ke-progress-bar green" style="width:94%"></div>
                        </div>
                        <span style="font-size:1rem;font-weight:700;color:var(--ke-primary);white-space:nowrap">94%</span>
                    </div>
                    <p style="font-size:12px;color:var(--ke-on-surface-var);margin-top:6px;margin-bottom:0">
                        Optimal performance maintained over 422 cycles.
                    </p>
                </div>
            </div>

            {{-- Temperature --}}
            <div class="col-12">
                <div class="ke-section-card">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div class="section-card-title mb-0">Temperature</div>
                        <span class="material-symbols-outlined" style="color:var(--ke-tertiary-fixed-dim)">thermostat</span>
                    </div>
                    <div class="d-flex align-items-center gap-3 mb-2">
                        <span style="font-family:'Manrope',sans-serif;font-size:1.8rem;font-weight:700;color:var(--ke-primary)">24.5°C</span>
                        <span class="ke-pill ke-pill-blue">→ Stable</span>
                    </div>
                    {{-- Mini temperature bars --}}
                    <div class="d-flex align-items-flex-end gap-1" style="height:36px">
                        @php
                        $temps = [60,45,55,70,50,65,80,55,60,75,50,45];
                        @endphp
                        @foreach($temps as $i => $t)
                        @php $bg = $i >= 8 ? 'var(--ke-tertiary-fixed-dim)' : 'var(--ke-surface-cont)'; @endphp
                        <div style="--h: {{ $t }}%; --bg: {{ $bg }}; flex: 1; height: var(--h); border-radius: 3px; background: var(--bg); align-self: flex-end"></div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- Charge & Discharge Cycle --}}
<div class="ke-section-card mb-3">
    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
        <div>
            <div class="section-card-title">Charge &amp; Discharge Cycle</div>
            <p class="section-card-sub" style="margin-bottom:0">Last 24-hour power dynamics</p>
        </div>
        <div class="ke-tab-group">
            <button class="ke-tab-btn active">24h</button>
            <button class="ke-tab-btn">7d</button>
            <button class="ke-tab-btn">30d</button>
        </div>
    </div>

    <div class="ke-chart-placeholder" style="height:160px">
        @php
        $charge    = [30,50,70,90,80,60,40,55,75,85,70,50];
        $discharge = [20,30,45,55,40,35,25,40,50,60,45,30];
        @endphp
        @foreach($charge as $i => $c)
        <div style="display:flex;gap:2px;align-items:flex-end;height:130px;flex:1">
            <div class="ke-bar" style="--h: {{ $c }}%; height: var(--h); background: var(--ke-tertiary-fixed-dim); opacity: 0.9"></div>
            <div class="ke-bar" style="--h: {{ $discharge[$i] }}%; height: var(--h); background: var(--ke-primary-container)"></div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-between mt-2 px-1" style="font-size:11px;color:var(--ke-outline)">
        <span>00:00</span><span>06:00</span><span>12:00 (Current)</span><span>18:00</span><span>23:59</span>
    </div>
    <div class="d-flex gap-3 mt-2" style="font-size:12px;color:var(--ke-on-surface-var)">
        <span><span style="display:inline-block;width:10px;height:10px;background:var(--ke-tertiary-fixed-dim);border-radius:2px;margin-right:4px"></span>Charge</span>
        <span><span style="display:inline-block;width:10px;height:10px;background:var(--ke-primary-container);border-radius:2px;margin-right:4px"></span>Discharge</span>
    </div>
</div>

{{-- Operating Modes --}}
<div class="row g-3">
    @php
    $modes = [
        [
            'icon'    => 'bolt',
            'iconBg'  => '#dbeafe',
            'iconColor'=> 'var(--ke-secondary)',
            'title'   => 'Discharge Mode',
            'desc'    => 'Prioritize grid export',
            'active'  => true,
        ],
        [
            'icon'    => 'eco',
            'iconBg'  => '#fef3c7',
            'iconColor'=> '#d97706',
            'title'   => 'Eco Charge',
            'desc'    => 'Maximize solar intake',
            'active'  => false,
        ],
        [
            'icon'    => 'shield',
            'iconBg'  => '#fee2e2',
            'iconColor'=> '#dc2626',
            'title'   => 'Backup Reserve',
            'desc'    => 'Keep 20% for outages',
            'active'  => false,
        ],
    ];
    @endphp
    @foreach($modes as $mode)
    <div class="col-md-4">
        <div class="ke-section-card d-flex align-items-center gap-3" @if($mode['active']) style="border-color: var(--ke-secondary); border-width: 2px" @endif>
            <div style="--bg: {{ $mode['iconBg'] }}; --ic: {{ $mode['iconColor'] }}; width: 44px; height: 44px; border-radius: 12px; background: var(--bg); display: flex; align-items: center; justify-content: center; flex-shrink: 0">
                <span class="material-symbols-outlined" style="color: var(--ic)">{{ $mode['icon'] }}</span>
            </div>
            <div style="flex:1">
                <div style="font-size:14px;font-weight:600;color:var(--ke-on-surface)">{{ $mode['title'] }}</div>
                <div style="font-size:12px;color:var(--ke-on-surface-var)">{{ $mode['desc'] }}</div>
            </div>
            @if($mode['active'])
            <span class="ke-pill ke-pill-blue" style="font-size:10px">Active</span>
            @endif
        </div>
    </div>
    @endforeach
</div>

@endsection