@extends('layout.app')

@section('title', 'マイページ')

@section('content')
<div class="main__content">
    <h1>マイページ</h1>


    <a href="{{ route('account_edit', $users->id) }}" class="btn btn--primary btn--small">アカウント編集</a>

    <div class="account__content">
        <div class="account__text">
            <p>ユーザー名:{{ auth()->user()->name ?? 'ゲスト' }}</p>
            <p>メール:{{ $users->email ?? '-' }}</p>
        </div>
        <div class="account__text">
            <p>名前:{{ $users->name_kanji ?? '-' }}</p>
            <p>カナ:{{ $users->name_kana  ?? '-' }}</p>
        </div>
    </div>

    <div class="mypage__content">
        <div class="group">
            <h2>＜出品商品＞</h2>

            <a href="{{ route('create') }}" class="btn btn--secondary account__action">新規登録</a>
        </div>
        <table class="table">
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
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td><a href="{{ route('detail', $product->id) }}" class="btn btn--success btn--small">詳細</a></td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>

    <div class="mypage__content">
        <h2>＜購入した商品＞</h2>

        <table class="table">
            <thead>
                <th>商品名</th>
                <th>商品説明</th>
                <th>料金(¥)</th>
                <th>個数</th>
            </thead>

            <tbody>
            @forelse($sales as $sale)
                <tr>
                    <td>{{ $sale->product->product_name }}</td>
                    <td>{{ $sale->product->description }}</td>
                    <td>{{ $sale->product->price }}</td>
                    <td>{{ $sale->quantity }}</td>
                </tr>
            @empty
                <tr>
                    <td>購入した商品はありません。</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection