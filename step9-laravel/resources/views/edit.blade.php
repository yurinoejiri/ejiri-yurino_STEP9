@extends('layout.app')

@section('title', '編集画面')

@section('content')
<div class="main__content">
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

    <form class="form" action="{{ route('update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="product_name">商品名</label><br>
        <input type="text" class="form__input--width" name="product_name" value="{{ old('product_name', $product->product_name) }}"><br>
        <label for="price">価格</label><br>
        <input type="numder" class="form__input--width" name="price" value="{{ old('price', $product->price) }}"><br>
        <label for="description">商品説明</label><br>
        <textarea name="description" class="form__input--width">{{ old('description', $product->description) }}</textarea><br>
        <label for="stock">在庫数</label><br>
        <input type="number" class="form__input--width" name="stock" value="{{ old('stock', $product->stock) }}"><br>
        <label for="img_path" name="img_path">商品画像</label><br>
        <input type="file" name="img_path"><br>

        <div class="btn-qroup">
            <a href="{{ route('detail', $product->id) }}" class="btn btn--primary">戻る</a>
            <button type="submit" class="btn btn--secondary btn--mini">更新</button>
        </div>
    </form>
</div>
@endsection