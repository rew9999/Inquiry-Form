@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')
<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>Contact</h2>
    </div>
    <form action="/confirm" class="form" method="post">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text-name">
                    <input type="text" name="last_name" value="{{ old('last_name', $inputs['last_name'] ?? '') }}"
                        placeholder="例：山田" required>
                    <input type="text" name="first_name" value="{{ old('first_name', $inputs['first_name'] ?? '') }}"
                        placeholder="例：太郎" required>
                    @error('last_name')<span class="error">{{ $message }}</span>@enderror
                    @error('first_name')<span class="error">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">性別</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    @foreach($genders as $value => $label)
                    <label>
                        <input type="radio" name="gender" value="{{ $value }}" {{ old('gender', $inputs['gender'] ?? ''
                            )==$value ? 'checked' : '' }} required>
                        {{ $label }}
                    </label>
                    @endforeach
                </div>
                @error('gender')<span class="error">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="email" name="email" value="{{ old('email', $inputs['email'] ?? '') }}"
                        placeholder="example@email.com" required>
                    @error('email')<span class="error">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item-tel">電話番号</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text form__input--text-tel">
                    <input type="text" name="tel_part1" maxlength="5"
                        value="{{ old('tel_part1', $inputs['tel_part1'] ?? '') }}" placeholder="03" required> -
                    <input type="text" name="tel_part2" maxlength="4"
                        value="{{ old('tel_part2', $inputs['tel_part2'] ?? '') }}" placeholder="1234" required> -
                    <input type="text" name="tel_part3" maxlength="4"
                        value="{{ old('tel_part3', $inputs['tel_part3'] ?? '') }}" placeholder="5678" required>
                    @error('tel_part1')<span class="error">{{ $message }}</span>@enderror
                    @error('tel_part2')<span class="error">{{ $message }}</span>@enderror
                    @error('tel_part3')<span class="error">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">住所</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="address" value="{{ old('address', $inputs['address'] ?? '') }}"
                        placeholder="東京都渋谷区..." required>
                    @error('address')<span class="error">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">建物名</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="building" value="{{ old('building', $inputs['building'] ?? '') }}"
                        placeholder="○○ビル101号室">
                    @error('building')<span class="error">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせ種類</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--select">
                    <select name="category_id" required>
                        <option value="" disabled selected>選択してください</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $inputs['category_id'] ?? ''
                            )==$category->id ? 'selected' : '' }}>
                            {{ $category->content }}
                        </option>
                        @endforeach
                    </select>
                    @error('category_id')<span class="error">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせ内容</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <textarea name="detail" rows="5" placeholder="お問い合わせ内容をご入力ください"
                        required>{{ old('detail', $inputs['detail'] ?? '') }}</textarea>
                    @error('detail')<span class="error">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection