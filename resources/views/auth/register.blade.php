@extends('layouts.app')

@section('title', 'Daftar - CUTORA')

@section('content')
<section class="auth-section">
    <div class="auth-card">
        <div class="auth-logo">
            <span class="brand-icon">C</span>
            <strong>CUTORA<span class="brand-dot">.</span></strong>
        </div>

        <span class="eyebrow">JOIN CUTORA</span>
        <h1>Buat akun baru.</h1>
        <p>Daftar dan nikmati pengalaman belanja yang lebih praktis.</p>

        <form action="{{ route('register.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="name"
                       value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email"
                       value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label>Nomor Telepon</label>
                <input type="text" name="phone"
                       value="{{ old('phone') }}" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <div class="form-group">
                <label>Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn btn-primary btn-block btn-large">
                Buat Akun
            </button>
        </form>

        <div class="auth-footer">
            Sudah punya akun?
            <a href="{{ route('login') }}">Masuk di sini</a>
        </div>
    </div>
</section>
@endsection