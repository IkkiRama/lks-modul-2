@extends("layouts.layout")
@section("title","Presensi | Guru")
@section("konten")
    <h2>Presensi Guru</h2>


    <a href="{{ url("/guru/presensi/tambah") }}" class="btn btn-primary mb-20">Tambah</a>
    <a href="{{ url("/guru/presensi/eksporPDF") }}" class="btn btn-danger mb-20">Ekspor</a>

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
                <th>Nama</th>
                <th>Jam Absensi</th>
                <th>Keterangan</th>
                {{-- No	Nama Siswa	Jam Absensi	Keterangan --}}
            </tr>
        </thead>

        <tbody>
            @foreach ($detailPresensi as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->user->name }}</td>
                <td>{{ $p->updated_at->format("H:i:s") }}</td>
                <td>{{ $p->attstatus }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- No	Judul	Topic	Tanggal	Kelas	Aksi --}}
@endsection
