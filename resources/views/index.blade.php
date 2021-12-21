@extends("layouts.layout")
@section("title","Dashboard")
@section("konten")
    <h2>Selamat Datang {{ auth()->user()->role }}</h2>
    @if (auth()->user()->role="user")

    <div class="fitur">
        <div class="perFitur">
            <div class="caption">
                <h2>300</h2>
                <p>aa</p>
            </div>
            <div class="icon">
                <i class="fas fa-user"></i>
            </div>
        </div>

        <div class="perFitur">
            <div class="caption">
                <h2>300</h2>
                <p>aa</p>
            </div>
            <div class="icon">
                <i class="fas fa-user"></i>
            </div>
        </div>

        <div class="perFitur">
            <div class="caption">
                <h2>300</h2>
                <p>aa</p>
            </div>
            <div class="icon">
                <i class="fas fa-user"></i>
            </div>
        </div>
    </div>
    @endif
@endsection
