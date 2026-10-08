@extends('layout.app')

@section('title', '編集画面')

@section('content')
<div class="main-content">
    <h1>出品商品編集</h1>

    @if($errors->any())
    <div class="error-message">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form class="edit-form" action="{{ route('update', $product->id) }}" method="POST" entype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="product_name">商品名</label><br>
        <input type="text" class="form-width" name="product_name" id="product_name" value="{{ old('product_name', $product->product_name) }}"><br>
        <label for="price">価格</label><br>
        <input type="numder" class="form-width" name="price" id="price" value="{{ old('price', $product->price) }}"><br>
        <label for="description">商品説明</label><br>
        <textarea name="description" class="form-width" id="description">{{ old('description', $product->description) }}</textarea><br>
        <label for="stock">在庫数</label><br>
        <input type="number" class="form-width" name="stock" id="stock" value="{{ old('stock', $product->stock) }}"><br>
        <label for="img_path" name="img_path" id="img_path">商品画像</label><br>
        <input type="file" name="img_path" id="img_path"><br>

        <div class="btns">
            <a href="{{ route('detail', $product->id) }}" class="back-btn">戻る</a>
            <button type="submit" class="update-btn">更新</button>
        </div>
    </form>
</div>
@endsection