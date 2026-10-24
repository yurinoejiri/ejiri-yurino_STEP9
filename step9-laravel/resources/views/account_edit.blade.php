@extends('layout.app')

@section('title', 'アカウント編集画面')

@section('content')
<div class="main__content">
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

    <form class="form" action="{{ route('users_update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">ユーザー名</label><br>
        <input type="text" class="form__input--width" name="name" value="{{ old('name', $user->name) }}"><br>
        <label for="email">Eメール</label><br>
        <input type="email" class="form__input--width" name="email" value="{{ old('email', $user->email) }}"><br>
        <label for="name_kanji">名前</label><br>
        <input type="text" class="form__input--width" name="name_kanji" value="{{ old('name_kanji', $user->name_kanji) }}"><br>
        <label for="name_kana">カナ</label><br>
        <input type="text" class="form__input--width" name="name_kana" value="{{ old('name_kana', $user->name_kana) }}"><br>

        <div class="btn-qroup">
            <a href="{{ route('mypage') }}" class="btn btn--primary">戻る</a>
            <button type="submit" class="btn btn--secondary btn--mini">更新</button>
        </div>
    </form>
</div>
@endsection