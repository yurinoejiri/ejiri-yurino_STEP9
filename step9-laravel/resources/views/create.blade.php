@extends('layout.app')

@section('title', '新規商品登録')

@section('content')

<div class="main-content">
    <h1>商品登録</h1>

    <!-- エラーメッセージ -->
    @if($errors->any())
    <div class="error-message">
        <ul>
            @foreach($errors as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form class="create-form" action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="">商品名</label><br>
        <input type="text" class="form-width" name="product_name" id="product_name" value="{{ old('product_name') }}"><br>

        <label for="price">価格</label><br>
        <input type="number" class="form-width" name="price" id="price" value="{{ old('price') }}"><br>

        <label for="description">商品説明</label><br>
        <textarea class="form-width" name="description" id="description">{{ old('description') }}</textarea><br>

        <label for="stock">在庫数</label><br>
        <input type="number" class="form-width" name="stock" id="stock" value="{{ old('stock') }}"><br>

        <label for="img-path">商品画像</label><br>
        <input type="file" class="form-width" name="img_path" id="img_path"><br>

        <div class="btns">
            <a href="{{ route('index') }}" class="back-btn">戻る</a>
            <button type="submit" class="create-btn">登録</button>
        </div>
    </form>
</div>
@endsection