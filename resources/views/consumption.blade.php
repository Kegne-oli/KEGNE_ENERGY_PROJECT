@extends('layouts.app')
@section('title', 'Consumption Analysis')
@section('content')

<div class="ke-content-header">
    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
        <div>
            <h1>Consumption Analysis</h1>
            <p>Detailed breakdown of energy utilization across all facility categories.</p>
        </div>
        <div class="ke-metric-card dark d-flex align-items-center gap-2" style="padding:0.6rem 1rem;border-radius:10px;min-width:0">
            <span style="font-size:11px;font-weight:600;color:rgba(255,255,255,0.6)">LIVE CONS.</span>
            <span style="font-family:'Manrope',sans-serif;font-size:1.4rem;font-weight:700;color:var(--ke-tertiary-fixed-dim)">12.4 kW</span>
        </div>
    </div>
</div>

{{-- Energy Usage Breakdown Chart --}}
<div class="ke-section-card mb-3">
    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
        <div>
            <div class="section-card-title">Energy Usage Breakdown</div>
            <div class="section-card-sub">Daily consumption by category (last 7 Days)</div>
        </div>
        <div class="ke-tab-group">
            <button class="ke-tab-btn active">Daily</button>
            <button class="ke-tab-btn">Weekly</button>
        </div>
    </div>

    <div class="ke-chart-placeholder" style="height:160px">
        @php
        $cBars = [70, 55, 80, 45, 65, 90, 60];
        $cBars2 = [40, 30, 50, 25, 45, 55, 35];
        $cBars3 = [20, 15, 25, 18, 22, 30, 20];
        $days2 = ['MON','TUE','WED','THU','FRI','SAT','SUN'];
        @endphp
        @foreach($cBars as $i => $v)
        <div style="display:flex;flex-direction:column;align-items:center;gap:3px;flex:1;justify-content:flex-end;height:130px">
            <div style="display:flex;gap:2px;align-items:flex-end;height:100%">
                <div class="ke-bar" style="--h: {{ $v }}%; height: var(--h); background: var(--ke-primary-container)"></div>
                <div class="ke-bar" style="--h: {{ $cBars2[$i] }}%; height: var(--h); background: var(--ke-secondary)"></div>
                <div class="ke-bar" style="--h: {{ $cBars3[$i] }}%; height: var(--h); background: var(--ke-tertiary-fixed-dim)"></div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-around mt-2" style="font-size:11px;color:var(--ke-outline)">
        @foreach($days2 as $d)<span>{{ $d }}</span>@endforeach
    </div>
    <div class="d-flex gap-3 mt-2 flex-wrap" style="font-size:12px">
        <span><span style="display:inline-block;width:10px;height:10px;background:var(--ke-primary-container);border-radius:2px;margin-right:4px"></span>HVAC Systems</span>
        <span><span style="display:inline-block;width:10px;height:10px;background:var(--ke-secondary);border-radius:2px;margin-right:4px"></span>Industrial Machinery</span>
        <span><span style="display:inline-block;width:10px;height:10px;background:var(--ke-tertiary-fixed-dim);border-radius:2px;margin-right:4px"></span>Internal Lighting</span>
    </div>
</div>

<div class="row g-3 mb-3">
    {{-- Manage Categories --}}
    <div class="col-lg-6">
        <div class="ke-section-card h-100">
            <div class="section-card-title">Manage Categories</div>
            <p class="section-card-sub">Update current consumption loads manually or schedule maintenance shutdowns.</p>

            <div class="mb-3">
                <label class="form-label" style="font-size:13px;font-weight:500">Category Selection</label>
                <select class="form-select" style="font-size:14px;border-radius:10px;border-color:var(--ke-outline-var)">
                    <option>HVAC Systems (Floor)</option>
                    <option>Industrial Machinery</option>
                    <option>Internal Lighting</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" style="font-size:13px;font-weight:500">Current Power Load (kW)</label>
                <input type="number" class="form-control" value="4.5" style="font-size:14px;border-radius:10px;border-color:var(--ke-outline-var)">
            </div>
            <div class="mb-3">
                <label class="form-label" style="font-size:13px;font-weight:500">Consumption Limit Alert</label>
                <input type="range" class="form-range" min="0" max="100" value="70"
                       style="accent-color:var(--ke-primary)">
                <div class="d-flex justify-content-between" style="font-size:11px;color:var(--ke-outline)">
                    <span>0kW</span><span>Target: 70kW</span><span>100kW</span>
                </div>
            </div>
            <button class="btn ke-btn-primary w-100">Update Monitoring Config</button>

            <div class="ke-alert-item warning mt-3" style="margin-bottom:0">
                <div class="alert-icon" style="background:#fef3c7;width:32px;height:32px">
                    <span class="material-symbols-outlined" style="color:#d97706;font-size:16px">warning</span>
                </div>
                <div>
                    <div class="alert-title" style="font-size:13px">Critical Load Alert</div>
                    <p class="alert-desc" style="font-size:12px">HVAC in Floor B exceeding while limits tonight.</p>
                </div>
                <span class="material-symbols-outlined ms-auto" style="color:var(--ke-on-surface-var)">chevron_right</span>
            </div>
        </div>
    </div>

    {{-- Consumption Stats --}}
    <div class="col-lg-6">
        <div class="row g-3 h-100">
            <div class="col-12">
                <div class="ke-metric-card">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <div class="metric-label">TOTAL CONSUMPTION</div>
                        <span class="ke-pill ke-pill-red" style="font-size:10px">+8.2% vs Prev. Month</span>
                    </div>
                    <div class="metric-value">3,482 <span class="metric-unit">kWh</span></div>
                    <p class="metric-sub">Main Grid Distribution: 44%</p>
                </div>
            </div>
            <div class="col-12">
                <div class="ke-metric-card">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <div class="metric-label">SUSTAINABLE OFFSET</div>
                        <span class="ke-pill ke-pill-green" style="font-size:10px">+12% Renewables</span>
                    </div>
                    <div class="metric-value">1,240 <span class="metric-unit">kWh</span></div>
                    <p class="metric-sub">Solar Farm Yield: 850 kWh</p>
                </div>
            </div>
            <div class="col-12">
                <div class="ke-metric-card">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <div class="metric-label">OPERATIONAL COST</div>
                        <span style="font-size:11px;color:var(--ke-on-surface-var)">Est. Bill Oct 2024</span>
                    </div>
                    <div class="metric-value">$1,842 <span class="metric-unit">.10</span></div>
                    <p class="metric-sub" style="color:#10b981">Projected Savings: $312.00</p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Main Manufacturing Hub --}}
