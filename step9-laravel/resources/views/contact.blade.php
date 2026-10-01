@extends('layout.app')

@section('title', 'お問い合わせ')

@section
<div class="main-content">
    <h1>お問い合わせフォーム</h1>

    <form action="{{ route('content.submit') }}" method="POST">
        @csrf
        <label for="name">名前</label><br>
        <input type="text" name="name" id="name"><br>

        <label for="email">メールアドレス</label><br>
        <input type="email" name="email" id="email"><br>

        <label for="content">お問い合わせ内容</label><br>
        <textarea name="content" id="content"></textarea><br>

        <button type="submit">送信</button>
        <a href="{{ route('index') }}">戻る</a>
    </form>
</div>
@endsection