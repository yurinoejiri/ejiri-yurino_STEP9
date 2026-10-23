@extends('layout.app')

@section('title', '商品詳細画面')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

<div class="main__content">
    <h1>商品詳細</h1>

    <div class="detail-content">
        <p>商品名: {{ $product->product_name }}</p>
        <p>説明: {{ $product->description }}</p>
        <p>画像: <img src="{{ asset('storage/' . $product->img_path) }}" alt="{{ $product->product_name }}"></p>
        <p>金額: {{ $product->price }}</p>
        <p>会社: {{ $product->company_id ?? '-' }}</p>

        @if (Auth::check())
        <div class="like-btn">
            <button id="likeBtn"
                    data-product-id="{{ $product->id }}" 
                    type="button">
                    <i class="{{ $product->likedBy(Auth::user()) ? 'fa-solid' : 'fa-regular' }} fa-heart heart-color"></i>
            </button>
            <span id="likesCount">{{ $product->likes()->count() }}</span>
        </div>
        @endif

        <div class="btn-qroup">
            <a href="{{ route('sales', $product->id) }}" class="btn btn--success ">購入する</a>
            <a href="{{ route('index') }}" class="btn btn--primary">戻る</a>
        </div>
    </div>
</div>
@endsection