@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="confirm__content">
    <div class="confirm__heading">
        <h2>Confirm</h2>
    </div>
    <table class="confirm-table">
        <tr>
            <th>お名前</th>
            <td>{{ $validated['last_name'] }} {{ $validated['first_name'] }}</td>
        </tr>
        <tr>
            <th>性別</th>
            <td>{{ $genderLabel }}</td>
        </tr>
        <tr>
            <th>メールアドレス</th>
            <td>{{ $validated['email'] }}</td>
        </tr>
        <tr>
            <th>電話番号</th>
            <td>{{ $tel }}</td>
        </tr>
        <tr>
            <th>住所</th>
            <td>{{ $validated['address'] }}</td>
        </tr>
        <tr>
            <th>建物名</th>
            <td>{{ $validated['building'] ?? '' }}</td>
        </tr>
        <tr>
            <th>お問い合わせの種類</th>
            <td>{{ $category->content }}</td>
        </tr>
        <tr>
            <th>お問い合わせ内容</th>
            <td class="content-cell">{!! nl2br(e($validated['detail'])) !!}</td>
        </tr>
    </table>

    <div class="button-group">
        <form method="POST" action="{{ route('store') }}" class="submit-form">
            @csrf
            <input type="hidden" name="last_name" value="{{ $validated['last_name'] }}">
            <input type="hidden" name="first_name" value="{{ $validated['first_name'] }}">
            <input type="hidden" name="gender" value="{{ $validated['gender'] }}">
            <input type="hidden" name="email" value="{{ $validated['email'] }}">
            <input type="hidden" name="tel_part1" value="{{ $validated['tel_part1'] }}">
            <input type="hidden" name="tel_part2" value="{{ $validated['tel_part2'] }}">
            <input type="hidden" name="tel_part3" value="{{ $validated['tel_part3'] }}">
            <input type="hidden" name="address" value="{{ $validated['address'] }}">
            <input type="hidden" name="building" value="{{ $validated['building'] }}">
            <input type="hidden" name="category_id" value="{{ $validated['category_id'] }}">
            <input type="hidden" name="detail" value="{{ $validated['detail'] }}">

            <button type="submit" class="btn btn-submit">送信</button>
        </form>

        <form method="POST" action="{{ route('index') }}" class="back-form">
            @csrf
            <input type="hidden" name="last_name" value="{{ $validated['last_name'] }}">
            <input type="hidden" name="first_name" value="{{ $validated['first_name'] }}">
            <input type="hidden" name="gender" value="{{ $validated['gender'] }}">
            <input type="hidden" name="email" value="{{ $validated['email'] }}">
            <input type="hidden" name="tel_part1" value="{{ $validated['tel_part1'] }}">
            <input type="hidden" name="tel_part2" value="{{ $validated['tel_part2'] }}">
            <input type="hidden" name="tel_part3" value="{{ $validated['tel_part3'] }}">
            <input type="hidden" name="address" value="{{ $validated['address'] }}">
            <input type="hidden" name="building" value="{{ $validated['building'] }}">
            <input type="hidden" name="category_id" value="{{ $validated['category_id'] }}">
            <input type="hidden" name="detail" value="{{ $validated['detail'] }}">

            <button type="submit" class="btn btn-back">修正</button>
        </form>
    </div>
</div>
@endsection