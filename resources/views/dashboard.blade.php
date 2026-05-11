@extends('layouts.app')

@section('title', 'My Dashboard')

@section('content')

<div class="ke-page-header">
    <h1>Welcome, {{ Auth::user()->name }} 👋</h1>
    <p>Here's a live overview of your solar energy system.</p>
</div>

{{-- KPI Cards --}}
<div class="row g-4 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="ke-dash-card">
            <div class="icon-wrap" style="background:#0d3b6e;color:#82a6e0">
                <span class="material-symbols-outlined">bolt</span>
            </div>
            <h6>Today's Output</h6>
            <h3>34.8 <small style="font-size:1rem">kWh</small></h3>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="ke-dash-card">
            <div class="icon-wrap" style="background:#ffddb4;color:#633f00">
                <span class="material-symbols-outlined">battery_charging_full</span>
            </div>
            <h6>Battery Level</h6>
            <h3>82<small style="font-size:1rem">%</small></h3>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="ke-dash-card">
            <div class="icon-wrap" style="background:#dee9fc;color:#00254d">
                <span class="material-symbols-outlined">savings</span>
            </div>
            <h6>Monthly Savings</h6>
            <h3>$124</h3>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="ke-dash-card">
            <div class="icon-wrap" style="background:#533400;color:#ffddb4">
                <span class="material-symbols-outlined">eco</span>
            </div>
            <h6>CO2 Offset</h6>
            <h3>68 <small style="font-size:1rem">kg</small></h3>
        </div>
    </div>
</div>

{{-- Status Card --}}
<div class="row g-4">
    <div class="col-lg-6">
        <div class="ke-dash-card">
            <p class="card-title-sm">
                <span class="material-symbols-outlined" style="font-size:18px;color:var(--ke-primary)">check_circle</span>
                System Status
            </p>
            <p class="card-body-text">
                All panels are operating normally. Next scheduled maintenance:
                <strong>June 15, 2025</strong>.
            </p>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="ke-dash-card">
            <p class="card-title-sm">
                <span class="material-symbols-outlined" style="font-size:18px;color:var(--ke-primary)">cloud</span>
                Account Info
            </p>
            <p class="card-body-text">
                Email: <strong>{{ Auth::user()->email }}</strong><br>
                Role: <span class="badge" style="background:var(--ke-secondary)">{{ Auth::user()->role }}</span>
            </p>
        </div>
    </div>
</div>

@endsection