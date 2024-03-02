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
            <!-- <div class="row">
                <div class="col-xl-4">
                    <div class="card widget widget-stats">
                        <div class="card-body">
                            <input type="text" class="form-control form-control-rounded" aria-describedby="..." placeholder="Enter Code">
                            <button type="submit" class="btn btn-primary btn-rounded">Enter</button>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="row">
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
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Basic</h5>
                        </div>
                        <div class="card-body">
                            <table id="datatable1" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($racun as $item) <!-- var model dari controller model -->
                                    <tr>
                                        <td> {{$item -> nama_racun}}</td>
                                        <td>{{$item -> harga_racun}}</td>
                                        <td>{{$item -> modal_racun}}</td>
                                        <td>{{$item -> volume}}</td>
                                        <td>{{$item -> kode_racun}}</td>
                                        <td>{{$item -> jenis_racun}}</td>
                                    </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection