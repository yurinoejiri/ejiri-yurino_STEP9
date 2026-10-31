@foreach($products as $product)
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

        <td><a href="{{ route('salesDetail', $product->id) }}" class="btn btn--success btn--small">詳細</a></td>
    </tr>
@endforeach