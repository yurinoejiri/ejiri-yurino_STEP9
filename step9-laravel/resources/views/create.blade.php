@extends('layout.app')

@section('title', '新規商品登録')

@section('content')

<div class="main__content">
    <h1>商品登録</h1>

    <!-- エラーメッセージ -->
    @if($errors->any())
    <div class="error-message">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form class="form" action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="product-name">商品名</label><br>
        <input type="text" class="form__input--width" name="product_name" value="{{ old('product_name') }}"><br>

        <label for="price">価格</label><br>
        <input type="number" class="form__input--width" name="price" value="{{ old('price') }}"><br>

        <label for="description">商品説明</label><br>
        <textarea class="form__input--width" name="description">{{ old('description') }}</textarea><br>

        <label for="stock">在庫数</label><br>
        <input type="number" class="form__input--width" name="stock" value="{{ old('stock') }}"><br>

        <label for="img-path">商品画像</label><br>
        <input type="file" class="form__input--width" name="img_path"><br>

        <div class="btn-qroup">
            <a href="{{ route('index') }}" class="btn btn--primary">戻る</a>
            <button type="submit" class="btn btn--secondary btn--mini">登録</button>
        </div>
    </form>
</div>
@endsection