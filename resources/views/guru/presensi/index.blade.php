@extends("layouts.layout")
@section("title","Presensi | Guru")
@section("konten")
    <h2>Presensi Guru</h2>

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
                    <a href="{{ url("/guru/presensi/ubah/$p->id") }}" class="btn btn-warning">Ubah</a>
                    <a href="{{ url("/guru/presensi/hapus/$p->id") }}" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- No	Judul	Topic	Tanggal	Kelas	Aksi --}}
@endsection
