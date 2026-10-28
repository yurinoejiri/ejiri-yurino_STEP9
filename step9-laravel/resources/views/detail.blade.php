@extends('layout.app')

@section('title', '出品商品詳細画面')

@section('content')
<div class="main__content">
    <h1>商品詳細</h1>

    <div class="detail-content">
        <p>商品名: {{ $product->product_name }}</p>
        <p>説明: {{ $product->description }}</p>
        <p>画像: <img src="{{ asset('storage/' . $product->img_path) }}" alt="{{ $product->product_name }}"><p>
        <p>金額： ¥{{ $product->price }}</p>
        <p>会社名: {{ $product->company->company_name}}</p>
    </div>

    <div class="btn-qroup">
        <a href="{{ route('edit', $product->id) }}" class="btn btn--edit">編集</a>

        <form action="{{ route('destroy', $product->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn--danger btn--mini" onclick="return confirm('本当に削除しますか？');">削除</button>
        </form>
        <a href="{{ route('mypage') }}" class="btn btn--primary">戻る</a>
    </div>
</div>
@endsection