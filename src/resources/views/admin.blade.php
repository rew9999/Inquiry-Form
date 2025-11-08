@extends('layouts.adminapp')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<div class="admin-page">
    <div class="admin-page__header">
        <h2 class="admin-page__title">Admin</h2>
    </div>

    <div class="admin-page__search">
        <form class="search-form" method="GET" action="/search">
            <input type="text" name="keyword" class="search-form__input" placeholder="名前やメールアドレスを入力してください"
                value="{{ request('keyword') }}">
            <select name="gender" class="search-form__select">
                <option value="">性別</option>
                <option value="1" {{ request('gender')=='1' ? 'selected' : '' }}>男性</option>
                <option value="2" {{ request('gender')=='2' ? 'selected' : '' }}>女性</option>
                <option value="3" {{ request('gender')=='3' ? 'selected' : '' }}>その他</option>
            </select>
            <select name="category_id" class="search-form__select">
                <option value="">お問い合わせの種類</option>
                @foreach(\App\Models\Category::all() as $category)
                <option value="{{ $category->id }}" {{ request('category_id')==$category->id ? 'selected' : '' }}>{{
                    $category->content }}</option>
                @endforeach
            </select>
            <input type="date" name="date" class="search-form__input" value="{{ request('date') }}">
            <button type="submit" class="search-form__button">検索</button>
            <a href="/reset" class="search-form__reset">リセット</a>
        </form>
    </div>

    <div class="admin-page__actions">
        <a href="/export?keyword={{ request('keyword') }}&gender={{ request('gender') }}&category_id={{ request('category_id') }}&date={{ request('date') }}" class="export-button">エクスポート</a>
        {{ $contacts->links('vendor.pagination.custom') }}
    </div>

    <div class="admin-page__table">
        <table class="admin-table">
            <thead>
                <tr class="admin-table__header">
                    <th class="admin-table__th">お名前</th>
                    <th class="admin-table__th">性別</th>
                    <th class="admin-table__th">メールアドレス</th>
                    <th class="admin-table__th">お問い合わせの種類</th>
                    <th class="admin-table__th"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                <tr class="admin-table__row">
                    <td class="admin-table__td">{{ $contact->last_name }} {{ $contact->first_name }}</td>
                    <td class="admin-table__td">{{ \App\Models\Contact::GENDERS[$contact->gender] ?? '' }}</td>
                    <td class="admin-table__td">{{ $contact->email }}</td>
                    <td class="admin-table__td">{{ $contact->category->content ?? '' }}</td>
                    <td class="admin-table__td">
                        <a href="#modal-{{ $contact->id }}" class="detail-button">詳細</a>
                    </td>
                </tr>

                <div id="modal-{{ $contact->id }}" class="modal">
                    <a href="#" class="modal-overlay"></a>
                    <div class="modal-content">
                        <a href="#" class="modal-close">&times;</a>
                        <div class="modal-body">
                            <div class="modal-row">
                                <div class="modal-item">
                                    <span class="modal-label">お名前</span>
                                    <span class="modal-value">{{ $contact->last_name }} {{ $contact->first_name
                                        }}</span>
                                </div>
                                <div class="modal-item">
                                    <span class="modal-label">性別</span>
                                    <span class="modal-value">{{ \App\Models\Contact::GENDERS[$contact->gender] ?? ''
                                        }}</span>
                                </div>
                            </div>
                            <div class="modal-row">
                                <div class="modal-item">
                                    <span class="modal-label">メールアドレス</span>
                                    <span class="modal-value">{{ $contact->email }}</span>
                                </div>
                                <div class="modal-item">
                                    <span class="modal-label">電話番号</span>
                                    <span class="modal-value">{{ $contact->tel }}</span>
                                </div>
                            </div>
                            <div class="modal-item-full">
                                <span class="modal-label">住所</span>
                                <span class="modal-value">{{ $contact->address }}</span>
                            </div>
                            <div class="modal-item-full">
                                <span class="modal-label">建物名</span>
                                <span class="modal-value">{{ $contact->building ?? '' }}</span>
                            </div>
                            <div class="modal-item-full">
                                <span class="modal-label">お問い合わせの種類</span>
                                <span class="modal-value">{{ $contact->category->content ?? '' }}</span>
                            </div>
                            <div class="modal-item-full">
                                <span class="modal-label">お問い合わせ内容</span>
                                <span class="modal-value modal-detail">{{ $contact->detail }}</span>
                            </div>
                            <form method="POST" action="/delete">
                                @csrf
                                <input type="hidden" name="id" value="{{ $contact->id }}">
                                <button type="submit" class="delete-button">削除</button>
                            </form>
                        </div>
                    </div>
                </div>

                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection