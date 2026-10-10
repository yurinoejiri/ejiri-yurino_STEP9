@extends('layout.app')

@section('title', '商品一覧')

@section('content')

<div class="main-content">
    <h1>商品一覧</h1>

    <form action="{{ route('search') }}" method="GET">
        <div class="search-form">
            <input type="text" name="product_name" placeholder="商品名を入力" value="{{ request('product_name') }}">
            <input type="number" name="min_price" placeholder="最低価格" value="{{ request('min_price') }}">
            <span>〜</span>
            <input type="number" name="max_price" placeholder="最高価格" value="{{ request('max_price') }}">
            <button type="submit" class="search-btn">検索</button>
        </div>
    </form><br>
        
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
