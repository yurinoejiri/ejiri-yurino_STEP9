@extends('layout.app')

@section('title', 'アカウント編集画面')

@section('content')
<div class="main-content">
    <h1>アカウント情報編集</h1>

    @if($errors->any())
        <div class="error-message">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="account-form" action="{{ route('users_update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">ユーザー名</label><br>
        <input type="text" class="form-width" name="name" id="name" value="{{ old('name', $user->name) }}"><br>
        <label for="email">Eメール</label><br>
        <input type="email" class="form-width" name="email" id="email" value="{{ old('email', $user->email) }}"><br>
        <label for="name_kanji">名前</label><br>
        <input type="text" name="name_kanji" id="name_kanji" value="{{ old('name_kanji', $user->name_kanji) }}"><br>
        <label for="name_kana">カナ</label><br>
        <input type="text" name="name_kana" id="name_kana" value="{{ old('name_kana', $user->name_kana) }}"><br>

        <div class="btns">
            <a href="{{ route('mypage') }}" class="back-btn">戻る</a>
            <button type="submit" class="update-btn">更新</button>
        </div>
    </form>
</div>
@endsection