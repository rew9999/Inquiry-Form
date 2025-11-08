@extends('layouts.adminapp')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="login-page">
    <div class="login-page__header">
        <h2 class="login-page__title">Login</h2>
    </div>

    <div class="login-page__form">
        <form class="login-form" method="POST" action="/login">
            @csrf

            <div class="form-group">
                <label for="email" class="form-label">メールアドレス</label>
                <input type="email" id="email" name="email" class="form-input" placeholder="例：test@example.com" value="{{ old('email') }}" required>
                @error('email')
                <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">パスワード</label>
                <input type="password" id="password" name="password" class="form-input" placeholder="例：coachtech1106" required>
                @error('password')
                <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="login-button">ログイン</button>
            </div>
        </form>
    </div>
</div>
@endsection
