@extends("layouts.layout")
@section("title","Dashboard")
@section("konten")
    <h2>Selamat Datang {{ auth()->user()->role }}</h2>
    <div class="fitru">
        <div class="perFitur">
            <div class="caption">
                <h2>300</h2>
            </div>
            <div class="icon">
                <i class="fas fa-user"></i>
            </div>
        </div>
    </div>
@endsection
