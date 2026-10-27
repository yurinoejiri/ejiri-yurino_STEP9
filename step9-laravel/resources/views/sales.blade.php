@extends('layout.app')

@section('title', '商品購入画面')

@section('content')
<div class="main__content">
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

        <form id="purchaseForm" action="{{ route('purchase', $product->id) }}" method="POST" data-price="{{ $product->price }}">
            @csrf
            <input type="number" id="quantity" name="quantity" value="1" min="1" max="{{ $product->stock }}">
            <p>金額: {{ $product->price }}</p>
            <p>残り: {{ $product->stock }}</p>
            <p>会社: {{ $companies>company_name ?? '-' }}</p>
        
            <div class="btn-group">
                <button type="button" id="openConfirm" {{ $product->stock <= 0 ? 'disabled' : '' }} class="btn btn--success btn-mini">購入する</button>
                <a href="{{ route('salesDetail', $product->id) }}" class="btn btn--primary btn--big">戻る</a>
            </div>
        </form>
    </div>

    <!-- 確認用モーダル -->
    <dialog id="confirmDialog" class="confirm-modal">
        <p>以下の内容で購入しますか？</p>
        <p>商品名: {{ $product->product_name }}</p>
        <p>数量: <span id="confirmQuantity"></span></p>
        <p>合計金額: <span id="confirmTotal"></span> 円</p>

        <div class="confirm-btn">
            <button type="button" id="cancelBtn" class="btn btn--primary">キャンセル</button>
            <button type="button" id="submitBtn" class="btn btn--success">購入する</button>
        </div>
    </dialog>
</div>
@endsection