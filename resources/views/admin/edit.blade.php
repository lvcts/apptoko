@extends('admin.template.template')
@section('content')

<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-description d-flex align-items-center">
                        <div class="page-description-content flex-grow-1">
                            <h1>All List</h1>

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

                                    <form class="row g-3" action="{{ route('list.update', $racun->id_racun) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="col-md-12">
                                            <label for="namaRacun" class="form-label">Nama Racun</label>
                                            <input type="text" name="namaRacun" class="form-control" id="namaRacun" value="{{ $racun->nama_racun }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="hargaRacun" class="form-label">Harga Racun</label>
                                            <input type="text" name="hargaRacun" class="form-control" id="hargaRacun" value="{{ $racun->harga_racun }}">
                                        </div>
                                        <div class="col-6">
                                            <label for="modalRacun" class="form-label">Modal Racun</label>
                                            <input type="text" name="modalRacun" class="form-control" id="modalRacun" value="{{ $racun->modal_racun }}">
                                        </div>
                                        <div class="col-12">
                                            <label for="volume" class="form-label">Volume</label>
                                            <input type="text" name="volume" class="form-control" id="volume" value="{{ $racun->volume }}">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="kodeRacun" class="form-label">Kode Racun</label>
                                            <input type="text" name="kodeRacun" class="form-control" id="kodeRacun" value="{{ $racun->kode_racun }}">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="jenisRacun" class="form-label">Jenis Racun</label>
                                            <select id="jenisRacun" name="jenisRacun" class="form-select">
                                                <option selected>Choose...</option>
                                                <option>Pembakar</option>
                                                <option>Semut</option>
                                                <option>Tikus</option>
                                                <option>-</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="stok" class="form-label">Stok</label>
                                            <input type="text" name="stok" class="form-control" id="stok" value="{{ $racun->stok }}">
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

        </div>
    </div>
</div>


@endsection