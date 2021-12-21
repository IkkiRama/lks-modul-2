<aside>
    <div class="profil">
        @php
            // $foto = auth()->user()->foto;
        @endphp
        <img src="{{ asset("fotoUser/guru.svg") }}" alt="img user">
        <p>Kimak</p>
        {{-- <p>{{ auth()->user()->name }}</p> --}}
    </div>


    <div class="perMenu {{ $title === 'home' ? 'active' : '' }}">
        <a href="{{ url('/') }}" class="link">
            <div class="icon">
                <i class="fas fa-home"></i>
            </div>
            <p>Home</p>
        </a>
    </div>


    @if (auth()->user()->role==='admin')
    <div class="perMenu {{ $title === 'presensi' ? 'active' : '' }}">
        <a href="{{ url("/admin/presensi") }}" class="link">
            <div class="icon">
                <i class="fas fa-clipboard-list"></i>
            </div>
            <p>Presensi</p>
        </a>
    </div>
    @endif


    @if (auth()->user()->role==='guru')
    <div class="perMenu {{ $title === 'presensi' ? 'active' : '' }}">
        <a href="{{ url("/guru/presensi") }}" class="link">
            <div class="icon">
                <i class="fas fa-clipboard-list"></i>
            </div>
            <p>Presensi</p>
        </a>
    </div>
    @endif


    @if (auth()->user()->role==='siswa')
    <div class="perMenu {{ $title === 'presensi' ? 'active' : '' }}">
        <a href="{{ url("/siswa/presensi") }}" class="link">
            <div class="icon">
                <i class="fas fa-clipboard-list"></i>
            </div>
            <p>Presensi</p>
        </a>
    </div>
    @endif


    @if (auth()->user()->role==='admin')
    <div class="perMenu {{ $title === 'kelas' ? 'active' : '' }}">
        <a href="{{ url("/admin/kelas") }}" class="link">
            <div class="icon">
                <i class="fas fa-university "></i>
            </div>
            <p>Kelas</p>
        </a>
    </div>
    @endif


    @if (auth()->user()->role==='admin')
    <div class="perMenu {{ $title === 'user' ? 'active' : '' }}">
        <a href="{{ url("/admin/user") }}" class="link">
            <div class="icon">
                <i class="fas fa-user-alt "></i>
            </div>
            <p>User</p>
        </a>
    </div>
    @endif


    <div class="perMenu">
        <a href="{{ url("/logout") }}" class="link">
            <div class="icon">
                <i class="fas fa-sign-out-alt"></i>
            </div>
            <p>Logout</p>
        </a>
    </div>

</aside>
