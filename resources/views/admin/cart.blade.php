@extends('admin.template.template')

@section('content')
<h1>Cart</h1>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Remove</th>
        </tr>
    </thead>
    <tbody>
        @foreach($racun_models as $item)
        @if(in_array($item->id, array_keys($cart)))
        <tr>
            <td>{{ $item->nama_racun }}</td>
            <td>{{ $item->harga_racun }}</td>
            <td>
                <form action="{{ route('cart.update', $item->id_racun) }}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="number" name="quantity" value="{{ $cart[$item->id] }}" min="1">
                    <button type="submit">Update</button>
                </form>
            </td>
            <td>
                <form action="{{ route('cart.remove', $item->id_racun) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Remove</button>
                </form>
            </td>
        </tr>
        @else
        <tr>
            <td>{{ $item->nama_racun }}</td>
            <td>{{ $item->harga_racun }}</td>
            <td>
                <form action="{{ route('cart.add', $item->id_racun) }}" method="post">
                    @csrf
                    <input type="number" name="quantity" value="1" min="1">
                    <button type="submit">Add to cart</button>
                </form>
            </td>
            <td></td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>

<p>Total balance: {{ $totalBalance }}</p>
@endsection