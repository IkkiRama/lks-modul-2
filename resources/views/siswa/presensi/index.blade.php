@extends("layouts.layout")
@section("title","Presensi | Siswa")
@section("konten")
    <h2>Daftar Presensi</h2>


    @if (Session::has("sukses"))
        <div class="alert">{{ Session::get("sukses") }}</div>
    @endif

    @if (Session::has("gagal"))
        <div class="alert alert-danger">{{ Session::get("gagal") }}</div>
    @endif


    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Topic</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            {{-- {{ dd($presensi->all()) }} --}}
            @foreach ($presensi as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->subject->name }}</td>
                <td>{{ $p->topic }}</td>
                <td>
                    {{-- @if ($p->classe_id === auth()->user()->classe_id && $detailPresensi === null) --}}
                    <a href="{{ url("/siswa/presensi/konfirmasi/$p->id") }}" class="btn btn-primary">Konfirmasi</a>
                    {{-- @else --}}
                    <a href="{{ url("/siswa/presensi/ubahKonfirmasi/$p->id") }}" class="btn btn-warning">Ubah Konfirmasi</a>
                    {{-- @endif --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
