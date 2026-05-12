@extends('layouts.app')
@section('title', 'Analytics Overview')
@section('content')

<div class="ke-content-header">
    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
        <div>
            <h1>Analytics Overview</h1>
            <p>Detailed performance and degradation insights for Q3 2024.</p>
        </div>
        <button class="btn ke-btn-outline btn-sm d-flex align-items-center gap-1">
            <span class="material-symbols-outlined" style="font-size:16px">calendar_month</span>
            Last 30 Days
        </button>
    </div>
</div>

<div class="row g-3 mb-3">
    {{-- Performance Ratio --}}
    <div class="col-md-6">
        <div class="ke-metric-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <span class="ke-pill ke-pill-green mb-2" style="font-size:10px">↑ 2.4%</span>
                    <div class="metric-label">PERFORMANCE RATIO</div>
                    <div class="metric-value">84.2 <span class="metric-unit">%</span></div>
                    <div class="ke-progress mt-2 mb-1">
                        <div class="ke-progress-bar" style="width:84%"></div>
                    </div>
                    <p class="metric-sub">Vs. 81.8% average target</p>
                </div>
                <div class="metric-icon" style="background:var(--ke-surface-cont)">
                    <span class="material-symbols-outlined" style="color:var(--ke-primary)">speed</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Avg Panel Efficiency --}}
    <div class="col-md-6">
        <div class="ke-metric-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <span class="ke-pill ke-pill-orange mb-2" style="font-size:10px">↓ 0.5%</span>
                    <div class="metric-label">AVG. PANEL EFFICIENCY</div>
                    <div class="metric-value">21.8 <span class="metric-unit">%</span></div>
                    <div class="ke-progress mt-2 mb-1">
                        <div class="ke-progress-bar gold" style="width:91%"></div>
                    </div>
                    <p class="metric-sub">Theoretical: 24.1% <span class="ke-pill ke-pill-blue" style="font-size:10px">STC Rating Match</span></p>
                </div>
                <div class="metric-icon" style="background:#fef3c7">
                    <span class="material-symbols-outlined" style="color:#92400e">solar_power</span>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Current Power Output --}}
<div class="ke-metric-card dark mb-3">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <span class="ke-pill ke-pill-live">● LIVE GENERATION</span>
            </div>
            <div class="metric-label">CURRENT POWER OUTPUT</div>
            <div class="metric-value" style="font-size:2.8rem">12.4 <span class="metric-unit">MW</span></div>
            <p class="metric-sub">System wide monitoring active</p>
        </div>
    </div>
</div>

{{-- System Degradation Trend --}}
<div class="ke-section-card mb-3">
    <div class="d-flex gap-2 align-items-center mb-1" style="flex-wrap:wrap">
        <div class="section-card-title mb-0">System Degradation Trend</div>
        <div class="d-flex gap-3 ms-auto" style="font-size:12px;color:var(--ke-on-surface-var)">
            <span><span style="display:inline-block;width:10px;height:10px;background:var(--ke-primary);border-radius:2px;margin-right:4px"></span>Actual</span>
            <span><span style="display:inline-block;width:10px;height:10px;background:var(--ke-outline-var);border-radius:2px;margin-right:4px"></span>Projected</span>
        </div>
    </div>
    <p class="section-card-sub">Projected vs actual efficiency decline over 5 years</p>

    <div class="ke-chart-placeholder" style="height:140px">
        @php
        $degActual    = [98, 97, 96, 95, 94];
        $degProjected = [97, 96, 94, 93, 91];
        $years = ['YR1','YR2','YR3','YR4','YR5'];
        @endphp
        @foreach($years as $i => $yr)
        <div style="display:flex;flex-direction:column;align-items:center;gap:3px;flex:1;justify-content:flex-end">
            <div style="display:flex;gap:3px;align-items:flex-end;height:110px">
                <div class="ke-bar" style="height:{{ $degActual[$i] }}%;background:var(--ke-primary)"></div>
                <div class="ke-bar" style="height:{{ $degProjected[$i] }}%;background:var(--ke-outline-var)"></div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-around mt-2" style="font-size:11px;color:var(--ke-outline)">
        @foreach($years as $yr)<span>{{ $yr }}</span>@endforeach
    </div>

    <div class="d-flex align-items-start gap-2 mt-3 p-3 rounded" style="background:var(--ke-surface-cont-low)">
        <span class="material-symbols-outlined" style="font-size:18px;color:var(--ke-secondary)">info</span>
        <p style="font-size:13px;color:var(--ke-on-surface-var);margin:0;line-height:1.6">
            Annual degradation rate is currently <strong>0.45%</strong>, performing
            0.05% better than industry standard warranties.
        </p>
    </div>
</div>

{{-- Comparative ROI --}}
<div class="ke-section-card mb-3">
    <div class="section-card-title mb-3">Comparative ROI</div>

    <div class="mb-3">
        <div class="d-flex justify-content-between mb-1" style="font-size:13px">
            <span style="color:var(--ke-on-surface-var)">Current Quarter</span>
            <strong style="color:var(--ke-primary)">$42,800</strong>
        </div>
        <div class="ke-progress">
            <div class="ke-progress-bar" style="width:85%"></div>
        </div>
    </div>
    <div class="mb-3">
        <div class="d-flex justify-content-between mb-1" style="font-size:13px">
            <span style="color:var(--ke-on-surface-var)">Previous Quarter</span>
            <strong style="color:var(--ke-on-surface-var)">$38,200</strong>
        </div>
        <div class="ke-progress">
            <div class="ke-progress-bar" style="width:76%;background:var(--ke-outline-var)"></div>
        </div>
    </div>

    <a href="{{ route('reports') }}" style="font-size:13px;color:var(--ke-primary);font-weight:600;text-decoration:none">
        View Full Financial Report →
    </a>
</div>

{{-- Thermal Scan --}}
<div class="ke-section-card">
    <div class="d-flex justify-content-between align-items-center mb-2">
        <div class="section-card-title mb-0">Thermal Scan Data</div>
        <span class="material-symbols-outlined" style="color:var(--ke-on-surface-var);cursor:pointer">more_vert</span>
    </div>
    <div style="width:100%;height:140px;border-radius:10px;overflow:hidden;background:linear-gradient(135deg,#1a3a5c,#d97706,#b45309);opacity:0.85"></div>
    <div class="d-flex align-items-center gap-2 mt-2">
        <span style="width:10px;height:10px;border-radius:50%;background:#dc2626;display:inline-block"></span>
        <span style="font-size:13px;color:var(--ke-on-surface-var)">2 Potential Hotspots Detected</span>
    </div>
</div>

@endsection