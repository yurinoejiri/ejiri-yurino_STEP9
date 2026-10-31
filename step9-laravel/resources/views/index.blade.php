@extends('layout.app')

@section('title', '商品一覧')

@section('content')

<div class="main__content">
    <h1>商品一覧</h1>

    <form id="searchForm" action="{{ route('search') }}" method="GET">
        <div class="search-form">
            <input type="text" name="product_name" placeholder="商品名を入力" value="{{ request('product_name') }}">
            <input type="number" name="min_price" placeholder="最低価格" value="{{ request('min_price') }}">
            <span>〜</span>
            <input type="number" name="max_price" placeholder="最高価格" value="{{ request('max_price') }}">
            <button type="submit" class="btn btn--secondary">検索</button>
        </div>
    </form><br>
        
    <table class="table">
        <thead>
            <tr>
                <th>商品番号</th>
                <th>商品名</th>
                <th>商品説明</th>
                <th>画像</th>
                <th>料金(¥)</th>
            </tr>
        </thead>

        <tbody id="productList">
            @include('product_list')
        </tbody>
    </table>
</div>
@endsection
