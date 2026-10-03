@extends('layout.app')

@section('title', '商品一覧')

@section('content')

<div class="main-content">
    <h1>商品一覧</h1>

    <!-- 後で検索機能つける　-->
    <table class="table-design">
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
                <td>
                    @if($product->img_path)
                    <img src="{{ asset('storage/' . $product->img_path) }}" alt="{{ $product->product_name }}" width="100">
                    @else
                    画像なし
                    @endif
                </td>
                <td>{{ $product->price }}</td>

                <td><a href="{{ route('detail', $product->id) }}" class="show-btn">詳細</a></td>
            </tr>
        </tbody>
        @endforeach
    </table>
</div>
@endsection
