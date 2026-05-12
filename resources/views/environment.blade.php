@extends('layouts.app')
@section('title', 'Environment')
@section('content')

<div class="ke-content-header">
    <h1>Environment</h1>
    <p>Sustainability metrics and carbon impact tracking.</p>
</div>

{{-- CO2 Hero --}}
<div class="ke-section-card mb-3" style="background:var(--ke-primary-container);border:none">
    <div class="d-flex align-items-center gap-2 mb-1">
        <span class="ke-pill ke-pill-live">● LIVE IMPACT</span>
    </div>
    <div style="font-family:'Manrope',sans-serif;font-size:3rem;font-weight:800;color:#fff;line-height:1;margin-bottom:4px">
        12,450 <span style="font-size:1.5rem;font-weight:600">kg</span>
    </div>
    <p style="font-size:13px;color:rgba(255,255,255,0.7);margin-bottom:1.2rem">
        Total Carbon Dioxide Emissions offset by your renewable energy production this year.
    </p>
    <div class="d-flex gap-2">
        <button class="btn ke-btn-gold btn-sm">Download Audit</button>
        <button class="btn ke-btn-ghost btn-sm">View Details</button>
    </div>
</div>

<div class="row g-3 mb-3">
    {{-- Sustainability Score --}}
    <div class="col-md-6">
        <div class="ke-section-card h-100">
            <div class="section-card-title">Sustainability Score</div>
            <p class="section-card-sub">Calculated based on energy mix and carbon intensity.</p>
            <div style="font-family:'Manrope',sans-serif;font-size:3.5rem;font-weight:800;color:var(--ke-primary);line-height:1;margin-bottom:8px">
                A+
            </div>
            <div class="ke-progress mb-1">
                <div class="ke-progress-bar green" style="width:95%"></div>
            </div>
            <p style="font-size:12px;color:#10b981;margin:0">
                <span class="material-symbols-outlined" style="font-size:13px">trending_up</span>
                4% increase from last month
            </p>
        </div>
    </div>

    {{-- Forest Equivalent --}}
    <div class="col-md-6">
        <div class="ke-section-card h-100">
            <div class="d-flex align-items-start gap-2 mb-2">
                <span class="material-symbols-outlined" style="color:var(--ke-tertiary-fixed-dim);font-size:22px">park</span>
                <div class="section-card-title mb-0">Forest Equivalent</div>
            </div>
            <div style="font-family:'Manrope',sans-serif;font-size:2.5rem;font-weight:800;color:var(--ke-primary);line-height:1;margin-bottom:6px">
                562 <span style="font-size:1rem;font-weight:500;color:var(--ke-on-surface-var)">Mature Trees</span>
            </div>
            <p style="font-size:13px;color:var(--ke-on-surface-var);margin-bottom:1rem;line-height:1.55">
                Your energy savings are equivalent to the carbon sequestration of a 1.2 hectare forest growing for ten years.
            </p>
            <p style="font-size:11px;text-transform:uppercase;letter-spacing:0.05em;color:var(--ke-outline);margin-bottom:4px">Annual Target Progress 80%</p>
            <div class="ke-progress">
                <div class="ke-progress-bar green" style="width:80%"></div>
            </div>
        </div>
    </div>
</div>

<div class="row g-3 mb-3">
    {{-- Distance Travel --}}
    <div class="col-md-6">
        <div class="ke-section-card h-100">
            <div class="d-flex align-items-start gap-2 mb-2">
                <span class="material-symbols-outlined" style="color:var(--ke-secondary);font-size:20px">directions_car</span>
                <div class="section-card-title mb-0">Distance Travel</div>
            </div>
            <div style="font-family:'Manrope',sans-serif;font-size:2rem;font-weight:700;color:var(--ke-primary);margin-bottom:4px">
                31,040 <span style="font-size:1rem;font-weight:500;color:var(--ke-on-surface-var)">km</span>
            </div>
            <p style="font-size:13px;color:var(--ke-on-surface-var);margin-bottom:0.75rem">
                Equivalent to driving a mid-sized EV.
            </p>
            <span class="ke-pill ke-pill-blue" style="font-size:11px">0.75x Circumnavigations</span>
            <p style="font-size:12px;color:var(--ke-on-surface-var);margin-top:0.75rem;font-style:italic">
                "Almost one full lap around the Earth saved in emissions."
            </p>
        </div>
    </div>

    {{-- Emissions Avoided --}}
    <div class="col-md-6">
        <div class="ke-section-card h-100">
            <div class="section-card-title mb-3">Emissions Avoided</div>
            {{-- Comparison bars --}}
            @php
            $emComp = [
                ['label'=>'Grid',   'val'=>95, 'color'=>'var(--ke-outline-var)'],
                ['label'=>'Hybrid', 'val'=>60, 'color'=>'var(--ke-secondary)'],
                ['label'=>'Kegne',  'val'=>20, 'color'=>'var(--ke-tertiary-fixed-dim)'],
            ];
            @endphp
            @foreach($emComp as $e)
            <div class="d-flex align-items-center gap-2 mb-2">
                <span style="font-size:12px;font-weight:600;color:var(--ke-on-surface-var);width:42px">{{ $e['label'] }}</span>
                <div class="ke-progress flex-grow-1">
                    <div class="ke-progress-bar" style="width:{{ $e['val'] }}%;background:{{ $e['color'] }}"></div>
                </div>
            </div>
            @endforeach
            <p style="font-size:13px;color:var(--ke-on-surface-var);margin-top:0.75rem;line-height:1.55">
                Your facility is performing <strong>73% better</strong> than the regional average carbon footprint for manufacturing hubs.
            </p>
        </div>
    </div>
</div>

{{-- Additional Metrics --}}
<div class="ke-section-card">
    <div class="section-card-title mb-3">Additional Impact Metrics</div>
    @php
    $extras = [
        ['icon'=>'water_drop',   'iconColor'=>'var(--ke-secondary)',          'label'=>'Water Saved',          'value'=>'1.2M Liters',    'sub'=>'Equivalent to 600 Olympic pools'],
        ['icon'=>'air',          'iconColor'=>'#10b981',                      'label'=>'Air Quality Index',    'value'=>'Excellent (12)', 'sub'=>'Local monitoring station: Bpiu'],
        ['icon'=>'autorenew',    'iconColor'=>'var(--ke-tertiary-fixed-dim)', 'label'=>'Material Recovery',   'value'=>'89.2%',          'sub'=>'Waste-to-energy efficiency'],
        ['icon'=>'verified',     'iconColor'=>'var(--ke-primary)',            'label'=>'Green Certification', 'value'=>'LEED Platinum',  'sub'=>'Verified by ETS Cloud'],
    ];
    @endphp
    @foreach($extras as $ex)
    <div class="d-flex align-items-center gap-3 py-2" style="border-bottom:1px solid rgba(195,198,209,0.35)">
        <div style="width:42px;height:42px;border-radius:12px;background:var(--ke-surface-cont-low);display:flex;align-items:center;justify-content:center;flex-shrink:0">
            <span class="material-symbols-outlined" style="font-size:20px;color:{{ $ex['iconColor'] }}">{{ $ex['icon'] }}</span>
        </div>
        <div style="flex:1">
            <div style="font-size:12px;color:var(--ke-on-surface-var)">{{ $ex['label'] }}</div>
            <div style="font-size:15px;font-weight:700;color:var(--ke-primary)">{{ $ex['value'] }}</div>
            <div style="font-size:12px;color:var(--ke-outline)">{{ $ex['sub'] }}</div>
        </div>
    </div>
    @endforeach
</div>

@endsection