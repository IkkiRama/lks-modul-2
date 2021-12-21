@extends("layouts.layout")
@section("title","Ubah Konfirmasi | Siswa")
@section("konten")
    <h2>Ubah Konfirmasi Presensi</h2>

    {{-- {{ dd($detailPresensi->attstatus) }} --}}

    <form action="{{ url("/siswa/presensi/ubahKonfirmasi/$presensi->id") }}" method="post">
        @csrf
        <div class="form-group">
            <label for="attstatus">Keterangan</label>
            <select name="attstatus" id="attstatus">
                <option @if ($detailPresensi->attstatus === "Hadir") selected  @endif value="Hadir">Hadir</option>
                <option @if ($detailPresensi->attstatus === "Sakit") selected @endif value="Sakit">Sakit</option>
                <option @if ($detailPresensi->attstatus === "Izin") selected @endif value="Izin">Izin</option>
                <option @if ($detailPresensi->attstatus === "Tanpa Keterangan") selected @endif value="Tanpa Keterangan">Tanpa Keterangan</option>
            </select>
        </div>

        <button class="btn btn-warning">Ubah Konfirmasi</button>
    </form>
@endsection
