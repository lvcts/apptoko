@extends('admin.template.template')
@section('content')

<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-description d-flex align-items-center">
                        <div class="page-description-content flex-grow-1">
                            <h1>Dashboard</h1>
                        </div>
                        <div class="page-description-actions">
                            <a href="#" class="btn btn-info btn-style-light"><i class="material-icons-outlined">file_download</i>Download</a>
                            <a href="{{url('/scan')}}" class="btn btn-warning btn-style-light"><i class="material-icons">add</i>Scan Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <div class="card widget widget-stats">
                        <div class="card-body">
                            <div class="widget-stats-container d-flex">
                                <!-- <div class="widget-stats-icon widget-stats-icon-primary">
                                    <i class="material-icons-outlined">paid</i>
                                </div> -->
                                <div class="widget-stats-content flex-fill">
                                    <span class="widget-stats-title">Pendapatan Hari Ini</span>
                                    <span class="widget-stats-amount">Rp.123.000.000</span>
                                    <span class="widget-stats-info">471 Orders Total</span>
                                </div>
                                <!-- <div class="widget-stats-indicator widget-stats-indicator-negative align-self-start">
                                    <i class="material-icons">keyboard_arrow_down</i> 4%
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection