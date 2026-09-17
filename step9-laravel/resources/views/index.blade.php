@extends('layout.app')

@section('title', '商品一覧')

@section('content')

<h1>商品一覧</h1>

<!-- 後で検索機能つける　-->
<table class="index-table">
    <thead>
        <tr>
            <th>商品番号</th>
            <th>商品名</th>
            <th>商品説明</th>
            <th>画像</th>
            <th>料金(¥)</th>
        </tr>
    </thead>

    @foreach($products as $product)
    <tbody>
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->description}}</td>
            <td>{{ $product->img_path }}</td>
            <td>{{ $product->price }}</td>

            <button>詳細</button> <!-- あとでrouteいれる　-->
        </tr>
    </tbody>
    @endforeach
</table>
@endsection
