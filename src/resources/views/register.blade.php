@extends('layouts.adminapp')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="register-page">
    <div class="register-page__header">
        <h2 class="register-page__title">Register</h2>
    </div>

    <div class="register-page__form">
        <form class="register-form" method="POST" action="/register">
            @csrf

            <div class="form-group">
                <label for="name" class="form-label">お名前</label>
                <input type="text" id="name" name="name" class="form-input" placeholder="例：山田　太郎" value="{{ old('name') }}" required>
                @error('name')
                <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

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
                <button type="submit" class="register-button">登録</button>
            </div>
        </form>
    </div>
</div>
@endsection
