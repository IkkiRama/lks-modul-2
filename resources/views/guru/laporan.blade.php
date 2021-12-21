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
<h2>Presensi Guru</h2>

<table>
<thead>
    <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Topic</th>
        <th>Tanggal</th>
        <th>Kelas</th>
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
    </tr>
    @endforeach
</tbody>
</table>
