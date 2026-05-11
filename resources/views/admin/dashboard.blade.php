@extends('layouts.app')

@section('title', 'Admin Panel')

@section('content')

<div class="ke-page-header">
    <h1>
        <span class="material-symbols-outlined" style="font-size:28px">admin_panel_settings</span>
        Admin Dashboard
    </h1>
    <p>Manage users and monitor platform health.</p>
</div>

{{-- Stats --}}
<div class="row g-4 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="ke-dash-card">
            <div class="icon-wrap" style="background:#0d3b6e;color:#82a6e0">
                <span class="material-symbols-outlined">group</span>
            </div>
            <h6>Registered Users</h6>
            <h3>{{ $totalUsers }}</h3>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="ke-dash-card">
            <div class="icon-wrap" style="background:#ffddb4;color:#633f00">
                <span class="material-symbols-outlined">monitoring</span>
            </div>
            <h6>Active Systems</h6>
            <h3>{{ $totalUsers }}</h3>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="ke-dash-card">
            <div class="icon-wrap" style="background:#dee9fc;color:#00254d">
                <span class="material-symbols-outlined">bolt</span>
            </div>
            <h6>Total Output Today</h6>
            <h3>1.2 <small style="font-size:1rem">MWh</small></h3>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="ke-dash-card">
            <div class="icon-wrap" style="background:#533400;color:#ffddb4">
                <span class="material-symbols-outlined">eco</span>
            </div>
            <h6>CO2 Saved Today</h6>
            <h3>840 <small style="font-size:1rem">kg</small></h3>
        </div>
    </div>
</div>

{{-- Livewire User Table --}}
@livewire('admin.user-list')

@endsection