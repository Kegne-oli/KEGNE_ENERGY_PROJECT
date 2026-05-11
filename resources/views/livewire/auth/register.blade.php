<div class="ke-auth-page">

    <a href="{{ route('home') }}" class="ke-brand mb-4 d-inline-block">KEGNE ENERGY</a>

    <div class="ke-auth-card">
        <h2>Create account</h2>
        <p class="subtitle">Start managing your solar energy today</p>

        <form wire:submit.prevent="register" novalidate>

            {{-- Name --}}
            <div class="mb-3">
                <label class="form-label" for="reg-name">Full Name</label>
                <input
                    id="reg-name"
                    type="text"
                    class="form-control @error('name') is-invalid @enderror"
                    wire:model.lazy="name"
                    placeholder="John Doe"
                    autocomplete="name"
                >
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-3">
                <label class="form-label" for="reg-email">Email address</label>
                <input
                    id="reg-email"
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
                <label class="form-label" for="reg-pass">Password</label>
                <input
                    id="reg-pass"
                    type="password"
                    class="form-control @error('password') is-invalid @enderror"
                    wire:model.lazy="password"
                    placeholder="Min. 8 characters"
                    autocomplete="new-password"
                >
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div class="mb-4">
                <label class="form-label" for="reg-confirm">Confirm Password</label>
                <input
                    id="reg-confirm"
                    type="password"
                    class="form-control @error('password_confirmation') is-invalid @enderror"
                    wire:model.lazy="password_confirmation"
                    placeholder="Repeat your password"
                    autocomplete="new-password"
                >
                @error('password_confirmation')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn ke-btn-primary w-100" wire:loading.attr="disabled">
                <span wire:loading.remove>Create Account</span>
                <span wire:loading>
                    <span class="spinner-border spinner-border-sm me-1"></span>
                    Creating...
                </span>
            </button>

        </form>

        <hr class="my-3">

        <p class="text-center mb-0" style="font-size:14px;color:var(--ke-on-surface-var)">
            Already have an account?
            <a href="{{ route('login') }}" class="ke-auth-link">Sign in</a>
        </p>
    </div>
</div>