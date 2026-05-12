@extends('layouts.app')
@section('title', 'Energy Reports')
@section('content')

<div class="ke-content-header">
    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
        <div>
            <h1>Energy Reports</h1>
            <p>Generate and manage comprehensive energy utilization documents.</p>
        </div>
        <div class="d-flex gap-2">
            <button class="btn ke-btn-outline d-flex align-items-center gap-1">
                <span class="material-symbols-outlined" style="font-size:16px">table_view</span>
                CSV Export
            </button>
            <button class="btn ke-btn-primary d-flex align-items-center gap-1">
                <span class="material-symbols-outlined" style="font-size:16px">download</span>
                Download PDF
            </button>
        </div>
    </div>
</div>

<div class="row g-3 mb-3">

    {{-- Report Configuration --}}
    <div class="col-lg-5">
        <div class="ke-section-card h-100">
            <div class="section-card-title mb-3">Report Configuration</div>

            {{-- Selection Period --}}
            <div class="mb-3">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <label class="form-label mb-0" style="font-size:13px;font-weight:600">Selection Period</label>
                    <div class="ke-tab-group">
                        <button class="ke-tab-btn active">Daily</button>
                        <button class="ke-tab-btn">Month</button>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-6">
                        <label class="form-label" style="font-size:12px;color:var(--ke-on-surface-var)">Start Date</label>
                        <input type="date" class="form-control" value="2024-03-01"
                               style="font-size:13px;border-radius:10px;border-color:var(--ke-outline-var)">
                    </div>
                    <div class="col-6">
                        <label class="form-label" style="font-size:12px;color:var(--ke-on-surface-var)">End Date</label>
                        <input type="date" class="form-control" value="2024-03-31"
                               style="font-size:13px;border-radius:10px;border-color:var(--ke-outline-var)">
                    </div>
                </div>
            </div>

            {{-- Estimated size --}}
            <div class="ke-metric-card dark mb-3" style="padding:1rem">
                <div class="metric-label" style="margin-bottom:4px">ESTIMATED REPORT SIZE</div>
                <div class="metric-value" style="font-size:2rem">12.4 <span class="metric-unit">MB</span></div>
                <p class="metric-sub d-flex align-items-center gap-1 mt-1">
                    <span class="material-symbols-outlined" style="font-size:14px">info</span>
                    Contains 34,600 data points across 12 energy systems.
                </p>
            </div>

            {{-- Document Sections --}}
            <div class="mb-3">
                <label class="form-label" style="font-size:13px;font-weight:600;margin-bottom:8px">Document Sections</label>
                @php
                $sections = [
                    ['icon'=>'summarize',    'label'=>'Executive Summary',    'active'=>true],
                    ['icon'=>'grid_on',      'label'=>'Grid Performance',     'active'=>false],
                    ['icon'=>'attach_money', 'label'=>'Cost Analysis',        'active'=>false],
                    ['icon'=>'eco',          'label'=>'Renewable Yield',      'active'=>false],
                    ['icon'=>'history',      'label'=>'Historical Trends',    'active'=>false],
                ];
                @endphp
                @foreach($sections as $s)
                <div class="d-flex align-items-center gap-2 py-2"
                     style="border-bottom:1px solid rgba(195,198,209,0.3);cursor:pointer">
                    <span class="material-symbols-outlined" style="font-size:18px;color:{{ $s['active'] ? 'var(--ke-primary)' : 'var(--ke-outline)' }}">
                        {{ $s['icon'] }}
                    </span>
                    <span style="font-size:13px;font-weight:{{ $s['active'] ? '600' : '400' }};color:{{ $s['active'] ? 'var(--ke-on-surface)' : 'var(--ke-on-surface-var)' }};flex:1">
                        {{ $s['label'] }}
                    </span>
                    @if($s['active'])
                    <span class="material-symbols-outlined" style="font-size:16px;color:var(--ke-primary)">check_circle</span>
                    @endif
                </div>
                @endforeach
            </div>

            {{-- Templates --}}
            <div>
                <label class="form-label" style="font-size:13px;font-weight:600;margin-bottom:8px">Templates</label>
                <div class="d-flex gap-2">
                    <div style="flex:1;border:2px solid var(--ke-primary);border-radius:10px;padding:0.75rem;text-align:center;cursor:pointer">
                        <span class="material-symbols-outlined" style="font-size:22px;color:var(--ke-primary)">description</span>
                        <p style="font-size:12px;font-weight:600;color:var(--ke-primary);margin:4px 0 0">Standard</p>
                    </div>
                    <div style="flex:1;border:1px solid var(--ke-outline-var);border-radius:10px;padding:0.75rem;text-align:center;cursor:pointer">
                        <span class="material-symbols-outlined" style="font-size:22px;color:var(--ke-on-surface-var)">auto_awesome</span>
                        <p style="font-size:12px;font-weight:500;color:var(--ke-on-surface-var);margin:4px 0 0">Detailed</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Report Preview --}}
    <div class="col-lg-7">
        <div class="ke-section-card h-100">
            <div class="section-card-title mb-3">Report Preview</div>

            {{-- Faux document --}}
            <div style="border:1px solid var(--ke-outline-var);border-radius:10px;padding:1.25rem;background:var(--ke-surface-cont-low)">
                {{-- Header --}}
                <div class="d-flex justify-content-between align-items-start mb-3 pb-2"
                     style="border-bottom:2px solid var(--ke-primary)">
                    <div>
                        <div style="font-family:'Manrope',sans-serif;font-size:1.1rem;font-weight:800;color:var(--ke-primary)">KEGNE ENERGY</div>
                        <div style="font-size:11px;color:var(--ke-on-surface-var)">Quarterly Performance Statement</div>
                    </div>
                    <div style="text-align:right;font-size:10px;color:var(--ke-outline);line-height:1.4">
                        <div>Report ID: KEG-2024-Q3</div>
                        <div>Generated: Apr 5, 2024</div>
                    </div>
                </div>

                {{-- Executive Summary --}}
                <p style="font-size:13px;font-weight:700;color:var(--ke-primary);margin-bottom:6px">1. Executive Summary</p>
                <p style="font-size:12px;color:var(--ke-on-surface-var);line-height:1.6;margin-bottom:1rem">
                    This report details the energy generation and consumption metrics for the Mar 2024 period.
                    Overall efficiency across all nodes increased by 4.2% compared to the previous quarter,
                    largely driven by optimized storage management systems and solar tracking improvements.
                </p>

                {{-- Quick stats --}}
                <div class="row g-2 mb-3">
                    <div class="col-6">
                        <div style="background:#fff;border-radius:8px;padding:0.6rem;text-align:center;border:1px solid var(--ke-outline-var)">
                            <div style="font-size:11px;color:var(--ke-on-surface-var)">Total Gen.</div>
                            <div style="font-family:'Manrope',sans-serif;font-size:1.3rem;font-weight:700;color:var(--ke-primary)">14 kWh</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div style="background:#fff;border-radius:8px;padding:0.6rem;text-align:center;border:1px solid var(--ke-outline-var)">
                            <div style="font-size:11px;color:var(--ke-on-surface-var)">Savings Achieved</div>
                            <div style="font-family:'Manrope',sans-serif;font-size:1.3rem;font-weight:700;color:#10b981">$4,822</div>
                        </div>
                    </div>
                </div>

                {{-- Daily Utilization mini chart --}}
                <p style="font-size:12px;font-weight:600;color:var(--ke-primary);margin-bottom:6px">Daily Utilization Curve</p>
                <div class="ke-chart-placeholder" style="height:70px;padding:0.5rem 0.5rem 0">
                    @php $previewBars = [40,55,70,85,75,60,80,90,70,55,65,75]; @endphp
                    @foreach($previewBars as $h)
                    <div class="ke-bar" style="height:{{ $h }}%;background:var(--ke-primary);opacity:0.7;flex:1"></div>
                    @endforeach
                </div>

                <p style="font-size:10px;color:var(--ke-outline);text-align:center;margin-top:8px;margin-bottom:0">
                    CONFIDENTIAL — Page 1 of 8 — FOR INTERNAL USE ONLY
                </p>
            </div>
        </div>
    </div>
