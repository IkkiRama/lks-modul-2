@extends("layouts.layout")
@section("title","Presensi | Guru")
@section("konten")
    <h2>Presensi Guru</h2>


    <a href="{{ url("/guru/presensi/tambah") }}" class="btn btn-primary mb-20">Tambah</a>

    @if (Session::has("sukses"))
        <div class="alert">{{ Session::get("sukses") }}</div>
    @endif

    @if (Session::has("gagal"))
        <div class="alert alert-danger">{{ Session::get("gagal") }}</div>
    @endif

    <form action="{{ url("/guru/presensi") }}" class="mb-20" method="get">
        <div class="form-group">
            <div class="input-group">
                <input type="text" name="search">
                <button class="btn btn-primary">Cari</button>
            </div>
        </div>
    </form>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Topic</th>
                <th>Tanggal</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($presensi as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->subject->name }}</td>
                <td>{{ $p->topic }}</td>
                <td>{{ $p->date }}</td>
                <td>{{ $p->classe->name }}</td>
                <td>
                    <a href="{{ url("/guru/presensi/ubah/$p->id") }}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                    <a href="{{ url("/guru/presensi/hapus/$p->id") }}" onclick="return confirm('Yakin Mau Dihapus')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- No	Judul	Topic	Tanggal	Kelas	Aksi --}}
@endsection
