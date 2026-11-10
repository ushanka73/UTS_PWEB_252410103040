@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="login-page">
    <section class="login-card">
        <div class="mobile-login-brand">
            <strong>OurKelas</strong>
        </div>

        <div class="login-heading">
            <p class="eyebrow">Privet!</p>
            <h2>Login to OurKelas</h2>
        </div>

        <form action="{{ route('dashboard') }}" method="GET" class="login-form">
            <div class="form-group">
                <label for="username">Username</label>
                <input id="username" name="username" type="text"
                       value="{{ old('username') }}"
                       placeholder="Contoh: Ushanka73"
                       autocomplete="username" minlength="3" maxlength="30" required>
            </div>

            <button type="submit" class="button button-primary button-full">Masuk ke Dashboard</button>
        </form>
        <p class="login-copyright">Copyright © 2026 OurKelas. by Hayden - 3040</p>
    </section>
</div>
@endsection
