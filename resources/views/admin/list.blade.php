@extends('admin.template.template')
@section('title') {{'List Racun'}} @endsection
@section('content')


<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-description d-flex align-items-center">
                        <div class="page-description-content flex-grow-1">
                            <h1>List Racun</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="example-container">
                                <div class="example-content">
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    <form class="row g-3" action="{{ route('list.store') }}" method="POST">
                                        @csrf
                                        <div class="col-md-12">
                                            <label for="namaRacun" class="form-label">Nama Racun</label>
                                            <input type="text" name="namaRacun" class="form-control" id="namaRacun" placeholder="CBA">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="hargaRacun" class="form-label">Harga Racun</label>
                                            <input type="text" name="hargaRacun" class="form-control" id="hargaRacun" placeholder="75000">
                                        </div>
                                        <div class="col-6">
                                            <label for="modalRacun" class="form-label">Modal Racun</label>
                                            <input type="text" name="modalRacun" class="form-control" id="modalRacun" placeholder="70000">
                                        </div>
                                        <div class="col-12">
                                            <label for="volume" class="form-label">Volume</label>
                                            <input type="text" name="volume" class="form-control" id="volume" placeholder="1 L">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="kodeRacun" class="form-label">Kode Racun</label>
                                            <input type="text" name="kodeRacun" class="form-control" id="kodeRacun" placeholder="CBASTLTR">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="jenisRacun" class="form-label">Jenis Racun</label>
                                            <select id="jenisRacun" name="jenisRacun" class="form-select" required="" data-msg-required="Pilih jenis racun.">
                                                <option selected>Choose...</option>
                                                <option>Pembakar</option>
                                                <option>Semut</option>
                                                <option>Tikus</option>
                                                <option>-</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="stok" class="form-label" required>Stok</label>
                                            <input type="text" name="stok" class="form-control" id="stok">
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-primary" value="submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="row">
                <div class="col-xl-4">
                    <div class="card widget widget-stats">
                        <div class="input-group mb-3">
                            <form action="/scan/cari" method="get">
                                <input type="text" name="scan" class="form-control form-control-solid" placeholder="Enter Code" aria-label="Enter Code" aria-describedby="custom-addon2">
                                <button type="submit" class="input-group-text input-group-text-solid" id="custom-addon2" value="scan">Scan Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">List Racun</h5>
                        </div>
                        <div class="card-body">
                            <form action="/list/cari">
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
                                            <th>Modal</th>
                                            <th>Volume</th>
                                            <th>Kode</th>
                                            <th>Jenis</th>
                                            <th>Stok</th>
                                            <th>Aksi</th>

                                        </tr>
                                    </thead>
                                    @foreach ($racun_models as $item)
                                    <tbody>
                                        <tr>
                                            <td> {{$item -> nama_racun}}</td>
                                            <td>{{$item -> harga_racun}}</td>
                                            <td>{{$item -> modal_racun}}</td>
                                            <td>{{$item -> volume}}</td>
                                            <td>{{$item -> kode_racun}}</td>
                                            <td>{{$item -> jenis_racun}}</td>
                                            <td>{{$item -> stok}}</td>
                                            <td class="text-center">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('list.destroy', $item->id_racun) }}" method="POST">
                                                    <a href="{{ route('list.edit', $item->id_racun) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                                </form>
                                            </td>


                                        </tr>
                                    </tbody>
                                    @endforeach
                                    <tfoot>
                                        <tr>
                                            <th>Nama Racun</th>
                                            <th>Harga</th>
                                            <th>Modal</th>
                                            <th>Volume</th>
                                            <th>Kode</th>
                                            <th>Jenis</th>
                                            <th>Stok</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                {{$racun_models->links('pagination::bootstrap-4')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection