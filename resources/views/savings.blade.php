@extends('layouts.app')
@section('title', 'Savings')
@section('content')

<div class="ke-content-header">
    <h1>Savings</h1>
    <p>Financial overview and return on investment tracking.</p>
</div>

{{-- Accumulated Savings --}}
<div class="ke-section-card mb-3" style="background:var(--ke-primary-container);border:none">
    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
        <div>
            <p style="font-size:11px;font-weight:600;color:rgba(255,255,255,0.6);margin-bottom:4px;text-transform:uppercase;letter-spacing:0.06em">Accumulated Savings</p>
            <div style="font-family:'Manrope',sans-serif;font-size:2.4rem;font-weight:800;color:#fff;line-height:1">$12,482.50</div>
        </div>
        <div class="ke-pill ke-pill-green" style="font-size:12px;padding:6px 14px">
            <span class="material-symbols-outlined" style="font-size:14px">trending_up</span>
            +12.4% vs LY
        </div>
    </div>
    <div class="row g-3 mt-2">
        <div class="col-6">
            <div style="background:rgba(255,255,255,0.1);border-radius:10px;padding:0.85rem">
                <p style="font-size:11px;color:rgba(255,255,255,0.6);margin-bottom:4px">Year to Date</p>
                <p style="font-family:'Manrope',sans-serif;font-size:1.3rem;font-weight:700;color:#fff;margin:0">$2,140.00</p>
            </div>
        </div>
        <div class="col-6">
            <div style="background:rgba(255,255,255,0.1);border-radius:10px;padding:0.85rem">
                <p style="font-size:11px;color:rgba(255,255,255,0.6);margin-bottom:4px">Lifetime Savings</p>
                <p style="font-family:'Manrope',sans-serif;font-size:1.3rem;font-weight:700;color:var(--ke-tertiary-fixed-dim);margin:0">$12,482.50</p>
            </div>
        </div>
    </div>
</div>

{{-- Payback Period --}}
<div class="ke-section-card mb-3">
    <div class="section-card-title mb-1">Payback Period Status</div>
    <div class="d-flex justify-content-center my-3">
        <div class="ke-donut-wrap" style="width:160px;height:160px">
            <svg class="ke-donut" width="160" height="160" viewBox="0 0 160 160">
                <circle cx="80" cy="80" r="60" fill="none" stroke="var(--ke-surface-cont)" stroke-width="16"/>
                <circle cx="80" cy="80" r="60" fill="none" stroke="var(--ke-primary)"
                        stroke-width="16"
                        stroke-dasharray="{{ 2 * 3.14159 * 60 }}"
                        stroke-dashoffset="{{ 2 * 3.14159 * 60 * (1 - 0.64) }}"
                        stroke-linecap="round"/>
            </svg>
            <div class="ke-donut-label">
                <div class="donut-value">64%</div>
                <div class="donut-sub">Progress</div>
            </div>
        </div>
    </div>
    <p class="text-center mb-0" style="font-size:14px;color:var(--ke-on-surface-var)">Estimated 2.4 years remaining</p>
    <p class="text-center" style="font-size:12px;color:var(--ke-outline)">Total ROI: 4.8 / 7.2 Years</p>
</div>

{{-- Solar vs Grid Cost Comparison --}}
<div class="ke-section-card mb-3">
    <div class="section-card-title">Solar vs. Grid Cost Comparison</div>
    <p class="section-card-sub">Monthly cost breakdown of energy sources</p>
    <div class="d-flex gap-3 mb-3" style="font-size:12px">
        <span><span style="display:inline-block;width:10px;height:10px;background:var(--ke-primary);border-radius:50%;margin-right:4px"></span>Solar Production</span>
        <span><span style="display:inline-block;width:10px;height:10px;background:var(--ke-outline-var);border-radius:50%;margin-right:4px"></span>Grid Reliance</span>
    </div>
    <div class="ke-chart-placeholder" style="height:150px">
        @php
        $months = ['Jan','Feb','Mar','Apr','May','Jun'];
        $solar  = [80, 70, 85, 90, 75, 95];
        $grid   = [30, 35, 25, 20, 40, 15];
        @endphp
        @foreach($months as $i => $m)
        <div style="display:flex;flex-direction:column;align-items:center;gap:3px;flex:1;justify-content:flex-end">
            <div style="display:flex;gap:3px;align-items:flex-end;height:120px">
                <div class="ke-bar" style="--h: {{ $solar[$i] }}%; height: var(--h); background: var(--ke-primary)"></div>
                <div class="ke-bar" style="--h: {{ $grid[$i] }}%; height: var(--h); background: var(--ke-outline-var)"></div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-around mt-2" style="font-size:11px;color:var(--ke-outline)">
        @foreach($months as $m)<span>{{ $m }}</span>@endforeach
    </div>
</div>

{{-- Long-term Financial Benefits --}}
<div class="ke-section-card mb-3">
    <div class="section-card-title">Long-term Financial Benefits</div>

    <div style="position:relative;height:140px;background:var(--ke-surface-cont-low);border-radius:10px;overflow:hidden;padding:1rem;margin-bottom:1rem">
        <svg viewBox="0 0 400 100" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:100%">
            <path d="M0,90 C50,85 100,75 150,60 C200,45 250,30 300,18 C330,10 360,6 400,2"
                  fill="none" stroke="var(--ke-primary)" stroke-width="2.5"/>
        </svg>
        <div style="position:absolute;bottom:12px;left:16px;font-size:11px;color:var(--ke-outline)">Year 1</div>
        <div style="position:absolute;bottom:12px;left:50%;transform:translateX(-50%);font-size:11px;color:var(--ke-outline)">Year 10</div>
        <div style="position:absolute;bottom:12px;right:16px;font-size:11px;color:var(--ke-outline)">Year 20</div>
    </div>

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
        <div class="d-flex align-items-center gap-2">
            <span class="material-symbols-outlined" style="color:var(--ke-on-surface-var)">account_balance</span>
            <span style="font-size:14px;color:var(--ke-on-surface-var)">Projected 20yr Profit: <strong style="color:var(--ke-primary)">$84,000</strong></span>
        </div>
        <button class="btn ke-btn-primary btn-sm">Download Forecast</button>
    </div>
</div>

{{-- Upgrade CTA --}}
<div class="ke-section-card" style="background:var(--ke-primary-container);border:none;position:relative;overflow:hidden">
    <span class="ke-pill ke-pill-gold mb-2" style="display:inline-flex">SYSTEM OPTIMIZATION</span>
    <h3 style="color:#fff;font-family:'Manrope',sans-serif;font-weight:700;font-size:1.4rem;margin-bottom:0.5rem">
        Upgrade to Battery Storage
    </h3>
    <p style="color:rgba(255,255,255,0.75);font-size:14px;margin-bottom:1.2rem">
        Increase your energy independence by 40% and save an additional $45/month.
    </p>
    <button class="btn w-100" style="background:#fff;color:var(--ke-primary);font-weight:600;border-radius:10px;font-size:14px">
        Explore Options
    </button>
</div>

@endsection