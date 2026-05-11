<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ViewErrorBag;
use Livewire\Component;

class Register extends Component
{
    public string $name                  = '';
    public string $email                 = '';
    public string $password              = '';
    public string $password_confirmation = '';

    protected array $rules = [
        'name'                  => 'required|string|min:2|max:255',
        'email'                 => 'required|email|unique:users,email',
        'password'              => 'required|min:8|confirmed',
        'password_confirmation' => 'required',
    ];

    protected array $messages = [
        'name.required'                  => 'Please enter your full name.',
        'email.required'                 => 'Please enter your email address.',
        'email.unique'                   => 'This email is already registered.',
        'password.required'              => 'Please enter a password.',
        'password.min'                   => 'Password must be at least 8 characters.',
        'password.confirmed'             => 'Passwords do not match.',
        'password_confirmation.required' => 'Please confirm your password.',
    ];

    public function register()
    {
        $this->validate();

        $user = User::create([
            'name'     => $this->name,
            'email'    => $this->email,
            'password' => Hash::make($this->password),
            'role'     => 'user',
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    public function render()
    {
        /** @var \Illuminate\View\View $view */
        $view = view('livewire.auth.register')->with([
            'errors' => session('errors') ?? new ViewErrorBag,
        ]);

        return $view->extends('layouts.guest');
    }
}