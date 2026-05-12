@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

<div class="ke-content-header">
    <h1>Dashboard</h1>
    <p>Welcome back, {{ Auth::user()->name }}. Here's your system at a glance.</p>
</div>

{{-- KPI Row --}}
<div class="row g-3 mb-4">
    <div class="col-6 col-xl-3">
        <div class="ke-metric-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="metric-label">Today Production</div>
                    <div class="metric-value">42.8 <span class="metric-unit">kWh</span></div>
                    <p class="metric-sub" style="color:#10b981">↑ +12% from yesterday</p>
                </div>
                <div class="metric-icon" style="background:var(--ke-surface-cont)">
                    <span class="material-symbols-outlined" style="color:var(--ke-primary)">solar_power</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-xl-3">
        <div class="ke-metric-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="metric-label">Current Power</div>
                    <div class="metric-value" style="color:var(--ke-tertiary-fixed-dim)">5.2 <span class="metric-unit">kW</span></div>
                    <div class="ke-progress mt-2" style="width:120px">
                        <div class="ke-progress-bar gold" style="width:52%"></div>
                    </div>
                </div>
                <div class="metric-icon" style="background:#fef3c7">
                    <span class="material-symbols-outlined" style="color:#92400e">bolt</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-xl-3">
        <div class="ke-metric-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="metric-label">Total Savings</div>
                    <div class="metric-value">$1,240 <span class="metric-unit">YTD</span></div>
                    <p class="metric-sub">
                        <span class="material-symbols-outlined" style="font-size:13px;color:var(--ke-tertiary-fixed-dim)">eco</span>
                        Equiv. to 4.2 tons CO2
                    </p>
                </div>
                <div class="metric-icon" style="background:var(--ke-surface-cont)">
                    <span class="material-symbols-outlined" style="color:var(--ke-primary)">savings</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-xl-3">
        <div class="ke-metric-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="metric-label">Self-Sufficiency</div>
                    <div class="metric-value">82 <span class="metric-unit">%</span></div>
                    <p class="metric-sub" style="color:var(--ke-tertiary-fixed-dim)">● Grid: 18%</p>
                </div>
                <div class="metric-icon" style="background:#eff6ff">
                    <span class="material-symbols-outlined" style="color:var(--ke-secondary)">offline_bolt</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-3 mb-4">
    {{-- Production vs Consumption Chart --}}
    <div class="col-lg-8">
        <div class="ke-section-card h-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <div class="section-card-title">Production vs Consumption</div>
                </div>
                <div class="d-flex gap-2 align-items-center" style="font-size:12px;color:var(--ke-on-surface-var)">
                    <span style="width:10px;height:10px;background:var(--ke-tertiary-fixed-dim);border-radius:50%;display:inline-block"></span> Solar
                    <span style="width:10px;height:10px;background:var(--ke-primary-container);border-radius:50%;display:inline-block;margin-left:6px"></span> Usage
                </div>
            </div>
            {{-- Bar chart visual --}}
            <div class="ke-chart-placeholder" style="height:160px">
                @php
                $bars = [
                    ['s'=>65,'u'=>45],['s'=>55,'u'=>50],['s'=>80,'u'=>60],
                    ['s'=>90,'u'=>55],['s'=>70,'u'=>65],['s'=>60,'u'=>40],
                ];
                @endphp
                @foreach($bars as $b)
                <div style="display:flex;flex-direction:column;align-items:center;gap:3px;flex:1;justify-content:flex-end;height:130px">
                    <div style="display:flex;gap:3px;align-items:flex-end;height:100%">
                        <div class="ke-bar" style="height:{{ $b['s'] }}%;background:var(--ke-tertiary-fixed-dim);opacity:0.85"></div>
                        <div class="ke-bar" style="height:{{ $b['u'] }}%;background:var(--ke-primary-container)"></div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-around mt-2" style="font-size:11px;color:var(--ke-outline)">
                <span>06:00</span><span>12:00</span><span>18:00</span><span>00:00</span>
            </div>
        </div>
    </div>

    {{-- Weekly Summary --}}
    <div class="col-lg-4">
        <div class="ke-section-card h-100">
            <div class="section-card-title mb-3">Weekly Summary</div>
            @php
            $days = [
                ['day'=>'MON','val'=>42.2,'max'=>60],
                ['day'=>'TUE','val'=>38.5,'max'=>60],
                ['day'=>'WED','val'=>51.8,'max'=>60],
                ['day'=>'THU','val'=>29.1,'max'=>60],
                ['day'=>'FRI','val'=>48.3,'max'=>60],
            ];
            @endphp
            @foreach($days as $d)
            <div class="d-flex align-items-center gap-2 mb-2">
                <span style="font-size:12px;font-weight:600;color:var(--ke-on-surface-var);width:30px">{{ $d['day'] }}</span>
                <div class="ke-progress flex-grow-1">
                    <div class="ke-progress-bar gold" style="width:{{ ($d['val']/$d['max'])*100 }}%"></div>
                </div>
                <span style="font-size:12px;font-weight:600;color:var(--ke-primary);width:32px;text-align:right">{{ $d['val'] }}</span>
            </div>
            @endforeach
            <a href="{{ route('reports') }}" class="btn ke-btn-outline btn-sm w-100 mt-3" style="font-size:13px">View Full Report</a>
        </div>
    </div>
</div>

<div class="row g-3">
    {{-- System Alerts --}}
    <div class="col-lg-6">
        <div class="ke-section-card">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="section-card-title mb-0">System Alerts</div>
                <span class="ke-pill ke-pill-red">2 ACTIVE</span>
            </div>
            <div class="ke-alert-item warning">
                <div class="alert-icon" style="background:#fef3c7">
                    <span class="material-symbols-outlined" style="color:#d97706;font-size:18px">warning</span>
                </div>
                <div>
                    <div class="alert-title">Inverter Communication Delay</div>
                    <p class="alert-desc">Inverter 42 has intermittent signal for the last 15 minutes.</p>
                    <div class="alert-meta">2 minutes ago</div>
                </div>
            </div>
            <div class="ke-alert-item info">
                <div class="alert-icon" style="background:#dbeafe">
                    <span class="material-symbols-outlined" style="color:#3b82f6;font-size:18px">info</span>
                </div>
                <div>
                    <div class="alert-title">Maintenance Scheduled</div>
                    <p class="alert-desc">Technician visit scheduled for Oct 24, 09:00 AM.</p>
                    <div class="alert-meta">1 hour ago</div>
                </div>
            </div>
            <a href="{{ route('alerts') }}" class="btn ke-btn-outline btn-sm w-100 mt-1" style="font-size:13px">View All Alerts</a>
        </div>
    </div>

    {{-- Quick Actions --}}
    <div class="col-lg-6">
        <div class="ke-section-card">
            <div class="section-card-title mb-3">Quick Actions</div>
            <div class="row g-3">
                <div class="col-6">
                    <div class="ke-action-card">
                        <div class="action-icon"><span class="material-symbols-outlined">battery_charging_full</span></div>
                        <div class="action-label">Force Charge</div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="ke-action-card">
                        <div class="action-icon"><span class="material-symbols-outlined">download</span></div>
                        <div class="action-label">Export Data</div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="ke-action-card">
                        <div class="action-icon"><span class="material-symbols-outlined">security</span></div>
                        <div class="action-label">Backup Mode</div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="ke-action-card">
                        <div class="action-icon"><span class="material-symbols-outlined">support_agent</span></div>
                        <div class="action-label">Support</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection