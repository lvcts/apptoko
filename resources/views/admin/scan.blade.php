@extends('admin.template.template')
@section('content')

<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-description d-flex align-items-center">
                        <div class="page-description-content flex-grow-1">
                            <h1>Scan Me</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Cart</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Racun Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Subtotal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartItems as $cartItem)
                            <tr>
                                <td>{{ $cartItem->racun->nama_racun }}</td>
                                <td>{{ $cartItem->quantity }}</td>
                                <td>{{ $cartItem->racun->harga_racun }}</td>
                                <td>{{ $cartItem->quantity * $cartItem->racun->harga_racun }}</td>
                                <td>
                                    <form action="{{ route('cart.remove', ['id' => $cartItem->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">List Racun</h5>
                        </div>
                        <div class="card-body">
                            <form action="/cari">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Cari" aria-describedby="button-addon2" name="cari">
                                    <button class="btn btn-outline-primary" type="submit" id="button-addon2">Cari</button>
                                </div>
                            </form>
                            <div class="table-responsive">
                                @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                                @endif
                                <table id="datatable1" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Nama Racun</th>
                                            <th>Harga</th>
                                            <th>Volume</th>
                                            <th>Aksi</th>

                                        </tr>
                                    </thead>
                                    @foreach ($racun as $item)
                                    <tbody>
                                        <tr>
                                            <td> {{$item -> nama_racun}}</td>
                                            <td>
                                                <?php echo number_format($item->harga_racun); ?>
                                            </td>
                                            <td>{{$item -> volume}}</td>
                                            <td>
                                                <form action="{{ route('cart.add', ['id' => $item->id_racun]) }}" method="post">
                                                    @csrf
                                                    <input type="number" name="quantity" value="1" min="1" hidden>
                                                    <button type="submit" class="btn btn-sm"><i class="fa-solid fa-cart-plus"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                    <tfoot>
                                        <tr>
                                            <th>Nama Racun</th>
                                            <th>Harga</th>
                                            <th>Volume</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                {{$racun->links('pagination::bootstrap-4')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection