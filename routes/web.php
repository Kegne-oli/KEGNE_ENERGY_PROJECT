<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EnergyMonitoringController;
use App\Http\Controllers\ConsumptionController;
use App\Http\Controllers\SavingsController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\AlertsController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\EnvironmentController;
use App\Http\Controllers\BatteryController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\SettingsController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// ── Public ─────────────────────────────────────
Route::get('/', [HomeController::class, 'index'])->name('home');

// ── Guest only ──────────────────────────────────
Route::middleware('guest')->group(function () {
    Route::get('/login',    Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});

// ── Logout ──────────────────────────────────────
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('home');
})->middleware('auth')->name('logout');

// ── Authenticated user routes ───────────────────
Route::middleware('auth')->group(function () {
    Route::get('/dashboard',         [DashboardController::class,       'index'])->name('dashboard');
    Route::get('/energy-monitoring', [EnergyMonitoringController::class,'index'])->name('energy-monitoring');
    Route::get('/consumption',       [ConsumptionController::class,     'index'])->name('consumption');
    Route::get('/savings',           [SavingsController::class,         'index'])->name('savings');
    Route::get('/analytics',         [AnalyticsController::class,       'index'])->name('analytics');
    Route::get('/alerts',            [AlertsController::class,          'index'])->name('alerts');
    Route::get('/maintenance',       [MaintenanceController::class,     'index'])->name('maintenance');
    Route::get('/weather',           [WeatherController::class,         'index'])->name('weather');
    Route::get('/environment',       [EnvironmentController::class,     'index'])->name('environment');
    Route::get('/battery',           [BatteryController::class,         'index'])->name('battery');
    Route::get('/reports',           [ReportsController::class,         'index'])->name('reports');
    Route::get('/settings',          [SettingsController::class,        'index'])->name('settings');
});

// ── Admin only ──────────────────────────────────
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
});