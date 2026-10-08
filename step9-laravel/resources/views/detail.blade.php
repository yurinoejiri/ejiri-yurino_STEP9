@extends('layout.app')

@section('title', '商品詳細')

@section('content')
<div class="main-content">
    <h1>商品詳細</h1>

    <div class="detail-content">
        <p>商品名:{{ $product->product_name }}</p>
        <p>説明:{{ $product->description }}</p>
        <img src="{{ asset('storage/' . $product->img_path) }}" alt="{{ $product->product_name }}">
        <p>金額：¥{{ $product->price }}</p>
        <p>会社名:{{ $product->company_name }}</p>
    </div>

    <div class="btns">
        <a href="{{ route('edit', $product->id) }}" class="edit-btn">編集</a>

        <form action="{{ route('destroy', $product->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-btn" onclick="return confirm('本当に削除しますか？');">削除</button>
        </form>
        <a href="{{ route('mypage') }}" class="back-btn">戻る</a>
    </div>
</div>
@endsection