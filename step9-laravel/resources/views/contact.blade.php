@extends('layout.app')

@section('title', 'お問い合わせ')

@section('content')
<div class="main__content">
    <h1>お問い合わせフォーム</h1>

    @if($errors->any())
    <div class="error-message">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form class="form" action="{{ route('contact.submit') }}" method="POST">
        @csrf
        <label for="name">名前</label><br>
        <input type="text" class="form__input--width" name="name" id="name"><br>

        <label for="email">メールアドレス</label><br>
        <input type="email" class="form__input--width" name="email" id="email"><br>

        <label for="content">お問い合わせ内容</label><br>
        <textarea class="form__input--width" name="content" id="content"></textarea><br>

        <button type="submit" class="btn btn--secondary">送信</button>
        <a href="{{ route('index') }}" class="btn btn--primary">戻る</a>
    </form>
</div>
@endsection