<div class="ke-section-card" style="background:var(--ke-primary-container);border:none;color:#fff;position:relative;overflow:hidden">
    <div style="position:absolute;inset:0;opacity:0.15">
        <div style="width:100%;height:100%;background:linear-gradient(135deg,#1a3a5c,#0d3b6e)"></div>
    </div>
    <div style="position:relative;z-index:1">
        <div style="font-size:11px;font-weight:600;color:rgba(255,255,255,0.6);margin-bottom:4px">PRIMARY SITE</div>
        <div class="section-card-title" style="color:#fff;font-size:1.3rem">Main Manufacturing Hub</div>
        <div class="row g-3 mt-1">
            <div class="col-6 col-md-3">
                <p style="font-size:11px;color:rgba(255,255,255,0.6);margin-bottom:2px">Uptime Efficiency</p>
                <p style="font-weight:700;color:#fff;margin:0">99.8%</p>
            </div>
            <div class="col-6 col-md-3">
                <p style="font-size:11px;color:rgba(255,255,255,0.6);margin-bottom:2px">VOLTAGE</p>
                <p style="font-weight:700;color:var(--ke-tertiary-fixed-dim);margin:0">480V Stable</p>
            </div>
            <div class="col-6 col-md-3">
                <p style="font-size:11px;color:rgba(255,255,255,0.6);margin-bottom:2px">PEAK HRS</p>
                <p style="font-weight:700;color:#fff;margin:0">14:00–17:00</p>
            </div>
        </div>
    </div>
</div>

{{-- Recent Efficiency Reports --}}
<div class="ke-section-card mt-3">
    <div class="section-card-title mb-3">Recent Efficiency Reports</div>
    @php
    $reports = [
        ['icon'=>'description','color'=>'var(--ke-secondary)',      'title'=>'Weekly Sustainability Audit',     'desc'=>'Completed by AI Analytics Engine • 2h ago'],
        ['icon'=>'build',      'color'=>'var(--ke-tertiary-fixed-dim)', 'title'=>'HVAC Maintenance Forecast',  'desc'=>'Predictive modelling update • 5h ago'],
        ['icon'=>'eco',        'color'=>'#10b981',                  'title'=>'Carbon Tax Compliance Data',     'desc'=>'Regional energy standards check • 3d ago'],
    ];
    @endphp
    @foreach($reports as $r)
    <div class="d-flex align-items-center gap-3 py-2" style="border-bottom:1px solid rgba(195,198,209,0.35)">
        <div style="width:36px;height:36px;border-radius:10px;background:var(--ke-surface-cont);display:flex;align-items:center;justify-content:center;flex-shrink:0">
            <span class="material-symbols-outlined" style="--ic: {{ $r['color'] }}; font-size:18px; color: var(--ic)">{{ $r['icon'] }}</span>
        </div>
        <div style="flex:1">
            <div style="font-size:14px;font-weight:600;color:var(--ke-on-surface)">{{ $r['title'] }}</div>
            <div style="font-size:12px;color:var(--ke-on-surface-var)">{{ $r['desc'] }}</div>
        </div>
        <button class="btn btn-sm ke-btn-outline" style="font-size:12px;padding:3px 10px">View</button>
    </div>
    @endforeach
</div>

@endsection