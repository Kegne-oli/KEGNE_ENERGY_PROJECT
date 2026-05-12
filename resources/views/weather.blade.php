@extends('layouts.app')
@section('title', 'Weather Insights')
@section('content')

<div class="ke-content-header">
    <h1>Weather Insights</h1>
    <p>Solar production forecasting based on live weather data.</p>
</div>

<div class="row g-3 mb-3">

    {{-- Current Conditions --}}
    <div class="col-lg-5">
        <div class="ke-section-card h-100">
            <div style="font-size:11px;font-weight:600;text-transform:uppercase;letter-spacing:0.06em;color:var(--ke-on-surface-var);margin-bottom:8px">
                Current Conditions
            </div>
            <div class="d-flex align-items-center gap-3 mb-3">
                <span style="font-family:'Manrope',sans-serif;font-size:3rem;font-weight:800;color:var(--ke-primary)">24°C</span>
                <span class="material-symbols-outlined" style="font-size:2.5rem;color:var(--ke-tertiary-fixed-dim)">sunny</span>
            </div>
            <p style="font-size:14px;color:var(--ke-on-surface-var);margin-bottom:1.2rem">
                Clear skies with high solar potential.
            </p>
            <div class="row g-2">
                @php
                $conditions = [
                    ['label'=>'Irradiance',   'value'=>'942', 'unit'=>'W/m²', 'color'=>'var(--ke-tertiary-fixed-dim)'],
                    ['label'=>'UV Index',     'value'=>'8',   'unit'=>'(High)','color'=>'#dc2626'],
                    ['label'=>'Wind Speed',   'value'=>'12',  'unit'=>'km/h', 'color'=>'var(--ke-secondary)'],
                    ['label'=>'Humidity',     'value'=>'42',  'unit'=>'%',    'color'=>'var(--ke-primary)'],
                ];
                @endphp
                @foreach($conditions as $c)
                <div class="col-6">
                    <div style="background:var(--ke-surface-cont-low);border-radius:10px;padding:0.75rem">
                        <div style="font-size:11px;color:var(--ke-on-surface-var);margin-bottom:3px">{{ $c['label'] }}</div>
                        <div style="--col: {{ $c['color'] }}; font-family:'Manrope',sans-serif;font-size:1.3rem;font-weight:700;color: var(--col)">
                            {{ $c['value'] }} <span style="font-size:0.8rem;font-weight:500;color:var(--ke-on-surface-var)">{{ $c['unit'] }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Production Efficiency --}}
    <div class="col-lg-7">
        <div class="ke-section-card h-100" style="background:var(--ke-primary-container);border:none">
            <div class="section-card-title" style="color:#fff;margin-bottom:0.25rem">Production Efficiency</div>
            <p style="font-size:13px;color:rgba(255,255,255,0.65);margin-bottom:1.5rem">
                Based on current solar irradiance and panel temperature.
            </p>

            <div class="d-flex justify-content-center mb-3">
                <div class="ke-donut-wrap" style="width:160px;height:160px">
                    <svg class="ke-donut" width="160" height="160" viewBox="0 0 160 160">
                        <circle cx="80" cy="80" r="60" fill="none" stroke="rgba(255,255,255,0.15)" stroke-width="16"/>
                        <circle cx="80" cy="80" r="60" fill="none" stroke="var(--ke-tertiary-fixed-dim)"
                                stroke-width="16"
                                stroke-dasharray="{{ round(2 * 3.14159 * 60, 2) }}"
                                stroke-dashoffset="{{ round(2 * 3.14159 * 60 * (1 - 0.90), 2) }}"
                                stroke-linecap="round"/>
                    </svg>
                    <div class="ke-donut-label">
                        <div class="donut-value" style="color:#fff;font-size:2rem">90%</div>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <span class="ke-pill ke-pill-green">
                    <span class="material-symbols-outlined" style="font-size:12px">check_circle</span>
                    OPTIMAL PRODUCTION
                </span>
            </div>
        </div>
    </div>
