@extends('layouts.app')
@section('title', 'Energy Monitoring')
@section('content')

<div class="ke-content-header">
    <h1>Energy Production</h1>
    <p>Real-time performance tracking and forecasting.</p>
</div>

{{-- Time range tabs --}}
<div class="mb-4">
    <div class="ke-tab-group">
        <button class="ke-tab-btn active">Day</button>
        <button class="ke-tab-btn">Week</button>
        <button class="ke-tab-btn">Month</button>
        <button class="ke-tab-btn">Year</button>
    </div>
</div>

{{-- Production Output Chart --}}
<div class="ke-section-card mb-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <div class="section-card-title">Production Output (kW)</div>
        </div>
        <button class="btn ke-btn-outline btn-sm d-flex align-items-center gap-1" style="font-size:13px">
            <span class="material-symbols-outlined" style="font-size:16px">download</span>
            Export Data
        </button>
    </div>

    {{-- Line chart simulation --}}
    <div style="position:relative;height:180px;background:var(--ke-surface-cont-low);border-radius:10px;overflow:hidden;padding:1rem">
        <svg viewBox="0 0 400 120" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:100%">
            <defs>
                <linearGradient id="prodGrad" x1="0" y1="0" x2="0" y2="1">
                    <stop offset="0%"   stop-color="#006497" stop-opacity="0.25"/>
                    <stop offset="100%" stop-color="#006497" stop-opacity="0"/>
                </linearGradient>
            </defs>
            <path d="M0,100 C30,90 50,70 80,50 C110,30 130,15 160,8 C190,2 210,30 240,60 C270,90 290,110 320,95 C350,80 370,55 400,40"
                  fill="none" stroke="#006497" stroke-width="2.5"/>
            <path d="M0,100 C30,90 50,70 80,50 C110,30 130,15 160,8 C190,2 210,30 240,60 C270,90 290,110 320,95 C350,80 370,55 400,40 L400,120 L0,120 Z"
                  fill="url(#prodGrad)"/>
            <circle cx="160" cy="8" r="5" fill="var(--ke-tertiary-fixed-dim)" stroke="#fff" stroke-width="1.5"/>
        </svg>
    </div>
    <div class="d-flex justify-content-between mt-2 px-1" style="font-size:11px;color:var(--ke-outline)">
        <span>06:00</span><span>09:00</span><span>12:00</span><span>15:00</span><span>18:00</span><span>21:00</span>
    </div>
</div>

<div class="row g-3 mb-3">
    {{-- Peak Production --}}
    <div class="col-md-4">
        <div class="ke-metric-card dark">
            <div class="metric-label">PEAK PRODUCTION</div>
            <div class="metric-value" style="font-size:2.4rem">42.8 <span class="metric-unit">kW</span></div>
            <p class="metric-sub" style="color:var(--ke-tertiary-fixed-dim)">
                <span class="material-symbols-outlined" style="font-size:14px">trending_up</span>
                12% higher than yesterday
            </p>
        </div>
    </div>

    {{-- Avg Efficiency --}}
    <div class="col-md-4">
        <div class="ke-metric-card">
            <div class="metric-label">AVG. EFFICIENCY</div>
            <div class="metric-value">94.2 <span class="metric-unit">%</span></div>
            <div class="ke-progress mt-2 mb-1">
                <div class="ke-progress-bar gold" style="width:94%"></div>
            </div>
            <p class="metric-sub">Optimal Range: 90–98%</p>
        </div>
    </div>

    {{-- Core Temperature --}}
    <div class="col-md-4">
        <div class="ke-metric-card">
            <div class="d-flex align-items-center gap-2 mb-2">
                <span class="material-symbols-outlined" style="font-size:22px;color:var(--ke-secondary)">thermostat</span>
                <span style="font-size:14px;color:var(--ke-on-surface-var)">Core Temperature</span>
            </div>
            <div class="metric-value" style="font-size:1.8rem;margin-bottom:0.5rem">32.4°C</div>
            <span class="ke-pill ke-pill-green">
                <span class="material-symbols-outlined" style="font-size:12px">check_circle</span>
                OPTIMAL
            </span>
        </div>
    </div>
</div>

{{-- Environment Impact --}}
<div class="ke-section-card">
    <div class="section-card-title">Environment Impact</div>
    <p class="section-card-sub">Your energy production has saved 1,240 lbs of CO2 emissions this month.</p>
    <div class="row g-3">
        <div class="col-6 col-md-3">
            <div style="text-align:center">
                <p style="font-size:12px;color:var(--ke-on-surface-var);margin-bottom:4px">Trees Planted Equiv.</p>
                <p style="font-family:'Manrope',sans-serif;font-size:1.8rem;font-weight:700;color:var(--ke-primary);margin:0">84</p>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div style="text-align:center">
                <p style="font-size:12px;color:var(--ke-on-surface-var);margin-bottom:4px">Gasoline Saved</p>
                <p style="font-family:'Manrope',sans-serif;font-size:1.8rem;font-weight:700;color:var(--ke-primary);margin:0">62 <span style="font-size:1rem">gal</span></p>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div style="text-align:center">
                <p style="font-size:12px;color:var(--ke-on-surface-var);margin-bottom:4px">CO2 Offset</p>
                <p style="font-family:'Manrope',sans-serif;font-size:1.8rem;font-weight:700;color:var(--ke-primary);margin:0">562 <span style="font-size:1rem">kg</span></p>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div style="text-align:center">
                <p style="font-size:12px;color:var(--ke-on-surface-var);margin-bottom:4px">System Uptime</p>
                <p style="font-family:'Manrope',sans-serif;font-size:1.8rem;font-weight:700;color:var(--ke-primary);margin:0">99.8<span style="font-size:1rem">%</span></p>
            </div>
        </div>
    </div>
</div>

@endsection