@extends('admin.template.template')
@section('title') {{'Transaksi'}} @endsection
@section('content')
<h1>dashboard</h1>
<h1>dashboard</h1>
<h1>dashboard</h1>

@auth
{{auth()->user()->name}}
<div class="text-end">
    <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">Logout</a>
</div>
@endauth
<h1>ini halaman dashboard</h1>
@guest
<div class="text-end">
    <a href="{{ route('login.perform') }}" class="btn btn-outline-light me-2">Login</a>
    <a href="{{ route('register.perform') }}" class="btn btn-warning">Sign-up</a>
</div>
@endguest
@endsection