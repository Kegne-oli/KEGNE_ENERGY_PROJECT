@php $errors = $errors ?? new \Illuminate\Support\ViewErrorBag; @endphp

<div class="ke-auth-page">

    <a href="{{ route('home') }}" class="ke-brand mb-4 d-inline-block">KEGNE ENERGY</a>

    <div class="ke-auth-card">
        <h2>Welcome back</h2>
        <p class="subtitle">Sign in to your KEGNE ENERGY account</p>

        <form wire:submit.prevent="login" novalidate>

            @if ($errors->has('auth'))
                <div class="alert alert-danger">{{ $errors->first('auth') }}</div>
            @endif

            {{-- Email --}}
            <div class="mb-3">
                <label class="form-label" for="login-email">Email address</label>
                <input
                    id="login-email"
                    type="email"
                    class="form-control @error('email') is-invalid @enderror"
                    wire:model.lazy="email"
                    placeholder="you@example.com"
                    autocomplete="email"
                >
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-3">
                <label class="form-label" for="login-pass">Password</label>
                <input
                    id="login-pass"
                    type="password"
                    class="form-control @error('password') is-invalid @enderror"
                    wire:model.lazy="password"
                    placeholder="Your password"
                    autocomplete="current-password"
                >
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Remember me --}}
            <div class="mb-4 d-flex align-items-center">
                <div class="form-check">
                    <input
                        class="form-check-input"
                        type="checkbox"
                        wire:model="remember"
                        id="remember"
                    >
                    <label class="form-check-label" for="remember" style="font-size:13px">
                        Remember me
                    </label>
                </div>
            </div>

            <button type="submit" class="btn ke-btn-primary w-100" wire:loading.attr="disabled">
                <span wire:loading.remove>Sign In</span>
                <span wire:loading>
                    <span class="spinner-border spinner-border-sm me-1"></span>
                    Signing in...
                </span>
            </button>

        </form>

        <hr class="my-3">

        <p class="text-center mb-0" style="font-size:14px;color:var(--ke-on-surface-var)">
            Don't have an account?
            <a href="{{ route('register') }}" class="ke-auth-link">Create one</a>
        </p>
    </div>
</div>