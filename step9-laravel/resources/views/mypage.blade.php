@extends('layout.app')

@section('title', 'マイページ')

@section('content')
<div class="main-content">
    <h1>マイページ</h1>


    <a href=# class="account-btn">アカウント編集</a>

    <div class="account-content">
        <div class="account-text">
            <p>ユーザー名:{{ auth()->user()->name ?? 'ゲスト' }}</p>
            <p>メール:{{ $users->email ?? '-' }}</p>
        </div>
        <div class="account-text">
            <p>名前:{{ $users->name_kanji ?? '-' }}</p>
            <p>カナ:{{ $users->name_kana  ?? '-' }}</p>
        </div>
    </div>

    <div class="mypage-content">
        <div class="group">
            <h2>＜出品商品＞</h2>

            <a href="" class="create-btn right-position">新規登録</a>
        </div>
        <table class="table-design">
            <thead>
                <th>商品番号</th>
                <th>商品名</th>
                <th>商品説明</th>
                <th>料金(¥)</th>
            </thead>

            @foreach($products as $product)
            <tbody>
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->products_name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                </tr>
            </tbody>

            <a href="" class="show-btn">詳細</a>
            @endforeach
        </table>
    </div>

    <div class="mypage-content">
        <h2>＜購入した商品＞</h2>

        <table class="table-design">
            <thead>
                <th>商品名</th>
                <th>商品説明</th>
                <th>料金(¥)</th>
                <th>個数</th>
            </thead>

            @foreach($products as $product)
            <tbody>
                <tr>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>後で個数を入れる</td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>
@endsection