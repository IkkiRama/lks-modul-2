@extends("layouts.layout")
@section("title","Konfrimasi Presensi | Siswa")
@section("konten")
    <h2>Konfirmasi Presensi</h2>

    <form action="{{ url("/siswa/presensi/konfirmasi/$presensi->id") }}" method="post">
        @csrf
        <div class="form-group">
            <label for="attstatus">Keterangan</label>
            <select name="attstatus" id="attstatus">
                <option value="Hadir">Hadir</option>
                <option value="Sakit">Sakit</option>
                <option value="Izin">Izin</option>
                <option value="Tanpa Keterangan">Tanpa Keterangan</option>
            </select>
        </div>

        <button class="btn btn-primary">Konfirmasi</button>
    </form>
@endsection