</div>

{{-- Weather vs Production Correlation --}}
<div class="ke-section-card mb-3">
    <div class="d-flex justify-content-between align-items-center mb-1 flex-wrap gap-2">
        <div>
            <div class="section-card-title">Weather vs Production Correlation</div>
            <p class="section-card-sub">Daily historical overlay of solar irradiance and energy output.</p>
        </div>
        <div class="ke-tab-group">
            <button class="ke-tab-btn">Daily</button>
            <button class="ke-tab-btn active">Weekly</button>
        </div>
    </div>

    <div class="ke-chart-placeholder" style="height:140px">
        @php
        $wBars = [40, 70, 90, 80, 55, 85, 95, 60, 75, 88, 50, 65];
        @endphp
        @foreach($wBars as $h)
        <div class="ke-bar" style="--h: {{ $h }}%; height: var(--h); background: var(--ke-tertiary-fixed-dim); opacity: 0.8; flex: 1; max-width: 32px"></div>
        @endforeach
    </div>
    <div class="d-flex justify-content-between mt-2" style="font-size:11px;color:var(--ke-outline)">
        <span>06:00</span><span>09:00</span><span>12:00</span><span>15:00</span><span>18:00</span><span>21:00</span>
    </div>
</div>

{{-- 5-Day Solar Forecast --}}
<div class="ke-section-card mb-3">
    <div class="section-card-title mb-3">5-Day Solar Forecast</div>
    @php
    $forecast = [
        ['day'=>'TOMORROW',  'icon'=>'sunny',        'iconColor'=>'var(--ke-tertiary-fixed-dim)', 'label'=>'PEAK POTENTIAL',  'labelCss'=>'ke-pill-green',  'value'=>''],
        ['day'=>'WEDNESDAY', 'icon'=>'partly_cloudy_day','iconColor'=>'var(--ke-secondary)',   'label'=>'640 W/m² Irrad.',  'labelCss'=>'ke-pill-blue',   'value'=>'640'],
        ['day'=>'THURSDAY',  'icon'=>'cloud',         'iconColor'=>'var(--ke-outline)',          'label'=>'LOW OUTPUT',       'labelCss'=>'ke-pill-red',    'value'=>''],
        ['day'=>'FRIDAY',    'icon'=>'sunny',         'iconColor'=>'var(--ke-tertiary-fixed-dim)','label'=>'PEAK POTENTIAL', 'labelCss'=>'ke-pill-green',  'value'=>''],
    ];
    @endphp
    @foreach($forecast as $f)
    @foreach($forecast as $f)
    <div class="ke-info-row">
        <div class="d-flex align-items-center gap-3">
            <span style="font-size:13px;font-weight:600;color:var(--ke-on-surface-var);min-width:90px">{{ $f['day'] }}</span>
            <span class="material-symbols-outlined" style="--ic: {{ $f['iconColor'] }}; color: var(--ic); font-size: 22px">{{ $f['icon'] }}</span>
        </div>
        <span class="ke-pill {{ $f['labelCss'] }}" style="font-size:11px">{{ $f['label'] }}</span>
    </div>
    @endforeach
    @endforeach
</div>

{{-- Environment Impact CTA --}}
<div class="ke-section-card" style="background:var(--ke-primary-container);border:none;position:relative;overflow:hidden">
    <span class="ke-pill ke-pill-gold mb-2" style="display:inline-flex;font-size:10px">ENVIRONMENT IMPACT</span>
    <h3 style="color:#fff;font-family:'Manrope',sans-serif;font-weight:700;font-size:1.3rem;margin-bottom:0.5rem">
        Clean Energy Conditions
    </h3>
    <p style="color:rgba(255,255,255,0.75);font-size:13px;margin-bottom:1.2rem;line-height:1.6">
        Your facility is currently offsetting 14.2 tons of CO2 today due to optimal clearing conditions.
    </p>
    <button class="btn ke-btn-gold btn-sm">View Details</button>
</div>

@endsection