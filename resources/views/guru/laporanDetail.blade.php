<style>
*{
    font-family: sans-serif;
}
table {
    width: 100%;
    border-collapse: collapse;
    border: 1px solid #302f2f;
}

table thead th {
    color: #fff;
    padding: 0.75rem;
    background-color: #343a40;
    border-bottom: 2px solid #302f2f;
}


.table-detail tr th,
table tfoot tr td,
table tfoot tr th,
table tbody tr th,
table tbody tr td {
    padding: 0.75rem;
    border: 1px solid #dee2e6;
}

table tfoot tr:hover,
table tbody tr:hover,
table tbody tr:nth-child(odd) {
    background-color: rgba(0, 0, 0, 0.05);
}

table img {
    width: 100px;
    height: 100px;
    object-fit: contain;
}

table .btn {
    margin: 5px;
    padding: .3rem .75rem;
}

</style>
<h2>Detail Laporan</h2>

    <table class="table-detail mb-20">
        <tr>
            <th>Hadir</th>
            <td>{{ $hadir }}</td>
        </tr>

        <tr>
            <th>Sakit</th>
            <td>{{ $sakit }}</td>
        </tr>

        <tr>
            <th>Izin</th>
            <td>{{ $izin }}</td>
        </tr>

        <tr>
            <th>Tanpa Keterangan</th>
            <td>{{ $alpa }}</td>
        </tr>

    </table>


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