</div>

{{-- Recent Generated Reports --}}
<div class="ke-section-card">
    <div class="section-card-title mb-3">Recent Generated Reports</div>
    <div class="table-responsive">
        <table class="table ke-table mb-0">
            <thead>
                <tr>
                    <th>Report Name</th>
                    <th>Date Range</th>
                    <th>Size</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                $reports = [
                    ['name'=>'Q1 Stability Audit',       'range'=>'Jan 01 – Mar 31', 'size'=>'8.2 MB',  'status'=>'Ready'],
                    ['name'=>'Weekly Consumption Draft',  'range'=>'Mar 25 – Mar 31', 'size'=>'1.4 MB',  'status'=>'Ready'],
                    ['name'=>'Annual Carbon Summary',     'range'=>'Jan 01 – Dec 31', 'size'=>'14.8 MB', 'status'=>'Processing'],
                    ['name'=>'Grid Performance Report',   'range'=>'Feb 01 – Feb 28', 'size'=>'6.1 MB',  'status'=>'Ready'],
                ];
                @endphp
                @foreach($reports as $r)
                <tr>
                    <td style="font-weight:500">{{ $r['name'] }}</td>
                    <td style="font-size:13px;color:var(--ke-on-surface-var)">{{ $r['range'] }}</td>
                    <td style="font-size:13px">{{ $r['size'] }}</td>
                    <td>
                        @if($r['status'] === 'Ready')
                            <span class="ke-pill ke-pill-green" style="font-size:11px">{{ $r['status'] }}</span>
                        @else
                            <span class="ke-pill ke-pill-orange" style="font-size:11px">{{ $r['status'] }}</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex gap-2">
                            <button class="btn btn-sm ke-btn-outline" style="font-size:12px;padding:3px 10px">
                                <span class="material-symbols-outlined" style="font-size:13px">visibility</span>
                                View
                            </button>
                            <button class="btn btn-sm ke-btn-primary" style="font-size:12px;padding:3px 10px">
                                <span class="material-symbols-outlined" style="font-size:13px">download</span>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection