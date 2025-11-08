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
            @foreach(['last_name', 'first_name', 'gender', 'email', 'tel_part1', 'tel_part2', 'tel_part3', 'address', 'building', 'category_id', 'detail'] as $field)
                <input type="hidden" name="{{ $field }}" value="{{ $validated[$field] ?? '' }}">
            @endforeach

            <button type="submit" class="btn btn-submit">送信</button>
        </form>

        <form method="POST" action="{{ route('index') }}" class="back-form">
            @csrf
            @foreach(['last_name', 'first_name', 'gender', 'email', 'tel_part1', 'tel_part2', 'tel_part3', 'address', 'building', 'category_id', 'detail'] as $field)
                <input type="hidden" name="{{ $field }}" value="{{ $validated[$field] ?? '' }}">
            @endforeach

            <button type="submit" class="btn btn-back">修正</button>
        </form>
    </div>
</div>
@endsection