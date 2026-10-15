@extends('layout.app')

@section('title', '商品詳細画面')

@section('content')
<div class="main-content">
    <h1>商品詳細</h1>

    <div class="detail-content">
        <p>商品名: {{ $product->product_name }}</p>
        <p>説明: {{ $product->description }}</p>
        <p>画像: <img src="{{ asset('storage/' . $product->img_path) }}" alt="{{ $product->product_name }}"></p>
        <p>金額: {{ $product->price }}</p>
        <p>会社: {{ $product->company_id ?? '-' }}</p>
        <!-- お気に入りのハートマーク入れる -->

        <div class="btns">
            <a href="{{ route('sales', $product->id) }}" class="sales_btn">購入する</a>
            <a href="{{ route('index') }}" class="back-btn">戻る</a>
        </div>
    </div>
</div>
@endsection