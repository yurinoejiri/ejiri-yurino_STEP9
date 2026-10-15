@extends('layout.app')

@section('title', '商品購入画面')

@section('content')
<div class="main-content">
    <h1>購入画面</h1>

    @if ($errors->any())
        <div class="error-message">
            <ul>
                @foreach ($errors as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="sales_content">
        <p>商品名: {{ $product->product_name }}</p>
        <p>説明: {{ $product->description }}</p>
        <img src="{{ asset('storage/' . $product->img_path) }}" alt="{{ $product->product_name }}">

        <form action="{{ route('purchase', $product->id) }}" method="POST">
            @csrf
            <input type="number" name="quantity" id="quantity" value="1" min="1" max="{{ $product->stock }}">
            <p>金額: {{ $product->price }}</p>
            <p>残り: {{ $product->stock }}</p>
            <p>会社: {{ $product->company_id ?? '-' }}</p>
        
            <div class="btns">
                <button type="submit" {{ $product->stock <= 0 ? 'disabled' : '' }} class="sales_btn">購入する</button>
                <a href="{{ route('salesDetail', $product->id) }}" class="back-btn">戻る</a>
            </div>
        </form>
    </div>
</div>
@endsection