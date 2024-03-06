@extends('admin.template.template')
@section('title') {{'Update Data Racun'}} @endsection
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
                                    <div class="modal fade" id="validationModal" tabindex="-1" aria-labelledby="validationModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="validationModalLabel">Validation Error</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    @if ($errors->any())
                                                    <p>{{ $errors->first() }}</p>
                                                    @endif
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
                                                <option value="" {{ old('jenisRacun', $racun->jenis_racun) == '' ? 'selected' : '' }}>Choose...</option>
                                                <option value="Pembakar" {{ old('jenisRacun', $racun->jenis_racun) == 'Pembakar' ? 'selected' : '' }}>Pembakar</option>
                                                <option value="Semut" {{ old('jenisRacun', $racun->jenis_racun) == 'Semut' ? 'selected' : '' }}>Semut</option>
                                                <option value="Tikus" {{ old('jenisRacun', $racun->jenis_racun) == 'Tikus' ? 'selected' : '' }}>Tikus</option>
                                                <option value="-" {{ old('jenisRacun', $racun->jenis_racun) == '-' ? 'selected' : '' }}>-</option>
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